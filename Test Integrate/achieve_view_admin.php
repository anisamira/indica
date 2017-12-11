<?php

include 'db.php';


if(isset($_POST["Export"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement_view.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','KPI', 'Year','Quater','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN module ON module.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}
if(isset($_POST["Export1"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year1'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','KPI', 'Year','Quater','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
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
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}		
if(isset($_POST["Export2"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year2'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','KPI', 'Year','Quater','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN module ON module.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$moduleid'
						AND form.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}	
	
if(isset($_POST["Export3"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year3'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','KPI', 'Year','Quater','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN module ON module.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
                        WHERE goal.module_id='$moduleid'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND year.year_name='$year'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}		
	
if(isset($_POST["Export4"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year4'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module Name','Session','Goal','KPI', 'Year','Quater ','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
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
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}		
	
if(isset($_POST["Export5"]))
{
		 
	$moduleid=$_POST['moduleid'];
	$sesi=$_POST['sesi'];
	$year=$_POST['year5'];
	$module_name=$_POST['modulename'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=achievement.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module ID','Session','Goal','KPI', 'Year','Quater','Achievement '.$year.''));  
      $sql = "SELECT module.module_name,goal.session_name,goal.goal_desc,kpi.kpi_desc,year.year_name, achievement.quarter,achievement.ach_desc
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
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)
						";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}	
	

?>