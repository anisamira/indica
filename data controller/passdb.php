
<?php
if (isset($_POST[''])){

	 require_once 'dbtest.php';
     $con=getdb();	
foreach ($_POST['goal'] as $key=>$value)
{
$goal=mysqli_real_escape_string($value);	
$sql=("INSERT INTO goli (goals) VALUES ($goal)");
$result = mysqli_query($con, $sql) or die(mysqli_error($con));  
   
   if (false === $result) {
    echo mysql_error();

   }
} 
}

?>