

<body>
<?php
	include('style_dc.php');
	include('sidebar.php');
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
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
	
	$sql			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
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
	
	
	if(isset($_POST['submit']))		
	{
		$sql	="UPDATE form 
					SET form_status='pending' 
					WHERE module_id='$module_id' 
					AND session_name='$session_name'";
		$result = mysql_query($sql) or die(mysql_error());  
		if (false === $result)
			{
				echo mysql_error();
			}
		for($y=1; $y<=50; $y++)
			{
				if (empty($_POST["kpi".$y]))
					{
						$error = 1;
					}
				else
					{							
						$kpi	=$_POST['kpi'.$y];	
						$sql	="INSERT INTO master_status (kpi_id, form_id,action_type, action_date) VALUES ('$kpi','$form_id', 'pending', Now())";
						$result = mysql_query($sql) or die(mysql_error());  
						if (false === $result)
							{
								echo mysql_error();
							}
					}
			}
	}
	
	
?>



	<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<?php 

					$sql2="SELECT module.*, user.* 
							FROM user 
							JOIN module 
							ON module.module_id=user.module_id
							WHERE user.module_id='$module_id' 
							AND user.user_id='$user_id'";
					$result2 = mysql_query($sql2) or die(mysql_error());  
					  while($row=mysql_fetch_array($result2))
					{
						
						$_SESSION['module_name'] = $row['module_name'];
					}?>
			
		<div class="row" style="margin-bottom:20px">
		
		<span style="float: left;"><?php echo $session_name;?></span> 
      <span style="float: right;"><?php echo $_SESSION['module_name'];?></span>
	 
		</div>
		
		
		<div class="row" style="margin:0 auto;">
		<?php
		
			if($form_status!='new')
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
		
	<!--	<a href="archive.php" style="text-decoration:none;">
			<button class="col-md-4 content-boxes-v6">
				<i class="rounded-x icon-folder"></i>
				<h3 class="title-v3-md text-uppercase margin-bottom-10">Archive</h3>
				<p></p>
			</button>
		</a> -->

	</div><!--/row-->
</div><!--/container-->
<!--=== End Service Block ===-->


		</div><!--/wrapper-->



		

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
