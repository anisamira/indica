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
	
	$sql2			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
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



<div class="w3-main" style="margin-left:300px;margin-top:90px; margin-right:50px;">	
	<div class="control-group">
		<label class="control-label">Year</label>
			<div class="controls">
					<form id="s" method="post">
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


	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<div class="control-group">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<th>KPI</th>
				<th>Target</th>
				<th>Achievement</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql2	="SELECT achievement.ach_id, achievement.target, achievement.ach_desc, target.target_id, kpi.kpi_id, kpi.kpi_desc, kpi.session_name, year.year_id, year.year_name
						FROM kpi JOIN target ON target.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year on year.year_id=achievement.year_id
						WHERE achievement.form_id='$form_id' 
						AND kpi.session_name='$session_name'
						AND achievement.quarter='$quater'
						AND year.year_name='$curyear'";
			$result2=mysql_query($sql2) or die (mysql_error());
			while($row=mysql_fetch_array($result2))
			{
				$kpi_desc	=$row['kpi_desc'];
				$ach_desc	=$row['ach_desc'];
				$ach_id		=$row['ach_id'];
				$target		=$row['target'];?>
				 <tr style="font-size:13px">
					<td><?php echo $kpi_desc;?></td>
					<td><?php echo $target;?></td>
					<td><?php echo $ach_desc;?></td>
				</tr><?php
			}?>
		   
		</tbody>
	</table>
</div>
</div>
</div>
</div>
<script>
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: '<?php echo $_SESSION['module_name'] . " ". $curyear;?>'
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
