<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="pure-min.css" />
</head>

<?php
	// include('style_dc.php');
	include('nav-noti.php');
	
	?>

<div class="wrapper">


			<div id="content">	
      
	  <center><h4>Please Select Module To View Module Workbench</h4><br>
<?php

	
	
  $x=1;
  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-bordered"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
											<th></th>
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
                         <form action="work_view22.php?moduleid=$moduleid&sesi=$sesi" method="get" class="pure-form pure-form-aligned">

                         <form class="pure-form pure-form-aligned" action="work_view22.php?moduleid=$moduleid&sesi=$sesi" method="get">
                         <form class="pure-form pure-form-aligned" action="work_view22.php?moduleid=$moduleid&sesi=$sesi" method="get">

                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td><button type="submit" class="btn btn-primary">Go</button></td>
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
  else{
 	{
		//print error message
		echo 'No code found';
	}
	// once processing is complete
	// free result set
	
}





?>		

			</div>
    </div>

  
</html>