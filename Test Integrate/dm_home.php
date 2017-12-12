<?php
	include('style_dc.php');
	include('nav-noti.php');
	

	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$username=  $_SESSION['username'];
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 
	if ($date_now<=$date_q)
	{
		$quater=1;
	}
	else
		$quater=2;	

	
if (!isset($_SESSION['username']))
{
	 die(header("location: index.php"));
}
else
{	
	
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
						
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script type="text/javascript" src="graph.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>					
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!--<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->



<div id="content" >	
		
	<?php
		
		if(isset($_POST['save']))
		{
			$year 	= $_POST['txt_year'];
			$sql2	="SELECT achievement.ach_id, achievement.target, achievement.ach_desc, target.target_id, kpi.kpi_id, kpi.kpi_desc, kpi.session_name, year.year_id, year.year_name
						FROM kpi JOIN target ON target.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year on year.year_id=achievement.year_id
						WHERE achievement.form_id='$form_id' 
						AND kpi.session_name='$session_name'
						AND achievement.quarter='2'
						AND year.year_name='$year'";
			$result2=mysql_query($sql2) or die (mysql_error());
			if (mysql_num_rows($result2)>0)
			{?>
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
						<tbody><?php
							while($row2=mysql_fetch_array($result2))
							{
								$kpi_desc	=$row2['kpi_desc'];
								$ach_desc	=$row2['ach_desc'];
								$ach_id		=$row2['ach_id'];
								$target		=$row2['target'];?>
								<tr style="font-size:13px">
									<td><?php echo $kpi_desc;?></td>
									<td><?php echo $target;?></td>
									<td><?php echo $ach_desc;?></td>
								</tr><?php
							}?>
						</tbody>
					</table>
				</div><?php
			}
			
			$sql3	="SELECT achievement.ach_id, achievement.target, achievement.ach_result, target.target_id, kpi.kpi_id, kpi.kpi_desc, kpi.session_name, year.year_id, year.year_name
						FROM kpi JOIN target ON target.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year on year.year_id=achievement.year_id
						WHERE achievement.form_id='$form_id' 
						AND kpi.session_name='$session_name'
						AND achievement.quarter='2'
						AND year.year_name='$year'";
			$result3=mysql_query($sql3) or die (mysql_error());
			if (mysql_num_rows($result3)>0)
			{?>
				<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<div class="control-group">
				
					<table class="table table-bordered" id="datatable2">
						<thead>
							<tr>
								<th>KPI</th>
								<th>Indicator</th>
							</tr>
						</thead>
						<tbody><?php
							while($row3=mysql_fetch_array($result3))
							{
								$kpi_desc	=$row3['kpi_desc'];
								$ach_result	=$row3['ach_result'];
								$ach_id		=$row3['ach_id'];?>
								<tr style="font-size:13px">
									<td><?php echo $kpi_desc;?></td>
										<?php if ($ach_result == 0)
									{
										echo "<td bgcolor='#918585'> $ach_result </td>";
									
									}
									elseif ($ach_result <=49) 
									{
										echo "<td bgcolor='#FF0000'> $ach_result </td>";
									}
									elseif ($ach_result <=80)
									{
										echo "<td bgcolor='#FFFF00'> $ach_result </td>";
									}
									else 
									{
										echo "<td bgcolor='#3CB371'> $ach_result </td>";
									}
										
										?>
								<?php
							}?>
						</tbody>
					</table>
					</body>
				</div><?php
			}
			else
			{
				?>
							<div class="alert alert-warning alert-dismissable fade in">
						<!--	<meta http-equiv="refresh" content="1;url=main_vc.php" />-->
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>There is no records</strong> 
							</div><?php	
			}
			
		}
		else
		{
			$year=$curyear;			
			$sql4	="SELECT achievement.ach_id, achievement.target, achievement.ach_desc, target.target_id, kpi.kpi_id, kpi.kpi_desc, kpi.session_name, year.year_id, year.year_name
						FROM kpi JOIN target ON target.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year on year.year_id=achievement.year_id
						WHERE achievement.form_id='$form_id' 
						AND kpi.session_name='$session_name'
						AND achievement.quarter='$quater'
						AND year.year_name='$curyear'";
			$result4=mysql_query($sql4) or die (mysql_error());
			if (mysql_num_rows($result4)>0)
			{?>
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
							<tbody><?php
								while($row4=mysql_fetch_array($result4))
								{
									$kpi_desc	=$row4['kpi_desc'];
									$ach_desc	=$row4['ach_desc'];
									$ach_id		=$row4['ach_id'];
									$target		=$row4['target'];?>
									<tr style="font-size:13px">
										<td><?php echo $kpi_desc;?></td>
										<td><?php echo $target;?></td>
										<td><?php echo $ach_desc;?></td>
									</tr><?php
								}?>
							</tbody>
						</table>
					</div><?php
			}
			
			$sql5	="SELECT achievement.ach_id, achievement.target, achievement.ach_result, target.target_id, kpi.kpi_id, kpi.kpi_desc, kpi.session_name, year.year_id, year.year_name
						FROM kpi JOIN target ON target.kpi_id=kpi.kpi_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year on year.year_id=achievement.year_id
						WHERE achievement.form_id='$form_id' 
						AND kpi.session_name='$session_name'
						AND achievement.quarter='$quater'
						AND year.year_name='$curyear'";
			$result5=mysql_query($sql5) or die (mysql_error());
			if (mysql_num_rows($result5)>0)
			{?>
				<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<div class="control-group">
			
					<table class="table table-bordered" id="datatable2">
						<thead>
							<tr>
								<th>KPI</th>
								<th>Indicator</th>
							</tr>
						</thead>
						<tbody><?php
							while($row5=mysql_fetch_array($result5))
							{
								$kpi_desc	=$row5['kpi_desc'];
								$ach_result	=$row5['ach_result'];
								$ach_id		=$row5['ach_id'];?>
								 <tr style="font-size:13px">
									<td><?php echo $kpi_desc;?></td>
										<?php if ($ach_result == 0)
									{
										echo "<td bgcolor='#918585'> $ach_result </td>";
									
									}
									elseif ($ach_result <=49) 
									{
										echo "<td bgcolor='#FF0000'> $ach_result </td>";
									}
									elseif ($ach_result <=80)
									{
										echo "<td bgcolor='#FFFF00'> $ach_result </td>";
									}
									else 
									{
										echo "<td bgcolor='#3CB371'> $ach_result </td>";
									}
										?>
									
	</tr><?php
							}?>
						</tbody>
					</table>
					</body>
				</div><?php
			}
			else
			{?>
				<div class="alert alert-warning alert-dismissable fade in">
				<!--<meta http-equiv="refresh" content="1;url=main_vc.php" />-->
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>There is no records</strong>
				</div><?php	
			}
		}?>
</div>


<script>
$(function () {
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
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
});
</script>

<script>
$(function () {
Highcharts.chart('container2', {
    data: {
        table:'datatable2'
	
    },
	
    chart: {
        type: 'column'
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
	});
	</script>
	


	
<?php
}
?>


