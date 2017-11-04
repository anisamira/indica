
<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	include('script.php');
	$module_id=$_SESSION['module_id'];
	$session_name=$_SESSION['session_name'];

?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:20px;">
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
							</div>

						<!-- END GOAL FORM -->
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

