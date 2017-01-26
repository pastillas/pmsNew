<?php
	require("../connection.php");

	$pr_number = $_POST['pr_number'];
	$item_code = $_POST['item_code'];
	$pr_item_euc = $_POST['pr_item_euc'];
	$quantity = $_POST['quantity'];

	$sql = "INSERT INTO purchase_request_items(pr_number, item_code, pr_item_euc, quantity) values($pr_number, '$item_code', $pr_item_euc, $quantity)";

	if(!mysqli_query($conn, $sql)){
		return 'ERROR';
	}else
		return 'SUCCESS';
	
?>