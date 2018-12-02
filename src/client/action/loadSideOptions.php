<?php
//https://css-tricks.com/dynamic-dropdowns/
//try something like this
include 'include/db_credentials.php';
$connection = mysqli_connect($host, $user, $password, $database);
$error      = mysqli_connect_error();
$make_selected = $_POST["make"];
$model_selected = $_POST["model"];
$sql_field = $_POST["field"];
$sql_query = "SELECT DISTINCT $sql_field FROM Vehicle";

if ($make_selected!="0"&&$model_selected!="0") {
    $sql_query = $sql_query . "WHERE make='$make_selected' AND model='$model_selected'";
} elseif ($make_selected!="0") {
    $sql_query = $sql_query . "WHERE make='$make_selected'";
} elseif ($model_selected!="0") {
    $sql_query = $sql_query . "WHERE model='$model_selected'";
}
if ($results = mysqli_query($connection, $sql_query)) {
    while ($row = mysql_fetch_array($result)) {
        echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
    }mysqli_free_result($results);
}mysqli_close($connection);

?>
