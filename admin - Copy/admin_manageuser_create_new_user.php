<?php
include ('connection.php');
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css" />
<link rel="stylesheet" type="text/css" href="alert.css" />
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<!-- Start page content -->
<div class="w3-container" style="margin-left:300px;margin-top:43px;">
<br>


<form name="registration" action="" method="post" class="pure-form pure-form-aligned">
<fieldset>
    <div class="pure-control-group">
        <label for="name">Username</label>
        <input id="name" type="text" placeholder="Username">
        <span class="pure-form-message-inline">This is a required field.</span>
    </div>

    <div class="pure-control-group">
        <label for="password">Password</label>
        <input id="password" type="password" placeholder="Password">
    </div>

    <div class="pure-control-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" placeholder="Email Address">
    </div>

    <div class="pure-control-group">
        <label for="foo">Supercalifragilistic Label</label>
        <input id="foo" type="text" placeholder="Enter something here...">
    </div>

<div class="pure-controls">
        <label for="cb" class="pure-radio">Module</label>
            <input id="cb" type="radio" name="role" value="M01">ADMIN<br> 
            <input id="cb" type="radio" name="role" value="M02">DM<br>
            <input id="cb" type="radio" name="role" value="M03">DC<br>
            <input id="cb" type="radio" name="role" value="M04">TNC<br>
</div>


<div class="pure-controls">
        <label for="cb" class="pure-radio">Module</label>
            <input id="cb" type="radio" name="module" value="M01">Module 1<br> 
            <input id="cb" type="radio" name="module" value="M02">Module 2<br>
            <input id="cb" type="radio" name="module" value="M03">Module 3<br>
            <input id="cb" type="radio" name="module" value="M04">Module 4<br>
            <input id="cb" type="radio" name="module" value="M05">Module 5<br>
            <input id="cb" type="radio" name="module" value="M06">Module 6<br>
            <input id="cb" type="radio" name="module" value="M017">Module 7<br>

</div>

    <div class="pure-controls">
        <label for="cb" class="pure-checkbox">
            <input id="cb" type="checkbox"> I've read the terms and conditions
        </label>

        <button type="submit" class="pure-button pure-button-primary">Submit</button>
    </div>
</fieldset>
</form>

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




