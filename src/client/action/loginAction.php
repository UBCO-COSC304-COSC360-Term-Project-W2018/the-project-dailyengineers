<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        //Check if we have data
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            include '../include/db_credentials.php';

            $connection = mysqli_connect($host, $user, $password, $database);
            $error      = mysqli_connect_error();

            $username = $_POST["username"];
            $sql = "SELECT * FROM User WHERE username='$username';";

            if($connection -> connect_error) {
                die("Connection failed: " . $connection -> connect_error);
            }
            echo "Connected to Server.";
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                echo "Connected to Database.";
                if ($results = mysqli_query($connection, $sql)) {
                    while ($row = mysqli_fetch_row($results)) {
                        echo "post pass: " . $_POST['password'];
                        echo "row pass: " . $row[2];

                        if (md5($_POST['password']) == $row[2]) {
                            //Update session Superglobal
                            $_SESSION['username'] = $_POST['username'];
                            echo $_SESSION['username'];
                            $_SESSION['userID'] = $row[0];
							$_SESSION['email'] = $row[3];
                            $_SESSION['recentlyViewedArr'] = array(0, 0, 0);
                            //Release Values
                            mysqli_free_result($results);
                            mysqli_close($connection);
                            //redirect
                            header("Location: ../index.php");
                            die();
                        }
                    }
                    mysqli_free_result($results);
                }
                mysqli_close($connection);
            }
        }
        // Data Bad
        header("Location: ../login.php");
        die();
    } else {
        // Already Logged In
        header("Location: ../index.php");
        die();
    }
}

?>
