
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];
							
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
											$sql	="INSERT INTO strategy (goal_id, strategy_desc) VALUES ('$goal_id','$value')";
											$result = mysql_query($sql) or die(mysql_error());  										   
											if (false === $result) 
											{
												echo mysql_error();
											}
										}										
									}	
								}		
							}
							if (isset($_POST['edit_actionplan']))
							{
								for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["actionplanid".$y]))
									{
										$error = 1;
									}
									else
									{
										$actionplan_id		=$_POST["actionplanid".$y];
										$actionplan_desc	= mysql_real_escape_string($_POST["actionplandesc".$y]); 
										$sql				="UPDATE actionplan
																SET actionplan_desc='$actionplan_desc'
																WHERE actionplan_id='$actionplan_id'";
										$result				=mysql_query($sql) or die (mysql_error());
										if (false===$result)
											{
												echo mysql_error();
											}
									}
								}
							}
							if (isset($_POST['add_actionplan']))
							{
								$strategy_id		=$_POST["strategy_id"];
								$actionplan_desc 	= mysql_real_escape_string($_POST["actionplan_desc"]); 
								$sql				="INSERT INTO actionplan (strategy_id, actionplan_desc) VALUES ('$strategy_id','$actionplan_desc')";
								$result				=mysql_query($sql) or die (mysql_error());
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
					<a class="active" href="dc_actionplan.php">Action Plan</a>
					<a href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
						
						<!-- ACTION FORM -->
						<br></br>
						<?php
						$x=1;
						if(isset($_GET['deleteaction']))
							{
								$query	=mysql_query("DELETE FROM actionplan WHERE actionplan_id=".$_GET['deleteaction']);
								$query	=mysql_query("DELETE FROM KPI WHERE actionplan_id=".$_GET['deleteaction']);
							}
						$squery="SELECT goal.*,strategy.* 
								FROM goal 
								JOIN strategy 
								ON strategy.goal_id=goal.goal_id
								WHERE goal.module_id='$module_id'
								AND goal.session_name='$session_name'";
						$results = mysql_query($squery) or die(mysql_error());
						$sql="SELECT * FROM goal 
								WHERE module_id='$module_id'
								AND session_name='$session_name' 
								ORDER BY goal_id ASC";
						$result = mysql_query($sql) or die(mysql_error());
						if (mysql_num_rows($results)>0)
						{?>
							<form action="dc_KPI.php" method="post" class="pure-form pure-form-aligned">
								<table class="table table-hover"> 
									<col width="20%">
									<col width="20%">
									<col width="60%">
									<tr style="font-size:14px">
										<th>Goal</th>
										<th>Strategy</th>
										<th>Action Plan</th>
									</tr><?php
									while($row=mysql_fetch_array($result))
									{
										$goal_id	=$row['goal_id'];
										$goal_desc	=$row['goal_desc'];
										$sql2		="SELECT count(strategy_desc) as count_str from strategy 
														WHERE goal_id='$goal_id'
														ORDER BY strategy_id ASC";
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
												$strategy_desc	=$row3['strategy_desc'];?>
												<td style="font-size:13px"><?php echo $strategy_desc;?><input type="hidden" name="strategy_id<?php echo $x;?>" value="<?php echo $strategy_id;?>"></input></td>
												<td><?php
													$sql5		="SELECT * FROM actionplan 
																	WHERE strategy_id='$strategy_id'
																	ORDER BY strategy_id ASC";
													$result5 	= mysql_query($sql5) or die(mysql_error());
													if (mysql_num_rows($result5)>0)
													{?>
														<table class="table">
															<col width="80%">
															<col width="10%">
															<col width="10%"><?php
															$y=1;
															while($row5=mysql_fetch_array($result5))
															{
																$actionplan_id	=$row5['actionplan_id'];
																$actionplan_desc=$row5['actionplan_desc'];?>
																<tr style="font-size:13px">
																	<td><?php echo $y.") ".$actionplan_desc;?></td>
																	<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deleteaction(<?php echo  $actionplan_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
																	<td></td>
																</tr><?php
																$y++;
															}?>
															<tr style="font-size:13px">
																<td>
																	<button data-toggle="modal" data-target="#strategy<?php echo $strategy_id;?>"  type="button">Add Action Plan</button>
																	<button data-toggle="modal" data-target="#editaction<?php echo $strategy_id;?>"  type="button">Edit Action Plan</button>
																	<div class="modal fade" id="strategy<?php echo $strategy_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																					<h4 class="modal-title" id="strategy<?php echo $strategy_id;?>">Add Action Plan</h4>
																				</div>
																				<form></form>
																				<form action="" method="post" class="pure-form pure-form-aligned">
																					<div class="modal-body">
																						<div class="row" style="margin:10px;">
																							<input type="hidden" name="strategy_id" value="<?php echo $strategy_id;?>"></input>
																							<textarea class="form-control" name="actionplan_desc" required></textarea>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																						<input type="submit" class="btn-u btn-u-primary" name="add_actionplan" value="Submit"></input>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
																<td colspan="2">
																	<div class="modal fade" id="editaction<?php echo $strategy_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																					<h4 class="modal-title" id="editaction<?php echo $strategy_id;?>">Edit Action Plan</h4>
																				</div><?php
																				$sql6		="SELECT * FROM actionplan 
																								WHERE strategy_id='$strategy_id'
																								ORDER BY strategy_id ASC";
																				$result6 	= mysql_query($sql5) or die(mysql_error());
																				if (mysql_num_rows($result6)>0)
																				{?>						
																					<form action="" method="post" class="pure-form pure-form-aligned">
																						<div class="modal-body">
																							<div class="row" style="margin:10px;"><?php
																								$no=1;
																								while($row6=mysql_fetch_array($result6))
																								{
																									$actionplanid	=$row6['actionplan_id'];
																									$actionplandesc=$row6['actionplan_desc'];?>
																									<input type="hidden" name="actionplanid<?php echo $no;?>" value="<?php echo $actionplanid;?>"></input>
																									<textarea class="form-control" name="actionplandesc<?php echo $no;?>" required><?php echo $actionplandesc;?></textarea><br></br><?php
																									$no++;
																								}?>
																							</div>
																						</div>
																						<div class="modal-footer">
																							<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																							<input type="submit" class="btn-u btn-u-primary" name="edit_actionplan" value="Submit"></input>
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
														<input class="form-control" type="text"  name="action<?php echo $x;?>[]" required></input></br>
														<div class="wrapaction<?php echo $x;?>"></div>
														<button class="btn add_action<?php echo $x;?>" style="float: right;"><span class="icon-plus"/></button><?php
													}?>
												</td>
												</tr><?php
												$x++;	
											} 
									}?>									
								</table>	
								</br><input type="submit" name="submit_action" value="Next" style="float: right;"></input>	
											<!--<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>-->
							</form>	<?php
					
						}
						else
						{?>
							<div class="alert alert-warning alert-dismissable fade in">
								<meta http-equiv="refresh" content="1;url=dc_strategy.php" />
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>You need to fill in previous page first</strong> Redirecting in 1 seconds...
							</div><?php	
						}?>
											

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

		var acc = document.getElementsByClassName("accordion");
		var i;
		for (i = 0; i < acc.length; i++) 
		{
		  acc[i].onclick = function() 
		  {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight)
			{
			  panel.style.maxHeight = null;
			} 
			else 
			{
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

