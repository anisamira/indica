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
	
	$sql			="SELECT * FROM session where session_status='1'";
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
	
$moduleid=$_GET['moduleid'];
$sesi=$_GET['sesi'];
	
if (!isset($_GET['moduleid'])){
	
	echo "luar";
	
	?>

	
  
<?php
  }
else{
	
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];

	?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	



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
</style>
</head>
<body>

<h2>Workbench <?php echo $moduleid;?> <?php echo $sesi?></h2>

<button class="accordion">Information</button>
<div class="panel">



										<?php
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
								   <table class="table table-bordered"> 
										<tr>
											<th></th>
											<th colspan="5"> </br> </th>						
											<th colspan="2">BASELINE</th>
											<th colspan="5">TARGET</th>
											<th colspan="4">REFERENCE</th>
										</tr>
										<tr> 
											<th>No.</th>  
											<th>Goals</th>  
											<th>Strategies</th>
											<th>Action Plan</th>  
											<th>KPI</th>
											<th>Operation Definition</th>
											<th>Achievement 2014</th>  
											<th>Achievement 2015</th>
											<th>Target 2016</th>  
											<th>Target 2017</th>  
											<th>Target 2018</th>  
											<th>Target 2019</th>  
											<th>Target 2020</th>
											<th>Ownership</th> 
											<th>Data Source</th> 
											<th>Estimated Cost (RM)</th> 
											<th>Expected Financial Returns</th> 											
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
												$baseline1		=$row['baseline1'];
												$baseline2		=$row['baseline2'];
												$target1		=$row['target1'];
												$target2		=$row['target2'];
												$target3		=$row['target3'];
												$target4		=$row['target4'];
												$target5		=$row['target5'];
												$ownership		=$row['ownership'];
												$data_source	=$row['data_source'];
												$estimated_cost	=$row['estimated_cost'];
												$exp_fin_return	=$row['exp_fin_return'];
						$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
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
													<td><?php echo $x;?></td>
													<td><?php echo $goal_desc;?></td>
													<td><?php echo $strategy_desc;?></td>
													<td><?php echo $actionplan_desc;?></td>
													<td><?php echo $kpi_desc;?>
														<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
													</td>
													<td><?php echo $operation_def;?></td>
													<td><?php echo $baseline1;?></td>
													<td><?php echo $baseline2;?></td>
													<td><?php echo $target1;?></td>
													<td><?php echo $target2;?></td>
													<td><?php echo $target3;?></td>
													<td><?php echo $target4;?></td>
													<td><?php echo $target5;?></td>
													<td><?php echo $ownership;?></td>
													<td><?php echo $data_source;?></td>
													<td><?php echo $estimated_cost;?></td>
													<td><?php echo $exp_fin_return;?></td>
												</tr>
												<?php $x++;
											} 
}

else
{
	echo "No result";
}
											?>
									</table>								




</div>

 <form class="form-horizontal" action="work_view.php?moduleid=$moduleid&sesi=$sesi" method="get" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Download Excel</button>
                            </div>
                   </div>                    
            </form>           


</div>

<button class="accordion">Achievement</button>
<div class="panel">
										
<?php
						
						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
	
						
						?>
						<table class="table table-bordered">
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
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							
							
							
							$target1= $row['target1'];
							$target2= $row['target2'];
							$target3= $row['target3'];
							$target4= $row['target4'];
							$target5= $row['target5'];
							
						
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
					}
else
{
	echo "No result";
}

?>
</table>					
</div>

<button class="accordion">Deliverables</button>
<div class="panel">
 <?php

						$x=1;
					
						
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*, achievement.*, evidence.*, year.*
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
						JOIN evidence ON evidence.ach_id=achievement.ach_id
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						ORDER BY evidence.ach_id AND achievement.year_id
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
								<td><?php echo "<a href='$files_show'>$files_field</a>"?></td>


							</tr>
							<?php
						$x++;
						}
						
				
					
					}
					else
{
	echo "No result";
}
					?>

</table> 
 
 </div>

<button class="accordion">Issue</button>
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
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
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
	echo "No result";
}
?>
</div>

<button class="accordion">Financial</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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

</body>
</html>


 
</div>

</div>
    </div>



</html>

<!-- this is the end of this doc  >
<?php
// end 
}

?>

