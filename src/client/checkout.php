<?php session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest) GET OUT
    header("Location: login.php");
    die();
}?>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

  <?php include 'include/header.php';
    include "include/money_format_windows.php";?>

  <main>

    <div class="columnContainer">
      <?php include 'include/checkoutSidebar.php';

      ?>

      <section class="mainView">
        <h1>Checkout</h1>

        <form method="POST" action="action/checkoutAction.php">
          <!-- <form method="POST" action="http://www.randyconnolly.com/tests/process.php"> -->
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
                <label class="hoverLabel"><input type="checkbox" name="sameAsShipping" value="checked"> Same as Shipping</label>
              </fieldset>
            </div>
          </div>
          <!-- <div class=paymentMethodContainer> -->
          <div id="paymentMethod">
            <fieldset>
              <legend>Payment Method</legend>
              <label id="savedCardLegend" class="hoverLabel"><input type="radio" name="cardRadio" value="savedCard"> Saved Card (Ending in ####)</label>
              <fieldset>
                <legend id="radioLegend"><label class="hoverLabel"><input type="radio" name="cardRadio" value="newCard"> New Card</label></legend>
                <h2>Card Number:</h2>
                <input type="text" name="cardNumber" id="cardNumber" class="required">
                <h2>Expiry Date:</h2>
                <input type="text" name="cardExpiry" id="cardExpiry" class="required">
                <h2>CVV:</h2>
                <input type="text" name="cardCVV" id="cardCVV" class="required">
                <label class="hoverLabel"><input type="checkbox" name="savePaymentMethod" value="checked" class="savePaymentCheckbox"> Save Payment Method</label>
              </fieldset>
            </fieldset>
          </div>
          <!-- </div> -->
          <div id="shippingMethod">
            <fieldset>
              <legend>Shipping Method</legend>
              <label class="hoverLabel"><input type="radio" onclick="myFunction('<?php echo $shipPrice; ?>')" name="shippingMethod" value="cargo"> Cargo Ship (25 - 60 Days)</label>
              <label class="hoverLabel"><input type="radio" onclick="myFunction('<?php echo $shipPrice; ?>')" name="shippingMethod" value="air"> Air Express (7 - 24 Days)</label>
            </fieldset>
          </div>
          <div id="checkoutTotals">
            <fieldset>
              <legend>Price Breakdown</legend>
              <h2>Subtotal:</h2>
                <?php echo '<p>$'.str_replace("USD","$",money_format('%i',$subtotal)).'</p>' ?>
                <h2>Shipping</h2>
                <p>FREE!</p>
                <hr>
                <h2>Total</h2>
                <?php echo '<p>$'.str_replace("USD","$",money_format('%i',$subtotal)).'</p>' ?>
                <input value="<?php echo $subtotal ?>" name="totalPrice" type="hidden">
                <input value="<?php echo $vehicleID ?>" name="vehicleID" type="hidden">
                <input type="submit" value="Submit Order" class="checkoutButton submitOrder">
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

    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
