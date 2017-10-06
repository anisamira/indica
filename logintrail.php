<?php
include ('connection.php');
?>

<!DOCTYPE html>
<html>
<title>Admin Webmaster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
   #myTable {
        border-collapse: collapse;
        width: 80%;
        border: 1px solid #ddd;
        font-size: 14px;
        margin-bottom: 0px;
    }
    
    #myTable th,
    #myTable td {
        text-align: left;
        padding: 14px;
    }
    
    #myTable tr {
        border-bottom: 1px solid goldenrod;
        background-color: #ddd;
        color: black;
    }
    
    #myTable tr.header,
    #myTable tr:hover {
        background-color: #f1f1f1;
        cursor: default;
    }

    #myTable.fixed { table-layout:fixed; }
#myTable.fixed td { overflow: hidden; }

</style>
<body class="w3-light-grey">

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
      <span>Welcome, <strong>Admin</strong></span><br>
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
    <a href="admin.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="logintrail.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  Log Trail</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  logout</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>-->
    <a href="archive.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Archive</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Modules</b></h5>
  </header>

<?php 
       $result = mysql_query("SELECT * FROM trail ");
      ?>
      <table id='myTable' style= " margin: 0 auto;" >
      <thead>
        <tr>
          <th>Username</th>
          <th>Login Time</th>
          <th>Logout Time</th>
        </tr>
      </thead>
      <tbody>

        <?php

          while($row = mysql_fetch_assoc( $result ) ){

    $username=$row['username'];
    $login_time=$row['login_time'];
    $logout_time=$row['logout_time'];

            echo  " <table id='myTable' style='margin: 0 auto' class='fixed'>
            <tr>
                <td>$username</td>
                <td>$login_time</td>
                <td>$logout_time</td>
            </tr>
            </table> ";}
        ?>

      </tbody>
    </table>

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