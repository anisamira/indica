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
	include('db.php');
	include('sidebar.php');
?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<div class="table-responsive">  
				<form action="datacontroller_target.php" method="post">
				<form action="datamanager_process.php" method="post">
				   <table class="table table-bordered"> 
						<tr>
							<th>No.</th>
							<th>Goal</th>	
                            <th>Strategy</th>
                            <th>Action Plan</th>							
							<th>Key Performance Indicator (KPI)</th>
							<th>Operation Definition</th>
							<th>Achievement 2014</th>
                            <th>Achievement 2015</th>	
                            <th>2016</th>
							<th>2017</th>
							<th>2018</th>
							<th>2019</th>
							<th>2020</th>
							<th>Ownerhip</th>
							<th>Data Source</th>
							<th>Notes</th>
							<th>Estimated Cost(RM)</th>
							<th>Expected Financial Return</th>
							<th>Action</th>
						</tr>
						<?php
						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* ,master_status.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN master_status ON master_status.kpi_id=kpi.kpi_id
						WHERE module_id='M01'
						WHERE approvedd='0'";
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$goal_desc		  =$row['goal_desc'];
							$strategy_desc    =$row['strategy_desc'];
							$actionplan_desc  =$row['actionplan_desc'];
							$kpi_desc		  =$row['kpi_desc'];
							$ope_definition   =$row['ope_definition'];
							$baseline1        =$row['baseline1'];
							$baseline2        =$row['baseline2'];
							$target1          =$row['target1'];
							$target2          =$row['target2'];
							$target3          =$row['target3'];
							$target4          =$row['target4'];
							$target5          =$row['target5'];
							$ownership		  =$row['ownership'];
							$data_source	  =$row['data_source'];
							$notes      	  =$row['notes'];
							$estimated_cost	  =$row['estimated_cost'];
							$exp_fin_return	  =$row['exp_fin_return'];
							$action	          =$row['action'];
							

							
						?>

							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $strategy_desc; ?></td>
								<td><?php echo $actionplan_desc; ?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $ope_definition; ?></td>
								<td><?php echo $baseline1;?></td>
								<td><?php echo $baseline2;?></td>
								<td><?php echo $target1;?></td>
								<td><?php echo $target2;?></td>
								<td><?php echo $target3;?></td>
								<td><?php echo $target4;?></td>
								<td><?php echo $target5;?></td>
								<td><?php echo $ownership;?></td>
								<td><?php echo $data_source;?></td>
								<td><?php echo $notes;?></td>
								<td><?php echo $estimated_cost;?></td>
								<td><?php echo $exp_fin_return;?></td>
								<td><?php echo $action;?></td>
								
							</tr>
							<?php
						$x++;
						}
						?>
					</table>
				</form>	
			</div>
			<div style="margin:20px;">
				<form action="index.php" method="post">
					<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
					<input class='action' type="button" name="approve" value="Approve" onclick="return confirm('Are you sure you want to approve?');" /></input>
					<input class='action' type="button" name="reject" value="Reject" onclick="return confirm('Are you sure you want to reject?');" /></input>
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
   
            $(document).ready(function(){
                $('.action').click(function(){
                    var action = $(this).attr('name');
                    $('#action').val(action);
                    $(this).closest('form').submit();

                })
            })
    
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