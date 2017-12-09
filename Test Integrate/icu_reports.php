<?php
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
	
	
	$sql			="SELECT * FROM session";
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
  <br>
    &nbsp&nbspGenerate ICU Report
  <br>
	</div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<table class="table" width="20%">
					<tr>
						<td>
							<select class="form-control" name="yearly">
							<?php
								$sql=mysql_query("Select year_name from year");
								$row=mysql_num_rows($sql);
								while($row = mysql_fetch_array($sql))
								{
									$yearly=$row['year_name'];

									?>
									
									<option value="<?php  echo $yearly;?>"><?php  echo $yearly;?></option>
							      <?php
								}?>	
							</select> 
						</td>
						<div class="form-actions">
							<td><button type="submit" class ="btn btn-sucess" name="send" value="">Go</button></td>
						</div>
					</tr>
				</table>
				</form>
	
<?php

// select all
if (isset($_POST['send'])){
$yearly=$_POST['yearly'];	
  $x=1;
  $sql= "SELECT * FROM year WHERE year_name='$yearly'";
					$result = mysql_query($sql) or die(mysql_error()); 

	$result = mysql_query($sql) or die(mysql_error());


 if(mysql_num_rows($result)>0){
  
	  ?>
	  
	  <div class="table-responsive" style="width:50%">  
		
								   <table class="table table-hover" style="outline:0;"> 

										<tr> 
											<th>YEAR</th>
											<th>Action</th>	
										</tr>
	  
	  
<?php		
		while($row=mysql_fetch_array($result))
		{
			
			$icu_year=$row['year_name'];
			
?>	
<tr>
                         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <td style="width:30%;"><?php echo $icu_year;?></td>
							<input type="hidden" name="year" value="<?php echo $icu_year;?>"/>
							<td style="width:10%;"><button type="submit" name="submit" class="btn btn-primary">Generate</button></td>
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
	
			?>
							<div class="alert alert-warning alert-dismissable fade in">
								<meta http-equiv="refresh" content="1;url=report_admin.php" />
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>No project found</strong> Redirecting in 1 seconds...
							</div>
							<?php
	}
	
	
}

}

if (isset($_POST['year']))
{
	$icu_year=$_POST['year'];

$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*,achievement.*,year.*
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
						WHERE year.year_name='$icu_year'
						AND form.form_status='approved'
						";
						
						$result = mysql_query($sql) or die(mysql_error()); 

						
						
						if(mysql_num_rows($result) > 0)
					{
						
						$x=1;
						
?>
						<table class="table table-hover">
					                <col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="15%">
									<col width="15%">

					
					<tr>
									    <th>No.</th>
										<th>Year</th>
									    <th>KPI</th>
										<th>Target</th>
										<th>Achievement</th>
										<th>KPI %</th>
									</tr>
<?php					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_desc		=$row['kpi_desc'];
							$target_id		=$row['target_id'];
							$achievement	=$row['ach_desc'];
							$year           =$row['year_name'];
							$quarterq       =$row['quarter'];
							$yearid         =$row['year_id'];
							$target			=$row['target'];
							$resultkpi			=$row['ach_result'];

?>

							<tr>  
								<td height="56px"><?php echo $x;?></td>
								<td><?php echo $icu_year;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><?php echo $target;?></td>
								<td><?php echo $achievement;?></td>
								<td><?php echo $resultkpi;?></td>
							</tr>
							<?php
						$x++;
						}
						?>
						</table>
						
						<form class="pure-form pure-form-aligned" action="icu_generate.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
<input type="hidden" name="year" value="<?php echo $icu_year;?>"/>
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="Export" value="export to excel">Download Excel</button>
                            </div>
                   </div>                    
            </form>           
					<?php }	else
					{
						echo "No Result";
					}
}					
?>


	<!--END OF DIVISION-->
	</div>
	</div>
	