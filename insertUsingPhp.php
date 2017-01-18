<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
	<?php 
	require("connection.php");
	header("Content-Type: text/html; charset=UTF-8");

	$sql = 'INSERT INTO supplier(supplier_name, supplier_address, supplier_barangay, supplier_proprietor, supplier_nature) values( "23919-SEÑOR ERNESTO CUISINE", "# 2-A BAG. SUR, NAGA CITY", "BAGUMBAYAN SUR", "MENDOZA, ARLEEN FRANCISCO", "CARENDERIA" );';


	mysqli_query($conn, $sql);

?>	
</body>
