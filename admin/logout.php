<?php
include('connection.php');
?>

<html>
    <head>
        <title>Logout</title>
    </head>
    <body>
    	
<?php
//If the user is logged, we log him out
if(isset($_SESSION['username']))
{
	$user = $_SESSION['username'];
	// date_default_timezone_set("Asia/Kuala_Lumpur");
	// $timestamp = date("Y-m-d H:i:s");
    
	//We log him out by deleting the username and userid sessions
 	$sql1= "UPDATE user SET logout_time=now() WHERE username = '$user'";    
    $rs1= mysql_query($sql1);
	// $sql2="INSERT INTO trail( username, login_time, logout_time) SELECT username, login_time, logout_time from user where username='$user'";
	// $q = mysql_query($sql2);

	unset($_SESSION['username'], $_SESSION['userid']);
    header('location: index.php?status=loggedout');
?>

<?php
}
else
{

}
?>

	</body>
</html>