<?php
	session_start();
	unset($_SESSION['usernameAdmin']);
	header("Location: adminLogin.php");
?>