<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
 
 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	
	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
						}
						$session_name	=$_SESSION['session_name'];
					}
					else
					{
						echo "no data found";
					}
	$sql			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['form_status']	=$row['form_status'];
							$_SESSION['form_id']		=$row['form_id'];
						}
						$form_status	=$_SESSION['form_status'];
						$form_id		=$_SESSION['form_id'];
					}
					else
					{
						echo "no data found";
					}

				
	 $sql			= "SELECT * FROM module WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$module_name=$row['module_name'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}


 $sql			= "SELECT * FROM year WHERE year_name='$curyear'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year= $row['year_name'];
							$year_id=$row['year_id'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}

									
?>

		<div class="wrapper">		
		<!-- !PAGE CONTENT! -->


			<div id="content">	
	<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_name?> <?=$session_name;?> YEAR <?=$year?>
  <br>
	</div>
	
<div class="w3-container">
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-black">KPI Reports</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="module_report.php" target="_blank" class="w3-bar-item w3-button">Module Information</a>
      <a href="performance_report.php" target="_blank" class="w3-bar-item w3-button">Performance Reports</a>
      <a href="financial_report.php" target="_blank" class="w3-bar-item w3-button">Financial Overview</a>
    </div>
  </div>


<div class="w3-dropdown-hover">
 <button class="w3-button w3-black">Year Reports</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="year_report.php" target="_blank" class="w3-bar-item w3-button">Generate Yearly report</a>
      
</div>
</div>

<div class="w3-dropdown-hover">
 <button class="w3-button w3-black">ICU Reports</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="icu_reports.php" target="_blank" class="w3-bar-item w3-button">Generate ICU Reports</a>
    

</div>
</div>


<!-- end of division-->
    </div>
	</div>
	</div>
	