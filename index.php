<?php
  include "conn.php";
  include "register.php";
?>

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
  <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>
<body>

<div class="header">
      <img src="img/naga_seal.png">
      <h5>Procurement Office Monitoring System</h5>
</div>

<!--Login Form-->
<div class="card-panel">
  <div class="container">
    <h4>LOGIN</h4>
    <form class="col s6" method="post" action="login.php">
      <div class="row">
        <div class="input-field col s12">
          <input id="text" name="username" type="text" class="validate" required>
          <label for="text">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row" id="log">
        <button class="waves-effect waves-light btn col s12" type="submit" name="login">SIGN IN</button>
      </div>
    </form>
      <div class="row" id="log">
        <a class="waves-effect waves-light btn col s12" href="#modal1">REGISTER</a>
      </div>
      <!-- Modal Structure -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Register</h4>
          <div class="row">
            <form method="POST" id="register-form" enctype="multipart/form-data">
              <div class="col s6">
                <div class="file-field input-field">
                  <img src="yuna.png" style="width:250px;">
                  <br>
                  <div class="btn">
                    <span>File</span>
                    <input type="file" name="profpic" id="profpic" required>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>
              <div class="col s6">
                <div class="container">
                  <div class="input-field">
                    <input name="first_name" type="text" class="validate" required>
                    <label for="first_name">First Name</label>
                  </div>
                  <div class="input-field">
                    <input  name="last_name" type="text" class="validate" required>
                    <label for="last_name">Last Name</label>
                  </div>
                  <div class="input-field">
                    <input  name="position" type="text" class="validate" required>
                    <label for="position">Position</label>
                  </div>
                  <div class="input-field">
                    <input  name="username" type="text" class="validate" required>
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field">
                    <input  name="password" type="password" class="validate" required>
                    <label for="password">Password</label>
                  </div>
                </div>
              </div>
              <!--</form>-->
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="btn-signup" class="modal-action waves-effect waves-green btn-flat" id="done">Done</button>
        </div>
      </div>
    </form>
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
  </script>

</body>
</html>
