<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
 
 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
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

				
	 $sql			= "SELECT * FROM module WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$module_name=$row['module_name'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}


 $sql			= "SELECT * FROM year WHERE year_name='$curyear'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year= $row['year_name'];
							$year_id=$row['year_id'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}

									
?>

		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->


	<div class="w3-main" style="margin-left:300px;margin-top:43px;">	

	<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_name?> <?=$session_name;?> YEAR <?=$year?>
  <br>
    &nbsp&nbspGenerate Yearly Report
  <br>
	</div>
	
<?php

// select all
	
  $x=1;
  $sql=("SELECT DISTINCT year.year_name
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
						JOIN evidence ON evidence.ach_id=achievement.ach_id
						JOIN session ON session.session_name=goal.session_name
						WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name<='$curyear'
								");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
		
								   <table class="table table-bordered"> 

										<tr> 
											<th>YEAR</th>  
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			
			$year=$row['year_name'];
			
?>	
<tr>
                         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <td style="width:50px;"><?php echo $year;?></td>
							<input type="hidden" name="year" value="<?php echo $year;?>"/>
							<td style="width:15px;"><button type="submit" name="submit" class="btn btn-primary">Go</button></td>
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
		echo 'No project found';
	}
	// once processing is complete
	// free result set
	
}

if (isset($_POST['year']))
{
	$year=$_POST['year'];
	echo "$year";
	
	
}




?>		

	
	<!--END OF DIVISION-->
	</div>
	</div>
	