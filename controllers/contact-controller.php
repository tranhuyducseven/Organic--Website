<?php

class ContactController{
    public function getAllContactInfo(){
        require_once("../models/contact-model.php");
        $contactModel = new ContactModel;
        return $contactModel->getAllContactInfo();
    }

    public function showTopContact(){
        require_once("../models/contact-model.php");
        $contactModel = new ContactModel;
        return $contactModel->getTopContact();
    }

    public function showTopContact_footer(){
        require_once("models/contact-model.php");
        require_once("views/contact-view.php");
        $contactModel = new ContactModel;
        $contactView = new ContactView;
        $contacts = $contactModel->getTopContact();
        $contactView->showContactFooter($contacts);
    }
}

?>