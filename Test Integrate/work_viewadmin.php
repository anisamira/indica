<?php
	include('db.php');
	
		
 if(isset($_POST["Export"])){
	
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];		
	$module_name=$_POST['module_name'];
	
$sqliu="SELECT * FROM session where session_name='$sesi'";
		$result = mysql_query($sqliu) or die(mysql_error()); 
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
	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=kpi_information_'.$module_name.'_'.$sesi.'.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module ID','Session','Goal','Strategies', 'Action Plan', 'KPI','Operation Definition','Achievement 2014','Achievement 2015','Target '.$year1.'','Target '.$year2.'','Target '.$year3.'','Target '.$year4.'','Target '.$year5.'','Ownership','Data Source','Estimated Cost','Expected Financial Return'));  
      $sql = "SELECT goal.module_id,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,baseline.baseline1,baseline.baseline2,target.target1,target.target2,target.target3,target.target4,target.target5,reference.ownership,reference.data_source,reference.estimated_cost,reference.exp_fin_return
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
											AND form.form_status='approved'
											";

$result = mysql_query($sql) or die(mysql_error()); 
while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
 }
 
?>