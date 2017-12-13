<html>
<?php
	include('nav-noti.php');
	 
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
 $date_q= date ("06/30/Y");
             if ($date_now<=$date_q)
	{
			$quater=1;
	}
else
			$quater=2;	
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
		
		
	
?>

<div id="content">

<?php	
	if (isset($_POST['calculate']))
	{
	$module_id=$_POST['module_id']; 
	$sesi=$_POST['sesi']; 
	$ach_desc=$_POST['ach_desc']; 
	$target=$_POST['target'];
	$ach_id=$_POST['ach_id']; 
	

	$query="SELECT kpi.kpi_id, kpi.kpi_desc, achievement.ach_id, achievement.ach_desc, achievement.target, achievement.ach_result, target.target_id
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
						AND goal.session_name='$sesi'
						AND form.form_status='approved'
						AND achievement.ach_id='$ach_id'
						";
$result4=mysql_query($query) or die (mysql_error());
			if (mysql_num_rows($result4)>0)
			{ ?>
			
				<table class="table table-bordered">
				<thead>
					<tr>
						<th><center>No</th>
						<th><center>KPI</th>
						<th><center>Target</th>
						<th><center>Achievement</th> 
						<th><center>Achievement Result (%)</th>
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
						<td><?php echo $x;?></td>
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
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
			// (alert("Only numbers are allowed"))
            return false;

         return true;
      }
	  
	  
	  
function c(val)
{
    document.getElementById("d").value=val;	
	
}


$('.keyboard').keypress(function(e) 
{
if (e.which==13) {
	//alert("enter");
	return e();
}	
});

function math(val)
{
    document.getElementById("d").value+=val;
}

function back() {
    var value = document.getElementById("d").value;
    document.getElementById("d").value = value.substr(0, value.length - 1);
}

function e()
{
    try
    {
      c(eval(document.getElementById("d").value))
    }
    catch(e)
    {
      c(val)
    }
	
	return e();
}

</script>
</head>
<body>
<form action="calculation4.php" method="post">
<div class="box">
    <div class="display"><input type="text" class="keyboard" onclick="this.select()" onkeypress="return isNumberKey(event)" onKeyDown="if(event.keyCode==13) e()" name="varia" size="17" id="d"></div> <br>
    <div class="keys">
        <p>
		<input type="button" class="button gray" value="&#8592" onclick='back()'>
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

<center><input type ="Submit" value="Submit" name="go">
<input type="hidden" name="module_id" value="<?php echo $module_id;?>"/>
<input type="hidden" name="sesi" value="<?php echo $sesi;?>"/>
<input type="hidden" name="ach_desc" value="<?php echo $ach_desc;?>"/>  
<input type="hidden" name="target" value="<?php echo $target;?>"/> 
<input type="hidden" name="ach_id" value="<?php echo $ach_id;?>"/>    
</form>

</div>
</div>
</body>
<?php

	}
?>
</html>