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
    $contains = array();
    $sql = "SELECT orderID,orderDate,totalPrice,method,orderStatus,paymentCC,shipAddress,billAddress FROM Customer RIGHT OUTER JOIN Orders ON Customer.userID=Orders.userID WHERE Customer.userID='$uid';";
    $sql_contains = "SELECT * FROM OrderContains NATURAL JOIN Vehicle";
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        if ($results = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
        }
        mysqli_free_result($results);


        if ($results = mysqli_query($connection, $sql_contains)) {
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $contains[] = $row;
            }
        }
    }
    mysqli_free_result($results);
}
    mysqli_close($connection);
?>

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
            <p class="subtitleAdmin">Current Orders</p>
            <div class="statusBar">
              <div class="progressIn"></div>
              <p id="ordered">Ordered</p>
              <p id="shipped">Shipped</p>
              <p id="delivered">Delivered</p>
              <p>Porsche - Project Gold - $4.1m</p>
            </div>
          </div>
          <p class="subtitleAdmin">Completed Orders</p>
          <?php
                      foreach ($data as $key => $val) {
                          if ($val['orderStatus']=="delivered") {
                              echo "<div class='adminDiv'>";
                              echo "<h3>Order number ".$val['orderID'].":</h3>";
                              echo "<p>Placed on ".$val['orderDate'].".</p>";
                              echo "<p>Delivered to ".$val['shipAddress'].".</p>";
                              echo "<p>Charged $".$val['totalPrice']." to credit card ending in ".substr($val['paymentCC'], -4).".</p>";
                              echo "<h3>Order Contents:</h3>";
                              foreach ($contains as $row) {
                                  if ($val['orderID']==$row['orderID']) {
                                      echo "<p>".$row['year']." ".$row['make']." ".$row['model']."</p>";
                                      echo "<p>Quantity: ".$row['quantity']." at $".$row['unitPrice']." each.</p>";
                                  }
                              }
                              echo "</div>";
                          }
                      }
                    ?>
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
<script type="text/javascript"></script>

</html>
