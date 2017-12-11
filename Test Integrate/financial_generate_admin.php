<?php
	include('db.php');
	
 if(isset($_POST["Export"])){
	
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];		
    $module_name=$_POST['module_name'];
	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Financial_Report.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','Strategies', 'Action Plan', 'KPI','Operation Definition','Ownership','Data Sources','Estimated Cost','Expected Financial Return'));  
    $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,reference.ownership,reference.data_source,reference.estimated_cost,reference.exp_fin_return
											FROM goal
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
											JOIN reference ON reference.kpi_id=kpi.kpi_id
                                            JOIN form ON form.module_id=goal.module_id
										JOIN module ON module.module_id=goal.module_id											
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