<?php
	if (!isset($_SESSION['username'])) {
        //not logged in (Guest) GET OUT
        header("Location: ../login.php");
        die();
    } else {
        include '../include/db_credentials.php';
        $connection = mysqli_connect($host, $user, $password, $database);
        $error = mysqli_connect_error();
        $uid = $_SESSION['userID'];
        //echo "e";
        $sql = "SELECT * FROM Admin WHERE userID='".$uid."';";
        if ($connection -> connect_error) {
            die("Connection failed: " . $connection -> connect_error);
        }
        // echo "Connected to Server.";
        if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
        }
        if (mysqli_num_rows(mysqli_query($connection, $sql)) > 0) {
            // echo "I'm an Admin!";
            // header('Location: admin.php');
            $sqlSource = file_get_contents('database/order_sql.ddl');
			mysqli_multi_query($connection, $sqlSource);
            mysqli_close($connection);
			header('Location: ../admin.php?reset=1');
            // header('Location: admin.php');
        } else {
            // echo "Error: " . $sql . "" . mysqli_error($connection);
            // if you aren't
            header('Location: ../index.php');
        }
    }
?>