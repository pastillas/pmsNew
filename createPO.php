<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
  if(!isset($_SESSION['name'])){
    header("Location: index.php");
  }
  elseif(isset($_SESSION['name'])){
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Procurement Office Monitoring System</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/createPO.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  
  <script src="js/sweetalert.min.js"></script>
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

  <script type="text/javascript">
    var pr_items = [];
    var final_cost = 0;
    var pr_number = "";
  </script>

  <?php require('connection.php');
  require('navbar.php');
    if(!isset($_POST['pr_po_status_id'])){
      header('Location: pendingPR.php');
    }

    $pr_po_status_id = $_POST['pr_po_status_id'];
    $pr_number = $_POST['pr_number'];

    echo '<script type="text/javascript">pr_number = ' . $pr_number . '</script>';

  ?>
</head>
<body>

<h4 class="center-align" >CREATE PURCHASE ORDER</h4>
<div class="container">

  <div class="row">
    <div class="col s5">
      <div class="card-panel">
        <div class="row">
        <?php 
          $sql = "SELECT *  FROM purchase_request WHERE pr_number = $pr_number";
          $query = mysqli_query($conn, $sql);
          $purchase_request = mysqli_fetch_assoc($query);
        ?>
          <form class="col s12" class="col s12" name="createPOForm" action="pendingPR.php" method="POST" onsubmit="return validatePO()" id="createPOForm">
            <div class="row">

              <div class="input-field col s12">
                <input type="hidden" name="pr_po_status_id" value="<?php echo $pr_po_status_id?>">
                <input id="PO_Number" name="po_number"  type="hidden" value="" class="validate">
                
                <input name="po_number_orig" value="" id="po_number_orig" type="text" required="true" >
                <label for="po_number_orig">PO Number</label>
              </div>

             <div class="input-field col s12">
                <input placeholder="Placeholder" value=" <?php echo $pr_number?>" name="pr_number" id="PR_Number" type="hidden" class="validate">

                <input name="pr_number_orig" value="<?php echo $purchase_request['pr_number_orig']?>" id="pr_number_orig" type="text" required="true" disabled="true">
                <label for="pr_number_orig">PR Number</label>
              </div>

              <div class="input-field col s12">
                <input name="po_date" id="po_date" type="date" class="datepicker" required="true">
                <label for="po_date">PO Date</label>
              </div>
              <div class="search-box input-field col s12">
                <label for="Supplier">Supplier</label>
                <input name="supplier_pk" id="supplier_pk" value="" type="hidden">
                <input type="text" id="Supplier" value="" autocomplete="off"  required="true"/>
                <div class="result"></div>
              </div>
             <div class="input-field col s12">
                <input  name="po_mode_of_procurement" id="Mode_Of_Procurement" type="text" class="validate" required="true">
                <label for="Mode_Of_Procurement">Mode of Procurement</label>
              </div>
              <div class="input-field col s12">
                <input  name="po_place_of_delivery" id="Place_Of_Delivery" type="text" class="validate" >
                <label for="Place_Of_Delivery">Place of Delivery</label>
              </div>
              <div class="input-field col s12">
                <input name="delivery_date" id="Date_Of_Delivery" type="date" class="datepicker" required="true">
                <input type="hidden" name="">
                <label for="Date_Of_Delivery">Date of Delivery</label>
              </div>
              <div class="input-field col s12"> 
                <input name="po_delivery_term" id="Delivery_Term" type="text" class="validate" required="true">
                <label for="Delivery_Term">Delivery Term</label>
              </div>
              <div class="input-field col s12">
                <input  name="po_payment_term" id="Payment_Term" type="text" class="validate" required="true">
                <label for="Payment_Term">Payment Term</label>
              </div>
              <div class="input-field col s12">
                  <select name="for_payment">
                    <option value="1">YES</option>
                    <option value="2" selected="true">NO</option>
                  </select>
                  <label>For Payment</label>
              </div>
                <div class="input-field col s12">
                  <input value=""  name="po_d_tracks" id="Payment_Term" type="text" class="validate">
                  <label for="Payment_Term">D Tracks #</label>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="col s7">
      <table class="striped">
        <thead>
          <tr>
          <th>Item Description</th>
          <th>Unit of Measure</th>
          <th>Estimated Unit Cost</th>
          <th>Quantity</th>
          <th>Estimated Cost</th>
          <th>(Php)Item Total Cost</th>
        </tr>
        </thead>

        <tbody>
        <?php 
          $sql = ' select * from items i left outer join purchase_request_items pi ON i.item_code = pi.item_code WHERE pi.pr_number = ' . $pr_number . ';';
            $pr_items = mysqli_query($conn, $sql);

             $total = 0;

            while(($row = mysqli_fetch_assoc($pr_items)) != null){
              echo '<script type="text/javascript"> pr_items["' . $row['item_code'] . '"] = "' . $row['pr_item_euc'] . '"; final_cost = (final_cost + ' . $row['pr_item_euc'] . ');</script>';
              echo '<tr>'.
                    '<td>' . $row['item_description'] . '</td>' . 
                    '<td>' . $row['item_unit_measure'] . '</td>' . 
                    '<td>Php ' . $row['pr_item_euc'] . '</td>' .
                    '<td>' . $row['quantity'] . '</td>' .
                    '<td>Php ' . $row['quantity'] * $row['pr_item_euc'] . '</td>' .
                    '<td><div class="input-field col s12"> 
                        <input name="' . $row['item_code'] . '" id= "' . $row['item_code'] . '" type="number" step="0.01" class="validate form-control" required="true" value="' . $row['pr_item_euc'] . '" onkeyup=updateItemFinalCost("' . $row['item_code'] . '") >
                        <label for="' . $row['item_code'] . '">Item Total Cost</label>
                      </div></td>' .
                    '</tr>';
                     
              $total += $row['quantity'] * $row['item_euc'];
            }
        ?>
         
         
          <tr>
            <td class="tg-yw4l" colspan="4"><b>Total Estimated Cost</b></td>
            <td class="tg-yw4l" colspan="2"><b><?php echo 'Php ' . $total;?></b></td>
          </tr>
          <tr>
            <td class="tg-yw4l" colspan="4"><b>Total Cost</b></td>
            <td class="tg-yw4l" colspan="2" ><b id="finalCost"></b></td>
          </tr>
        </tbody>
      </table>

      </form>
    <div class="col s9 offset-s3" style="margin-top:20px;">
        <a href="pendingPR.php" class="waves-effect waves-light btn">CANCEL</a>
        <button type="submit" form="createPOForm" id="createPOSubmit" name="createPOSubmit" class="waves-effect waves-light btn">CREATE PO</button>
      </div>
    </div>
  </div>
</div>



  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/moment.js"></script>
 
 
  <script type="text/javascript">
  function updateItemFinalCost(item_code){
    pr_items[item_code] = document.getElementById(item_code).value;

    final_cost = 0;
    for(var key in pr_items){
      final_cost = ((final_cost * 1) + (pr_items[key] * 1));
    }

    document.getElementById("finalCost").innerHTML = "Php " + final_cost;
  }

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
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
  var supplier_name = "";
  var supplier_pk = "";

  $(document).ready(function(){
    document.getElementById("finalCost").innerHTML = "Php " + final_cost;

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
          success: function( strMessage ){
            document.getElementById('supplier_pk').value = strMessage;

            //document.getElementById('bla').innerHTML = strMessage;
            supplier_pk = strMessage;
          }
        });
    });
  });
        

 $(document).ready(function() {
    $('select').material_select();
  });

 $(document).ready(function(){
    document.getElementById('po_date').value = moment().format('DD MMMM, YYYY');

     $.ajax({
        url: "modules/getNextPOID.php",
        datatype: "html",
        success: function(result){
          document.getElementById("PO_Number").value=result;
          //document.getElementById("PO_Number_P").innerHTML= "PO #: <b>" + result + '</b>';
        }
      });
 });

 function validatePO(){
  var valid = false;
    if(supplier_pk != null && supplier_name == document.getElementById('Supplier').value){
      swal({
        title: "Are you sure?",
        text: "Please confirm add PO.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Add PO!",
        closeOnConfirm: false
      },
      function(){
        $.ajax({
          url: "modules/insertPO.php",
          method: "POST",
          data: $('form').serialize(),
          datatype: "text",
          success: function(strMessage){
              //document.getElementById('query').innerHTML = strMessage;
              for(var key in pr_items){
                $.ajax({
                  url: "modules/updateFinalCost.php",
                  method: "POST",
                  data: "pr_number=" + pr_number + "&item_code=" + key + "&final_item_cost=" + pr_items[key],
                  datatype: "text",
                  success: function(strMessage){
                    
                  }
                });     
              }
              window.location = "http://localhost/pmsNew/pendingPR.php";

          }
        });
      });
    }else{  
      Materialize.toast('Please Select Supplier. Thank you.', 3000, 'rounded');
    }


    return false;
 }
  </script>
</body>
</html>
<?php } ?>
