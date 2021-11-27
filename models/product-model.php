<?php

class ProductModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'db_ltw');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllProduct(){
        $con = $this->InitConnect();

        $res = $con->query('SELECT * FROM product_table');
        $products = array();
        if ($res->num_rows > 0){
            while ($product = mysqli_fetch_assoc($res)){
                $products[] = $product;
            }
        }

        return $products;
    }

    public function getAllProduct_userpage($numPage){
        $con = $this->InitConnect();
        $start = 9 * ($numPage - 1);
        $row = 9;
        $res = $con->query("SELECT * FROM product_table LIMIT $start, $row");
        $products = array();
        if ($res->num_rows > 0){
            while ($product = mysqli_fetch_assoc($res)){
                $products[] = $product;
            }
        }

        return $products;
    }

    public function getOneProduct($id){
        $con = $this->InitConnect();

        $res = $con->query("SELECT * FROM product_table WHERE ID='$id'");
        $product = mysqli_fetch_assoc($res);
        return $product;
    }

    public function Edit($action, $product){
        if ($action == "addnew")
        {
            $conn = $this->InitConnect();

            $sql = "INSERT INTO product_table (Image, Name, Price, Description, Tag) VALUES('".$product['Image']."', '".$product['Name']."', '".$product['Price']."', '".$product['Description']."', '".$product['Tag']."')";
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

            $existID = mysqli_query($conn, "SELECT * FROM product_table WHERE ID = '".$product['ID']."'");
            if (mysqli_num_rows($existID) == 0)
                return false;
            else
            {
                $sql = "UPDATE product_table SET Image = '".$product['Image']."', Name = '".$product['Name']."', Price = '".$product['Price']."', Description = '".$product['Description']."', Tag = '".$product['Tag']."' WHERE ID = ".$product['ID']."";
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

            $existID = mysqli_query($conn, "SELECT * FROM product_table WHERE ID = '".$product['ID']."'");
            if (mysqli_num_rows($existID) == 0)
                return false;
            else
            {
                $sql = "DELETE FROM product_table WHERE ID = " . $product['ID'];
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

    public function toggleHot($id){
        $con = $this->InitConnect();
        $res = $con->query("SELECT Hot FROM product_table WHERE ID='$id'");
        $res = $res->fetch_assoc();
        if ($res['Hot'] == 1){
            $con->query("UPDATE product_table SET Hot=0 WHERE ID='$id'");
        }
        else {
            $con->query("UPDATE product_table SET Hot=1 WHERE ID='$id'");
        }
        $con->close();
    }

    public function countProductNumber()
    {
        $conn = $this->InitConnect();
        $numRows = mysqli_query($conn, "SELECT * FROM product_table");
        return mysqli_num_rows($numRows);
    }

    public function getAllProduct_homepage() {
        $con = $this->InitConnect();

        $resHot = $con->query("SELECT ID, Image, Name, Price, Description FROM product_table WHERE Hot = 1");
        $resNotHot = $con->query("SELECT ID, Image, Name, Price, Description FROM product_table WHERE Hot = 0");
        $products = array();
        $cnt = 0;
        if (mysqli_num_rows($resHot) < 5){
            while ($product = mysqli_fetch_assoc($resHot)){
                $products[] = $product;
                $cnt++;
            }
            while ($product = mysqli_fetch_assoc($resNotHot)){
                if ($cnt == 5)
                    break;
                $products[] = $product;
                $cnt++;
            }
        }
        else {
            while ($product = mysqli_fetch_assoc($resHot)){
                if ($cnt == 5)
                    break;
                $products[] = $product;
                $cnt++;
            }
        }
        return $products;
    }

    public function search($key){
        $con = $this->InitConnect();
        $res = $con->query('SELECT * FROM product_table WHERE Name LIKE \'' . $key . '%\'');
        $products = array();
        if (mysqli_num_rows($res) > 0){
            while ($product = mysqli_fetch_assoc($res)){
                $products[] = $product;
            }
        }
        return $products;
    }

    public function tag($key){
        $con = $this->InitConnect();
        $res = $con->query('SELECT * FROM product_table');
        $products = array();
        if (mysqli_num_rows($res) > 0){
            while ($product = mysqli_fetch_assoc($res)){
                $tagDB = $product['Tag'];
                if (strpos($tagDB, $key) !== false){
                    $products[] = $product;
                }
            }
        }
        return $products;
    }

    public function getAllTag(){
        $con = $this->InitConnect();
        $res = $con->query('SELECT * FROM product_table');
        $tags = array();
        if (mysqli_num_rows($res) > 0){
            while ($tag = mysqli_fetch_assoc($res)){
                $tagtmp = $tag['Tag'];
                $tagtmp = explode(",", $tagtmp);
                foreach ($tagtmp as $tag):
                    $tags[] = $tag;
                endforeach;
            }
        }
        $tags = array_unique($tags);
        unset($tags[sizeof($tags)]);
        return $tags;
    }
}

?>