<?php 
	require('../connection.php');

	$delivery_date = new datetime( $_POST['delivery_date'] );
	$delivery_date = mysqli_real_escape_string($conn, $delivery_date->format('Y-m-d'));

	$sql = 'SELECT ps.pr_po_status_id as \'pr_po_status_id\', ps.pr_number as \'pr_number\', ps.po_number as \'po_number\', o.office_name as \'office_name\', s.supplier_name as \'supplier_name\' FROM pr_po_status ps, purchase_request pr, offices o, supplier s WHERE ps.pr_number = pr.pr_number AND pr.office_code = o.office_code AND ps.delivery_date = \'' . $delivery_date . '\' AND ps.supplier_pk = s.supplier_pk;';

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 0){
		echo '<tr><td colspan=4>Empty</td></tr>'; 
	}else{
		$tbody = '';
		while (($row = mysqli_fetch_assoc($result)) != null ) {
			$tbody .= '<tr>';
			$tbody .= '<td onclick=openPO(' . $row['pr_po_status_id'] . ')>' . $row['po_number'] . '</td><td onclick=openPR(' . $row['pr_po_status_id'] . ')>' . $row['pr_number'] . '</td><td>' . $row['supplier_name'] . '</td><td>' . $row['office_name'] . '</td>'; 

			$tbody .= '</tr>';
		}
		echo $tbody;
	}

?>