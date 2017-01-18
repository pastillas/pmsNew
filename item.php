<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Offices</title>

  <!-- CSS  -->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/items.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/datatable.css">

  <?php
    require("connection.php");
    if(isset($_POST['addItemSubmit'])){
      $item_code = strtoupper($_POST['itemCode']);
      $item_description = ucfirst($_POST['itemDescription']);
      $item_unit_measure = $_POST['itemUnitMeasure'];
      $item_expenditure = ucfirst($_POST['itemExpenditure']);
      $item_euc = $_POST['itemEuc'];
      
      $sql = "INSERT INTO items values('$item_code', '$item_description', '$item_unit_measure', '$item_expenditure', $item_euc);";
      if(!mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>"  ;
      }
    }
      
    if(isset($_POST['updateItemSubmit'])){
      $item_code = strtoupper($_POST['itemCode']);
      $item_description = ucfirst($_POST['itemDescription']);
      $item_unit_measure = $_POST['itemUnitMeasure'];
      $item_expenditure = ucfirst($_POST['itemExpenditure']);
      $item_euc = $_POST['itemEuc'];
      
      $sql = "UPDATE items set item_description = '$item_description', item_unit_measure = '$item_unit_measure', item_expenditure = '$item_expenditure', item_euc = $item_euc WHERE item_code = '$item_code';";
      if(!mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('ERROR Saving Record.')</script>"  ;
      }
    }
  ?>

</head>
<body>
<!--Navs-->
<!-- ADD SUPPLIER MODAL-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>ADD ITEM</h4>
    <div class="row">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="addItemForm">
        
        <input type="text" id="itemCode" name="itemCode" placeholder="Item Code" required>
        <label for="#itemCode">Item Code</label>
        <input type="text" id="itemDescription" name="itemDescription" placeholder="Description" required>
        <label for="#itemDescription">Description</label>
        <input type="text" id="itemUnitMeasure" name="itemUnitMeasure" placeholder="Unit Measure" required>
        <label for="#itemUnitMeasure">Unit Measure</label>
        <input type="text" id="itemExpenditure" name="itemExpenditure" placeholder="Item Expenditure" required>
        <label for="#itemExpenditure">Item Expenditure</label>
        <input type="number" step=any id="itemEuc" name="itemEuc" placeholder="Estimated Unit Cost" required>
        <label for="#itemEuc">Estimated Unit Cost</label>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" form="addItemForm" name="addItemSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div class="row">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">ITEMS</span>
        <div class="actions">
          <a href="#modal1" class="waves-effect waves-light btn-flat nopadding"><i class="material-icons">library_add</i></a>
          <a href="#" class="search-toggle waves-effect waves-light btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th>Item Code</th>
            <th>Description</th>
            <th>Unit Measure</th>
            <th>Item Expenditure</th>
            <th>Estimated Unit Cost</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = 'SELECT * FROM items';
            $items =  mysqli_query($conn, $sql);

            while(($row = mysqli_fetch_assoc($items)) != null){
              echo '<tr>' . 
                '<td>' . $row['item_code'] . '</td>' .
                '<td>' . $row['item_description'] . '</td>' .
                '<td>' . $row['item_unit_measure'] . '</td>' .
                '<td>' . $row['item_expenditure'] . '</td>' .
                '<td>' . $row['item_euc'] . '</td>' .
                '</tr>';
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
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
</body>
</html>
