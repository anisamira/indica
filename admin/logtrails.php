<?php
include ('sidebar.php');
?>

<!DOCTYPE html>
<html>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
   #myTable {
        border-collapse: collapse;
        width: 80%;
        border: 1px solid #ddd;
        font-size: 14px;
        margin-bottom: 0px;
    }
    
    #myTable th,
    #myTable td {
        text-align: left;
        padding: 14px;
    }
    
    #myTable tr {
        border-bottom: 1px solid goldenrod;
        background-color: #ddd;
        color: black;
    }
    
    #myTable tr.header,
    #myTable tr:hover {
        background-color: #f1f1f1;
        cursor: default;
    }

    #myTable.fixed { table-layout:fixed; }
#myTable.fixed td { overflow: hidden; }

</style>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<br>
<strong>Log Trails</strong>
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
          $result = mysql_query("SELECT * FROM trail");
          while($row = mysql_fetch_assoc($result))
          {

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

  <!-- End page content -->
</div>
</body>
</html>  