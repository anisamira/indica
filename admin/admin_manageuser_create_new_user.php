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
<!-- <legend><h3>Registration</h3></legend>
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
<input type="checkbox" name="role" value="M07">Module 7<br> -->

<form>
                <h1>Create Logon</h1>
                <div class="line"><label for="username">Username *: </label><input type="text" id="username" /></div>
                <div class="line"><label for="pwd">Password *: </label><input type="password" id="pwd" /></div>
                <!-- You may want to consider adding a "confirm" password box also -->
                <div class="line"><label for="surname">Surname *: </label><input type="text" id="surname" /></div>
                <div class="line"><label for="other_names">Other Names *: </label><input type="text" id="names" /></div>
                <div class="line"><label for="dob">Date of Biorth *: </label><input type="text" id="dob" /></div>
                <div class="line"><label for="email">Email *: </label><input type="email" id="email" /></div>
                <!-- Valid input types: http://www.w3schools.com/html5/html5_form_input_types.asp -->
                <div class="line"><label for="tel">Telephone: </label><input type="text" id="tel" /></div>
                <div class="line"><label for="add">Address *: </label><input type="text" id="add" /></div>
                <div class="line"><label for="ptc">Post Code *: </label><input type="text" id="ptc" /></div>
                <div class="line submit"><input type="submit" value="Submit" /></div>
 
                <p>Note: Please make sure your details are correct before submitting form and that all fields marked with * are completed!.</p>
            </form>

</fieldset></form>
</div>

  <!-- End page content -->
</div>
</body>
</html> 




