<?php

class UserModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'db_ltw');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllUser(){
        $con = $this->InitConnect();

        $res = $con->query('SELECT * FROM user_table');
        $users = array();
        if ($res->num_rows > 0){
            while ($user = mysqli_fetch_assoc($res)){
                $users[] = $user;
            }
        }

        $con->close();
        return $users;
    }

    public function getOneUser($username){
        $con = $this->InitConnect();

        $res = $con->query("SELECT * FROM user_table WHERE Username='$username'");
        $user = mysqli_fetch_assoc($res);

        $con->close();
        return $user;
    }

    public function changeUserData($username, $password, $email, $phone, $avatar){
        // check valid step first
        $con = $this->InitConnect();

        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($phone) > 12) {
            $con->close();
            return false;
        }

        $res = $con->query("UPDATE user_table SET Password='$password', Email='$email', PhoneNumber='$phone', Avatar='$avatar' WHERE Username='$username'");
        $con->close();
        return true;
    }

    public function deleteOneUser($username){
        $con = $this->InitConnect();
        $res = $con->query("DELETE FROM user_table WHERE Username='$username'");
        $con->close();
    }

    public function banOneUser($username){
        $con = $this->InitConnect();
        $res = $con->query("UPDATE user_table SET PermissionComment=0 WHERE Username='$username'");
        $con->close();
    }

    public function unbanOneUser($username){
        $con = $this->InitConnect();
        $res = $con->query("UPDATE user_table SET PermissionComment=1 WHERE Username='$username'");
        $con->close();
    }

    public function checkLogin($username, $password){
        $con = $this->InitConnect();

        $res = $con->query("SELECT Password FROM user_table WHERE Username = '" . $username . "'");
        if (mysqli_num_rows($res) == 0){
            return 0;
        }
        else {
            if ($password == $res->fetch_assoc()['Password']){
                $con->close();
                return 1;
            }
            else {
                $con->close();
                return 0;
            }
        }
    }


    // password is at least one number, one upper case letter, one lower case letter and one special character
    // username a-z A-Z 0-9 _ . 5 to 20 chars


    public function checkSignUp($username, $password, $email){
        $con = $this->InitConnect();

        $res = $con->query("SELECT * FROM user_table WHERE Username = '" . $username . "'");
        if (mysqli_num_rows($res) == 0){        
            if (preg_match('/^[a-z\d_.]{5,20}$/i', $username) && preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "INSERT INTO user_table (Username, Password, Email, PermissionComment) VALUES('".$username."', '".$password."', '".$email."', 1)";
                if ($con->query($sql) === TRUE) {
                    $con->close();
                    return 1;
                }
                else {
                    $con->close();
                    return -1;
                }
            }
            else {
                $con->close();
                return 0;
            }
        }
        else {
            return 0;
        }
    }
}

?>