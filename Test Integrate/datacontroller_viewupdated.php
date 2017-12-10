
<?php
	include('sidebar.php');
	//include('style_dc.php');
	include('script.php');
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$username		=$_SESSION['username'];
	
	if (isset($_POST['request']))
	{
		$session		=$_POST["session"];
		$reason		= mysql_real_escape_string($_POST["reason"]); 
		$action			=$username ." has request to edit ".$module_id . " " .$session ." . Message as follow :" .$reason;
		$sql			="INSERT INTO notif_main (noti_action) VALUES ('$action')";
		$resultx    =mysql_query($sql);
		
	}				
					
	
?>


	<div class="wrapper">
		<div id="content">
			<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post" class="pure-form pure-form-aligned">
					<table class="table table-hover"> 
						<tr>
							<th>Version</th>						
							<th>Last Updated</th>
							<th>Status</th>
							<th>Action</th>						
						</tr>
						<?php
						$sql= "SELECT form_id, session_name, module_id, form_status,  DATE_FORMAT(last_updated, '%d-%m-%Y') AS last_updated
							FROM form 
							WHERE module_id='$module_id'";
						$result = mysql_query($sql) or die(mysql_error()); 
						if(mysql_num_rows($result)>0)
						{
							while($row=mysql_fetch_array($result))
							{
								$form_status	=$row['form_status'];
								$form_id		=$row['form_id'];
								$session_name	=$row['session_name'];
								$last_updated	=$row['last_updated'];?>
								<tr>  
									<td>KPI Achievement <?php echo $session_name;?></td>
									<td><?php echo $last_updated;?></td>
									<td><?php echo $form_status;?></td>
									<td>
									<button onclick="location.href='datacontroller_viewrecord.php'" type="button">View Record</button>
											<button data-toggle="modal" data-target="#responsive">Request Edit</button>
												<div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title" id="myModalLabel4">Request to edit <?php echo $session_name;?></h4>
															</div>
															<?php
															$sql3="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
																FROM goal 
																JOIN strategy ON strategy.goal_id=goal.goal_id 
																JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
																JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
																JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
																JOIN target ON target.kpi_id=kpi.kpi_id 
																JOIN reference ON reference.kpi_id=kpi.kpi_id 
																WHERE goal.module_id='$module_id'
																AND goal.session_name='$session_name'";
																$result3 = mysql_query($sql3) or die(mysql_error()); 
																if (mysql_num_rows($result3)>0)
																{?>
																	<form class="pure-form pure-form-aligned" method="post" action="">
																	<div class="modal-body">
																		<div class="row" style="margin:10px;">
																			<h4></h4>
																			<!--<input class="form-control" name="" type="text" placeholder="Name" required></input></br>-->
																			<input type="hidden" name="session" value="<?php echo $session_name;?>"></input>
																			<textarea class="form-control" name="reason" placeholder="Specify the reason to edit" required></textarea>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																		<input type="submit" class="btn-u btn-u-primary" name="request" value="Submit"></submit>
																	</div>
																	</form><?php
																}
																else
																{?>
																	<div class="modal-body">
																		<div class="row" style="margin:10px;">
																			<div class="alert alert-warning alert-dismissable fade in">
																				<!--<meta http-equiv="refresh" content="1;url=datacontroller_viewupdated.php" />-->
																				<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
																				<strong>No records</strong> 
																			</div>
																		</div>																
																	</div><?php	
																}?>
															
														</div>
													</div>
												</div>
									</td>
								</tr><?php
								
							}
						}
						else
						{
							echo "no data found";
						}?>
						
						
					</table>

			</form>
		</div>
	</div>

	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->


</html>




