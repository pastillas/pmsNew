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
</head>
<body>

<div class="headerr">
      <img src="img/naga_seal.png">
      <h5>Procurement Office Monitoring System</h5>
</div>

<!--Login Form-->
<div class="card-panel">
  <div class="container">
    <h4>LOGIN</h4>
    <form class="col s6" action="home.php">
      <div class="row">
        <div class="input-field col s12">
          <input id="text" type="text" class="validate">
          <label for="text">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row" id="log">
        <button class="waves-effect waves-light btn col s12" type="submit" value="SIGN IN" >SIGN IN</button>
      </div>
      <div class="row" id="log">
        <a class="waves-effect waves-light btn col s12" href="#modal1">REGISTER</a>
      </div>
      <!-- Modal Structure -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Register</h4>
          <div class="row">
            <form action="index.php">
              <div class="col s6">
                <div class="file-field input-field">
                  <img src="yuna.png" style="width:250px;">
                  <br>
                  <div class="btn">
                    <span>File</span>
                    <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>
              <div class="col s6">
                <div class="container">
                  <div class="input-field">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                  </div>
                  <div class="input-field">
                    <input placeholder="Placeholder" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                  </div>
                  <div class="input-field">
                    <input placeholder="Placeholder" id="Position" type="text" class="validate">
                    <label for="position">Position</label>
                  </div>
                  <div class="input-field">
                    <input placeholder="Placeholder" id="username" type="text" class="validate">
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field">
                    <input placeholder="Placeholder" id="password" type="text" class="validate">
                    <label for="password">Password</label>
                  </div>
                </div>
                  
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
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
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
