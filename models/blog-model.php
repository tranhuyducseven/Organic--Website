<?php

class BlogModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'db_ltw');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllBlog(){
        $con = $this->InitConnect();

        $res = $con->query('SELECT * FROM blog_table');
        $blogs = array();
        if ($res->num_rows > 0){
            while ($blog = mysqli_fetch_assoc($res)){
                $blogs[] = $blog;
            }
        }
        return $blogs;
    }

    public function getOneBlog($id){
        $con = $this->InitConnect();

        $res = $con->query("SELECT * FROM blog_table WHERE ID='$id'");
        $blog = mysqli_fetch_assoc($res);
        return $blog;
    }

    public function Edit($action, $blog){
        if ($action == "addnew")
        {
            $conn = $this->InitConnect();
            $sql = "INSERT INTO blog_table (Image, Title, Content, Tag , Description) VALUES('".$blog['Image']."', '".$blog['Title']."', '".$blog['Content']."', '".$blog['Tag']."', '".$blog['Description']."')";
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

            $existID = mysqli_query($conn, "SELECT * FROM blog_table WHERE ID = '".$blog['ID']."'");
            if (mysqli_num_rows($existID) == 0)
                return false;
            else {
                $sql = "UPDATE blog_table SET Image = '".$blog['Image']."', Title = '".$blog['Title']."', Content = '".$blog['Content']."', Tag = '".$blog['Tag']."', Description = '".$blog['Description']."' WHERE ID = ".$blog['ID']."";
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

            $existID = mysqli_query($conn, "SELECT * FROM blog_table WHERE ID = '".$blog['ID']."'");
            if (mysqli_num_rows($existID) == 0)
                return false;
            else {
                $sql = "DELETE FROM blog_table WHERE ID = " . $blog['ID'];
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

    public function getAllBlog_homepage(){
        $con = $this->InitConnect();

        $resHot = $con->query("SELECT * FROM blog_table ORDER BY Day DESC");

        $cnt = 0;
        $blogs = array();
        while ($blog = mysqli_fetch_assoc($resHot)){
            if ($cnt == 3)
                break;
            $blogs[] = $blog;
            $cnt++;
        }
        return $blogs;
    }
}



?>