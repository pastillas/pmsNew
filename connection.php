<?php
	$conn = @mysqli_connect('localhost', 'root', '') or die('Unable to connect to the database');
	@mysqli_select_db($conn, 'pms') or die('Unable to load Database');
	
	mysqli_query($conn, "SET NAMES 'utf8'" );
	mysqli_query( $conn, "SET CHARACTER SET 'utf8'");
?>
