<?php

	require_once 'config.php';


	
function get_all_records(){
    $con = getdb();
  $Sql = "SELECT goal.*,strategies.*,actionplan.*,target.* FROM goal JOIN strategies ON strategies.goal_id=goal.goal_id JOIN actionplan ON actionplan.strategies_id=strategies.strategies_id JOIN target ON target.actionplan_id=actionplan.actionplan_id";
  $result = mysqli_query($con, $Sql) or die(mysqli_error($con)); 

	if (false === $result) {
    echo mysql_error();
}

   if (mysqli_num_rows($result) > 0) {  
  echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>";	
  echo
		'<tr><td><b>Module ID</b></td><td><b>Goal</b></td><td><b>Strategies</b></td><td><b>Action Plan</b></td><td><b>Target Year</b></td><td><b>Target</b></td></td></tr>';
		
		// iterate over record set
		// print each field
		while ($row=$result->fetch_assoc())
		{
		echo '<tr>';
    echo '<td class="td1">' . $row['module_id'] . '</td>';
	echo '<td class="td1">' . $row['goals'] . '</td>';
	echo '<td class="td1">' . $row['strategies'] . '</td>';
	echo '<td class="td1">' . $row['actionplan'] . '</td>';
	echo '<td class="td1">' . $row['target_year'] . '</td>';
	echo '<td class="td1">' . $row['target'] . '</td>';
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
      header('Content-Disposition: attachment; filename=Target.csv');  
      $output = fopen("php://output", "a"); 
      fputcsv($output, array('Module ID', 'Goal', 'Strategies', 'Action Plan', 'Target Year','Target'));  
      $sql = "SELECT goal.module_id,goal.goals,strategies.strategies,actionplan.actionplan,target.target_year,target.target FROM goal JOIN strategies ON strategies.goal_id=goal.goal_id JOIN actionplan ON actionplan.strategies_id=strategies.strategies_id JOIN target ON target.actionplan_id=actionplan.actionplan_id";
     $result = mysqli_query($con, $sql);  
      while($row =$result->fetch_assoc())  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  

 ?>
 