<?php
session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        //Check if we have data
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            include 'include/db_credentials.php';

            $connection = mysqli_connect($host, $user, $password, $database);
            $error      = mysqli_connect_error();
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                echo "here";
                $sql     = "SELECT username, password FROM user WHERE username='" . $_POST['username'] . "';";
                $results = mysqli_query($connection, $sql);
                if ($row = mysqli_fetch_assoc($results)) {
                    if ($_POST['password'] == $row['password']) {
                        //Update session Superglobal
                        $_SESSION['username'] = $_POST['username'];
                        //Release Values
                        mysqli_free_result($results);
                        mysqli_close($connection);
                        //redirect
                        header("Location: index.php");
                        die();
                    }
                }
                mysqli_free_result($results);
            }
            mysqli_close($connection);
        }
    }
    //Data bad
    header("Location: login.php");
    die();
} else {
    //we logged in already silly goose
    header("Location: index.php");
    die();
}
