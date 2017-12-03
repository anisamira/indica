
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$goal_id	=$_POST["goal_id"];
		$goal_desc = mysql_real_escape_string($_POST["goal_desc"]); 
		$sql		="UPDATE goal
						SET goal_desc='$goal_desc'
						WHERE goal_id='$goal_id'";
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
					<a class="active" href="dc_goal.php">Goals</a>
					<a href="dc_strategy.php">Strategies</a>
					<a href="dc_actionplan.php">Action Plan</a>
					<a href="dc_KPI.php">KPI</a>
					<a href="dc_baseline.php">Baseline</a>
					<a href="dc_target.php">Target</a>
					<a href="dc_reference.php">Reference</a>
					<a href="dc_submit.php">Submit Records</a>
				</div>

						<!--GOAL FORM-->
							<table class="table" style="margin-top:30px;">
								<?php
								$y=1;
									if(isset($_GET['deletegoal']))
											{
												$query	=mysql_query("DELETE FROM goal WHERE goal_id=".$_GET['deletegoal']);
												$query	=mysql_query("DELETE FROM strategy WHERE goal_id=".$_GET['deletegoal']);
											}	
									$sql="SELECT * FROM goal 
												WHERE module_id='$module_id' 
												AND session_name='$session_name' 
												ORDER BY goal_id ASC";
										$result = mysql_query($sql) or die(mysql_error());																		
										while($row=mysql_fetch_array($result))
											{
												$goal_id	=$row['goal_id'];
												$goal_desc	=$row['goal_desc'];?>	
												<tr style="font-size:13px">
													<td><?php echo $y.") ".$goal_desc;?></td>
													<td><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletegoal(<?php echo  $goal_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>
													<td><button data-toggle="modal" data-target="#<?php echo $goal_id;?>" class="btn-u btn-u-red" type="button"><i class="fa fa-pencil"/></button></td>
													<div class="modal fade" id="<?php echo $goal_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title" id="myModalLabel4">Edit goal</h4>
																</div>
																<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
																	<div class="modal-body">
																		<div class="row" style="margin:10px;">
																				<input type="hidden" name="goal_id" value="<?php echo $goal_id;?>"></input>
																				<textarea class="form-control" name="goal_desc" required><?php echo $goal_desc;?></textarea>
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
												</tr>
											
												<?php
												$y++;
													
											}?>
							</table>
							<div class="row" style="margin-top:30px">
								<form action="dc_strategy.php" method="post">
									Insert New Goals :</br><input class="form-control" type="text" name="goal[]" required></input></br>
									<div class="input_fields_wrap">	</div>
									<button class="add_field_button">Add More Goals</button>
									<input type="submit" name="submit_goal" value="Next" style="float: right;"></input>	
								</form></br>
							</div><!-- END GOAL FORM -->

		</div>
	</div><!--/wrapper-->

		
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	<script type="text/javascript">
	
				function deletegoal(id)
					{
						if(confirm('Sure To Remove This Goal?'))
						{
							window.location.href='dc_goal.php?deletegoal='+id;
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

