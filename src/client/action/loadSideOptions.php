<?php
//https://css-tricks.com/dynamic-dropdowns/
//try something like this
    include "../include/db_credentials.php";
    $connection = mysqli_connect($host, $user, $password, $database);
    $error      = mysqli_connect_error();
    if ($connection -> connect_error) {
        echo "Connection failed: " . $connection -> connect_error;
    }
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        echo $output;
    }

    $make_selected = $_POST['make'];
    $model_selected = $_POST['model'];
    $sql_field = $_POST['field'];

    if ($make_selected!="0" && $model_selected!="0") {
        $sql_query = "SELECT DISTINCT ".$sql_field." FROM Vehicle WHERE make='".$make_selected."' AND model='".$model_selected."' ORDER BY ".$sql_field;
    } elseif ($make_selected!="0") {
        $sql_query = "SELECT DISTINCT ".$sql_field." FROM Vehicle WHERE make='".$make_selected."' ORDER BY ".$sql_field;
    } elseif ($model_selected!="0") {
        $sql_query = "SELECT DISTINCT ".$sql_field." FROM Vehicle WHERE model='".$model_selected."' ORDER BY ".$sql_field;
    } else {
        $sql_query = "SELECT DISTINCT ".$sql_field." FROM Vehicle";
    }
    if ($result = mysqli_query($connection, $sql_query)) {
        while ($row = mysqli_fetch_row($result)) {
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
        }
        mysqli_free_result($result);
    }
    mysqli_close($connection);
?>
