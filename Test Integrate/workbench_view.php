<!DOCTYPE html>
<html>
<head>

<?php
	include('style_dc.php');
	include('sidebar.php');
	
	
	?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	



<div style="padding-left:16px">

<div class="content">

<html>
<form name="find" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

Module Code: <input type="text" name="code"> 


<input type="submit" name="search" value="Search">
</form>

</html>        
<?php



if(isset($_POST["search"])){
	$code=$_POST['code'];
	

  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id WHERE module.module_id='$code' GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  {
		//print HTML table
		echo '<table style="width:100%">';
		echo
		'<tr><td><b>Code</b></td><td><b>Nama</b></td></tr>';
		
		// iterate over record set
		// print each field
		while($row=mysql_fetch_array($result))
		{
			$moduleid= $row['module_id'];
			$sesi=$row['session_name'];
			$name=$row['module_name'];
			$_GET['module_id']=$moduleid;
			$_GET['session_name']=$sesi;
			$vm=$_GET['module_id'];
			$vsesi=$_GET['session_name'];
			
		echo '<tr>';
		echo '<td class="td1"><form action="work_view.php" method="get" name="coded"><button type="submit" name="coded" value="GO" class="btn-link">'.$vm.' '.$vsesi.'</button></form></td>';
	

		echo '<td class="td1">' . $name . '</td>';
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
  
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
 
</div>

</div>
    </div>
</div>


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
<script>
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
     
});
 

</script>
</html>


