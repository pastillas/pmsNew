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
<style type="text/css">
.modal{
  width: 500px !important;
}
table{
  text-align: center !important;
  height: 300px !important;
}
tbody {
    display:block;
    height:100%;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
.modal .modal-fixed-footer{
  height: 100% !important;
}
button{
  margin-top: 5px;
}
</style>
<body>
  <!--Navs-->
  <?php 
  include("navbar.php");
  ?>
  <?php 
  include("sidebar.php");
  ?>

  <div class="container">
    <h4 class="center-align">Purchase Request Details</h4>
    <div class="divider"></div>
    <div class="row">
      <div class="col s5">
        <div class="card-panel">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input value="value" id="PR_Number" type="text" class="validate">
                  <label for="PR_Number">PR Number</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="Date_PR" type="date" class="datepicker">
                  <label for="Date">Date</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="PR_Number" type="text" class="validate">
                  <label for="PR_Number">PO Number</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="Date_PR" type="date" class="datepicker">
                  <label for="Date">Date</label>
                </div>
                <div class="input-field col s12">
                  <input value="value" id="Department" type="text" class="validate">
                  <label for="Department">Department</label>
                </div>
                <div class="input-field col s12">
                  <input value="value" id="Division_Section" type="text" class="validate">
                  <label for="Division_Section">Division/Section</label>
                </div>
               <div class="input-field col s12">
                  <input value="value" id="Purpose" type="text" class="validate">
                  <label for="Purpose">Purpose</label>
                </div>
                <div class="input-field col s12">
                  <input value="value" id="Requestor" type="text" class="validate">
                  <label for="Requestor">Requesting Office</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="SAI_Number" type="text" class="validate">
                  <label for="SAI_Number">SAI Number</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="Date_SAI" type="date" class="datepicker">
                  <label for="Date_SAI">Date</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="OBR_Number" type="text" class="validate">
                  <label for="OBR_Number">OBR Number</label>
                </div>
                <div class="input-field col s6">
                  <input value="value" id="Date_OBR" type="date" class="datepicker">
                  <label for="Date_OBR">Date</label>
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
              <th>Item Description</th>
              <th>Quantity</th>
              <th>Unit of Measure</th>
              <th>Estimated Unit Cost</th>
              <th>Estimated Cost</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>78</td>
              <td>kg</td>
              <td>Cement</td>
              <td>$0.87</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>23</td>
              <td>m</td>
              <td>Wood</td>
              <td>$0.87</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td>44</td>
              <td>pcs</td>
              <td>Pencil</td>
              <td>$0.87</td>
              <td>$0.87</td>
            </tr>
            <tr>
              <td colspan="3">Total Estimated Cost</td>
              <td colspan="4">2.16</td>
            </tr>
          </tbody>
        </table>
        <div class="col s10 offset-s2">
          <a href="editPR.php" class="waves-effect waves-light btn">EDIT</a>
          <a href="#" class="waves-effect waves-light btn">DELETE</a>
          <a href="pendingPR.php" class="waves-effect waves-light btn">PRINT PR</a>
        </div>
        <div class="col s11 offset-s3" >
          <a href="#" class="waves-effect waves-light btn" style="margin-top:5px;">CREATE PURCHASE ORDER</a>
        </div>
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
    $(function () {
        $('#addOffice').click(function () {
            $('.td1').toggle();
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
