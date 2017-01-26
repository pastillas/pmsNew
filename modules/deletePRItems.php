<?php 
	require('../connection.php');
	$pr_number = $_POST['pr_number'];

	$sql = "DELETE FROM purchase_request_items WHERE pr_number = $pr_number";
	if(!mysqli_query($conn, $sql)){
		echo 'ERROR';
	}else
		echo 'SUCCESS';
?>