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
              <h2>Colour:</h2>
            </div>
          </div>
          <!-- <div class="titleCol rightCol">
            <h2>Purchase:</h2>
          </div> -->
        </div>

        <?php
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
            $sql = "SELECT year, make, model, price, description, productPic FROM Vehicle";
          } else {
            echo("<h2>Vehicles containing '" . $name . "'</h2>");
            $hasParameter = true;
            $sql = "SELECT year, make, model, price, description, productPic, SUM(commentID), drivetrain, engine FROM Vehicle NATURAL JOIN CommentsOn WHERE productName LIKE %'$name'% GROUP BY vehicleID";
          }

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
              while ($row = mysqli_fetch_row($results)) {
                echo '<div class="searchEntry"><div class="searchCol leftCol"><div class="thumbContainer"><a href="product.php">';
                $vehiclePicStr = $row['0']."-".$row['1']."-".$row['2'];
                echo "<img src='images/'$vehiclePicStr'.jpg'></a></div>";
                $vehicleName = $row['0']." ".$row['1']." ".$row['2'];
                echo "<a href='product.php' class='searchLink'>'$vehicleName'</a></div>";
                echo '<div class="searchCol middleCol"><div class="midTopFlex"><div class="searchPrice">';
                echo "<p>'$row["3"]'</p></div><div class=searchMileage'>";
                echo "<"
              }
            }
              mysqli_free_result($results);
          }
          mysqli_close($connection);
        ?>



        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.php"><img src="images/singerThumb.jpg"></a>
            </div>
            <a href="product.php" class="searchLink">1988 Porsche 911 Carrera Targa</a>
          </div>

          <div class="searchCol middleCol">
            <div class="midTopFlex">
              <div class="searchPrice">
                <p>$167,000</p>
              </div>
              <div class="searchMileage">
                <!-- <img id="test" src="images/odometer.png"> -->
                <p>35,859km</p>
              </div>
              <div class="searchLocation">
                <p>Berlin, Germany</p>
              </div>
            </div>
            <div class="searchDescription">
              <!-- <h2>Description</h2> -->
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta, diam ut malesuada pellentesque, tellus enim efficitur eros, in pharetra enim tellus id neque. Vestibulum aliquam finibus enim, ut eleifend quam egestas non.
                Quisque
                consequat consectetur elit. Vivamus dapibus dolor nec diam posuere, eget ornare nisl faucibus.</p>
            </div>
          </div>

          <div class="searchCol rightCol">
            <a href="cart.php" class="addToCart">ADD TO CART</a>
            <div class="numberComments">
              <a href="product.php#prodComment" class="searchLink">7 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.php"><img src="images/rs5Thumb.jpg"></a>
            </div>
            <a href="product.php" class="searchLink">2017 Audi RS5</a>
          </div>

          <div class="searchCol middleCol">
            <div class="midTopFlex">
              <div class="searchPrice">
                <p>$70,875</p>
              </div>
              <div class="searchMileage">
                <p>12,589km</p>
              </div>
              <div class="searchLocation">
                <p>Vancouver, Canada</p>
              </div>
            </div>
            <div class="searchDescription">
              <h2>Description</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta, diam ut malesuada pellentesque, tellus enim efficitur eros, in pharetra enim tellus id neque. Vestibulum aliquam finibus enim, ut eleifend quam egestas non.
                Quisque
                consequat consectetur elit. Vivamus dapibus dolor nec diam posuere, eget ornare nisl faucibus.</p>
            </div>
          </div>

          <div class="searchCol rightCol">
            <a href="cart.php" class="addToCart">ADD TO CART</a>
            <div class="numberComments">
              <a href="product.php#prodComment" class="searchLink">5 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.php"><img src="images/edoThumb.jpg"></a>
            </div>
            <a href="product.php" class="searchLink">2018 Mercedes AMG GTR</a>
          </div>

          <div class="searchCol middleCol">
            <div class="midTopFlex">
              <div class="searchPrice">
                <p>$228,164</p>
              </div>
              <div class="searchMileage">
                <p>1,867km</p>
              </div>
              <div class="searchLocation">
                <p>Shanghai, China</p>
              </div>
            </div>
            <div class="searchDescription">
              <h2>Description</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta, diam ut malesuada pellentesque, tellus enim efficitur eros, in pharetra enim tellus id neque. Vestibulum aliquam finibus enim, ut eleifend quam egestas non.
                Quisque
                consequat consectetur elit. Vivamus dapibus dolor nec diam posuere, eget ornare nisl faucibus.</p>
            </div>
          </div>

          <div class="searchCol rightCol">
            <a href="cart.php" class="addToCart">ADD TO CART</a>
            <div class="numberComments">
              <a href="product.php#prodComment" class="searchLink">11 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

      </section>
    </div>

    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
