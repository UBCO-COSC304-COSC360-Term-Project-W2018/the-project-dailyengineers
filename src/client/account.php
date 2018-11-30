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
    <title>COSC VE Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <?php include 'include/header.php';?>

    <main>

        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <form method="GET" action="#">
                    <div class="left">
                        <fieldset id="imgInput">
                            <img src="images/profilePlaceholder.png">
                            <input type="file" name="profile" accept="image/*">
                        </fieldset>
                        <a href="paymentMethod.php"><button>Payment Method</button></a>
                        <a href="orderStatus.php"><button>Orders</button></a>
                        <a href="commentHistory.php"><button>Comment History</button></a>
                    </div>
                    <fieldset class="acRight">
                        <h3>Username:</h3>
                        <input name="user" type="text">
                        <p>Lord_Vader</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Email:</h3>
                        <input name="email" type="email">
                        <p>darksider@hotmail.com</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Password:</h3>
                        <input name="pass" type="password">
                        <h3 class="passConfirmh3">Confirm Password:</h3>
                        <input id="passConfirm" type="password">
                        <div></div>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>First name:</h3>
                        <input name="firstname" type="text">
                        <p>Anakin</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Last name:</h3>
                        <input name="lastname" type="text">
                        <p>Skywalker</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Address:</h3>
                        <input name="addr" type="text">
                        <p>423 Lava Rd. Mustafar</p>
                        <button>Edit</button>
                    </fieldset>
                    <input id="saveBt" class="acRight" type="submit" value="Save Changes">
                </form>
            </section>
        </div>

        <?php include "include/footer.php" ?>

    </main>

</body>

</html>
