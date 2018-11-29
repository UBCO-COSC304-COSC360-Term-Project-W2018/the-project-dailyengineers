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
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/orderProgress.css">
</head>

<body>

    <?php include 'header.php';?>
	
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <section class="mainPageBody">
                    <div class="adminDiv">
                        <p class="subtitleAdmin">Payment Method</p>
                        <div class="paymentContainer">
                            <form action="">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="name"></i> Full Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="Dale M. Earnheardt">
                                <label for="email"><i class="email"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="dale@earnheardt.com">
                                <label for="adr"><i class="address"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Nascar Street">
                                <label for="city"><i class="city"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="New York">
                                <label for="">Card Number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                <label>EXP DATE</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2018">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="232">
                            </form>
                        </div>
                    </div>
                </section>
            </section>
        </div>
		
        <?php include "footer.php" ?>
		
    </main>
</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>