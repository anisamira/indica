

<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
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
											<td><?php echo $goal_desc;?></td>
											<td><?php echo $strategy_desc;?></td>
											<td><?php echo $actionplan_desc;?></td>
											<td><?php echo $kpi_desc;?></td>
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
											<td><?php echo $action_type;?>ed</td>
											<td><?php echo $action_comment;?></td>
										</tr>
										<?php $x++;
									}
							?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>


	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>




