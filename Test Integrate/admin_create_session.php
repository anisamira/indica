<?php
include ('sidebar.php');
?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />

</head>

<body>

<div class="w3-container" style="margin-left:300px;margin-top:43px;">
    <br><br><br><br><br><br><br>

    <?php 
   if(!empty($_GET['status'])){?>
          <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have created a new session</strong> 
          </div>
  <?php }
  ?>

  <br>

<form action="create_algo.php" method="post">

    <input type="text" class="input" placeholder="Start Year" name="start_year" /> <br><br>
    <input type="text" class="input" placeholder="End Year" name="end_year" /><br><br><br>

    <input type="submit" class="loginbutton" name ="create" value="Create" /><br>
    </form>    
  <!-- End page content -->
</div>
    
</body>
</html> 



