
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:20px;">
			<!-- Tabs -->
				<div class="tab-v1">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#goal" data-toggle="tab">Goals</a></li>
						<li><a href="#strategy" data-toggle="tab">Strategies</a></li>
						<li><a href="#action" data-toggle="tab">Action Plan</a></li>
						<li><a href="#kpi" data-toggle="tab">KPI</a></li>
						<li><a href="#op_def" data-toggle="tab">Baseline</a></li>
						<li><a href="#target" data-toggle="tab">Target</a></li>
						<li><a href="#reference" data-toggle="tab">Reference</a></li>
						<li><a href="#submit_record" data-toggle="tab">Submit Records</a></li>
					</ul>
					
					<div class="tab-content"> 
						<!--GOAL FORM-->
						<div class="tab-pane fade in active" id="goal">
							<form action="datacontroller_goal.php#strategy" method="post">
								Insert Goals :</br><input class="form-control" type="text" name="goal[]" required></input></br>
								<div class="input_fields_wrap">	</div>
								<button class="add_field_button">Add More Goals</button>
								<input type="submit" name="submit_goal" value="Next" style="float: right;"></input>	
							</form></br>
						</div>
						<!-- END GOAL FORM -->
						
						<!--STRATEGY FORM-->
						<div class="tab-pane fade" id="strategy">
						<?php
							if(isset($_POST['submit_goal']))
								{		
									foreach ($_POST['goal'] as $key=>$value)
										{
											$sql="INSERT INTO goal (module_id,session_name,goal_desc) VALUES ('$module_id','$session_name','$value')";
											$result = mysql_query($sql) or die(mysql_error());  									   
											if (false === $result)
												{
													echo mysql_error();
												}
										}
								} ?>
							<form action="datacontroller_goal.php#action" method="post">
								<table class="table table-bordered"> 
									<col width="50">
									<col width="190">
									<tr>
										<th>Goal</th>
										<th>Strategy</th>
									</tr>
									<?php
									$x = 1;
									$sql="SELECT * FROM goal 
											WHERE module_id='$module_id' 
											AND session_name='$session_name' 
											ORDER BY goal_id ASC";
									$result = mysql_query($sql) or die(mysql_error()); 
									while($row=mysql_fetch_array($result))
									{
										$goal_id=$row['goal_id'];
										$goal_desc=$row['goal_desc'];?>
										
										<tr>
											<td><?php echo $goal_desc;?><input class="form-control" type="hidden" name="goal_id<?php echo $x;?>" value="<?php echo $goal_id;?>"></input></td>
											<td><input class="form-control" type="text" name="strategy<?php echo $x;?>[]"></input></br>
												<div class="wrapstrategy<?php echo $x;?>"></div>
												<button class="btn add_strategy<?php echo $x;?>" style="float: right;">+</button>
											</td>
										</tr>
										<?php $x++;										
									}?>
								</table></br>
								<input type="submit" name="submit_strategy" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>
						</div> 
						<!--END STRATEGY FORM-->
						
						<!-- ACTION FORM -->
						<div class="tab-pane fade" id="action"> 
						<?php
							if(isset($_POST['submit_strategy']))
							{			
								for($y=1; $y<=30; $y++)
								{
									if (empty($_POST["strategy".$y]))
									{
										$error = 1;
									}
									else
									{										
										foreach ($_POST['strategy'.$y] as $key=>$value)
										{										
											$goal_id=$_POST['goal_id'.$y];
											$sql="INSERT INTO strategy (goal_id, strategy_desc) VALUES ('$goal_id','$value')";
											$result = mysql_query($sql) or die(mysql_error());  										   
											if (false === $result) 
											{
												echo mysql_error();
											}
										}										
									}	
								}		
							}?>
							<form action="datacontroller_goal.php#kpi" method="post">
								<table class="table table-bordered"> 
									<col width="30">
									<col width="30">
									<col width="200">
												<tr>
													<th>Goal</th>
													<th>Strategy</th>
													<th>Action Plan</th>
												</tr>
								<?php
									$x=1;
									$sql="SELECT goal.*,strategy.* 
											FROM goal 
											JOIN strategy 
											ON strategy.goal_id=goal.goal_id
											WHERE goal.module_id='$module_id'
											AND goal.session_name='$session_name' 
											ORDER BY strategy.strategy_id ASC";
									$result = mysql_query($sql) or die(mysql_error()); 
									while($row=mysql_fetch_array($result))
									{
										$goal_id		=$row['goal_id'];
										$goal_desc		=$row['goal_desc'];
										$strategy_id	=$row['strategy_id'];
										$strategy_desc	=$row['strategy_desc'];?>
										<tr>
											<td><?php echo $goal_desc;?></td>
											<td><?php echo $strategy_desc;?>
												<input type="hidden" name="strategy_id<?php echo $x;?>" value="<?php echo $strategy_id;?>"></input></td>
											<td><input class="form-control" type="text"  name="action<?php echo $x;?>[]"></input></br>
												<div class="wrapaction<?php echo $x;?>"></div>
												<button class="btn add_action<?php echo $x;?>" style="float: right;">+</button>
											</td>
										</tr>
										<?php $x++;	
									} ?>									
									</table>	
								</br><input type="submit" name="submit_action" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>		
						</div>
						<!--END ACTION FORM-->
						
						<!-- KPI FORM -->
						<div class="tab-pane fade" id="kpi">
							<?php
							if(isset($_POST['submit_action']))
							{
								for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["action".$y]))
										{
											$error = 1;
										}
										else
										{													
											foreach ($_POST['action'.$y] as $key=>$value)
											{
												$strategy_id=$_POST['strategy_id'.$y];
												$sql="INSERT INTO actionplan (strategy_id, actionplan_desc) VALUES ('$strategy_id','$value')";
												$result = mysql_query($sql) or die(mysql_error());  
														   
												if (false === $result) 
												{
													echo mysql_error();
												}
											}														
										}	
								}
							}
							?>
							<form action="datacontroller_goal.php#op_def" method="post">
								<table class="table table-bordered"> 
									<col width="30">
									<col width="30">
									<col width="30">
									<col width="200">
												<tr>
													<th>Goal</th>
													<th>Strategy</th>
													<th>Action Plan</th>
													<th>KPI</th>
												</tr>
								<?php

									$x = 1;
									$sql="SELECT goal.*,strategy.*, actionplan.* 
										FROM goal 
										JOIN strategy 
										ON strategy.goal_id=goal.goal_id 
										JOIN actionplan 
										ON actionplan.strategy_id=strategy.strategy_id 
										WHERE goal.module_id='$module_id' 
										AND goal.session_name='$session_name'
										ORDER BY actionplan.actionplan_id ASC";
									$result = mysql_query($sql) or die(mysql_error()); 
									while($row=mysql_fetch_array($result))
									{
										$goal_id			=$row['goal_id'];
										$goal_desc			=$row['goal_desc'];
										$strategy_id		=$row['strategy_id'];
										$strategy_desc		=$row['strategy_desc'];
										$actionplan_id		=$row['actionplan_id'];
										$actionplan_desc	=$row['actionplan_desc']; ?>
										<tr>
											<td><?php echo $goal_desc;?></td>
											<td><?php echo $strategy_desc;?></td>
											<td><?php echo $actionplan_desc;?>
													<input type="hidden" name="actionplan_id<?php echo $x;?>" value="<?php echo $actionplan_id;?>"></input></td>
											<td><input class="form-control" type="text"  name="kpi<?php echo $x;?>[]"></input></br>
												<div class="wrapkpi<?php echo $x;?>"></div>
												<button class="btn add_kpi<?php echo $x;?>" style="float: right;">+</button>
											</td>
										</tr>
										<?php $x++;
									} ?>
								</table>	
								</br><input type="submit" name="submit_kpi" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>									
						</div>
						<!-- END KPI FORM -->
						
						<!-- BASELINE / OPERATION DEFINITION FORM -->
						<div class="tab-pane fade" id="op_def">
							<?php
							if(isset($_POST['submit_kpi']))
							{
								for($y=1; $y<=30; $y++)
								{
									if (empty($_POST["kpi".$y]))
									{
										$error = 1;
									}
									else
									{									
										foreach ($_POST['kpi'.$y] as $key=>$value)
										{
										
											$actionplan_id=$_POST['actionplan_id'.$y];
											$sql="INSERT INTO kpi (actionplan_id, kpi_desc,session_name) VALUES ('$actionplan_id','$value','$session_name')";
											$result = mysql_query($sql) or die(mysql_error());  
										   
											if (false === $result) 
											{
												echo mysql_error();
											}
										}											
									}	
								}		
							}	
							?>
							<form action="datacontroller_goal.php#target" method="post">
								<table class="table"> 
									<tr>
										<th colspan="2"></th>
										<th colspan="2">Baseline</th>
									</tr>
									<tr>
										<th>Key Performance Indicator (KPI)</th>
										<th>Operation Definition</th>
										<th>Achievement 2014</th>
										<th>Achievement 2015</th>
									</tr>										
									<?php
									$x=1;
									$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*
										FROM goal 
										JOIN strategy ON strategy.goal_id=goal.goal_id 
										JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
										JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
										WHERE goal.module_id='$module_id'
										AND goal.session_name='$session_name'
										ORDER BY kpi_id ASC";
									$result = mysql_query($sql) or die(mysql_error()); 
									while($row=mysql_fetch_array($result))
									{
										$kpi_id		=$row['kpi_id'];
										$kpi_desc	=$row['kpi_desc'];?>
										<tr>  
											<td><?php echo $kpi_desc;?>	
												<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
											</td>
											<td><input class="form-control" type="text" name="operation_def<?php echo $x;?>"/></td>
											<td><input class="form-control" type="text" name="baseline1<?php echo $x;?>"/></td>
											<td><input class="form-control" type="text" name="baseline2<?php echo $x;?>"/></td>
										</tr> <?php 
										$x++;
									} ?>	
								</table>
							<input type="submit" name="submit_op_def" value="Next" style="float: right;"></input>
							<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
						</form>
						</div>
						<!-- END BASELINE / OPERATION DEFINITION FORM-->
						
						<!-- TARGET FORM-->
						<div class="tab-pane fade" id="target">
							<?php
							if(isset($_POST['submit_op_def']))
								{
									for($y=1; $y<=50; $y++)
									{							
										if (empty($_POST["kpi".$y]))
										{
											$error = 1;
										}
										else
										{										
												$value			=$_POST['kpi'.$y];
												$operation_def	=$_POST['operation_def'.$y];
												$baseline1		=$_POST['baseline1'.$y];
												$baseline2		=$_POST['baseline2'.$y];
												
												$sql1="UPDATE kpi SET operation_def='$operation_def' WHERE kpi_id='$value'";
												$result = mysql_query($sql1) or die(mysql_error());  											   
												if (false === $result) 
												{
													echo mysql_error();
												}	
												
												$sql2="INSERT INTO baseline (baseline1, baseline2, kpi_id) VALUES ('$baseline1','$baseline2','$value')";
												$result2 = mysql_query($sql2) or die(mysql_error());  											   
												if (false === $result2) 
												{
													echo mysql_error();
												}											
										}	
									}		
								}
							?>
							<form action="datacontroller_goal.php#reference" method="post">
								<table id ="maintable" class="table"> 
									<tr>
										<th colspan="2"></th>
										<th colspan="5">Target</th>
									</tr>
									<tr>
										<th>Key Performance Indicator (KPI)</th>
										<?php
										$sql="SELECT year_name from year where session_name='$session_name'";
										$result=mysql_query($sql) or die(mysql_error());
										while($row=mysql_fetch_array($result))
										{
											$year_name	=$row['year_name']; ?>
											<th><?php echo $year_name;?></th>
											<?php
										}?>
									</tr>
									
									<?php
									$x=1;
								$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*
									FROM goal 
									JOIN strategy ON strategy.goal_id=goal.goal_id 
									JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
									JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
									WHERE goal.module_id='$module_id'
									AND goal.session_name='$session_name'
									ORDER BY kpi_id ASC";
								$result = mysql_query($sql) or die(mysql_error()); 
								while($row=mysql_fetch_array($result))
								{
									$kpi_id		=$row['kpi_id'];
									$kpi_desc	=$row['kpi_desc'];?>
											<tr>  
												<td><?php echo $kpi_desc;?></td>
												<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input></td>
												<td><input class="form-control" type="text" name="target1<?php echo $x;?>"/></td>
												<td><input class="form-control" type="text" name="target2<?php echo $x;?>"/></td>
												<td><input class="form-control" type="text" name="target3<?php echo $x;?>"/></td>
												<td><input class="form-control" type="text" name="target4<?php echo $x;?>"/></td>
												<td><input class="form-control" type="text" name="target5<?php echo $x;?>"/></td>
											</tr><?php
										$x++;							
									}?>								
								</table>
								<input type="submit" name="submit_target" value="Next" style="float: right;"></input>
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>
						</div>
						<!-- END TARGET FORM-->
						
						<!-- REFERENCE FORM-->
						<div class="tab-pane fade" id="reference">
							<?php
							if(isset($_POST['submit_target']))
							{
								for($y=1; $y<=50; $y++)
								{							
									if (empty($_POST["kpi".$y]))
									{
										$error = 1;
									}
									else
									{									
											$value=$_POST['kpi'.$y];
											$target1	=$_POST['target1'.$y];
											$target2	=$_POST['target2'.$y];
											$target3	=$_POST['target3'.$y];
											$target4	=$_POST['target4'.$y];
											$target5	=$_POST['target5'.$y];
											
											$sql="INSERT INTO target (kpi_id, target1, target2, target3, target4, target5) VALUES ('$value','$target1','$target2','$target3', '$target4', '$target5')";
											$result = mysql_query($sql) or die(mysql_error());  
										   
											if (false === $result) 
											{
												echo mysql_error();
											}											
									}	
								}		
							}
							?>
							<form action="datacontroller_goal.php#submit" method="post">
							  <table id ="maintable" class="table"> 
									<tr>
										<th></th>
										<th colspan="4">References</th>
									</tr>
									<tr>
										<th>Key Performance Indicator (KPI)</th>
										<th>Ownership</th>
										<th>Data Source</th>
										<th>Estimated Cost (RM)</th>
										<th>Expected Financial Return</th>
									</tr>
									
									<?php
									$x=1;
								$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*
									FROM goal 
									JOIN strategy ON strategy.goal_id=goal.goal_id 
									JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
									JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
									WHERE goal.module_id='$module_id'
									AND goal.session_name='$session_name'
									ORDER BY kpi_id ASC";
								$result = mysql_query($sql) or die(mysql_error()); 
								while($row=mysql_fetch_array($result))
								{
									$kpi_id		=$row['kpi_id'];
									$kpi_desc	=$row['kpi_desc'];?>
											<tr>  
												<td><?php echo $kpi_desc;?></td>
													<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input></td>
												<td><input class="form-control" type="" name="ownership<?php echo $x;?>"/></td>
												<td><input class="form-control" type="" name="data_source<?php echo $x;?>"/></td>
												<td><input class="form-control" type="" name="estimated_cost<?php echo $x;?>"/></td>
												<td><input class="form-control" type="" name="exp_fin_return<?php echo $x;?>"/></td>
											</tr><?php
									$x++;				
								}?>								
								</table>
								<input type="submit" name="submit_reference" value="Next" style="float: right;"></input>
								<input type="button" VALUE="Back" onClick="history.go(-1);"disabled></input>
							</form>
						</div>
						<!-- END REFERENCE FORM-->
						
						<!-- SUBMIT RECORDS-->
						<div class="tab-pane fade" id="submit_record">
							<?php
							if(isset($_POST['submit_reference']))
							{
								for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["kpi".$y]))
									{
										$error = 1;
									}
									else
									{									
										$value			=$_POST['kpi'.$y];
										$ownership		=$_POST['ownership'.$y];
										$data_source	=$_POST['data_source'.$y];
										$estimated_cost	=$_POST['estimated_cost'.$y];
										$exp_fin_return	=$_POST['exp_fin_return'.$y];
											
										$sql="INSERT INTO reference (kpi_id, ownership, data_source, estimated_cost, exp_fin_return) VALUES ('$value','$ownership','$data_source','$estimated_cost', '$exp_fin_return')";
										$result = mysql_query($sql) or die(mysql_error());  
										   
										if (false === $result) 
										{
											echo mysql_error();
										}						
									}	
								}		
							}
							?>
							<div class="table-responsive">  
								<form action="main_dc.php" method="post">
								   <table class="table table-bordered"> 
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
											<th>Target 2016</th>  
											<th>Target 2017</th>  
											<th>Target 2018</th>  
											<th>Target 2019</th>  
											<th>Target 2020</th>
											<th>Ownership</th> 
											<th>Data Source</th> 
											<th>Estimated Cost (RM)</th> 
											<th>Expected Financial Returns</th> 											
										</tr>
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
											$result = mysql_query($sql) or die(mysql_error()); 
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
											} ?>
									</table>								
									<div style="margin:20px;">
										<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
										<input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to submit this form?');" /></input>
									</div>
								</form>								
							</div>
						</div>
					</div>
					<!-- END SUBMIT RECORDS-->
						
				</div>
			</div>
		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
