<?php
include ('db.php');
session_start();//If the user is logged, we log him out

if(isset($_SESSION['username']))
{
	$user = $_SESSION['username'];
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$timestamp = date("d-m-Y H:i:s");
    
	//We log him out by deleting the username and userid sessions
 	$sql1= "UPDATE user SET logout_time=now() WHERE username = '$user'";    
	$rs1= mysql_query($sql1, $conn);
	
	$sql2= "SELECT user_id, login_time, logout_time FROM user WHERE username='$user'";
	$rs2 = mysql_query($sql2);
	while($row = mysql_fetch_assoc($rs2))//while look to fetch the result and store in a array $row.  
	{
		$user_id = $row['user_id'];
		$login_time = $row['login_time'];
		$logout_time = $row['logout_time'];

		$sql3 = "INSERT INTO logtrails (user_id, login_time, logout_time) VALUES ('$user_id', '$login_time', '$logout_time')";
		$rs3 = mysql_query($sql3);
	}
	
	

	unset($_SESSION['username'], $_SESSION['user_id']);
	session_destroy();	
    header('location:index.php');
}
else
{

}
?>
