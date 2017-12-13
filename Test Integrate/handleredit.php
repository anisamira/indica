
    <?php  
    include("connection.php");
    $username=$_SESSION['username'];
    
    
    $stat=$_GET['stat'];
    $module=$_GET['module'];
    
    $stat_query= "UPDATE form SET form_status='edit' WHERE session_name='$stat' AND module_id='$module'" ;
    
    $run=mysql_query($stat_query);  
    if($run)  
    {
    
        
    $form = $stat." " .$module;
    $action = $username." has approved ".$form." for editing";

    $sqly = "SELECT user_id FROM user WHERE role_id='R02' AND module_id='$module'";
    $resulty    =mysql_query($sqly);
    while($row2=mysql_fetch_array($resulty))
    {
      $user  =$row2['user_id'];
      $sqlx      ="INSERT INTO notif_user_r02 (user_id, noti_action, noti_status, sender, link) VALUES ('$user', '$action', 'u', '$username', 'main_dc.php')";
      $resultx    =mysql_query($sqlx);

    }
    //javascript function to open in the same window    
    echo "<script>window.open('admin_requestedit.php?stat=edited','_self')</script>";  
    }  
      
    ?>  
