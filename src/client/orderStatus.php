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
                        <p class="subtitleAdmin">Order Status</p>
                        <div class="statusBar">
                            <div class="progressIn"></div>
                            <p id="ordered">Ordered</p>
                            <p id="shipped">Shipped</p>
                            <p id="delivered">Delivered</p>
                            <p>Porsche - Project Gold - $4.1m</p>
                        </div>
                    </div>
                    <div class="adminDiv">
                        <p>Delivered</p>
                        <p>Ford - Focus RS - $32K</p>
                    </div>
                    <div class="adminDiv">
                        <p>Delivered</p>
                        <p>Renault - Megane RS - $65K</p>
                    </div>
                </section>
            </section>
        </div>
        <?php include "footer.php" ?>
    </main>
</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>