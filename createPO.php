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
  <style type="text/css">
    <style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background: #ffffff;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
  </style>
</head>
<body>


<h4 class="center-align">CREATE PURCHASE ORDER</h4>

<div class="container">
  <div class="row">
    <div class="col s5">
      <div class="card-panel">
        <div class="row">
          <form class="col s12">
            <div class="row">

              <div class="input-field col s6">
                <input id="PO_Number" name="po_number" type="hidden" class="validate">
                <p id="PO_Number_P">PO #: </p>
              </div>

             <div class="input-field col s6">
                <input placeholder="Placeholder" name="pr_number" id="PR_Number" type="hidden" class="validate">
                <p id="PR_Number_P">PR #: </p>
              </div>
              <div class="input-field col s12">
                <input placeholder="PO Date" name="po_date" id="Date" type="date" class="datepicker">
                <label for="Date">PO Date</label>
              </div>
              <div class="search-box input-field col s12">
                <label for="Supplier">Supplier</label>
                <input type="text" id="Supplier" autocomplete="off" placeholder="Search Supplier" />
                <div class="result"></div>
              </div>
             <div class="input-field col s12">
                <input placeholder="Mode of Procurement" name="po_mode_of_procurement" id="Mode_Of_Procurement" type="text" class="validate">
                <label for="Mode_Of_Procurement">Mode of Procurement</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Place of Delivery" name="po_place_of_delivery" id="Place_Of_Delivery" type="text" class="validate">
                <label for="Place_Of_Delivery">Place of Delivery</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Date of Delivery" name="po_delivery_date" id="Date_Of_Delivery" type="date" class="datepicker">
                <label for="Date">Date of Delivery</label>
              </div>
              <div class="input-field col s12"> 
                <input placeholder="Delivery Term" name="po_delivery_term" id="Delivery_Term" type="text" class="validate">
                <label for="Delivery_Term">Delivery Term</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Payment Term" name="" id="Payment_Term" type="text" class="validate">
                <label for="Payment_Term">Payment Term</label>
              </div>
              <div class="input-field col s12">
                  <select name="po_for_payment">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                  </select>
                  <label>For Payment</label>
              </div>
                <div class="input-field col s12">
                  <input value="" placeholder="D Tracks #" name="po_d_tracks" id="Payment_Term" type="text" class="validate">
                  <label for="Payment_Term">D Tracks #</label>
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
        <a href="purchaseOrder" class="waves-effect waves-light btn">CREATE PO</a>
      </div>
    </div>
  </div>
</div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
 
 
  <script type="text/javascript">
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );

  var supplier_name = "";
  var supplier_pk = "";

  $(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("modules/searchSuppliers.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        supplier_name = $(this).text();

        if(supplier_name.substring(0, 2) != 'No'){
          $(this).parents(".search-box").find('input[type="text"]').val(supplier_name);
          $(this).parent(".result").empty();
        }

       $.ajax({
          type: "POST",
          url: "modules/getSupplierPK.php",
          data: 'supplier_name=' + supplier_name,
          success: function(strMessage){
            supplier_pk = strMessage;
            //document.getElementById("asd").innerHTML = strMessage;
          }
        });
    });
  });
        

 $(document).ready(function() {
    $('select').material_select();
  });
  </script>
</body>
</html>
