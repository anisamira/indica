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

	<div class="wrapper page-option-v1">

<!--=== Service Block ===-->
<div class="container content-sm">
	<div class="row" style="margin-bottom:20px;">
		<h5> Session : 2016 - 2020 </br>
			Module : Student Life TNC (HEPA) </br>
		</h5>
	</div>
	
	<div class="row" style="margin:0 auto; border: 1px solid; padding:10px;">
	<?php
		session_start();
	?>
	
	<form action="datacontroller_submit.php" method="post">
		<table>
			<tr>
				<td>Goal : </td>
				<td colspan="2">Vibrant campus living of the 21st Century</td>
			</tr>
			<tr>
				<td>Strategy : </td>
				<td colspan="2">Ensure efficient transportation system within campus</br></br></td>
			</tr>
			<tr>
				<td>Action Plan :</td>
				<td colspan="2"><input class="form-control input-lg" type="text" name="actionplan"></input></br></td>
			</tr>
			<tr>
				<td>KPI :</td>
				<td colspan="2"><input class="form-control input-lg" type="text" name="kpi"></input></br></td>
			</tr>
			<tr>
				<td>Operation Definition:</td>
				<td colspan="2"><input class="form-control input-lg" type="text" name="operationdefinition"></input></br></td>
			</tr>
			<tr>
				<td>Baseline</td>
				<td>Achievement 2014 : </td>
				<td><input class="form-control input-lg" type="text" name="ach1"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>Achievement 2015: </td>
				<td><input class="form-control input-lg" type="text" name="ach2"></input></br></td>
			</tr>
			<tr>
				<td>Target</td>
				<td>2016 : </td>
				<td><input class="form-control input-lg" type="text" name="target1"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>2017 : </td>
				<td><input class="form-control input-lg" type="text" name="target2"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>2018 : </td>
				<td><input class="form-control input-lg" type="text" name="target3"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>2019 : </td>
				<td><input class="form-control input-lg" type="text" name="target4"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>2020 : </td>
				<td><input class="form-control input-lg" type="text" name="target5"></input></br></td>
			</tr>
			<tr>
				<td>Reference </td>
				<td>Ownership : </td>
				<td><input class="form-control input-lg" type="text" name="ownership"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>Data Source : </td>
				<td><input class="form-control input-lg" type="text" name="datasource"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>Estimated Cost (RM)  : </td>
				<td><input class="form-control input-lg" type="text" name="estimatedcost"></input></br></td>
			</tr>
			<tr>
				<td></td>
				<td>Expected Financial Return : </td>
				<td><input class="form-control input-lg" type="text" name="finReturn"></input></br></td>
			</tr>
			
			
			

			
				</br>
			
		</table>
			<div class="input_fields_wrap">	
			</div>
		<button class="add_field_button">Add </button>
		
		</br></br><input type="submit" name="next" value="Next"></input>
	</form>
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
				
				  var max_fields      = 10; //maximum input boxes allowed
					var wrapper         = $(".input_fields_wrap"); //Fields wrapper
					var add_button      = $(".add_field_button"); //Add button ID
					
					var x = 1; //initlal text box count
					$(add_button).click(function(e){ //on add input button click
						e.preventDefault();
						if(x < max_fields){ //max input box allowed
							x++; //text box increment
							$(wrapper).append('<div><table><tr><td>Goal : </td><td colspan="2">Vibrant campus living of the 21st Century</td></tr><tr><td>Strategy : </td><td colspan="2">Ensure efficient transportation system within campus</br></br></td></tr><tr><td>Action Plan :</td><td colspan="2"><input class="form-control input-lg" type="text" name="actionplan"></input></br></td></tr><tr><td>KPI :</td><td colspan="2"><input class="form-control input-lg" type="text" name="kpi"></input></br></td></tr><tr><td>Operation Definition:</td><td colspan="2"><input class="form-control input-lg" type="text" name="operationdefinition"></input></br></td></tr><tr><td>Baseline</td><td>Achievement 2014 : </td><td><input class="form-control input-lg" type="text" name="ach1"></input></br></td></tr><tr><td></td><td>Achievement 2015: </td><td><input class="form-control input-lg" type="text" name="ach2"></input></br></td></tr><tr><td>Target</td><td>2016 : </td><td><input class="form-control input-lg" type="text" name="target1"></input></br></td></tr><tr><td></td><td>2017 : </td><td><input class="form-control input-lg" type="text" name="target2"></input></br></td>	</tr><tr><td></td><td>2018 : </td><td><input class="form-control input-lg" type="text" name="target3"></input></br></td></tr><tr><td></td><td>2019 : </td><td><input class="form-control input-lg" type="text" name="target4"></input></br></td></tr><tr><td></td><td>2020 : </td><td><input class="form-control input-lg" type="text" name="target5"></input></br></td></tr><tr><td>Reference </td><td>Ownership : </td><td><input class="form-control input-lg" type="text" name="ownership"></input></br></td></tr><tr><td></td><td>Data Source : </td><td><input class="form-control input-lg" type="text" name="datasource"></input></br></td></tr><tr><td></td><td>Estimated Cost (RM)  : </td><td><input class="form-control input-lg" type="text" name="estimatedcost"></input></br></td></tr><tr><td></td><td>Expected Financial Return : </td><td><input class="form-control input-lg" type="text" name="finReturn"></input></br></td></tr></br></table></div>'); //add input box
						}
					});
					
					$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
						e.preventDefault(); $(this).parent('div').remove(); x--;
					})
					
					
					
					
			});
		</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
