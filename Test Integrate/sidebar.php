<?php
// include_once ('connection.php');
include ('nav-noti.php');
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INDICA UM</title>
    

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>


<style>
        label {
        font-weight: normal !important;
    }
    </style>


<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
		 <div class="col-2">
        <nav id="sidebar">

            <ul class="list-unstyled components">

                <p><span>Welcome,<strong> <?php echo $_SESSION['username']; ?> </strong></span><br></p>

                <!-- General menu for all users PART 1 -->


                <!-- Menu for ADMIN R01 -->
                <?php if (($_SESSION['role_id']) == 'R01') {?>
					<li><a href="main_admin.php"><i class="glyphicon glyphicon-home"></i>  Home</a></li>                
                <li>
                
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Users</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="admin_manageuser_create_new_user.php">Create New User</a></li>
                        <li><a href="admin_manageuser_viewuser.php">View All Users</a></li>
                        <li><a href="admin_manageuser_edituser.php">Edit User</a></li></ul>
                </li>
                <li><a href="admin_create_session.php">Create Sessions</a></li>
                <li><a href="logtrails.php">Log Trails</a></li>
				<li><a href="calculation1.php">Calculation</a></li>  
                <li><a href="workbench_dash.php">Dashboard</a></li>
				<li><a href="workbench_view.php">Module Workbench</a></li>
				<li><a href="report_admin.php">Reporting</a></li>             
				
                <?php }
				 if (($_SESSION['role_id']) == 'R02') {?>
				 
					<li><a href="main_dc.php">Home</a></li>
					<li><a href="work.php">Module Workbench</a></li>
					<li><a href="calculation1.php">Calculation</a></li> <?php
					
				 }
				 
				  if (($_SESSION['role_id']) == 'R03') {?>
					<li><a href="main_dm.php">Home</a></li>
					<li><a href="calculation1.php">Calculation</a></li> <?php		  
				  }
				  
				  if (($_SESSION['role_id']) == 'R04') {?>
					<li><a href="main_vc.php"> Home</a></li>
					<li><a href="graph_kpi.php">Dashboard</a></li>
					<li><a href="workbench_tnc.php">Module Workbench</a></li>
					<li><a href="report_tnc.php">Reporting</a></li><?php
				  }?>

                <!-- General menu PART 2 -->
                <li>
                    <!-- <a href="logout.php">Log Out</a>o -->
                </li>
            </ul>


        </nav>

        <!-- Page Content Holder -->
        <div id="content">


        </div>
		</div>
    </div>





    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


</body>


</html>

</html>

