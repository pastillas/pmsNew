<?php
	$conn = @mysqli_connect('localhost', 'root', '') or die('Unable to connect to the database');
	@mysqli_select_db($conn, 'pms') or die('Unable to load Database');
?>
