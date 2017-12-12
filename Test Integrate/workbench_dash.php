<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="pure-min.css" />
<head>

<?php
	// include('style_dc.php');
	include('nav-noti.php');
	
	
	?>

<div class="wrapper">


		<div id="content">		
		<!-- !PAGE CONTENT! -->	



<html>
<form name="find" class="pure-form pure-form-aligned" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

Module Code: <input type="text" name="code"> 


<input type="submit" name="search" value="Search">
<input type="submit" name="select" value="Select ALL">

</form>
<br>
</html>        
<?php



if(isset($_POST["search"])){
	$code=$_POST['code'];
	
  $x=1;
  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id WHERE module.module_id='$code' GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-hover"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
											<th> </th>
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			$_GET['module_id']=$row['module_id'];
			$_GET['session_name']=$row['session_name'];
			$name=$row['module_name'];
			$moduleid=$_GET['module_id'];
			$sesi=$_GET['session_name'];
			
			
			
			
?>	
<tr>
                         <form action="dash_view.php" method="post">
                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td><button type="submit" class="btn btn-primary" name="save">Go</button></td>
							
							</form>

</tr>								   
												<?php
		}
	$x++;											

											?>
									</table>								

</div>

<?php		
 }	 
  else
 	{
		//print error message
		echo 'No code found';
	}
	// once processing is complete
	// free result set
	

}

// select all
if(isset($_POST["select"])){
	
	
  $x=1;
  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-hover"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
											<th> </th>
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			$_GET['module_id']=$row['module_id'];
			$_GET['session_name']=$row['session_name'];
			$name=$row['module_name'];
			$moduleid=$_GET['module_id'];
			$sesi=$_GET['session_name'];
			
			
			
			
?>	
<tr>
                         <form action="dash_view.php" method="post" class="pure-form pure-form-aligned">
                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td><button type="submit" name="save" class="btn btn-primary">Go</button></td>
							<!--<td><button type="submit" name="Go" class="btn btn-primary"><a href="work_view.php?moduleid=$moduleid&sesi=$sesi">Go</a></button></td>-->

							</form>

</tr>								   
												<?php
											}
	$x++;											

											?>
									</table>								

</div>

<?php		
 }	 
  else
 	{
		//print error message
		echo 'No code found';
	}
	// once processing is complete
	// free result set
	

}



	




?>


    </div>
 
  
</html>


