<?php session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest) GET OUT
    header("Location: login.php");
    die();
}
else{
		include 'include/db_credentials.php';
		$connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();
		$uid = $_SESSION['userID'];
		$sql = "SELECT * FROM Customer WHERE userID='$uid';";
		if($connection -> connect_error) {
              die("Connection failed: " . $connection -> connect_error);
            }
            // echo "Connected to Server.";
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                if ($results = mysqli_query($connection, $sql)) {
                    while ($row = mysqli_fetch_row($results)) {
						$first_name = $row[1];
						$last_name = $row[2];
						$address = $row[3];
						$username = $_SESSION['username'];
						$email = $_SESSION['email'];
						if($row[4]==NULL){
							$img_src = "images/profilePlaceholder.png";
						} else {
							$img_src = $row[4];
						}

                        }
                    }
                    mysqli_free_result($results);
            }
            mysqli_close($connection);
        }
?>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/mad.css"> -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/editprofile.js"></script> 
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
              <h1>User Control Panel</h1>

              <form method="POST" action="action/modAccount.php">
                <div class="shippingBilling">
                  <div id="shippingForm">
                    <fieldset>
                      <legend>User Image</legend>
                      <img id=profilePic src=<?php echo $img_src ?>>
                      <input class="accMod" type="file" name="profilePic" accept="image/*" disabled="disabled">
                    </fieldset>
                    <a class="formatButton" href="paymentMethod.php">Payment Method</a>
                    <a class="formatButton" href="orderStatus.php">Order History</a>
                    <a class="formatButton" href="commentHistory.php">Comment History</a>
                  </div>
                  <div id="billingForm">
                    <fieldset>
                      <legend>Profile</legend>
                      <h2>Username:</h2>
                      <p class=accountP><?php echo $username; ?></p>
                      <!-- <input type="text" name="billingFullName" class="required"> -->
                      <h2>Email:</h2>
                      <input type="email" name="accountEmail" class="required accMod" value="<?php echo $email; ?>" disabled="true">
                      <h2>Password:</h2>
                      <input type="password" name="accountPassword" class="required accMod" value="" disabled="true">
                      <h2 class="hide">Confirm Password:</h2>
                      <input type="password" class="required accMod hide" value="" disabled="true">
                      <h2>First Name:</h2>
                      <input type="text" name="accountFirstName" class="required accMod" value="<?php echo $first_name; ?>" disabled="true">
                      <h2>Last Name:</h2>
                      <input type="text" name="accountLastName" class="required accMod" value="<?php echo $last_name; ?>" disabled="true">
                    </fieldset>
                    <!-- <a class="accountButton" id="editProfile" href="cart.php">Edit Profile</a>
                    <a class="accountButton" id="saveProfile" href="cart.php">Save Changes</a> -->
                    <input type="button" id="editProfile" value="Edit Profile" class="formatButton" onclick="editProfile()">
                    <input type="submit" id="saveProfile" value="Save Changes" class="formatButton accMod">
                  </div>
                </div>
              </form>
            </section>
        </div>

        <?php include "include/footer.php" ?>

    </main>

</body>

</html>
