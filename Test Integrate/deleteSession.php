
    <?php  
    include("connection.php");  
    
    $delete_id=$_GET['del'];  
    $delete_query="DELETE FROM session WHERE session_name='$delete_id'";//delete query  

    
    $run=mysql_query($delete_query);  
    if($run)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('admin_create_session.php?deleted=Session has been deleted','_self')</script>";  
    }  
      
    ?>  
