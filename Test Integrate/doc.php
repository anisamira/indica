<!DOCTYPE html>
<html>
<head>

<?php
	include('style_dc.php');
	include('sidebar.php');
	
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
	

	
	?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	


<div class="topnav">
  <a href="work.php">Information</a>
  <a href="achieve.php">Achievement</a>
  <a class="active" href="doc.php">Deliverables</a>
  <a href="issue.php">Issue</a>
  <a  href="financial.php">Financial</a>

</div>

<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_id;?>
 </div> 
  <body>

  

<?php
$module_id=$_SESSION['module_id'];
						$x=1;
						
						if(isset($_GET['deletedoc']))
											{
												$query	=mysql_query("DELETE FROM evidence WHERE ev_id=".$_GET['deletedoc']);
											}
						
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, evidence.*, achievement.*,year.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN evidence ON evidence.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='Approve'
						ORDER BY evidence.kpi_id
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						
						
						?>
				
				
				
<?php					
					if(mysql_num_rows($result) > 0)
					{
						?>
						  <table class="table table-bordered">
									<col width="5%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="25%">															

									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Year</th>	
										<th>Quater</th>
										<th>Achievement</th>									
										<th>Description</th>
										<th>File</th>
									</tr>
						
						
						<?php
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$files_field= $row['filename'];
                            $files_show= "Uploads/files/$files_field";
                            $descriptionvalue= $row['desc_file'];
							$achievement	=$row['ach_desc'];
							$quater			=$row['quarter'];
							$year			=$row['year_name'];
							$ev_id          =$row['ev_id'];
						?>

						
						
							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $year;?></td>
								<td><?php echo $quater;?></td>	
								<td><?php echo $achievement;?></td>								
								<td><?php echo $descriptionvalue;?></td>
								<td><?php echo "<a href='$files_show'>$files_field</a></div>"?></td>
								<td><input class="form-control" type="hidden" name="ev_id<?php echo $x;?>" value="<?php echo $ev_id;?>"></input><button class="btn-u btn-u-red" type="button" onclick="window.location.href='javascript:deletedoc(<?php echo  $ev_id; ?>)'" style="float:right"><i class="fa fa-trash-o"/></button></td>


							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
					{	
					
					echo "No evidence is uploaded yet";
					?>
					
					
					<form action="test_upload.php" method="post" name="evidence">
					<input type="submit" name="evidence" value="Addaa Evidence">
					</form>
				
					
					<?php
					}	
				    
						?>
					

</table> 

<form action="upload.php" method="post" name="addevidence">
					<input type="submit" name="Evidence" value="Add Evidence">
					<input type="submit" name="editevidence" value="Edit Evidence">
					</form>

	</div>
		</div>
	</div><!--/wrapper-->


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



<script type="text/javascript">
	
				function deletedoc (id)
					{
						if(confirm('Sure To Remove This Document?'))
						{
							window.location.href='doc.php?deletedoc='+id;
						return true;
						}
						
					}
					
				</script>



</html>


