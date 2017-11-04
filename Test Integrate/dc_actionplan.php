
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];
	
							
							if(isset($_POST['submit_strategy']))
							{			
								$active=2;
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
							}


	
	

							
								

?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:20px;">
				<div class="topnav">
					<a href="dc_goal.php">Goals</a>
					<a href="dc_strategy.php">Strategies</a>
					<a class="active" href="dc_actionplan.php">Action Plan</a>
					<a href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
						
						<!-- ACTION FORM -->
							<form action="dc_KPI.php" method="post">
								<table class="table table-bordered"> 
									<col width="20%">
									<col width="20%">
									<col width="60%">
												<tr>
													<th>Goal</th>
													<th>Strategy</th>
													<th>Action Plan</th>
												</tr>
								<?php
								//	if(isset($_GET['deletestrategy']))
									//		{
									//			$query	=mysql_query("DELETE FROM strategy WHERE strategy_id=".$_GET['deletestrategy']);
									//		}
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
										<tr style="font-size:13px">
											<td><?php echo $goal_desc;?></td>
											<td>
												<!--<input type="button" value="Delete" onclick="window.location.href='javascript:deletestrategy( <?php //echo  $strategy_id; ?>)'"></input>-->
												<?php echo $strategy_desc;?>
												<input type="hidden" name="strategy_id<?php echo $x;?>" value="<?php echo $strategy_id;?>"></input></td>
											<td>
												<table class="table"><?php 
														$y=1;
														if(isset($_GET['deleteaction']))
															{
																$query	=mysql_query("DELETE FROM actionplan WHERE actionplan_id=".$_GET['deleteaction']);
															}	
														$sql2="SELECT * FROM actionplan WHERE strategy_id='$strategy_id'";
														$result2=mysql_query($sql2) or die (mysql_error());
														while($row=mysql_fetch_array($result2))
														{									
															$actionplan_id=$row['actionplan_id'];
															$actionplan_desc=$row['actionplan_desc'];?>
															
															<tr style="font-size:13px">
																<td><?php echo $y.") ".$actionplan_desc;?></td>
																<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deleteaction(<?php echo  $actionplan_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
															</tr><?php
															$y++;
														}?>
												</table>
												<input class="form-control" type="text"  name="action<?php echo $x;?>[]" required></input></br>
												<div class="wrapaction<?php echo $x;?>"></div>
												<button class="btn add_action<?php echo $x;?>" style="float: right;"><span class="icon-plus"/></button>
											</td>
										</tr>
										<?php $x++;	
									} ?>									
									</table>	
								</br><input type="submit" name="submit_action" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>		

						<!--END ACTION FORM-->

		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	<script type="text/javascript">
	
					function deleteaction(id)
					{
						if(confirm('Sure To Remove This Action Plan?'))
						{
							window.location.href='dc_actionplan.php?deleteaction='+id;
						return true;
						}
						
					}

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

