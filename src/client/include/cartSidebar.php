<?php   
  if (!isset($_SESSION['username'])) {    
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

  if (!isset($_SESSION['recentlyViewedArr'])) {
  } else {
    $recentlyViewed = $_SESSION['recentlyViewedArr'];
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
      <?php 
        include './include/db_credentials.php';
        $connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();

        $sql = "SELECT year, make, model, price FROM Vehicle WHERE vehicleID=".$recentlyViewed['0'];
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
              $vehiclePicStr = $year."-".$make."-".$model;
              $vehicleName = $year." ".$make." ".$model;
              echo '<a href="product.php?id='.$recentlyViewed['0'].'">';
              echo '<img src="./images/'.$vehiclePicStr.'.jpg"><figcaption>';
              echo $vehicleName;
              echo '</figcaption><figcaption>$'.$price.'</figcaption></a>';
              echo '<a class="addCartButton" href="cart.php?id='.$recentlyViewed['0'].'&quantity=1">Add to Cart</a>';
            }
          }
        }
      ?>
    </div>
    <div class="thumbContainer">
      <?php 
        include './include/db_credentials.php';
        $connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();

        $sql = "SELECT year, make, model, price FROM Vehicle WHERE vehicleID=".$recentlyViewed['1'];
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
              $vehiclePicStr = $year."-".$make."-".$model;
              $vehicleName = $year." ".$make." ".$model;
              echo '<a href="product.php?id='.$recentlyViewed['1'].'">';
              echo '<img src="./images/'.$vehiclePicStr.'.jpg"><figcaption>';
              echo $vehicleName;
              echo '</figcaption><figcaption>$'.$price.'</figcaption></a>';
              echo '<a class="addCartButton" href="cart.php?id='.$recentlyViewed['1'].'&quantity=1">Add to Cart</a>';
            }
          }
        }
      ?>
    </div>
    <div class="thumbContainer">
      <?php 
        include './include/db_credentials.php';
        $connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();

        $sql = "SELECT year, make, model, price FROM Vehicle WHERE vehicleID=".$recentlyViewed['2'];
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
              $vehiclePicStr = $year."-".$make."-".$model;
              $vehicleName = $year." ".$make." ".$model;
              echo '<a href="product.php?id='.$recentlyViewed['2'].'">';
              echo '<img src="./images/'.$vehiclePicStr.'.jpg"><figcaption>';
              echo $vehicleName;
              echo '</figcaption><figcaption>$'.$price.'</figcaption></a>';
              echo '<a class="addCartButton" href="cart.php?id='.$recentlyViewed['2'].'&quantity=1">Add to Cart</a>';
            }
          }
        }
      ?>
    </div>
  </div>
</section>