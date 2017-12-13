<?php
include ('nav-noti.php');
// $module_id=$_SESSION['module_id'];
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

<!-- <b><u>Notes</b></u><br>
Module 1: Academic<br>
Module 2: Student Life<br>
Module 3: Excellent Research<br>
Module 4: Internalization and Branding<br>
Module 5: Infrastructure Planning and Development<br>                    
Module 6: Financial Sustainability and Wealth Creation<br>
Module 7: Faculty and Staff Recruitment and Development<br> -->

      
      <br><table id='' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th># </th>
          <!-- <th>User ID</th> -->
          <th>User Name</th>
          <th>Last Action on Site</th>
          <th>Time of Action</th>
          <th>Module Affected</th>

        </tr>
      </thead>
      <tbody class="table table-hover">

            <?php  
            
            $result = mysql_query("SELECT *
            FROM notif_user_r01
            UNION SELECT *
            FROM notif_user_r02
            UNION SELECT *
            FROM notif_user_r03
            UNION SELECT *
            FROM notif_user_r04
            UNION SELECT *
            FROM notif_user_r05
            ORDER BY time_updated DESC");
            
            $x = 1;
            while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
            {  
                
                // $user_id=$row['user_id'];
                $sender=$row['sender'];
                $noti_action=$row['noti_action'];
                $time_updated=$row['time_updated'];
                

                $sqlq= "SELECT * from user where username='$sender'";
                $rsq=mysql_query($sqlq, $conn);
                while($row1 = mysql_fetch_assoc($rsq)){//while look to fetch the result and store in a array $row.  
                    $module_id=$row1['module_id'];
                ?>

                <tr>
                    <th><?php echo $x ?></th>
                    <!-- <td><?php echo $user_id ?></td> -->
                    <td><?php echo $sender ?></td>
                    <td><?php echo $noti_action ?> </td>
                    <td><?php echo $time_updated ?></td>
                    <td><?php echo $module_id ?></td>
                    
                </tr>

            <?php $x++; }} ?>
            </table>
            
        </table>  
    
    
    <br>
</div>  
    
</body>



</html> 
