<?php
include ('connection.php');

if(isset($_POST['submit'])){
    
        // $fname=$_POST['fname'];
        // $lname=$_POST['lname'];
        $uname=$_POST['uname'];
        $password=$_POST['password'];
        // $cpassword=$_POST['cpassword'];
        $email=$_POST['email'];
        $role=$_POST['role'];
        $module=$_POST['module'];
        
    
        //insert input data dalam table
        $sql1 = "INSERT INTO user (username, password, email, module_id, role_id ) VALUES ('$uname', '$password', '$email', '$module', '$role')";
        $result1=mysql_query($sql1,$conn);
        
        
    }

    header('location:admin_manageuser_create_new_user.php?status=created');

?>