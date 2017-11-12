
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];
	

							if(isset($_POST['submit_goal']))
								{	
									$active=1;
									foreach ($_POST['goal'] as $key=>$value)
										{
											$sql="INSERT INTO goal (module_id,session_name,goal_desc) VALUES ('$module_id','$session_name','$value')";
											$result = mysql_query($sql) or die(mysql_error());  									   
											if (false === $result)
												{
													echo mysql_error();
												}
										}
								} 
								
							if ($_SERVER["REQUEST_METHOD"] == "POST")
							{
								$strategy_id	=$_POST["strategy_id"];
								$strategy_desc = mysql_real_escape_string($_POST["strategy_desc"]); 
								$sql		="UPDATE strategy
												SET strategy_desc='$strategy_desc'
												WHERE strategy_id='$strategy_id'";
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
					<a class="active" href="dc_strategy.php">Strategies</a>
					<a href="dc_actionplan.php">Action Plan</a>
					<a href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>
			<!-- Tabs -->
							<br></br>
							<form action="dc_actionplan.php" method="post">
								<table class="table table-bordered">
									<col width="40%">
									<col width="60%">
									<tr style="font-size:14px">
										<th>Goal</th>
										<th>Strategy</th>
									</tr>
									<?php
									$x = 1;
									$sql="SELECT * FROM goal 
											WHERE module_id='$module_id' 
											AND session_name='$session_name' 
											ORDER BY goal_id ASC";
									$result = mysql_query($sql) or die(mysql_error());																		
									while($row=mysql_fetch_array($result))
										{
											$goal_id=$row['goal_id'];
											$goal_desc=$row['goal_desc'];?>
											
											<tr style="font-size:13px">
												<td><?php echo $goal_desc;?>
													<input class="form-control" type="hidden" name="goal_id<?php echo $x;?>" value="<?php echo $goal_id;?>"></input>
												</td>
												<td>
													<table class="table"><?php 
														$y=1;
														if(isset($_GET['deletestrategy']))
															{
																$query	=mysql_query("DELETE FROM strategy WHERE strategy_id=".$_GET['deletestrategy']);
																$query	=mysql_query("DELETE FROM actionplan WHERE strategy_id=".$_GET['deletestrategy']);
															}	
														$sql2="SELECT * FROM strategy WHERE goal_id='$goal_id'";
														$result2=mysql_query($sql2) or die (mysql_error());
														while($row=mysql_fetch_array($result2))
														{									
															$strategy_id=$row['strategy_id'];
															$strategy_desc=$row['strategy_desc'];?>
															
															<tr style="font-size:13px">
																<td><?php echo $y.") ".$strategy_desc;?></td>
																<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletestrategy(<?php echo  $strategy_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
																<td><button data-toggle="modal" data-target="#<?php echo $strategy_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
																<div class="modal fade" id="<?php echo $strategy_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																				<h4 class="modal-title" id="<?php echo $strategy_id;?>">Edit Strategy</h4>
																			</div>
																			<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
																				<div class="modal-body">
																					<div class="row" style="margin:10px;">
																							<input type="hidden" name="strategy_id" value="<?php echo $strategy_id;?>"></input>
																							<textarea class="form-control" name="strategy_desc" required><?php echo $strategy_desc;?></textarea>
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
													</table>
													<input class="form-control" type="text" name="strategy<?php echo $x;?>[]" required></input></br>
													<div class="wrapstrategy<?php echo $x;?>"></div>
													<button class="btn add_strategy<?php echo $x;?>" style="float: right;"><span class="icon-plus"/></button>
												</td>
											</tr><?php
												
											 $x++;										
										}?>
								</table></br>
								<input type="submit" name="submit_strategy" value="Next" style="float: right;"></input>	
								<input type="button" VALUE="Back" onClick="history.go(-1);" disabled></input>
							</form>
						</div> 
						<!--END STRATEGY FORM-->
						
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	<script type="text/javascript">
					
				function deletestrategy(id)
					{
						if(confirm('Sure To Remove This Strategy?'))
						{
							window.location.href='dc_strategy.php?deletestrategy='+id;
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

