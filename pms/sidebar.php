<?php
  $user = $_SESSION['name'];
  $query = "SELECT user.first_name, user.last_name, user.position, profpic.image FROM user INNER JOIN profpic ON user.username = profpic.username WHERE user.username = '".$user."' ";
  $result = $db->query($query);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){


?>


<link href="css/sidenav.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></a</li>
  <!--<li class="divider"></li>-->
  <li><a href="indexBlob.php">Log Out</a></li>
</ul>

<ul id="slide-out" class="side-nav fixed">
  <li><div class="userView">
    <div class="background">
      <img src="office.png">
    </div>

    <a href="#!user"><img class="circle" src="uploads/<?php echo $row['image']; ?>"></a>
    <!-- <a href="#!user"><img class="circle" src="yuna.png"></a> -->
    <a href="#!name"><span class="white-text name"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></span></a>
    <a href="#!email"><span class="white-text email"><?php echo $row['position'] ?></span></a>
<?php
    }
  }
?>
  </div></li>
  <li><a href="home.php">Home</a></li>
  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header active">Procurement Status</a>
        <div class="collapsible-body">
          <ul>
            <li><a href="pendingPR.php">Pending PRs</a></li>
            <li><a href="forwardedPR.php">For Payment POs</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li><a href="item.php">Items</a></li>
  <li><a href="offices.php">Offices</a></li>
  <li><a href="#!">Reports</a></li>
  <li><a href="suppliers.php">Suppliers</a></li>
  </ul>
