<?php

class ProfileController {
    public function InitProfileController(){
        require_once('models/user-model.php');
        require_once('views/user-view.php');
    }

    public function getOneUser($username){
        $this->InitProfileController();

        $userModel = new UserModel();
        $user = $userModel->getOneUser($username);
        
        $userView = new UserView();
        $userView->showOneUser_userpage($user);

        if (isset($_POST['submit'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $avatar = $_POST['avatar'];
            if ($userModel->changeUserData($username, $password, $email, $phone, $avatar)){
                $userView->alertResultPopUp(true, "profile.php", "profile.php", "Change successfully!", "Change failed!");
            }
            else $userView->alertResultPopUp(false, "profile.php", "profile.php", "Change successfully!", "Change failed!");
        }
    }

    public function getPictureOneUser($username){
        $this->InitProfileController();
        $userModel = new UserModel();
        $pic = $userModel->getPictureOneUser($username);
        if ($pic == "")
            return "assets/img/vegetables.png";
        return $pic;
    }
}

?>