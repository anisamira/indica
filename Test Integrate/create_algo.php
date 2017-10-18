<?php
include ('connection.php');

if(isset($_POST['create'])){

    $start_year=$_POST['start_year'];
    $end_year=$_POST['end_year'];
    $y = 1;
    $session_name="Sesi ".$start_year."-".$end_year;

    $sql1 = "INSERT INTO session (session_name, session_status) VALUES ('$session_name', TRUE)";
    $result1=mysql_query($sql1,$conn); 
    $sql2 = "UPDATE session SET session_status = FALSE WHERE session_name NOT IN ($session_name)";
    $result2=mysql_query($sql2,$conn);

    for($x=$start_year; $x<=$end_year; $x++ ){
        $year="year".$y;
        $sql2 = "UPDATE session SET $year = $x WHERE session_name = '$session_name'";
        $result2=mysql_query($sql2,$conn);
        $sql3 = "INSERT INTO year (year_name, session_name) VALUES ('$x','$session_name')"; 
        $result3=mysql_query($sql3,$conn);
        $y++;

    
    }


    
    // $sql4 = "UPDATE year SET year_status = FALSE where session_id NOT IN ($session_id) ";
    // $result4=mysql_query($sql4,$conn);
    
    
}

header('location:admin_create_session.php?status=created');


?>