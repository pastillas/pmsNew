<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>For Payment POs</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <style type="text/css">
  .side-nav li, 
  .side-nav .collapsible-header,
  .side-nav.fixed .collapsible-header,
  .side-nav .collapsible-body li a,
  .side-nav.fixed .collapsible-body li a {
    padding: 0 !important;
  }
  </style>
  <?php 
  require("navbar.php");
  require("sidebar.php");
  require("connection.php");
    if(isset($_POST['statusFormSubmit'])){
      $status = $_POST['group1'];
      $pr_po_status_id = $_POST['pr_po_status_id'];

      $sql = 'UPDATE PR_PO_STATUS SET status = \'' . $status . '\' WHERE pr_po_status_id = ' . $pr_po_status_id . ';';
      if(mysqli_query($conn, $sql)){
        echo '<script type="text/javascript">Materialize.toast("SUCCESS. Thank you!", 3000, "rounded");</script>';
      }else
        echo '<script type="text/javascript">Materialize.toast("ERROR Saving Record.", 3000, "rounded");</script>';
    }

     $status= array("status1"=>"Juan de la Cruz", "status2"=>"Luisito Canyo", "status3"=>"Joy Miranda");
?>
</head>

<!--Navs-->

<body>
<div id="statusModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>SELECT STATUS</h4>
    <div class="row">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return saveStatus()" method="POST" id="statusForm">
      <input type="hidden" id="pr_po_status_id" name="pr_po_status_id" value="">
        <p>
          <input name="group1" id="status1" value="status1" type="radio"  />
          <label for="status1">Juan de la Cruz</label>
        </p>
        <p>
          <input name="group1" id="status2" value="status2"  type="radio"  />
          <label for="status2">Luisito Canyo</label>
        </p>
        <p>
          <input name="group1" id="status3" value="status3"  type="radio"/>
          <label for="status3">Joy Miranda</label>
        </p>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" form="statusForm" name="statusFormSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>
  
<div class="row">
  <div id="admin" style="margin: 102px 30px 30px 330px; width: 76.5%;">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">FOR PAYMENT POs</span>
        <div class="actions">
          <a href="createPR.php" class="waves-effect waves-light btn-flat nopadding"><i class="material-icons">library_add</i></a>
          <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th class="pr">PR No.</th>
            <th class="po">PO No.</th>
            <th>Requesting Office</th>
            <th>Supplier</th>
            <th>Delivery Date</th>
            <th>Total Estimated Cost</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = 'SELECT ps.pr_po_status_id as \'pr_po_status_id\', ps.pr_number as \'pr_number\', ps.po_number as \'po_number\', ps.for_payment as \'for_payment\', pr.office_code as \'office_code\', o.office_name as \'office_name\', ps.supplier_pk as \'supplier_pk\', ps.delivery_date as \'delivery_date\', ps.status as \'status\' FROM pr_po_status ps, purchase_request pr, offices o WHERE ps.pr_number = pr.pr_number AND ps.for_payment = 1 AND pr.office_code = o.office_code ;';

          $query = mysqli_query($conn, $sql);
          while(($row = mysqli_fetch_assoc($query)) != null){
            echo '<tr>';
              echo '<td class="pr" onclick=openPR(' . $row['pr_po_status_id'] . ')>' .  $row['pr_number'] . '</td>';

              if($row['po_number'] == null){
                echo '<td class="po" onclick=openPR(' . $row['pr_po_status_id'] . ')>N/A</td>';
                echo '<td>' . $row['office_name'] . '</td>';
                echo '<td>N/A</td>';
                echo '<td>N/A</td>';
              }
              else{
                echo '<td class="po" onclick=openPO(' . $row['pr_po_status_id'] . ')>' . $row['po_number'] . '</td>';
                echo '<td>' . $row['office_name'] . '</td>';

                $sql  = 'SELECT supplier_name FROM supplier WHERE supplier_pk = ' . $row['supplier_pk'] . ';';
                $result = mysqli_query($conn, $sql);
                $supplier_name = mysqli_fetch_array($result);
                echo '<td>' . $supplier_name[0] . '</td>';

                if($row['delivery_date'] != null)
                  echo '<td>' . $row['delivery_date'] . '</td>';
                else
                  echo '<td>N/A</td>';

              }

              $sql = ' select SUM(quantity * pr_item_euc) as \'total\' from purchase_request_items Where pr_number  = ' . $row['pr_number'] . ';';
              $result = mysqli_query($conn, $sql);
              $total = mysqli_fetch_array($result);

              echo '<td>Php ' . $total['total'] . '</td>';

              if($row['status'] == null)
                echo '<td onclick=openStatusModal(' . $row['pr_po_status_id'] . ')>N/A</td>';
              else
                echo '<td onclick=openStatusModal(' . $row['pr_po_status_id'] . ')>' . $status[$row['status']] . '</td>';
            echo '</tr>';
          }
        ?>
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
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>

  <script src="js/datatable.js"></script>

<script type="text/javascript">
  var pr_po_status_id = "";
  // Initialize collapse button
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
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
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
        
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

  
  function openStatusModal(id){
    document.getElementById('pr_po_status_id').value = id;
    pr_po_status_id = id;

    $.ajax({
      data: "pr_po_status_id=" + pr_po_status_id,
      type: "POST",
      url: "modules/getStatus.php",
      success: function(status){
        document.getElementById(status).checked = true;
      }
    });

    $("#statusModal").openModal();
  }

  function saveStatus(){
    var atLeastOneIsChecked = $('input:radio').is(':checked');
    if(!atLeastOneIsChecked)
        Materialize.toast('Please select status. Thank you!', 3000, 'rounded');
    return atLeastOneIsChecked;
  }

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
  </script>
</body>
</html>
