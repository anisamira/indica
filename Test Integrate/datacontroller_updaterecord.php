

<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
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
	
?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
				<div class="table-responsive"> 
					<form action="" method="post" enctype="multipart/form-data">
						<table class="table table-bordered"> 
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
								<th>Status</th>
								<th>Comment</th>
							</tr>
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
									while($row=mysql_fetch_array($result3))
									{
										$goal_desc		=$row['goal_desc'];
										$strategy_desc	=$row['strategy_desc'];
										$actionplan_desc=$row['actionplan_desc'];
										$kpi_id			=$row['kpi_id'];
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
										
										<tr>
											<td><?php echo $x;?></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $goal_desc;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $strategy_desc;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $actionplan_desc;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $kpi_desc;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $operation_def;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $baseline1;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $baseline2;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $target1;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $target2;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $target3;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $target4;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $target5;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $ownership;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $data_source;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $estimated_cost;?>"></input></td>
											<td><input class="form-control" type="text" name="" value="<?php echo $exp_fin_return;?>"></input></td>
											<td><?php echo $action_type;?>ed</td>
											<td><?php echo $action_comment;?></td>
										</tr>
										<?php $x++;
									}
							?>
			
						</table>
						<div style="margin:20px;">
							<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
							<input type="submit" name="submit_updated" value="Submit" onclick="return confirm('Are you sure you want to submit this form?');" /></input>
						</div>
					</form>
				</div>
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




