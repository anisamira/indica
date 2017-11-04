
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

							if(isset($_POST['submit_kpi']))
							{
								$active=4;
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
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:20px;">
				<div class="topnav">
					<a href="dc_goal.php">Goals</a>
					<a href="dc_strategy.php">Strategies</a>
					<a href="dc_actionplan.php">Action Plan</a>
					<a href="dc_KPI.php">KPI</a>
					<a class="active" href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>

						<!-- BASELINE / OPERATION DEFINITION FORM -->
							<form action="dc_target.php" method="post">
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
										<tr style="font-size:13px">  
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
						<!-- END BASELINE / OPERATION DEFINITION FORM-->
	
		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>

<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #332;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
</style>
<script>
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
     
});
 

</script>
</html>

