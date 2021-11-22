<?php
    require_once('../models/user-model.php');  
    require_once("../models/comment-model.php");
	session_start();

    $userModel = new UserModel();
    if (isset($_SESSION['username'])){
        if ($userModel->checkCommentPermission($_SESSION['username']) == true){
            echo $userModel->getPictureOneUser($_SESSION['username']);
        }
        else echo "false";
    }
    else echo "false";
?>