<html>

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
<div>

	<?php
	 if(isset($_POST['save']))
		{
			
			$module_id=$_POST['moduleid'];
			$sesi=$_POST['sesi'];
			// $sql2= "SELECT * FROM form WHERE session_name='$sesi' AND module_id='$module_id'";
					// $result2 = mysql_query($sql2) or die(mysql_error()); 
					// if(mysql_num_rows($result2)>0)
					// {
						// while($row=mysql_fetch_array($result2))
						// {
							// $_SESSION['form_status']	=$row['form_status'];
							// $_SESSION['form_id']		=$row['form_id'];
						// }
						// $form_status	=$_SESSION['form_status'];
						// $form_id		=$_SESSION['form_id'];
					// }
					// else
					// {
						// echo "no data found";
					// }
			
					
			$x=1;		
			$sql3	="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, achievement.ach_result, target.target_id
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
						AND form.form_status='approved'";
			$result3=mysql_query($sql3) or die (mysql_error());
			if (mysql_num_rows($result3)>0)
			{ ?>
			
				<table class="table table-bordered">
				<thead>
					<tr>
						
						<th><center>KPI</th>
						<th><center>Target</th>
						<th><center>Achievement</th> 
						<th><center>Achievement Result (%)</th>
						<th><center>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				
				
				while($row3=mysql_fetch_array($result3))
				{
					$kpi_desc	=$row3['kpi_desc'];
					$target		=$row3['target'];
					//$ach_id	    =$row3['ach_id'];
					$ach_desc	=$row3['ach_desc']; 
					$ach_result =$row3['ach_result'];
					$ach_id=$row3['ach_id'];
					?>
					
					 <tr style="font-size:13px">
						<td><?php echo $kpi_desc;?></td>
						<td><?php echo $target;?></td>
						<td><?php echo $ach_desc;?></td>
						<td><?php echo $ach_result;?></td>
						<td><form action="calculation3.php" target="_blank" method="post" name="calc"><button class="btn btn-primary " type="submit" name="calculate">Calculate Result
						  <input type="hidden" name="module_id" value="<?php echo $module_id;?>"/>
							<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
							<input type="hidden" name="ach_desc" value="<?php echo $ach_desc;?>"/>  
							<input type="hidden" name="target" value="<?php echo $target;?>"/> 
							<input type="hidden" name="ach_id" value="<?php echo $ach_id;?>"/>    						
						</form>
						</td>
					</tr><?php $x++; 
				}
			}
			else
			{
				echo "no module found";
			}
			
?>
				</tbody>
			</table>
			<?php
			}		

			
			else
			{
				echo "out";
			}
			
			
			?>
			
			<form method="post" action="calculation1.php"><input type="Submit" value="Back" name="Back"></form>



</div>
</div>
</html>	