<?php
include ('nav-noti.php');

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
            
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        <!--   <A href="edit.html" >Edit Profile</A>-->

        <!--<A href="edit.html" >Logout</A>-->
      <br>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
        <div class="panel panel-info">
            <div class="panel-heading">
            <h3 class="panel-title"><?php echo $name ?></h3>          
            </div>

            <div class="panel-body">
                <div class="row">                
                  <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                          <tr>
                            <td>Username:</td>
                            <td>admin</td>
                            <!-- <td><?php echo $username;?></td> -->
                          </tr>

                          <tr>
                            <td>Email address:</td>
                            <td>admin@gmail.com</td>
                            <!-- <td><a href="mailto:info@support.com"><?php echo $email;?></td> -->
                          </tr>

                          <tr>
                            <td>Role:</td>
                            <td>admin</td>
                            <!-- <td><?php echo $role_id;?></td> -->
                          </tr>
                      
                          
                          <tr>
                            <td>Module:</td>
                            <td>N/A</td>
                            <!-- <td><?php echo $module_id?></td> -->
                          </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            
        </div>
        </div>
      </div>
    </div>


</body>
</html>
