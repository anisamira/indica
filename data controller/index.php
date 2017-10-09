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
				$_SESSION['user_id'] 	= $row['userid'];
				$_SESSION['username'] 	= $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['role']	=$row['role'];
					
						$_SESSION['login_user']=$myusername;	
						if($myusername=='admin'){     
						header("location:main.php ");
						}elseif($myusername=='usera'||$myusername=='tnci'||$myusername=='tncpi'||$myusername=='hepa'||$myusername=='tncpid'||$myusername=='fac'){
						header("location:main.php ");
						 }elseif($myusername=='userb'){
						header("location:userb.php ");
						 }elseif($myusername=='tnc'){
						header("location:tnc.php ");
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
          <div class="alert">
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

