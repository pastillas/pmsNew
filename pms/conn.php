<?php
  $db = new mysqli('localhost', 'root', '', 'z');

  if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
  }
?>
