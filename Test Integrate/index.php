<?php
include ('db.php');
session_start();	
	// if($_SERVER["REQUEST_METHOD"]=="POST")
	if(isset($_POST['submit']))
		{

			$myusername = mysql_real_escape_string($_POST['username'], $conn);
      $mypassword = mysql_real_escape_string($_POST['password'], $conn); 
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysql_query($sql, $conn);
      $row = mysql_fetch_array($result,MYSQL_ASSOC);
      // $active = $row['active'];
      
      $count = mysql_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //  session_register("myusername");
				 				 
				$_SESSION['user_id'] 	= $row['user_id'];
				$_SESSION['username'] 	= $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['module_id'] = $row['module_id'];
				$_SESSION['role_id']	=$row['role_id'];
				$_SESSION['login_user']=$myusername;	
				
				$sql= mysql_query("UPDATE user SET login_time=now() WHERE username = '$myusername' AND password ='$mypassword'");

		
         					if(	$_SESSION['role_id']=='R01'){     
						header("location:main_admin.php ");
						}elseif(	$_SESSION['role_id']=='R02'){
						header("location:main_dc.php ");
						 }elseif(	$_SESSION['role_id']=='R03'){
						header("location:main_dm.php ");
						 }elseif(	$_SESSION['role_id']=='R04'){
						header("location:main_tnc.php ");
						 }elseif(	$_SESSION['role_id']=='R05'){
						header("location:workbench_dash.php ");}
      }else {
				 $error = "Your Login Name or Password is invalid";
				 echo $error;
      }
   }

?>

<html>
  <head>
	<title>INDICA UM</title>
	<link rel="stylesheet" type="text/css" href="alert.css" />
	<link rel="stylesheet" type="text/css" href="index_loginform.css" 
  </head>

<style>
  </style>

  <body style="margin-top:5%">

  <?php 
   if(!empty($_GET['status'])){?>
          <div class="error_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have successfully logged out</strong> 
          </div>
  <?php }
  ?>

    <h1>Login Page</h1>
    <p>Please enter your username and password:</p>
    <form action="" method="post">

    <input type="text" class="input" placeholder="E-mail" name="username" /> <br>
    <input type="password" class="input" placeholder="Password" name="password" /><br>
    <input type="submit" name="submit" class="loginbutton" value="Login" /><br>
    </form>

  </body>
</html> 

