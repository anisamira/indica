<?php

	require_once 'config.php';


	
function get_all_records(){
    $con = getdb();
  $Sql = "SELECT goal.*,strategies.*,actionplan.*,kpioperation.* FROM goal JOIN strategies ON strategies.goal_id=goal.goal_id JOIN actionplan ON actionplan.strategies_id=strategies.strategies_id JOIN kpioperation ON kpioperation.actionplan_id=actionplan.actionplan_id";
  $result = mysqli_query($con, $Sql) or die(mysqli_error($con)); 

	if (false === $result) {
    echo mysql_error();
}

   if (mysqli_num_rows($result) > 0) {  
  echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>";	
  echo
		'<tr><td><b>Module ID</b></td><td><b>Session</b><td><b>Goal</b></td><td><b>Strategies</b></td><td><b>Action Plan</b></td><td><b>Operation Definition</b></td><td><b>KPI</b></td></td></tr>';
		
		// iterate over record set
		// print each field
		while ($row=$result->fetch_assoc())
		{
		echo '<tr>';
    echo '<td class="td1">' . $row['module_id'] . '</td>';
	echo '<td class="td1">' . $row['session'] . '</td>';
	echo '<td class="td1">' . $row['goals'] . '</td>';
	echo '<td class="td1">' . $row['strategies'] . '</td>';
	echo '<td class="td1">' . $row['actionplan'] . '</td>';
	echo '<td class="td1">' . $row['operation_definition'] . '</td>';
	echo '<td class="td1">' . $row['kpi'] . '</td>';
		echo '</tr>';
		}
		echo '</table>';
     
}
else {
     echo "you have no records";

} 
}





 if(isset($_POST["Export"])){
		 
		 
	  $con=getdb(); 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=kpioperation.csv');  
      $output = fopen("php://output", "a"); 
      fputcsv($output, array('Module ID', 'Session', 'Goal', 'Strategies', 'Action Plan','Operation Definition', 'KPI'));  
      $sql = "SELECT goal.module_id,goal.session,goal.goals,strategies.strategies,actionplan.actionplan,kpioperation.kpi,kpioperation.operation_definition FROM goal JOIN strategies ON strategies.goal_id=goal.goal_id JOIN actionplan ON actionplan.strategies_id=strategies.strategies_id JOIN kpioperation ON kpioperation.actionplan_id=actionplan.actionplan_id";
      $result = mysqli_query($con, $sql);  
      while($row =$result->fetch_assoc())  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  

 ?>
 