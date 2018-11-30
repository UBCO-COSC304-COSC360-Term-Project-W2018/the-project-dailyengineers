<?php
session_start();
//Check method used
if (isset($_SERVER["REQUEST_METHOD"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    //Check if we have data
    if (isset($_POST["user"])
        && isset($_POST["email"])
        && isset($_POST["pass"])) {
        //input them
        include 'include/db_credentials.php';

        $connection = mysqli_connect($host, $user, $password, $database);
        
        $error = mysqli_connect_error();
        if ($error != null) {
            //If there is a connection error return to createAccount
            header("Location: createAccount.php");
            die();
        } else {
            //check if user exists
            $sql = "SELECT * FROM user WHERE username='".$_POST["user"]."' OR email='".$_POST["email"]."'";
            //get results and if anything is returned
            $results = mysqli_query($connection, $sql);
            if (mysqli_fetch_assoc($results) != null) {
                ?><!DOCTYPE html><html> <p>User already exists <a href="createAccount.php">Return to Create Account</a></p><?php
            } else {
                mysqli_free_result($results);
                //check image
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["profile"]["name"]);
                //checker Bool
                $uploadOk = true;
                //get filetype
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["profile"]["tmp_name"]);
                $output = "";
                if ($check !== false) {
                } else {
                    $output .= "File is not an image.";
                    $uploadOk = false;
                }
                //check if exists
                if (file_exists($target_file)) {
                    $output .= "<br />Sorry, file already exists.";
                    $uploadOk = false;
                }
                //check size
                if ($_FILES["profile"]["size"] >= 100000) {
                    $output .= "<br />Sorry, your file is too large.";
                    $uploadOk = false;
                }
                //check type
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                    $output .= "<br />Sorry image is incorrect type";
                    $uploadOk = false;
                }
                
                //Insert User
                $sql = "INSERT INTO users (username, email, pass, profile) VALUES (?, ?, ?, ?)";
                if (($statement = mysqli_prepare($connection, $sql)) && $uploadOk) {
                    //hash password
                    $hashword = md5($_POST['pass']);
                    //bind perameters
                    mysqli_stmt_bind_param($statement, "ssss", $_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hashword, $target_file);
                    //Execute insertion
                    if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
                    } else {
                        ?><!DOCTYPE html><html> <p>Error in profile picture upload.<br /><a href="createAccount.php">Return to Create Account</a></p><?php
                    }
                    $result = mysqli_execute($statement);

                    if ($result == true) {
                        $_SESSION['username'] = $_POST['user'];
                        header("Location: account.php");
                        die();
                    } else {
                        ?><!DOCTYPE html><html><p>Executing Insertion of user failed:<br /><a href="createAccount.php">Return to Create Account</a></p><?php
                    }
                } else {
                    ?><!DOCTYPE html><html> <p>Issue with image or statement preparation: <?php echo $output ?><br /><a href="createAccount.php">Return to Create Account</a></p><?php
                }
            }
            mysqli_close($connection);
        }
    }
}?>
</html>