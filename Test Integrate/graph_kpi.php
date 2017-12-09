<?php
	include('style_dc.php');
	include('sidebar.php');
	

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
									$year5=$row['year5'];?>
									
									<option value="<?php  echo $year1;?>"><?php  echo $year1;?></option>
									<option value="<?php  echo $year2;?>"><?php  echo $year2;?></option>
									<option value="<?php  echo $year3;?>"><?php  echo $year3;?></option>
									<option value="<?php  echo $year4;?>"><?php  echo $year4;?></option>
									<option value="<?php  echo $year5;?>"><?php  echo $year5;?></option><?php
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
									<td class="cellcolor1">
					                <?php echo $ach_result;?></td>
								<?php
							}?>
						</tbody>
					</table>
				</div><?php
			}
			else
			{
				?>
							<div class="alert alert-warning alert-dismissable fade in">
							<meta http-equiv="refresh" content="1;url=main_vc.php" />
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>There is no records</strong> Redirecting in 1 seconds...
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
									<td class="cellcolor1">
					                <?php  echo $ach_result;?></td>
	</tr><?php
							}?>
						</tbody>
					</table>
				</div><?php
			}
			else
			{?>
				<div class="alert alert-warning alert-dismissable fade in">
				<meta http-equiv="refresh" content="1;url=main_vc.php" />
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>There is no records</strong> Redirecting in 1 seconds...
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

$(function () {
Highcharts.chart('container2', {
    data: {
        table: 'datatable2'
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
<<<<<<< HEAD

=======
>>>>>>> 6052d445f8b67580255303c2a06e5746cba96724
	}
						
		});
	});
	</script>
	
	 <link href="/assets/stylesheet.css" rel="stylesheet">
	<script type="text/javascript" src="/assets/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/jquery.table2excel.min.js"></script>
    <script type="text/javascript" src="/assets/cellcolor.js"></script>
	
	<script>
	$(document).ready(function(){
		$("datatable2 td.cellcolor").each( function() {
			var thisCell = $(this);
			var cellValue = parseInt(thisCell.text());
		
			if (!isNaN(cellValue) && (cellValue <=49)) {
				thisCell.css("background-color","#FF0000");
			}
			else if (!isNaN(cellValue) && (cellValue <=80)) {
				thisCell.css("background-color","#FFFF00");
			}
			else{
				thisCell.css("background-color","#3CB371");
			}
		})
	})
	
	
	$(document).ready(function(){
		
		$("datatable2 tr#row").each( function() {
			var thisCell = $(this).find("td.percentage");
			var cellValue = parseInt(thisCell.text());
		
			if (!isNaN(cellValue) && (cellValue <=49)) {
				$(this).find("td.cellcolor1").css("background-color","#FF0000");
			}
			else if (!isNaN(cellValue) && (cellValue <=80)) {
				$(this).find("td.cellcolor1").css("background-color","#FFFF00");
			}
			else{
				$(this).find("td.cellcolor1").css("background-color","#3CB371");
			}
		})
	})
	</script>

	
<?php
}
?>


