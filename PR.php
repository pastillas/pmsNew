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
  <title>PR</title>

 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/createPO.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  <?php 
    
  require("connection.php");
    if(!isset($_POST['pr_po_status_id']))
      header('Location: pendingPR.php' );

    $pr_po_status_id = $_POST['pr_po_status_id'];
    $sql = 'SELECT * FROM pr_po_status ps, purchase_request pr, offices o WHERE ps.pr_po_status_id = ' . $pr_po_status_id . ' AND  ps.pr_number = pr.pr_number AND pr.office_code = o.office_code ;';
    
    $query  = mysqli_query($conn, $sql);
    $pr_po_status = mysqli_fetch_assoc($query);
    //echo $sql;

    $purhcase_order = array('po_number' => 'N/A', 'po_date' => 'N/A');
    if($pr_po_status['po_number'] != null){
      $sql = 'SELECT po_number, po_number_orig,  po_date FROM purchase_order WHERE po_number = ' . $pr_po_status['po_number'] . ';';

      $query  = mysqli_query($conn, $sql);
      $purhcase_order = mysqli_fetch_assoc($query);
    }
    require("navbar.php");
  ?>

</head>
<script type="text/javascript">
  var selectedItems = [];
</script>
<body>
  <!--Navs-->
 
<h4 class="center-align" style="margin-top: 72px">VIEW/EDIT PURCHASE REQUEST</h4>
  <div class="container">
    <div class="row">
      <div class="col s5">
        <div class="card-panel">
          <div class="row">
            <form class="col s12" action="" method="POST" onsubmit="return validatePR()" id="createPRForm">
              <div class="row">
                <div class="input-field col s12">
                  <input name="pr_number" value="<?php echo  $pr_po_status['pr_number']; ?>" id="PR_Number" type="hidden" class="validate">

                  <input " id="pr_number_orig" name="pr_number_orig" type="text" value="<?php echo $pr_po_status['pr_number_orig']?>" required="true">
                  <label for="pr_number_orig">PR Number</label>
                </div>

                <div class="input-field col s12">
                  <input " id="Date_PR" type="date" value="<?php echo $pr_po_status['pr_date']?>" class="datepicker">
                  <label for="Date_PR">PR Date</label>
                </div>


                <div class="input-field col s12">
                  <input id="PO_Number" value="<?php echo $purhcase_order['po_number'];?>" name="po_number" type="hidden" class="validate">

                   <?php 
                    if($purhcase_order['po_date'] == 'N/A'){
                       echo '<input " id="po_number_orig" name="po_number_orig" type="text" value="N/A" required="true" disabled="true">';
                      echo '<label for="po_number_orig">PO Number</label>';
                    }else{
                      echo '<input " id="po_number_orig" name="po_number_orig" type="text" value="' . $purhcase_order['po_number_orig'] . '" required="true" disabled="true">';
                      echo '<label for="po_number_orig">PO Number</label>';
                    }
                  ?>
                </div>
                <div class="input-field col s12">
                  <?php 
                    if($purhcase_order['po_date'] == 'N/A')
                      echo '<input id="Date_PO" disabled="true"  value="N/A" disabled="true" type="date" class="datepicker">';
                    else 
                      echo '<input id="Date_PO" disabled="true"  value="' . $purhcase_order['po_date'] . '" type="date" class="datepicker">';
                  ?>
                  <label for="Date_PO">PO Date</label>
                </div>
                 <div class="input-field col s12">
              <input  name="pr_department" id="Department" value="<?php echo $pr_po_status['pr_department']?>" type="text" class="validate" required="true">
              <label for="Department">Department</label>
            </div>
                <div class="input-field col s12">
                  <input  name="pr_dev_section" value="<?php echo $pr_po_status['pr_dev_section']?>" id="Division_Section" type="text" class="validate" required="true">
                  <label for="Division_Section">Division/Section</label>
                </div>
               <div class="input-field col s12">
                  <input name="pr_purpose" value="<?php echo $pr_po_status['pr_purpose']?>" id="Purpose" type="text" class="validate" required="true">
                  <label for="Purpose">Purpose</label>
                </div>

                <div class="input-field col s12">
                  <select id="Requestor" name="office_code">
                    <?php 
                      $sql = 'SELECT * FROM offices order by office_head;';
                      $result = mysqli_query($conn, $sql);

                      while(($row = mysqli_fetch_assoc($result)) != null){
                        if($row['office_code'] == $pr_po_status['office_code'])
                          echo '<option value="' . $row['office_code'] . '" selected>' . $row['office_head'] . '</option>';
                        else
                          echo '<option value="' . $row['office_code'] . '" >' . $row['office_head'] . '</option>';
                      }
                    ?>
                  </select>
                  <label for="Requestor">Requesting Officer</label>
                </div>
                <div class="input-field col s6">
                  <input name="pr_sai_number" value="<?php echo $pr_po_status['pr_sai_number']?>" id="SAI_Number" type="number" class="validate">
                  <label for="SAI_Number">SAI Number</label>
                </div>
                <div class="input-field col s6">
                  <input name="pr_sai_date" value="<?php echo $pr_po_status['pr_sai_date']?>" id="Date_SAI" type="date" class="datepicker">
                  <label for="Date_SAI">SAI Date</label>
                </div>
                <div class="input-field col s6">
                  <input name="pr_obr_number" value="<?php echo $pr_po_status['pr_obr_number']?>" id="OBR_Number" type="number" class="validate">
                  <label for="OBR_Number">OBR Number</label>
                </div>
                <div class="input-field col s6">
                  <input  name="pr_obr_date" value="<?php echo $pr_po_status['pr_obr_date']?>" id="Date_OBR" type="date" class="datepicker">
                  <label for="Date_OBR">OBR Date</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

     
  <div class="col s7">
    <table>
      <tr>
        <td><h5 style="float: right;">PR ITEMS</h5></td>
        <td><button onclick="openModal()" style="text-align: right;" class="btn waves-effect waves-light teal" id="addCPR"><i class="material-icons">add</i></button> </td>
      </tr>
    </table>

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

      <tbody id="tbodyitems">
        <?php 
            $sql = ' select * from items i left outer join purchase_request_items pi ON i.item_code = pi.item_code WHERE pi.pr_number = ' . $pr_po_status['pr_number'] . ';';

            //echo '<tr><td colspan="4">' . $sql . '</td></tr>';
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
               echo '<script type="text/javascript">selectedItems.push(\'' . $row['item_code'] . '\')</script>';
                     
              $total += $row['quantity'] * $row['item_euc'];
            }

        ?>

        <tr>
          <td class="tg-yw4l" colspan="4"><b>Total Estimated Cost</b></td>
          <td class="tg-yw4l" colspan="2"><b><?php echo 'Php ' . $total;?></b></td>
        </tr>
      </tbody>
    </table>
        <div class="col s12 ">
          <button type="submit" form="createPRForm" id="createPRSubmit" name="createPRSubmit" class="waves-effect waves-light btn">SAVE</button>
          <button type="submit" form="deletePRForm" id="deletePRSubmit" name="deletePRSubmit" class="waves-effect waves-light btn">DELETE PR</button>
          <a href="pendingPR.php" class="waves-effect waves-light btn">Cancel</a>

          <?php 
            $has_po = false;
            if($pr_po_status['po_number'] == null) {
              echo '<button type="submit" form="createPOForm" id="createPOSubmit" name="createPOSubmit" class="waves-effect waves-light btn">CREATE PO</button>';

            }
            else 
              echo '<button type="submit" form="viewPOForm" id="viewPOSubmit" name="viewPOSubmit" class="waves-effect waves-light btn">VIEW PO</button>';
          ?>
          
        </div>
      </div>
    </div>
  </div>

<form action="pendingPR.php" method="POST" name="deletePRForm" id="deletePRForm">
  <input type="hidden" name="pr_po_status_id_pr" value="<?php echo $pr_po_status_id?>">
  <input type="hidden" name="pr_number" value="<?php echo $pr_po_status['pr_number']?>">
  <input type="hidden" name="po_number" value="<?php echo $pr_po_status['po_number']?>">
</form>

<form action="createPO.php" method="POST" name="createPOForm" id="createPOForm">
  <input type="hidden" name="pr_po_status_id" value="<?php echo $pr_po_status_id?>">
  <input type="hidden" name="pr_number" value="<?php echo $pr_po_status['pr_number']?>">
</form>
<form action="PO.php" method="POST" name="viewPOForm" id="viewPOForm">
  <input type="hidden" name="pr_po_status_id" value="<?php echo $pr_po_status_id?>">
</form>

<p id="p"></p>
<div id="modal1" class="modal modal-fixed-footer" style="width: 80%" >
  <div class="modal-content">

    <div class="row">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">SELECT PR ITEMS</span>
            <div class="actions">
              <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
          </div>

          <form method="POST" id="addItemForm" onsubmit="return addPRItems()">
            <table id="datatable">

              <thead>
                <tr>
                  <th>Select Items</th>
                  <th>Description</th>
                  <th>Unit Measure</th>
                  <th>Estimated Unit Cost</th>
                  <th>Quantity</th>
                </tr>
              </thead>

              <tbody id="tbody">
                <?php
                  $sql = 'SELECT * FROM items';
                  $items =  mysqli_query($conn, $sql);


                  $sql = 'SELECT * FROM purchase_request pr, purchase_request_items pi, items i WHERE pr.pr_number = ' . $pr_po_status['pr_number'] . ' AND pr.pr_number = pi.pr_number AND pi.item_code = i.item_code;';
                  $pr_items = mysqli_query($conn, $sql);

                  while(($row = mysqli_fetch_assoc($items)) != null){
                   $sql = 'SELECT * FROM purchase_request pr, purchase_request_items pi, items i WHERE pr.pr_number = ' . $pr_po_status['pr_number'] . ' AND pr.pr_number = pi.pr_number AND pi.item_code = i.item_code AND i.item_code = "' . $row['item_code'] . '";';
                    $pr_item = mysqli_query($conn, $sql);

                    $row_count = mysqli_num_rows($pr_item);

                    if($row_count < 1){

                      echo '<tr>' .
                        '<td><input type="checkbox" onclick="addSellectedItems('  . "'" . $row['item_code'] .  "'" . ')" id="' . $row['item_code'] . '" /> <label for="' . $row['item_code'] . '">'. $row['item_code'] . '</label></td> '.
                        '<td id="idc' . $row['item_code'] . '">' . $row['item_description'] . '</td>' .
                        '<td id="iu' . $row['item_code'] . '">' . $row['item_unit_measure'] . '</td>' .
                        '<td ><input type="number" step=any class="active" required placeholder="E.U.C" name="euc" id="euc' . $row['item_code'] . '" value=' . $row['item_euc'] . ' disabled></td>' .
                        '<td ><input type="number" class="active" required placeholder="Quantity" name="quantity" id="quantity' . $row['item_code'] .   '" disabled></td>'.
                        '</tr>';
                    }else{
                      $result = mysqli_fetch_assoc($pr_item);
                      echo '<tr>' .
                          '<td><input type="checkbox" checked onclick="addSellectedItems('  . "'" . $result['item_code'] .  "'" . ')" id="' . $result['item_code'] . '" /> <label for="' . 
                          $result['item_code'] . '">'. $result['item_code'] . '</label></td> '.
                          '<td id="idc' . $result['item_code'] . '">' . $result['item_description'] . '</td>' .
                          '<td id="iu' . $result['item_code'] . '">' . $result['item_unit_measure'] . '</td>' .
                          '<td ><input type="number" step=any class="active" required placeholder="E.U.C" name="euc" id="euc' . $result['item_code'] . '" value=' . $result['pr_item_euc'] . '></td>' .
                          '<td ><input type="number" class="active" required placeholder="Quantity" name="quantity" id="quantity' . $result['item_code'] .   '" value=' . $result['quantity'] . '></td>'.
                          '</tr>';
                    }
                    
                  }
                ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" form="addItemForm" id="addItemSubmit" name="addItemSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
    <p id="bugtak"></p>
  </div>


  <form action="PR.php" method="POST" id="prForm">
    <input type="hidden" name="pr_po_status_id" value="<?php echo $pr_po_status_id?>">
  </form>

  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
  <script src="js/datatable.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script type="text/javascript">
  function confirmDeletePR(){
    var confirmVal = confirm("Do you want to DELETE this PURCHASE REQUEST?");
    return confirmVal;
  }

  $(document).ready(function(){
    $('#deletePRSubmit').click(function(event){
      event.preventDefault();
        swal({
        title: "Are you sure?",
        text: "You will not be able to recover this PUCHASE REQUEST!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){
        document.getElementById('deletePRForm').submit();
      });
    });
  });

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
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

  function openModal(){
    $("#modal1").openModal();
  }

  function addSellectedItems( item_code ){
    var checkBox = document.getElementById(item_code);
    if(checkBox.checked){
      selectedItems.push(item_code);
      document.getElementById("quantity" + item_code).disabled = false;
      document.getElementById("quantity" + item_code).focus();
      document.getElementById("euc" + item_code).disabled = false;
    }
    else{
      removeFromSelectedItems( item_code );
      document.getElementById("quantity" + item_code).disabled = true;
      document.getElementById("euc" + item_code).disabled = true;
    }
  }

  function removeFromSelectedItems( item_code ){
    for(i = 0; i < selectedItems.length; i++){
      if(selectedItems[i] == item_code){
        selectedItems.splice(i, 1);
        break;
      }
    }
  }

  function addPRItems(){
    var string = "";
    var total = 0;
          for(i = 0; i < selectedItems.length; i++){
            total += (document.getElementById("quantity" + selectedItems[i]).value * document.getElementById("euc" + selectedItems[i]).value);
            string += "<tr onclick='openModal()'><td>" + document.getElementById("idc" + selectedItems[i]).innerHTML + "</td>" + 
                "<td>" + document.getElementById("iu" + selectedItems[i]).innerHTML + "</td>" +
                "<td>Php " + document.getElementById("euc" + selectedItems[i]).value + "</td>" + 
                "<td>" + document.getElementById("quantity" + selectedItems[i]).value + "</td>" +  
                "<td>Php " + (document.getElementById("quantity" + selectedItems[i]).value * document.getElementById("euc" + selectedItems[i]).value) + "</td></tr>"; 
          }
          string += '<tr><td class="tg-yw4l" colspan="4"><b>Total Estimated Cost</b></td><td class="tg-yw4l" colspan="2"><b>Php ' +  total + '</b></td></tr>'
          document.getElementById("tbodyitems").innerHTML = string;

          $("#modal1").closeModal();

    return false;
  }



  function validatePR(){


    if(! $('#Requestor').val()){
      Materialize.toast('Please add the Requesting Officer. Thank you!', 3000, 'rounded');
      return false;
    }

    if(selectedItems.length < 1){
      Materialize.toast('Please add PR Items. Thank you!', 3000, 'rounded');
      return false;
    }else{
        $.ajax({
            url: "modules/updatePR.php",
            method: "post",
            data: $('form').serialize(),
            datatype: "text",
            success: function(strMessage){
              
              var pr_number = document.getElementById('PR_Number').value;
              document.getElementById('bugtak').innerHTML = strMessage;

              if(strMessage == "ERROR")
                Materialize.toast('ERROR saving record', 3000, 'rounded');
              else{
                $.ajax({
                  type: "POST",
                  url: "modules/deletePRItems.php",
                  data: "pr_number=" + pr_number,
                  success: function(strMessage){
                    if(strMessage == "ERROR")
                      Materialize.toast('ERROR saving record', 3000, 'rounded');
                    else{
                      for(i = 0; i < selectedItems.length; i++){
                          var pr_number = document.getElementById('PR_Number').value;
                          var pr_item_euc = document.getElementById("euc" + selectedItems[i]).value;
                          var quantity = document.getElementById("quantity" + selectedItems[i]).value;

                          $.ajax({
                            type: "POST",
                            url: "modules/insertPRItems.php",
                            data: 'pr_number=' + pr_number + '&item_code=' + selectedItems[i] + '&pr_item_euc=' + pr_item_euc + '&quantity=' + quantity,
                            success: function(strMessage){
                              //window.location = "http://localhost/pmsNew/pendingPR.php";
                              
                            }
                          });
                        }
                        Materialize.toast('Changes Saved.', 3000, 'rounded');
                    }
                  }
                });
              } 
            },
            error: function(){
              console.log('Ajax request NOT received!');
            }
          });
    }

    return false;
 }

  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
        
  </script>
</body>
</html>
<?php } ?>