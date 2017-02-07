<?php
  if(isset($_POST['btn-signup'])) {
    $fname = ucwords($_POST['first_name']);
    $lname = ucwords($_POST['last_name']);
    $pos = ucwords($_POST['position']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $imgFile = $_FILES['profpic']['name'];
    $tmp_dir = $_FILES['profpic']['tmp_name'];
    $imgSize = $_FILES['profpic']['size'];
    $passwordTmp = md5($password);
    if(isset($_FILES["profpic"]["error"])){
      if($_FILES["profpic"]["error"] > 0){
          if($_FILES["profpic"]["error"] == 1){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Registration failed!","Image size is larger than the allowed limit of 2 mb.","error");';
            echo '}, 1000);</script>';
          }
      }
      else{
          $upload_dir = 'uploads/';
          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
          $valid_extensions = array('jpeg', 'jpg', 'png');
          $userpic = rand(1000,1000000).".".$imgExt;

          if(in_array($imgExt, $valid_extensions)){
            if($imgSize < 2000000){ //2MB
              move_uploaded_file($tmp_dir,$upload_dir.$userpic);

              $query = "INSERT INTO user(first_name, last_name, position, username, password) VALUES('".$fname."', '".$lname."', '".$pos."', '".$username."', '".$passwordTmp."');";
              $stmt = $db->prepare("INSERT INTO profpic(image, username) VALUES(?, '".$username."')");
              $stmt->bind_param("s", $userpic);
              // $stmt->execute();

              if($db->query($query) && $stmt->execute()){
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Registration successful!","You may now login.","success");';
                echo '}, 1000);</script>';
              }
              else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Registration failed!","Username already exists.","error");';
                echo '}, 1000);</script>';
              }
            }
          }
          else{
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Registration failed!","Invalid image file.","error");';
            echo '}, 1000);</script>';
          }
        }
      }
    }
?>
