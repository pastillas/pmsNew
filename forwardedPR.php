<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Forwarded PRs</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <style type="text/css">
  .side-nav li {
    padding: 0 !important;
  }
  </style>
</head>
<body>

<!--Navs-->
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
?>
  <div class="row">
  <div id="admin" style="margin: 102px 30px 30px 330px; width: 79%;">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">For Paymemt Purchase Orders</span>
        <div class="actions">
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

                $sql  = 'SELECT supplier_name WHERE supplier_pk = ' . $row['supplier_pk'] . ';';
                $result = mysqli_query($conn, $sql);
                $supplier_name = mysqli_fetch_array($result);
                echo '<td>' . $supplier_name[0] . '</td>';
                echo '<td>' . $row['delivery_date'] . '</td>';
              }

              $sql = ' select SUM(quantity * pr_item_euc) as \'total\' from purchase_request_items Where pr_number  = ' . $row['pr_number'] . ';';
              $result = mysqli_query($conn, $sql);
              $total = mysqli_fetch_array($result);

              echo '<td>' . $total['total'] . '</td>';

              if($row['status'] == null)
                echo '<td onclick=openStatusModal(' . $row['pr_po_status_id'] . ')>N/A</td>';
              else
                echo '<td onclick=openStatusModal(' . $row['pr_po_status_id'] . ')>' . $row['status'] . '</td>';
            echo '</tr>';
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

           

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>

  <script src="js/datatable.js"></script>
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
