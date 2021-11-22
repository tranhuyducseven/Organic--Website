<?php

class CommentController {
    public function InitCommentController(){
        require_once('models/comment-model.php');           
        require_once('views/comment-view.php');
        require_once('models/user-model.php');
    }

    public function View(){
        $this->InitCommentController();
        
        $action = "show";
        $commentView = new CommentView();
        $commentView->showFormComment_adminpage($action);         
        $commentModel = new CommentModel();

        $userModel = new UserModel();

        if (isset($_POST['submit']))
        {
            $id_blog = $_POST['ID'];
            $comments = $commentModel->getAllComment($id_blog);
            $commentView->showAllComment($comments); 
        }
             
    }

    public function Edit(){
        $this->InitCommentController();
        $action = "addnew";
        $commentView = new CommentView();
        $commentView->showFormComment_adminpage($action);         
        $commentModel = new CommentModel();

        $userModel = new UserModel();
        
        $arr = array();
        if (isset($_POST['submit'])){
            $arr['Username'] = $_POST['Username'];
            $arr['ID'] = $_POST['ID'];
            $arr['Content'] = $_POST['Content'];
        }

        if (sizeof($arr) != 0) {
            $username = $_POST['Username'];
            $checkUserName = $userModel->checkCommentPermission($username);
            if ($checkUserName == false)
                $commentView->showError($checkUserName);
            else
            {
                $result = $commentModel->Edit($arr);
                $commentView->alertResultPopUp($result);
            }
        }    
    }

    public function getCommentOfPost($id){
        require_once('../models/comment-model.php');  
        require_once('../views/comment-view.php');
        require_once('../models/user-model.php');  

        $commentModel = new CommentModel();
        $commentView = new CommentView();
        $comments = $commentModel->getAllComment($id);

        $userModel = new UserModel();
        $cnt = 0;
        $res = array();
        foreach ($comments as $comment):
            if ($userModel->checkCommentPermission($comment['Username']) == false){
                unset($comments[$cnt]);
            }
            else {
                $pic = $userModel->getPictureOneUser($comment['Username']);
                if ($pic == "")
                    $pic = "assets/img/vegetables.png";
                $res[$cnt] = array("Avatar" => $pic, "Username" => $comment['Username'], "Time" => $comment['Time'], "Content" => $comment['Content']);
            }
            $cnt++;
        endforeach;
        return $res;
    }

    public function addNewComment($id, $content){
        require_once('../models/comment-model.php');  
        $commentModel = new CommentModel();
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
            $commentModel->addNewComment($id, $_SESSION['username'], $content);
        }
    }
}
?>