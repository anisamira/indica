<?php
include ('sidebar.php');
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />
</head>

<style>  
</style>  

<body>
    <div class="w3-container" style="margin-left:300px;margin-top:43px; ">
    <br>
    <?php 
   if(!empty($_GET['deleted'])){?>
          <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>User has been deleted</strong> 
          </div>
  <?php }
  ?>

    <strong><center>View All User</strong></center>

      <br><table id='myTable' style= " margin: 0 auto;" >
      <thead>
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>User Password</th>
          <th>Delete User</th>
        </tr>
      </thead>
      <tbody>

            <?php  
            
            $result = mysql_query("SELECT * FROM user");

            while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
            {  
                $userid=$row['userid'];  
                $username=$row['username'];  
                $password=$row['password'];   
                
                echo  " <table id='myTable' style='margin: 0 auto' class='fixed'>
                <tr>
                    <td>$userid</td>
                    <td>$username</td>
                    <td>$password</td>";?>
                
                <td><a href="delete.php?del=<?php echo $userid ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                </table>
            <?php } ?>
        </table>  
            </div>  
    </div>
    <br>
    
  <!-- End page content -->
</div></div>
    
    </body>



</html> 
