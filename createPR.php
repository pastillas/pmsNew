<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Procurement Office Monitoring System</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/createPO.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

  <!--Navs-->
  <?php 
  include("navbar.php");
  ?>


<h4 class="center-align">CREATE NEW PURCHASE REQUEST</h4>

<div class="container">
<div class="row">
  <div class="col s5">
    <div class="card-panel">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="PR_Number" type="text" class="validate">
              <label for="PR_Number">PR Number</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="Date_PR" type="date" class="datepicker">
              <label for="Date">Date</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="Placeholder" id="Department" type="text" class="validate">
              <label for="Department">Department</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="Placeholder" id="Division_Section" type="text" class="validate">
              <label for="Division_Section">Division/Section</label>
            </div>
           <div class="input-field col s12">
              <input placeholder="Placeholder" id="Purpose" type="text" class="validate">
              <label for="Purpose">Purpose</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="Placeholder" id="Requestor" type="text" class="validate">
              <label for="Requestor">Requesting Officer</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="SAI_Number" type="text" class="validate">
              <label for="SAI_Number">SAI Number</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="Date_SAI" type="date" class="datepicker">
              <label for="Date_SAI">Date</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="OBR_Number" type="text" class="validate">
              <label for="OBR_Number">OBR Number</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="Date_OBR" type="date" class="datepicker">
              <label for="Date_OBR">Date</label>
            </div>
          </div>
          <!--<div class="row">
            <div class="input-field col s12">
              <input disabled value="I am not editable" id="disabled" type="text" class="validate">
              <label for="disabled">Disabled</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              This is an inline input field:
              <div class="input-field inline">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">Email</label>
              </div>
            </div>
          </div>-->
        </form>
      </div>
    </div>
  </div>

  <div class="col s7">
    <table class="striped centered">
      <thead>
        <tr>
          <th>Item Description</th>
          <th>Quantity</th>
          <th>Unit of Measure</th>
          <th>Estimated Unit Cost</th>
          <th>Estimated Cost</th>
        </tr>
      </thead>

      <tbody>
        <tr class="td1" id="td1">
          <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Unit of Measure" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Item Description" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Unit Cost" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Cost" id="first_name" type="text" class="validate"></td>
        </tr>
        <tr>
          <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Unit of Measure" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Item Description" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Unit Cost" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Cost" id="first_name" type="text" class="validate"></td>
        </tr>
        <tr>
          <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Unit of Measure" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Item Description" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Unit Cost" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Cost" id="first_name" type="text" class="validate"></td>
        </tr>
        <tr>
          <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Unit of Measure" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Item Description" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Unit Cost" id="first_name" type="text" class="validate"></td>
          <td><input placeholder="Estimated Cost" id="first_name" type="text" class="validate"></td>
        </tr>
        <tr>
          <td class="tg-yw4l" colspan="4">Total Estimated Cost</td>
          <td class="tg-yw4l" colspan="2">0.00</td>
        </tr>
      </tbody>
    </table>

    <div class="col s10 offset-s2">
      <a href="pendingPR.php" class="waves-effect waves-light btn">CANCEL</a>
      <a class="waves-effect waves-light btn">RESET</a>
      <a href="pendingPR.php" class="waves-effect waves-light btn">CREATE PR</a>
    </div>
  </div>
    <div class="fixed-action-btn">
      <button class="btn-floating btn-large waves-effect waves-light teal" id="addCPR"><i class="material-icons">add</i></button>
    </div>
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
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  </script>
  <script type="text/javascript">
    $(function () {
        $('#addCPR').click(function () {
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
