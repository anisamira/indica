
<?php
// if (isset($_POST[''])){

	 // require_once 'dbtest.php';
     // $con=getdb();	
// foreach ($_POST['goal'] as $key=>$value)
// {
// $goal=mysqli_real_escape_string($value);	
// $sql=("INSERT INTO goli (goals) VALUES ($goal)");
// $result = mysqli_query($con, $sql) or die(mysqli_error($con));  
   
   // if (false === $result) {
    // echo mysql_error();

   // }
// } 
// }

// ?>

<?php
include 'dbtest.php';
			if (isset($_POST['next']))
			{
				$goal=$_SESSION['goal'];
				$st=$_SESSION['strategy'];
				$ac=$_SESSION['action'];
				$query='';
				for ($count=0;$count<count($goal);$count++)
					
                // foreach ($_POST['goal'] as $key=>$value)
					{

			      $goal_clean=mysqli_real_escape_string($conn,$goal[$value]);
					$st_clean=mysqli_real_escape_string($conn,$st[$key]);
					$ac_clean=mysqli_real_escape_string($conn,$ac[$key]);
					
				if ($goal!=''&&$st!=''&&$ac=''){
				
				$query.='
				INSERT INTO goli (goals,st,ac) VALUES ("'.$goal_clean.'","'.$st_clean.'","'.$ac_clean.'");
				
				';
				}
				}
			
			if ($query!='')
			{
			if (mysqli_multi_query($conn,$query))
			{
			echo 'Data Inserted';	
			}				
			}
			else 
			{
				echo 'Error';
			}
			}
			
			else
				
			echo 'bodoh';
			?>