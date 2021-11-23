<?php
    require_once('../models/user-model.php');  
    require_once('../controllers/profile-controller.php'); 
    session_start();
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
        if (isset($_POST['email']) || isset($_POST['password']) || isset($_POST['phone']) || isset($_POST['avatar'])){
            $profileController = new ProfileController;
            if ($profileController->changeOneUser($_SESSION['username'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['avatar']))
                echo "true";
            else echo "false";
        }
        else {
            $userModel = new UserModel;
            $user = $userModel->getOneUser($_SESSION['username']);
            echo json_encode($user);
        }
    }
    else {
        echo "fasle";
    }
?>