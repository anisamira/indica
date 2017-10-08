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

<body>
<?php
	include('sidebar.php');
	
					if(isset($_POST['next']))
					{
						for($y=1; $y<=30; $y++)
						{
							if (empty($_POST["strategy".$y]))
							{
								$error = 1;
							}
							else
							{
								
								foreach ($_POST['strategy'.$y] as $key=>$value)
								{
								
									$goal_id=$_POST['goal_id'.$y];
									$sql="INSERT INTO strategy (goal_id, strategy_desc) VALUES ('$goal_id','$value')";
									$result = mysql_query($sql) or die(mysql_error());  
								   
									if (false === $result) 
									{
										echo mysql_error();
									}
								}	
								
							}	
						}		
					}
?>
	<div class="wrapper">

<div class="container content-sm">
	<div class="w3-main" style="margin-left:300px;margin-top:43px;">
	
		<div class="table-responsive"> 
<form action="datacontroller_newkpi.php" method="post">
				<table class="table table-bordered"> 
					<col width="50">
					<col width="50">
					<col width="190">
								<tr>
									<th>Goal</th>
									<th>Strategy</th>
									<th>Action Plan</th>
								</tr>
				<?php
					$x=1;
					$sql="SELECT goal.*,strategy.* FROM goal JOIN strategy ON strategy.goal_id=goal.goal_id WHERE module_id='M01' ORDER BY strategy.strategy_id ASC";
					$result = mysql_query($sql) or die(mysql_error()); 
					while($row=mysql_fetch_array($result))
					{
						$goal_id		=$row['goal_id'];
						$goal_desc		=$row['goal_desc'];
						$strategy_id	=$row['strategy_id'];
						$strategy_desc	=$row['strategy_desc'];?>
						<tr>
							<td><?php echo $goal_desc;?></td>
							<td><?php echo $strategy_desc;?>
								<input type="hidden" name="strategy_id<?php echo $x;?>" value="<?php echo $strategy_id;?>"></input></td>
							<td><input class="form-control" type="text"  name="action<?php echo $x;?>[]"></input></br>
								<div class="wrap<?php echo $x;?>"></div>
								<button class="btn add_button<?php echo $x;?>" style="float: right;">+</button>
							</td>
						</tr>
					<?php
					$x++;
						
						
					} ?>
					
					</table>	

				</br><input type="submit" name="next" value="Next" style="float: right;"></input>	
				<input type="button" VALUE="Back" onClick="history.go(-1);"></input>
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
							
						
				var wrapper1  =  $(".wrap1");//Fields wrapper
						var add_button1 = $(".add_button1"); //Add button ID
							
						$(add_button1).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper1).append('<div><input class="form-control" type="text" name="action1[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapper2  =  $(".wrap2");//Fields wrapper
						var add_button2 = $(".add_button2"); //Add button ID
							
						$(add_button2).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper2).append('<div><input class="form-control" type="text" name="action2[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper3  =  $(".wrap3");//Fields wrapper
						var add_button3 = $(".add_button3"); //Add button ID
							
						$(add_button3).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper3).append('<div><input class="form-control" type="text" name="action3[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper3).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapper4  =  $(".wrap4");//Fields wrapper
						var add_button4 = $(".add_button4"); //Add button ID
							
						$(add_button4).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper4).append('<div><input class="form-control" type="text" name="action4[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper4).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper5  =  $(".wrap5");//Fields wrapper
						var add_button5 = $(".add_button5"); //Add button ID
							
						$(add_button5).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper5).append('<div><input class="form-control" type="text" name="action5[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper5).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper6  =  $(".wrap6");//Fields wrapper
						var add_button6 = $(".add_button6"); //Add button ID
							
						$(add_button6).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper6).append('<div><input class="form-control" type="text" name="action6[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper6).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper7  =  $(".wrap7");//Fields wrapper
						var add_button7 = $(".add_button7"); //Add button ID
							
						$(add_button7).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper7).append('<div><input class="form-control" type="text" name="action7[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper7).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper8  =  $(".wrap8");//Fields wrapper
						var add_button8 = $(".add_button8"); //Add button ID
							
						$(add_button8).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper8).append('<div><input class="form-control" type="text" name="action8[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper8).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						var wrapper9  =  $(".wrap9");//Fields wrapper
						var add_button9 = $(".add_button9"); //Add button ID
							
						$(add_button9).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper9).append('<div><input class="form-control" type="text" name="action9[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper9).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper10  =  $(".wrap10");//Fields wrapper
						var add_button10 = $(".add_button10"); //Add button ID
							
						$(add_button10).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper10).append('<div><input class="form-control" type="text" name="action10[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper10).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
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
