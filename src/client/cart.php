<?php session_start(); ?>
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

    <div class="columnContainer">

      <section class="cartLeftSidebar">
        <div class="cartSubtotal">
          <h1>Subtotal:</h1>
          <p>$xxx,xxx.00</p>
          <div class="displaySubtotal">
          </div>
        </div>

        <div class="cartItemCount">
          <h1>Quantity:</h1>
          <p>x items</p>
          <div class="displayItemCount">
          </div>
        </div>

        <div class="cartCheckout">
            <a class="checkoutButton" href="checkout.html">Proceed to Checkout</a>
        </div>

        <div class="cartRecentlyViewed">
          <h1>Recently Viewed:</h1>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/bentleyThumb.jpg"><figcaption>2018 Bentley Continental GT3</figcaption><figcaption>$1,000,000</figcaption></a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/edoThumb.jpg"><figcaption>2018 Mercedes AMG GTR</figcaption><figcaption>$228,164</figcaption></a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/singerThumb.jpg"><figcaption>1988 Porsche 911 Carrera Targa</figcaption><figcaption>$167,000</figcaption></a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
        </div>
      </section>

      <section class="mainView">
        <h1>Shopping Cart</h1>

        <div class="cartEntry">
          <div class="cartCol leftCol">
            <div class="thumbContainer">
              <a href="product.html"><img src="images/bentleyThumb.jpg"></a>
            </div>
          <!-- <a href="product.html" class="searchLink">2018 Bentley Continental GT3</a> -->
          </div>
          <div class="cartCol middleCol">
            <!-- <div class="midFlex"> -->
              <div class="cartProductName">
                <p>2018 Bentley Continental GT3</p>
              </div>
              <div class="cartDeleteContainer">
                <a class="cartDelete" href="cart.html">Remove Item</a>
              </div>
            <!-- </div> -->
          </div>
          <div class="cartCol rightCol">
            <div class="cartPrice">
              <p>Price:</p>
              <p>$1,000,000</p>
            </div>
          </div>
        </div>

      </section>
    </div>

    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
