
<?php
	include('db.php');

	

	function get_all_records(){
	
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];	
	

?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-right:300px;margin-top:43px;">	

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

											?>
									</table>								

</div>

</div>

</div>
    </div>


<?php

	}

 if(isset($_POST["Export"])){
		 
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];

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
	
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=kpi_information.csv');  
      $output = fopen("php://output", "a"); 
      fputcsv($output, array('Module ID','Session','Goal','Strategies', 'Action Plan', 'KPI','Operation Definition','Achievement 2014','Achievement 2015','Target $year1','Target $year2','Target $year3','Target $year4','Target $year5','Ownership','Data Source','Estimated Cost','Expected Financial Return'));  
      $sql = "SELECT goal.module_id,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,baseline.baseline1,baseline.baseline2,target.target1,target.target2,target.target3,target.target4,target.target5,reference.data_source,reference.estimated_cost,reference.exp_fin_return
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

while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
 }
	
?>

<?php

if(isset($_POST["Exporat"]))
{
	
		 
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];

	
   $sql = "SELECT goal.module_id,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,baseline.baseline1,baseline.baseline2,target.target1,target.target2,target.target3,target.target4,target.target5,reference.data_source,reference.estimated_cost,reference.exp_fin_return
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
        
 if(mysql_num_rows($result) > 0)
 {
  $output .= '

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
  ';
  while($row = mysql_fetch_array($result))
  {
   $output .= '
    <tr>  
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
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=kpi_information.xls');
  echo $output;
 }
}
?>	