
<?php
	include('db.php');

	$output = '';
if(isset($_POST["export"]))
{
	
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];	
	
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
				
					if(mysql_num_rows($result) > 0)
					{	
$output .= '

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
';				

	while($row=mysql_fetch_array($result))
						{
							 $output .= '
							 
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


							</tr>
							 
					
							 ';
							  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

	?>