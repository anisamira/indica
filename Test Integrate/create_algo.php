<?php
include ('connection.php');

if(isset($_POST['create'])){

    $start_year=$_POST['start_year'];
    $end_year=$_POST['end_year'];
    $session_name="Sesi ".$start_year."-".$end_year;

    //create sesi baru
    $sql1 = "INSERT INTO session (session_name, session_status, date_created, created_by) VALUES ('$session_name', TRUE, now(), '$myusername')";
    $result1=mysql_query($sql1,$conn);
    //make sure status previous session off
    $sql2 = "UPDATE session SET session_status = FALSE WHERE session_name NOT IN ('$session_name')";
    $result2=mysql_query($sql2,$conn);

    //masukkan year dalam sesi
    $y = 1;
    for($x=$start_year; $x<=$end_year; $x++ ){

        $year="year".$y;
        $sql3 = "UPDATE session SET $year = $x WHERE session_name = '$session_name'";
        $result3=mysql_query($sql3,$conn);
        $sql4 = "INSERT INTO year (year_name, session_name) VALUES ('$x','$session_name')"; 
        $result4=mysql_query($sql4,$conn);
        $y++;    
    }
    //set current year ikut date
    $crt_year = date("Y");
    $sql5 = "UPDATE year SET current_year=TRUE WHERE year_name=$crt_year";
    $result5=mysql_query($sql5,$conn);    

    //create form untuk setiap module
    for($m=1; $m<=7; $m++){
        $m_id = "M0".$m;
        
        $sql6 = "INSERT INTO form (session_name, module_id, form_status) VALUES ('$session_name', '$m_id', 'new')";
        $result6 = mysql_query($sql6,$conn);
    }
        
}

header('location:admin_create_session.php?status=created');


?>