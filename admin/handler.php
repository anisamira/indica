
    <?php  
    include("connection.php");  
    
    $stat_id=$_GET['stat'];
    $check=$_GET['check'];    
    
    
    if ($check==0){
        $stat_query="UPDATE session SET session_status=TRUE WHERE session_name='$stat_id'";//delete query          
        $stat_query1="UPDATE form SET form_status='edit' WHERE session_name='$stat_id' AND module_id=";
    }
    else{
    $stat_query="UPDATE session SET session_status=FALSE WHERE session_name='$stat_id'";//delete query  
    
    }

    
    $run=mysql_query($stat_query);  
    if($run)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('admin_create_session.php?stat=edited','_self')</script>";  
    }  
      
    ?>  
