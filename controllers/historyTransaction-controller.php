<?php

class HistoryTransactionController {
    public function InitHistoryTransactionController(){
        require_once('models/historyTransaction-model.php');           
        require_once('views/historyTransaction-view.php');
        require_once('models/user-model.php');
    }

    public function View(){
        $this->InitHistoryTransactionController();
        $action = "show";
        $historyTransactionView = new HistoryTransactionView();
        $historyTransactionView->showFormHistoryTransaction_adminpage($action);         
        $historyTransactionModel = new HistoryTransactionModel();

        $userModel = new UserModel();

        if (isset($_POST['submit']))
        {
            $username = $_POST['Username'];
            $historyTransactions = $historyTransactionModel->getAllHistoryTransaction($username);
            $historyTransactionView->showAllHistoryTransaction($historyTransactions); 
        }
             
    }

    public function Edit(){
        $this->InitHistoryTransactionController();
        $action = "addnew";
        $historyTransactionView = new HistoryTransactionView();
        $historyTransactionView->showFormHistoryTransaction_adminpage($action);         
        $historyTransactionModel = new HistoryTransactionModel();
        
        $arr = array();
        if (isset($_POST['submit'])){
            $arr['Username'] = $_POST['Username'];
            $arr['ID'] = $_POST['ID'];
            $arr['Quantity'] = $_POST['Quantity'];
        }

        if (sizeof($arr) != 0) {
            $result = $historyTransactionModel->Edit($arr);
            $historyTransactionView->alertResultPopUp($result);
        }    
    }

    public function payment(){
        require_once('../models/historyTransaction-model.php'); 
        
        $historyTransactionModel = new HistoryTransactionModel();
        if ($historyTransactionModel->addTrans($_SESSION['cartInfo'])){
            unset($_SESSION['cartInfo']);
            return true;
        }
        else return false;
    }
}
?>