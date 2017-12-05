<?php
include ('sidebar.php');
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->

            <!-- Page Content Holder -->
            <div id="content">
            
            <br>
            <strong><center>Log Trails</strong>
                  <br><br><table id='' class="table table-hover" style= " margin: 0 auto;" >
                  <thead>
                    <tr>
                      
                      <th>User ID</th>
                      <th>Username</th>
                      <th>Login Time</th>
                      <th>Logout Time</th>
                    </tr>
                  </thead>
                  <tbody>
            
                    <?php
                      // $result = mysql_query("SELECT logtrails.*, user.* FROM logtrails JOIN user WHERE user.user_id = logtrails.user_id");
                      $result = mysql_query("SELECT logtrails.*, user.* FROM logtrails JOIN user ON logtrails.user_id = user.user_id");
                      // $result = mysql_query ("SELECT * FROM logtrails");
                      while($row = mysql_fetch_assoc($result))
                      {
                      $user_id=$row['user_id'];
                      $username=$row['username'];
                      $login_time=$row['login_time'];
                      $logout_time=$row['logout_time'];
            
                              echo  " <table id='' class='table table-hover' style='margin: 0 auto' class='fixed'>
                              <tr>
                                  
                        <td>$user_id</td>
                        <td>$username</td>            
                                  
                                  <td>$login_time</td>
                                  <td>$logout_time</td>
                              </tr>
                              </table> ";}
                    ?>
            
                  </tbody>
                </table>
            <br>
    </div>


    </body>
</html>
