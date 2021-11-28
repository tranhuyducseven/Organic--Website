<?php
    class ContactModel {
        public function InitConnect(){
            $con = mysqli_connect('localhost', 'root', '', 'db_ltw');
    
            if (mysqli_connect_errno()){
                die('Connection failed: '. mysqli_connect_error());
            }
            else return $con;
        }

        public function getAllContactInfo(){
            $con = $this->InitConnect();

            $res = $con->query('SELECT * FROM contact_table');
            $contacts = array();
            if ($res->num_rows > 0){
                while ($contact = mysqli_fetch_assoc($res)){
                    $contacts[] = $contact;
                }
            }
            return $contacts;
        }

        public function getOneContactInfo($id){
            $con = $this->InitConnect();

            $res = $con->query("SELECT * FROM contact_table WHERE id='$id'");
            $product = mysqli_fetch_assoc($res);
            return $product;
        }

        public function Edit($action, $contact){
            if ($action == "addnew")
            {
                $conn = $this->InitConnect();
    
                $sql = "INSERT INTO contact_table (phone, address, email) VALUES('".$contact['phone']."', '".$contact['address']."', '".$contact['email']."')";
                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    return true;
                }
                else {
                    $conn->close();
                    return false;
                }
            }
    
            if ($action == "edit")
            {
                $conn = $this->InitConnect();
    
                $existID = mysqli_query($conn, "SELECT * FROM contact_table WHERE id = '".$contact['id']."'");
                if (mysqli_num_rows($existID) == 0)
                    return false;
                else
                {
                    $sql = "UPDATE contact_table SET phone = '".$contact['phone']."', address = '".$contact['address']."', email = '".$contact['email']."' WHERE id = ".$contact['id']."";
                    if ($conn->query($sql) === TRUE) {
                        $conn->close();
                        return true;
                    }
                    else {
                        $conn->close();
                        return false;
                    }
                }
            }
    
            if ($action == "delete")
            {
                $conn = $this->InitConnect();
    
                $existID = mysqli_query($conn, "SELECT * FROM contact_table WHERE id = '".$contact['id']."'");
                if (mysqli_num_rows($existID) == 0)
                    return false;
                else
                {
                    $sql = "DELETE FROM contact_table WHERE id = " . $contact['id'];
                    if ($conn->query($sql) === TRUE) {
                        $conn->close();
                        return true;
                    }
                    else {
                        $conn->close();
                        return false;
                    }
                }
            }
        }

        public function getTopContact(){
            $con = $this->InitConnect();

            $res = $con->query('SELECT * FROM contact_table');
            $contacts = array();
            if ($res->num_rows > 0){
                while ($contact = mysqli_fetch_assoc($res)){
                    $contacts[] = $contact;
                    return $contacts;
                }
            }
            return $contacts;
        }
    }
?>