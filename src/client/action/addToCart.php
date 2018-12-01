<?php
// Get the current list of products
session_start();
$vehicleList = null;
if (isset($_SESSION['vehicleList'])){
	$vehicleList = $_SESSION['vehicleList'];
} else{ 	// No products currently in list.  Create a list.
	$vehicleList = array();
}

// Add new product selected
// Get product information
if(isset($_GET['id']) && isset($_GET['productPic'])){
	$id = $_GET['id'];
	$productPic = $_GET['productPic'];
} else {
	header('Location: search.php');
}

// Update quantity if add same item to order again
if (isset($vehicleList[$id])){
	$vehicleList[$id]['quantity'] = $vehicleList[$id]['quantity'] + 1;
} else {
	$vehicleList[$id] = array( "id"=>$id, "productPic"=>$productPic, "quantity"=>1 );
}

$_SESSION['vehicleList'] = $vehicleList;
header('Location: ../cart.php');
?>