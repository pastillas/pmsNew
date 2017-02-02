<?php 
	require('../connection.php');
	$pr_po_status_id = $_POST['pr_po_status_id'];

	$sql = "SELECT * FROM pr_po_status WHERE pr_po_status_id = $pr_po_status_id;";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 0){
		echo "NONE";
	}else{
		$row = mysqli_fetch_assoc($result);
		echo $row['status'];
	}

?>