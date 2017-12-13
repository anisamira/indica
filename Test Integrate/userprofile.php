<?php
include ('nav-noti.php');

$check = $_SESSION['username'];

// $query = mysql_query("SELECT user.*, roles.* FROM user JOIN roles ON user.role_id = roles.role_id AND user.user_id='$check'");
$query= mysql_query(" SELECT user.*, roles.*, module.* FROM module JOIN user ON user.module_id = module.module_id JOIN roles ON roles.role_id=user.role_id WHERE user.username='$check' ");

// $query= mysql_query("SELECT * FROM user WHERE user_id='$check'");

  while($row = mysql_fetch_assoc($query))//while look to fetch the result and store in a array $row.  
  {
    $user_id=$row['user_id'];  
    $username=$row['username'];  
    $email=$row['email'];  
    $module_id=$row['module_id'];
    $role_id=$row['role_id'];
    $role_name=$row['role_name'];
    $module_name=$row['module_name'];
    $fname=$row['fname'];
    $lname=$row['lname'];
    $mobileno=$row['mobileno'];
    // $password=$_POST['pwd1'];
    
    

  }  

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

      <center><h3>Your Profile</h3></center>
            
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        
      <br>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
        <div class="panel panel-info">
            <div class="panel-heading">
            <h3 class="panel-title"><?php echo "USER ".$username ?></h3>          
            </div>

            <div class="panel-body">
                <div class="row">                
                  <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>

                          <tr>
                            <td>First Name:</td>
                            <td><?php echo $fname;?></td>
                          </tr>

                          <tr>
                            <td>Last Name:</td>
                            <td><?php echo $lname;?></td>
                          </tr>

                          <tr>
                            <td>Username:</td>
                            <td><?php echo $username;?></td>
                          </tr>

                          <tr>
                            <td>Email address:</td>
                            <td><a href="mailto:info@support.com"><?php echo $email;?></td>
                          </tr>

                          <tr>
                            <td>Mobile Number:</td>
                            <td><?php echo $mobileno;?></td>
                          </tr>

                          <tr>
                            <td>Role:</td>
                            <td><?php echo $role_name;?></td>
                          </tr>
                      
                          
                          <tr>
                            <td>Module:</td>
                            <td><?php echo $module_id . " " . $module_name?></td>
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
