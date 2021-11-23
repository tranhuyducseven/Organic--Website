<?php
    require_once("../controllers/profile-controller.php");
    session_start();
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
        $profileController = new ProfileController;
        $user = $profileController->showOrderHistory($_SESSION['username']);
        echo json_encode($user);
    }
?>