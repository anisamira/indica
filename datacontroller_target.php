<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>iNDICA UM</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

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
?>
	
	<div class="wrapper">
	
<!--=== Service Block ===-->
<div class="container content-sm">
	<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
	<div class="row">


		</br>
		<div class="table-responsive">  
			<form action="datacontroller_ref.php" method="post">
				  <table id ="maintable" class="table"> 
						<tr>
							<th colspan="2"></th>
							<th colspan="5">Target</th>
						</tr>
						<tr>
							<th>Key Performance Indicator (KPI)</th>
							<th>2016</th>
							<th>2017</th>
							<th>2018</th>
							<th>2019</th>
							<th>2020</th>
						</tr>
						
						<?php
						$x=1;
						for($y=1;  $y<=20; $y++)
						{
							if (empty($_POST["kpi".$y])){
								$error = 1;
							}
							else
							{
								$_SESSION['kpi'.$y]=$_POST['kpi'.$y];
								?>
								<tr>  
									<td><?php echo $_POST['kpi'.$y];?></td>
										<input type="hidden" name="kpi<?php echo $x;?>" value="<?php echo $_POST['kpi'.$y];?>"></input></td>
									<td contenteditable="true"><input type="" name=""/></td>
									<td contenteditable="true"><input type="" name=""/></td>
									<td contenteditable="true"><input type="" name=""/></td>
									<td contenteditable="true"><input type="" name=""/></td>
									<td contenteditable="true"><input type="" name=""/></td>
								</tr><?php
							$x++;
							}							
						}?>
						
					</table>
				<input type="submit" name="next" value="Next" style="float: right;"></input>
				<input type="button" VALUE="Back" onClick="history.go(-1);"></input>
			</form>
		</div>
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
			
					
					    $("#addRows").click(function(e) {
					e.preventDefault();
        $("#maintable").append("<tr><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td></tr>")
    });		
					
					
			});
		</script>
		<script>

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
