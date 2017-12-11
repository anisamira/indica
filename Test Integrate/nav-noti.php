<?php
include ('connection.php');
$user_id=$_SESSION['user_id'];
$role_id=$_SESSION['role_id'];

  if($role_id=='R01'){
  $get_noti_qwr = "select notif_user.*, notif_main_r01.* from notif_user JOIN notif_main_r01 ON notif_main_r01.noti_id=notif_user.noti_id where notif_user.noti_status = 'u' AND notif_user.user_id='$user_id'";
  }
  else if ($role_id=='R02'){
    $get_noti_qwr = "select notif_user.*, notif_main_r02.* from notif_user JOIN notif_main_r02 ON notif_main_r02.noti_id=notif_user.noti_id where notif_user.noti_status = 'u' AND notif_user.user_id='$user_id'";  
  }
  else if ($role_id=='R03'){
    $get_noti_qwr = "select notif_user.*, notif_main_r03.* from notif_user JOIN notif_main_r03 ON notif_main_r03.noti_id=notif_user.noti_id where notif_user.noti_status = 'u' AND notif_user.user_id='$user_id'";
  }
  else if ($role_id=='R04'){
    $get_noti_qwr = "select notif_user.*, notif_main_r04.* from notif_user JOIN notif_main_r04 ON notif_main_r04.noti_id=notif_user.noti_id where notif_user.noti_status = 'u' AND notif_user.user_id='$user_id'";
  }

  $count =0;
  $qry = mysql_query($get_noti_qwr);
  $count=mysql_num_rows($qry);

?>

<!DOCTYPE html>
<html>

<title>INDICA UM</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}



</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-right-align w3-large">

 <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <!-- <button class="w3-button w3-padding-large" title="Log Out">  <i class="fa fa-power-off"></i> -->
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-power-off"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">

  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" 
     href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>

 <div class="w3-dropdown-hover w3-hide-small w3-right">

    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i>
    <span class="w3-badge w3-right w3-small w3-green"><?php 

      if ($count>0)
      {
        echo $count;
      }
      else 
      {echo 0;}?> 
      

        </span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block " style="width:300px; right:0">
    <?php 
    while($row=mysql_fetch_array($qry)){
      $noti_action = $row['noti_action'];
      $link = $row['link'];

    ?>  <a href="<?php echo $link;?>" style="font-size: 13px;" class="w3-bar-item w3-button"><?php echo $noti_action; ?></a><?php
      
      
    }
    
    ?>

    
    </div>
  </div>
  
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>

</div>


 </div>
</div>


<!-- End Page Container -->
</div>
<br>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}


</script>

</body>
</html> 