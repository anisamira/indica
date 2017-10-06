

<!DOCTYPE html>
<html>
<title>User A Webmaster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<?php
	echo include ('sidebar.php');
?>
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <button class="w3-button w3-right" onclick=""><i class="fa fa-bell-o"></i></button>
  <button class="w3-button w3-right" onclick=""><i class="fa fa-envelope-o"></i></button>
  <span class="w3-bar-item w3-left">INDICA UM</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>User A</strong></span><br>
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
    <!--<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>-->
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
	 <!--<a href="logintrail.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Log Trail</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Your Module</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4><a href="main.php" >Academic</a></h4>
        </div>
    </div>
    </div>

  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Available Modules</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Student Life</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Excellent Research</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Internalization and Branding</h4>
      </div>
    </div>
    </div>

     <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Infrastructure Planning and Development</h4>
      </div>
    </div>
     <div class="w3-quarter">
      <div class="w3-container w3-brown w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Financial Sustainability and Wealth Creation</h4>
      </div>
    </div>
     <div class="w3-quarter">
      <div class="w3-container w3-purple w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right"><h3></h3></div>
        <div class="w3-clear"></div>
        <h4>Faculty and Staff Recruitment and Development</h4>
      </div>
    </div>
  </div>


  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

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
