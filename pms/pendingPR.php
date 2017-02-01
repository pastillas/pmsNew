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

  <div class="pendingPR">
    <div class="row">
      <h4 class="col s11" style="margin-bottom: 0;">Pending Purchase Requests</h4>
      <button class="waves-effect waves-teal btn col s1" id="addPR"><i class="material-icons">add</i></button>
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
            <th class="pr">PR No.</th>
            <th class="po">PO No.</th>
            <th>Requesting Office</th>
            <th>Supplier</th>
            <th>Delivery Date</th>
            <th>Total Estimated Cost</th>
            <th>Total Cost</th>
            <th>Status</th>
            </tr>
        </thead>

        <tbody>
          <tr class="td1" id="td1">
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
          <tr>
            <td class="pr"><a href="PR.php">1918</a></td>
            <td class="po"><a href="PO.php">12-0918</a></td>
            <td>Requesting Status</td>
            <td>Supplier</td>
            <td>Delivery Date</td>
            <td>Total Estimated Cost</td>
            <td>Total Cost</td>
            <td><button data-target="statusModal2" class="btn">STATUS</button></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>


    <div id="statusModal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus1"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td1" id="td1">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal2" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus2"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td2" id="td2">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal3" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus3"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td3" id="td3">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal4" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus4"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td4" id="td4">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal5" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus5"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td5" id="td5">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal6" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus6"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td6" id="td6">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal7" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus7"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td7" id="td7">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
      </div>
    </div>
    <div id="statusModal8" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="row">
          <h5 class="col s10">PR Status</h5>
          <button class="waves-effect waves-teal btn col s2" id="addStatus8"><i class="material-icons">add</i></button>
        </div>
          <div class="divider"></div>
        <table class="centered striped" id="statusTable">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr class="td8" id="td8">
              <td><input placeholder="Date" id="Date_PR" type="date" class="datepicker"></td>
              <td><input placeholder="Status" id="first_name" type="text" class="validate"></td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
            </tr>
            <tr>
              <td>Alan</td>
              <td>Jellybean</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td>Lollipop</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
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
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
    $(function () {
      $('#addStatus1').click(function () {
          $('.td1').toggle();
      });
    });
    $(function () {
      $('#addStatus2').click(function () {
          $('.td2').toggle();
      });
    });
    $(function () {
      $('#addStatus3').click(function () {
          $('.td3').toggle();
      });
    });
    $(function () {
      $('#addStatus4').click(function () {
          $('.td4').toggle();
      });
    });
    $(function () {
      $('#addStatus5').click(function () {
          $('.td5').toggle();
      });
    });
    $(function () {
      $('#addStatus6').click(function () {
          $('.td6').toggle();
      });
    });
    $(function () {
      $('#addStatus7').click(function () {
          $('.td7').toggle();
      });
    });
    $(function () {
      $('#addStatus8').click(function () {
          $('.td8').toggle();
      });
    });
  </script>
  <script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
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
