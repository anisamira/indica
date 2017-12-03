<?php
include ('db.php');
session_start();

	//If the user is logged, we log him out
	if(isset($_SESSION['username']))
	{
		$myusername = $_SESSION['username'];
				
		//We log him out by deleting the username and userid sessions
		 $sql1= "UPDATE user SET logout_time=now() WHERE username = '$myusername'";    
		$rs1= mysql_query($sql1);
		$sql2="INSERT INTO logtrails( user_id, login_time, logout_time) SELECT user_id, login_time, logout_time from user where username='$myusername'";
		$q = mysql_query($sql2);

		unset($_SESSION['username'], $_SESSION['user_id']);
		header('location: index.php?status=loggedout');
	
		}
		else
		{
		}
?>

<html>

<head>
    <title>Logout</title>
</head>

<body>
</body>

</html>