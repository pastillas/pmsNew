<?php
	require("../connection.php");

	$pr_po_status_id = $_POST['pr_po_status_id'];
	$po_number = $_POST['po_number'];
	$pr_number = $_POST['pr_number'];
	$po_date = new datetime( $_POST['po_date'] );
	$po_date = mysqli_real_escape_string($conn, $po_date->format('Y-m-d'));
	$po_mode_of_procurement = $_POST['po_mode_of_procurement'];
	$po_place_of_delivery = $_POST['po_place_of_delivery'];
	$po_delivery_term = $_POST['po_delivery_term'];
	$po_payment_term = $_POST['po_payment_term'];
	$po_d_tracks = $_POST['po_d_tracks'];
	$po_year = date("Y");


	$delivery_date = $_POST['delivery_date'];
	$for_payment = $_POST['for_payment'];
	$supplier_pk = $_POST['supplier_pk'];

	$sql = "INSERT INTO purchase_order values($po_number, $po_year, $pr_number, '$po_mode_of_procurement', '$po_place_of_delivery', '$po_date', '$po_delivery_term', '$po_payment_term', '$po_d_tracks')";
	
	if(!mysqli_query($conn, $sql)){
		echo 'ERROR';
	}else{
		if($delivery_date != null){
			$delivery_date = new datetime($_POST['delivery_date']);
			$delivery_date = mysqli_real_escape_string($conn, $delivery_date->format('Y-m-d'));
		}

		if($for_payment == 1 && $delivery_date != null)
			$sql = "UPDATE PR_PO_STATUS SET po_number = $po_number, supplier_pk = $supplier_pk, delivery_date = '$delivery_date', for_payment = $for_payment, forwarded_date = curdate() WHERE pr_po_status_id = $pr_po_status_id;";
		else{
			if($for_payment == 2 && $delivery_date != null)
				$sql = "UPDATE PR_PO_STATUS SET po_number = $po_number, supplier_pk = $supplier_pk, delivery_date = '$delivery_date', for_payment = $for_payment, forwarded_date = null  WHERE pr_po_status_id = $pr_po_status_id;";
			else{
				if($for_payment == 1 && $delivery_date == null)
					$sql = "UPDATE PR_PO_STATUS SET po_number = $po_number, supplier_pk = $supplier_pk, delivery_date = null, for_payment = $for_payment, forwarded_date = curdate()  WHERE pr_po_status_id = $pr_po_status_id;";
				else{
					if($for_payment == 2 && $delivery_date == null)
						$sql = "UPDATE PR_PO_STATUS SET po_number = $po_number, supplier_pk = $supplier_pk, delivery_date = null, for_payment = $for_payment, forwarded_date = null  WHERE pr_po_status_id = $pr_po_status_id;";
				}
			}
		}

		if(!mysqli_query($conn, $sql))
			echo 'ERROR';
		else
			echo 'SUCCESS';
	}

?>