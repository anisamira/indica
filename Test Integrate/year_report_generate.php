<?php
	include('db.php');
	
 if(isset($_POST["Export"])){
	
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];		
	$year=$_POST['year'];
    $module_name=$_POST['module_name'];
	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Yearly_Report '.$year.'_'.$module_name.'_'.$sesi.'.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Year','Module Name','Session','Goal','Strategies', 'Action Plan', 'KPI','Operation Definition','Target '.$year.'','Achievement '.$year.'','Ownership','Data Source','Estimated Cost','Expected Financial Return'));  
      $sql = "SELECT year.year_name, module.module_name,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,achievement.target,achievement.ach_desc,reference.ownership,reference.data_source,reference.estimated_cost,reference.exp_fin_return
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
											JOIN module ON module.module_id=goal.module_id
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											AND form.form_status='approved'
											AND year.year_name='$year'
											";

$result = mysql_query($sql) or die(mysql_error()); 
while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
 }
 
 if(isset($_POST["Exadmin"])){
	
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];		
	$year=$_POST['year'];
    $module_name=$_POST['module_name'];
	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Yearly_Report.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Year','Module Name','Session','Goal','Strategies', 'Action Plan', 'KPI','Operation Definition','Target '.$year.'','Achievement '.$year.'','Ownership','Data Source','Estimated Cost','Expected Financial Return'));  
       $sql = "SELECT year.year_name, module.module_name,goal.session_name,goal.goal_desc,strategy.strategy_desc,actionplan.actionplan_desc,kpi.kpi_desc,kpi.operation_def,achievement.target,achievement.ach_desc,reference.ownership,reference.data_source,reference.estimated_cost,reference.exp_fin_return
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
											JOIN module ON module.module_id=goal.module_id
											WHERE goal.module_id='$moduleid'
											AND goal.session_name='$sesi'
											AND form.form_status='approved' 
											AND year.year_name='$year'
											";

$result = mysql_query($sql) or die(mysql_error()); 
while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
 }
 
?>
