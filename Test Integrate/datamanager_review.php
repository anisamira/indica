

<body>
<?php
	include('sidebar.php');
	include('style_dc.php');
	include('script.php');
?>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:20px;">
				<?php 
					$module_id=$_SESSION['module_id'];
					$user_id=$_SESSION['user_id'];
					$sql="SELECT session.* , form.* 
						FROM session 
						JOIN form 
						ON session.session_name=form.session_name 
						WHERE session.session_status='1' 
						AND form.form_status='pending'
						AND form.module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['session_name']=$row['session_name'];
						$_SESSION['form_id']=$row['form_id'];
					}
						$session_name	=$_SESSION['session_name'];
						$form_id		=$_SESSION['form_id'];
						
			
			
			
					if ($_SERVER["REQUEST_METHOD"] == "POST")
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
										
							
						}?>
				

					
					
					
					
		<!--		<div class="w3-main" style="margin-left:300px;margin-top:43px;">-->
				<div class="table-responsive">  
					<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
					   <table class="table table-bordered"> 
							<tr>
								<th>No.</th>  
								<th>Goals</th>  
								<th>Strategies</th>
								<th>Action Plan</th>  
								<th>KPI</th>
								<th>Operation Definition</th>
								<th>Achievement 2014</th>  
								<th>Achievement 2015</th>
								<th>Target 2016</th>  
								<th>Target 2017</th>  
								<th>Target 2018</th>  
								<th>Target 2019</th>  
								<th>Target 2020</th>
								<th>Ownership</th> 
								<th>Data Source</th> 
								<th>Estimated Cost (RM)</th> 
								<th>Expected Financial Returns</th> 	
								<th>Action</th>
								<th>Comment</th>
							</tr>
							<?php
							$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
							FROM goal 
							JOIN strategy ON strategy.goal_id=goal.goal_id 
							JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
							JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
							JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
							JOIN target ON target.kpi_id=kpi.kpi_id 
							JOIN reference ON reference.kpi_id=kpi.kpi_id 
							WHERE module_id='$module_id'
							AND goal.session_name='$session_name'";
							$result = mysql_query($sql) or die(mysql_error()); 
							while($row=mysql_fetch_array($result))
							{
								$goal_desc		=$row['goal_desc'];
								$strategy_desc	=$row['strategy_desc'];
								$actionplan_desc=$row['actionplan_desc'];
								$kpi_id			=$row['kpi_id'];
								$kpi_desc		=$row['kpi_desc'];
								$operation_def	=$row['operation_def'];
								$baseline1		=$row['baseline1'];
								$baseline2		=$row['baseline2'];
								$target1		=$row['target1'];
								$target2		=$row['target2'];
								$target3		=$row['target3'];
								$target4		=$row['target4'];
								$target5		=$row['target5'];
								$ownership		=$row['ownership'];
								$data_source	=$row['data_source'];
								$estimated_cost	=$row['estimated_cost'];
								$exp_fin_return	=$row['exp_fin_return'];
								
							
						
						?>
						
						<tr>  
							<td><?php echo $x;?></td>
							<td><?php echo $goal_desc;?></td>
							<td><?php echo $strategy_desc;?></td>
							<td><?php echo $actionplan_desc;?></td>
							<td><?php echo $kpi_desc;?></td>
							<td><?php echo $operation_def;?></td>
							<td><?php echo $baseline1;?></td>
							<td><?php echo $baseline2;?></td>
							<td><?php echo $target1;?></td>
							<td><?php echo $target2;?></td>
							<td><?php echo $target3;?></td>
							<td><?php echo $target4;?></td>
							<td><?php echo $target5;?></td>
							<td><?php echo $ownership;?></td>
							<td><?php echo $data_source;?></td>
							<td><?php echo $estimated_cost;?></td>
							<td><?php echo $exp_fin_return;?></td>
							<td><input type="hidden" name="kpi_id<?php echo $x;?>" value="<?php echo $kpi_id;?>"></input>
								<label class="radio-inline"><input type="radio" name="approval<?php echo $x;?>" value="approve" required> Approve</input></label>
								<input type="radio" name="approval<?php echo $x;?>" value="reject"> Reject</input>
							</td>
							<td><textarea cols="20" name="action_comment<?php echo $x;?>"></textarea></td>
						</tr>

								<?php
							$x++;
							}
							?>
						</table>
						<!--<input type="submit" name="submit" value="Submit"></input>-->
					</form>	
				</div>
				<div style="margin:20px;">
					<!--<form action="index.php" method="post">-->
						<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
						<input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to submit?');" /></input>
					</form>
				</div>
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