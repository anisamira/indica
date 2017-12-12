<!DOCTYPE html>
<html>
<head>

<?php
	include('nav-noti.php');

	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	
		
	?>

<div class="wrapper">


			<div id="content">	
	
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<table class="table" width="20%">
					<tr>
						<td>
							<select class="form-control" name="sesi"><?php
								$sql=mysql_query("Select session_name from session");
								$row=mysql_num_rows($sql);
								while($row = mysql_fetch_array($sql))
								{
									$sesi=$row['session_name'];

									?>
									
									<option value="<?php  echo $sesi;?>"><?php  echo $sesi;?></option>
							      <?php
								}?>	
							</select> 
						</td>
						<td>
							<select class="form-control" name="moduleid"><?php
								$sql=mysql_query("Select module_id from module");
								$row=mysql_num_rows($sql);
								while($row = mysql_fetch_array($sql))
								{
									$moduleid=$row['module_id'];

									?>
									
									<option value="<?php  echo $moduleid?>"><?php  echo $moduleid;?></option>
							      <?php
								}?>	
							</select> 
							</td>
						<div class="form-actions">
							<td><button type="submit" class ="btn btn-sucess" name="send" value="">Go</button></td>
						</div>
					</tr>
				</table>
				</form>
	
	
<?php
if (isset($_POST['send']))
{
   $sesi=$_POST['sesi'];
   $moduleid=$_POST['moduleid'];
	
  $x=1;
  $sql=("SELECT DISTINCT goal.module_id,goal.session_name,module.module_name 
  FROM goal JOIN module ON goal.module_id=module.module_id 
  WHERE goal.session_name='$sesi'
  AND goal.module_id='$moduleid'
  ");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-hover"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
										<th></th>
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			$name=$row['module_name'];
			$moduleid=$row['module_id'];
			$sesi=$row['session_name'];
			
			
			
			
?>	
<tr>
                         <form class="pure-form pure-form-aligned" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td style="width:10%;"><button type="submit" name="submit" class="btn btn-primary">Generate</button></td>
							</form>

</tr>								   
												<?php
											}
	$x++;											

											?>
									</table>								

</div>

<?php		
 }	 
  else{
 	{
		//print error message
		echo 'No project found';
	}
	// once processing is complete
	// free result set
	
}
}

if (isset($_POST['submit']))
{  

$moduleid=$_POST['moduleid'];
$sesi=$_POST['sesi'];

	
		$sql		="SELECT * FROM session where session_name='$sesi'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
						}
					}
					else
					{
						echo "no data found";
					}
	
$x=1;
										$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* , form.*
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
											JOIN reference ON reference.kpi_id=kpi.kpi_id
                                            JOIN form ON form.module_id=goal.module_id											
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											AND form.form_status='approved' ";
											$result = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($result)>0){				

?>


<div class="table-responsive">  
								   <table class="table table-hover"> 
										
										<tr> 
											<th>No.</th>  
											<th>Goals</th>  
											<th>Strategies</th>
											<th>Action Plan</th>  
											<th>KPI</th>
											<th>Operation Definition</th>
											<th>Ownership</th> 
											<th>Data Source</th> 
											<th>Estimated Cost (RM)</th> 
											<th>Expected Financial Returns(RM)</th> 											
										</tr>


<?php
							
											while($row=mysql_fetch_array($result))
											{
												$goal_desc		=$row['goal_desc'];
												$strategy_desc	=$row['strategy_desc'];
												$actionplan_desc=$row['actionplan_desc'];
												$kpi_desc		=$row['kpi_desc'];
												$kpi_id			=$row['kpi_id'];
												$operation_def	=$row['operation_def'];
												$ownership		=$row['ownership'];
												$data_source	=$row['data_source'];
												$estimated_cost	=$row['estimated_cost'];
												$exp_fin_return	=$row['exp_fin_return'];								
												?>									
												<tr>  
													<td><?php echo $x;?></td>
													<td><?php echo $goal_desc;?></td>
													<td><?php echo $strategy_desc;?></td>
													<td><?php echo $actionplan_desc;?></td>
													<td><?php echo $kpi_desc;?>
														<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
													</td>
													<td><?php echo $operation_def;?></td>
													<td><?php echo $ownership;?></td>
													<td><?php echo $data_source;?></td>
													<td><?php echo $estimated_cost;?></td>
													<td><?php echo $exp_fin_return;?></td>
													
												</tr>
												<?php $x++;
											}

?>
</table>										
</div>
	 
<form class="pure-form pure-form-aligned" action="financial_generate_admin.php" method="post" name="Export"   
                      enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="module_name" value="<?php echo $module_name;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export">Download Excel</button>
                            </div>
                   </div>                    
            </form>  
<?php
}
else
{
	echo "No result";
}

											?>

<?php											
}



?>		

			</div>
    </div>
  
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
 
</div>

</div>
    </div>


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


