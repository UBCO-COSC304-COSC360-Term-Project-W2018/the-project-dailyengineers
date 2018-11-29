<?php
session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    header("http://localhost/the-project-dailyengineers/src/client/index.php");
    die();
} else {
    //Logout
    session_unset();
    header("Location: http://localhost/the-project-dailyengineers/src/client/login.php");
    die();
}
?>