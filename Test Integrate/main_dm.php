<body>
<?php
	include('sidebar.php');
	include('style_dc.php');
	include('script.php');
 $curyear=date ('Y');
 $date_now=date ("m/d/Y");
 $date_q= date ("06/30/Y");
 if ($date_now<=$date_q)
{
	$quarter=1;
}
else
    $quarter=2;	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	
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
						echo "no data found";
					}
					
	$sql			="SELECT form_id FROM form where session_name='$session_name' AND module_id='$module_id'";
					
					$result = mysql_query($sql) or die(mysql_error()); 
					$form_id	=$_SESSION['form_id'];
					
					if(isset($_POST['submit_approval']))
						{
							for($y=1; $y<=50; $y++)
							{
								if (empty($_POST["kpi_id".$y]))
								{
									$error = 1;
								}
								else
								{
									$kpi_id			=($_POST["kpi_id".$y]);
									$approval 		= ($_POST["approval".$y]);
									$action_comment = mysql_real_escape_string($_POST["action_comment".$y]); 
									$sql			="UPDATE master_status 
														SET action_type='$approval', action_comment='$action_comment', action_date=NOW()
														WHERE kpi_id='$kpi_id'";
									$result			=mysql_query($sql) or die (mysql_error());
									if (false===$result)
									{
										echo mysql_error();
									}
								}
							}
							
							$form_id	=$_POST["form_id"];
							$sql2		="SELECT * FROM master_status where form_id='$form_id' AND action_type='reject'";
							$result		=mysql_query($sql2) or die (mysql_error());
							if(mysql_num_rows($result)>0)
								{
									$sql		="Update form SET form_status='rejected' WHERE form_id='$form_id'";
									$result		=mysql_query($sql) or die (mysql_error());
								}
							else
									
								{
									$sql		="Update form SET form_status='approved' WHERE form_id='$form_id'";
									$result		=mysql_query($sql) or die (mysql_error());	
								}
						}
						
						if(isset($_POST['submit_achievement']))
						{
							for($y=1; $y<=50; $y++)
							{
								if (empty($_POST["ach_id".$y]))
								{
									$error = 1;
								}
								else
								{
									$ach_id		=($_POST["ach_id".$y]);
									$approval 		= ($_POST["approval".$y]);
									$action_comment = mysql_real_escape_string($_POST["action_comment".$y]); 
									$sql			="UPDATE achievement
														SET ach_status='$approval'
														WHERE ach_id='$ach_id'";
									$result			=mysql_query($sql) or die (mysql_error());
									if (false===$result)
									{
										echo mysql_error();
									}
								}
							}
						}
							
					
	
?>

<body>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<!--<form action="datamanager_review.php" method="post">-->
				<table class="table table-bordered"> 
					<tr style="font-size:13px">
						<th>Version</th>						
						<!--<th>Last Updated</th>-->
						<th>Status</th>
						<th>Action</th>						
					</tr>
					<?php
					$sql= "SELECT * 
						FROM form 
						WHERE module_id='$module_id' AND session_name='$session_name'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$form_status	=$row['form_status'];
							$form_id		=$row['form_id'];
							$session_name	=$row['session_name'];?>
							<tr style="font-size:13px">  
								<td>KPI Achievement <?php echo $session_name;?></td>
								<td><?php echo $form_status;?></td>
								<td>
									<form action="datamanager_review.php" method="post">
										<input type="hidden" name="form_id" value="<?php echo $form_id;?>"></input>
										<?php
										if ($form_status == 'approved' || $form_status == 'rejected')
										{?>
											<input type="submit" name="approval" value="Approval" disabled></input><?php
										}
										else
										{?>
											<input type="submit" name="approval" value="Approval"></input><?php
										}?>
										
									</form>
								</td>		
											
							</tr>
							<?php
							
						}
					}
					else
					{
						echo "no data found";
					}
					$status="";
					
					$sql_approval="SELECT ach_id FROM achievement WHERE ach_status='reject'";
					$result_approval=mysql_query($sql_approval) or die(mysql_error());
					if(mysql_num_rows($result_approval)>0)
					{
						$status="rejected";
					}
					else
					{
						$sql_approval2="SELECT ach_id FROM achievement WHERE ach_status='approve'";
						$result_approval2=mysql_query($sql_approval2) or die(mysql_error());
						if(mysql_num_rows($result_approval2)>0)
						{
							$status="approved";
						}
						else
						{
							$status="";
						}
					}
					$sql= "SELECT * 
						FROM achievement 
						WHERE form_id='$form_id' AND quarter='$quarter'";
					$result = mysql_query($sql) or die(mysql_error());
					if(mysql_num_rows($result)>0)
					{?>
						<tr style="font-size:13px">  
								<td>KPI Achievement Quarter <?php echo $quarter;?> Year <?php echo $curyear;?></td>
								<td><?php echo $status;?></td>
								<td>
									<form action="datamanager_achieve.php" method="post"><?php 
											if ($status=="") 
											{?>
												<input type="submit" name="achieve_approval" value="Approval"></input><?php
											}
											else
											{?>
												<input type="submit" name="achieve_approval" value="Approval" disabled></input><?php
											}?>
									
									</form>
								</td>
									
										
											
							</tr><?php
					}?>
					
					
				</table>
						
			</div>
		</div>
	</div>

	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>