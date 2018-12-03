<?php session_start();
if (!isset($_SESSION['username'])) { //not logged in (Guest) GET OUT
    header("Location: index.php");
    die();
    }?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/loginout.css">
    <!-- <link rel="stylesheet" href="css/validation.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

</head>

<body>
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <h1>Order Confirmation</h1>
                <div class="centerBox">
                  <p>Thank you for your order!</p>
                </div>
            </section>
        </div>

        <?php include "include/footer.php" ?>

    </main>

</body>

</html>
