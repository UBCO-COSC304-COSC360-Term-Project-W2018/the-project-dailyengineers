<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title>Vehicle Emporium</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" href="css/general.css">
</head>

<body>

  <?php include 'include/header.php';?>

  <main>

    <div class="columnContainer">

      <!-- Sidebar code -->
      <?php include "include/sidesearch.php"; ?>
      <!-- Page code -->
      <section class="mainView">
        <div class="titleEntry">
          <div class="titleCol leftCol">
            <h1>Search Results</h1>
          </div>
          <div class="titleCol middleCol">
            <div class="midTopFlex">
              <h2>Price:</h2>
              <h2>Drivetrain:</h2>
              <h2>Engine:</h2>
            </div>
          </div>
          <!-- <div class="titleCol rightCol">
            <h2>Purchase:</h2>
          </div> -->
        </div>

        <?php
          error_reporting(E_ALL);
          include './include/db_credentials.php';

          $connection = mysqli_connect($host, $user, $password, $database);
          $error      = mysqli_connect_error();

          // Get vehicle name to search for
          $name = "";
          $hasParameter = false;
          if (isset($_GET['search'])){
            $name = $_GET['search'];
          }
          $sql = "";

          if ($name == "") {
            echo("<h2>All Vehicles</h2>");
            $sql = "SELECT year, make, model, price, description, productPic, COUNT(CommentsOn.vehicleID), drivetrain, engine, Vehicle.vehicleID FROM Vehicle LEFT OUTER JOIN CommentsOn ON Vehicle.vehicleID=CommentsOn.vehicleID GROUP BY vehicleID ORDER BY vehicleID DESC LIMIT 10";
          } else {
            echo("<h2>Vehicles containing '" . $name . "'</h2>");
            $hasParameter = true;
            $sql = "SELECT year, make, model, price, description, productPic, COUNT(CommentsOn.vehicleID), drivetrain, engine, Vehicle.vehicleID, transmission FROM Vehicle LEFT OUTER JOIN CommentsOn ON Vehicle.vehicleID=CommentsOn.vehicleID WHERE (make LIKE '%$name%' OR year LIKE '%$name%' OR model LIKE '%$name%' OR price LIKE '%$name%' OR drivetrain LIKE '%$name%' OR engine LIKE '%$name%' OR transmission LIKE '%$name%')  GROUP BY vehicleID";
          }
          // (year, make, model, drivetrain, engine, transmission)
          // SELECT year, make, model, price, description, productPic, COUNT(CommentsOn.vehicleID), drivetrain, engine, Vehicle.vehicleID FROM Vehicle LEFT OUTER JOIN CommentsOn ON Vehicle.vehicleID=CommentsOn.vehicleID WHERE make LIKE tacoma GROUP BY vehicleID;
          // SELECT year, make, model, price, description, productPic, COUNT(CommentsOn.vehicleID), drivetrain, engine, Vehicle.vehicleID FROM Vehicle LEFT OUTER JOIN CommentsOn ON Vehicle.vehicleID=CommentsOn.vehicleID GROUP BY vehicleID;


          if ($connection -> connect_error) {
            die("Connection failed: " . $connection -> connect_error);
          }
          // echo "Connected to Server."; 
          if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
          } else {
          
            if ($results = mysqli_query($connection, $sql)) {
              // echo "in results";
              while ($row = mysqli_fetch_row($results)) {

                $year = $row[0]; 
                $make = $row[1]; 
                $model = $row[2]; 
                $price = $row[3]; 
                $description = $row[4]; 
                $productPic = $row[5];
                $numComments= $row[6]; 
                $drivetrain = $row[7]; 
                $engine = $row[8]; 
                $vehicleID = $row[9];
                $vehiclePicStr = $year."-".$make."-".$model;
                $vehicleName = $year." ".$make." ".$model;

                echo '<div class="searchEntry"><div class="searchCol leftCol"><div class="thumbContainer"><a href="product.php">';
                echo "<img src='./images/$vehiclePicStr.jpg'></a></div>";
                echo "<a href='product.php?id='$vehicleID' class='searchLink'>$vehicleName</a></div>";
                echo '<div class="searchCol middleCol"><div class="midTopFlex"><div class="searchPrice">';
                echo "<p>$price</p></div><div class='searchMileage'>"; // price
                echo "<p>$drivetrain</p></div><div class='searchLocation'>"; // drivetrain
                echo "<p>$engine</p></div></div>"; // engine
                echo "<div class='searchDescription'>";
                echo "<p>$description</p></div></div><div class='searchCol rightCol'>";
                echo "<a href='action/addToCart.php?id=$vehicleID&pic=$productPic' class='addToCart'>ADD TO CART</a><div class='numberComments'>";
                echo "<a href='product.php#prodComment?id='$vehicleID' class='searchLink'>";
                echo "$numComments Comments<img src='images/comment-bubble.png' class='commentBubble'></a></div></div></div>";
              }
              mysqli_free_result($results);
            }
            mysqli_close($connection);
          }
        ?>
      </section>
    </div>
    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
