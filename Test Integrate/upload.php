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
	

	
	?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">	

  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="evidence" enctype="multipart/form-data">
<table class="table table-bordered">
									<col width="10%">
									<col width="20%">
									<col width="20%">
									<col width="20%">
									<col width="30%">
									<tr>
									    <th>No.</th>
									    <th>Goal</th>
									    <th>KPI</th>
										<th>Description</th>
										<th>Upload File</th>
									</tr>
<?php
						$module_id=$_SESSION['module_id'];
						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.*, form.*
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id											
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='Approve'
						";
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$kpi_id			=$row['kpi_id'];
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];

						?>

							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td><input class="form-control" type="text" name="evidence_desc<?php echo $x;?>" required/>
									<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"/></td>
								<td><input class="form-control" type="file" name="evidence<?php echo $x;?>" required/>
									<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $kpi_id;?>"/></td>
							</tr>
							<?php
						$x++;
						}
						?>


</table>

<br>
<td>
<input type="submit" name="Upload" value="Upload">
</td>
</form>

</body>
  

<?php


if (isset($_POST['Upload'])){
 
 
//for start post 
 for($y=1; $y<=50; $y++)
								{
									if (empty($_POST['kpi'.$y]))
									{
										$error = 1;
									}
									else
									{	
	$evidence_desc =$_POST['evidence_desc'.$y];
	$value= $_POST['kpi'.$y];
	
	
	 
// start of declare
 $name= $_FILES['evidence'.$y]['name'];

$tmp_name= $_FILES['evidence'.$y]['tmp_name'];

$submitbutton= $_POST['Upload'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

$path= 'Uploads/files/';

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';


}
}
}
 
// end of this one 
 
$sql="INSERT INTO evidence (desc_file,filename,kpi_id) VALUES ('$evidence_desc','$name','$value')";
$result = mysql_query($sql) or die(mysql_error());  											   
												if (false === $result) 
												{
													echo mysql_error();
												}							
}
								}

?>								
								<head>
        <meta http-equiv="refresh" content="3;url=doc.php" />
    </head>
    <body>
        <h1>Redirecting in 3 seconds...</h1>
    </body>
								
								
								
								
								
<?php								
								}




?>




	</div>
		</div>
	</div><!--/wrapper-->


