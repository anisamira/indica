<?php
 	 session_start();

include('db.php');

  	$user_check=$_SESSION['login_user'];
	$ses_sql=mysql_query("SELECT * FROM user WHERE username ='$user_check'");
	$result = mysql_num_rows($ses_sql);
	
	$login_session=$result['username'];	
	$myusername = $_SESSION['username'];
	$mypassword = $_SESSION['password'];
	$myrole_id = $_SESSION['role_id'];	


if (!isset($_SESSION['username']))
{
     echo "<h5>Error: You must login to access this page. Redirecting... </h5>";
    echo "<html>";
    echo "<script>";
  echo "window.location.href='index.php'";
    echo "</script>";
    echo "</html>";
    exit;
 }
?>