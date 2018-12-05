<?php
session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest)
    header("Location: ../index.php");
    die();
} else {
    //Logout
    session_unset();
    header("Location: ../index.php");
    die();
}
?>
