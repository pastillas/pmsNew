<?php
	require("../connection.php");

	$pr_number = $_POST['pr_number'];
	$item_code = $_POST['item_code'];
	$final_item_cost = $_POST['final_item_cost'];

	$sql = "UPDATE purchase_request_items SET item_unit_tc = $final_item_cost WHERE pr_number = $pr_number AND item_code = '$item_code'";

	if(!mysqli_query($conn, $sql)){
		echo mysqli_error($conn);
	}else
		return $sql;
	
?>