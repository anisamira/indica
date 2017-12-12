<?php
include ('nav-noti.php');
?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" type="text/css" href="pure-min.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />
</head>

<style>  
</style>  

<body>
    
<div id="content">
      
      <br><table id='' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th># </th>
          <th>User ID</th>
          <th>User Name</th>
          <th>Login Time</th>
          <th>Logout Time</th>
        </tr>
      </thead>
      <tbody class="table table-hover">

            <?php  
            
            $result = mysql_query("SELECT logtrails.*, user.* FROM logtrails JOIN user ON logtrails.user_id = user.user_id ORDER BY logtrails.login_time DESC");
            
            $x = 1;
            while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
            {  
                
                $user_id=$row['user_id'];
                $username=$row['username'];
                $login_time=$row['login_time'];
                $logout_time=$row['logout_time'];
                ?>

                
                <tr>
                    <th><?php echo $x ?></th>
                    <td><?php echo $user_id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $login_time ?> </td>
                    <td><?php echo $logout_time ?></td>
                </tr>

            <?php $x++; } ?>
            </table>
            
        </table>  
    
    
    <br>
</div>  
    
</body>



</html> 
