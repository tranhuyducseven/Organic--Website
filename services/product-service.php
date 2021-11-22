<?php
	require_once("../controllers/product-controller.php");
	require_once("../controllers/historyTransaction-controller.php");
	session_start();

	$productController = new ProductController;
	$historyTransactionController = new HistoryTransactionController;
	if (isset($_POST['idAdd'], $_POST['quantity'])){
		$productController->addToCart($_POST['idAdd'], $_POST['quantity']);
	}
	if (isset($_POST['idDel'])){
		$productController->removeToCart($_POST['idDel']);
	}
	echo json_encode($_SESSION['cartInfo']);

	if (isset($_POST['idPay']) && sizeof($_SESSION['cartInfo']) > 0){
		$historyTransactionController->payment();
	}
	
?>