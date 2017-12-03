<?php

include 'db.php';
if(isset($_POST["Export"]))
{
	
	$icu_year=$_POST['year'];


	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=ICU Reports_'.$icu_year.'.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Tahun','KPI','Sasaran', 'Pencapaian','KPI %'));
      $sql = "SELECT year.year_name,kpi.kpi_desc, achievement.ach_desc,achievement.target,achievement.quarter
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
						WHERE year.year_name='$icu_year'
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