<html>
<?php
	include('style_dc.php');
	include('sidebar.php');
	
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
		
		
	
?>
 
					
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
 <script type="text/javascript" src="graph.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>					
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<!--<div id="content">	-->
<div	style ="margin-left:300px">

	<?php
	 if(isset($_POST['save']))
		{
			
			$module_id=$_POST['moduleid'];
			$sesi=$_POST['sesi'];
			$sql2= "SELECT * FROM form WHERE session_name='$sesi' AND module_id='$module_id'";
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
					
				
			
			
				
			$sql	="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, target.target_id
FROM kpi
JOIN target ON target.kpi_id = kpi.kpi_id
JOIN achievement ON achievement.target_id = target.target_id
LIMIT 0 , 30";
			$result=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($result)>0)
			{ ?>
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div><div class="control-group">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>KPI</th>
						<th>Target</th>
						<th>Achievement</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$x=1;
				while($row=mysql_fetch_array($result))
				{
					$kpi_desc	=$row['kpi_desc'];
					$target		=$row['target'];
					$ach_desc	=$row['ach_desc']; ?>
					
					 <tr style="font-size:13px">
						<td><?php echo $kpi_desc;?></td>
						<td><?php echo $target;?></td>
						<td><?php echo $ach_desc;?></td>
					</tr><?php $x++; 
				}
			}?>
				</tbody>
			</table>
			<?php
			}		
?>
</div>
</html>	
