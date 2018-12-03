<?php session_start();

if (!isset($_SESSION['username'])) {
    //not logged in (Guest) GET OUT
    header("Location: login.php");
    die();
} else {
    include 'include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();
    $uid = $_SESSION['userID'];

  /*  $sql = "SELECT * FROM Admin WHERE userID='$uid'";
    if ($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        if ($results = mysqli_query($connection, $sql)) {
            while ($returned = mysqli_fetch_row($results)) {
                echo "I'm an Admin!";
                echo $returned;
                header('Location: admin.php');
            }
        } mysqli_free_result($results);


        //echo "Error: " . $sql . " " . mysqli_error($connection);
    } */
    $data = array();
    $sql = "SELECT orderID,orderDate,totalPrice,method,orderStatus,paymentCC,shipAddress,billAddress FROM Customer RIGHT OUTER JOIN Orders ON Customer.userID=Orders.userID WHERE Customer.userID='$uid';";
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        if ($results = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
                $data[] = $row;
                }
            }
        }
        mysqli_free_result($results);
    }
    mysqli_close($connection);
}?>

<html>

<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/orderProgress.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <section class="mainPageBody">
                    <div class="adminDiv">
                        <p class="subtitleAdmin">Order Status</p>
                        <div class="statusBar">
                            <div class="progressIn"></div>
                            <p id="ordered">Ordered</p>
                            <p id="shipped">Shipped</p>
                            <p id="delivered">Delivered</p>
                            <p>Porsche - Project Gold - $4.1m</p>
                        </div>
                    </div>
                    <p class="subtitleAdmin">Completed Orders</p>
                    <div class="adminDiv">
                        <p>Delivered</p>
                        <p>Ford - Focus RS - $32K</p>
                    </div>
                    <div class="adminDiv">
                        <p>Delivered</p>
                        <p>Renault - Megane RS - $65K</p>
                    </div>
                </section>
            </section>
        </div>
        <?php include "include/footer.php" ?>
    </main>
</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>
