<?php session_start();
if (isset($_SESSION['username'])) {
    //logged in already?
    header("Location: account.php");
    die();
}
if(isset($_GET['email'])) {
    // "Confirm email is legit in system"
    include 'include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error      = mysqli_connect_error();
    $emailAddr = $_GET["email"];
    $sql = "SELECT username FROM User WHERE email = ?;";//if the preparation goes through and there were no errors with the upload
    if ($statement = mysqli_prepare($connection, $sql)) {
        // prepared statement insertion
        mysqli_stmt_bind_param($statement, "s", $emailAddr);
        // execute statement
        mysqli_execute($statement);
        mysqli_stmt_bind_result($statement, $results);
        if($results != null) {//we have any values
            // generate token in passReset table with hashed token as the primary field and timestamp and email as colum fields 
            $token = "<PLACEHOLDER>";
            //send off email
            $mail = "Your password authentication token is: ".$token;
            $mail = wordwrap($msg,70);
            if(mail($_GET['email'],"password Reset",$mail)) {
                //mail successfully sent!
            } else {
                //Mail failed to send
            }
        }    
    }
}
//Reset the users Password if the reset token timestamp hasn't expired and the mail matches the token
?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE pass Reset</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/passReset.css">
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
              <h1>Reset Password</h1>
                <div class="centerBox">
                    <form id="default" method="GET" action="passReset.php">
                        <h3>Account Email</h3>
                        <input name="email" type="email">
                        <input id="send code" type="submit" value="Send Reset Code">
                    </form>
                    <!-- should swap from one to the other when either the user click send or they follow the link in email -->
                    <form id="sent" method="POST" action="#">
                        <h3>Reset Code</h3>
                        <input name="code" type="text">
                        <h3>Account Email</h3>
                        <input name="emailConfirm" type="email">
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
