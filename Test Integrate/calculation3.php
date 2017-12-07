<html>
<?php
	include('style_dc.php');
	include('sidebar.php');
	
	if (isset($_POST['calculate'])){
	$module_id=$_POST['module_id']; 
	$sesi=$_POST['sesi']; 
	$ach_desc=$_POST['ach_desc']; 
	$target=$_POST['target'];
	$ach_id=$_POST['ach_id']; 
	

	$query="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, achievement.ach_result, target.target_id
FROM kpi
JOIN target ON target.kpi_id = kpi.kpi_id
JOIN achievement ON achievement.target_id = target.target_id  where goal.module_id='$module_id' AND goal.session_name='$sesi' AND achievement.ach_id='$ach_id'";
$result4=mysql_query($query) or die (mysql_error());
			if (mysql_num_rows($result4)>0)
			{ ?>
			<div id="container" style="min-width: 310px; height: 400px; margin: 10 auto"></div><div class="control-group">
				<table class="table table-bordered">
				<thead>
					<tr>
						
						<th><center>KPI</th>
						<th><center>Target</th>
						<th><center>Achievement</th> 
						<th><center>Achievement Result</th>
						<!--<th><center>Action</th>-->
					</tr>
				</thead>
				<tbody>
				<?php 
				
				$x=1;
				while($row4=mysql_fetch_array($result4))
				{
					$kpi_desc	=$row4['kpi_desc'];
					$target		=$row4['target'];
					//$ach_id	    =$row3['ach_id'];
					$ach_desc	=$row4['ach_desc']; 
					$ach_result =$row4['ach_result']?>
					
					 <tr style="font-size:13px">
						<td><?php echo $kpi_desc;?></td>
						<td><?php echo $target;?></td>
						<td><?php echo $ach_desc;?></td>
						<td><?php echo $ach_result;?></td>
						<!--<td><a class="btn btn-primary " href="calculation3.php?id='.$row['id'].'" name="calculate">Calculate Result</a></td>;-->
					</tr><?php $x++; 
				}
			}
			
?>
				</tbody>
			</table>
<?php			
	}	?>
<head>		
<style>
.box
{
    background-color:#3d4543;
    height:300px;
    width:250px;
    border-radius:10px;
    position:relative;
    top:80px;
    left:40%;
}
.display
{
    background-color:#222;
    width:220px;
    position:relative;
    left:15px;
    top:20px;
    height:40px;
}
.display input
{
 
 
     position:relative;
    left:2px;
    top:2px;
    height:35px;
    color:black;
    background-color:#bccd95;
    font-size:21px;
    text-align:right;
}
.keys
{
    position:relative;
    top:15px;
}
.button
{
    width:40px;
    height:30px;
    border:none;
    border-radius:8px;
    margin-left:17px;
    cursor:pointer;
    border-top:2px solid transparent;
}
.button.gray
{
    color:white;
    background-color:#6f6f6f;
    border-bottom:black 2px solid;
    border-top:2px #6f6f6f solid;
}
.button.pink
{
    color:black;
    background-color:#ff4561;
    border-bottom:black 2px solid;
}
.button.red
{
    color:red;
    background-color:303030;
    border-bottom:black 2px solid;
    border-top:2px 303030 solid;
}
.button.orange
{
    color:black;
    background-color:FF9933;
    border-bottom:black 2px solid;
    border-top:2px FF9933 solid;
}
.gray:active
{
    border-top:black 2px solid;
    border-bottom:2px #6f6f6f solid;
}
.pink:active
{
    border-top:black 2px solid;
    border-bottom:#ff4561 2px solid;
}
.black:active
{
 
 
     border-top:black 2px solid;
    border-bottom:#303030 2px solid;
}
.orange:active
{
    border-top:black 2px solid;
    border-bottom:FF9933 2px solid;
}
p
{
    line-height:10px;
}
</style>
<script>
function c(val)
{
    document.getElementById("d").value=val;
}
function math(val)
{
    document.getElementById("d").value+=val;
}
function e()
{
    try
    {
      c(eval(document.getElementById("d").value))
    }
    catch(e)
    {
      c('Error')
    }
}
</script>
</head>
<body>
<form><br><br><br>
<div class="box">
    <div class="display"><input type="text" readonly size="15.75" id="d"></div> <br>
    <div class="keys">
        <p>
        <input type="button" class="button gray" value="mrc" onclick='c("not defined ")'>
        <input type="button" class="button gray" value="(" onclick='math("(")'>
        <input type="button" class="button gray" value=")" onclick='math(")")'>
        <input type="button" class="button pink" value="/" onclick='math("/")'>
        </p>
        <p>
        <input type="button" class="button red" value="7" onclick='math("7")'>
        <input type="button" class="button red" value="8" onclick='math("8")'>
        <input type="button" class="button red" value="9" onclick='math("9")'>
        <input type="button" class="button pink" value="*" onclick='math("*")'>
        </p>
        <p>
        <input type="button" class="button red" value="4" onclick='math("4")'>
        <input type="button" class="button red" value="5" onclick='math("5")'>
        <input type="button" class="button red" value="6" onclick='math("6")'>
        <input type="button" class="button pink" value="-" onclick='math("-")'>
        </p>
        <p>
        <input type="button" class="button red" value="1" onclick='math("1")'>
        <input type="button" class="button red" value="2" onclick='math("2")'>
        <input type="button" class="button red" value="3" onclick='math("3")'>
        <input type="button" class="button pink" value="+" onclick='math("+")'>
        </p>
        <p>
        <input type="button" class="button red" value="0" onclick='math("0")'>
        <input type="button" class="button red" value="." onclick='math(".")'>
        <input type="button" class="button red" value="C" onclick='c("")'>
        <input type="button" class="button orange" value="=" onclick='e()'>
        </p>
    </div><br><br><br>
	<form action="calculation4.php" method="post">
<center><input type = "Submit">
</form>
</div>
</body>
</html>
	</html>