<?php

include 'db.php';
if(isset($_POST["Export"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year'];
	$module_name=$_POST['modulename'];
	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=issue_'.$module_name.'_'.$year.'.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module ID','Session','Goal','KPI', 'Target','Achievement','Punca Tidak Capai','Rancangan','Tarikh Siap','Tindakan','Tarikh Siap'));  
      $sql = "SELECT goal.module_id,goal.session_name,goal.goal_desc,kpi.kpi_desc,achievement.target,achievement.ach_desc,issue.reason,issue.pembetulan,issue.date_pembetulan,issue.pencegahan,issue.date_pencegahan 
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
						HAVING achievement.ach_desc < achievement.target";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}


?>