<?php
	include('nav-noti.php');
	
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
						echo "no data found 43";
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
						echo "no data found 23";
					}

									
?>

<head>
    <!-- Bootstrap Dropdown Hover CSS     -->
<link href="assets/hover/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="assets/hover/css/animate.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
		<div class="wrapper">		
		<!-- !PAGE CONTENT! -->


			<div id="content">	

</br>	
<table>
	
<div class="container">
<td>	
	<div class="dropdown dropdown-inline">
          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">KPI Reports<b class="caret"></b></a>
          <ul class="dropdown-menu dropdownhover-bottom">
            <li><a href="module_reports_admin.php">Module Information</a></li>
            <li><a href="performance_reports_admin.php">Performance Reports</a></li>
            <li><a href="financial_reports_admin.php">Financial Overview</a></li>
          </ul>
        </div>
</td>
<td>
	 <div class="dropdown dropdown-inline">
          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Year Reports<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin_year_report.php">Generate Yearly Reports</a></li>
          </ul>
        </div>
</td>
<td>		
	 <div class="dropdown dropdown-inline">
          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">ICU Reports <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icu_reports.php">Generate ICU Reports</a></li>
          </ul>
   </div>
</td>   
	  
	   </div>
</table>	   
<!-- end of division-->
    </div>
	</div>

<script>

    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    

</script>