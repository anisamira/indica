<?php
include ('nav-noti.php');


if(isset($_POST['submit'])){
    
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $mobileno=$_POST['mobileno'];
        $password=$_POST['pwd1'];
        $email=$_POST['email'];
        $role=$_POST['role'];
        $module=$_POST['module'];         
         
        //insert input data dalam table
        
            $sql1 = "INSERT INTO user (fname, lname, mobileno, username, password, role_id, email, module_id) VALUES ('$fname', '$lname', '$mobileno','$username', '$password', '$role','$email', '$module')";
            $result1=mysql_query($sql1);
            echo "<script type='text/javascript'>alert('User successfully created!')</script>";
        

// header('location:admin_manageuser_create_new_user.php?status=created');
}
        

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="table.css" />
    
    <!-- <link rel="stylesheet" type="text/css" href="alert.css" /> -->
    <link rel="stylesheet" type="text/css" href="selectdropdown.css" />
    <link rel="stylesheet" type="text/css" href="pure-min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript">

$(document).ready(function() {
	$('#Loading').hide();    
});

function check_username(){

	var username = $("#username").val();
	if(username.length > 2){
		$('#Loading').show();
		$.post("check_username_availablity.php", {
			username: $('#username').val(),
		}, function(response){
			$('#Info').fadeOut();
			 $('#Loading').hide();
			setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
		});
		return false;
	}
}

function finishAjax(id, response){
 
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 

</script>




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
            
            <form action="" method="post" class="pure-form pure-form-aligned">

                    <div class="pure-control-group">
                        <label for="fname"><b>First Name</b></label>
                        <input name="fname" type="text" placeholder="First Name" onblur="return check_username();">                        
                        <span class="pure-form-message-inline">* This is a required field.</span>
                    </div>

                    
		                

                    <div class="pure-control-group">
                        <label for="lname"><b>Last Name</b></label>
                        <input name="lname" type="text" placeholder="Last Name">
                        <span class="pure-form-message-inline">* This is a required field.</span>
                    </div>

                    <div class="pure-control-group">
                        <label><b>User Name</b></label>
                        <input id="username" name="username" type="text" value="" onblur="return check_username();"placeholder="Username" required><span class="pure-form-message-inline">* This is a required field.</span>
                        <div id="Info"></div>
                        <span id="Loading"><img src="loader.gif" alt=""></span>
                        
                        </div>	
                    <!-- <div class="pure-control-group">
                        <label for="username"><b>Username</b></label>
                        <input name="username" type="text" placeholder="Username" required>
                        <span class="pure-form-message-inline"> *This is a required field.</span>
                    </div> -->

                    <div class="pure-control-group">
                        <label for="pwd1"><b>Password</b></label>
                        <input name="pwd1" type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z]).{6,}">
                        <span class="pure-form-message-inline">* Password must contain at least 6 characters, including letters and numbers</span>        
                    </div>


                    <div class="pure-control-group">
                        <label for="email"><b>Email Address</b></label>
                        <input name="email" type="email" placeholder="xxx@yyy.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        <span class="pure-form-message-inline">* Please enter a valid email address.</span>
                    </div>

                    <div class="pure-control-group">
                        <label for="mobileno"><b>Mobile Number</b></label>
                        <input name="mobileno" type="text" placeholder="0123456789" >
                        <span class="pure-form-message-inline">* Please insert according to format: [60123456789] </span>
                    </div>

                <div class="pure-controls" >
                        <label for="cb" class="pure-radio"><b>User Role</b></label>
                            <label> <input id="cb" type="radio" name="role" value="R01" required> Admin</label> <br> 
                            <label> <input id="cb" type="radio" name="role" value="R02" required> Data Controller</label> <br>
                            <label> <input id="cb" type="radio" name="role" value="R03" required> Data Manager</label> <br>
                            <label> <input id="cb" type="radio" name="role" value="R04" required> Deputy Vice Chancellor</label> <br>  
                            <label> <input id="cb" type="radio" name="role" value="R05" required> Vice Chancellor</label> <br>                    

                </div>

                <div class="pure-controls">
                        <label for="cb" ><b>Module</b></label>

                        <div class="select desc" id="R02">
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
                        </div></div>

                        <div class="select desc" id="R03">
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
                        </div></div>

                        <div class="select desc" id="R04">
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
                        </div></div>

                        <div class="select desc" id="R05">
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
                        </div></div>
                </div>

                        
                        <center><button type="submit" name="submit" class="pure-button pure-button-primary">Submit</button></center>

                    </div>
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

    $(document).ready(function() {
	$('#Loading').hide();    
});
 
</script>


