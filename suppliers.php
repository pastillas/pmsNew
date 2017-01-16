<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<?php
		require("connection.php");
		
	?>
</head>
<body>
<!--Navs-->
<?php 
	include("navbar.php");
	include("sidebar.php");
?>

  <div class="suppliers" id="suppliers">
    <div class="row">
      <h4 class="col s11" style="margin-bottom: 0;">SUPPLIERS</h4>
      <button class="waves-effect waves-teal btn col s1" id="addSuppliers"><i class="material-icons">add</i></button>
    </div>
      <div class="input-field">
        <input id="search" type="search" required>
        <label for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
      </div>
    <div class="card-panel">
      <table class="centered striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Proprietor</th>
            <th>N.O.B.</th>
            <th class="edit"></th>
            <th class="delete"></th>
          </tr>
        </thead>

        <tbody>
		  <?php 
				if(isset($_POST['addSupplierSubmit'])){
					//echo "<script type='text/javascript'>alert('yeah')</script>";
					$supplier_name = ucwords($_POST['supplierName']);
					$supplier_address = ucwords($_POST['supplierAddress']);
					$supplier_contact_number = $_POST['supplierContactNumber'];
					$supplier_proprietor = ucwords($_POST['supplierProprietor']);
					$supplier_nature = ucwords($_POST['supplierNature']);
					
					$sql = "INSERT INTO supplier(supplier_name, supplier_address, supplier_contact_number, supplier_proprietor, supplier_nature) values('$supplier_name', '$supplier_address', '$supplier_contact_number', '$supplier_proprietor', '$supplier_nature');";
					if(!mysqli_query($conn, $sql)){
						echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>" ;
					}
				}
		  ?>
		  
			<script type="text/javascript">
				function updateSupplier( supplier_pk ){
					var updateSupplierForm = document.getElementById("updateSupplierForm");
					updateSupplierForm.supplierPk.value = supplier_pk;
					updateSupplierForm.submit();
				}
			</script>
			
			<form id="updateSupplierForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> ">
				<input type="hidden" name="supplierPk" value="">
			</form>

		  <form id="addSupplierFormId" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
			  <tr class="td1" id="td1">
				<td><input required name="supplierName" placeholder="Name" id="first_name" type="text" class="validate"></td>
				<td><input required name="supplierAddress" placeholder="Address" id="first_name" type="text" class="validate"></td>
				<td><input required name="supplierContactNumber" placeholder="Contact Number" id="first_name" type="text" class="validate"></td>
				<td><input required name="supplierProprietor" placeholder="Proprietor" id="first_name" type="text" class="validate"></td>
				<td><input required name="supplierNature" placeholder="N.O.B." id="first_name" type="text" class="validate"></td>
				<td class="edit"><button type="submit" name="addSupplierSubmit" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">done</i></button> </td>
				<td class="delete"><button class="waves-effect waves-teal btn-flat" id="cancelAddSuppliers"><i class="material-icons teal-text">cancel</i></button> </td>
			  </tr>
		  </form>
		  
		  <?php 
				if(isset($_POST['updateSupplierSubmit'])){
					//echo "<script type='text/javascript'>alert('yeah')</script>";
					$supplier_pk = $_POST['updateSupplierPk'];
					$supplier_name = ucwords($_POST['supplierName']);
					$supplier_address = ucwords($_POST['supplierAddress']);
					$supplier_contact_number = $_POST['supplierContactNumber'];
					$supplier_proprietor = ucwords($_POST['supplierProprietor']);
					$supplier_nature = ucwords($_POST['supplierNature']);
					
					$sql = "UPDATE supplier set supplier_name = '$supplier_name', supplier_address = '$supplier_address', supplier_contact_number = '$supplier_contact_number', supplier_proprietor = '$supplier_proprietor', supplier_nature = '$supplier_nature ' WHERE supplier_pk = $supplier_pk;";
					if(!mysqli_query($conn, $sql)){
						echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>" ;
					}
				}
		  ?>
		  
			<form id="updateSupplierFormId" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
				<?php 
					$sql = 'SELECT * FROM supplier';
					$suppliers =  mysqli_query($conn, $sql);
					
					if(isset($_POST['supplierPk'])){
						//echo "<script type='text/javascript'>alert(" . $_POST['supplierPk'] . ")</script>" ;
						
						while(($row = mysqli_fetch_assoc($suppliers)) != null){
							if($_POST['supplierPk'] == $row['supplier_pk']){
							?>
								  <tr>
								  <input type="hidden" name="updateSupplierPk" value="<?php echo $row['supplier_pk']?>">
									<td><input required name="supplierName" placeholder="Name" id="first_name" type="text" class="validate" value="<?php echo $row['supplier_name']?>" style="text-align: center"></td>
									<td><input required name="supplierAddress" placeholder="Address" id="first_name" type="text" class="validate" value="<?php echo $row['supplier_address']?>"  style="text-align: center"></td>
									<td><input required name="supplierContactNumber" placeholder="Contact Number" id="first_name" type="text" class="validate" value="<?php echo $row['supplier_contact_number']?>"  style="text-align: center"></td>
									<td><input required name="supplierProprietor" placeholder="Proprietor" id="first_name" type="text" class="validate" value="<?php echo $row['supplier_proprietor']?>"  style="text-align: center"></td>
									<td><input required name="supplierNature" placeholder="N.O.B." id="first_name" type="text" class="validate" value="<?php echo $row['supplier_nature']?>"  style="text-align: center"></td>
									<td class="edit"><button type="submit" name="updateSupplierSubmit" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">done</i></button> </td>
									<td class="delete"><button class="waves-effect waves-teal btn-flat" id="cancelUpdateSuppliers"><i class="material-icons teal-text">cancel</i></button> </td>
								  </tr>
								
							<?php
							}else{
								echo '<tr>' . 
								 '<td>' . $row['supplier_name'] . '</td>' .
								 '<td>' . $row['supplier_address'] . '</td>' .
								 '<td>' . $row['supplier_contact_number'] . '</td>' .
								 '<td>' . $row['supplier_proprietor'] . '</td>' .
								 '<td>' . $row['supplier_proprietor'] . '</td>' . 
								 '<td class="edit"><a class="waves-effect waves-teal btn-flat" onclick=updateSupplier(' . $row['supplier_pk'] . ') ><i class="material-icons teal-text">edit</i></a></td>' . 
								 '<tr>';
							}
						}
						
					}else{
						while(($row = mysqli_fetch_assoc($suppliers)) != null){
							echo '<tr>' . 
							 '<td>' . $row['supplier_name'] . '</td>' .
							 '<td>' . $row['supplier_address'] . '</td>' .
							 '<td>' . $row['supplier_contact_number'] . '</td>' .
							 '<td>' . $row['supplier_proprietor'] . '</td>' .
							 '<td>' . $row['supplier_proprietor'] . '</td>' . 
							 '<td class="edit"><a class="waves-effect waves-teal btn-flat" onclick=updateSupplier(' . $row['supplier_pk'] . ') ><i class="material-icons teal-text">edit</i></a></td>' . 
							 '<tr>';
						}
					}
				?>
			</form>
          
        </tbody>
      </table>
    </div>
  </div>

            


<!--
  <footer class="page-footer teal">

    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script> 
  <script type="text/javascript">
    $(function () {
        $('#addSuppliers').click(function () {
            $('.td1').toggle();
        });
    });
	
	 $(function () {
        $('#cancelAddSuppliers').click(function () {
            $('.td1').toggle();
        });
    });
  </script>
<script type="text/javascript">
  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
     
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
        
  </script>
</body>
</html>
