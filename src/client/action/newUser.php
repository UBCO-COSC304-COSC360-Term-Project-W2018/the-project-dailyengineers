<?php
// session_start();
if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    //Check if we have data
    if (isset($_POST["user"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])
        && isset($_POST["email"]) && isset($_POST["pass"])
        && !empty($_POST["user"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"])
        && !empty($_POST["email"]) && !empty($_POST["pass"])) {
        //user data
        include '../include/db_credentials.php' ;
        //make connection
        $connection = mysqli_connect($host, $user, $password, $database);
        $error      = mysqli_connect_error();

        if($connection -> connect_error) {
            die("Connection failed: " . $connection -> connect_error);
        }
        echo "Connected to Server.";
        if ($error != null) {
            $output = "<p>Unable to connect to database</p>".$error;
            exit($output);
        } else {
            //check if user exists
            $username = $_POST["user"];
            $email = $_POST["email"];
            $sql = "SELECT * FROM User WHERE username='".$username."' OR email='".$email."'";

            $results = mysqli_query($connection, $sql);
            // echo implode("", mysqli_fetch_assoc($results));
            if (mysqli_fetch_assoc($results) != null) {
            // if ($results != null) {

                echo "<p>User already exists with this name and/or email</p><a href='createAccount.php'>Return to user entry</a>";
            } else {

                mysqli_free_result($results);

                $sql = "INSERT INTO User (username, password, email) VALUES (?, ?, ?)";
                //if the preparation goes through and there were no errors with the upload
                if ($statement = mysqli_prepare($connection, $sql)) {//() && $uploadOk
                    //hash password
                    $hashword = md5($_POST['pass']);
                    // prepared statement insertion
                    mysqli_stmt_bind_param($statement, "sss", $_POST['user'], $hashword, $_POST['email']);
                    // execute statement
                    $result = mysqli_execute($statement);
                    //if the execution executes
                    if ($result == true) {
                        echo "<p>An account for ".$username." has been created</p>";
                        // }

                        $sql = "SELECT userID FROM User WHERE username='".$username."'";
                        $results = mysqli_query($connection, $sql);
                        $userID =  implode("", mysqli_fetch_assoc($results));
                        // $imagedata = file_get_contents($_FILES['profile']['tmp_name']);

                        $sql = "INSERT INTO Customer (userID, firstName, lastName) VALUES(?, ?, ?);";

                        $stmt = mysqli_stmt_init($connection); //init prepared statement object
                        mysqli_stmt_prepare($stmt, $sql); // register the query
                        $null = null;
                        mysqli_stmt_bind_param($stmt, "iss", $userID, $_POST['firstName'], $_POST['lastName']);
                    
                        // mysqli_stmt_send_long_data($stmt, 2, $imagedata);

                        $result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));

                        mysqli_stmt_close($stmt); // and dispose of the statement.
                        mysqli_close($connection);

                        $_SESSION['username'] = $_POST['user'];
                        header("Location: ../index.php");
                    }
                }
            }
        }
        mysqli_close($connection);
    }
}
header("Location: ../createAccount.php");?>
