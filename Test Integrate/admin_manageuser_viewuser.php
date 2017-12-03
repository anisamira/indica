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
          <div class="error_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>User has been deleted</strong> 
          </div>
  <?php }
  ?>

    <strong><center>View All User</strong></center>

      <br><table id='myTable' class = "fixed" style= " margin: 0 auto;" >
      <thead>
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Module ID</th>
          <th>Assigned Role</th>
          <th>User Status</th>          
          <th>Delete User</th>
        </tr>
      </thead>
      <tbody>

            <?php  
            
            $result = mysql_query("SELECT user.*, roles.* FROM user JOIN roles ON user.role_id = roles.role_id");
            $result1 = mysql_query("SELECT user.*, module.* FROM user JOIN module ON user.module_id = module.module_id");
            
            
            // $result = mysql_query("SELECT user.*, roles.*, module.* FROM user JOIN roles ON user.role_id = roles.role_id JOIN module ON user.module_id = module.module_id");
            // $result = mysql_query("SELECT logtrails.*, user.* FROM logtrails JOIN user ON logtrails.user_id = user.user_id");
            

            while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
            {  
                $user_id=$row['user_id'];  
                $username=$row['username'];  
                $email=$row['email'];  
                $module_id=$row['module_id'];
                $role_id=$row['role_id'];
                $role_name=$row['role_name'];
                $user_status=$row['user_status'];
                
                echo  " <table id='myTable' style='margin: 0 auto' class='fixed'>
                <tr>
                    <td>$user_id</td>
                    <td>$username</td>
                    <td>$email</td>
                    <td>$module_id</td>
                    
                    <td>$role_name</td>
                    <td>$user_status</td>";?>
                    <td><a onclick="return confirm('Delete this record?')" href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td>
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
<script>

$('a.delete').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});

</script>