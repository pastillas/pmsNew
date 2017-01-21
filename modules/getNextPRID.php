<?php
	require("../connection.php");

	$sql = 'SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = \'purchase_request\';';

	$value = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($value);
	echo $result[0];
?>