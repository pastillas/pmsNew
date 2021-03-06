<!DOCTYPE html>
<html lang="en">
<?php
  include "conn.php";
  session_start();
  if(!isset($_SESSION['name'])){
    header("Location: index.php");
  }
  elseif(isset($_SESSION['name'])){
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Home</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/home.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/component.css">
  <style type="text/css">
td.po, th.pr,
td.pr, th.po{
  width: 20%;
}
</style>
</head>
<body style="height:500px;">

<!--Navs-->
<?php 
    require("navbar.php");
    require("sidebar.php");
?>



    <div class="card-panel"  style="margin: 102px 30px 30px 330px; width: 76.5%;">
      <div class="row">
          <div class="row">
              <h2 class="teal-text center-align" style="margin: 0px;">DELIVERIES</h2>
             <form method="POST" name="deliveryForm" id="deliveryForm">
              <div class="input-field col s12" style="margin-top:0;">
                <input name="delivery_date" placeholder="Delivery date" id="delivery_date" type="date" class="datepicker center-align" style=" margin-bottom:0px;">
                
              </div>
              </form>
            <table class="centered striped">
          <thead style="background-color: #e0f2f1;">
            <tr>
              <th class="po">PO No.</th>
              <th class="pr">PR No.</th>
              <th>Supplier</th>
              <th>Requesting Office</th>
            </tr>
          </thead>

          <tbody id="tbody">
           
          </tbody>
        </table>
          </div>
      </div>
    </div>

  
  <form action="PR.php" method="POST" id="prForm">
    <input type="hidden" name="pr_po_status_id" value="">
  </form>

  <form action="PO.php" method="POST" id="poForm">
    <input type="hidden" name="pr_po_status_id" value="">
  </form>

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/md-date-time-picker.js"></script>
  <script src="js/moment.js"></script>
  
<script type="text/javascript">


  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );

   function openPR(id){
      var prForm = document.getElementById('prForm');
      prForm.pr_po_status_id.value = id;
      prForm.submit();
  }

  function openPO(id){
      var poForm = document.getElementById('poForm');
      poForm.pr_po_status_id.value = id;
      poForm.submit();
  }

  $(document).ready(function(){
    var delivery_date = document.getElementById('delivery_date').value = moment().format('DD MMMM, YYYY');
    $.ajax({

        data: "delivery_date=" + delivery_date,
        type: "POST",
        url: "modules/getPrPoStatus.php",
        success: function(strMessage){
          document.getElementById("tbody").innerHTML = strMessage;
        }
      });
  });


  $(document).ready(function(){

    $("#delivery_date").on("change", function() {

      var delivery_date = $(this).val();
      var form = $("#deliveryForm").serialize() + "&delivery_date" + delivery_date;

      $.ajax({

        data: form,
        type: "POST",
        url: "modules/getPrPoStatus.php",
        success: function(strMessage){
          document.getElementById("tbody").innerHTML = strMessage;
        }
      });
    });
  });
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
        
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  </script>
</body>
</html>

<?php
}
?>
