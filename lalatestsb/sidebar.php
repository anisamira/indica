<?php
include_once ('connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>INDICA UM</title>
    

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>INDICA UM</h3>
            </div>

            <ul class="list-unstyled components">

                <p><span>Welcome,<strong> <?php echo $_SESSION['username']; ?> </strong></span><br></p>

                <!-- General menu for all users PART 1 -->


                <!-- Menu for ADMIN R01 -->
                <?php if (($_SESSION['username']) == 'admin') {?>
                <li>
                    
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Users</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="admin_manageuser_create_new_user.php">Create new user</a></li>
                        <li><a href="admin_manageuser_viewuser.php">View all user</a></li>
                        <li><a href="admin_manageuser_edituser.php">Edit users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="admin_create_session.php">Create sessions</a>
                </li>
                <li>
                    <a href="logtrails.php">Log Trails</a>
                </li>
                <?php } ?>

                <!-- General menu PART 2 -->
                <li>
                    <a href="logout.php">Log Out</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content Holder -->
        <div id="content">


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