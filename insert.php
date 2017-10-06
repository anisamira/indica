<?php  
include('connection.php');
	$kpidesc			=$_POST["kpidesc"];
	$op_def	=$_POST["op_def"];
	$base1			=$_POST["base1"];
	$base2			=$_POST["base2"];
	$tgt1		=$_POST["tgt1"];
	$tgt2		=$_POST["tgt2"]; 
	$tgt3		=$_POST["tgt3"];
	$tgt4		=$_POST["tgt4"];
	$tgt5		=$_POST["tgt5"];
	$own		=$_POST["own"]; 
	$datasource		=$_POST["datasource"];
    $estcost		=$_POST["estcost"];
	$expfinreturn	=$_POST["expfinreturn"];
 
 $sql = "INSERT INTO test(kpidesc, op_def, base1, base2, tgt1, tgt2, tgt3, tgt4, tgt5, own, datasource, estcost, expfinreturn) VALUES('$kpidesc','$op_def','$base1','$base2','$tgt1','$tgt2','$tgt3','$tgt4','$tgt5','$own','$datasource','$estcost','$expfinreturn')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 