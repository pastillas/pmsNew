<!DOCTYPE html>
<html lang="en">
<head>
<?php
  session_start();
  if(!isset($_SESSION['name'])){
    header("Location: index.php");
  }
  elseif(isset($_SESSION['name'])){
?>
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

  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  
  <script src="js/sweetalert.min.js"></script>
  <style type="text/css">
  .side-nav li, 
  .side-nav .collapsible-header,
  .side-nav.fixed .collapsible-header,
  .side-nav .collapsible-body li a,
  .side-nav.fixed .collapsible-body li a {
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
        echo '<script type="text/javascript">sweetAlert("Oops...", "Something went wrong!", "error");</script>';
			}else{
        echo '<script type="text/javascript">sweetAlert("Done!", "Add office success.", "success");</script>';
      }
		}

	if(isset($_POST['editOfficeSubmit'])){
		$office_head = ucwords($_POST['officeHead']);
		$office_code = strtoupper($_POST['officeCode']);
		$office_name = ucwords($_POST['officeName']);
		$office_department = strtoupper($_POST['officeDepartment']);
		
		$sql = "UPDATE offices set office_head = '$office_head', office_name = '$office_name', office_department = '$office_department' WHERE office_code = '$office_code'";
		
		if(!mysqli_query($conn, $sql)){
        echo '<script type="text/javascript">sweetAlert("Oops...", "Something went wrong!", "error");</script>';
		}else{
        echo '<script type="text/javascript">sweetAlert("Done!", "Edit office success.", "success");</script>';
    }
	}
  ?>
 
</head>
<body>
<!--Navs-->
<!-- ADD SUPPLIER MODAL-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>ADD OFFICE</h4>
    <div class="row">
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="addOfficeForm">

        <div class="input-field col s12">
          <input type="text" id="officeCode" name="officeCode" required>
          <label>Office Code</label>
        </div>
        <div class="input-field col s12">
          <input type="text" id="officeHead" name="officeHead" required>
          <label>Office Head</label>
        </div>
        <div class="input-field col s12">
          <input type="text" id="officeName" name="officeName"required>
          <label>Office Name</label>
        </div>
        <div class="input-field col s12">
          <input type="text" id="officeDepartment" name="officeDepartment" required>
          <label>Department</label>
        </div>
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
  <div id="admin" style="margin: 102px 30px 30px 330px; width: 76.5%;">

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


	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>

  <script src="js/datatable.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
    $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );

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
<?php } ?>