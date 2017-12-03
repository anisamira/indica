<?php
include ('sidebar.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="table.css" />
    <link rel="stylesheet" type="text/css" href="alert.css" />
    <link rel="stylesheet" type="text/css" href="selectdropdown.css" />
    <link rel="stylesheet" type="text/css" href="pure-min.css" />
    </head>


    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->

            <!-- Page Content Holder -->
            <div id="content">

            <form name="registration" action="" method="post" class="pure-form pure-form-aligned">
<fieldset>

    <div class="pure-control-group">
        <label for="fname"><b>First Name</b></label>
        <input id="fname" type="text" placeholder="First Name">
        <span class="pure-form-message-inline">* This is a required field.</span>
    </div>

    <div class="pure-control-group">
        <label for="lname"><b>Last Name</b></label>
        <input id="lname" type="text" placeholder="Last Name">
        <span class="pure-form-message-inline">* This is a required field.</span>
    </div>

    <div class="pure-control-group">
        <label for="uname"><b>Username</b></label>
        <input id="uname" type="text" placeholder="Username">
        <span class="pure-form-message-inline"> *This is a required field.</span>
    </div>

    <div class="pure-control-group">
        <label for="cpassword"><b>Password</b></label>
        <input id="cpassword" type="password" placeholder="Password">
        <span class="pure-form-message-inline">* This is a required field.</span>        
    </div>

    <div class="pure-control-group">
        <label for="password"><b>Confirm Password</b></label>
        <input id="password" type="password" placeholder="Password">
        <span class="pure-form-message-inline">* This is a required field.</span>
    </div>

    <div class="pure-control-group">
        <label for="email"><b>Email Address</b></label>
        <input id="email" type="email" placeholder="Email Address">
        <span class="pure-form-message-inline">* This is a required field.</span>
    </div>

<div class="pure-controls">
        <label for="cb" class="pure-radio"><b>User Role</b></label>
            <label> <input id="cb" type="radio" name="role" value="M01"> Admin</label> <br> 
            <label> <input id="cb" type="radio" name="role" value="M02"> Data Manager</label> <br>
            <label> <input id="cb" type="radio" name="role" value="M03"> Data Controller</label> <br>
            <label> <input id="cb" type="radio" name="role" value="M04"> Deputy Vice Chancellor</label> <br>                    
                    <div class="select desc" id="M04">
                    <select>
                    <option>Choose an option</option>
                    <option value="1">Academic & International</option>
                    <option value="2">Student Affairs & Alumni</option>
                    <option value="3">Development</option> 
                    <option value="4">Research & Innovation</option>
                    <option value="5">Bursar</option>                    
                    </select>
                    </div>

</div>

<div class="pure-controls">
        <label for="cb" class="pure-radio"><b>Module</b></label>
        <label> <input id="cb" type="radio" name="module" value="M01"> Module 1: Academic</label> <br> 
        <label> <input id="cb" type="radio" name="module" value="M02"> Module 2: Student Life</label> <br>
        <label> <input id="cb" type="radio" name="module" value="M03"> Module 3: Excellent Research</label> <br>
        <label> <input id="cb" type="radio" name="module" value="M04"> Module 4: Internalization and Branding</label> <br>
        <label> <input id="cb" type="radio" name="module" value="M05"> Module 5: Infrastructure Planning and Development</label> <br>
        <label> <input id="cb" type="radio" name="module" value="M06"> Module 6: Financial Sustainability and Wealth Creation</label> <br>
        <label> <input id="cb" type="radio" name="module" value="M017"> Module 7: Faculty and Staff Recruitment and Development</label> <br>

</div>

    <div class="pure-controls">
        <!-- <label for="cb" class="pure-checkbox">
            <input id="cb" type="checkbox"> I've read the terms and conditions
        </label> -->

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

<script>
    $(document).ready(function() {
    $("div.desc").hide();
    $("input[name$='role']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
</script>




    </body>
</html>
