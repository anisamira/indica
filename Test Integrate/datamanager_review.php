<body>
<?php
	include('nav-noti.php');
	include('style_dc.php');
	include('script.php');
?>
	<div class="wrapper">
		<div id="content">
				<?php 
					$module_id=$_SESSION['module_id'];
					$user_id=$_SESSION['user_id'];
					if(isset($_POST['approval']))
					{
						$form_id	=$_POST['form_id'];						
					}
					
					$form_id		=$_SESSION['form_id'];
					
					$sql="SELECT session_name from form where form_id='$form_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['session_name']=$row['session_name'];
					}
					$session_name	=$_SESSION['session_name'];
						
						
			
			
							
							?>
				
				
				
		<!--<div class="w3-main" style="margin-left:300px;margin-top:43px;">-->
				<div style="width:100%; overflow:scroll; position:relative;"> 
					<form action="main_dm.php" method="post">
						<table class="table table-bordered"> 						
							<tr style="font-size:13px">
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
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*
							FROM goal 
							JOIN strategy ON strategy.goal_id=goal.goal_id 
							JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
							JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
							JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
							JOIN target ON target.kpi_id=kpi.kpi_id 
							JOIN reference ON reference.kpi_id=kpi.kpi_id
							JOIN form ON form.session_name=goal.session_name
							WHERE form.module_id='$module_id' AND 
							goal.module_id='$module_id' AND
							form.session_name='$session_name'";
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
						
						<tr style="font-size:13px">  
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
								<label class="radio-inline" style="color:#000"><input type="radio" name="approval<?php echo $x;?>" value="approve" required> Approve</input></label>
								<input type="radio" name="approval<?php echo $x;?>" value="reject"> Reject</input>
							</td>
							<td><textarea cols="20" name="action_comment<?php echo $x;?>"></textarea></td>
						</tr>

								<?php
							$x++;
							}
							?>
					</table>
					<div style="margin:20px;">			
							<input type="checkbox" name="check" value="yes" required> I hereby admit that all records / information submitted are true.</input></br></br>
							<input type="hidden" name="form_id" value="<?php echo $form_id;?>">
							<input type="submit" name="submit_approval" value="Submit" onclick="return confirm('Are you sure you want to submit?');" /></input>	
					</div>		<!--<form action="index.php" method="post">-->			
				</form>
		
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