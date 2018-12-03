<?php
//confirm we are a user that is wanting to change his/her account
session_start();
echo "checking Session data and post data";
if (isset($_SESSION['username']) && isset($_SESSION['userID']) && isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    //Check if we have data
    echo "checked we're post username and userID";
    if (isset($_POST["accountEmail"]) && isset($_POST["accountPassword"]) && isset($_POST["accountFirstName"]) && isset($_POST["accountLastName"])
        && !empty($_POST["accountEmail"]) && !empty($_POST["accountPassword"]) && !empty($_POST["accountFirstName"]) && !empty($_POST["accountLastName"])) {
        //user data
        echo "checked we have data";
        include '../include/db_credentials.php' ;
        //make connection
        $connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();
        //if not connection possible
        if($connection -> connect_error) {
            die("Connection failed: " . $connection -> connect_error);
        }
        echo "Connected to Server."; 
        if ($error != null) {
            $output = "<p>Unable to connect to database</p>".$error;
            exit($output);
        } else {
            //check if user exists
            $username = $_SESSION["username"];
            $sql = "SELECT email FROM User WHERE username='".$_SESSION['username']."'";
            $results = mysqli_query($connection, $sql);
            if (mysqli_fetch_assoc($results) == null) {    
                echo "<p>User doesn't exist?</p><a href='account.php'>Return to account page</a>";
            } else {
                mysqli_free_result($results);
                
                $sql = "UPDATE User SET password='?', email='?' WHERE username='?' AND userID='?';";
                //if the preparation goes through
                if ($statement = mysqli_prepare($connection, $sql)) {
                    //hash password
                    $hashword = md5($_POST['accountPassword']);
                    // prepared statement insertion
                    mysqli_stmt_bind_param($statement, "sssi", $hashword, $_POST['accountEmail'], $username, $_SESSION['userID']);
                    // execute statement
                    $result = mysqli_execute($statement);
                    //if the execution executes
                    if ($result == true) {
                        mysqli_stmt_close($statement);
                        echo "<p>The account for ".$username." has been updated in User</p>";

                        //prepare next query
                        $sql = "UPDATE Customer SET firstName='?', lastName='?' WHERE userID='?';";
                        if($stmt = mysqli_prepare($connection, $sql)) {
                             // and dispose of the statement.
                             mysqli_stmt_bind_param($stmt, "ssi", $_POST['accountFirstName'], $_POST['accountLastName'], $_SESSION['userID']);
                             $result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
                             mysqli_close($connection);
                             header("Location: ../account.php");
                        }
                    }
                }
            }
        }
        mysqli_close($connection);
    }
}
// header("Location: ../account.php");?>