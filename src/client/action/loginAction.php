<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); 
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        //Check if we have data
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            // include '../include/db_credentials.php';

            $host = "cosc304.ok.ubc.ca";
            $user = "ccheung2";
            $password = "54338165";
            $database = "db_" . $user;

            $connection = mysqli_connect($host, $user, $password, $database);
            $error      = mysqli_connect_error();

            // $con = sqlsrv_connect($server, $connectionInfo);
            $username = $_POST["username"];
            $sql = "SELECT * FROM User WHERE username='$username';";
            // $pstmt = sqlsrv_prepare($con, $sql, array($_POST['username']));
            if($connection -> connect_error) {
                die("Connection failed: ".$connection -> connect_error);
            }
            echo "connected"; 
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } 
            /*if ($con === false ) {
                die( print_r( sqlsrv_errors(), true));*/
            else {
                echo "here";
                
                if ($results = mysqli_query($connection, $sql)) {
                    //$row = sqlsrv_fetch_array($pstmt, SQLSRV_FETCH_ASSOC);
                    echo "test";
                    while ($row = mysqli_fetch_row($results)) {
                        echo "post pass : ".$_POST['password'];
                        echo "row pass: ".$row[2];

                        if ($_POST['password'] == $row[2]) {
                            //Update session Superglobal
                            $_SESSION['username'] = $_POST['username'];
                            echo $_SESSION['username'];
                            $_SESSION['userID'] = $row[0];
                            //Release Values
                            mysqli_free_result($results);
                            mysqli_close($connection);
                            // sqlsrv_free_stmt($pstmt);
                            // sqlsrv_close($con);
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
    //Data bad
    // header("Location: login.php");
    // die();
} else {
    //we logged in already silly goose
    header("Location: index.php");
    die();
}}

?>
