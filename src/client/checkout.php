<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title>Vehicle Emporium</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/validation.css">
  <script type="text/javascript" src="js/validation.js"></script>
</head>

<body>

  <?php include 'header.php';?>

  <main>

    <div class="columnContainer">

      <section class="cartLeftSidebar">
        <div class="cartSubtotal">
          <h1>Total:</h1>
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
          <a class="checkoutButton" href="checkout.html">Submit Order</a>
        </div>

        <div class="cartRecentlyViewed">
          <h1>Recently Viewed:</h1>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/bentleyThumb.jpg">
              <figcaption>2018 Bentley Continental GT3</figcaption>
              <figcaption>$1,000,000</figcaption>
            </a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/edoThumb.jpg">
              <figcaption>2018 Mercedes AMG GTR</figcaption>
              <figcaption>$228,164</figcaption>
            </a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
          <div class="thumbContainer">
            <a href="product.html"><img src="images/singerThumb.jpg">
              <figcaption>1988 Porsche 911 Carrera Targa</figcaption>
              <figcaption>$167,000</figcaption>
            </a>
            <a class="addCartButton" href="cart.html">Add to Cart</a>
          </div>
        </div>
      </section>

      <section class="mainView">
        <h1>Checkout</h1>

        <form method="post" action="http://www.randyconnolly.com/tests/process.php">
          <div class="shippingBilling">
            <div id="shippingForm">
              <fieldset>
                <legend>Shipping</legend>
                <h2>Full Name:</h2>
                <input type="text" name="shippingFullName" class="required">
                <h2>Address:</h2>
                <input type="text" name="shippingAddress" class="required">
                <h2>City:</h2>
                <input type="text" name="shippingCity" class="required">
                <h2>State/Province:</h2>
                <input type="text" name="shippingStateProvince" class="required">
                <h2>Country:</h2>
                <input type="text" name="shippingCountry" class="required">
                <h2>Postal Code/ZIP:</h2>
                <input type="text" name="shippingPostalCodeZIP" class="required">
              </fieldset>
            </div>
            <div id="billingForm">
              <fieldset>
                <legend>Billing</legend>
                <h2>Full Name:</h2>
                <input type="text" name="billingFullName" class="required">
                <h2>Address:</h2>
                <input type="text" name="billingAddress" class="required">
                <h2>City:</h2>
                <input type="text" name="billingCity" class="required">
                <h2>State/Province:</h2>
                <input type="text" name="billingStateProvince" class="required">
                <h2>Country:</h2>
                <input type="text" name="billingCountry" class="required">
                <h2>Postal Code/ZIP:</h2>
                <input type="text" name="billingPostalCodeZIP" class="required">
                <label><input type="checkbox" name="sameAsShipping" value="checked"> Same as Shipping</label>
              </fieldset>
            </div>
          </div>
          <!-- <div class=paymentMethodContainer> -->
          <div id="paymentMethod">
            <fieldset>
              <legend>Payment Method</legend>
              <label id="savedCardLegend"><input type="radio" name="cardRadio" value="savedCard"> Saved Card (Ending in ####)</label>
              <fieldset>
                <legend id="radioLegend"><label><input type="radio" name="cardRadio" value="newCard"> New Card</label></legend>
                <h2>Card Number:</h2>
                <input type="text" name="cardNumber" class="cardNumber" class="required">
                <h2>Expiry Date:</h2>
                <input type="text" name="cardExpiry" class="cardExpiry" class="required">
                <h2>CVV:</h2>
                <input type="text" name="cardCVV" class="cardCVV" class="required">
                <label><input type="checkbox" name="savePaymentMethod" value="checked" class="savePaymentCheckbox"> Save Payment Method</label>
              </fieldset>
            </fieldset>
          </div>
          <!-- </div> -->
          <div id="shippingMethod">
            <fieldset>
              <legend>Shipping Method</legend>
              <label><input type="radio" name="shippingMethod" value="cargo"> Cargo Ship (25 - 60 Days)</label>
              <label><input type="radio" name="shippingMethod" value="airExpress"> Air Express (7 - 24 Days)</label>
            </fieldset>
          </div>
          <div id="checkoutTotals">
            <fieldset>
              <legend>Price Breakdown</legend>
              <h2>Subtotal:</h2>
              <p>$xxx,xxx.00
                <h2>Shipping</h2>
                <p>$x,xxx.00</p>
                <hr>
                <h2>Total</h2>
                <p>$xxx,xxx.00</p>
                <input type="submit" value="Submit Order" class="checkoutButton">
            </fieldset>
          </div>
        </form>


        <div id="createError" class="error">
          <div class="errorContent">
            <h2 id="errorMessage">Required fields are empty. Please check for and complete highlighted fields.</h2>
            <p>Click outside this window to close.</p>
          </div>
        </div>

      </section>
    </div>

    <?php include "footer.php" ?>

  </main>

</body>

</html>
