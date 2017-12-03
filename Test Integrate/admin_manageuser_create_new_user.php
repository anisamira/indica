<?php
include ('sidebar.php');
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />

</head>

<body>
<!-- Start page content -->
<div class="w3-container" style="margin-left:300px;margin-top:43px;">
<br>

<div class="form">

<form name="registration" action="" method="post"> <fieldset>
<legend><h3>Registration</h3></legend>
Name *: <input type="text" name="username" placeholder="Username" required /><br><br>
Username : <input type="text" name="username" placeholder="Username" required /><br><br>
Password : <input type="password" name="password" placeholder="Password" required /><br><br>
Confirm Password : <input type="password" name="password" placeholder="Password" required /><br><br>
Email * : <input type="email" name="email" placeholder="Email" required /><br><br>
User Role <span>: </span>  <input type="checkbox" name="role" value="Admin">Administrator<br>
              <input type="checkbox" name="role" value="DM"> Data Manager<br>
              <input type="checkbox" name="role" value="DC"> Data Controller<br>
              <input type="checkbox" name="role" value="TNC"> TNC<br>
              
Module :   <input type="checkbox" name="role" value="M01">Module 1<br>
<input type="checkbox" name="role" value="M02">Module 2<br>
<input type="checkbox" name="role" value="M03">Module 3<br>
<input type="checkbox" name="role" value="M04">Module 4<br>
<input type="checkbox" name="role" value="M05">Module 5<br>
<input type="checkbox" name="role" value="M06">Module 6<br>
<input type="checkbox" name="role" value="M07">Module 7<br>


</fieldset></form>
</div>

<script type="text/javascript">
function showfield(name){
  if(name=='Other')document.getElementById('div1').innerHTML='Other: <input type="text" name="other" />';
  else document.getElementById('div1').innerHTML='';
}
</script>

<select name="travel_arriveVia" id="travel_arriveVia" onchange="showfield(this.options[this.selectedIndex].value)">
<option selected="selected">Please select ...</option>
<option value="Plane">Plane</option>
<option value="Train">Train</option>
<option value="Own Vehicle">Own Vehicle</option>
<option value="Other">Other</option>
</select>
<div id="div1"></div> 

  <!-- End page content -->
</div>
</body>
</html> 




