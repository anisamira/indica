<?php
include ('sidebar.php');

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
        $sql1 = "INSERT INTO user (username, password, role_id, email, module_id) VALUES ('$uname', '$password', '$role','$email', '$module')";
        $result1=mysql_query($sql1);

// header('location:admin_manageuser_create_new_user.php?status=created');

}
        

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="table.css" />
    <link rel="stylesheet" type="text/css" href="alert.css" />
    <link rel="stylesheet" type="text/css" href="selectdropdown.css" />
    <link rel="stylesheet" type="text/css" href="pure-min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    </head>


    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->

            <!-- Page Content Holder -->
            <div id="content">

            <?php if(!empty($_GET['status'])){?>
          <div class="success_alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>You have created a new user</strong> 
          </div>
    <?php }
    ?>

            <form name="" action="" method="post" class="pure-form pure-form-aligned">
            <fieldset>

            <!-- <div class="pure-control-group">
                <label for="fname"><b>First Name</b></label>
                <input name="fname" type="text" placeholder="First Name">
                <span class="pure-form-message-inline">* This is a required field.</span>
            </div>

            <div class="pure-control-group">
                <label for="lname"><b>Last Name</b></label>
                <input name="lname" type="text" placeholder="Last Name">
                <span class="pure-form-message-inline">* This is a required field.</span>
            </div> -->

            <div class="pure-control-group">
                <label for="uname"><b>Username</b></label>
                <input name="uname" type="text" placeholder="Username" required>
                <span class="pure-form-message-inline"> *This is a required field.</span>
            </div>

            <div class="pure-control-group">
                <label for="password"><b>Password</b></label>
                <input name="password" type="password" placeholder="Password" required>
                <span class="pure-form-message-inline">* This is a required field.</span>        
            </div>

            <div class="pure-control-group">
                <label for="cpassword"><b>Confirm Password</b></label>
                <input name="cpassword" type="password" placeholder="Password" required>
                <span class="pure-form-message-inline">* This is a required field.</span>
            </div>

            <div class="pure-control-group">
                <label for="email"><b>Email Address</b></label>
                <input name="email" type="email" placeholder="Email Address" required>
                <span class="pure-form-message-inline">* This is a required field.</span>
            </div>

        <div class="pure-controls" >
                <label for="cb" class="pure-radio"><b>User Role</b></label>
                    <label> <input id="cb" type="radio" name="role" value="R01" required> Admin</label> <br> 
                    <label> <input id="cb" type="radio" name="role" value="R02" required> Data Manager</label> <br>
                    <label> <input id="cb" type="radio" name="role" value="R03" required> Data Controller</label> <br>
                    <label> <input id="cb" type="radio" name="role" value="R04" required> Deputy Vice Chancellor</label> <br>                    
                            <!-- <div class="select desc" id="M04">
                            <select>
                            <option>Choose an option</option>
                            <option value="1">Academic & International</option>
                            <option value="2">Student Affairs & Alumni</option>
                            <option value="3">Development</option> 
                            <option value="4">Research & Innovation</option>
                            <option value="5">Bursar</option>                    
                            </select>
                            </div> -->

        </div>

        <div class="pure-controls">
                <label for="cb" ><b>Module</b></label>
                <!-- <div class="select desc" id="M03"> -->
                <div class="select">                
                            <select name="module">
                            <option>Choose an option</option>
                            <option value="M01" required>Module 1: Academic</option>
                            <option value="M02" required>Module 2: Student Life</option>
                            <option value="M03" required>Module 3: Excellent Research</option> 
                            <option value="M04" required>Module 4: Internalization and Branding</option>
                            <option value="M05" required>Module 5: Infrastructure Planning and Development</option>                    
                            <option value="M06" required>Module 6: Financial Sustainability and Wealth Creation</option>
                            <option value="M07" required>Module 7: Faculty and Staff Recruitment and Development</option>
                            </select>
                            </div>
                <!--  -->

        </div>

            <div class="pure-controls">
                <!-- <label for="cb" class="pure-checkbox">
                    <input id="cb" type="checkbox"> I've read the terms and conditions
                </label> -->

                <button type="submit" name="submit" class="pure-button pure-button-primary">Submit</button>
            </div>
        </fieldset>
        </form>

    </body>
</html>


<script type="text/javascript">

// script 1
function showfield(name){
  if(name=='Other')document.getElementById('div1').innerHTML='Other: <input type="text" name="other" />';
  else document.getElementById('div1').innerHTML='';
}

// script 2
    $(document).ready(function() {
        $("div.desc").hide();
        $("input[name$='role']").click(function() {
            var test = $(this).val();
            $("div.desc").hide();
            $("#" + test).show();
        });
    });

// script 3
    $(".rbFilter").on("change", function() {
        $("#filterOnControls").find("input").prop("disabled", !$("#filteringON").prop('checked'));
    });

</script>