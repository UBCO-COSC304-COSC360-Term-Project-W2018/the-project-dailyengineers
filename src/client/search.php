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
              <h2>Mileage</h2>
              <h2>Location:</h2>
            </div>
          </div>
          <!-- <div class="titleCol rightCol">
            <h2>Purchase:</h2>
          </div> -->
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.html"><img src="images/bentleyThumb.jpg"></a>
            </div>
            <a href="product.html" class="searchLink">2018 Bentley Continental G3</a>
          </div>

          <div class="searchCol middleCol">
            <div class="midTopFlex">
              <div class="searchPrice">
                <p>$1,000,000</p>
              </div>
              <div class="searchMileage">
                <p>3,457km</p>
              </div>
              <div class="searchLocation">
                <p>London, England</p>
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
            <a href="cart.html" class="addToCart">ADD TO CARD</a>
            <div class="numberComments">
              <a href="product.html#prodComment" class="searchLink">2 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.html"><img src="images/singerTHumb.jpg"></a>
            </div>
            <a href="product.html" class="searchLink">1988 Porsche 911 Carrera Targa</a>
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
            <a href="cart.html" class="addToCart">ADD TO CARD</a>
            <div class="numberComments">
              <a href="product.html#prodComment" class="searchLink">7 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.html"><img src="images/rs5Thumb.jpg"></a>
            </div>
            <a href="product.html" class="searchLink">2017 Audi RS5</a>
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
            <a href="cart.html" class="addToCart">ADD TO CARD</a>
            <div class="numberComments">
              <a href="product.html#prodComment" class="searchLink">5 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

        <div class="searchEntry">
          <div class="searchCol leftCol">
            <div class="thumbContainer">
              <a href="product.html"><img src="images/edoThumb.jpg"></a>
            </div>
            <a href="product.html" class="searchLink">2018 Mercedes AMG GTR</a>
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
            <a href="cart.html" class="addToCart">ADD TO CARD</a>
            <div class="numberComments">
              <a href="product.html#prodComment" class="searchLink">11 Comments<img src="images/comment-bubble.png" class="commentBubble"></a>
            </div>
          </div>
        </div>

      </section>
    </div>

    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
