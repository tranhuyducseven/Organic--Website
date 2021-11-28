<?php
    require_once("../controllers/contact-controller.php");
    $contactController = new ContactController;
    echo json_encode($contactController->getAllContactInfo());
?>