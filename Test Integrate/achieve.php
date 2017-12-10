<!DOCTYPE html>
<html>
	<head>
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
	</head>

<?php
	//include('style_dc.php');
	include('sidebar.php');
	
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
	 $date_q= date ("06/30/Y");
	 if ($date_now<=$date_q)
	{
		$quater=1;
	}
	else
		$quater=2;	
	
	
	$user_id		=$_SESSION['user_id'];
	$sql			=mysql_query("SELECT * FROM session where session_status='1'"); 
					if(mysql_num_rows($sql)>0)
					{
						$module_id		=$_SESSION['module_id'];
						while($row=mysql_fetch_array($sql))
						{
							$_SESSION['session_name']	=$row['session_name'];
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
						}
						$session_name	=$_SESSION['session_name'];	
						$sql2			= mysql_query("SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'"); 
						if(mysql_num_rows($sql2)>0)
						{
							while($row2=mysql_fetch_array($sql2))
							{
								$_SESSION['form_status']	=$row2['form_status'];
								$_SESSION['form_id']		=$row2['form_id'];
							}
							$form_status	=$_SESSION['form_status'];
							$form_id		=$_SESSION['form_id'];
						}
						else
						{
							echo "no data found";
						}	

						$sql3	= mysql_query("SELECT * FROM module WHERE module_id='$module_id'");
						if(mysql_num_rows($sql3)>0)
						{
							while($row=mysql_fetch_array($sql3))
							{
								$module_name=$row['module_name'];		
							}
							
						}
						else
						{
							echo "";
						}	
					}
					else
					{
						echo "";
					}
	
	
	
			  $sql4			= mysql_query("SELECT * FROM year WHERE year_name='$curyear'");
								if(mysql_num_rows($sql4)>0)
								{
									while($row4=mysql_fetch_array($sql4))
									{
										$year= $row4['year_name'];
										$year_id=$row4['year_id'];
									}			
								}
								else
								{
									echo "";
								}
					
	 				

	?>



	
<div class="wrapper">
	<!-- !PAGE CONTENT! -->
	<div id="content">

			<div style="padding-left:16px">
			  &nbsp&nbspWELCOME TO <?=$module_name?> <?=$session_name?> YEAR <?=$year?>
			  <br>
			</div>
			<br>			
			<div class="topnav">
			  <a href="work.php">Information</a>
			  <a class="active" href="achieve.php">Achievement</a>
			  <a href="doc.php">Deliverables</a>
			  <a href="issue.php">Issue</a>
			  <a href="financial.php">Financial</a>
			</div>
			</br>
			<table>
				<tr>
					<td>
						<form class="pure-form pure-form-aligned" action="add_achieve.php" method="post">
							<input type="submit" name="Achievement1" value="Check for an Achievement" >
						</form>
					</td>
					<td>	
					<?php
					$sql5=mysql_query("SELECT * 
										FROM achievement 
										WHERE form_id='$form_id' AND quarter='$quater' AND ach_status='reject'");
										if(mysql_num_rows($sql5)>0)
											{	?>
												<form class="pure-form pure-form-aligned" action="add_achieve.php" method="post">
													<input type="submit" name="update" value="Update Records" >
												</form>	
												</td>
												<div class="alert alert-info fade in">
													<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
													<strong>Information</strong> 
													<ul>
														<li style="color:#000">Some of Your achievement are rejected. You need to update the records.</li>
													</ul>
												</div><?php				
											}?>
							
										</tr>
									</table>	


									

			





					
<?php
$sql6=mysql_query("SELECT * 
		FROM achievement 
		WHERE form_id='$form_id' AND quarter='$quater' AND ach_status='pending'"); 
					if(mysql_num_rows($sql6)>0)
					{	
?>
		<div class="alert alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		<strong>Information</strong> 
		<ul>
			<li>Waiting for approval.</li>
			<li>Contact your Data Manager for the data approval.</li>

		</ul>
	</div>
		<?php				
		}
		
		?>

<br>


<button class="accordion"><center><?=$year1?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></center>
 
</button>
<div class="panel">
 
 <?php
	
							
						$sql7="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND achievement.ach_status='approve'
						AND year.year_name='$year1'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result7 = mysql_query($sql7) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result7) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result7 = mysql_query($sql7) or die(mysql_error()); 
						while($row=mysql_fetch_array($result7))
						{
							$kpi_id			=$row7['kpi_id'];
							$goal_desc		=$row7['goal_desc'];
							$kpi_desc		=$row7['kpi_desc'];
							$target_id		=$row7['target_id'];
							$achievement	=$row7['ach_desc'];
							$year           =$row7['year_name'];
							$quarterq       =$row7['quarter'];
							$yearid         =$row7['year_id'];
							
							
							
							$target1= $row7['target1'];
							$target2= $row7['target2'];
							$target3= $row7['target3'];
							$target4= $row7['target4'];
							$target5= $row7['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
	
					<?php
					}	
				    
						?>



</div>

 

<button class="accordion"><center><?=$year2?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></center></button>
<div class="panel">

<?php
	
							
						$sql8="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND achievement.ach_status='approve'
						AND year.year_name='$year2'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result8 = mysql_query($sql8) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result8) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row8['kpi_id'];
							$goal_desc		=$row8['goal_desc'];
							$kpi_desc		=$row8['kpi_desc'];
							$target_id		=$row8['target_id'];
							$achievement	=$row8['ach_desc'];
							$year           =$row8['year_name'];
							$quarterq       =$row8['quarter'];
							$yearid         =$row8['year_id'];
							
							
							
							$target1= $row8['target1'];
							$target2= $row8['target2'];
							$target3= $row8['target3'];
							$target4= $row8['target4'];
							$target5= $row8['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
							
							<?php
						$x++;
						}
						?>
						</table>
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
					

	
	
					
					<?php
					}	
				    
						?>


						</div> 

						
<button class="accordion"><center><?=$year3?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></center></button>
<div class="panel">
 
 <?php
	
							
						$sql9="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND achievement.ach_status='approve'
						AND year.year_name='$year3'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result9 = mysql_query($sql9) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result9) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$result9 = mysql_query($sql9) or die(mysql_error()); 
						while($row9=mysql_fetch_array($result9))
						{
							$kpi_id			=$row9['kpi_id'];
							$goal_desc		=$row9['goal_desc'];
							$kpi_desc		=$row9['kpi_desc'];
							$target_id		=$row9['target_id'];
							$achievement	=$row9['ach_desc'];
							$year           =$row9['year_name'];
							$quarterq       =$row9['quarter'];
							$yearid         =$row9['year_id'];
							
							
							
							$target1= $row9['target1'];
							$target2= $row9['target2'];
							$target3= $row9['target3'];
							$target4= $row9['target4'];
							$target5= $row9['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				

					
					<?php
					}	
				    
						?>



</div>


<button class="accordion"><center><?=$year4?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></center></button>
<div class="panel">
 
 <?php
	
							
						$sqls="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND achievement.ach_status='approve'
						AND year.year_name='$year4'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$results = mysql_query($sqls) or die(mysql_error()); 

						
						
						if(mysql_num_rows($results) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$results = mysql_query($sqls) or die(mysql_error()); 
						while($rows=mysql_fetch_array($results))
						{
							$kpi_id			=$rows['kpi_id'];
							$goal_desc		=$rows['goal_desc'];
							$kpi_desc		=$rows['kpi_desc'];
							$target_id		=$rows['target_id'];
							$achievement	=$rows['ach_desc'];
							$year           =$rows['year_name'];
							$quarterq       =$rows['quarter'];
							$yearid         =$rows['year_id'];
							
							
							
							$target1= $rows['target1'];
							$target2= $rows['target2'];
							$target3= $rows['target3'];
							$target4= $rows['target4'];
							$target5= $rows['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				
	
					
					<?php
					}	
				    
						?>



</div>


<button class="accordion"><center><?=$year5?><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></center></button>
<div class="panel">
 
 <?php
	
							
						$sqls1="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND achievement.ach_status='approve'
						AND year.year_name='$year5'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$results1 = mysql_query($sqls1) or die(mysql_error()); 

						
						
						if(mysql_num_rows($results1) > 0)
					{
						
						$x=1;
						
						?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Quater</th>
										<th>Target</th>
										<th>Achievement</th>
									</tr>
<?php					
						$results1 = mysql_query($sqls1) or die(mysql_error()); 
						while($rows1=mysql_fetch_array($results1))
						{
							$kpi_id			=$rows1['kpi_id'];
							$goal_desc		=$rows1['goal_desc'];
							$kpi_desc		=$rows1['kpi_desc'];
							$target_id		=$rows1['target_id'];
							$achievement	=$rows1['ach_desc'];
							$year           =$rows1['year_name'];
							$quarterq       =$rows1['quarter'];
							$yearid         =$rows1['year_id'];
							
							
							
							$target1= $rows1['target1'];
							$target2= $rows1['target2'];
							$target3= $rows1['target3'];
							$target4= $rows1['target4'];
							$target5= $rows1['target5'];
							
						
if ($year==$year1)
{
	$target=$target1;
}
elseif 	($year==$year2)
{
	$target=$target2;
}
elseif 	($year==$year3)
{
	$target=$target3;
}
elseif 	($year==$year4)
{
	$target=$target4;
}
elseif 	($year==$year5)
{
	$target=$target5;
}	
							

						?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quarterq;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
							</tr>
						
							<?php
						$x++;
						}
						?>
						</table>
					<?php
					}	
						else
						{
						echo "No Achievement is recorded";
					?>
				
	
					<?php
					}	
				    
						?>



			</div>
														


						
						
</div>
<!-- end of year 1-->

	</div>



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