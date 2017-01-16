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

	if(isset($_POST['addOfficeSubmit'])){
		//echo '<script type="text/javascript">alert("kasjhdakd")</script>';
		
		$office_head = ucwords($_POST['officeHead']);
		$office_code = strtoupper($_POST['officeCode']);
		$office_name = ucwords($_POST['officeName']);
		
		$sql = "INSERT INTO offices values('$office_code', '$office_head', '$office_name')";
		
		if(!mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>"  ;
		}
	
	}
	
  ?>

</head>
<body>
<!--Navs-->
<?php 
  include("navbar.php");
  include("sidebar.php");
?>

  <div class="offices">
    <div class="row">
      <h4 class="col s11" style="margin-bottom: 0;">OFFICES</h4>
      <button class="waves-effect waves-teal btn col s1" id="addOffice"><i class="material-icons">add</i></button>    
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
            <th>Office Code</th>
            <th>Office Head</th>
            <th>Office Name</th>
            <th></th>
            </tr>
        </thead>

        <tbody>
			<form name="addOfficeForm" id="addOfficeFormId" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			  <tr class="td1" id="td1">
				<td style="width:25%;"><input required name="officeCode" placeholder="Office Code" id="first_name" type="text" class="validate"></td>
				<td style="width:25%;"><input required name="officeHead" placeholder="Office Head" ixd="first_name" type="text" class="validate"></td>
				<td style="width:25%;"><input required name="officeName" placeholder="Office Name" id="first_name" type="text" class="validate"></td>
				<td style="width:25%;">
					<button type="submit" form="addOfficeFormId" name="addOfficeSubmit" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">done</i></button> </td>
			  </tr>
			</form>
			
	<?php 
		if(isset($_POST['updateOfficeSave'])){
			$office_head = ucwords($_POST['officeHead']);
			$office_code = strtoupper($_POST['officeCode']);
			$office_name = ucwords($_POST['officeName']);
			
			$sql = "UPDATE offices set office_head = '$office_head', office_name = '$office_name' WHERE office_code = '$office_code'";
			
			if(!mysqli_query($conn, $sql)){
				echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>"  ;
				mysqli_error($conn);
			}
		}
		
	?>
			
			<form id="updateSaveFormId" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
				<?php 
					$sql = "SELECT * FROM offices;";
					$offices = mysqli_query($conn, $sql);
					
					if(isset($_POST['editOfficeCode'])){
						$office_code = $_POST['editOfficeCode'];

						while(($row = mysqli_fetch_assoc($offices)) != null){
							if(strcmp($office_code, $row['office_code']) == 0){
								?>	
								<tr>
									<?php echo '<td>' . $row['office_code'] . '</td>'; ?>
									<input value="<?php echo $row['office_code']?>" required name="officeCode" placeholder="Office Code" id="first_name" type="hidden" class="validate">
									<td style="width:25%;"><input value="<?php echo $row['office_head']?>" required name="officeHead" placeholder="Office Head" id="first_name" type="text" style="text-align: center;" class="validate"></td>
									<td style="width:25%;"><input value="<?php echo $row['office_name']?>" required name="officeName" placeholder="Office Name" id="first_name" type="text" style="text-align: center;" class="validate"></td>
									<td style="width:25%;"><button type="submit" form="updateSaveFormId" name="updateOfficeSave" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">done</i></button> </td>
								</tr>
								<?php
							}else{
								echo '<tr id="' . $row['office_code'] . '">' . 
								'<td>' . $row['office_code'] . '</td>' .
								'<td>' . $row['office_head'] . '</td>' . 
								'<td>' . $row['office_name'] . '</td>' . 
								'<td><a onclick=updateOffice(' . "'" . $row['office_code'] . "'" . ') class="waves-effect waves-teal btn-flat"><i  class="material-icons teal-text">edit</i></a></td>' . 
								'</tr>';
							}
						}
					}else{
						while(($row = mysqli_fetch_assoc($offices)) != null){
							echo '<tr id="' . $row['office_code'] . '">' . 
								'<td>' . $row['office_code'] . '</td>' .
								'<td>' . $row['office_head'] . '</td>' . 
								'<td>' . $row['office_name'] . '</td>' . 
								'<td><a onclick=updateOffice(' . "'" . $row['office_code'] . "'" . ') class="waves-effect waves-teal btn-flat"><i  class="material-icons teal-text">edit</i></a></td>' . 
								'</tr>';
						}
					}
				?>
			</form>
        </tbody>
      </table> 
    </div>
	
	<script type="text/javascript">
		function updateOffice( office_code ){
			var editFormName = document.getElementById("editFormId");
			editFormName.editOfficeCode.value = office_code;
			editFormName.submit();
		}
	</script>
	
	<form name="editFormName" id="editFormId" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
		<input type="hidden" name="editOfficeCode" value="">
	</form>
	
  </div>

           
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>  
  <script type="text/javascript">
    $(function () {
        $('#addOffice').click(function () {
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
