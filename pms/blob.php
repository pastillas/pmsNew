<?php
  // include "conn.php";
  // $stmt = $db->prepare("INSERT INTO images(image) VALUES(?)");
	// $null = NULL;
	// $stmt->bind_param("s", $null);
  // $fp = fopen("images.jfif", "r");
  // while (!feof($fp)) {
  //     $stmt->send_long_data(0, fread($fp, 8192));
  // }
  // fclose($fp);
  // $stmt->execute();
  $fp = fopen("images.jfif", "r");
  echo $fp;
  echo $fp['name'];
?>
