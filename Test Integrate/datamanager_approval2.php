
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
								<th>Key Performance Indicator (KPI)</th>	
								<th></th>
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
										$kpi_id		=$row['kpi_id'];
										$kpi_desc	=$row['kpi_desc'];
										$action_type=$row['action_type']; ?>
										
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $kpi_desc;?></td>
											<td><?php echo $action_type;?></td>
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
