<?php
session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        //Check if we have data
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            include 'include/db_credentials.php';

            // $connection = mysqli_connect($host, $user, $password, $database);
            // $error      = mysqli_connect_error();

            $con = sqlsrv_connect($server, $connectionInfo);

            /*if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } */
            if ($con === false ) {
                die( print_r( sqlsrv_errors(), true));
            } else {
                echo "here";
                $sql = "SELECT username, password FROM user WHERE username='" . $_POST['username'] . "';";
                $pstmt = sqlsrv_query($con, $sql, array());

                // $results = mysqli_query($connection, $sql);
                // if ($row = mysqli_fetch_assoc($results)) {
                while ($rst = sqlsrv_fetch_array( $pstmt, SQLSRV_FETCH_ASSOC)) {
                    if ($_POST['password'] == $rst['password']) {
                        //Update session Superglobal
                        $_SESSION['username'] = $_POST['username'];
                        //Release Values
                        // mysqli_free_result($results);
                        // mysqli_close($connection);
                        sqlsrv_free_stmt($pstmt2);
                        sqlsrv_close($con);
                        //redirect
                        header("Location: index.php");
                        die();
                    }
                }
                sqlsrv_free_stmt($pstmt2);
            }
            sqlsrv_close($con);
        }
    }
    //Data bad
    // header("Location: login.php");
    // die();
} else {
    //we logged in already silly goose
    header("Location: index.php");
    die();
}
