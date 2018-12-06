<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("../index.php");
  die();
}

/* connect to database here */
include "../include/db_credentials.php";

$connection = mysqli_connect($host, $user, $password, $database);
$error      = mysqli_connect_error();
if ($connection -> connect_error) {
    echo "Connection failed: " . $connection -> connect_error;
}

// retrieve values
$username = $_SESSION["username"];
$title = $_POST["title"];
$content = $_POST["content"];
$parentid = $_POST["parentID"];
$depth = $_POST["depth"];

// TODO write the actual query!
$sql_query = "";
mysqli_query($connection, $sql_query);
mysqli_close($connection);
?>
