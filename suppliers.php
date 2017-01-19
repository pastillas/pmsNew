<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Suppliers</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">

  <?php
    require("connection.php");
    if(isset($_POST['addSupplierSubmit'])){
      //echo "<script type='text/javascript'>alert('yeah')</script>";
      $supplier_name = ucwords($_POST['supplierName']);
      $supplier_address = ucwords($_POST['supplierAddress']);
      $supplier_barangay = ucwords($_POST['supplierBarangay']);
      $supplier_contact_number = $_POST['supplierContactNumber'];
      $supplier_proprietor = ucwords($_POST['supplierProprietor']);
      $supplier_nature = ucwords($_POST['supplierNature']);
      
      $sql = "INSERT INTO supplier(supplier_name, supplier_address, supplier_barangay, supplier_contact_number, supplier_proprietor, supplier_nature) values('$supplier_name', '$supplier_address', '$supplier_barangay', '$supplier_contact_number', '$supplier_proprietor', '$supplier_nature');";
      if(!mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>" ;
      }
    }

    if(isset($_POST['editSupplierSubmit'])){
          //echo "<script type='text/javascript'>alert('yeah')</script>";
      $supplier_pk = $_POST['supplierPk'];
      $supplier_name = ucwords($_POST['supplierName']);
      $supplier_address = ucwords($_POST['supplierAddress']);
      $supplier_barangay = ucwords($_POST['supplierBarangay']);
      $supplier_contact_number = $_POST['supplierContactNumber'];
      $supplier_proprietor = ucwords($_POST['supplierProprietor']);
      $supplier_nature = ucwords($_POST['supplierNature']);
      
      $sql = "UPDATE supplier set supplier_name = '$supplier_name', supplier_address = '$supplier_address', supplier_barangay = '$supplier_barangay', supplier_contact_number = '$supplier_contact_number', supplier_proprietor = '$supplier_proprietor', supplier_nature = '$supplier_nature ' WHERE supplier_pk = $supplier_pk;";
      if(!mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>" ;
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
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="addSupplierForm">
    		<input type="text" id="supplierName" name="supplierName" placeholder="Supplier Name" required>
    		<label for="supplierName">Supplier Name</label>
    		<input type="text" id="supplierAddress" name="supplierAddress" placeholder="Address" required>
    		<label>Supplier Address</label>
    		<input type="text" id="supplierBarangay" name="supplierBarangay" placeholder="Barangay" required>
    		<label>Barangay</label>
    		<input type="text" id="supplierContactNumber" name="supplierContactNumber" placeholder="Contact Number" required>
    		<label>Contact Number</label>
    		<input type="text" id="supplierProprietor" name="supplierProprietor" placeholder="Proprietor" required>
    		<label>Proprietor</label>
    		<input type="text" id="supplierNature" name="supplierNature" placeholder="Nature of Business" required>
    		<label>Nature of Business</label>
    	</form>
    </div>
  </div>
  <div class="modal-footer">
  	<button type="submit" form="addSupplierForm" name="addSupplierSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div id="editModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>EDIT SUPPLIER</h4>
    <div class="row">
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="editSupplierForm">
    		<input type="text" id="supplierName" name="supplierName" placeholder="Supplier Name" required>
    		<label for="supplierName">Supplier Name</label>
    		<input type="text" id="supplierAddress" name="supplierAddress" placeholder="Address" required>
    		<label>Supplier Address</label>
    		<input type="text" id="supplierBarangay" name="supplierBarangay" placeholder="Barangay" required>
    		<label>Barangay</label>
    		<input type="text" id="supplierContactNumber" name="supplierContactNumber" placeholder="Contact Number" required>
    		<label>Contact Number</label>
    		<input type="text" id="supplierProprietor" name="supplierProprietor" placeholder="Proprietor" required>
    		<label>Proprietor</label>
    		<input type="text" id="supplierNature" name="supplierNature" placeholder="Nature of Business" required>
    		<label>Nature of Business</label>
    		<input type="hidden" name="supplierPk" value="">
    	</form>
    </div>
  </div>
  <div class="modal-footer">
  	<button type="submit" form="editSupplierForm" name="editSupplierSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>



<div class="row">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">Suppliers</span>
        <div class="actions">
          <a href="#modal1" class="waves-effect waves-light btn-flat nopadding"><i class="material-icons">library_add</i></a>
          <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th>Supplier Name</th>
            <th>Address</th>
            <th>Barangay</th>
            <th>Contact #</th>
            <th>Proprietor</th>
            <th>N.O.B.</th>
          </tr>
        </thead>
        <tbody>
          <?php
        		$sql = 'SELECT * FROM supplier';
						$suppliers =  mysqli_query($conn, $sql);

        		while(($row = mysqli_fetch_assoc($suppliers)) != null){
						echo '<tr onclick="editSupplier(\'' . $row['supplier_pk'] . '\')">' .
						 '<td id="sn' . $row['supplier_pk'] . '">' . $row['supplier_name'] . '</td>' .
						 '<td id="sa' . $row['supplier_pk'] . '">' . $row['supplier_address'] . '</td>' .
						 '<td id="sb' . $row['supplier_pk'] . '">' . $row['supplier_barangay'] . '</td>' .
						 '<td id="sc' . $row['supplier_pk'] . '">' . $row['supplier_contact_number'] . '</td>' .
						 '<td id="sp' . $row['supplier_pk'] . '">' . $row['supplier_proprietor'] . '</td>' .
						 '<td id="snt' . $row['supplier_pk'] . '">' . $row['supplier_nature'] . '</td>' . 
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

  function editSupplier(supplier_pk){
  	var supplier_name = document.getElementById("sn"+supplier_pk).innerHTML;
  	var supplier_address = document.getElementById("sa"+supplier_pk).innerHTML;
  	var supplier_barangay = document.getElementById("sb" + supplier_pk).innerHTML;
  	var supplier_contact_number = document.getElementById("sc" + supplier_pk).innerHTML;
  	var supplier_nature = document.getElementById("snt" + supplier_pk).innerHTML;
  	var supplier_proprietor = document.getElementById("sp"+supplier_pk).innerHTML;
  	var editSupplierForm = document.getElementById("editSupplierForm");
  	editSupplierForm.supplierName.value = supplier_name;
  	editSupplierForm.supplierAddress.value = supplier_address;
  	editSupplierForm.supplierBarangay.value = supplier_barangay;
  	editSupplierForm.supplierContactNumber.value = supplier_contact_number;
  	editSupplierForm.supplierNature.value = supplier_nature;
  	editSupplierForm.supplierProprietor.value = supplier_proprietor;
  	editSupplierForm.supplierPk.value = supplier_pk;

  	$("#editModal").openModal();
  }
</script>
</body>
</html>
