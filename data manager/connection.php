<?php
include('db.php');
  session_start();
  
  $user_check=$_SESSION['login_user'];
	$ses_sql=mysql_query("SELECT * FROM user WHERE username ='$user_check'");
	$result = mysql_num_rows($ses_sql);
	$login_session=$result['username'];	
	$myusername = $_SESSION['username'];
	$mypassword = $_SESSION['password'];
	$sql1= mysql_query("UPDATE user SET login_time=now() WHERE username = '$myusername' AND password ='$mypassword'");
	if(!isset($_SESSION['login_user']))
		{
			
			header("location:index.php");
			echo "Invalid username or password.";
		}  
?>