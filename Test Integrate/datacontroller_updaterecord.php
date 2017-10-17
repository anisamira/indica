
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>INDICA UM</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="faviconn.png">

	<!-- Web Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
<?php
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
	$sql2			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result2 = mysql_query($sql2) or die(mysql_error()); 
					while($row=mysql_fetch_array($result2))
					{
						$_SESSION['form_status']	=$row['form_status'];
						$_SESSION['form_id']		=$row['form_id'];
					}
	$form_status	=$_SESSION['form_status'];
	$form_id		=$_SESSION['form_id'];
	$sql3			= "SELECT * FROM master_status WHERE form_id='$form_id' AND action_type='reject'";
					$result3 = mysql_query($sql3) or die(mysql_error()); 
					while($row=mysql_fetch_array($result3))
					{
						$_SESSION['kpi_id']		=$row['kpi_id'];
					}
	$kpi_id			=$_SESSION['kpi_id'];
?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<div class="table-responsive">  
				<form action="" method="post" enctype="multipart/form-data">
				   <table class="table table-bordered"> 
						<tr>
							<th>No.</th>
							<th>Goal</th>						
							<th>Key Performance Indicator (KPI)</th>
							<th>Achievement 2016</th>						
							<th>Ownerhip</th>
							<th>Data Source</th>
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
						AND goal.session_name='$session_name'
						AND kpi.kpi_id='$kpi_id'";
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$ownership		=$row['ownership'];
							$data_source	=$row['data_source'];

						?>

							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><input class="form-control" type="text" name="achievement" required/>
									<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"/></td>
								<td><?php echo $ownership;?></td>
								<td><?php echo $data_source;?></td>
							</tr>
							<?php
						$x++;
						}
						?>
						<tr>
							<td colspan="6"><input type="hidden" name="MAX_FILE_SIZE" value="8000000">Upload Evidence : </input>
											<input type="file" name="data"/></br></br>
											<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
											<input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to submit?');" /></input>
							</td>
							
					</table>
				</form>	
			</div>
			<div style="margin:20px;">
				<form action="index.php" method="post">
					
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




