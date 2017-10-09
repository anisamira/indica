<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #332;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>


<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<?php
session_start();
$code=$_SESSION['code'];
require_once 'config.php';
if (!isset($_SESSION['code'])){
	
	header("location:menu.php");
}
else{
?>

<div class="container">
    <div id="sidebar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="workbench.php">Workbench</a></li>
            <li><a href="report.php">Reports</a></li>
                <li><a href="icu.php">ICU</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="swipe-area"></div>
        <a href="#" data-toggle=".container" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
		
		
 <div class="content">
        
<body>

<div class="topnav">
  <a  href="work.php">Information</a>
  <a  href="achieve.php">Target</a>
  <a class="active" href="stakeholder.php">Stakeholder</a>
  <a href="doc.php">Deliverables</a>
  <a href="issue.php">Issue</a>
  <a href="financial.php">Financial</a>

</div>


 
<center>
Major Stakeholder and Responsibility
</center> 
 <?php
 
 echo $code;
  $con = getdb();
  $sql=("SELECT goal.*,strategies.*,actionplan.*,kpioperation.*,reference.* FROM goal JOIN strategies ON strategies.goal_id=goal.goal_id JOIN actionplan ON actionplan.strategies_id=strategies.strategies_id JOIN kpioperation ON kpioperation.actionplan_id=actionplan.actionplan_id JOIN reference ON reference.kpi_id=kpioperation.kpi_id WHERE module_id='$code'");
   $result = mysqli_query($con, $sql) or die(mysqli_error($con));  
   
   if (false === $result) {
    echo mysql_error();
}
 if (mysqli_num_rows($result) > 0) {  
  echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>";	
  echo
		'<tr><td><b>Goal ID</b></td><td><b>Session</b><td><b>KPI</b></td><td><b>Ownership</b></td><td><b>Data Source</b></td><td><b>Operation Definition</b></td><td><b>KPI</b></td></td></tr>';
		
		// iterate over record set
		// print each field
		while ($row=$result->fetch_assoc())
		{
		echo '<tr>';
    echo '<td class="td1">' . $row['goal_id'] . '</td>';
	echo '<td class="td1">' . $row['session'] . '</td>';
	echo '<td class="td1">' . $row['kpi'] . '</td>';
	echo '<td class="td1">' . $row['ownership'] . '</td>';
	echo '<td class="td1">' . $row['data_source'] . '</td>';
	echo '<td class="td1">' . $row['operation_definition'] . '</td>';
	echo '<td class="td1">' . $row['kpi'] . '</td>';
		echo '</tr>';
		}
		echo '</table>';
     
}
else {
     echo "you have no records";

} 
 
 
 ?>


</body>


</div>
    </div>
</div>

<style>
body,html{
    height: 100%;
    margin: 0;
    font-family: helvetica;
    font-weight: 100;
}
.container {
    position: relative;
    height: 100%;
    width: 100%;
    left: 0;
    -webkit-transition:  left 0.4s ease-in-out;
    -moz-transition:  left 0.4s ease-in-out;
    -ms-transition:  left 0.4s ease-in-out;
    -o-transition:  left 0.4s ease-in-out;
    transition:  left 0.4s ease-in-out;
}
.container.open-sidebar {
    left: 240px;
}
 
.swipe-area {
    position: absolute;
    width: 50px;
    left: 0;
top: 0;
    height: 100%;
    background: #f3f3f3;
    z-index: 0;
}
#sidebar {
    background: #DF314D;
    position: absolute;
    width: 240px;
    height: 100%;
    left: -240px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
#sidebar ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
#sidebar ul li {
    margin: 0;
}
#sidebar ul li a {
    padding: 15px 20px;
    font-size: 16px;
    font-weight: 100;
    color: white;
    text-decoration: none;
    display: block;
    border-bottom: 1px solid #C9223D;
    -webkit-transition:  background 0.3s ease-in-out;
    -moz-transition:  background 0.3s ease-in-out;
    -ms-transition:  background 0.3s ease-in-out;
    -o-transition:  background 0.3s ease-in-out;
    transition:  background 0.3s ease-in-out;
}
#sidebar ul li:hover a {
    background: #C9223D;
}
.main-content {
    width: 100%;
    height: 100%;
    padding: 10px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    position: relative;
}
.main-content .content{
    box-sizing: border-box;
    -moz-box-sizing: border-box;
padding-left: 60px;
width: 100%;
}
.main-content .content h1{
    font-weight: 100;
}
.main-content .content p{
    width: 100%;
    line-height: 160%;
}
.main-content #sidebar-toggle {
    background: #DF314D;
    border-radius: 3px;
    display: block;
    position: relative;
    padding: 10px 7px;
    float: left;
}
.main-content #sidebar-toggle .bar{
     display: block;
    width: 18px;
    margin-bottom: 3px;
    height: 2px;
    background-color: #fff;
    border-radius: 1px;   
}
.main-content #sidebar-toggle .bar:last-child{
     margin-bottom: 0;   
}
</style>

<script>
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
     
});
 
$(".swipe-area").swipe({
    swipeStatus:function(event, phase, direction, distance, duration, fingers)
        {
            if (phase=="move" && direction =="right") {
                 $(".container").addClass("open-sidebar");
                 return false;
            }
            if (phase=="move" && direction =="left") {
                 $(".container").removeClass("open-sidebar");
                 return false;
            }
        }
});
</script>
<?php
}
?>
</html>


