<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	$username		=$_SESSION['username'];
	$sql			=mysql_query("SELECT * FROM session where session_status='1'");
					if(mysql_num_rows($sql)>0)
					{
						while($row=mysql_fetch_array($sql))
						{
							$_SESSION['session_name']	=$row['session_name'];
						}
						$session_name	=$_SESSION['session_name'];
						$sql2			= mysql_query("SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'");
						if(mysql_num_rows($sql2)>0)
						{
							while($row2=mysql_fetch_array($sql2))
							{
								$_SESSION['form_status']	=$row2['form_status'];
								$_SESSION['form_id']		=$row2['form_id'];
							}
							$form_status	=$_SESSION['form_status'];
							$form_id		=$_SESSION['form_id'];
						}
						else
						{
							echo "";
						}
					}
					else
					{
						echo "";
					}
	
	
	
	
	if(isset($_POST['submit_master']))		
	{
		$sql3	=mysql_query("UPDATE form 
					SET form_status='pending', user='$username', last_updated=now() 
					WHERE module_id='$module_id' 
					AND session_name='$session_name'");  
		if (false === $result3)
			{
				echo "Cannot submit records";
			}
			
			// buat ayat notification
			$form = $session_name." " .$module_id;
			$action = $username." has submitted ".$form." for approval";			
			
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
				$sqly = "SELECT user_id FROM user WHERE role_id='R03' AND module_id='$module_id'";
				$resulty    =mysql_query($sqly);

				while($row2=mysql_fetch_array($resulty))
				{
					$user		=$row2['user_id'];
					$sqlx  		="INSERT INTO notif_user (noti_id, user_id, noti_status, sender) VALUES ('$noti_id', '$user', 'u', '$username')";
					$resultx    =mysql_query($sqlx);
				}			
			}

	}
	
	
	if(isset($_POST['submit_updated']))		
	{
		$sql3		=mysql_query("UPDATE form 
					SET form_status='pending', user='$username', last_updated=now()  
					WHERE module_id='$module_id' 
					AND session_name='$session_name'");
		if (false === $sql3)
			{
				echo "Cannot update form";
			}
		$sql2	=mysql_query("UPDATE master_status
					SET action_type='pending'
					WHERE form_id='$form_id'");
			if (false === $sql3)
			{
				echo "Error";
			}
	
			// buat ayat notification
			$form = $session_name." " .$module_id;
			$action = $username." has submitted update records of ".$form." for approval";			
			
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
				$sqly = "SELECT user_id FROM user WHERE role_id='R03' AND module_id='$module_id'";
				$resulty    =mysql_query($sqly);
				while($row2=mysql_fetch_array($resulty))
				{
					$user	=$row2['user_id'];
					$sqlx   ="INSERT INTO notif_user (noti_id, user_id, noti_status, sender) VALUES ('$noti_id', '$user', 'u', '$username')";
					$resultx    =mysql_query($sqlx);
					
				}
				
			}

	}
	
	
?>



	<div class="wrapper">
		<div id="content">	
			<!-- NOTIFICATION DISPLAY -->

			<?php 
			$get_noti_qwr 	= "select notif_user.*, notif_main.* from notif_user JOIN notif_main ON notif_main.noti_id=notif_user.noti_id where notif_user.noti_status = 'u' AND notif_user.user_id='$user_id'";
			$qry 			= mysql_query($get_noti_qwr, $conn);
			$count			=mysql_num_rows($qry);?>

			<form action="" method="POST" >
				<input style="<?php 
				if($count > 0 )
				{
					echo "color: white;border:none;background-color: red;";
				}

				?>" type="submit" name="submit" value="notification<?php echo '('.$count.')' ?>"/>
			</form><?php

			if(isset($_POST['submit']))
			{
				while ($r=mysql_fetch_array($qry))
				{
					$noti_action = $r['noti_action'];
					echo $noti_action;
				} 
		
				$update_query = "update notif_user SET noti_status='s' where user_id='$user_id';";
				mysql_query($update_query,$conn);
			}
			
			
			
			if(mysql_num_rows($sql)>0)
			{
				$sql4=mysql_query("SELECT module.*, user.*, form.* 
					FROM user 
					JOIN module 
					ON module.module_id=user.module_id
					JOIN form on form.module_id=module.module_id
					WHERE user.module_id='$module_id' 
					AND user.user_id='$user_id'
					AND form.session_name='$session_name'"); 
					if(mysql_num_rows($sql4)>0)		
					{
						while($row4=mysql_fetch_array($sql4))
						{
							
							$_SESSION['module_name'] = $row4['module_name'];
							$_SESSION['form_status'] = $row4['form_status'];
						}?>
						
						<div class="row" style="margin-bottom:20px">
							<span style="float: left;"><?php echo $session_name;?></span> 
							<span style="float: right;"><?php echo $_SESSION['module_name'];?></span>					 
						</div>
						
						<div class="row" style="margin:0 auto;"><?php	
							$status=$_SESSION['form_status'];
							if($status!='new' )
								{ ?>
									<!--<a href="datacontroller_goal.php" style="text-decoration:none;">-->
										<button class="col-md-4 content-boxes-v6">
											<i class="rounded-x  icon-notebook"></i>
											<h3 class="title-v3-md text-uppercase margin-bottom-10">New Records</h3>
										 </button>
									</a><?php
								 }
							else
								{?>
									<a href="dc_goal.php" style="text-decoration:none;">
										<button class="col-md-4 content-boxes-v6">
											<i class="rounded-x  icon-notebook"></i>
											<h3 class="title-v3-md text-uppercase margin-bottom-10">New Records</h3>
										</button>
									</a><?php 
								} ?>

							<a href="datacontroller_updaterecord.php" style="text-decoration:none;">
								<button class="col-md-4 content-boxes-v6">		
									<i class="rounded-x icon-docs"></i>
									<h3 class="title-v3-md text-uppercase margin-bottom-10">Update Records</h3>
									<p></p>
								</button>
							</a> 
							
							<a href="datacontroller_viewupdated.php" style="text-decoration:none;">
								<button class="col-md-4 content-boxes-v6">
									<i class="rounded-x icon-docs"></i>
									<h3 class="title-v3-md text-uppercase margin-bottom-10">View Status</h3>
									<p></p>
								</button>
							</a>
						</div>
	
						
						<hr class="margin-bottom-30">
						<div class="alert alert-info fade in">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<strong>Information</strong> 
							<ul>
							<?php if ($status=='new')
										echo"<li style='color:#000;'>You need to <b>add new records</b> for ". $session_name ."</li>";
								 elseif ($status=='pending')
										echo "<li style='color:#000;'>Your records are <b>pending</b> for approval from Data Manager</li>";
								elseif ($status=='approved')
										echo "<li style='color:#000;'>Your main records for ".$session_name ." has been <b>approved</b></li>";
								else
									echo "<li style='color:#000;'>Your records are <b>rejected</b>. You need to update the records.</li>";?>
								<li style='color:#000;'>Check Module Workbench to update achievement.</li>
							</ul>
						</div><?php	
			
					}
					else
					{
						echo "no data found";
					}
			}

			else

			{?>
				<div class="row" style="margin:0 auto;">
					<button class="col-md-4 content-boxes-v6">
						<i class="rounded-x  icon-notebook"></i>
						<h3 class="title-v3-md text-uppercase margin-bottom-10">New Records</h3>
					</button>
					<button class="col-md-4 content-boxes-v6">		
						<i class="rounded-x icon-docs"></i>
						<h3 class="title-v3-md text-uppercase margin-bottom-10">Update Records</h3>
					</button>
					<button class="col-md-4 content-boxes-v6">
						<i class="rounded-x icon-docs"></i>
						<h3 class="title-v3-md text-uppercase margin-bottom-10">View Status</h3>
					</button>
				</div>

	
						
					<hr class="margin-bottom-30">
					<div class="alert alert-info fade in">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<strong>Information</strong> 
						<ul><li style="color:#000">There are no session and module records</li></ul>
					</div><?php
			}	?>
		

<!--=== End Service Block ===-->


		</div><!--/wrapper-->



		

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
