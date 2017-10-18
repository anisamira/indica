
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
						}
						$session_name	=$_SESSION['session_name'];
					}
					else
					{
						echo "no data found";
					}
	
	$sql			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['form_status']	=$row['form_status'];
							$_SESSION['form_id']		=$row['form_id'];
						}
						$form_status	=$_SESSION['form_status'];
						$form_id		=$_SESSION['form_id'];
					}
					else
					{
						echo "no data found";
					}
	

	
	?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	
<html>
<form name="find" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

Module Code: <input type="text" name="code"> 

<!--
<select name="Health" multiple="" class="ui fluid dropdown">
  <option value="">Health</option>
<option value="green">Green</option>
<option value="red">Red</option>
<option value="amber">Amber</option>
<option value="na">Not Available</option>

</select>
-->

<!-- <br> Status<input type="" name="status"><br>
Module: <input type="" name="module"><br>    
Stage<input type="" name="stage"><br>
Year: <input type="" name="year"><br>        
Health<input type="" name="health"><br>
-->
<input type="submit" name="search" value="Search">
</form>

</html>


        
<?php


if(isset($_POST["search"])){
	$code=$_POST['code'];
	


  $sql=("SELECT * FROM form WHERE module_id='$code'");
   $result = mysql_query($sql) or die(mysql_error());


	if (false === $result) {
    echo mysql_error();
}
 if(mysql_num_rows($result)>0){
  {
		//print HTML table
		echo '<table style="width:100%">';
		echo
		'<tr><td><b>Code</b></td><td><b>Nama</b></td></tr>';
		
		// iterate over record set
		// print each field
		
		//while ($row=$result->fetch_assoc())
		
		while ($row=mysql_fetch_array($result))
		{
		echo '<tr>';
		//echo '<td class="td1">' . $row['module_id'] . '</td>';
		echo '<td class="td1"><a href="work.php" target="_blank">'.$row['module_id'].'-'.$row['session_name'].'</a></td>';
$_SESSION['code']=$row['module_id'];
if (($_SESSION['code'])!=$row['module_id']){
session_destroy();
}
		echo '<td class="td1">' . $row['module_name'] . '</td>';
		}
		echo '</table>';
	}
 }
  
  else{
 	{
		//print error message
		echo 'No code found';
	}
	// once processing is complete
	// free result set
	
}
	
}


?>		

</div><!--/row-->
</div><!--/container-->
<!--=== End Service Block ===-->


</div><!--/wrapper-->