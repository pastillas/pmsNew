<nav>
  <div class="nav-wrapper teal">
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
    <a href="home.php" class="brand-logo white-text">Procurement Office Monitoring System</a>
    <a class="dropdown-button" href="#!" data-activates="dropdown1" id="sett"><img src="img/icons/ic_settings_white_24px.svg"></a>
  </div>

</nav>
<?php
   require("conn.php");
   
  $user = $_SESSION['name'];
  $query = "SELECT user.first_name, user.last_name, user.position, profpic.image FROM user INNER JOIN profpic ON user.username = profpic.username WHERE user.username = '".$user."' ";
  $result = $db->query($query);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></a</li>
  <!--<li class="divider"></li>-->
  <li><a href="logout.php">Log Out</a></li>
</ul>

  <?php 
  } 

}
  ?>

<script type="text/javascript">
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
        
</script>
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