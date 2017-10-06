<?php  
 include('connection.php');
 $sql = "DELETE FROM test WHERE kpid = '".$_POST["id"]."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>