<?php
include ('db.php');
session_start();

	//If the user is logged, we log him out
	if(isset($_SESSION['username']))
	{
		$myusername = $_SESSION['username'];
		
		$sql2= "UPDATE user SET logout_time=now() WHERE username = '$myusername'";    
		$rs2= mysql_query($sql2);

		unset($_SESSION['username'], $_SESSION['userid']);
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