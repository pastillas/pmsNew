<?php
  $db = new mysqli('localhost', 'root', '', 'pmstest');

  if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
  }

  $image = $_FILES["myimage"]["name"];
  $imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

  $query = "INSERT INTO profpic(image) VALUES('".$imagetmp."')";
  if($db->query($query)){
    $msg = "<div class='alert alert-success'>
             <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
  }
  else{
    $msg = "<div class='alert alert-danger'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>";
  }

  $db->close();
?>

<html>
  <body>

    <form method="POST" action="getdata.php" enctype="multipart/form-data">
      <input type="file" name="myimage">
      <input type="submit" name="submit_image" value="Upload">
    </form>

  </body>
</html>
