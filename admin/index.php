<?php
include ('connection.php');
?>

<html>
  <head>
    <title>INDICA UM</title>

    <link rel="stylesheet" type="text/css" href="alert.css" />
	<link rel="stylesheet" type="text/css" href="index_loginform.css" />
  </head>

  <body style="margin-top:5%">

  <?php 
   if(!empty($_GET['status'])){?>
          <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have successfully logged out</strong> 
          </div>
  <?php }
  ?>

    <h1>Login Page</h1>
    <p>Please enter your username and password:</p>
    <form action="index.php" method="post">

    <input type="text" class="input" placeholder="E-mail" name="username" /> <br>
    <input type="password" class="input" placeholder="Password" name="password" /><br>
    <input type="submit" class="loginbutton" value="Login" /><br>
    </form>

  </body>
</html> 

