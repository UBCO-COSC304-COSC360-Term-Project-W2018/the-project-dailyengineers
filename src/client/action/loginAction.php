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
                        $enSQL = "SELECT isActive FROM Customer WHERE userID = ".$row[0].";";
                        $magicRes = mysqli_query($connection, $enSQL);
                        $magic = mysqli_fetch_row($magicRes);
                        //check if admin
                        $sql = "SELECT * FROM Admin WHERE userID='$uid'";
                        if ($connection -> connect_error) {
                            die("Connection failed: " . $connection -> connect_error);
                        }
                        // echo "Connected to Server.";
                        if ($error != null) {
                            $output = "<p>Unable to connect to database!</p>";
                            exit($output);
                        } else {
                            if ($result = mysqli_query($connection, $sql)) {
                                if (mysqli_fetch_row($result)) {
                                    mysqli_free_result($results);
                                    $result = true;
                                } else {
                                    mysqli_free_result($results);
                                }
                            }
                        }
                            
                        //
                        if($magic[0] == 0 && !($result == true)) { 
                            //this user is disabled
                            mysqli_free_result($results);
                            mysqli_free_result($magicRes);
                            mysqli_close($connection);
                            die("<br />Your account has been disabled <br /><a href='../login.php'>Return to login</a>");
                        } else {
                            mysqli_free_result($magicRes);
                            $hashword = md5($_POST['password']);
                            echo "post pass: " . $_POST['password'] . "  " . $hashword;
                            echo "<br />row pass: " . $row[2];

                            if ($hashword == $row[2]) {
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
                    }
                    mysqli_free_result($results);
                }
                mysqli_close($connection);
            }
        }
        // Data Bad
        // header("Location: ../login.php");
        die();
    } else {
        // Already Logged In
        header("Location: ../index.php");
        die();
    }
}

?>
