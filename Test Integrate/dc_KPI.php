
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];
	
							if(isset($_POST['submit_action']))
							{
								$active=3;
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
							if ($_SERVER["REQUEST_METHOD"] == "POST")
							{
								$kpi_id	=$_POST["kpi_id"];
								$kpi_desc = mysql_real_escape_string($_POST["kpi_desc"]); 
								$sql		="UPDATE kpi
												SET kpi_desc='$kpi_desc'
												WHERE kpi_id='$kpi_id'";
								$result			=mysql_query($sql) or die (mysql_error());
								if (false===$result)
									{
										echo mysql_error();
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
					<a class="active" href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
					
						<!-- KPI FORM -->
						<br></br>
							<form action="dc_baseline.php" method="post">
								<table class="table table-bordered"> 
									<col width="10%">
									<col width="15%">
									<col width="15%">
									<col width="60%">
												<tr style="font-size:14px">
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
										<tr style="font-size:13px">
											<td><?php echo $goal_desc;?></td>
											<td><?php echo $strategy_desc;?></td>
											<td><?php echo $actionplan_desc;?>
													<input type="hidden" name="actionplan_id<?php echo $x;?>" value="<?php echo $actionplan_id;?>"></input></td>
											<td>
												<table class="table"><?php 
														$y=1;
														if(isset($_GET['deletekpi']))
															{
																$query	=mysql_query("DELETE FROM kpi WHERE kpi_id=".$_GET['deletekpi']);
																$query	=mysql_query("DELETE FROM baseline WHERE kpi_id=".$_GET['deletekpi']);
																$query	=mysql_query("DELETE FROM target WHERE kpi_id=".$_GET['deletekpi']);
																$query	=mysql_query("DELETE FROM reference WHERE kpi_id=".$_GET['deletekpi']);
															}	
														$sql2="SELECT * FROM kpi WHERE actionplan_id='$actionplan_id'";
														$result2=mysql_query($sql2) or die (mysql_error());
														while($row=mysql_fetch_array($result2))
														{									
															$kpi_id=$row['kpi_id'];
															$kpi_desc=$row['kpi_desc'];?>
															
															<tr style="font-size:13px">
																<td><?php echo $y.") ".$kpi_desc;?></td>
																<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletekpi(<?php echo  $kpi_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
																<td><button data-toggle="modal" data-target="#<?php echo $kpi_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
																<div class="modal fade" id="<?php echo $kpi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																				<h4 class="modal-title" id="<?php echo $kpi_id;?>">Edit KPI</h4>
																			</div>
																			<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
																				<div class="modal-body">
																					<div class="row" style="margin:10px;">
																							<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"></input>
																							<textarea class="form-control" name="kpi_desc" required><?php echo $kpi_desc;?></textarea>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																					<input type="submit" class="btn-u btn-u-primary" name="submit" value="Submit"></input>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</tr><?php
															$y++;
														}?>
												</table><input class="form-control" type="text"  name="kpi<?php echo $x;?>[]" required></input></br>
												<div class="wrapkpi<?php echo $x;?>"></div>
												<button class="btn add_kpi<?php echo $x;?>" style="float: right;"><span class="icon-plus"/></button>
											</td>
										</tr>
										<?php $x++;
									} ?>
								</table>	
								</br><input type="submit" name="submit_kpi" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>									
						<!-- END KPI FORM -->

		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	<script type="text/javascript">
	
					function deletekpi(id)
					{
						if(confirm('Sure To Remove This KPI?'))
						{
							window.location.href='dc_KPI.php?deletekpi='+id;
						return true;
						}
						
					}
				</script>
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

