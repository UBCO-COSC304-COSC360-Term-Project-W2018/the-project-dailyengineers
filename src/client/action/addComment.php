<?php
session_start();
if (!isset($_SESSION["username"])) {
  die();
}

$username = $_SESSION["username"];
$title = $_POST["title"];
$content = $_POST["content"];
$parentid = $_POST["parentID"];
$depth = $_POST["depth"];


/* connect to database here */
include "../include/db_credentials.php";


?>
