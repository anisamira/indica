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
		<div class="container">
			<div class="header">
				<div class="topbar">
					<ul class="loginbar pull-right">
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
<!--=== Service Block ===-->
<div class="container content-sm">
	<div class="row" style="margin-bottom:20px;">
		<h5> Session : 2016 - 2020 </br>
			Module : Student Life TNC (HEPA) </br>
		</h5>
	</div>
	
		<div class="table-responsive">  
			<form action="datamanager_newrecord.php" method="post">
				<table class="table table-bordered"> 
					<col width="50">
					<col width="50">
					<col width="190">
								<tr>
									<th>Goal</th>
									<th>Strategy</th>
									<th></th>
								</tr>
				<?php
					session_start();
					
					$x = 1;
					$goal=0;
					$str=1;
					$countgl=0;
					for($y=1;  $y<=10; $y++)
					{
						if (empty($_POST["goal".$y])){
							$error = 1;
						}
						else
						{
							$_SESSION['goal'.$y]=$_POST['goal'.$y];
							$countgl++;
							
						}	
					}
					for($q=1; $q<=20; $q++)
					{
						if (empty($_POST["strategy".$q])){
							$error = 1;
						}
						else
						{
							$_SESSION['strategy'.$q]=$_POST['strategy'.$q];
							$countstr=count($_SESSION['strategy'.$q]);
							
							{
							
							$goal++;?>
								<tr>
									<td rowspan="<?php echo $countstr;?>"><?php echo $_SESSION['goal'.$goal];?></td>
									<?php
										foreach ($_SESSION['strategy'.$q] as $key=>$strategy)
										{?>
													<td><?php echo $strategy;?>
														<input type="hidden" name="strategies<?php echo $str;?>" value="<?php echo $strategy;?>"></input>
													</td>
													<td>
														<table id ="maintable<?php echo $x;?>" class="table table-bordered">
															<tr>
																<th>Action Plan</th>
																<th>KPI</th>
																<th>Operation Definition</th>
															</tr>
															<tr>
																<td><input class="form-control" type="text" name="action<?php echo $x;?>[]"></input></td>
																<td><input class="form-control" type="text" name="kpi<?php echo $x;?>[]"></input></td>
																<td><input class="form-control" type="text" name="operation<?php echo $x;?>[]"></input></td>
															</tr>
														</table>
														<button class="btn add_button" id="addRows<?php echo $x;?>" style="float: right;">+</button>
													</td>
												</tr>
												<tr>
										<?php
										$x++;
										$str++;
										
										}
										
										?>
									
								<?php
								
							}
							
						}
					}?>
					
					
					</table>	

				</br><input type="submit" name="next" value="Next" style="float: right;"></input>	
			</form>
		</div>
		
	
					
					<!--/container-->
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
							
						
							
			    $("#addRows1").click(function(e) {
					e.preventDefault();
        $("#maintable1").append('<tr><td><input class="form-control" type="text" name="action1[]"></input></td><td><input class="form-control" type="text" name="kpi1[]"></input></td><td><input class="form-control" type="text" name="operation1[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows2").click(function(e) {
					e.preventDefault();
        $("#maintable2").append('<tr><td><input class="form-control" type="text" name="action2[]"></input></td><td><input class="form-control" type="text" name="kpi2[]"></input></td><td><input class="form-control" type="text" name="operation2[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows3").click(function(e) {
					e.preventDefault();
        $("#maintable3").append('<tr><td><input class="form-control" type="text" name="action3[]"></input></td><td><input class="form-control" type="text" name="kpi3[]"></input></td><td><input class="form-control" type="text" name="operation3[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows4").click(function(e) {
					e.preventDefault();
        $("#maintable4").append('<tr><td><input class="form-control" type="text" name="action4[]"></input></td><td><input class="form-control" type="text" name="kpi4[]"></input></td><td><input class="form-control" type="text" name="operation4[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows5").click(function(e) {
					e.preventDefault();
        $("#maintable5").append('<tr><td><input class="form-control" type="text" name="action5[]"></input></td><td><input class="form-control" type="text" name="kpi5[]"></input></td><td><input class="form-control" type="text" name="operation5[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows6").click(function(e) {
					e.preventDefault();
        $("#maintable6").append('<tr><td><input class="form-control" type="text" name="action6[]"></input></td><td><input class="form-control" type="text" name="kpi6[]"></input></td><td><input class="form-control" type="text" name="operation6[]"></input></td></tr>')
    });		
	
	
	
	
		    $("#addRows7").click(function(e) {
					e.preventDefault();
        $("#maintable7").append('<tr><td><input class="form-control" type="text" name="action7[]"></input></td><td><input class="form-control" type="text" name="kpi7[]"></input></td><td><input class="form-control" type="text" name="operation7[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows8").click(function(e) {
					e.preventDefault();
        $("#maintable8").append('<tr><td><input class="form-control" type="text" name="action8[]"></input></td><td><input class="form-control" type="text" name="kpi8[]"></input></td><td><input class="form-control" type="text" name="operation8[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows9").click(function(e) {
					e.preventDefault();
        $("#maintable9").append('<tr><td><input class="form-control" type="text" name="action9[]"></input></td><td><input class="form-control" type="text" name="kpi9[]"></input></td><td><input class="form-control" type="text" name="operation9[]"></input></td></tr>')
    });		
	
	
	
		    $("#addRows10").click(function(e) {
					e.preventDefault();
        $("#maintable10").append('<tr><td><input class="form-control" type="text" name="action10[]"></input></td><td><input class="form-control" type="text" name="kpi10[]"></input></td><td><input class="form-control" type="text" name="operation10[]"></input></td></tr>')
    });		
	
	
	
						
			});
		</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
