<?php
include ('sidebar.php');
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />
<link rel="stylesheet" type="text/css" href="toggleswitch.css" />


</head>

<body>

<div class="w3-container" style="margin-left:300px;margin-top:43px;">
<br>
<?php 
   if(!empty($_GET['status'])){?>
          <div class="success_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have created a new session</strong> 
          </div>
  <?php }
  ?>
    <br><br><br><br>



  <br>
  Please insert start year (Ex: "2000") and end year (Ex: "2004"):<br><br>
<form action="create_algo.php" method="post">

    <input type="text" class="input" placeholder="Start Year" name="start_year" /> 
    <input type="text" class="input" placeholder="End Year" name="end_year" />

    <input type="submit" class="loginbutton" name ="create" value="Create" /><br>
    </form>    

    <strong><center>Session Created</strong></center>

    <br>
      <table id='myTable' class='fixed' style= "float=left; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Session Name</th>
          <th>Current Status</th>
          <th>Change Status</th>
          <th>Date Created</th>
        </tr>
      </thead>
      <tbody>
            <?php              
              $result = mysql_query("SELECT session_name, session_status, date_created FROM session");

              while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
              {  

                $session_name=$row['session_name'];  
                $session_status=$row['session_status'];  
                $date_created=$row['date_created'];

                if($session_status==0){
                  $ses_stat = "OFF";
                  $ses= "ON";
                }
                else {
                  $ses_stat = "ON";
                  $ses= "OFF";
                }

                
                                
                echo  "<table id='myTable' style='margin: 0 auto; float=left' class='fixed'>
                <tr>
                    <td>$session_name</td>
                    <td>$ses_stat</td>";?>
                    
                    <td><a onclick="return confirm('Turn <?php echo $ses?> this form?')" href="handler.php?stat=<?php echo $session_name ?>&check=<?php echo $session_status ?>">
                    <button>
                    <?php echo $ses; ?></button></a></td>
                    <td><?php echo $date_created; ?></td>

                </tr>
                </table>
                
             <?php }
            ?>

            
      </table>  

      <br>


  <!-- End page content -->
</div>
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
