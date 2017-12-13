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

  <!-- Please insert start year (Ex: "2000") and end year (Ex: "2004"):<br><br>
<form action="create_algo.php" method="post" class="pure-form pure-form-aligned">

    <input type="text" class="input" placeholder="Start Year" name="start_year" />
    <input type="text" class="input" placeholder="End Year" name="end_year" />

    <input type="submit" class="loginbutton" name ="create" value="Create" /><br>
    </form>     -->

    <strong><center>Edit Request</strong></center>

    <br>
    <table id='' class = "table table-hover" style= "margin: 0 auto;" >
      <thead>
        <tr>
          <th>#</th>
          <th>Session Name</th>
          <th>Module ID</th>
          <th>Current Status</th>
          <th>Change Status</th>
        </tr>
      </thead>
      <tbody class="table table-hover">
            <?php              
              $result = mysql_query("SELECT session.*, form.* FROM session JOIN form ON form.session_name=session.session_name ORDER BY session.session_name, form.module_id ASC");
              $x = 1;
              while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
              {  

                $session_name=$row['session_name'];  
                $session_status=$row['session_status'];  
                $module_id=$row['module_id'];
                $form_status=$row['form_status'];
                

                // if($session_status==0){
                //   $ses_stat = "Change Status";
                //   $ses= "Change Status";
                // }
                // else {
                //   $ses_stat = "Change Status";
                //   $ses= "Change Status";
                // }

                ?>

                <tr>
                    <th><?php echo $x ?></th>
                    <td><?php echo $session_name ?></td>
                    <th><?php echo $module_id ?></th>                    
                    <!-- <td><?php echo $ses_stat ?></td> -->
                    <th><?php echo $form_status ?></th>                    
                    
                    <td><a onclick="return confirm('Change this form status?')" href="handleredit.php?stat=<?php echo $session_name ?>&module=<?php echo $module_id?>">
                    <button>Modify</button></a></td>
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