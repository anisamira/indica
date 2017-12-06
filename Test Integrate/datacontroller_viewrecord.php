
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

?>
	<div class="wrapper">
			<div id="content">					
				<div style="width:100%; overflow:scroll; position:relative;"">  
					
					<?php
							$x=1;
							$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
								FROM goal 
								JOIN strategy ON strategy.goal_id=goal.goal_id 
								JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
								JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
								JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
								JOIN target ON target.kpi_id=kpi.kpi_id 
								JOIN reference ON reference.kpi_id=kpi.kpi_id 
								WHERE goal.module_id='$module_id'
								AND goal.session_name='$session_name'";
								$result3 = mysql_query($sql) or die(mysql_error()); 
								if (mysql_num_rows($result3)>0)
								{?>
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
											<?php
												$sql="SELECT year_name from year where session_name='$session_name'";
												$result=mysql_query($sql) or die(mysql_error());
												while($row=mysql_fetch_array($result))
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
											while($row=mysql_fetch_array($result3))
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
								
											
												<tr style="font-size:13px">  
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
											} ?>
									</table>
									<input type="button" VALUE="Back" onClick="history.go(-1);"></input>
									<?php
								}
								else 
									{ ?>
										<div class="alert alert-warning alert-dismissable fade in">
											<meta http-equiv="refresh" content="1;url=datacontroller_viewupdated.php" />
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>No records to be viewed</strong> Redirecting in 1 seconds...
										</div><?php	
									}?>
													
				</div>
			</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	<script type="text/javascript">
	
				function deletegoal(id)
					{
						if(confirm('Sure To Remove This Goal?'))
						{
							window.location.href='datacontroller_goal.php?deletegoal='+id;
						return true;
						}
						
					}
					
				function deletestrategy(id)
					{
						if(confirm('Sure To Remove This Goal?'))
						{
							window.location.href='datacontroller_goal.php?deletestrategy='+id;
						return true;
						}
						
					}
				</script>
</body>
</html>
