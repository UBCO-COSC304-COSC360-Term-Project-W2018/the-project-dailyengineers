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
    <title>COSC VE pass Reset</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/passReset.css">
</head>

<body>

    <?php include 'include/header.php';?>

    <main>

        <div class="columnContainer">

            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
              <h1>Reset Password</h1>
                <div class="centerBox">
                    <form id="default" method="GET" action="#">
                        <h3>Account Email</h3>
                        <input name="email" type="email">
                        <input id="send code" type="submit" value="Send Reset Code">
                    </form>
                    <!-- should swap from one to the other when either the user click send or they follow the link in email -->
                    <form id="sent" method="POST" action="#">
                        <h3>Reset Code</h3>
                        <input name="code" type="text">
                        <h3>New Password</h3>
                        <input id="newPass" name="pass" type="password">
                        <h3>Confirm Password</h3>
                        <input id="newPassConfirm" type="password">
                        <input id="sendCode" type="submit" value="Reset Password">
                    </form>
                </div>
            </section>
        </div>

        <?php include "include/footer.php" ?>

    </main>

</body>

</html>
