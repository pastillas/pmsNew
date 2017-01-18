<?php
  $db = new mysqli('localhost', 'root', '', 'pmstest');

  if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
  }

  if(isset($_POST['btn-signup'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $pos = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $img = $_FILES['profpic'];

    if(isset($_FILES["profpic"]["error"])){
      if($_FILES["profpic"]["error"] > 0){
          if($_FILES["profpic"]["error"] == 1)
            echo "Image is too large!" . "<br>";
      }
      else{
          $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
          $filename = $_FILES["profpic"]["name"];
          $filetype = $_FILES["profpic"]["type"];
          $filesize = $_FILES["profpic"]["size"];

          // Verify file extension
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(!array_key_exists($ext, $allowed))
            die("Error: Please select a valid image file.");

          // Verify file size - 2MB maximum
          $maxsize = 2 * 1024 * 1024;
          if($filesize > $maxsize)
            die("Error: File size is larger than the allowed limit of 2 MB.");

          if(in_array($filetype, $allowed)){
            $query = "INSERT INTO user(first_name, last_name, position, username, password) VALUES('".$fname."', '".$lname."', '".$pos."', '".$username."', '".$password."')";
            $stmt = $db->prepare("INSERT INTO profpic(image, username) VALUES(?, '".$username."')");
            $null = NULL;
            $stmt->bind_param("b", $null);
            $stmt->send_long_data(0, $img['name']);

            $stmt->execute();

            if($db->query($query)){
              $msg = '<div class="alert alert-success">
                       <span class="glyphicon glyphicon-info-sign"></span> &nbsp; successfully registered !
                    </div>';
            }
            else{
              $msg = '<div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; error while registering !
                    </div>';
            }

          }
        }
      }
    }
?>
