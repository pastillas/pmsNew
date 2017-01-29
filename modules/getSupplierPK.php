<?php 
	require('../connection.php');
	$supplier_name = $_POST['supplier_name'];
		
	$sql = "SELECT supplier_pk FROM supplier WHERE supplier_name = '$supplier_name';";
	$data = mysqli_query($conn, $sql);
	$array =  mysqli_fetch_array($data);
	echo $array[0];
?>