<!DOCTYPE html>
<html>
<head>

<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$curyear=date ('Y');
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];

						}
						$session_name	=$_SESSION['session_name'];
					}
					else
					{
						echo "no data found";
					}
	
	$sql			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['form_status']	=$row['form_status'];
							$_SESSION['form_id']		=$row['form_id'];
						}
						$form_status	=$_SESSION['form_status'];
						$form_id		=$_SESSION['form_id'];
					}
					else
					{
						echo "no data found";
					}
	
    $sql			= "SELECT * FROM year WHERE year_name='$curyear'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year= $row['year_name'];
							$year_id=$row['year_id'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}
	 $sql			= "SELECT * FROM module WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$module_name=$row['module_name'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}					
					
	
	?>

		
<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ccc; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}

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
<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	

	<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_name?> <?=$session_name;?> YEAR <?=$year?>
  <br>
</div>

<br>
<div class="topnav">
  <a href="work.php">Information</a>
  <a href="achieve.php">Achievement</a>
  <a  href="doc.php">Deliverables</a>
  <a class="active" href="issue.php">Issue</a>
  <a  href="financial.php">Financial</a>

</div>

<body>


                    <form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Check for an Issue">
					</form>


<button class="accordion">ISSUE on <?=$year1?></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name='$year1'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-bordered">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<?php					
					}


					
					else
					{
					
					echo "You Have an Issue to be updated";
							
						?>

					<form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Add Issue" target="blank">
					</form>
<?php
					
					}
						
						?>

</div>
					

<button class="accordion">ISSUE on <?=$year2?></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name='$year2'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-bordered">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<?php					
					}


					
					else
					{
					
					echo "You Have an Issue to be updated";
							
						?>

					<form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Add Issue" target="blank">
					</form>
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year3?></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name='$year3'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-bordered">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<?php					
					}


					
					else
					{
					
					echo "You Have an Issue to be updated";
							
						?>

					<form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Add Issue" target="blank">
					</form>
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year4?></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name='$year4'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-bordered">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<?php					
					}


					
					else
					{
					
					echo "You Have an Issue to be updated";
							
						?>

					<form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Add Issue" target="blank">
					</form>
<?php
					
					}
						
						?>

</div>
					
<button class="accordion">ISSUE on <?=$year5?></button>
<div class="panel">

<?php

						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, issue.*, year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id						
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND year.year_name='$year5'
						HAVING achievement.ach_desc < achievement.target
						";
						$result = mysql_query($sql) or die(mysql_error());

						
?>
                     
<?php				
					if (mysql_num_rows($result)>0)
					{
					?>
<div class="table-responsive"> 					
						<table class="table table-bordered">
									
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>

						

		<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$achievement	=$row['ach_desc'];
							$reason			=$row['reason'];
							$pembetulan		=$row['pembetulan'];
							$pembetulan_date			=$row['date_pembetulan'];
							$pencegahan			=$row['pencegahan'];
							$pencegahan_date			=$row['date_pencegahan'];
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
if ($curyear==$year&&$year==$year1)
{
	$target=$target1;
}
elseif 	($curyear==$year&&$year==$year2)
{
	$target=$target2;
}
elseif 	($curyear==$year&&$year==$year3)
{
	$target=$target3;
}
elseif 	($curyear==$year&&$year==$year4)
{
	$target=$target4;
}
elseif 	($curyear==$year&&$year==$year5)
{
	$target=$target5;
}								

						?>

							<tr>  
								<td style="width:25px;"><?php echo $x;?></td>
								<td style="width:165px;"><?php echo $goal_desc;?></td>
								<td style="width:165px;"><?php echo $kpi_desc;?></td>
								<td style="width:165px;"><?php echo $target;?></td>
							    <td style="width:165px;"> <?php echo $achievement;?></td>
								<td style="width:165px;"><?php echo $reason;?></td>
								<td style="width:165px;"><?php echo $pembetulan;?></td>
								<td style="width:190px;"><?php echo $pembetulan_date;?></td>
							    <td style="width:165px;"><?php echo $pencegahan;?></td>
								<td style="width:190px;"><?php echo $pencegahan_date;?></td>

								
							</tr>
							<?php
						$x++;
		
		}

?>
		</table>
</div>
<?php					
					}


					
					else
					{
					
					echo "You Have an Issue to be updated";
							
						?>

					<form action="add_issue.php" method="post">
					<input type="submit" name="Issue" value="Add Issue" target="blank">
					</form>
<?php
					
					}
						
						?>

</div>
					






</body>


	</div>
		</div>
	</div><!--/wrapper-->


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>



</html>


