<?php
	require("../connection.php");

	$office_head = ucwords($_POST['officeHead']);
	$office_code = strtoupper($_POST['officeCode']);
	$office_name = ucwords($_POST['officeName']);
	$office_department = strtoupper($_POST['officeDepartment']);
	
	$sql = "INSERT INTO offices values('$office_code', '$office_head', '$office_name', '$office_department')";
	
	if(!mysqli_query($conn, $sql)){
		echo "ERROR"  ;
	}else{
		echo "SUCCESS"  ;
	}
?>