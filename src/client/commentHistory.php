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
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <section class="mainPageBody">
                    <div class="adminDiv">
                        <p class="subtitleAdmin">Comment History</p>
                    </div>
                    <div class="adminDiv">
                        <p>Comment</p>
                        <p>OH HELLO THERE!!!</p>
                    </div>
                    <div class="adminDiv">
                        <p>Comment</p>
                        <p>Now that's high octane racing!</p>
                    </div>
                    <div class="adminDiv">
                        <p>Comment</p>
                        <p>KACHOW!</p>
                    </div>
                </section>
            </section>
        </div>
        <?php include "include/footer.php" ?>
    </main>
</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>
