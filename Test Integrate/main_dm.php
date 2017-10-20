

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
						$sql	="INSERT INTO master_status (kpi_id, form_id) VALUES ('$kpi','$form_id',Now())";
						$result = mysql_query($sql) or die(mysql_error());  
						if (false === $result)
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
				<table class="table table-bordered"> 
					<tr>
						<th>Version</th>						
						<th>Last Updated</th>
						<th>Status</th>
						<th>Action</th>						
					</tr>
					<?php
					$sql= "SELECT * 
						FROM form 
						WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$form_status	=$row['form_status'];
							$form_id		=$row['form_id'];
							$session_name	=$row['session_name'];?>
							<tr>  
								<td>KPI Achievement <?php echo $session_name;?></td>
								<td>30 / 8 / 2017</td>
								<td><?php echo $form_status;?></td>
								<td>
	                                    <form action="datamanager_review.php" method="post"> 
										<button data-toggle="modal" data-target="#responsive">Approval</button>
											
							</tr><?php
							
						}
					}
					else
					{
						echo "no data found";
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

