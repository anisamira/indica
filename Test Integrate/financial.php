<!DOCTYPE html>
<html>
<head>

<?php
	include('style_dc.php');
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
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
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
  <a href="issue.php">Issue</a>
  <a class="active" href="financial.php">Financial</a>

</div>

<body>
<?php
$module_id=$_SESSION['module_id'];
						$x=1;

										$sql="
											SELECT SUM(reference.estimated_cost) AS cost, SUM(reference.exp_fin_return) AS income
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
                                            JOIN form ON form.module_id=goal.module_id
											JOIN reference ON reference.kpi_id=kpi.kpi_id
											WHERE goal.module_id='$module_id'
											AND goal.session_name='$session_name'
											";
											$result = mysql_query($sql) or die(mysql_error()); 
											while($row=mysql_fetch_array($result))
											{
											
											$cost=$row['cost'];
											$return=$row['income'];

											?>
											
											
												<div class="card">
												  <div class="card-header">
													Total Estimated Cost
												  </div>
												  <div class="card-block">
													<h4 class="card-title">RM  <?php echo $cost;?></h4>
												  </div>
												</div>
											<div class="card">
												  <div class="card-header">
													Total Expected Return
												  </div>
												  <div class="card-block">
													<h4 class="card-title">RM  <?php echo $return;?></h4>
												  </div>
												</div>
											
											
										<?php	
											}
						

						
?>
</body>


	</div>
		</div>
	</div><!--/wrapper-->

	<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 20%;
	height: 40%;
    background-color: #FFFACD;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.news
{
    column-count: 2;
}
</style>
	
</html>


