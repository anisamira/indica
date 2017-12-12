

<body>
<?php
	include('style_dc.php');
	include('nav-noti.php');
	include('script.php');
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['session_name']	=$row['session_name'];
					}
	$session_name	=$_SESSION['session_name'];
	$sql2			= "SELECT * FROM form 
						WHERE session_name='$session_name' 
						AND module_id='$module_id' 
						AND form_status='pending'";
					$result2 = mysql_query($sql2) or die(mysql_error()); 
					while($row=mysql_fetch_array($result2))
					{
						$_SESSION['form_status']	=$row['form_status'];
						$_SESSION['form_id']		=$row['form_id'];
					}
	$form_status	=$_SESSION['form_status'];
	$form_id		=$_SESSION['form_id'];
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$kpi_id			=$_POST["kpi_id"];
			$goal_id		=$_POST["goal_id"];
			$strategy_id	=$_POST["strategy_id"];
			$actionplan_id	=$_POST["actionplan_id"];
			$kpi_id			=$_POST["kpi_id"];
			$goal_desc 		= mysql_real_escape_string($_POST["goal_desc"]); 
			$strategy_desc	= mysql_real_escape_string($_POST["strategy_desc"]); 
			$actionplan_desc= mysql_real_escape_string($_POST["actionplan_desc"]); 
			$kpi_desc 		= mysql_real_escape_string($_POST["kpi_desc"]); 
			$operation_def 	= mysql_real_escape_string($_POST["operation_def"]); 	
			$target1 		= mysql_real_escape_string($_POST["target1"]); 
			$target2 		= mysql_real_escape_string($_POST["target2"]); 
			$target3 		= mysql_real_escape_string($_POST["target3"]); 
			$target4 		= mysql_real_escape_string($_POST["target4"]); 
			$target5 		= mysql_real_escape_string($_POST["target5"]); 	 	
			$ownership 		= mysql_real_escape_string($_POST["ownership"]); 	
			$data_source 	= mysql_real_escape_string($_POST["data_source"]); 	
			$estimated_cost = mysql_real_escape_string($_POST["estimated_cost"]); 	
			$exp_fin_return = mysql_real_escape_string($_POST["exp_fin_return"]); 
			$sql1			="UPDATE goal
							SET goal_desc='$goal_desc'
							WHERE goal_id='$goal_id'";
			$result1		=mysql_query($sql1) or die (mysql_error());
			
			$sql2			="UPDATE strategy
							SET strategy_desc='$strategy_desc'
							WHERE strategy_id='$strategy_id'";
			$result2		=mysql_query($sql2) or die (mysql_error());
			
			$sql3			="UPDATE actionplan
							SET actionplan_desc='$actionplan_desc'
							WHERE actionplan_id='$actionplan_id'";
			$result3		=mysql_query($sql3) or die (mysql_error());
			
			$sql4			="UPDATE kpi
							SET kpi_desc='$kpi_desc', operation_def='$operation_def'
							WHERE kpi_id='$kpi_id'";
			$result4		=mysql_query($sql4) or die (mysql_error());
			
			$sql6			="UPDATE target
							SET target1='$target1', target2='$target2', target3='$target3', target4='$target4', target5='$target5'
							WHERE kpi_id='$kpi_id'";
			$result6		=mysql_query($sql6) or die (mysql_error());
			
			$sql7			="UPDATE reference
							SET ownership='$ownership', data_source='$data_source', estimated_cost='$estimated_cost', exp_fin_return='$exp_fin_return'
							WHERE kpi_id='$kpi_id'";
			$result7		=mysql_query($sql7) or die (mysql_error());
		}
								
								
	
?>
	<div class="wrapper">
			<div id="content">
				<div style="width:100%; overflow:scroll; position:relative;"> 
					<?php
								$x=1;
								$sql3 = "SELECT master_status.*, goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
										FROM goal 
										JOIN strategy ON strategy.goal_id=goal.goal_id 
										JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
										JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
										JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
										JOIN target ON target.kpi_id=kpi.kpi_id 
										JOIN reference ON reference.kpi_id=kpi.kpi_id 
										JOIN master_status ON master_status.kpi_id=kpi.kpi_id
										WHERE goal.module_id='$module_id'
										AND goal.session_name='$session_name'
										AND master_status.form_id='$form_id'
										AND master_status.action_type='reject'";
									$result3 = mysql_query($sql3) or die(mysql_error()); 
									if (mysql_num_rows($result3)>0)
									{	?>
					
										<table class="table table-hover"> 
											<tr style="font-size:14px">
												<th>No.</th>
												<th>Goals</th>  
												<th>Strategies</th>
												<th>Action Plan</th>  
												<th>KPI</th>
												<th>Operation Definition</th>
												<?php
														$sql="SELECT year_name from year where session_name='$session_name'";
														$result=mysql_query($sql) or die(mysql_error());
														while($row=mysql_fetch_array($result))
														{
															$year_name	=$row['year_name']; ?>
															<th>Target <?php echo $year_name;?></th>
															<?php
														}?>
												<th>Ownership</th> 
												<th>Data Source</th> 
												<th>Estimated Cost (RM)</th> 
												<th>Expected Financial Returns</th> 	
												<th>Status</th>
												<th>Comment</th>
												<th>Action</th>
											</tr> <?php
											
														while($row=mysql_fetch_array($result3))
														{
															$goal_desc		=$row['goal_desc'];
															$strategy_desc	=$row['strategy_desc'];
															$actionplan_desc=$row['actionplan_desc'];
															$goal_id		=$row['goal_id'];
															$strategy_id	=$row['strategy_id'];
															$actionplan_id	=$row['actionplan_id'];
															$kpi_id			=$row['kpi_id'];
															$base_id		=$row['base_id'];
															$kpi_desc		=$row['kpi_desc'];
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
															$action_type	=$row['action_type'];
															$action_comment	=$row['action_comment'];?>
															
															<tr style="font-size:13px">
																<td><?php echo $x;?></td>
																<td><?php echo $goal_desc;?></textarea></td>
																<td><?php echo $strategy_desc;?></td>
																<td><?php echo $actionplan_desc;?></td>
																<td><?php echo $kpi_desc;?></td>
																<td><?php echo $operation_def;?></td>
																<td><?php echo $target1;?></td>
																<td><?php echo $target2;?></td>
																<td><?php echo $target3;?></input></td>
																<td><?php echo $target4;?></td>
																<td><?php echo $target5;?></td>
																<td><?php echo $ownership;?></td>
																<td><?php echo $data_source;?></td>
																<td><?php echo $estimated_cost;?></td>
																<td><?php echo $exp_fin_return;?></td>
																<td><?php echo $action_type;?>ed</td>
																<td><?php echo $action_comment;?></td>
																<td><button data-toggle="modal" data-target="#<?php echo $kpi_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
																	<div class="modal fade" id="<?php echo $kpi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																					<h4 class="modal-title" id="<?php echo $kpi_id;?>">Edit Target </h4>
																				</div>
																				<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post" class="pure-form pure-form-aligned">
																					<div class="modal-body">
																						<div class="row" style="margin:10px;">
																							<input type="hidden" name="goal_id" value="<?php echo $goal_id;?>"></input>
																							<input type="hidden" name="strategy_id" value="<?php echo $strategy_id;?>"></input>
																							<input type="hidden" name="actionplan_id" value="<?php echo $actionplan_id;?>"></input>
																							<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"></input>
																							<input type="hidden" name="base_id" value="<?php echo $base_id;?>"></input>
																								Goal : <textarea class="form-control" name="goal_desc" required><?php echo $goal_desc;?></textarea></br>	
																								Strategy : <textarea class="form-control" name="strategy_desc" required><?php echo $strategy_desc;?></textarea></br>	
																								Actionplan : <textarea class="form-control" name="actionplan_desc" required><?php echo $actionplan_desc;?></textarea></br>	
																								KPI : <textarea class="form-control" name="kpi_desc" required><?php echo $kpi_desc;?></textarea></br>
																								Operation Definition : <textarea class="form-control" name="operation_def" required><?php echo $operation_def;?></textarea></br>																			
																								Target 1 : <textarea class="form-control" name="target1" required><?php echo $target1;?></textarea></br>	
																								Target 2 : <textarea class="form-control" name="target2" required><?php echo $target2;?></textarea></br>	
																								Target 3 : <textarea class="form-control" name="target3" required><?php echo $target3;?></textarea></br>	
																								Target 4 : <textarea class="form-control" name="target4" required><?php echo $target4;?></textarea></br>	
																								Target 5 : <textarea class="form-control" name="target5" required><?php echo $target5;?></textarea></br>	
																								Ownership : <textarea class="form-control" name="ownership" required><?php echo $ownership;?></textarea></br>	
																								Data Source : <textarea class="form-control" name="data_source" required><?php echo $data_source;?></textarea></br>	
																								Estimated Cost (RM) : <textarea class="form-control" name="estimated_cost" required><?php echo $estimated_cost;?></textarea></br>	
																								Expected Financial Return : <textarea class="form-control" name="exp_fin_return" required><?php echo $exp_fin_return;?></textarea></br>	
																						</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																						<input type="submit" class="btn-u btn-u-primary" name="submit_updated" value="Save"></input>
																					</div>
																				</form>
																				
																			</div>
																		</div>
																	</div>
															</tr>
															<?php $x++;
														}?>
													</table>
												<div style="margin:20px;">
													<form action="main_dc.php" method="post">
														<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
														<input type="submit" name="submit_updated" value="Submit" onclick="return confirm('Are you sure you want to submit this form?');" /></input>
													</form>
												</div><?php
									}
									else 
									{ ?>
										<div class="alert alert-warning alert-dismissable fade in">
											<meta http-equiv="refresh" content="1;url=main_dc.php" />
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>No records need to be updated</strong> Redirecting in 1 seconds...
										</div><?php	
									}?>
							
										
						
					
				</div>
			</div>
	</div>


	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>




