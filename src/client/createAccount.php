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
              <h1>Create Account</h1>
                <form method="POST" action="action/newUser.php">
                <!--  enctype="multipart/form-data" -->
                  <fieldset>
                    <legend>Account Information</legend>
                    <!-- <div id="imgInput">
                        <img src="images/profilePlaceholder.png">
                        <input type="file" name="profile" accept="image/*">
                    </div> -->
                    <p>Username:</p>
                    <input name="user" type="text">
                    <p>Email:</p>
                    <input name="email" type="email">
                    <p>First name:</p>
                    <input name="firstName" type="text">
                    <p>Last name:</p>
                    <input name="lastName" type="text">
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
            <?php include "include/footer.php"; ?>
        </footer>
    </main>
</body>
</html>
