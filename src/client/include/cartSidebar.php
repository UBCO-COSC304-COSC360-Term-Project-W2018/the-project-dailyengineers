<?php   
  if (!isset($_SESSION['username'])) {
    $recentlyViewed = new SplFixedArray(3);
    
  } else {
    $sql = "SELECT v.vehicleID, price, quantity, userID FROM Vehicle v, CartContents c WHERE v.vehicleID = c.vehicleID and userID =";
    $quantityTotal = 0;
    $subtotal = 0;
    include './include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error      = mysqli_connect_error();
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
        if ($results = mysqli_query($connection, $sql)) {
        // echo "in results";
        while ($row = mysqli_fetch_row($results)) {
          $vehicleID = $row[0]; 
          $price = $row[1]; 
          $quantity = $row[2];
          $subtotal += $price*$quantity;
          $quantityTotal += $quantity;
        }
        mysqli_free_result($results);
      }
      mysqli_close($connection);
    }
  }
?>

<section class="cartLeftSidebar">
  <div class="cartSubtotal">
    <h1>Subtotal:</h1>
    <?php echo '<p>$'.str_replace("USD","$",money_format('%i',$subtotal)).'</p>' ?>
    <div class="displaySubtotal">
    </div>
  </div>
  <div class="cartItemCount">
    <h1>Quantity:</h1>
    <?php echo "<p>".$quantityTotal." Items</p>" ?>
    <div class="displayItemCount">
    </div>
  </div>
  <div class="cartCheckout">
    <a class="checkoutButton" href="checkout.php">Proceed to Checkout</a>
  </div>
  <div class="cartRecentlyViewed">
    <h1>Recently Viewed:</h1>
    <div class="thumbContainer">
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