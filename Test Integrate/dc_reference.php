
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	//include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

							if(isset($_POST['submit_target']))
							{
								for($y=1; $y<=50; $y++)
								{							
									if (empty($_POST["kpi".$y]))
									{
										$error = 1;
									}
									else
									{									
											$value=$_POST['kpi'.$y];
											$target1	=$_POST['target1'.$y];
											$target2	=$_POST['target2'.$y];
											$target3	=$_POST['target3'.$y];
											$target4	=$_POST['target4'.$y];
											$target5	=$_POST['target5'.$y];
											
											$sql="INSERT INTO target (kpi_id, target1, target2, target3, target4, target5) VALUES ('$value','$target1','$target2','$target3', '$target4', '$target5')";
											$result = mysql_query($sql) or die(mysql_error());  
										   
											if (false === $result) 
											{
												echo mysql_error();
											}											
									}	
								}		
							}
							if (isset($_POST['edit_reference']))
							{
								$kpi_id	=$_POST["kpi_id"];
								$ownership = mysql_real_escape_string($_POST["ownership"]); 
								$data_source = mysql_real_escape_string($_POST["data_source"]); 
								$estimated_cost = mysql_real_escape_string($_POST["estimated_cost"]); 
								$exp_fin_return = mysql_real_escape_string($_POST["exp_fin_return"]); 
								$sql		="UPDATE reference
												SET ownership='$ownership', data_source='$data_source', estimated_cost='$estimated_cost', exp_fin_return='$exp_fin_return'
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
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a class="active" href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
						
						<!-- REFERENCE FORM-->
						<br></br>
						<?php
							$x=1;
							if(isset($_GET['deletereference']))
								{
									$query	=mysql_query("DELETE FROM reference WHERE kpi_id=".$_GET['deletereference']);
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
								<form action="dc_submit.php" method="post">
									<table id ="maintable" class="table table-bordered"> 
										<tr style="font-size:14px">
											<th rowspan="2">Key Performance Indicator (KPI)</th>
											<th colspan="4">References</th>
											<th colspan="2" rowspan="2">Action</th>
										</tr>
										<tr style="font-size:14px">
											
											<th>Ownership</th>
											<th>Data Source</th>
											<th>Estimated Cost (RM)</th>
											<th>Expected Financial Return</th>										
										</tr><?php
										while($row=mysql_fetch_array($result))
										{
											$kpi_id		=$row['kpi_id'];
											$kpi_desc	=$row['kpi_desc'];?>
													<tr style="font-size:13px">  
														<td><?php echo $kpi_desc;?></td>
														<?php
														$sql2	="SELECT * from reference
																	WHERE kpi_id='$kpi_id'";
														$result2=mysql_query($sql2) or die (mysql_error());
														if(mysql_num_rows($result2)===0)
														{?>
															<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input></td>
															<td><input class="form-control" type="" name="ownership<?php echo $x;?>"/></td>
															<td><input class="form-control" type="" name="data_source<?php echo $x;?>"/></td>
															<td><input class="form-control" type="" name="estimated_cost<?php echo $x;?>"/></td>
															<td><input class="form-control" type="" name="exp_fin_return<?php echo $x;?>"/></td>
															<td><button class="btn-u btn-u-red" type="button" style="float:right" disabled><i class="fa fa-trash-o"/></button></td>
															<td><button class="btn-u btn-u-red" type="button" disabled><i class="fa fa-pencil"/></button></td>
														</tr><?php
														}
														else
														{
															while($row=mysql_fetch_array($result2))
															{
																	$ownership			=$row['ownership'];
																	$data_source		=$row['data_source'];
																	$estimated_cost		=$row['estimated_cost'];
																	$exp_fin_return		=$row['exp_fin_return'];?>
																	<td><?php echo $ownership;?></td>
																	<td><?php echo $data_source;?></td>
																	<td><?php echo $estimated_cost;?></td>
																	<td><?php echo $exp_fin_return;?></td>
																	<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletereference(<?php echo  $kpi_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
																	<td><button data-toggle="modal" data-target="#<?php echo $kpi_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
																	<div class="modal fade" id="<?php echo $kpi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																			<div class="modal-dialog">
																				<div class="modal-content">
																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																						<h4 class="modal-title" id="<?php echo $kpi_id;?>">Edit Reference</h4>
																					</div>
																					<form action="" method="post">
																						<div class="modal-body">
																							<div class="row" style="margin:10px;">
																									<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"></input>
																									Ownership :<textarea class="form-control" name="ownership" required><?php echo $ownership;?></textarea></br>
																									Data Source : <textarea class="form-control" name="data_source" required><?php echo $data_source;?></textarea></br>
																									Estimated Cost :<textarea class="form-control" name="estimated_cost" required><?php echo $estimated_cost;?></textarea>
																									Expected Financial Return :<textarea class="form-control" name="exp_fin_return" required><?php echo $exp_fin_return;?></textarea>
																							</div>
																						</div>
																						<div class="modal-footer">
																							<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
																							<input type="submit" class="btn-u btn-u-primary" name="edit_reference" value="Submit"></input>
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
									<input type="submit" name="submit_reference" value="Next" style="float: right;"></input>
									<!--<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>-->
								</form><?php					
							}
							else
							{?>
								<div class="alert alert-warning alert-dismissable fade in">
									<meta http-equiv="refresh" content="1;url=dc_target.php" />
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>You need to fill in previous page first</strong> Redirecting in 1 seconds...
								</div><?php	
							}?>				
									
									
		<!-- END REFERENCE FORM-->
		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

<script>
	function deletereference(id)
					{
						if(confirm('Sure To Remove This Reference?'))
						{
							window.location.href='dc_reference.php?deletereference='+id;
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

