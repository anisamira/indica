<?php
include ('nav-noti.php');

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="alert.css" />
    <link rel="stylesheet" type="text/css" href="pure-min.css" />
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
        <div class="wrapper">
            <!-- Sidebar Holder -->

            <!-- Page Content Holder -->
            <div id="content">
            <?php 
   if(!empty($_GET['status'])){?>
          <div class="success_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have created a new session</strong> 
          </div>
  
  <?php }
  ?>

<?php 
   if(!empty($_GET['deleted'])){?>
          <div class="error_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>Session has been deleted</strong> 
          </div>
  <?php }
  ?>

  Please insert start year (Ex: "2000") and end year (Ex: "2004"):<br><br>
<form action="create_algo.php" method="post" class="pure-form pure-form-aligned">

    <input type="text" class="input" placeholder="Start Year" name="start_year" />
    <input type="text" class="input" placeholder="End Year" name="end_year" />

    <input type="submit" class="loginbutton" name ="create" value="Create" /><br>
    </form>    

    <strong><center>Session Created</strong></center>

    <br>
    <table id='myTable' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th>#</th>
          <th onclick="sortTable(0)">Session Name</th>
          <th onclick="sortTable(1)">Current Status</th>
          <th>Change Status</th>
          <th onclick="sortTable(2)">Date Created</th>
          <th onclick="sortTable(3)">Created By</th>
          <th>Delete</th>          
        </tr>
      </thead>
      <tbody id="myTable" class="table table-hover">
            <?php              
              $result = mysql_query("SELECT session_name, session_status, date_created, created_by FROM session ORDER BY date_created DESC");
              $x = 1;
              while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
              {  

                $session_name=$row['session_name'];  
                $session_status=$row['session_status'];  
                $date_created=$row['date_created'];
                $created_by=$row['created_by'];

                if($session_status==0){
                  $ses_stat = "OFF";
                  $ses= "ON";
                }
                else {
                  $ses_stat = "ON";
                  $ses= "OFF";
                }

                ?>

                <tr>
                    <td><strong><?php echo $x ?></strong></td>
                    <td><?php echo $session_name ?></td>
                    <td><?php echo $ses_stat ?></td>
                    <td><a onclick="return confirm('Turn <?php echo $ses?> this form?')" href="handler.php?stat=<?php echo $session_name ?>&check=<?php echo $session_status ?>">
                    <button><?php echo $ses; ?></button></a></td>
                    <td><?php echo $date_created ?></td>
                    <td><?php echo $created_by ?></td>
                    <td><a onclick="return confirm('WARNING: This action will delete this record permanently. Do you want to proceed?')" href="deleteSession.php?del=<?php echo $session_name ?>"><button class="btn btn-danger">Delete</button></a></td>


                </tr>
                
                
             <?php $x++; }?>
             </table>

            
      </table>  

      <br>

</div></div>


    </body>
</html>
<script>

$('a.delete').on('click', function() {
    var choice = confirm('Do you really want to edit this record?');
    if(choice === true) {
        return true;
    }
    return false;
});

</script>

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
