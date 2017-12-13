<?php
include ('nav-noti.php');
?>

<!DOCTYPE html>
<html>

<head>


<!-- <h3>View All Users></h3><hr></div> -->
<!-- <link rel="stylesheet" type="text/css" href="table.css" /> -->
<link rel="stylesheet" type="text/css" href="pure-min.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />
</head>

<style>  
table {

}

th {
    cursor: pointer;
}

th, td {
    text-align: left;
    padding: 16px;
}


</style>  

<body>
    
<div id="content">

    
    <!-- <?php 
   if(!empty($_GET['deleted'])){?>
          <div class="error_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>User has been deleted</strong> 
          </div>
  <?php }
  ?> -->


 <strong><center>View All User</strong></center>

      
      <br><table id='myTable' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th> # </th>
          <th onclick="sortTable(0)">User ID</th>
          <th onclick="sortTable(1)">User Name</th>
          <th onclick="sortTable(2)">Email</th>
          <th onclick="sortTable(3)">Module ID</th>
          <th onclick="sortTable(4)">Assigned Role</th>
          <!-- <th>User Status</th>           -->
          <!-- <th>Delete User</th> -->
          <th>Edit User Profile</th>
        </tr>
      </thead>
      <tbody class="table table-hover">

            <?php  
            
            $result = mysql_query("SELECT user.*, roles.* FROM user JOIN roles ON user.role_id = roles.role_id");
            
            $x = 1;
            while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
            {  
                
                $user_id=$row['user_id'];  
                $username=$row['username'];  
                $email=$row['email'];  
                $module_id=$row['module_id'];
                $role_id=$row['role_id'];
                $role_name=$row['role_name'];
                
                ?>

                
                <tr>
                    <th><?php echo $x ?></th>
                    <td><?php echo $user_id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $email ?> </td>
                    <td><?php echo $module_id ?></td>
                    
                    <td><?php echo $role_name ?> </td>
                    <!-- <td><?php echo $user_status ?></td> -->
                    <!-- <td><a onclick="return confirm('Delete this record?')" href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td> -->
                    <td><a onclick="return confirm('View this user profile?')" href="admin_manageuser_view_profileuser.php?view=<?php echo $user_id ?>"><button class="btn btn-danger">View This User</button></a></td>
                </tr>


            <?php $x++; } ?>
            </table>
            
        </table>  
    
    
    <br>
</div>  
    
</body>

</html> 
<script>
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  </script>
