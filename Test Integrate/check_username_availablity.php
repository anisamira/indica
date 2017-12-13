<?php
include('db.php');
if($_REQUEST)
{
	$username=($_REQUEST['username']);
	$query = "select * from user where username = '".strtolower($username)."'";
	$results = mysql_query( $query) or die('ok');
	$check=0;
	
	if(mysql_num_rows(@$results) > 0) // not available
	{
		echo '<div id="Error">Already Taken</div>';
		$check=1;

	}
	else
	{
		echo '<div id="Success">Available</div>';
		
	}	

	// if($check==1){
	// 	$sql1 = "INSERT INTO user (fname, lname, mobileno, username, password, role_id, email, module_id) VALUES ('$fname', '$lname', '$mobileno','$username', '$password', '$role','$email', '$module')";
	// 	$result1=mysql_query($sql1);
	// }
	
}?>