<?php

include 'db.php';
if(isset($_POST["Export"]))
{
		 
	$moduleid=$_GET['moduleid'];
	$sesi=$_GET['sesi'];

	
      header('Content-Type:text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=issue.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('Module ID','Session','Goal','KPI', 'Target','Achievement','Punca Tidak Capai','Rancangan','Tarikh Siap','Tindakan','Tarikh Siap'));  
      $sql = "SELECT * FROM issue INNER JOIN achievement ON achievement.ach_id=issue.ach_id JOIN ";

	$result = mysql_query($sql) or die(mysql_error()); 

	while($row = mysql_fetch_assoc($result))          
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);   
	}


?>