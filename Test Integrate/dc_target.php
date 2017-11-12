
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];


							if(isset($_POST['submit_op_def']))
								{
									for($y=1; $y<=50; $y++)
									{							
								if (empty($_POST["kpi".$y]))
										{
											$error = 1;
										}
										else
										{										
												$value			=$_POST['kpi'.$y];
												$operation_def	=$_POST['operation_def'.$y];
												$baseline1		=$_POST['baseline1'.$y];
												$baseline2		=$_POST['baseline2'.$y];
												
												$sql1="UPDATE kpi SET operation_def='$operation_def' WHERE kpi_id='$value'";
												$result = mysql_query($sql1) or die(mysql_error());  											   
												if (false === $result) 
												{
													echo mysql_error();
												}	
												
												$sql2="INSERT INTO baseline (baseline1, baseline2, kpi_id) VALUES ('$baseline1','$baseline2','$value')";
												$result2 = mysql_query($sql2) or die(mysql_error());  											   
												if (false === $result2) 
												{
													echo mysql_error();
												}											
										}	
									}		
								}
								if ($_SERVER["REQUEST_METHOD"] == "POST")
								{
									$kpi_id	=$_POST["kpi_id"];
									$target1 = mysql_real_escape_string($_POST["target1"]); 
									$target2 = mysql_real_escape_string($_POST["target2"]); 
									$target3 = mysql_real_escape_string($_POST["target3"]); 
									$target4 = mysql_real_escape_string($_POST["target4"]); 
									$target5 = mysql_real_escape_string($_POST["target5"]); 	
									$sql		="UPDATE target
													SET target1='$target1', target2='$target2', target3='$target3', target4='$target4', target5='$target5'
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
					<a href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a class="active" href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
						
						<!-- TARGET FORM-->
						<br></br>
							<form action="dc_reference.php" method="post">
								<table id ="maintable" class="table table-bordered"> 
									<tr style="font-size:14px">
										<th rowspan="2">Key Performance Indicator (KPI)</th>
										<th colspan="5">Target</th>
										<th colspan="2" rowspan="2">Action</th>
									</tr>
									<tr style="font-size:14px">
										<?php
										$sql="SELECT year_name from year where session_name='$session_name'";
										$result=mysql_query($sql) or die(mysql_error());
										while($row=mysql_fetch_array($result))
										{
											$year_name	=$row['year_name']; ?>
											<th><?php echo $year_name;?></th>
											<?php
										}?>
									</tr>
									
									<?php
									$x=1;
									if(isset($_GET['deletetarget']))
										{
											$query	=mysql_query("DELETE FROM target WHERE kpi_id=".$_GET['deletetarget']);
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
								while($row=mysql_fetch_array($result))
								{
									$kpi_id		=$row['kpi_id'];
									$kpi_desc	=$row['kpi_desc'];?>
											<tr style="font-size:13px">  
												<td><?php echo $kpi_desc;?></td>
												<?php
												$sql2	="SELECT * from target
															WHERE kpi_id='$kpi_id'";
												$result2=mysql_query($sql2) or die (mysql_error());
												if(mysql_num_rows($result2)===0)
												{?>
													<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input></td>
													<td><input class="form-control" type="text" name="target1<?php echo $x;?>"/></td>
													<td><input class="form-control" type="text" name="target2<?php echo $x;?>"/></td>
													<td><input class="form-control" type="text" name="target3<?php echo $x;?>"/></td>
													<td><input class="form-control" type="text" name="target4<?php echo $x;?>"/></td>
													<td><input class="form-control" type="text" name="target5<?php echo $x;?>"/></td>
													<td><button class="btn-u btn-u-red" type="button" style="float:right" disabled><i class="fa fa-trash-o"/></button></td>
													<td><button class="btn-u btn-u-red" type="button" disabled><i class="fa fa-pencil"/></button></td>
												</tr><?php
												}
												else
												{
													while($row=mysql_fetch_array($result2))
													{
															$target1		=$row['target1'];
															$target2		=$row['target2'];
															$target3		=$row['target3'];
															$target4		=$row['target4'];
															$target5		=$row['target5'];?>
															<td><?php echo $target1;?></td>
															<td><?php echo $target2;?></td>
															<td><?php echo $target3;?></td>
															<td><?php echo $target4;?></td>
															<td><?php echo $target5;?></td>
															<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletetarget(<?php echo  $kpi_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
															<td><button data-toggle="modal" data-target="#<?php echo $kpi_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
															<div class="modal fade" id="<?php echo $kpi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																				<h4 class="modal-title" id="<?php echo $kpi_id;?>">Edit Target </h4>
																			</div>
																			<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
																				<div class="modal-body">
																					<div class="row" style="margin:10px;">
																							<input type="hidden" name="kpi_id" value="<?php echo $kpi_id;?>"></input>
																							Target 1 : <textarea class="form-control" name="target1" required><?php echo $target1;?></textarea></br>	
																							Target 2 : <textarea class="form-control" name="target2" required><?php echo $target2;?></textarea></br>	
																							Target 3 : <textarea class="form-control" name="target3" required><?php echo $target3;?></textarea></br>	
																							Target 4 : <textarea class="form-control" name="target4" required><?php echo $target4;?></textarea></br>	
																							Target 5 : <textarea class="form-control" name="target5" required><?php echo $target5;?></textarea></br>	
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
													}
												}
										$x++;							
									}?>								
								</table>
								<input type="submit" name="submit_target" value="Next" style="float: right;"></input>
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>
						<!-- END TARGET FORM-->
			</div>
		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

<script>
function deletetarget(id)
					{
						if(confirm('Sure To Remove This Target?'))
						{
							window.location.href='dc_target.php?deletetarget='+id;
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

