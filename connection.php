<?php
include('db.php');

  $user = "";
  $pass = "";
  $validated = false;

  if ($_POST)
  {
    $user = $_POST['username'];
    $pass = $_POST['password'];
  }

  session_start();
  $_SESSION['login'] = "";
  if($user!="" && $pass!="")
  {
    
    $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
    $rs = mysql_query($sql,$conn);
    $result = mysql_num_rows($rs);

    if ($result > 0) $validated = true;
    if($validated)
    {
      $_SESSION['login'] = "OK";
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass;
      $sql1= "UPDATE user SET timeStamp=now() WHERE username = '$user' AND password ='$pass'";
      $rs1= mysql_query($sql1,$conn);
        

        if($user=='admin'){     
        header("location:admin.php ");
        }elseif($user=='usera'){
        header("location:usera.php ");
         }elseif($user=='userb'){
        header("location:userb.php ");
         }elseif($user=='tnc'){
        header("location:tnc.php ");
         }
        
       
    }
    else
    {
      $_SESSION['login'] = "";
      echo "Invalid username or password.";
    }
  }
  else $_SESSION['login'] = "";



?>