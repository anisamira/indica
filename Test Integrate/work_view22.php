<!DOCTYPE html>
<html>
<head>

<?php
	include('sidebar.php');
						
	
if (!isset($_GET['moduleid'])){
?>	
Sorry: Unable to find the module.
<?php
  }
else{
	
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];

	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
 $date_q= date ("06/30/Y");
 
 
 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	$sql			="SELECT * FROM session where session_name='$sesi'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
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
	
				
	 $sql			= "SELECT * FROM module WHERE module_id='$moduleid'";
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
	
	?>

<div class="wrapper">



			<div id="content">	


<head>
<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ccc; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}

body {font-family: Arial;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}


</style>
</head>
<body>

<h2>Workbench <?php echo $module_name;?> <?php echo $sesi?></h2>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Information')">Information</button>
  <button class="tablinks" onclick="openCity(event, 'Achievement')">Achievement</button>
  <button class="tablinks" onclick="openCity(event, 'Deliverables')">Deliverables</button>
   <button class="tablinks" onclick="openCity(event, 'Issue')">Issue</button>
  <button class="tablinks" onclick="openCity(event, 'Financial')">Financial</button>
  </div>

<div id="Information" class="tabcontent">


										<?php
										$x=1;
										$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* , form.*
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
											JOIN reference ON reference.kpi_id=kpi.kpi_id
                                            JOIN form ON form.module_id=goal.module_id											
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											AND form.form_status='approved' ";
											$result = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($result)>0){				

?>


<div class="table-responsive">  
								   <table class="table table-hover"> 
										<tr>
											<th></th>
											<th colspan="5"> </br> </th>						
											<th colspan="2">BASELINE</th>
											<th colspan="5">TARGET</th>
											<th colspan="4">REFERENCE</th>
										</tr>
										<tr> 
											<th>No.</th>  
											<th>Goals</th>  
											<th>Strategies</th>
											<th>Action Plan</th>  
											<th>KPI</th>
											<th>Operation Definition</th>
											<th>Achievement 2014</th>  
											<th>Achievement 2015</th>
											<th>Target <?=$year1?></th>  
											<th>Target <?=$year2?></th>  
											<th>Target <?=$year3?></th>  
											<th>Target <?=$year4?></th>  
											<th>Target <?=$year5?></th>
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
												$baseline1		=$row['baseline1'];
												$baseline2		=$row['baseline2'];
												$target1		=$row['target1'];
												$target2		=$row['target2'];
												$target3		=$row['target3'];
												$target4		=$row['target4'];
												$target5		=$row['target5'];
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
													<td><?php echo $baseline1;?></td>
													<td><?php echo $baseline2;?></td>
													<td><?php echo $target1;?></td>
													<td><?php echo $target2;?></td>
													<td><?php echo $target3;?></td>
													<td><?php echo $target4;?></td>
													<td><?php echo $target5;?></td>
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
	 
 <form class="pure-form pure-form-aligned" action="work_view.php" method="post" name="Export"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="module_name" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export">Download Excel</button>
                            </div>
                   </div>                    
            </form>  
<?php
}
else
{
	echo "No result";
}

											?>
										

  
</div>

<div id="Achievement" class="tabcontent">

<button class="accordion"><?=$year1?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 
 <?php
	
							
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						AND achievement.ach_status='approve'
						AND year.year_name='$year1'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
						<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year1;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export1" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
				   </form> 
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				
					
					
					<?php
					}	
				    
						?>



</div>

 

<button class="accordion"><?=$year2?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php
	
							
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						AND achievement.ach_status='approve'
						AND year.year_name='$year2'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
							
							<?php
						$x++;
						}
						?>
						</table>
					<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year2" value="<?php echo $year2;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export2" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
				   </form> 	
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
					

	
	
					
					<?php
					}	
				    
						?>


						</div> 

						
<button class="accordion"><?=$year3?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 
 <?php
	
							
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						AND achievement.ach_status='approve'
						AND year.year_name='$year3'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
					<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year3" value="<?php echo $year3;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export3" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
				   </form> 	
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				
					
					
					<?php
					}	
				    
						?>



</div>


<button class="accordion"><?=$year4?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 
 <?php
	
							
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						AND achievement.ach_status='approve'
						AND year.year_name='$year4'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
						
						<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year4" value="<?php echo $year4;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export4" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
				   </form> 
						
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				

					
					<?php
					}	
				    
						?>



</div>


<button class="accordion"><?=$year5?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 
 <?php
	
							
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						AND achievement.ach_status='approve'
						AND year.year_name='$year5'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
						
<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year5" value="<?php echo $year5;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export5" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
				   </form> 
						
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
			
					
					<?php
					}	
				    
						?>



			
</div>

						
						<form class="pure-form pure-form-aligned" action="achieve_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export" value="export to excel">Download All Record:Excel</button>
                            </div>
                   </div>                    
            </form>  

</div>

<div id="Deliverables" class="tabcontent">

 
<button class="accordion">Evidence on <?=$year1?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year1'
						ORDER BY evidence.ach_id AND achievement.year_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-hover">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>
								
							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					<?php
					}	
				    
						?>
					

</table> 


</div>
					

 
<button class="accordion">Evidence on <?=$year2?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>

<div class="panel">
 

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year2'
						ORDER BY evidence.ach_id AND achievement.year_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-hover">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>
							
							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					<?php
					}	
				    
						?>
					

</table> 


</div>					


<button class="accordion">Evidence on <?=$year3?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year3'
						ORDER BY evidence.ach_id AND achievement.year_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-hover">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>
								
							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					<?php
					}	
				    
						?>
					

</table> 


</div>
					
<button class="accordion">Evidence on <?=$year4?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year4'
						ORDER BY evidence.ach_id AND achievement.year_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-hover">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>
								
							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					<?php
					}	
				    
						?>
					

</table> 


</div>
					
<button class="accordion">Evidence on <?=$year5?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">
 

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year5'
						ORDER BY evidence.ach_id AND achievement.year_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-hover">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>
								

							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					<?php
					}	
				    
						?>
					

</table> 



</div>
					
					
					
</div>

<div id="Issue" class="tabcontent">
  
<button class="accordion">ISSUE on <?=$year1?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year1'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                 
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div style="width:100%; overflow:scroll; position:relative;"> 					
						<table class="table table-hover">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year1;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export1" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form> 
<?php					
					}


					
					else
					{
					
						echo "No issue is recorded";
							
						?>

<?php
					
					}
						
						?>

</div>
					

<button class="accordion">ISSUE on <?=$year2?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year2'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-hover">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year2" value="<?php echo $year2;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export2" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form> 
<?php					
					}


					
					else
					{
					
					echo "No issue is recorded";
							
						?>

					
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year3?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year3'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-hover">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year3" value="<?php echo $year3;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export3" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form> 
<?php					
					}


					
					else
					{
					
						echo "No issue is recorded";
							
						?>

					
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year4?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year4'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-hover">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year4" value="<?php echo $year4;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export4" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form> 
<?php					
					}


					
					else
					{
					
						echo "No issue is recorded";
							
						?>

					
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year5?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year5'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-hover">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year5" value="<?php echo $year5;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export5" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form> 

<?php					
					}


					
					else
					{
					
					echo "No issue is recorded";
							
						?>

					
<?php
					
					}
						
						?>

</div>
         
<form class="pure-form pure-form-aligned" action="issue_view2.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export" value="export to excel">Download All Issue:Excel</button>
                            </div>
                   </div>                    
            </form>  

</div>
<div id="Financial" class="tabcontent">
  
  
<?php  
  
										$sql="
											SELECT SUM(reference.estimated_cost) AS cost, SUM(reference.exp_fin_return) AS income
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
                                            JOIN form ON form.module_id=goal.module_id
											JOIN reference ON reference.kpi_id=kpi.kpi_id
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											";
											$result = mysql_query($sql) or die(mysql_error()); 
											while($row=mysql_fetch_array($result))
											{
											
											$cost=$row['cost'];
											$return=$row['income'];

											?>
											
											
												<div class="card">
												  <div class="card-header">
													Total Estimated Cost
												  </div>
												  <div class="card-block">
													<h4 class="card-title">RM  <?php echo $cost;?></h4>
												  </div>
												</div>
											<div class="card">
												  <div class="card-header">
													Total Expected Return
												  </div>
												  <div class="card-block">
													<h4 class="card-title">RM  <?php echo $return;?></h4>
												  </div>
												</div>
											
											
										<?php	
											}
						
?>
  
</div>



 
</div>

</div>

	
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
	

<!-- this is the end of this doc  >
<?php
// end 
}

?>