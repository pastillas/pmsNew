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
  <style type="text/css">
  .side-nav li {
    padding: 0 !important;
  }
  </style>
  <?php
    require("navbar.php");
    require("sidebar.php");
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
      
    if(isset($_POST['editItemSubmit'])){
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

<div id="editModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>EDIT ITEM</h4>
    <div class="row">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="editItemForm">
        
        <p id="itemCodeP"></p>
       
        <input type="text" id="itemDescription" name="itemDescription" placeholder="Description" required>
        <label for="#itemDescription">Description</label>
        <input type="text" id="itemUnitMeasure" name="itemUnitMeasure" placeholder="Unit Measure" required>
        <label for="#itemUnitMeasure">Unit Measure</label>
        <input type="text" id="itemExpenditure" name="itemExpenditure" placeholder="Item Expenditure" required>
        <label for="#itemExpenditure">Item Expenditure</label>
        <input type="number" step=any id="itemEuc" name="itemEuc" placeholder="Estimated Unit Cost" required>
        <label for="#itemEuc">Estimated Unit Cost</label>
        <input type="hidden" id="itemCode" name="itemCode" placeholder="Item Code" required>
        
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" form="editItemForm" name="editItemSubmit" class="waves-effect waves-light btn-flat">Save Changes</button>
  </div>
</div>

<div class="row">
  <div id="admin" style="margin: 102px 30px 30px 330px; width: 79%;">
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
              echo '<tr onclick="editItem(\'' . $row['item_code'] . '\')">' .
                '<td id="ic' . $row['item_code'] . '">' . $row['item_code'] . '</td>' .
                '<td id="idc' . $row['item_code'] . '">' . $row['item_description'] . '</td>' .
                '<td id="iu' . $row['item_code'] . '">' . $row['item_unit_measure'] . '</td>' .
                '<td id="ie' . $row['item_code'] . '">' . $row['item_expenditure'] . '</td>' .
                '<td id="euc' . $row['item_code'] . '">' . $row['item_euc'] . '</td>' .
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

  function editItem( item_code ){
    var item_description = document.getElementById("idc" + item_code).innerHTML;
    var item_unit_measure = document.getElementById("iu" + item_code).innerHTML;
    var item_expenditure = document.getElementById("ie" + item_code).innerHTML;
    var item_euc = document.getElementById("euc" + item_code).innerHTML;
    var editItemForm = document.getElementById("editItemForm");
    editItemForm.itemCode.value = item_code;
    editItemForm.itemDescription.value = item_description;
    editItemForm.itemUnitMeasure.value = item_unit_measure;
    editItemForm.itemExpenditure.value = item_expenditure;
    editItemForm.itemEuc.value = item_euc;
    document.getElementById("itemCodeP").innerHTML = "Item Code: " + item_code;
    $("#editModal").openModal();
  }
</script>
</body>
</html>
