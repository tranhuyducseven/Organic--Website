<?php

class HistoryTransactionModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'db_ltw');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllHistoryTransaction(){
        $con = $this->InitConnect();
        $res = $con->query('SELECT * FROM history_transaction');

        $historyTransactions = array();
        if (mysqli_num_rows($res) > 0){
            while ($historyTransaction = mysqli_fetch_assoc($res)){
                $historyTransactions[] = $historyTransaction;
            }
        }
        return $historyTransactions;
    }

    public function addTrans($trans){
        $conn = $this->InitConnect();
        foreach ($trans as $tran):
            $sql = "INSERT INTO history_transaction (Username, ID_product, Image, Name_product, Price, Quantity, Total) VALUES('". $_SESSION['username'] ."', '". $tran['ID'] ."',  '". $tran['Image'] ."', '". $tran['Name'] ."', '". $tran['Price'] ."', '". $tran['quantity'] ."', '". $tran['quantity'] * $tran['Price'] ."')";
            if ($conn->query($sql) === false) {
                $conn->close();
                return false;
            }
        endforeach;
        $conn->close();
        return true;
    }

    public function getAllHistoryOneUser($username){
        $con = $this->InitConnect();
        $res = $con->query("SELECT * FROM history_transaction WHERE Username='" . $username . "'");

        $historyTransactions = array();
        if (mysqli_num_rows($res) > 0){
            while ($historyTransaction = mysqli_fetch_assoc($res)){
                $historyTransactions[] = $historyTransaction;
            }
        }
        return $historyTransactions;
    }
}

?>