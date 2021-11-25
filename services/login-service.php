<?php
    require_once("../controllers/login-controller.php");
    session_start();
    $loginController = new LoginController;
    if ($_POST['act'] == "login"){
        $res = $loginController->checkLogin($_POST['username'], $_POST['password']);
        if ($res == false)
            echo "Username or password is incorrect.";
    } else if ($_POST['act'] == "reg") {
        $res = $loginController->checkSignUp($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone']);
        echo $res;
    }
?>