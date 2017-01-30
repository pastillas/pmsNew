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

<h4 class="center-align">CREATE PURCHASE ORDER</h4>

<div class="container">
  <div class="row">
    <div class="col s5">
      <div class="card-panel">
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="Placeholder" id="PO_Number" type="text" class="validate">
                <label for="PO_Number">PO Number</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Placeholder" id="Date" type="date" class="datepicker">
                <label for="Date">Date</label>
              </div>
             <div class="input-field col s12">
                <input placeholder="Placeholder" id="PR_Number" type="text" class="validate">
                <label for="PR_Number">PR Number</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Placeholder" id="Supplier" type="text" class="validate">
                <label for="Supplier">Supplier</label>
              </div>
             <div class="input-field col s12">
                <input placeholder="Placeholder" id="Supplier_Address" type="text" class="validate">
                <label for="Supplier_Address">Supplier Address</label>
              </div>
             <div class="input-field col s12">
                <input placeholder="Placeholder" id="Mode_Of_Procurement" type="text" class="validate">
                <label for="Mode_Of_Procurement">Mode of Procurement</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Placeholder" id="Place_Of_Delivery" type="text" class="validate">
                <label for="Place_Of_Delivery">Place of Delivery</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Placeholder" id="Date_Of_Delivery" type="date" class="datepicker">
                <label for="Date">Date of Delivery</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Placeholder" id="Delivery_Term" type="text" class="validate">
                <label for="Delivery_Term">Delivery Term</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Placeholder" id="Payment_Term" type="text" class="validate">
                <label for="Payment_Term">Payment Term</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col s7">
      <table class="striped">
        <thead>
          <tr>
            <th>Item No.</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Amount</th>
          </tr>
        </thead>

        <tbody>
          <tr class="td1" id="td1">
            <td><input placeholder="Item No." id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Description" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit Cost" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Amount" id="first_name" type="text" class="validate"></td>
          </tr>
          <tr>
            <td><input placeholder="Item No." id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Description" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit Cost" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Amount" id="first_name" type="text" class="validate"></td>
          </tr>
          <tr>
            <td><input placeholder="Item No." id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Description" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit Cost" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Amount" id="first_name" type="text" class="validate"></td>
          </tr>
          <tr>
            <td><input placeholder="Item No." id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Quantity" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Description" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Unit Cost" id="first_name" type="text" class="validate"></td>
            <td><input placeholder="Amount" id="first_name" type="text" class="validate"></td>
          </tr>
          <tr>
            <td colspan="4">Total Amount</td>
            <td colspan="2">0.00</td>
          </tr>
        </tbody>
      </table>
      <div class="col s10 offset-s2">
        <a href="purchaseOrder.php" class="waves-effect waves-light btn">CANCEL</a>
        <a class="waves-effect waves-light btn">RESET</a>
        <a href="purchaseOrder" class="waves-effect waves-light btn">CREATE PO</a>
      </div>
    </div>
    <div class="fixed-action-btn">
      <button class="btn-floating btn-large waves-effect waves-light teal" id="addCPO"><i class="material-icons">add</i></button>
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
        $('#addCPO').click(function () {
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
