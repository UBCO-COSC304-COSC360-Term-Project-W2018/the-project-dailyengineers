<?php
	include 'include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();
	$sqlSource = file_get_contents('database/order_sql.ddl');
	mysqli_multi_query($connection, $sqlSource);
	header('Location: admin.php');
?>