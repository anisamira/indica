<?php
include ('connection.php');
?>

<!DOCTYPE html>
<html>
<title>INDICA UM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif};
</style>
<body>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <button class="w3-button w3-right" onclick=""><i class="fa fa-bell-o"></i></button>
  <button class="w3-button w3-right" onclick=""><i class="fa fa-envelope-o"></i></button>
  <span class="w3-bar-item w3-left">INDICA UM</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome,<strong><?php echo $_SESSION['username'];?></strong></span><br>

  
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  
  </div>
  <hr> 
  <div class="w3-container">
    <!--<h5>Dashboard</h5>-->
  </div>
  <div class="w3-bar-block">
    
    
    </br>
    <?php 
    if (($_SESSION['role_id']) == 'R01') {?>
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cogs fa-fw"></i>  Site Administration</a> -->
	<a href="main_admin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Home</a>
    <a href="admin_manageuser_viewuser.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-universal-access fa-fw"></i>  Manage Users</a>
    <a href="admin_create_session.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus-square fa-fw"></i>  Create Session</a>    
    <a href="logtrails.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>  Log Trails</a>
	<a href="workbench_view.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>Module Workbench</a>

    
    <?php } 
	
	 if (($_SESSION['role_id']) == 'R02') {?>
	<a href="main_dc.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Home</a>
	<!--<a href="request_edit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus-square fa-fw"></i>Request Edit</a> 
	<a href="datacontroller_updaterecord2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i> Achievement</a>-->
	<a href="work.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>Module Workbench</a>

	<?php
	 }
	 if (($_SESSION['role_id']) == 'R03') {?>
	<a href="main_dm.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Home</a>
<!--<a href="datamanager_review.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus-square fa-fw"></i>Approval</a> 
	<a href="datacontroller_updaterecord2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i> Achievement</a>-->
	<?php
	 }
	?>
    </br>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-power-off fa-fw"></i>  Log Out</a>
  </div>
</nav>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- End page content -->
  </div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
