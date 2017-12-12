<!DOCTYPE html>
<html>
<head>

<?php
		include('nav-noti.php');
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
 $date_q= date ("06/30/Y");
 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
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
	
	?>

<div class="wrapper">


		<!-- !PAGE CONTENT! -->
			<div id="content">	



<br>
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
											WHERE goal.module_id='$module_id'
											AND goal.session_name='$session_name'";
									$results = mysql_query($que) or die(mysql_error()); 
									if (mysql_num_rows($results)>0)
									{
										$sql="SELECT * FROM goal 
											WHERE module_id='$module_id'
											AND session_name='$session_name' 
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
														$sql2="SELECT year_name from year where session_name='$session_name'";
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
												
										<?php
									}	
									else
									{?>
									
											<strong>No record found</strong> 
										</div><?php	
									}?>										
 
</div>


    </div>


</html>