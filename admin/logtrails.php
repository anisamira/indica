<?php
include ('sidebar.php');
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
</head>

<style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<br>
<strong><center>Log Trails</strong>
      <br><br><table id='myTable' style= " margin: 0 auto;" >
      <thead>
        <tr>
          
          <th>Username</th>
          <th>Login Time</th>
          <th>Logout Time</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $result = mysql_query("SELECT * FROM logtrails");
          while($row = mysql_fetch_assoc($result))
          {

          // $user_id=$row['user_id'];
          $username=$row['username'];
          $login_time=$row['login_time'];
          $logout_time=$row['logout_time'];

                  echo  " <table id='myTable' style='margin: 0 auto' class='fixed'>
                  <tr>
                      
                      <td>$username</td>
                      <td>$login_time</td>
                      <td>$logout_time</td>
                  </tr>
                  </table> ";}
        ?>

      </tbody>
    </table>
<br>
  <!-- End page content -->
</div>
</body>
</html>  