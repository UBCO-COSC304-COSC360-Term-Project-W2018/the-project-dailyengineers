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
$cardNumber = (int)substr($cardNumber, -4);
$cardExpiry = $_POST['cardExpiry'];
$cardCVV = $_POST['cardCVV'];
$shippingMethod = $_POST['shippingMethod'];

$totalPrice = $_POST['totalPrice'];
$currentDateTime = date("Y-m-d H:i:s");

$sql = "INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress) VALUES ($userID, '$currentDateTime', '$totalPrice', '$shippingMethod', 'processing', $cardNumber, '$shippingAddressFull', '$billingAddressFull')";
$sql2 = "SELECT orderID FROM Orders WHERE orderDate = '$currentDateTime' AND userID = $userID";
$sql3 = "SELECT vehicleID, quantity FROM CartContents WHERE userID = $userID";
// $sql4 = "INSERT INTO OrderContains VALUES ($orderID, $vehicleID, $amount, (SELECT price FROM Vehicle WHERE vehicleID = $vehicleID))";

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
// Insert order into Orders table.
if (mysqli_query($connection, $sql)) {
	echo "New record created successfully in Orders.";
  // header('Location: ../orderConfirmation.php');
  // Retrieve orderID to use for insertion into OrderContains.
  if ($results = mysqli_query($connection, $sql2)) {
    $orderID = 0;
    while ($row = mysqli_fetch_row($results)) {
      $orderID = $row['0'];
      echo '<h1>Scanning rows for orderID: '.$orderID.'</h1>';
    }
  	echo "successfully retrieved orderID.";
    echo '<h1>ORDERID: '.$orderID.'</h1>';
    if ($results = mysqli_query($connection, $sql3)) {
      $counter = 1;
      while ($row = mysqli_fetch_assoc($results)) {
        $vehicleID = $row[0];
        echo '<h1>VEHICLEID: '.$vehicleID.'</h1>';
        // $price = $row[1];
        $quantity = $row[1];
        echo '<h1>QUANTITY: '.$quantity.'</h1>';
        $sql4 = "SELECT price FROM Vehicle WHERE vehicleID = ".$vehicleID;
        $unitPrice = 0;
        if($results = mysqli_query($connection, $sql4)) {
          while ($row = mysqli_fetch_row($results)) {
            $unitPrice = $row['0'];
            echo '<h1>Scanning rows for unitPrice: '.$unitPrice.'</h1>';
          }
          echo "successfully retrieved unitPrice.";
          echo '<h1>UNIT PRICE: '.$unitPrice.'</h1>';
          $sql5 = "INSERT INTO OrderContains VALUES ($orderID, $vehicleID, $quantity, $unitPrice)";
          if (mysqli_query($connection, $sql5)) {
            echo "New record created successfully in OrderContains.";
            // header('Location: ../orderConfirmation.php');
          } else {
            echo "Error: " . $sql5 . "" . mysqli_error($connection);
          }
        } else {
          echo "Error: " . $sql4 . "" . mysqli_error($connection);
        }
        $counter++;
        echo '<h1>WHILE COUNTER: '.$counter.'</h1>';
        // $sql5 = "INSERT INTO OrderContains VALUES ($orderID, $vehicleID, $amount, (SELECT price FROM Vehicle WHERE vehicleID = $vehicleID))";
        // if (mysqli_query($connection, $sq5)) {
        //   echo "New record created successfully in OrderContains.";
        //   // header('Location: ../orderConfirmation.php');
        // } else {
        //   echo "Error: " . $sql . "" . mysqli_error($connection);
        // }
        // $subtotal += $price*$quantity;
        // $quantityTotal += $quantity;
      }
    	echo "All records created successfully in OrderContains.";
      // header('Location: ../orderConfirmation.php');
    } else {
      echo "Error: " . $sql3 . "" . mysqli_error($connection);
    }
    // header('Location: ../orderConfirmation.php');
  } else {
  	echo "Error: " . $sql2 . "" . mysqli_error($connection);
    // header('Location: ../checkout.php');
  }
} else {
	echo "Error: " . $sql . "" . mysqli_error($connection);
  // header('Location: ../checkout.php');
}
mysqli_close($connection);
// header('Location: ../orderConfirmation.php');
?>
