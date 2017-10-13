
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

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

<html>
<form name="find" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

Module Code: <input type="text" name="code"> 

<!--
<select name="Health" multiple="" class="ui fluid dropdown">
  <option value="">Health</option>
<option value="green">Green</option>
<option value="red">Red</option>
<option value="amber">Amber</option>
<option value="na">Not Available</option>

</select>
-->

<!-- <br> Status<input type="" name="status"><br>
Module: <input type="" name="module"><br>    
Stage<input type="" name="stage"><br>
Year: <input type="" name="year"><br>        
Health<input type="" name="health"><br>
-->
<input type="submit" name="search" value="Search">
</form>

</html>        
<?php



if(isset($_POST["search"])){
	$code=$_POST['code'];
	
	//$status=$_POST['status'];
	//$module=$_POST['module'];
	//$stage=$_POST['stage'];
	//$year=$_POST['year'];
	//$health=$_POST['health'];

	require_once 'config.php';
	    $con = getdb();
  $sql=("SELECT * FROM module WHERE module_id='$code'");
   $result = mysqli_query($con, $sql) or die(mysqli_error($con)); 

	if (false === $result) {
    echo mysql_error();
}
 if(mysqli_num_rows($result)>0){
  {
		//print HTML table
		echo '<table style="width:100%">';
		echo
		'<tr><td><b>Code</b></td><td><b>Nama</b></td></tr>';
		
		// iterate over record set
		// print each field
		while ($row=$result->fetch_assoc())
		{
		echo '<tr>';
		//echo '<td class="td1">' . $row['module_id'] . '</td>';
		echo '<td class="td1"><a href="work.php" target="_blank">'.$row['module_id'].'</a></td>';
	session_start();
$_SESSION['code']=$row['module_id'];
if (($_SESSION['code'])!=$row['module_id']){
session_destroy();
}
		echo '<td class="td1">' . $row['module_name'] . '</td>';
		}
		echo '</table>';
	}
 }
  
  else{
 	{
		//print error message
		echo 'No code found';
	}
	// once processing is complete
	// free result set
	
}
	
}


?>		

			</div>
    </div>
</div>

<style>
body, html {
    height: 100%;
    margin: 0;
    overflow:hidden;
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