<!DOCTYPE html>
<html>
<head>

<?php
		include('nav-noti.php');
	
	
	?>

<div class="wrapper">


		<div id="content">		
		<!-- !PAGE CONTENT! -->



<html>
<form name="find" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

Module Code: <input type="text" name="code"> 


<input type="submit" name="search" value="Search">
<input type="submit" name="select" value="Select ALL">
</form>

</html>        
<?php
if(isset($_POST["search"])){
	$code=$_POST['code'];
	
  $x=1;
  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id WHERE module.module_id='$code' GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());
 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-bordered"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			$_GET['module_id']=$row['module_id'];
			$_GET['session_name']=$row['session_name'];
			$name=$row['module_name'];
			$moduleid=$_GET['module_id'];
			$sesi=$_GET['session_name'];
			
			
			
			
?>	
<tr>
                         <form action="calculation2.php" method="post">
                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td><button type="submit" class="btn btn-primary" name="save">Go</button></td>
							<!--<td><button type="submit" name="Go" class="btn btn-primary"><a href="work_view.php?moduleid=$moduleid&sesi=$sesi">Go</a></button></td>-->

							</form>

</tr>								   
												<?php
											}
	$x++;											
											?>
									</table>								

</div>

<?php		
 }	 
  else{
 	{
		//print error message
		echo 'No Code Found';
	}
	// once processing is complete
	// free result set
	
}
}
// select all
if(isset($_POST["select"])){
	
	
  $x=1;
  $sql=("SELECT goal.*, module.* FROM goal JOIN module ON goal.module_id=module.module_id GROUP BY module.module_id");
  	
	$result = mysql_query($sql) or die(mysql_error());
 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive">  
								   <table class="table table-bordered"> 

										<tr> 
											<th>CODE</th>  
											<th>SESSION</th>  
											<th>NAME</th>
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			$_GET['module_id']=$row['module_id'];
			$_GET['session_name']=$row['session_name'];
			$name=$row['module_name'];
			$moduleid=$_GET['module_id'];
			$sesi=$_GET['session_name'];
			
			
			
			
?>	
<tr>
                         <form action="calculation2.php" method="post">
                            <td><?php echo $moduleid;?></td>
								   <input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>   
							<td><?php echo $sesi;?></td>
								   <input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<td><?php echo $name;?></td>
							<td><button type="submit" class="btn btn-primary" name="save">Go</button></td>
							<!--<td><button type="submit" name="Go" class="btn btn-primary"><a href="calculation1.php?moduleid=$moduleid&sesi=$sesi">Go</a></button></td>-->

							</form>

</tr>								   
												<?php
											}
	$x++;											
											?>
									</table>								

</div>

<?php		
 }	 
  else{
 	{
		//print error message
		echo 'No Code Found';
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
