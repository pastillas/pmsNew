<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Procurement Office Monitoring System</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/createPO.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <?php require("connection.php");?>
</head>
<body>


<h4 class="center-align">CREATE NEW PURCHASE REQUEST</h4>
<div class="container">
<div class="row">
  <div class="col s5">
    <div class="card-panel">
      <div class="row">
        <form class="col s12" action="" method="POST" onsubmit="return validatePR()" id="createPRForm">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="PR Number" id="PR_Number" name="pr_number" type="hidden" class="validate" required=true>
              <p id="PR_Number_P"></p>
            </div>
            <div class="input-field col s6">
              <input id="Date_PR" name="pr_date" type="date" class="datepicker"  required="true">
              <label for="Date">PR Date</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="Department" name="pr_department" id="Department" type="text" class="validate" required="true">
              <label for="Department">Department</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="Division/Section" name="pr_dev_section" id="Division_Section" type="text" class="validate" required="true">
              <label for="Division_Section">Division/Section</label>
            </div>
           <div class="input-field col s12">
              <input placeholder="Purpose" name="pr_purpose" id="Purpose" type="text" class="validate" required="true">
              <label for="Purpose">Purpose</label>
            </div>

            <div class="input-field col s12">
              <select id="Requestor" name="office_code">
                <option value="" disabled selected>Choose Officer</option>
                <?php 
                  $sql = 'SELECT * FROM offices order by office_head;';
                  $result = mysqli_query($conn, $sql);

                  while(($row = mysqli_fetch_assoc($result)) != null){
                    echo '<option value="' . $row['office_code'] . '">' . $row['office_head'] . '</option>';
                  }
                ?>
              </select>
              <label for="Requestor">Requesting Officer</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="SAI Number" name="pr_sai_number" id="SAI_Number" type="number" class="validate">
              <label for="SAI_Number">SAI Number</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="SAI Date" name="pr_sai_date" id="Date_SAI" type="date" class="datepicker">
              <label for="Date_SAI">SAI Date</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Placeholder" name="pr_obr_number" id="OBR_Number" type="number" class="validate">
              <label for="OBR_Number">OBR Number</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="OBR Date" name="pr_obr_date" id="Date_OBR" type="date" class="datepicker">
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
      <td><h5>PR ITEMS</h5></td>
      <td><button onclick="openModal()" class="btn waves-effect waves-light teal" id="addCPR"><i class="material-icons">add</i></button> </td>
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
        <tr>
          <td class="tg-yw4l" colspan="4">Total Estimated Cost</td>
          <td class="tg-yw4l" colspan="2">0.00</td>
        </tr>
      </tbody>
    </table>

    <div class="col s10 offset-s2">
      <a href="pendingPR.php" class="waves-effect waves-light btn">CANCEL</a>
      <a class="waves-effect waves-light btn">RESET</a>
      <button type="submit" form="createPRForm" id="createPRSubmit" name="createPRSubmit" class="waves-effect waves-light btn">CREATE PR</button>
    </div>
  </div>
  </div>
</div>
  
  <p id="p"></p>
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>SELECT PR ITEMS</h4>
    <div >
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

            while(($row = mysqli_fetch_assoc($items)) != null){
              echo '<tr>' .
                '<td><input type="checkbox" onclick="addSellectedItems('  . "'" . $row['item_code'] .  "'" . ')" id="' . $row['item_code'] . '" /> <label for="' . $row['item_code'] . '">'. $row['item_code'] . '</label></td> '.
                '<td id="idc' . $row['item_code'] . '">' . $row['item_description'] . '</td>' .
                '<td id="iu' . $row['item_code'] . '">' . $row['item_unit_measure'] . '</td>' .
                '<td ><input type="number" step=any class="active" required placeholder="E.U.C" name="euc" id="euc' . $row['item_code'] . '" value=' . $row['item_euc'] . ' disabled></td>' .
                '<td ><input type="number" class="active" required placeholder="Quantity" name="quantity" id="quantity' . $row['item_code'] .   '" disabled></td>'.
                '</tr>';
            }
          ?>
        </tbody>
      </table>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" form="addItemForm" id="addItemSubmit" name="addItemSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>

  <!-- Modal Trigger -->
 
</div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
  <script src="js/datatable.js"></script>
  <script src="js/moment.js"></script>
  
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

  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
   $(document).ready(function() {
    $('select').material_select();
  });

  var selectedItems = [];

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

  function openModal(){
    $("#modal1").openModal();
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

  $(document).ready(function(){
      document.getElementById('Date_PR').value = moment().format('DD MMMM, YYYY');

      $.ajax({
        url: "modules/getNextPRID.php",
        datatype: "html",
        success: function(result){
          document.getElementById("PR_Number").value=result;
          document.getElementById("PR_Number_P").innerHTML= "PR Number: <b>" + result + '</b>';
        }
      });
  });
 
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
            url: "modules/insertPR.php",
            method: "post",
            data: $('form').serialize(),
            datatype: "text",
            success: function(strMessage){
              
              document.getElementById("p").innerHTML = strMessage;

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
                      window.location = "http://localhost/pmsNew/pendingPR.php";
                    }
                  });
                }
              } 
            },
            error: function(){
              console.log('Ajax request NOT received!');
            }
          });
    }

    return false;
 }


  </script>
</body>
</html>
