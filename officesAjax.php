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

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <?php
    require("connection.php");
   

	if(isset($_POST['updateOfficeSave'])){
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
  <script type="text/javascript">

  	$(document).ready(function(){
			$('#addOfficeForm').validate({
				rules:{
					officeCode: {
						required: true
					},
					officeName: {
						required: true
					},
					officeHead: {
						required: true
					},
					officeDepartment: {
						required: true
					}
				},

				submitHandler: function(form){
					$.ajax({
	  				url: "modules/insertOffice.php",
	  				method: "post",
	  				data: $('form').serialize(),
	  				datatype: "text",
	  				success: function(strMessage){
	  					  						
	  					$.ajax({
	  						url: "modules/loadOffices.php",
	  						datatype: "html",
	  						success: function(result){
	  							$("#officeTable").html(result);
	  						}
	  					});

	  					if(strMessage == "ERROR")
	  						Materialize.toast('ERROR saving record', 3000);
	  					else
	  						Materialize.toast('SUCCESS', 3000);	
	  				},
	  				error: function(){
	  					console.log('Ajax request NOT received!');
	  				}
  				});
  				$('#officeCode').val("");
  				$('#officeName').val("");
  				$('#officeHead').val("");
  				$('#officeDepartment').val("");
  				$('#modal1').modal('close');



  				return false;
				}
			});
  	});
  </script>
</head>
<body>
<!--Navs-->
<!-- ADD SUPPLIER MODAL-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>ADD OFFICE</h4>
    <div class="row">
    	<form method="POST" name="addOfficeForm" id="addOfficeForm">
    		<input type="text" id="officeCode" id="officeCode" name="officeCode" placeholder="Office Code" required>
    		<label>Office Code</label>
    		<input type="text" id="officeHead" id="officeHead" name="officeHead" placeholder="Office Head" required>
    		<label>Office Head</label>
    		<input type="text" id="officeName" id="officeName" name="officeName" placeholder="Office Name" required>
    		<label>Office Name</label>
    		<input type="text" id="officeDepartment" id="officeDepartment" name="officeDepartment" placeholder="Department" required>
    		<label>Department</label>
    	</form>
    </div>
  </div>
  <div class="modal-footer">
  	<button type="submit" form="addOfficeForm" id="addOfficeSubmit" name="addOfficeSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div class="row">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">OFFICES</span>
        <div class="actions">
          <a href="#modal1" class="waves-effect waves-light btn-flat nopadding"><i class="material-icons">library_add</i></a>
          <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      	<div id="officeTable">
	      	<table id="datatable">
	        	<thead>
		          <tr>
		            <th>Office Code</th>
		            <th>Office Head</th>
		            <th>Office Name</th>
		            <th>Department</th>
		          </tr>
	        	</thead>
		        <tbody id="officesTBody">
		          <?php
		        		$sql = 'SELECT * FROM offices';
						$offices =  mysqli_query($conn, $sql);

		        		while(($row = mysqli_fetch_assoc($offices)) != null){
							echo '<tr>' . 
							 '<td>' . $row['office_code'] . '</td>' .
							 '<td>' . $row['office_head'] . '</td>' .
							 '<td>' . $row['office_name'] . '</td>' .
							 '<td>' . $row['office_department'] . '</td>' .
							 '</tr>';

							 //'<td class="edit"><a class="waves-effect waves-teal btn-flat" onclick=updateSupplier(' . $row['supplier_pk'] . ') ><i class="material-icons teal-text">edit</i></a></td>' . 
						}
		          ?>
	        	</tbody>
      		</table>
      </div>
      </div>
    </div>
  </div>
</div>

	<script src="js/materialize.js"></script>
	<script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>

  <script src="js/datatable.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
</body>
</html>
