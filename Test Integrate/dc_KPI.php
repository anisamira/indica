
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];
	
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
							if (isset($_POST['edit_kpi']))
							{
								for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["kpiid".$y]))
									{
										$error = 1;
									}
									else
									{
										$kpi_id	=$_POST["kpiid".$y];
										$kpi_desc = mysql_real_escape_string($_POST["kpidesc".$y]); 
										$sql		="UPDATE kpi
														SET kpi_desc='$kpi_desc'
														WHERE kpi_id='$kpi_id'";
										$result			=mysql_query($sql) or die (mysql_error());
										if (false===$result)
											{
												echo mysql_error();
											}
									}
								}
							}
							if (isset($_POST['add_kpi']))
							{
								$actionplan_id	=$_POST["actionplan_id"];
								$kpi_desc 		= mysql_real_escape_string($_POST["kpi_desc"]); 
								$sql			="INSERT INTO kpi (actionplan_id, kpi_desc) VALUES ('$actionplan_id','$kpi_desc')";
								$result			=mysql_query($sql) or die (mysql_error());
								if (false===$result)
									{
										echo mysql_error();
									}
							}

								

?>
	<div class="wrapper">
		<div id="content">
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
						<br></br><?php
							$x = 1;
							if(isset($_GET['deletekpi']))
							{
								$query1	=mysql_query("DELETE FROM kpi WHERE kpi_id=".$_GET['deletekpi']);
								$query2	=mysql_query("DELETE FROM kpi WHERE kpi_id=".$_GET['deletekpi']);
								$query3	=mysql_query("DELETE FROM baseline WHERE kpi_id=".$_GET['deletekpi']);
								$query4	=mysql_query("DELETE FROM target WHERE kpi_id=".$_GET['deletekpi']);
								$query5	=mysql_query("DELETE FROM master_status WHERE kpi_id=".$_GET['deletekpi']);
							}	
							$que="SELECT goal.*,strategy.*, actionplan.* 
									FROM goal 
									JOIN strategy 
									ON strategy.goal_id=goal.goal_id 
									JOIN actionplan 
									ON actionplan.strategy_id=strategy.strategy_id 
									WHERE goal.module_id='$module_id' 
									AND goal.session_name='$session_name'
									ORDER BY actionplan.actionplan_id ASC";
							$results = mysql_query($que) or die(mysql_error()); 
							$sql="SELECT * FROM goal 
								WHERE module_id='$module_id'
								AND session_name='$session_name' 
								ORDER BY goal_id ASC";
							$result = mysql_query($sql) or die(mysql_error());
							if (mysql_num_rows($results)>0)
							{ ?>
								<form action="dc_baseline.php" method="post" class="pure-form pure-form-aligned">
									<table class="table table-hover"> 
										<col width="10%">
										<col width="15%">
										<col width="15%">
										<col width="60%">
											<tr style="font-size:14px">
												<th>Goal</th>
												<th>Strategy</th>
												<th>Action Plan</th>
												<th>KPI</th>
											</tr><?php
										while($row=mysql_fetch_array($result))
										{
											$goal_id	=$row['goal_id'];
											$goal_desc	=$row['goal_desc'];
											$sql2		="SELECT goal.goal_id, strategy.strategy_id, count(actionplan.actionplan_desc) as count_str 
															FROM goal JOIN strategy 
															ON strategy.goal_id = goal.goal_id 
															JOIN actionplan ON actionplan.strategy_id = strategy.strategy_id 
															WHERE goal.goal_id='$goal_id'";
											$result2 	= mysql_query($sql2) or die(mysql_error());
											$values 	= mysql_fetch_assoc($result2); 
											$count_str 	= $values['count_str']; ?>
											<tr style="font-size:13px">
											<td rowspan="<?php echo $count_str;?>"><?php echo $goal_desc;?></td><?php
												$sql3		="SELECT * FROM strategy 
																WHERE goal_id='$goal_id'
																ORDER BY strategy_id ASC";
												$result3 	= mysql_query($sql3) or die(mysql_error());
												while($row3=mysql_fetch_array($result3))
												{
													$strategy_id	=$row3['strategy_id'];
													$strategy_desc	=$row3['strategy_desc'];
													$sql4			="SELECT count(actionplan_desc) as count_act from actionplan
																	WHERE strategy_id='$strategy_id'
																	ORDER BY actionplan_id ASC";
													$result4 	= mysql_query($sql4) or die(mysql_error());
													$value 		= mysql_fetch_assoc($result4); 
													$count_act 	= $value['count_act']; ?>
													<td style="font-size:13px" rowspan="<?php echo $count_act;?>"><?php echo $strategy_desc;?></td>
													<?php
														$sql5		="SELECT * FROM actionplan 
																		WHERE strategy_id='$strategy_id'
																		ORDER BY actionplan_id ASC";
														$result5 	= mysql_query($sql5) or die(mysql_error());
														while($row5=mysql_fetch_array($result5))
														{
															$actionplan_id	=$row5['actionplan_id'];
															$actionplan_desc=$row5['actionplan_desc'];?>
															<td style="font-size:13px"><?php echo $actionplan_desc;?><input type="hidden" name="actionplan_id<?php echo $x;?>" value="<?php echo $actionplan_id;?>"></input></td>
															<td><?php
																$y=1;
																$sql6		="SELECT * FROM kpi 
																				WHERE actionplan_id='$actionplan_id'
																				ORDER BY kpi_id ASC";
																$result6	= mysql_query($sql6) or die(mysql_error());
																if (mysql_num_rows($result6)>0)
																{?>
																	<table class="table table-hover">
																		<col width="80%">
																		<col width="10%">
																		<col width="10%"><?php
																		while($row6=mysql_fetch_array($result6))
																		{
																			$kpi_id=$row6['kpi_id'];
																			$kpi_desc=$row6['kpi_desc'];?>
																			<tr style="font-size:13px">
																				<td><?php echo $y.") ".$kpi_desc;?></td>
																				<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletekpi(<?php echo  $kpi_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
																				<td></td>
																				
																			</tr><?php
																			$y++;
																		}?>
																		<tr style="font-size:13px">
																			<td>
																				<button data-toggle="modal" data-target="#action<?php echo $actionplan_id;?>"  type="button">Add KPI</button>
																				<button data-toggle="modal" data-target="#editkpi<?php echo $actionplan_id;?>"  type="button">Edit KPI</button>
																				<div class="modal fade" id="action<?php echo $actionplan_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																					<div class="modal-dialog">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																								<h4 class="modal-title" id="action<?php echo $actionplan_id;?>">Add KPI</h4>
																							</div>
																							<form></form>
																							<form action="" method="post" class="pure-form pure-form-aligned">
																								<div class="modal-body">
																									<div class="row" style="margin:10px;">
																										<input type="hidden" name="actionplan_id" value="<?php echo $actionplan_id;?>"></input>
																										<textarea class="form-control" name="kpi_desc" required></textarea>
																									</div>
																								</div>
																								<div class="modal-footer">
																									<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																									<input type="submit" class="btn-u btn-u-primary" name="add_kpi" value="Submit"></input>
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																			</td>
																			<td>
																				<div class="modal fade" id="editkpi<?php echo $actionplan_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																					<div class="modal-dialog">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																								<h4 class="modal-title" id="editkpi<?php echo $actionplan_id;?>">Edit KPI</h4>
																							</div><?php
																							$sql7		="SELECT * FROM kpi 
																										WHERE actionplan_id='$actionplan_id'
																										ORDER BY kpi_id ASC";
																							$result7	= mysql_query($sql7) or die(mysql_error());
																							if (mysql_num_rows($result7)>0)
																							{?>
																								<form action="" method="post" class="pure-form pure-form-aligned">
																									<div class="modal-body">
																										<div class="row" style="margin:10px;"><?php
																											$no=1;
																											while($row7=mysql_fetch_array($result7))
																											{
																												$kpiid=$row7['kpi_id'];
																												$kpidesc=$row7['kpi_desc'];?>
																													<input type="hidden" name="kpiid<?php echo $no;?>" value="<?php echo $kpiid;?>"></input>
																													<textarea class="form-control" name="kpidesc<?php echo $no;?>" required><?php echo $kpidesc;?></textarea><?php
																													$no++;
																											}?>
																										</div>
																									</div>
																									<div class="modal-footer">
																										<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																										<input type="submit" class="btn-u btn-u-primary" name="edit_kpi" value="Save"></input>
																									</div>
																								</form><?php
																							}?>
																						</div>
																					</div>
																				</div>
																			</td>
																		</tr>
																	</table><?php
																}
																else
																{?>
																	<input class="form-control" type="text"  name="kpi<?php echo $x;?>[]" required></input></br><br>
																	<div class="wrapkpi<?php echo $x;?>"></div>
																	<button class="btn add_kpi<?php echo $x;?>" style="float: right;"><span class="icon-plus"/></button><?php
																}?>
															</td>
														</tr><?php 
														$x++;
														}
												}?>
												<?php
										}
										 ?>
									</table>	
									<br></br><input type="submit" name="submit_kpi" value="Next" style="float: right;"></input>	
									<!--<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>-->
								</form>	
								<?php
							}
							else
							{?>
								<div class="alert alert-warning alert-dismissable fade in">
									<meta http-equiv="refresh" content="1;url=dc_actionplan.php" />
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>You need to fill in previous page first</strong> Redirecting in 1 seconds...
								</div><?php	
							}?>

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

