<?php
	require("../connection.php");
	$sql = 'SELECT * FROM offices';
	$offices =  mysqli_query($conn, $sql);

	echo '<table id="datatable">'.
	        '<thead>'.
	          '<tr>'.
	            '<th>Office Code</th>'.
	            '<th>Office Head</th>'.
	            '<th>Office Name</th>'.
	            '<th>Department</th>'.
	          '</tr>'.
	        '</thead>'.
	        '<tbody>';
	while(($row = mysqli_fetch_assoc($offices)) != null){
		echo '<tr>' . 
		'<td>' . $row['office_code'] . '</td>' .
		'<td>' . $row['office_head'] . '</td>' .
		'<td>' . $row['office_name'] . '</td>' .
		'<td>' . $row['office_department'] . '</td>' .
		'</tr>';

		 //'<td class="edit"><a class="waves-effect waves-teal btn-flat" onclick=updateSupplier(' . $row['supplier_pk'] . ') ><i class="material-icons teal-text">edit</i></a></td>' . 
	}
	echo '</tbody>' .
      '</table>';
?>