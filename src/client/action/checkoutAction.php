<?php
session_start();
$userID = $_SESSION['userID'];
$vehicleID = $_POST['vehicleID'];
$totalPrice = $_POST['totalPrice'];
// $quantity = $_GET['quantity'];

// $userID = $_SESSION['id'];
$shippingFullName = $_POST['shippingFullName'];
$shippingAddress = $_POST['shippingAddress'];
$shippingCity = $_POST['shippingCity'];
$shippingStateProvince = $_POST['shippingStateProvince'];
$shippingCountry = $_POST['shippingCountry'];
$shippingPostalCodeZip = $_POST['shippingPostalCodeZIP'];
$shippingAddressFull = $shippingAddress.', '.$shippingCity.', '.$shippingStateProvince.', '.$shippingCountry.', '.$shippingPostalCodeZip;
$billinggFullName = $_POST['billingFullName'];
$billingAddress = $_POST['billingAddress'];
$billingCity = $_POST['billingCity'];
$billingStateProvince = $_POST['billingStateProvince'];
$billingCountry = $_POST['billingCountry'];
$billingPostalCodeZip = $_POST['billingPostalCodeZIP'];
$billingAddressFull = $billingAddress.', '.$billingCity.', '.$billingStateProvince.', '.$billingCountry.', '.$billingPostalCodeZip;
$cardNumber = $_POST['cardNumber'];
$cardNumber = substr($cardNumber, -4);
$cardExpiry = $_POST['cardExpiry'];
$cardCVV = $_POST['cardCVV'];
$shippingMethod = $_POST['shippingMethod'];

$totalPrice = $_POST['totalPrice'];
$currentDatetime = date("Y-m-d H:i:s");

$sql = "INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress) VALUES ($userID, $currentDatetime, $totalPrice, $shippingMethod, 'processing', $cardNumber, $shippingAddressFull, $billingAddressFull)";
// $sql2 = "SELECT orderID FROM Orders WHERE orderDate = '.$currentDateTime.'";

include '../include/db_credentials.php';
$connection = mysqli_connect($host, $user, $password, $database);
$error      = mysqli_connect_error();
if ($connection -> connect_error) {
	die("Connection failed: " . $connection -> connect_error);
}
// echo "Connected to Server.";
if ($error != null) {
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
}
if (mysqli_query($connection, $sql)) {
	echo "New record created successfully in Orders.";
  header('Location: ../orderConfirmation.php');
} else {
	echo "Error: " . $sql . "" . mysqli_error($connection);
  // header('Location: ../checkout.php');
}
mysqli_close($connection);
// header('Location: ../orderConfirmation.php');
?>
