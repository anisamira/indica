<html><body>
<?php
	include('nav-noti.php');
   // include('style_dc.php');
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
	$username		=$_SESSION['username'];
	
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
					
				$sql="SELECT form_id FROM form where session_name='$session_name' AND module_id='$module_id'";
				$result=mysql_query($sql);
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['form_id']		=$row['form_id'];
						}					
						$form_id		=$_SESSION['form_id'];
					}
					else
					{
						echo "no data found";
					}

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
							
							$status="";
							$form_id	=$_POST["form_id"];
							$sql2		="SELECT * FROM master_status where form_id='$form_id' AND action_type='reject'";
							$result		=mysql_query($sql2) or die (mysql_error());
							if(mysql_num_rows($result)>0)
								{
									$sql		="Update form SET form_status='rejected' WHERE form_id='$form_id'";
									$result		=mysql_query($sql) or die (mysql_error());
									$status		='rejected';
								}
							else
									
								{
									$sql		="Update form SET form_status='approved' WHERE form_id='$form_id'";
									$result		=mysql_query($sql) or die (mysql_error());
									$status		='approved';
								}
								
								
								
								// buat ayat notification
							$form = $session_name." " .$module_id;
							$action = $username." has ".$status ." " .$form;			
							
							// masukkan notification dalam table main notification
							$sql_noti1= "UPDATE notif_main SET noti_action='$action' where form_id='$form_id'";
							$ressqlnoti1= mysql_query($sql_noti1);

							// tarik specific notification 
							$sql_noti2   ="SELECT noti_id FROM notif_main WHERE form_id='$form_id'";
							$ressqlnoti2=mysql_query($sql_noti2);
							while($row=mysql_fetch_array($ressqlnoti2))
							{
								// masukkan data dalam notif_user so each user yang berkaitan dapat notification masing2
								$noti_id    =$row['noti_id'];
								// user_id = receiver notification
								$sqly = "SELECT user_id FROM user WHERE role_id='R02' AND module_id='$module_id'";
								$resulty    =mysql_query($sqly);

								while($row2=mysql_fetch_array($resulty))
								{
									$user=$row2['user_id'];
									
										$sqlx   ="INSERT INTO notif_user (noti_id, user_id, noti_status, sender) VALUES ('$noti_id', '$user', 'u', '$username')";
									
									
									$resultx    =mysql_query($sqlx);

								}
								
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
							
							
								
								// // buat ayat notification
							// $form = $session_name." " .$module_id;
							// $action = $username." has approve / reject achievement Year " .$curyear. " Quarter ".$form;			
							
							// // masukkan notification dalam table main notification
							// $sql_noti1= "UPDATE notif_main SET noti_action='$action' where form_id='$form_id'";
							// $ressqlnoti1= mysql_query($sql_noti1);

							// // tarik specific notification 
							// $sql_noti2   ="SELECT noti_id FROM notif_main WHERE form_id='$form_id'";
							// $ressqlnoti2=mysql_query($sql_noti2);
							// while($row=mysql_fetch_array($ressqlnoti2))
							// {
								// // masukkan data dalam notif_user so each user yang berkaitan dapat notification masing2
								// $noti_id    =$row['noti_id'];
								// // user_id = receiver notification
								// $sqly = "SELECT user_id FROM user WHERE role_id='R02' AND module_id='$module_id'";
								// $resulty    =mysql_query($sqly);

								// while($row2=mysql_fetch_array($resulty))
								// {
									// $user=$row2['user_id'];
									
										// $sqlx   ="INSERT INTO notif_user (noti_id, user_id, noti_status, sender) VALUES ('$noti_id', '$user', 'u', '$username')";
									
									
									// $resultx    =mysql_query($sqlx);

								// }
								
							// }	
							
							$form = $session_name." " .$module_id;
      $action = $username." has Approve achievement of ".$form." year ".$curyear. " Quarter " .$quarter ."";

      $sqly = "SELECT user_id FROM user WHERE role_id='R02' AND module_id='$module_id'";
      $resulty    =mysql_query($sqly);
      while($row2=mysql_fetch_array($resulty))
      {
        $user  =$row2['user_id'];
        $sqlx      ="INSERT INTO notif_user_r02 (user_id, noti_action, noti_status, sender, link) VALUES ('$user', '$action', 'u', '$username', 'achieve.php')";
        $resultx    =mysql_query($sqlx);

      }						
							
						}
							
					
	
?>


	<div class="wrapper">
		<div id="content">



			<!--<form action="datamanager_review.php" method="post">-->
				<table class="table table-bordered"> 
					<tr style="font-size:13px">
						<th>Version</th>						
						<th>Last Updated</th>
						<th>Status</th>
						<th>Action</th>						
					</tr>
					<?php
					$sql= "SELECT form_id, session_name, module_id, form_status,  DATE_FORMAT(last_updated, '%d-%m-%Y') AS last_updated
						FROM form 
						WHERE module_id='$module_id' AND session_name='$session_name'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$form_status	=$row['form_status'];
							$form_id		=$row['form_id'];
							$session_name	=$row['session_name'];
							$last_updated	=$row['last_updated'];?>
							<tr style="font-size:13px">  
								<td>KPI Achievement <?php echo $session_name;?></td>
								<td><?php echo $last_updated;?></td>
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
					
					$sql_approval="SELECT achievement.ach_id 
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
						AND goal.session_name='$session_name'
						AND achievement.quarter='$quarter'
						AND achievement.ach_status='reject'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)";
					$result_approval=mysql_query($sql_approval) or die(mysql_error());
					if(mysql_num_rows($result_approval)>0)
					{
						$status="rejected";
					}
					else
					{
						$sql_approval2="SELECT achievement.ach_id 
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
						AND goal.session_name='$session_name'
						AND achievement.quarter='$quarter'
						AND achievement.ach_status='approve'
						ORDER BY (kpi.kpi_id AND achievement.year_id AND achievement.quarter)";
						
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
								<td>KPI Achievement Quarter <?php echo $quarter;?> Year <?php echo $curyear;?></td>	<?php
								$sqlz= mysql_query("SELECT distinct DATE_FORMAT(ach_date, '%d-%m-%Y') AS ach_date
													FROM achievement 
													WHERE form_id='$form_id' AND quarter='$quarter'");
								if(mysql_num_rows($sqlz)>0)
								{
									while($rowz=mysql_fetch_array($sqlz))
									{
										$ach_date= $rowz['ach_date'];
										echo "<td>".$ach_date."</td>";
									}
									
								}
								else
									{
										echo "<td></td>";
									}?>
									<form action="datamanager_achieve.php" method="post"><?php 
										$query= "SELECT * 
												FROM achievement 
												WHERE form_id='$form_id' AND quarter='$quarter' AND ach_status='pending'";
										$result = mysql_query($query) or die(mysql_error());
										if(mysql_num_rows($result)>0)	
										{?>								
											<td>pending</td>
											<td><input type="submit" name="achieve_approval" value="Approval"></input></td><?php
										}
											else
											{
												$query2= "SELECT * 
												FROM achievement 
												WHERE form_id='$form_id' AND quarter='$quarter' AND ach_status='reject'";
												$result2 = mysql_query($query2) or die(mysql_error());
												if(mysql_num_rows($result2)>0)
												{?>
													<td>Rejected</td>
													<td><input type="submit" name="achieve_approval" value="Approval" disabled></input></td><?php
													
												}
												else
												{?>
													<td>Approved</td>
													<td><input type="submit" name="achieve_approval" value="Approval" disabled></input></td><?php
													
												}
												
											}?>
									</form>
								</td>
									
										
											
							</tr><?php
					}?>
					
					
				</table>
						

		</div>
	</div>

</body>
</html>