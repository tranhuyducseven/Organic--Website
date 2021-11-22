<?php

class CommentModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'db_ltw');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllComment($id_blog){
        $con = $this->InitConnect();

        $res = $con->query('SELECT * FROM comment_table WHERE ID="'. $id_blog . '"');
        $comments = array();
        if ($res->num_rows > 0){
            while ($comment = mysqli_fetch_assoc($res)){
                $comments[] = $comment;
            }
        }
        return $comments;
    }

    public function Edit($comment){
        $conn = $this->InitConnect();
        $sql = "INSERT INTO comment_table (ID_blog, Username, Content) VALUES('".$comment['ID']."', '".$comment['Username']."', '".$comment['Content']."')";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        }
        else {
            $conn->close();
            return false;
        }
    }

    public function addNewComment($id, $username, $content){
        $con = $this->InitConnect();
        $res = 'INSERT INTO comment_table (ID, Username, Content) VALUES ("'.$id.'", "'.$username.'", "'.$content.'")';
        if ($con->query($res) === TRUE) {
            $con->close();
            return true;
        }
        else {
            $con->close();
            return false;
        }
    }
}

?>