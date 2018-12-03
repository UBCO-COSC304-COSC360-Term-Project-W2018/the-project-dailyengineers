<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        //Check if we have data
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            include '../include/db_credentials.php';

            $connection = mysqli_connect($host, $user, $password, $database);
            $error      = mysqli_connect_error();

            $userID = $_SESSION['id'];
            $shippingFullName = $_POST['shippingFullName'];
            $shippingAddress = $_POST['shippingAddress'];
            $shippingCity = $_POST['shippingCity'];
            $shippingStateProvince = $_POST['shippingStateProvince'];
            $shippingCountry = $_POST['shippingCountry'];
            $shippingPostalCodeZip = $_POST['shippingPostalCodeZIP'];
            $billinggFullName = $_POST['billingFullName'];
            $billingAddress = $_POST['billingAddress'];
            $billingCity = $_POST['billingCity'];
            $billingStateProvince = $_POST['billingStateProvince'];
            $billingCountry = $_POST['billingCountry'];
            $billingPostalCodeZip = $_POST['billingPostalCodeZIP'];
            $cardNumber = $_POST['cardNumber'];
            $cardExpiry = $_POST['cardExpiry'];
            $cardCVV = $_POST['cardCVV'];
            $shippingMethod = $_POST['shippingMethod'];

            // $sql = "SELECT * FROM User WHERE username='$username';";

            if($connection -> connect_error) {
                die("Connection failed: " . $connection -> connect_error);
            }
            echo "Connected to Server.";
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                echo "Connected to Database.";
                if ($results = mysqli_query($connection, $sql)) {
                    // while ($row = mysqli_fetch_row($results)) {
                    //     echo "post pass: " . $_POST['password'];
                    //     echo "row pass: " . $row[2];
                    //
                    //     if (md5($_POST['password']) == $row[2]) {
                    //         //Update session Superglobal
                    //         $_SESSION['username'] = $_POST['username'];
                    //         echo $_SESSION['username'];
                    //         $_SESSION['userID'] = $row[0];
							      //         $_SESSION['email'] = $row[3];
                    //         $_SESSION['recentlyViewedArr'] = array(0, 0, 0);
                    //         //Release Values
                    //         mysqli_free_result($results);
                    //         mysqli_close($connection);
                    //         //redirect
                    //         header("Location: ../index.php");
                    //         die();
                    //     }
                    // }

                    $sql =
                    mysqli_free_result($results);
                }
                mysqli_close($connection);
            }
        }
        // Data Bad
        header("Location: ../login.php");
        die();
    } else {
        // Already Logged In
        header("Location: ../index.php");
        die();
    }
}
?>

<?php
session_start();
$userID = $_SESSION['userID'];
$vehicleID = $_GET['id'];
$quantity = $_GET['quantity'];

$userID = $_SESSION['id'];
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
$cardExpiry = $_POST['cardExpiry'];
$cardCVV = $_POST['cardCVV'];
$shippingMethod = $_POST['shippingMethod'];

$totalPrice = $_POST['totalPrice'];
$currentDatetime = date("Y-m-d H:i:s");

$sql = 'INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress) VALUES ('.$userID.', '.$currentDatetime.', '.$totalPrice.', '.$shippingMethod.', 'processing', '.$paymentCC.', '.$shipAddressFull.', '.$billingAddressFull.')';
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
}
mysqli_close($connection);
// header('Location: ../orderConfirmation.php');
?>
