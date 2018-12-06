<?php
session_start();
$userID = $_SESSION['userID'];
$vehicleID = $_GET['id'];
$quantity = $_GET['quantity'];
$sql = "UPDATE CartContents SET quantity=$quantity WHERE vehicleID=$vehicleID and userID=$userID";
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
	echo "Record deleted successfully";
} else {
	echo "Error: " . $sql . "" . mysqli_error($connection);
}
mysqli_close($connection);
header('Location: ../cart.php');
?>
