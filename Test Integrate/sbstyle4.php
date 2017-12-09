<?php
include_once ('connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style4.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <!-- <div class="sidebar-header">
                    <h3>Bootstrap Sidebar</h3>
                    <strong>BS</strong>
                </div> -->

                <ul class="list-unstyled components">

                        <p><span>Welcome,<strong> <?php echo $_SESSION['username']; ?> </strong></span><br></p>
                        
                        <?php if (($_SESSION['role_id']) == 'R01') {?>
                    <li>
                    <a href="main_admin.php">Home</a></li>
            
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            About
                        </a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Manage Users
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="admin_manageuser_create_new_user.php">Create New User</a></li>
                        <li><a href="admin_manageuser_viewuser.php">View All Users</a></li>
                        <li><a href="admin_manageuser_edituser.php">Edit User</a></li>
                        </ul>
                    </li>

                    <li>
                    <a href="admin_create_session.php">
                            <i class="glyphicon glyphicon-link"></i>
                            Create Sessions
                        </a>
                    </li>

                    <li>
                    <a href="logtrails.php">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            Log Trails
                        </a>
                    </li>

                    <li>
                    <a href="workbench_dash.php">
                            <i class="glyphicon glyphicon-send"></i>
                            Dashboard
                        </a>
                    </li>

                                <li><a href="workbench_view.php">Module Workbench</a></li>
                                <li><a href="report_admin.php">Reporting</a></li>
                                <li><a href="calculation1.php">Calculation</a></li>
                                
                            <!-- Menu for DC R02 -->
                                
                                
                            <?php }


                                 if (($_SESSION['role_id']) == 'R02') {?>
                                 
                                    <li><a href="main_dc.php">Home</a></li>
                                    <li><a href="work.php">Module Workbench</a></li>
                                    
                                <?php
                                    
                                 }
                                 
                                //  Menu for DM R03
                                  if (($_SESSION['role_id']) == 'R03') {?>
                                    <li><a href="main_dm.php">Home</a></li><?php		  
                                  }
                                  
                                  if (($_SESSION['role_id']) == 'R04') {?>
                                    <li><a href="main_vc.php"> Home</a></li>
                                    <li><a href="graph_kpi.php">Dashboard</a></li>
                                    <li><a href="workbench_tnc.php">Module Workbench</a></li>
                                    <li><a href="report_tnc.php">Reporting</a></li>
                                    
                                    <?php
                                  }?>
                
                                <!-- General menu PART 2 -->
                                <li>
                                    <a href="logout.php">Log Out</a>
                                </li>    

            </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

        


        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
