<?php session_start();?>
<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title>Vehicle Emporium</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/cart.css">
</head>

<body>

  <?php include 'include/header.php';?>

  <main>
    <?php
// include 'include/money_format_windows.php'; //Only required on windows PCs
// Get the current list of products
$vehicleList = null;
include './include/db_credentials.php';

$connection = mysqli_connect($host, $user, $password, $database);
$error      = mysqli_connect_error();

if (isset($_SESSION['vehicleList'])) {
    $vehicleList = $_SESSION['vehicleList'];
    echo '<div class="columnContainer"><section class="cartLeftSidebar"><div class="cartSubtotal"><h1>Subtotal:</h1>';
    $total         = 0;
    $quantityTotal = 0;
    $sql           = "SELECT price FROM Vehicle WHERE vehicleID='$vehicleList["id"]'";

    foreach ($vehicleList as $id => $prod) {
        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }
        // echo "Connected to Server.";
        if ($error != null) {
          $output = "<p>Unable to connect to database!</p>";
          exit($output);
        } else {
          if ($results = mysqli_query($connection, $sql)) {
            // echo "in results";
            while ($row = mysqli_fetch_row($results)) {
              $price = $row['0'];
            }
            mysqli_free_result($results);
          }
          mysqli_close($connection);
        }
        
        $total         = $total + $prod['quantity'] * $price;
        $quantityTotal = $quantityTotal + $prod['quantity'];
    }

    echo "<p>$$total</p";
    echo '<div class="displaySubtotal"></div></div><div class="cartItemCount"><h1>Quantity:</h1>';
    echo '<p>"$quantityTotal"</p>';
    echo '<div class="displayItemCount"></div></div><div class="cartCheckout"><a class="checkoutButton" href="checkout.php">Proceed to Checkout</a></div><div class="cartRecentlyViewed"><h1>Recently Viewed:</h1><div class="thumbContainer">';

    $total = 0;
    foreach ($vehicleList as $id => $prod) {
        //   echo("<tr><td>". $prod['id'] . "</td>");
        //   echo("<td>" . $prod['name'] . "</td>");

        //   echo("<td align=\"center\">". $prod['quantity'] . "</td>");
        //$price = $prod['price'];

        // echo("<td align=\"right\">".str_replace("USD","$",money_format('%i',$price))."</td>");
        // echo("<td align=\"right\">" . str_replace("USD","$",money_format('%i',$prod['quantity']*$price)) . "</td></tr>");
        // echo("</tr>");
        // $total = $total + $prod['quantity']*$price;
        echo '<a href="product.php"><img src="images/bentleyThumb.jpg"><figcaption>2018 Bentley Continental GT3</figcaption><figcaption>$1,000,000</figcaption></a>';

    }

    echo ("<h2><a href=\"checkout.php\">Check Out</a></h2>");
} else {
    echo ("<H1>Your shopping cart is empty!</H1>");
}
?>


          
            <a href="product.php"><img src="images/bentleyThumb.jpg"><figcaption>2018 Bentley Continental GT3</figcaption><figcaption>$1,000,000</figcaption></a>
            <a class="addCartButton" href="cart.php">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.php"><img src="images/edoThumb.jpg"><figcaption>2018 Mercedes AMG GTR</figcaption><figcaption>$228,164</figcaption></a>
            <a class="addCartButton" href="cart.php">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.php"><img src="images/singerThumb.jpg"><figcaption>1988 Porsche 911 Carrera Targa</figcaption><figcaption>$167,000</figcaption></a>
            <a class="addCartButton" href="cart.php">Add to Cart</a>
          </div>
        </div>
      </section>

      <section class="mainView">
        <h1>Shopping Cart</h1>

        <div class="cartEntry">
          <div class="cartCol leftCol">
            <div class="thumbContainer">
              <a href="product.php"><img src="images/bentleyThumb.jpg"></a>
            </div>
          <!-- <a href="product.php" class="searchLink">2018 Bentley Continental GT3</a> -->
          </div>
          <div class="cartCol middleCol">
            <!-- <div class="midFlex"> -->
              <div class="cartProductName">
                <p>2018 Bentley Continental GT3</p>
              </div>
              <div class="cartDeleteContainer">
                <a class="cartDelete" href="cart.php">Remove Item</a>
              </div>
            <!-- </div> -->
          </div>
          <div class="cartCol rightCol">
            <div class="cartPrice">
              <p>Price:</p>
              <p>$1,000,000</p>
            </div>
            <div class="cartPrice">
              <p>Quantity:</p>
              <p>3</p>
            </div>
          </div>
        </div>

      </section>
    </div>

    <?php include "include/footer.php"?>

  </main>

</body>

</html>
