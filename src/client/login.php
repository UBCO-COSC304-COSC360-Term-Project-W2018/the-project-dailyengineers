<?php session_start(); if (isset($_SESSION['username'])) { //not logged in (Guest) GET OUT
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
    <link rel="stylesheet" href="css/validation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <h1>Login/Create Account</h1>
                <div class="centerBox">
                    <form method="POST" action="action/loginAction.php">
                        <h3>Username</h3>
                        <input name="username" type="textBox" class="required">
                        <h3>Password</h3>
                        <input name="password" type="password" class="required">
                        <input id="login" class="formatButton" type="submit" value="Login">
                    </form>
                    <div id="options">
                        <a class="formatButton" href="createAccount.php">Create Account</a>
                        <a class="formatButton" href="passReset.php">Forgot Password</a>
                    </div>

                </div>

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
