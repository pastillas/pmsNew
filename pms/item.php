<?php
	include "conn.php";
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}
	elseif(isset($_SESSION['name'])){
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
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <!--Navs-->
  <?php
  include("navbar.php");
  ?>
  <?php
  include("sidebar.php");
  ?>

  <div class="items">

    <div class="row">
      <h4 class="col s11" style="margin-bottom: 0;">ITEMS</h4>
      <button class="waves-effect waves-teal btn col s1" id="addItem"><i class="material-icons">add</i></button>
    </div>
      <div class="input-field">
        <input id="search" type="search" required>
        <label for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
      </div>
    <div class="card-panel">
      <table class="centered striped">
        <thead>
          <tr>
            <th>Item Code</th>
            <th>Description</th>
            <th>Unit of Measure</th>
            <th>Object of Expenditure</th>
            <th>Estimated Unit Cost</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr class="td1" id="td1">
            <td><input placeholder="Item Code" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Description" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit of Measure" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Object of Expenditure" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="E.U.C." id="first_name" type="text" class="validate"></td>
            <td><button class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">done</i></button> </td>
            <td><button class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">cancel</i></button> </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
            <td>1</td>
            <td>Cement</td>
            <td>kg</td>
            <td>Office Supplies</td>
            <td>E.U.C.</td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">edit</i></a></td>
            <td><a href="" class="waves-effect waves-teal btn-flat"><i class="material-icons teal-text">delete</i></a></td>
          </tr>
        </tbody>
      </table>
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
    $(function () {
        $('#addItem').click(function () {
            $('.td1').toggle();
        });
    });
  </script>
  <script type="text/javascript">
  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );

  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();

  </script>
</body>
</html>
<?php
  }
?>
