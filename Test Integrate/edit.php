
    <?php  
    include("connection.php");  
    
    $edit_id=$_GET['edit'];  
    $edit_query="SELECT * FROM user WHERE user_id='$edit_id'";//

    
    $run=mysql_query($edit_query);  
    if($run)  
    {  
    javascript function to open in the same window   
        echo "<script>window.open('admin_manageuser_view_profileuser.php','_self')</script>";  
    }  
      
    ?>  
