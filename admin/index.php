<?php
include ('connection.php');
?>

<html>
  <head>
    <title>INDICA UM</title>
  </head>

<style>
  @charset "UTF-8";
/*A Flat Design Login Page by Codelator.com*/

body{
	background-color:#2c3335;
	color:#f5f5f5;
	text-align:center;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
}

a{
	color:#fff;
	text-decoration:none;
}
	
#loginform{
	margin-top:150px;
  margin-left:auto;
  margin-right:auto;
	width:270px;
}
	
.input{
	width:270px;
    padding:15px 25px;
    font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	background: #f5f5f5;
	border:none;
	border-radius: 5px;
	color: #333;
	font-size: 14px;
	margin-top:15px;
}

.loginbutton{
	background-color:#ffdd00;
	border-radius:5px/5px;
	-webkit-border-radius:5px/5px;
	-moz-border-radius:5px/5px;
	color:#333;
	display:inline-block;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	font-size:18px;
	font-weight:bold;
	width:270px;
	text-align:center;
	line-height:50px;
	text-decoration:none;
	height:50px;
	margin-top:20px;
	margin-bottom:20px;
	border:none;
	outline:0;
	cursor: pointer;
}

.loginbutton:active {
	position:relative;
	top:1px;
}

.loginbutton:hover{
	background-color:#e5bf05;
}

.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
  </style>

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

