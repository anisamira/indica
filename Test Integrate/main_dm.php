

<body>
<?php
	include('sidebar.php');
	include('style_dc.php');
	include('script.php');
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
	
					
					
	
?>

<body>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<form action="datamanager_review.php" method="post">
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
	                                   <!-- <form action="datamanager_review.php" method="post"> -->
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

