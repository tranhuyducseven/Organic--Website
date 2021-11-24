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
        if ($res == -1){
            echo "Something unexpected happend.";
        } else if ($res == 0){
            echo "Username already existed.";
        } else if ($res == 2){
            echo "Invalid username. Username must be 5 - 20 characters, contains [a-z A-Z 0-9 _ .].";
        } else if ($res == 3){
            echo "Invalid password. Password must be 8 - 20 characters, contains at least 1 number, 1 upper, 1 lower, 1 special character.";
        } else if ($res == 4){
            echo "Invalid email. Check your email again.";
        } else if ($res == 5){
            echo "Invalid phone number. Phone number must be 9 - 13 numbers.";
        }
    }
?>