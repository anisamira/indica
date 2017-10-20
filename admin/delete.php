
    <?php  
    include("connection.php");  

    $delete_id=$_GET['del'];  
    $delete_query="DELETE FROM user WHERE userid='$delete_id'";//delete query  

    $run=mysql_query($delete_query);  
    if($run)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('admin_manageuser_viewuser.php?deleted=user has been deleted','_self')</script>";  
    }  
      
    ?>  
