<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Offices</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <style type="text/css">
  .side-nav li {
    padding: 0 !important;
  }
  </style>
  <?php
    require("navbar.php");
    require("sidebar.php");

    require("connection.php");
    if(isset($_POST['addOfficeSubmit'])){
			//echo '<script type="text/javascript">alert("kasjhdakd")</script>';
			
			$office_head = ucwords($_POST['officeHead']);
			$office_code = strtoupper($_POST['officeCode']);
			$office_name = ucwords($_POST['officeName']);
			$office_department = strtoupper($_POST['officeDepartment']);
			
			$sql = "INSERT INTO offices values('$office_code', '$office_head', '$office_name', '$office_department')";
			
			if(!mysqli_query($conn, $sql)){
				echo "<script type='text/javascript'>alert('ERROR saving record.')</script>"  ;
			}
		}

	if(isset($_POST['editOfficeSubmit'])){
		$office_head = ucwords($_POST['officeHead']);
		$office_code = strtoupper($_POST['officeCode']);
		$office_name = ucwords($_POST['officeName']);
		$office_department = strtoupper($_POST['officeDepartment']);
		
		$sql = "UPDATE offices set office_head = '$office_head', office_name = '$office_name', office_department = '$office_department' WHERE office_code = '$office_code'";
		
		if(!mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>"  ;
			mysqli_error($conn);
		}
	}
  ?>
 
</head>
<body>
<!--Navs-->
<!-- ADD SUPPLIER MODAL-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>ADD SUPPLIER</h4>
    <div class="row">
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="addOfficeForm">
    		<input type="text" id="officeCode" name="officeCode" placeholder="Office Code" required>
    		<label>Office Code</label>
    		<input type="text" id="officeHead" name="officeHead" placeholder="Office Head" required>
    		<label>Office Head</label>
    		<input type="text" id="officeName" name="officeName" placeholder="Office Name" required>
    		<label>Office Name</label>
    		<input type="text" id="officeDepartment" name="officeDepartment" placeholder="Department" required>
    		<label>Department</label>
    	</form>
    </div>
  </div>
  <div class="modal-footer">
  	<button type="submit" form="addOfficeForm" name="addOfficeSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div id="editModal" class="modal modal-fixed-footer" >
  <div class="modal-content">
    <h4>EDIT SUPPLIER</h4>
    <div class="row">
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="editOfficeForm">
    		
    		<p id="officeCodeP"></p>
    		<input type="text" id="officeHead" name="officeHead" placeholder="Office Head" required>
    		<label>Office Head</label>
    		<input type="text" id="officeName" name="officeName" placeholder="Office Name" required>
    		<label>Office Name</label>
    		<input type="text" id="officeDepartment" name="officeDepartment" placeholder="Department" required>
    		<label>Department</label>
    		<input type="hidden" id="officeCode" name="officeCode" placeholder="Office Code" required >
    		
    	</form>
    </div>
  </div>
  <div class="modal-footer">
  	<button type="submit" form="editOfficeForm" name="editOfficeSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div class="row">
  <div id="admin" style="margin: 102px 30px 30px 330px; width: 79%;">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">OFFICES</span>
        <div class="actions">
          <a href="#modal1" class="waves-effect waves-light btn-flat nopadding"><i class="material-icons">library_add</i></a>
          <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th>Office Code</th>
            <th>Office Head</th>
            <th>Office Name</th>
            <th>Department</th>
          </tr>
        </thead>
        <tbody>
          <?php
        		$sql = 'SELECT * FROM offices';
				$offices =  mysqli_query($conn, $sql);

        		while(($row = mysqli_fetch_assoc($offices)) != null){

					echo '<tr onclick="editOffice(\'' . $row['office_code'] . '\')">' .
					 '<td id="oc' . $row['office_code'] . '">' . $row['office_code'] . '</td>' .
					 '<td id="oh' . $row['office_code'] . '">' . $row['office_head'] . '</td>' .
					 '<td id="on' . $row['office_code'] . '">' . $row['office_name'] . '</td>' .
					 '<td id="od' . $row['office_code'] . '">' . $row['office_department'] . '</td>' .
					 '</tr>';

					 //'<td class="edit"><a class="waves-effect waves-teal btn-flat" onclick=updateSupplier(' . $row['supplier_pk'] . ') ><i class="material-icons teal-text">edit</i></a></td>' . 
				}
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>

  <script src="js/datatable.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

  function editOffice(office_code){
  	var office_name = document.getElementById("on" + office_code).innerHTML;
  	var office_head = document.getElementById("oh" + office_code).innerHTML;
  	var office_department = document.getElementById("od" + office_code).innerHTML;
  	var editOfficeForm = document.getElementById("editOfficeForm");
  	document.getElementById("officeCodeP").innerHTML = "Office Code: " + office_code;
  	editOfficeForm.officeCode.value = office_code;
  	editOfficeForm.officeName.value = office_name;
  	editOfficeForm.officeHead.value = office_head;
  	editOfficeForm.officeDepartment.value = office_department;
  	$('#editModal').openModal();
  }


</script>
</body>
</html>
