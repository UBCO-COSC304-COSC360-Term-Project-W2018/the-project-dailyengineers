<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title>Vehicle Emporium</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/cart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

  <?php include 'include/header.php';?>

  <main>
    <div class="columnContainer">
      <?php include 'include/cartSidebar.php';?>

      <section class="mainView">
        <h1>Shopping Cart</h1>
        <?php 
          include 'include/db_credentials.php';
          $connection = mysqli_connect($host, $user, $password, $database);
          $error      = mysqli_connect_error();
          $sql = "SELECT year, make, model, price, quantity, v.vehicleID FROM Vehicle v, CartContents c WHERE v.vehicleID = c.vehicleID and userID =";
          
          
          if ($connection -> connect_error) {
            die("Connection failed: " . $connection -> connect_error);
          }
          // echo "Connected to Server."; 
          if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
          } else {
            $userID = $_SESSION['userID'];
            $sql = $sql.$userID;
            // echo "outside of results";
            if ($results = mysqli_query($connection, $sql)) {
              // echo "in results";
              if($results->num_rows === 0) {
                echo "Cart is Empty. SKRRRRT on over to our vehicle fleet.";
              }
              while ($row = mysqli_fetch_row($results)) {
                $year = $row[0]; 
                $make = $row[1]; 
                $model = $row[2]; 
                $price = $row[3]; 
                $quantity = $row[4]; 
                $vehicleID = $row[5];
                $vehiclePicStr = $year."-".$make."-".$model;
                $vehicleName = $year." ".$make." ".$model;
                $productLink = "product.php?id='".$vehicleID."'";

                echo '<div class="cartEntry"><div class="cartCol leftCol"><div class="thumbContainer">';
                echo '<a href="'.$productLink.'"><img src="images/'.$vehiclePicStr.'.jpg"></a></div></div>';
                echo '<div class="cartCol middleCol"><div class="cartProductName">';
                echo '<a href="'.$productLink.'" class="searchLink">'.$vehicleName.'</a></div></div>';
                echo '<div class="cartCol rightCol"><div class="cartPrice"><p>Unit Price:</p>';
                echo '<p>'.str_replace("USD","$",money_format('%i',$price)).'</p></div>';
                echo '<div class="cartPrice"><p>Quantity:</p>';
                echo '<p>'.$quantity.'</p></div>';
                echo '<div class="cartDeleteContainer"><a class="formatButton" href="action/removeFromCart.php?id='.$vehicleID.'">Remove Item</a></div></div></div>';
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
