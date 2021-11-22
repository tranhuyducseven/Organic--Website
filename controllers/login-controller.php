<?php
    class LoginController{
        public function InitLoginController(){
            require_once('../models/user-model.php');           
            require_once('../views/user-view.php');
        }

        public function checkLogin(){
            $this->InitLoginController();

            if (isset($_POST['login_submit'])){
                session_start();
                $username = $_POST['username'];
                $password = $_POST['password'];
       
                $userModel = new UserModel();
                $userView = new UserView();
                
                $res = $userModel->checkLogin($username, $password);
                if ($res == 1) {
                    $_SESSION['username'] = $username;
                    $userView->alertResultPopUp(true, "home.php", "login.php", "Login successfully!", "Invalid username or password!");
                }
                else {
                    $userView->alertResultPopUp(false, "home.php", "login.php", "Login successfully!", "Invalid username or password!");
                }
            }
        }

        public function checkSignUp(){
            $this->InitLoginController();

            if (isset($_POST['signup_submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
          
                $userModel = new UserModel();
                $userView = new UserView();
                
                $res = $userModel->checkSignUp($username, $password, $email);
                if ($res == 1) {
                    $userView->alertResultPopUp(true, "login.php", "register.php", "Sign up successfully!", "Invalid username, password or email!");
                }
                else {
                    $userView->alertResultPopUp(false, "home.php", "register.php", "Sign up successfully!", "Invalid username, password or email!");
                }
            }
        }
    }
?>