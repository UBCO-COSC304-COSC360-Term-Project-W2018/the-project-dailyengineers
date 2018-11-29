<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium - Create Account</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/createAccount.css">
</head>

<body>

    <?php include 'header.php';?>

    <main>

        <div class="columnContainer">

            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->

            <section class="mainView">
              <h1>Create Account</h1>
                <form action="account.html">
                  <fieldset>
                    <legend>Account Information</legend>
                    <div id="imgInput">
                        <img src="images/220px-Darth_Vader.jpg">
                        <input type="file" name="profile" accept="image/*">
                    </div>

                    <p>Username:</p>
                    <input name="user" type="text">
                    <p>Email:</p>
                    <input name="email" type="email">
                    <p>Password:</p>
                    <input name="pass" type="password">
                    <p>Confirm Password:</p>
                    <input type="password">
                    <br />
                    <input id="createButton" type="submit" value="Create Account">
                  </fieldset>
                </form>
            </section>
        </div>

        <footer>

        </footer>

    </main>

</body>

</html>
