<?php
include ('sidebar.php');
?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="tableblue.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />

</head>

<body>

<div class="w3-container" style="margin-left:300px;margin-top:43px;">
    <br><br><br><br><br><br><br>

    <?php 
   if(!empty($_GET['status'])){?>
          <div class="success_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have created a new session</strong> 
          </div>
  <?php }
  ?>

  <br>
  Please insert start year (Ex: "2000") and end year (Ex: "2004"):<br><br>
<form action="create_algo.php" method="post">

    <input type="text" class="input" placeholder="Start Year" name="start_year" /> 
    <input type="text" class="input" placeholder="End Year" name="end_year" />

    <input type="submit" class="loginbutton" name ="create" value="Create" /><br>
    </form>    

    <strong><center>Session Created</strong></center>

    <br>
      <table id='myTable' style= "float=left; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Session Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
            <?php              
              $result = mysql_query("SELECT session_name, session_status FROM session");

              while($row = mysql_fetch_assoc($result))//while look to fetch the result and store in a array $row.  
              {  
                $session_name=$row['session_name'];  
                $session_status=$row['session_status'];  

                if($session_status==0){
                  $ses_stat = "OFF";
                }
                else {
                  $ses_stat = "ON";
                }

                                
                echo  "<table id='myTable' style='margin: 0 auto; float=left' class='fixed'>
                <tr>
                    <td>$session_name</td>
                    <td>$ses_stat</td>
                </tr>
                </table>";
              }
            ?>
      </table>  

      <br>


  <!-- End page content -->
</div>




      
    
</body>
</html> 



