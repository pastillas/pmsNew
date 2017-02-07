<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(!isset($_SESSION['name'])){
    header("Location: index.php");
  }
  elseif(isset($_SESSION['name'])){
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>PO</title>
 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/createPO.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
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
  <?php 
    require("navbar.php"); ?>
</head>
<body>
  <!--Navs-->
<?php 
  //include("navbar.php");
  //include("sidebar.php");
  require('connection.php');

  if(!isset($_POST['pr_po_status_id']))
    header('Location: pendingPR.php' );

  $pr_po_status_id = $_POST['pr_po_status_id'];

  $sql = 'select * from pr_po_status ps, purchase_order po, supplier s WHERE ps.pr_po_status_id = ' . $pr_po_status_id . ' AND ps.po_number = po.po_number AND ps.supplier_pk = s.supplier_pk;';
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($query);

  $sql = 'SELECT pr.pr_number_orig as "pr_number_orig" FROM purchase_request pr, pr_po_status ps WHERE pr.pr_number = ps.pr_number AND ps.pr_po_status_id = ' . $pr_po_status_id . ';';
  $query = mysqli_query($conn, $sql);
  $pr_number_orig = mysqli_fetch_array($query);

  echo '<script type="text/javascript">var supplier_pk = ' . $result['supplier_pk'] . '; var supplier_name = "' . $result['supplier_name'] . '";</script>'
?>

<h4 class="center-align" style="margin-top: 72px"> VIEW/EDIT PURCHASE ORDER</h4>
<p id="query"></p>

<div class="container">

  <div class="row">
    <div class="col s5">
      <div class="card-panel">
        <div class="row">

          <form class="col s12" class="col s12" name="updatePOForm" action="" method="POST" onsubmit="return updatePO()" id="updatePOForm">
            <div class="row">

              <div class="input-field col s12">
                <input type="hidden" name="pr_po_status_id" value="<?php echo $result['pr_po_status_id']?>">
                <input id="PO_Number" name="po_number"  type="hidden" value="<?php echo $result['po_number']?>" class="validate">
                

                <input " id="po_number_orig" name="po_number_orig" type="text" value="<?php echo $result['po_number_orig']?>" required="true">
                <label for="po_number_orig">PO Number</label>
              </div>

             <div class="input-field col s12">
                <input placeholder="Placeholder" value=" <?php echo $result['pr_number']?>" name="pr_number" id="PR_Number" type="hidden" class="validate">
                

                <input " id="pr_number_orig" name="pr_number_orig" type="text" value="<?php echo $pr_number_orig[0]?>" disabled="true" required="true">
                <label for="pr_number_orig">PR Number</label>
              </div>

              <div class="input-field col s12">
                <input name="po_date" id="po_date" type="date" value="<?php echo $result['po_date']?>" class="datepicker" required="true">
                <label for="po_date">PO Date</label>
              </div>
              <div class="search-box input-field col s12">
                <label for="Supplier">Supplier</label>
                <input name="supplier_pk" id="supplier_pk" value="<?php echo $result['supplier_pk']?>" type="hidden">
                <input type="text" id="Supplier" value="<?php echo $result['supplier_name']?>" autocomplete="off"  required="true"/>
                <div class="result"></div>
              </div>
             <div class="input-field col s12">
                <input  name="po_mode_of_procurement" value="<?php echo $result['po_mode_of_procurement']?>" id="Mode_Of_Procurement" type="text" class="validate" required="true">
                <label for="Mode_Of_Procurement">Mode of Procurement</label>
              </div>
              <div class="input-field col s12">
                <input  name="po_place_of_delivery" value="<?php echo $result['po_place_of_delivery']?>" id="Place_Of_Delivery" type="text" class="validate" >
                <label for="Place_Of_Delivery">Place of Delivery</label>
              </div>
              <div class="input-field col s12">
                <input name="delivery_date" value="<?php echo $result['delivery_date']?>" id="Date_Of_Delivery" type="date" class="datepicker" required="true">
                <input type="hidden" name="">
                <label for="Date_Of_Delivery">Date of Delivery</label>
              </div>
              <div class="input-field col s12"> 
                <input name="po_delivery_term" value="<?php echo $result['po_delivery_term']?>" id="Delivery_Term" type="text" class="validate" required="true">
                <label for="Delivery_Term">Delivery Term</label>
              </div>
              <div class="input-field col s12">
                <input  name="po_payment_term" value="<?php echo $result['po_payment_term']?>" id="Payment_Term" type="text" class="validate" required="true">
                <label for="Payment_Term">Payment Term</label>
              </div>
              <div class="input-field col s12">
                <input type="hidden" name="for_payment_tmp" value="<?php echo $result['for_payment']?>">
                  <select name="for_payment">
                    <?php
                      if($result['for_payment'] == 1){
                        echo '<option value="1" selected="true">YES</option><option value="2" >NO</option>';
                      }else{
                        echo '<option value="1" >YES</option><option value="2" selected="true">NO</option>';
                      }
                    ?>
                  </select>
                  <label>For Payment</label>
              </div>
                <div class="input-field col s12">
                  <input value="<?php echo $result['po_d_tracks']?>"  name="po_d_tracks" id="Payment_Term" type="text" class="validate">
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
          <th>Item Description</th>
          <th>Unit of Measure</th>
          <th>Estimated Unit Cost</th>
          <th>Quantity</th>
          <th>Estimated Cost</th>
        </tr>
        </thead>

        <tbody>
        <?php 
          $sql = ' select * from items i left outer join purchase_request_items pi ON i.item_code = pi.item_code WHERE pi.pr_number = ' . $result['pr_number'] . ';';
            $pr_items = mysqli_query($conn, $sql);

             $total = 0;

            while(($row = mysqli_fetch_assoc($pr_items)) != null){
              echo '<tr>'.
                    '<td>' . $row['item_description'] . '</td>' . 
                    '<td>' . $row['item_unit_measure'] . '</td>' . 
                    '<td>Php ' . $row['pr_item_euc'] . '</td>' .
                    '<td>' . $row['quantity'] . '</td>' .
                    '<td>Php ' . $row['quantity'] * $row['pr_item_euc'] . '</td>' .
                    '</tr>';
                     
              $total += $row['quantity'] * $row['item_euc'];
            }
        ?>
         
         
          <tr>
          <td class="tg-yw4l" colspan="4"><b>Total Estimated Cost</b></td>
          <td class="tg-yw4l" colspan="2"><b><?php echo 'Php ' . $total;?></b></td>
          </tr>
        </tbody>
      </table>
      <div class="col s10 offset-s2">
        <button type="submit" form="updatePOForm" class="waves-effect waves-light btn">SAVE PO</button>
        <button type="submit" form="deletePOForm" id="deletePOSubmit"  class="waves-effect waves-light btn">DELETE PO</button>
        <a href="pendingPR.php" class="waves-effect waves-light btn">Cancel</a>
      </div>
    </div>
  </div>
</div>

<form action="pendingPR.php" method="POST" name="deletePOForm" id="deletePOForm">
  <input type="hidden" name="pr_po_status_id_po" value="<?php echo $pr_po_status_id?>">
  <input type="hidden" name="pr_number" value="<?php echo $result['pr_number']?>">
  <input type="hidden" name="po_number" value="<?php echo $result['po_number']?>">
</form>

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script type="text/javascript">
 
  $(document).ready(function(){
    $('#deletePOSubmit').click(function(event){
      event.preventDefault();
        swal({
        title: "Are you sure?",
        text: "You will not be able to recover this PUCHASE ORDER!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){
        document.getElementById('deletePOForm').submit();
      });
    });
  });

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
 $(document).ready(function() {
    $('select').material_select();
  });
  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
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
          success: function( strMessage ){
            document.getElementById('supplier_pk').value = strMessage;
            supplier_pk = strMessage;
          }
        });
    });
  });

  function updatePO(){
    if(supplier_pk != null && supplier_name == document.getElementById('Supplier').value){
      $.ajax({
        url: "modules/updatePO.php",
        method: "POST",
        data: $('form').serialize(),
        datatype: "text",
        success: function(strMessage){
            //document.getElementById('query').innerHTML = strMessage;
            Materialize.toast('Changes Saved.', 3000, 'rounded');
        }
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