<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>INDICA UM</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">
	<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">
	<!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
<?php
	include('sidebar.php');
	
	$module_id=$_SESSION['module_id'];
	
				
	if(isset($_POST['submit']))
		
	{


		$sql="UPDATE form SET form_status='pending' WHERE module_id='$module_id'";
				$result = mysql_query($sql) or die(mysql_error());  
			   
				if (false === $result)
					{
						echo mysql_error();
					}
					

	}
?>



	<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<?php
			
			$sql="SELECT * FROM module WHERE module_id='$module_id'";
			$result = mysql_query($sql) or die(mysql_error());  
			  while($row=mysql_fetch_array($result))
			{
				
				$_SESSION['module_name'] = $row['module_name'];
			}?>
			
		<div class="row" style="margin-bottom:20px">
		<?php echo $_SESSION['module_name'];?>
		</div>
		
		
		<div class="row" style="margin:0 auto;">
		<?php
		
		// $sql="SELECT * FROM form WHERE module_id='$module_id'";
			// $result = mysql_query($sql) or die(mysql_error());  
			  // while($row=mysql_fetch_array($result))
					// {
						// $status		=$row['form_status'];
						// if($status=='pending')
							// { ?>
								 <!--<a href="datacontroller_goal.php" style="text-decoration:none;">-->
								<!--	<button class="col-md-4 content-boxes-v6">
										<i class="rounded-x  icon-notebook"></i>
										
										<h3 class="title-v3-md text-uppercase margin-bottom-10">New Records</h3>
										<p></p>
									 </button>
								</a> --><?php
							// }
						// else
							// {?>
									<a href="datacontroller_goal.php" style="text-decoration:none;">
									<button class="col-md-4 content-boxes-v6">
										<i class="rounded-x  icon-notebook"></i>
										
										<h3 class="title-v3-md text-uppercase margin-bottom-10">New Records</h3>
										<p></p>
									</button>
								</a><?php
							//}
					//}?>
					
		
		
	<!--	<a href="datacontroller_updaterecord2.php" style="text-decoration:none;">-->
			<button class="col-md-4 content-boxes-v6">		
				<i class="rounded-x icon-docs"></i>
				<h3 class="title-v3-md text-uppercase margin-bottom-10">Update Records</h3>
				<p></p>
			</button>
		</a> 
		
		<a href="datacontroller_viewupdated.php" style="text-decoration:none;">
			<button class="col-md-4 content-boxes-v6">
				<i class="rounded-x icon-docs"></i>
				<h3 class="title-v3-md text-uppercase margin-bottom-10">View Status</h3>
				<p></p>
			</button>
		</a>
		
	<!--	<a href="archive.php" style="text-decoration:none;">
			<button class="col-md-4 content-boxes-v6">
				<i class="rounded-x icon-folder"></i>
				<h3 class="title-v3-md text-uppercase margin-bottom-10">Archive</h3>
				<p></p>
			</button>
		</a> -->

	</div><!--/row-->
</div><!--/container-->
<!--=== End Service Block ===-->


		</div><!--/wrapper-->



		<!-- JS Global Compulsory -->
		<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- JS Implementing Plugins -->
		<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery.parallax.js"></script>
		<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<!-- JS Customization -->
		<script type="text/javascript" src="assets/js/custom.js"></script>
		<!-- JS Page Level -->
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>
		<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
		<script type="text/javascript" src="assets/js/plugins/revolution-slider.js"></script>
		<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				App.init();
				App.initParallaxBg();
				FancyBox.initFancybox();
				OwlCarousel.initOwlCarousel();
				StyleSwitcher.initStyleSwitcher();
				RevolutionSlider.initRSfullWidth();
			});
		</script>

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
