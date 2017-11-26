<?php
include ('db.php');
session_start();	
	if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$myusername=mysql_real_escape_string($_POST['username'],$conn);
			$mypassword=mysql_real_escape_string($_POST['password'],$conn);
			$sql="SELECT * from user WHERE username='$myusername' AND password='$mypassword'";
			$result=mysql_query($sql,$conn);
			$row=mysql_fetch_array($result,MYSQL_ASSOC);		
			if(is_array($row)) 
			{
				$_SESSION['user_id'] 	= $row['user_id'];
				$_SESSION['username'] 	= $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['module_id'] = $row['module_id'];
				$_SESSION['role_id']	=$row['role_id'];
				$_SESSION['login_user']=$myusername;	
					
				// admin=1, data_controller=2, data_manager=3, tnc=4

						if(	$_SESSION['role_id']=='R01'){     
						header("location:main_admin.php ");
						}elseif(	$_SESSION['role_id']=='R02'){
						header("location:main_dc.php ");
						 }elseif(	$_SESSION['role_id']=='R03'){
						header("location:main_dm.php ");
						 }elseif(	$_SESSION['role_id']=='R04'){
						header("location:main_vc.php ");
						 }else{
							 
						 }					
			
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
    <input type="submit" class="loginbutton" value="Login" /><br>
    </form>

  </body>
</html> 

