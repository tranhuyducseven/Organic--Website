<?php
    session_start();
    unset ($_SESSION['username']);
    unset($_SESSION['cartInfo']);
    header("Location: index.php")
?>