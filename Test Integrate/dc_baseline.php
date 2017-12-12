
<body>
<?php
	include('style_dc.php');
	include('nav-noti.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name	=$_SESSION['session_name'];
	$query			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
						$results = mysql_query($query) or die(mysql_error()); 
						if(mysql_num_rows($results)>0)
						{
							while($rows=mysql_fetch_array($results))
							{
								$_SESSION['form_status']	=$rows['form_status'];
								$_SESSION['form_id']		=$rows['form_id'];
							}
							$form_status	=$_SESSION['form_status'];
							$form_id		=$_SESSION['form_id'];
						}
						else
						{
							echo "no data found";
						}
						
						
						
							if(isset($_POST['submit_kpi']))
							{
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
												echo "Data not inserted succesfully";
											} 
										}											
									}	
								}		
							}
							if (isset($_POST['edit_opdef']))
							{
								$kpi_id	=$_POST["kpi_id"];
								$operation_def = mysql_real_escape_string($_POST["operation_def"]); 
								$baseline1 = mysql_real_escape_string($_POST["baseline1"]); 
								$baseline2 = mysql_real_escape_string($_POST["baseline2"]); 
								$sql		="UPDATE kpi
												SET operation_def='$operation_def'
												WHERE kpi_id='$kpi_id'";
								$result			=mysql_query($sql) or die (mysql_error());
								if (false===$result)
									{
										echo mysql_error();
									}
								$sql		="UPDATE baseline
												SET baseline1='$baseline1', baseline2='$baseline2'
												WHERE kpi_id='$kpi_id'";
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
					<a href="dc_KPI.php">KPI</a>
					<a class="active" href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>

						<!-- BASELINE / OPERATION DEFINITION FORM -->
						<br></br>
						<?php
							$x=1;
							if(isset($_GET['deletebaseline']))
								{
									$query	=mysql_query("DELETE FROM baseline WHERE kpi_id=".$_GET['deletebaseline']);
									$query	=mysql_query("UPDATE baseline  SET operation_def= '' WHERE kpi_id=".$_GET['deletebaseline']);
								}
							$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*
								FROM goal 
								JOIN strategy ON strategy.goal_id=goal.goal_id 
								JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
								JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
								WHERE goal.module_id='$module_id'
								AND goal.session_name='$session_name'
								ORDER BY kpi_id ASC";
							$result = mysql_query($sql) or die(mysql_error());
							if (mysql_num_rows($result)>0)
							{?>
								<form action="dc_target.php" method="post" class="pure-form pure-form-aligned">
									<table class="table table-hover">
									<col width="10%">
									<col width="30%">
									<col width="25%">
									<col width="25%">
									<col width="5%">
									<col width="5%">
										<tr style="font-size:14px">
											<th rowspan="2">Key Performance Indicator (KPI)</th>
											<th rowspan="2">Operation Definition</th>
											<th colspan="2">Baseline</th>
											<th colspan="2" rowspan="2">Action</th>
										</tr>
										<tr style="font-size:14px">
											<th>Achievement 2014</th>
											<th>Achievement 2015</th>
										</tr><?php
										while($row=mysql_fetch_array($result))
										{
											$kpi_id		=$row['kpi_id'];
											$kpi_desc	=$row['kpi_desc'];?>
											<tr style="font-size:13px">  
												<td><?php echo $kpi_desc;?>											
												</td>
												<?php
												$sql2	="SELECT kpi.operation_def, baseline.*
															FROM kpi join baseline 
															ON kpi.kpi_id=baseline.kpi_id
															WHERE kpi.kpi_id='$kpi_id'";
												$result2=mysql_query($sql2) or die (mysql_error());
												if(mysql_num_rows($result2)===0)
												{?>
														<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
														<td><input class="form-control" type="text" name="operation_def<?php echo $x;?>" required></input></td>
														<td><input class="form-control" type="text" name="baseline1<?php echo $x;?>" required></input></td>
														<td><input class="form-control" type="text" name="baseline2<?php echo $x;?>" required></input></td>
														<td><button class="btn-u btn-u-red" type="button" style="float:right" disabled><i class="fa fa-trash-o"/></button></td>
														<td><button class="btn-u btn-u-red" type="button" disabled><i class="fa fa-pencil"/></button></td>
													</tr>	<?php										
												}
												else
												{
													while($row=mysql_fetch_array($result2))
													{
															$base_id			=$row['base_id'];
															$operation_def		=$row['operation_def'];
															$baseline1			=$row['baseline1'];
															$baseline2			=$row['baseline2'];?>
															<td><?php echo $operation_def;?></td>
															<td><?php echo $baseline1;?></td>
															<td><?php echo $baseline2;?></td>
															<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletebaseline(<?php echo  $kpi_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
															<td><button data-toggle="modal" data-target="#<?php echo $base_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
																<div class="modal fade" id="<?php echo $base_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																					<h4 class="modal-title" id="<?php echo $base_id;?>">Edit Baseline & Operation Definition</h4>
																				</div>
																				<form></form>
																				<form action="" method="post" class="pure-form pure-form-aligned">
																					<div class="modal-body">
																						<div class="row" style="margin:10px;">
																								<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"></input>
																								Operation Definition :<textarea class="form-control" name="operation_def" required><?php echo $operation_def;?></textarea></br>
																								Achievement Year ? : <textarea class="form-control" name="baseline1" required><?php echo $baseline1;?></textarea></br>
																								Achievement Year ? :<textarea class="form-control" name="baseline2" required><?php echo $baseline2;?></textarea>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																						<input type="submit" class="btn-u btn-u-primary" name="edit_opdef" value="Save"></input>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
														</tr><?php		
													}
												}
												
											
											$x++;
										}?>
									</table>
									<input type="submit" name="submit_op_def" value="Next" style="float: right;"></input>
									<!--<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>-->
								</form><?php					
							}
							else
							{?>
								<div class="alert alert-warning alert-dismissable fade in">
									<meta http-equiv="refresh" content="1;url=dc_kpi.php" />
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>You need to fill in previous page first</strong> Redirecting in 1 seconds...
								</div><?php	
							}?>										
									
									
						<!-- END BASELINE / OPERATION DEFINITION FORM-->

		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
<script>
	function deletebaseline(id)
					{
						if(confirm('Sure To Remove This Operation Definition & Baseline?'))
						{
							window.location.href='dc_baseline.php?deletebaseline='+id;
						return true;
						}
						
					}
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

