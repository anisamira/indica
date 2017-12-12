<?php
include ('nav-noti.php');

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="alert.css" />
    <link rel="stylesheet" type="text/css" href="pure-min.css" />
    </head>
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
    <table id='' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th>#</th>
          <th>Session Name</th>
          <th>Current Status</th>
          <th>Change Status</th>
          <th>Date Created</th>
          <th>Created By</th>
          <th>Delete</th>          
        </tr>
      </thead>
      <tbody class="table table-hover">
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
                    <th><?php echo $x ?></th>
                    <td><?php echo $session_name ?></td>
                    <td><?php echo $ses_stat ?></td>
                    <td><a onclick="return confirm('Turn <?php echo $ses?> this form?')" href="handler.php?stat=<?php echo $session_name ?>&check=<?php echo $session_status ?>">
                    <button><?php echo $ses; ?></button></a></td>
                    <td><?php echo $date_created ?></td>
                    <td><?php echo $created_by ?></td>
                    <td><a onclick="return confirm('Delete this record?')" href="deleteSession.php?del=<?php echo $session_name ?>"><button class="btn btn-danger">Delete</button></a></td>


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