<?php
	include ('nav-noti.php');
	
	
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
	


									
?>

		<div class="wrapper">		
		<!-- !PAGE CONTENT! -->



			<div id="content">	
	
  <br>
    &nbsp&nbspGenerate Yearly Report
	</br>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<table class="table" width="20%">
					<tr>
						<td>
							<select class="form-control" name="module_id">
							<?php
								$sql=mysql_query("Select module_id from module");
								$row=mysql_num_rows($sql);
								while($row = mysql_fetch_array($sql))
								{
									$module_id=$row['module_id'];

									?>
									
									<option value="<?php  echo $module_id;?>"><?php  echo $module_id;?></option>
							      <?php
								}?>	
							</select> 
						</td>
						<td>
							<select class="form-control" name="year">
							<?php
								$sql=mysql_query("Select year_name from year");
								$row=mysql_num_rows($sql);
								while($row = mysql_fetch_array($sql))
								{
									$year=$row['year_name'];

									?>
									
									<option value="<?php  echo $year;?>"><?php  echo $year;?></option>
							      <?php
								}?>	
							</select> 
						</td>
						<div class="form-actions">
							<td><button type="submit" class ="btn btn-sucess" name="send" value="">Go</button></td>
						</div>
					</tr>
				</table>
				</form>
	
	
<?php
if (isset($_POST['send']))
{
   $module_id=$_POST['module_id'];
   $year=$_POST['year'];
	
  $x=1;
   $sql=("SELECT DISTINCT year.year_name,goal.module_id, goal.session_name 
   FROM goal 
   JOIN module ON module.module_id=goal.module_id 
   JOIN year ON year.session_name=goal.session_name 
   WHERE goal.module_id='$module_id'  
   AND year.year_name='$year'
								");
  	
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
		
								   <table class="table table-hover" width="50%;"> 

										<tr> 
											<th>YEAR</th>
											<th>Module</th>
											<th>Sesi</th>
											<th>Action</th> 											
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			
			$year=$row['year_name'];
			$moduleid=$row['module_id'];
			$sesi=$row['session_name'];
?>	
<tr>
                         <form class="pure-form pure-form-aligned" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <td style="width:30px;"><?php echo $year;?></td>
							<input type="hidden" name="year" value="<?php echo $year;?>"/>
							 <td style="width:30px;"><?php echo $moduleid;?></td>
							<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
							 <td style="width:30px;"><?php echo $sesi;?></td>
							<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td style="width:5px;"><button type="submit" name="submit" class="btn btn-primary">Generate</button></td>
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
		
		
		?>
							<div class="alert alert-warning alert-dismissable fade in">
								<meta http-equiv="refresh" content="1;url=admin_year_report.php" />
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>No Yearly Report</strong> Redirecting in 1 seconds...
							</div>
							<?php
		
	}
	// once processing is complete
	// free result set
	
}
}
if (isset($_POST['submit']))
{
	$year=$_POST['year'];
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];

										$x=1;
									$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* , form.*,achievement.*,year.*
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
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											AND form.form_status='approved' 
											AND year.year_name='$year'";
											$result = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($result)>0){				

?>


<div class="table-responsive">  
								   <table class="table table-hover"> 
										
										<tr> 
											<th>No.</th>  
											<th>Goals</th>  
											<th>Strategies</th>
											<th>Action Plan</th>  
											<th>KPI</th>
											<th>Operation Definition</th> 
											<th>Target <?=$year?></th>  
											<th>Achievement <?=$year?></th>  
											<th>Ownership</th> 
											<th>Data Source</th> 
											<th>Estimated Cost (RM)</th> 
											<th>Expected Financial Returns</th> 											
										</tr>


<?php
							
											while($row=mysql_fetch_array($result))
											{
												$goal_desc		=$row['goal_desc'];
												$strategy_desc	=$row['strategy_desc'];
												$actionplan_desc=$row['actionplan_desc'];
												$kpi_desc		=$row['kpi_desc'];
												$kpi_id			=$row['kpi_id'];
												$operation_def	=$row['operation_def'];
												$target=$row['target'];
												$achievement=$row['ach_desc'];
												$ownership		=$row['ownership'];
												$data_source	=$row['data_source'];
												$estimated_cost	=$row['estimated_cost'];
												$exp_fin_return	=$row['exp_fin_return'];								
												?>									
												<tr>  
													<td><?php echo $x;?></td>
													<td><?php echo $goal_desc;?></td>
													<td><?php echo $strategy_desc;?></td>
													<td><?php echo $actionplan_desc;?></td>
													<td><?php echo $kpi_desc;?>
														<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
													</td>
													<td><?php echo $operation_def;?></td>
													<td><?php echo $target;?></td>
													<td><?php echo $achievement;?></td>
													<td><?php echo $ownership;?></td>
													<td><?php echo $data_source;?></td>
													<td><?php echo $estimated_cost;?></td>
													<td><?php echo $exp_fin_return;?></td>
													
												</tr>
												<?php $x++;
											}

?>
</table>										
</div>
	 
 <form class="pure-form pure-form-aligned" action="year_report_generate.php" method="post" name="Export"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="module_name" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Exadmin">Download Excel</button>
                            </div>
                   </div>                    
            </form>  
<?php
}
else
{
	echo "No result";
}
	
}

?>		

	
	<!--END OF DIVISION-->
	</div>
	</div>
	