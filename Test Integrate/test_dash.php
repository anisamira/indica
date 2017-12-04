<?php
	include('style_dc.php');
	include('sidebar.php');
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 
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
						}
						$session_name	=$_SESSION['session_name'];
					}
					else
					{
						echo "no data found";
					}
	
	$sql2= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result2 = mysql_query($sql2) or die(mysql_error()); 
					if(mysql_num_rows($result2)>0)
					{
						while($row=mysql_fetch_array($result2))
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
	$sql3			="SELECT module.*, user.* 
						FROM user 
						JOIN module 
						ON module.module_id=user.module_id
						WHERE user.module_id='$module_id' 
						AND user.user_id='$user_id'";
					$result3 = mysql_query($sql3) or die(mysql_error());  
					while($row=mysql_fetch_array($result3))
					{
						
						$_SESSION['module_name'] = $row['module_name'];

						}?>

 
					
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<div id="content" >	
	<div class="control-group">
		<label class="control-label">Year</label>
			<div class="controls">
					<form action="" method="post">
						<table class="table" width="20%">
							<tr>
								<td>
									<select class="form-control" name="txt_year"><?php

										$sql=mysql_query("Select * from session where session_name='$session_name'");
										$row=mysql_num_rows($sql);
										while($row = mysql_fetch_array($sql))
										{
											$year1=$row['year1'];
											$year2=$row['year2'];
											$year3=$row['year3'];
											$year4=$row['year4'];
											$year5=$row['year5'];
											?>
											
											<option value="<?php  echo $year1;?>"><?php  echo $year1;?></option>
											<option value="<?php  echo $year2;?>"><?php  echo $year2;?></option>
											<option value="<?php  echo $year3;?>"><?php  echo $year3;?></option>
											<option value="<?php  echo $year4;?>"><?php  echo $year4;?></option>
											<option value="<?php  echo $year5;?>"><?php  echo $year5;?></option>
						
											<?php

										}?>
										
									</select> 
								</td>
							<div class="form-actions">
								<td><button type="submit" class ="btn btn-sucess"name="save" value="">Go</button></td>
							</div>
							</tr>
							
						</table>

					</form>

				
				
			</div>

		</div>



	
	<?php
$module_id=$_SESSION['module_id'];
						$x=1;
										$sql="
											SELECT SUM(reference.estimated_cost) AS cost, SUM(reference.exp_fin_return) AS income
											FROM goal 
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
                                            JOIN form ON form.module_id=goal.module_id
											JOIN reference ON reference.kpi_id=kpi.kpi_id
											WHERE goal.module_id='$module_id'
											AND goal.session_name='$session_name'
											";
											$result = mysql_query($sql) or die(mysql_error()); 
											while($row=mysql_fetch_array($result))
											{
											
											$cost=$row['cost'];
											$return=$row['income'];

											?>
							<div class="alert alert-warning alert-dismissable fade in">
								<meta http-equiv="refresh" content="1;url=main_vc.php" />
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>There is no records</strong> Redirecting in 1 seconds...
							</div><?php	
			}
			
		
	
		?>
		
		   


<script>
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'pie chart'
    },
    title: {
        text: '<?php echo $_SESSION['module_name'] . " ". $year;?>'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Number'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});

</script>
