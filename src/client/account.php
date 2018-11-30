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
		$uid = $_SESSION['userID']
		$sql = "SELECT * FROM Customer WHERE userID='$uid';";
			if($connection -> connect_error) {
                die("Connection failed: " . $connection -> connect_error);
            }
            echo "Connected to Server."; 
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
                        mysqli_free_result($results);
                        mysqli_close($connection);
						
                        }
                    }
                    mysqli_free_result($results);
            }
            mysqli_close($connection);
        }
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

    <main>
		<?php 	include 'include/header.php'; ?>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
                <form method="GET" action="#">
                    <div class="left">
                        <fieldset id="imgInput">
                            <img src=<?php echo $img_src ?>>
                            <input type="file" name="profile" accept="image/*">
                        </fieldset>
                        <a href="paymentMethod.php"><button>Payment Method</button></a>
                        <a href="orderStatus.php"><button>Orders</button></a>
                        <a href="commentHistory.php"><button>Comment History</button></a>
                    </div>
                    <fieldset class="acRight">
                        <h3>Username:</h3>
                        <input name="user" type="text">
                        <p><?php echo $username; ?></p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Email:</h3>
                        <input name="email" type="email">
                        <p><?php echo $email; ?></p>
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
                        <p><?php echo $first_name; ?></p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Last name:</h3>
                        <input name="lastname" type="text">
                        <p><?php echo $last_name; ?></p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Address:</h3>
                        <input name="addr" type="text">
                        <p><?php echo $address; ?></p>
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
