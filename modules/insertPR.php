<?php
	require("../connection.php");

	$pr_number = $_POST['pr_number'];
	$pr_date = new datetime( $_POST['pr_date'] );
	$pr_date = mysqli_real_escape_string($conn, $pr_date->format('Y-m-d'));
	$pr_department = ucwords($_POST['pr_department']);
	$pr_dev_section = $_POST['pr_dev_section'];
	$pr_purpose = $_POST['pr_purpose'];
	$office_code = $_POST['office_code'];
	$pr_sai_number = ($_POST['pr_sai_number'] != null ?  $_POST['pr_sai_number'] : 'null');
	$pr_sai_date = $_POST['pr_sai_date'];

	if($pr_sai_date != null){
		$pr_sai_date = new datetime($_POST['pr_sai_date']);
		$pr_sai_date = mysqli_real_escape_string($conn, $pr_sai_date->format('Y-m-d'));
	}
	
	$pr_obr_number =  ($_POST['pr_obr_number'] != null ?  $_POST['pr_obr_number'] : 'null');
	$pr_obr_date = $_POST['pr_obr_date'];

	if($pr_obr_date != null){
		$pr_obr_date = new datetime($_POST['pr_obr_date']);
		$pr_obr_date = mysqli_real_escape_string($conn, $pr_obr_date->format('Y-m-d'));
	}
	$pr_year = date("Y");
	
	$sql = '';
	if($pr_obr_date == null && $pr_sai_date == null)
		$sql = "INSERT INTO PURCHASE_REQUEST values($pr_number, $pr_year, '$pr_department', '$pr_dev_section', '$pr_purpose', '$office_code', $pr_sai_number, null, null, '$pr_date', $pr_obr_number)";
	else if($pr_obr_date == null && $pr_sai_date != null)
		$sql = "INSERT INTO PURCHASE_REQUEST values($pr_number, $pr_year, '$pr_department', '$pr_dev_section', '$pr_purpose', '$office_code', $pr_sai_number, '$pr_sai_date', null, '$pr_date', $pr_obr_number)";
	else if($pr_obr_date != null && $pr_sai_date == null)
		$sql = "INSERT INTO PURCHASE_REQUEST values($pr_number, $pr_year, '$pr_department', '$pr_dev_section', '$pr_purpose', '$office_code', $pr_sai_number, null, '$pr_obr_date', '$pr_date', $pr_obr_number)";
	else
		$sql = "INSERT INTO PURCHASE_REQUEST values($pr_number, $pr_year, '$pr_department', '$pr_dev_section', '$pr_purpose', '$office_code', $pr_sai_number, '$pr_sai_date', '$pr_obr_date', '$pr_date', $pr_obr_number)";
	
	if(!mysqli_query($conn, $sql))
		return 'ERROR';
	else
		return 'SUCCESS';
?>