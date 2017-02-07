<?php
	include "conn.php";
	if(isset($_POST["login"])){
		$username = $_POST['username'];
		$pass = md5($_POST['password']);

		@$query = "select * from user where username= '".$username."' and password='".$pass."'; ";
		$result = $db->query($query);


		if($result -> num_rows > 0){
			$row = mysql_fetch_assoc($result);
			session_start();
			$_SESSION['name'] = $username;
			header("Location: home.php");
		}

		else{
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("Login failed!","Incorrect username/password. Redirecting you back to login page...","error");';
			echo '}, 1000);</script>';
			header("Refresh: 2.5; URL=index.php");
		}
	}
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<script src="js/sweetalert.min.js"></script>
	</head>
</html>
