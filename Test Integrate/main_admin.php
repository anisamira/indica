<?php
include ('nav-noti.php');
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="img-list.css" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body >
<div class="wrapper">
    <!-- Sidebar Holder -->

    <!-- Page Content Holder -->
    <div id="content">

  

	<style>
.btnadmin {
    background-color: #034f84 ;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
	height: 100px;
	width: 145px;
	
}
</style>


	

<center><h5>Click Button below to view the Current Session Workbench</h5>	
<table>
<tr>
<td>
<form action="" name="Module1" method="post">
<button type="submit" class="btnadmin" name="go" >TNC Academic</button>
<input type="hidden" name="moduleid" value="M01"/> 
</form>
</td>
<td>
<form action="" name="Module2" method="post">
<button type="submit" class="btnadmin" name="go">Internalization and Branding TNC</button>
<input type="hidden" name="moduleid" value="M02"/> 
</form>
</td>
<td>
<form action="" name="Module3" method="post">
<button type="submit" class="btnadmin" name="go" >Excellent Research TNC</button>
<input type="hidden" name="moduleid" value="M03"/> 
</form>
</td>
</tr>
<tr>
<td>
<form action="" name="Module4" method="post">
<button type="submit" class="btnadmin" name="go">Student Life TNC</button>
<input type="hidden" name="moduleid" value="M04"/> 
</form>
</td>
<td>
<form action="" name="Module5" method="post">
<button type="submit" class="btnadmin" name="go" >Infrastructure Planning and Development</button>
<input type="hidden" name="moduleid" value="M05"/> 
</form>
</td>
<td>
<form action="" name="Module6" method="post">
<button type="submit" class="btnadmin" name="go" >Faculty and Staff Requirement</button>
<input type="hidden" name="moduleid" value="M06"/> 
</form>
</td>

<td></td>
<td>
<form action="" name="Module7" method="post">
<button type="submit" class="btnadmin" name="go">Financial</button>
<input type="hidden" name="moduleid" value="M07"/> 
</form>
</td>
<td></td>
</tr>
</table>
</center>
  
  
<?php

if (isset($_POST['go']))
{
	$moduleid=$_POST['moduleid'];
	
		$curyear=date ('Y');
    $date_now=date ("m/d/Y");
 $date_q= date ("06/30/Y");
 
 
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
					$sesi	=$_SESSION['session_name'];
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




<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Information')">Information</button>
  <button class="tablinks" onclick="openCity(event, 'Achievement')">Achievement</button>
  <button class="tablinks" onclick="openCity(event, 'Deliverables')">Deliverables</button>
   <button class="tablinks" onclick="openCity(event, 'Issue')">Issue</button>
  <button class="tablinks" onclick="openCity(event, 'Financial')">Financial</button>
  </div>

<div id="Information" class="tabcontent">

 <div class="table-responsive">
								<?php
									$x=1;
									$que="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
											JOIN reference ON reference.kpi_id=kpi.kpi_id 
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'";
									$results = mysql_query($que) or die(mysql_error()); 
									if (mysql_num_rows($results)>0)
									{
										$sql="SELECT * FROM goal 
											WHERE module_id='$moduleid'
											AND session_name='$sesi' 
											ORDER BY goal_id ASC";
										$result = mysql_query($sql) or die(mysql_error());?>

											
												 <table class="table table-hover">
													<tr style="font-size:14px">
														<th rowspan="2"></br>Goals</th>  
														<th rowspan="2"></br>Strategies</th>
														<th rowspan="2"></br>Action Plan</th>  
														<th rowspan="2"></br>KPI</th>
														<th rowspan="2"></br>Operation Definition</th>											
														<th colspan="5">TARGET</th>
														<th colspan="4">REFERENCE</th>
													</tr>
													<tr  style="font-size:14px"> 
															<?php
														$sql2="SELECT year_name from year where session_name='$sesi'";
														$result2=mysql_query($sql2) or die(mysql_error());
														while($row=mysql_fetch_array($result2))
														{
															$year_name	=$row['year_name']; ?>
															<th><?php echo $year_name;?></th>
															<?php
														}?>
														<th>Ownership</th> 
														<th>Data Source</th> 
														<th>Estimated Cost (RM)</th> 
														<th>Expected Financial Returns</th> 											
													</tr><?php
													while($row=mysql_fetch_array($result))
													{
														$goal_id	=$row['goal_id'];
														$goal_desc	=$row['goal_desc'];
														$sql3		="SELECT goal.goal_id, strategy.strategy_id, actionplan.actionplan_id, count(kpi.kpi_id) as count_str 
																		FROM goal JOIN strategy ON strategy.goal_id = goal.goal_id 
																		JOIN actionplan ON actionplan.strategy_id = strategy.strategy_id 
																		JOIN kpi ON kpi.actionplan_id = actionplan.actionplan_id 
																		WHERE goal.goal_id='$goal_id'";
														$result3 	= mysql_query($sql3) or die(mysql_error());
														$values 	= mysql_fetch_assoc($result3); 
														$count_str 	= $values['count_str']; ?>
														<tr style="font-size:13px">
															<td rowspan="<?php echo $count_str;?>"><?php echo $goal_desc;?></td><?php
															$sql4		="SELECT * FROM strategy 
																			WHERE goal_id='$goal_id'
																			ORDER BY strategy_id ASC";
															$result4 	= mysql_query($sql4) or die(mysql_error());
															while($row4=mysql_fetch_array($result4))
															{
																$strategy_id	=$row4['strategy_id'];
																$strategy_desc	=$row4['strategy_desc'];
																$sql5			="SELECT strategy.strategy_id, actionplan.actionplan_id, count(kpi.kpi_id) as count_act 
																					FROM strategy JOIN actionplan ON actionplan.strategy_id = strategy.strategy_id 
																					JOIN kpi ON kpi.actionplan_id = actionplan.actionplan_id 
																					WHERE strategy.strategy_id='$strategy_id'";
																$result5 	= mysql_query($sql5) or die(mysql_error());
																$value 		= mysql_fetch_assoc($result5); 
																$count_act 	= $value['count_act']; ?>
																<td rowspan="<?php echo $count_act;?>"><?php echo $strategy_desc;?></td>
																<?php
																	$sql6		="SELECT * FROM actionplan 
																					WHERE strategy_id='$strategy_id'
																					ORDER BY actionplan_id ASC";
																	$result6 	= mysql_query($sql6) or die(mysql_error());
																	while($row6=mysql_fetch_array($result6))
																	{
																		$actionplan_id	=$row6['actionplan_id'];
																		$actionplan_desc=$row6['actionplan_desc'];
																		$sql7			="SELECT actionplan.actionplan_id, count(kpi.kpi_id) as count_kpi 
																						FROM actionplan JOIN kpi ON kpi.actionplan_id = actionplan.actionplan_id 
																						WHERE actionplan.actionplan_id='$actionplan_id'";
																		$result7 	= mysql_query($sql7) or die(mysql_error());
																		$value 		= mysql_fetch_assoc($result7); 
																		$count_kpi 	= $value['count_kpi']; ?>
																		<td rowspan="<?php echo $count_kpi;?>"><?php echo $actionplan_desc;?></td>
																		<?php
																			$sql8		="SELECT kpi.*, target.*, baseline.*, reference.*  
																							FROM kpi JOIN target on target.kpi_id=kpi.kpi_id 
																							JOIN baseline on baseline.kpi_id=kpi.kpi_id
																							JOIN reference ON reference.kpi_id=kpi.kpi_id 
																							WHERE kpi.actionplan_id='$actionplan_id'";
																			$result8	= mysql_query($sql8) or die(mysql_error());
																			while($row8=mysql_fetch_array($result8))
																			{
																				$kpi_desc		=$row8['kpi_desc'];
																				$kpi_id			=$row8['kpi_id'];
																				$operation_def	=$row8['operation_def'];																		
																				$target1		=$row8['target1'];
																				$target2		=$row8['target2'];
																				$target3		=$row8['target3'];
																				$target4		=$row8['target4'];
																				$target5		=$row8['target5'];
																				$ownership		=$row8['ownership'];
																				$data_source	=$row8['data_source'];
																				$estimated_cost	=$row8['estimated_cost'];
																				$exp_fin_return	=$row8['exp_fin_return'];?>
																				<td><?php echo $kpi_desc;?></td>
																				<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
																				<td><?php echo $operation_def;?></td>											
																				<td><?php echo $target1;?></td>
																				<td><?php echo $target2;?></td>
																				<td><?php echo $target3;?></td>
																				<td><?php echo $target4;?></td>
																				<td><?php echo $target5;?></td>
																				<td><?php echo $ownership;?></td>
																				<td><?php echo $data_source;?></td>
																				<td><?php echo $estimated_cost;?></td>
																				<td><?php echo $exp_fin_return;?></td>
																				<tr style="font-size:13px"><?php $x++;
																			
																			}
																			
																	}
															}
													}?>
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
								<button type="submit" class="btn btn-primary" name="adminview">Download Excel</button>
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
						 <div class="table-responsive">
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
				</div>
						<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
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
						 <div class="table-responsive">
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
						</div>
								<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
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
						 <div class="table-responsive">
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
						</div>
			 	<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
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
						 <div class="table-responsive">
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
						</div>
						
			<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year3" value="<?php echo $year4;?>"/>
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
						 <div class="table-responsive">
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
						</div>
<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year3" value="<?php echo $year5;?>"/>
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

			<form class="pure-form pure-form-aligned" action="achieve_view_admin.php" method="post" name="upload_excel"   
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
						 <div class="table-responsive">
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
						 <div class="table-responsive">
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
						 <div class="table-responsive">
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
						 <div class="table-responsive">
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
						 <div class="table-responsive">
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
 <form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
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
<form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year2;?>"/>
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
<form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year3;?>"/>
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
<form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year4;?>"/>
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
<form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year1" value="<?php echo $year5;?>"/>
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
 <form class="pure-form pure-form-aligned" action="issue_view_admin.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="modulename" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export" value="export to excel">Download Excel</button>
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
	

<!-- this is the end of this doc  -->
<?php
// end 
}

?>
	



  </div>
</div>



</body>
</html>
