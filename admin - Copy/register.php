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
        $sql1 = "INSERT INTO user (username, password, role_id, module_id, email) VALUES ('$uname', 'password', 'email', 'role', 'module')";
        $result1=mysql_query($sql1,$conn);
        
        
    }
?>