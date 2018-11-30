<?php
session_start();
//Check we are recieving item data
if(!isset($_SERVER['REQUEST_METHOD'])) {
    //Send back as we have bad data
    header("Location: ".$_SESSION['HTTP_REFERER']);
    die();
}
//check if we have an existing cart
if (!isset($_SESSION['cart'])) {
    //create a cart
}
// query sql for data to add to cart
// append data to cart
// send back
header("Location: ".$_SESSION['HTTP_REFERER']);
die();
?>