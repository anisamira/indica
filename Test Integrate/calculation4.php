<?php
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

	
	
<div id="content">	

<?php
if (isset($_POST['go']))
{
	$vali=mysql_real_escape_string($_POST['varia']);
	$module_id=$_POST['module_id']; 
	$sesi=$_POST['sesi']; 
	$ach_desc=$_POST['ach_desc']; 
	$target=$_POST['target'];
	$ach_id=$_POST['ach_id'];
	
	$valir=number_format($vali,2);
	
$sql="UPDATE achievement SET ach_result='$valir' WHERE ach_id='$ach_id'";
$result=mysql_query($sql) or die (mysql_error());

$query="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, achievement.ach_result, target.target_id
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
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND achievement.ach_id='$ach_id'
						";
$result4=mysql_query($query) or die (mysql_error());
			if (mysql_num_rows($result4)>0)
			{ ?>
				<table class="table table-bordered">
				<thead>
					<tr>
						<th><center>No</th>
						<th><center>KPI</th>
						<th><center>Target</th>
						<th><center>Achievement</th>
                        <th><center>Achievement Result</th>						
						<!--<th><center>Action</th>-->
					</tr>
				</thead>
				<tbody>
				<?php 
				
				$x=1;
				while($row4=mysql_fetch_array($result4))
				{
					$kpi_desc	=$row4['kpi_desc'];
					$target		=$row4['target'];
					//$ach_id	    =$row3['ach_id'];
					$ach_desc	=$row4['ach_desc']; 
					$ach_result =$row4['ach_result']?>
					
					 <tr style="font-size:13px">
						<td><?php echo $x;?></td>
						<td><?php echo $kpi_desc;?></td>
						<td><?php echo $target;?></td>
						<td><?php echo $ach_desc;?></td>
						<td><?php echo $ach_result;?></td>
						<!--<td><a class="btn btn-primary " href="calculation3.php?id='.$row['id'].'" name="calculate">Calculate Result</a></td>;-->
					</tr><?php $x++; 
				}
			}
			
			else
			{
				echo "cannot updated";
			}
?>
				</tbody>
			</table>
			
<head>		
	
<center><form action="calculation2.php" method="post">
<input type="hidden" name="module_id" value="<?php echo $module_id;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="ach_desc" value="<?php echo $ach_desc;?>"/>  
<input type="hidden" name="target" value="<?php echo $target;?>"/> 
<input type="hidden" name="ach_id" value="<?php echo $ach_id;?>"/>    
<input type ="submit" name="submit" value="Back to Main Page">
</form>			
			
<?php
	}
?>

</div>