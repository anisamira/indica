<!DOCTYPE html>
<html>
<head>

<?php
	include('style_dc.php');
	include('nav-noti.php');

	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	
		$curyear=date ('Y');
    $date_now=date ("m/d/Y");
	$date_q= date ("06/30/Y");
	if ($date_now<=$date_q)
	{
		$quater=1;
	}
	else
		$quater=2;				
				

	?>

<div class="wrapper">


			<div id="content">	


<div class="topnav">
  <a href="work.php">Information</a>
  <a href="achieve.php">Achievement</a>
  <a  href="doc.php">Deliverables</a>
  <a class="active" href="issue.php">Issue</a>
  <a  href="financial.php">Financial</a>

</div>

<body>

<?php
if (isset($_POST['Issue']))
{

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
	
	$sql			= "SELECT * FROM target";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							
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
							
						}
						
					}
					else
					{
						echo "no data found";
					}				
					
					
					
					
?>

<form class="pure-form pure-form-aligned" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="evidence" enctype="multipart/form-data">



<?php
						$x=1;	
						$sql2="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*,year.*
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
                        WHERE NOT EXISTS(SELECT issue.*
						FROM issue WHERE issue.ach_id=achievement.ach_id)
                        AND goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.module_id='$module_id'
						AND form.form_status='approved'
						AND achievement.year_id='$year_id'
						AND achievement.quarter='$quater'
                        AND achievement.ach_desc < achievement.target
                        
						";
						
						$result2 = mysql_query($sql2) or die(mysql_error());

						if (mysql_num_rows($result2)>0)
						{


?>
<div class="table-responsive"> 
							<table class="table table-hover">
								<col width=14px;>
								<col width=14px;>
								<col width=14px;>
								<col width=14px;>
								<col width=14px;>
								<col width=14px;>
									<col width=174px;>
									<col width=174px;>
									<col width=134px;>
									<col width=174px;>
									<col width=134px;>
									
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>Punca tidak capai sasaran</th>
									    <th>Rancangan Tindakan Pembetulan</th>
									    <th>Tarikh Siap</th>
										<th>Rancangan Tindakan Pencegahan</th>
										<th>Tarikh Siap</th>
									</tr>
<?php
					
						while($row2=mysql_fetch_array($result2))
						{
							$ach_id			=$row2['ach_id'];
							$goal_desc		=$row2['goal_desc'];
							$kpi_desc		=$row2['kpi_desc'];
							$achievement	=$row2['ach_desc'];
							$quater			=$row2['quarter'];
							$targett		=$row2['target'];
							$yearer			=$row2['year_name'];
								
							$target1= $row2['target1'];
							$target2= $row2['target2'];
							$target3= $row2['target3'];
							$target4= $row2['target4'];
							$target5= $row2['target5'];
							
						
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
								<td><?php echo $yearer;?></td>
								<td><?php echo $targett;?></td>
							    <td><?php echo $achievement;?></td>
								<td><input class="form-control" style="width:156px;" type="text" name="reason<?php echo $x;?>"/>
								   <input type="hidden" name="ach<?php echo $x;?>" value="<?php echo $ach_id;?>"/>
								 <td><input class="form-control" style="width:156px;" type="text" name="pembetulan<?php echo $x;?>"/>
								   <input type="hidden" name="ach<?php echo $x;?>" value="<?php echo $ach_id;?>"/>
								<td><input class="form-control" type="date" name="date_pembetulan<?php echo $x;?>"/>
								   <input type="hidden" name="ach<?php echo $x;?>" value="<?php echo $ach_id;?>"/>   
							<td><input class="form-control" style="width:156px;" type="text" name="pencegahan<?php echo $x;?>"/>
								   <input type="hidden" name="ach<?php echo $x;?>" value="<?php echo $ach_id;?>"/>
								<td><input class="form-control" type="date" name="date_pencegahan<?php echo $x;?>"/>
								   <input type="hidden" name="ach<?php echo $x;?>" value="<?php echo $ach_id;?>"/>   
							</tr>
							<?php
						$x++;
						}
?>						
						</table>
						</div>

<br>
<td>
<input type="submit" name="Add" value="Add">
</td>
</form>
						
						
<?php					
	}
						else{
			?>			
						<div class="alert alert-warning alert-dismissable fade in">
	 <meta http-equiv="refresh" content="1;url=issue.php" />
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>No issue to be added</strong> Redirecting in 1 seconds...
  </div>	
				<?php		
						
						}
}
						?>




</body>
<?php


if (isset($_POST['Add'])){
 
 
 for($y=1; $y<=50; $y++)
								{
									if (empty($_POST["ach".$y]))
									{
										$error = 1;
									}
									else
									{	
	$value=$_POST['ach'.$y];
	$reason =$_POST['reason'.$y];
	$pembetulan =$_POST['pembetulan'.$y];
	$date_pembetulan =$_POST['date_pembetulan'.$y];
	$pencegahan =$_POST['pencegahan'.$y];
	$date_pencegahan =$_POST['date_pencegahan'.$y];
	
$sql="INSERT INTO issue (ach_id,reason,pembetulan,date_pembetulan,pencegahan,date_pencegahan) VALUES ('$value','$reason','$pembetulan','$date_pembetulan','$pencegahan','$date_pencegahan')";
$result = mysql_query($sql) or die(mysql_error());  											   
												if (false === $result) 
												{
													echo mysql_error();
												}							
}
								}

?>
	<div class="alert alert-warning alert-dismissable fade in">
	 <meta http-equiv="refresh" content="1;url=issue.php" />
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


