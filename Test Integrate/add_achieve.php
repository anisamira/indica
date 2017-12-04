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
		
	?>

<div class="wrapper">


			<div id="content">	


<div class="topnav">
  <a href="work.php">Information</a>
  <a class="active" href="achieve.php">Achievement</a>
  <a href="doc.php">Deliverables</a>
  <a href="issue.php">Issue</a>
  <a href="financial.php">Financial</a>

</div>

<body>

<div style="width:100%; overflow:scroll; position:relative; margin-top:30px;">
<?php
if (isset($_POST['Achievement1']))
{ 
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="achievement1">

<?php
						$module_id=$_SESSION['module_id'];
						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
					    JOIN form ON form.module_id=goal.module_id
						WHERE NOT EXISTS(SELECT achievement.* FROM achievement 
						WHERE achievement.target_id=target.target_id AND achievement.year_id='$year_id' AND achievement.quarter=$quater) 
						AND goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						";

					$result = mysql_query($sql) or die(mysql_error());
					
	if (mysql_num_rows($result)>0)
	{
?>
<table class="table table-bordered">
									
						<col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="20%">
									<col width="30%">
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Target <?php echo $curyear;?></th>
										<th>Achievement <?php echo $curyear. ' Quater '.$quater;?></th>
									</tr>
									
<?php
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							
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
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $target;?>
								<input type="hidden" name="tar<?php echo $x;?>" value="<?php echo $target;?>"/>
								<td><input class="form-control" type="text" name="achievement<?php echo $x;?>" required/>
								   <input type="hidden" name="target<?php echo $x;?>" value="<?php echo $target_id;?>"/>
							</tr>
							
							<?php
						$x++;
						}

?>					
<tr>
<td colspan="5">
<input type="submit" name="Insert" value="Insert">
</td>
</tr>
</form>					

<?php						
	}
					
		else 
		{
			
	?>
 <div class="alert alert-warning alert-dismissable fade in">
	 <meta http-equiv="refresh" content="1;url=achieve.php" />
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>No achievement to be added</strong> Redirecting in 1 seconds...
  </div>

<?php	
		}

					?>	
</div>
</body>

<?php
}

if (isset($_POST['Insert'])){
 
 
 for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["target".$y]))
									{
										$error = 1;
									}
									else
									{	
	$achievement =$_POST['achievement'.$y];
	$targett=$_POST['tar'.$y];
	$value=$_POST['target'.$y];
	
$sql="INSERT INTO achievement (year_id,target_id,quarter,ach_desc,target,form_id, ach_status) VALUES ('$year_id','$value','$quater','$achievement','$targett','$form_id','pending')";
$result = mysql_query($sql) or die(mysql_error());  											   
												if (false === $result) 
												{
													echo mysql_error();
												}							
}
								}

?>
	<div class="alert alert-warning alert-dismissable fade in">
	 <meta http-equiv="refresh" content="1;url=achieve.php" />
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Insert!</strong> Redirecting in 1 seconds...
  </div>								
								
<?php								
								
								
								}
?>

	</div>
		</div>

<script>
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
     
});
 
$(".swipe-area").swipe({
    swipeStatus:function(event, phase, direction, distance, duration, fingers)
        {
            if (phase=="move" && direction =="right") {
                 $(".container").addClass("open-sidebar");
                 return false;
            }
            if (phase=="move" && direction =="left") {
                 $(".container").removeClass("open-sidebar");
                 return false;
            }
        }
});
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

</html>