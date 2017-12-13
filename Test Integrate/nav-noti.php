<?php
include ('connection.php');
$user_id=$_SESSION['user_id'];
$role_id=$_SESSION['role_id'];

  if($role_id=='R01'){
  $get_noti_qwr = "SELECT * FROM notif_user_r01 WHERE noti_status = 'u' AND user_id='$user_id'";
  $table= 'notif_user_r01';
  
  }
  else if ($role_id=='R02'){
    $get_noti_qwr = "SELECT * FROM notif_user_r02 WHERE noti_status = 'u' AND user_id='$user_id'";
  $table= 'notif_user_r02';
  
  }
  else if ($role_id=='R03'){
    $get_noti_qwr = "SELECT * FROM notif_user_r03 WHERE noti_status = 'u' AND user_id='$user_id'";
  $table= 'notif_user_r03';
  
  }
  else if ($role_id=='R04'){
    $get_noti_qwr = "SELECT * FROM notif_user_r04 WHERE noti_status = 'u' AND user_id='$user_id'";
  $table= 'notif_user_r04';
  
  }
  else if ($role_id=='R05'){
    $get_noti_qwr = "SELECT * FROM notif_user_r05 WHERE noti_status = 'u' AND user_id='$user_id'";
  $table= 'notif_user_r05';
  
  }
  // $count =0;
  $qry = mysql_query($get_noti_qwr);

  // if (mysql_num_rows($qry)>0){
    $count=mysql_num_rows($qry);
  // }

  
  

?>

<!DOCTYPE html>
<html>
<title>INDICA UM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	
	
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

        label {
        font-weight: normal !important;
    }

    .w3-theme-l5 {color:#000 !important; background-color:#e9f5ff !important}
    .w3-theme-l4 {color:#000 !important; background-color:#b5dffd !important}
    .w3-theme-l3 {color:#000 !important; background-color:#6bc0fc !important}
    .w3-theme-l2 {color:#fff !important; background-color:#21a0fa !important}
    .w3-theme-l1 {color:#fff !important; background-color:#0479cc !important}
    .w3-theme-d1 {color:#fff !important; background-color:#024575 !important}
    .w3-theme-d2 {color:#fff !important; background-color:#023e68 !important}
    .w3-theme-d3 {color:#fff !important; background-color:#02365b !important}
    .w3-theme-d4 {color:#fff !important; background-color:#022e4e !important}
    .w3-theme-d5 {color:#fff !important; background-color:#012641 !important}
    
    .w3-theme-light {color:#000 !important; background-color:#e9f5ff !important}
    .w3-theme-dark {color:#fff !important; background-color:#012641 !important}
    .w3-theme-action {color:#fff !important; background-color:#012641 !important}
    
    .w3-theme {color:#fff !important; background-color:#034f84 !important}
    .w3-text-theme {color:#034f84 !important}
    .w3-border-theme {border-color:#034f84 !important}
    
    .w3-hover-theme:hover {color:#fff !important; background-color:#034f84 !important}
    .w3-hover-text-theme {color:#034f84 !important}
    .w3-hover-border-theme:hover {border-color:#034f84 !important}

</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme-d2 w3-right-align w3-medium">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right" title="Log Out"><i class="fa fa-power-off"></i></a>

    <!-- R01 -->
    <?php if ($role_id=='R01'){?>
    <a href="main_admin.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 "><i class="fa fa-home w3-margin-right"></i>INDICA UM</a>    
    <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-button w3-padding-large" style="font-size: 13px;" title="Manage User">Manage Users</button>     
          <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="admin_manageuser_create_new_user.php" style="font-size: 13px;" class="w3-bar-item w3-button">Create New User</a>
            <a href="admin_manageuser_viewuser.php" style="font-size: 13px;" class="w3-bar-item w3-button">View All Users</a>
          </div>
    </div>

    <a href="admin_create_session.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Create Sessions">Create Sessions</a>
    <a href="admin_requestedit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Request Edit">Request Edit</a>
    
    <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-button w3-padding-large" style="font-size: 13px;" title="View Log">View Log</button>     
          <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="logtrails.php" style="font-size: 13px;" class="w3-bar-item w3-button">Log Trails</a>
            <a href="logtrails_noti.php" style="font-size: 13px;" class="w3-bar-item w3-button">User Trails</a>
          </div>
    </div>
    
    <a href="calculation1.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Calculation">KPI Calculation</a>
    <a href="workbench_dash.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Dashboard">Dashboard</a>
    <a href="workbench_view.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
    <a href="report_admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Reporting">Reporting</a>
    
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" >
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;">Manage Users</a>           
          <div class=" w3-padding-large w3-small" style="width:300px">
            <a href="admin_manageuser_create_new_user.php" style="font-size: 13px;" class="w3-bar-item w3-button">Create New User</a>
            <a href="admin_manageuser_viewuser.php" style="font-size: 13px;" class="w3-bar-item w3-button">View All Users</a>
          </div>
    <a href="admin_create_session.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Create Sessions">Create Sessions</a>
    <a href="admin_requestedit.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Request Edit">Request Edit</a>    
    <a href="logtrails.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Log Trails">Log Trails</a>
    <a href="logtrails_noti.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="User Trails">User Trails</a>    
    <a href="calculation1.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Calculation">KPI Calculation</a>
    <a href="workbench_dash.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Dashboard">Dashboard</a>
    <a href="workbench_view.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
    <a href="report_admin.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Reporting">Reporting</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Logout">Log Out</a>
    
  </div>

    <?php }

    // R02
    if ($role_id=='R02'){?>

    <a href="main_dc.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 "><i class="fa fa-home w3-margin-right"></i>INDICA UM</a>        
    <a href="work.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
    
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" >
      <a href="calculation1.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Module Workbench">Module Workbench</a> 
      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Logout">Log Out</a>
      
     </div>
    
    

    <?php } 

    // R03
    if ($role_id=='R03'){?>

    <a href="dm_home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 "><i class="fa fa-home w3-margin-right"></i>INDICA UM</a>        
    <a href="calculation1.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Calculation">KPI Calculation</a>
     <a href="main_dm.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Approval">Approval</a>
    
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" >
      <a href="calculation1.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Calculation">KPI Calculation</a>
	        <a href="main_dm.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Approval">Approval</a>
      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Logout">Log Out</a>
      
     </div>
    
    
    <?php } 

    // R04
    if ($role_id=='R04'){?>

      <a href="main_tnc.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 "><i class="fa fa-home w3-margin-right"></i>INDICA UM</a>        
      <a href="graph_kpi.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Dashboard">Dashboard</a>
      <a href="workbench_tnc.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
      <a href="report_tnc.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Reporting">Reporting</a>
    
      <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" >
    <a href="graph_kpi.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Dashboard">Dashboard</a>
    <a href="workbench_tnc.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
    <a href="report_tnc.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Reporting">Reporting</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Logout">Log Out</a>
    
    
    </div>
    
    <?php }

	
	//  <!-- R05 -->
    if ($role_id=='R05'){?>

      <a href="workbench_dash.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 "><i class="fa fa-home w3-margin-right"></i>INDICA UM</a>        
      <a href="workbench_view.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
      <a href="report_admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size: 13px;" title="Reporting">Reporting</a>
    
      <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" >
    <a href="workbench_view.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Module Workbench">Module Workbench</a>
    <a href="report_admin.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Reporting">Reporting</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" style="font-size: 13px;" title="Logout">Log Out</a>
    
    
    </div>
    
    <?php } ?>

    <a href="userprofile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right" style="font-size: 13px;" title="Profile">Profile</a>
    
      

<!-- NOTIFICATIONS BUTTON -->

    <div class="w3-dropdown-hover w3-right">
      <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i>
      <span class="w3-badge w3-right w3-small w3-green"><?php 

        if ($count>0)
        {
          echo $count;
        }
        else 
        {echo 0;}?> 

      </span>
      </button>     
      <div class="w3-dropdown-content w3-card-4 w3-bar-block " style="width:200px; right:0">
        
        <?php 
          while($row=mysql_fetch_array($qry))
          {
            $noti_list_id = $row['noti_list_id'];
            $noti_action = $row['noti_action'];
            $link = $row['link'];?>

            <form method="post" action="">
            <input style="font-size: 13px; vertical-align:bottom;overflow:visible; font-size:1em; display:inline;  background:#fff; margin:0; padding:0; border:0; cursor:pointer;" 
            class="w3-bar-item w3-button" name="Submit" type="submit" value="<?php echo $noti_action; ?>"></input>
            <input type="hidden" value="<?php echo $link;?>" name="link">
            <input type="hidden" value="<?php echo $noti_list_id;?>" name="list_id">            
            </form>

        <?php 
        if (isset($_POST['Submit'])){

          $link = $_POST['link'];
          $list_id = $_POST['list_id'];

          $update_query = " UPDATE $table
                            SET noti_status='s' 
                            where noti_status='u' 
                            AND noti_list_id='$list_id' ";
          mysql_query($update_query);

          echo "<script>window.open('$link','_self')</script>";  
          
        }
          
          
          }
          
          ?>    

      </div>
  </div>

</div></div>

<!-- End Page Container -->
</div>
<br>

<script>
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
  } else { 
      x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html> 