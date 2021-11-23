<?php
    require_once("../controllers/login-controller.php");
    session_start();
    $loginController = new LoginController;
    if ($_POST['act'] == "login"){
        if ($loginController->checkLogin($_POST['username'], $_POST['password']) == false)
            echo "Username or password is incorrect.";
    } else if ($_POST['act'] == "reg") {
        $res = $loginController->checkSignUp($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone']);
        if ($res == -1){
            echo "Something unexpected happend.";
        } else if ($res == 2){
            echo "Username already existed.";
        } else if ($res == 3){
            echo "Check your information again.";
        }
    }
?>