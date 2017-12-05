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
					
					
			$sql3	="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, achievement.ach_result, target.target_id
FROM kpi
JOIN target ON target.kpi_id = kpi.kpi_id
JOIN achievement ON achievement.target_id = target.target_id
LIMIT 0 , 30
";
			$result3=mysql_query($sql3) or die (mysql_error());
			if (mysql_num_rows($result3)>0)
			{ ?>
			<div id="container" style="min-width: 310px; height: 400px; margin: 10 auto"></div><div class="control-group">
				<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>KPI</th>
						<th>Target</th>
						<th>Achievement</th> 
						<th>Achievement Result</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$x=1;
				while($row3=mysql_fetch_array($result3))
				{
					$kpi_desc	=$row3['kpi_desc'];
					$target		=$row3['target'];
					//$ach_id	    =$row3['ach_id'];
					$ach_desc	=$row3['ach_desc']; 
					$ach_result =$row3['ach_result']?>
					
					 <tr style="font-size:13px">
						<td><?php echo $kpi_desc;?></td>
						<td><?php echo $target;?></td>
						<td><?php echo $ach_desc;?></td>
						<td><?php echo $ach_result;?></td>
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
