<?php
require_once('database.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];    
    $sql = "DELETE FROM cars WHERE id =$id";
    execute($sql);
}
?>
