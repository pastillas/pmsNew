<?php
	require('../connection.php');
	$pr_number = $_POST['pr_number'];

	$sql = 'SELECT * FROM purchase_request_items where pr_number = ' . $pr_number . ';';
	$result = mysqli_query($conn, $sql);

	
	while(( $row = mysqli_fetch_assoc($result)) != null){

	}
?>