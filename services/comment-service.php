<?php
	require_once("../controllers/comment-controller.php");
	session_start();

	$commentController = new CommentController;
	if (isset($_POST['idAdd'])){
		$commentController->addNewComment($_POST['idAdd'], $_POST['content']);
    }
    else if (isset($_POST['idPost'])){
	    $comments = $commentController->getCommentOfPost($_POST['idPost']);
	    echo json_encode($comments);
    }
?>