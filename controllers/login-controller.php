<?php
    class LoginController{
        public function checkLogin($username, $password){
            require_once('../models/user-model.php');

            $userModel = new UserModel();
            $res = $userModel->checkLogin($username, $password);
            if ($res == 1) {
                $_SESSION['username'] = $username;
                return true;
            }
            else {
                return false;
            }
        }

        public function checkSignUp($username, $password, $email, $phone){
            require_once('../models/user-model.php');

            $userModel = new UserModel();

            $res = $userModel->checkSignUp($username, $password, $email, $phone);
            if ($res == 1) {
                return 1;
            }
            else return $res;
        }

        public function checkForget($username){
            require_once('../models/user-model.php');

            $userModel = new UserModel();
            return $userModel->checkForget($username);
        }
    }
?>