<?php

class HistoryTransactionController {
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