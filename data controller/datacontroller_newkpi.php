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
<?php
	include('sidebar.php');
?>


	<div class="wrapper">
		
<!--=== Service Block ===-->
<div class="container content-sm">
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
	
		<div class="table-responsive">  
		
		
		 <?php
		
			// require_once 'dbtest.php';
			// if (isset($_POST['next']))
			// {
				// $goal=$_SESSION['goal'];
				// $st=$_SESSION['strategy'];
				// $ac=$_SESSION['action'];
				// $query='';
				// for ($count=0;$count<count($goal);$count++)
					
               // foreach ($_POST['goal'] as $key=>$value)
					// {

			      // $goal_clean=mysqli_real_escape_string($conn,$goal[$value]);
					// $st_clean=mysqli_real_escape_string($conn,$st[$key]);
					// $ac_clean=mysqli_real_escape_string($conn,$ac[$key]);
					
				// if ($goal!=''&&$st!=''&&$ac=''){
				
				// $query.='
				// INSERT INTO goli (goals,st,ac) VALUES ("'.$goal_clean.'","'.$st_clean.'","'.$ac_clean.'");
				
				// ';
				// }
				// }
			
			// if ($query!='')
			// {
			// if (mysqli_multi_query($conn,$query))
			// {
			// echo 'Data Inserted';	
			// }				
			// }
			// else 
			// {
				// echo 'Error';
			// }
			// }
			?>
			
		
		
			<form action="datacontroller_newrecord.php" method="post">
				<table class="table table-bordered"> 
					<col width="50">
					<col width="50">
					<col width="50">
					<col width="200">
								<tr>
									<th>Goal</th>
									<th>Strategy</th>
									<th>Action Plan</th>
									<th>KPI</th>
								</tr>
				<?php

					$x = 1;
					$goal=0;
					$str=1;
					$countgl=0;
					$strg=0;
					
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
					
					for($strategies=1;  $strategies<=20; $strategies++)
					{
						if (empty($_POST["strategy".$strategies])){
							$error = 1;
						}
						else
						{
							$_SESSION['strategy'.$strategies]=$_POST['strategy'.$strategies];
							
						}	
					}
					
					for($q=1; $q<=30; $q++)
					{
						if (empty($_POST["action".$q]))
						{
							$error = 1;
						}
						else
						{
							$_SESSION['action'.$q]=$_POST['action'.$q];
							$countact=count($_SESSION['action'.$q]);
							{
							
							$goal++;
							$strg++;
							?>
								<tr>
									<td rowspan="<?php echo $countact;?>"><?php echo $_SESSION['goal'.$q];?></td>
									<td rowspan="<?php echo $countact;?>"><?php echo $_SESSION['strategy'.$strg];?></td>
									<?php
									
										foreach ($_SESSION['action'.$q] as $key=>$action)
										{?>
												
												<td><?php echo $action;?></td>
												<td><input class="form-control" type="text"  name="kpi<?php echo $x;?>[]"></input></br>
													<div class="wrap<?php echo $x;?>"></div>
													<button class="btn add_button<?php echo $x;?>" style="float: right;">+</button>
												</td>
												</tr>
												<tr>
										<?php
										$x++;
										}															
							}					
						}
					}?>
					
					
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
							$(wrapper1).append('<div><input class="form-control" type="text" name="kpi1[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapper2  =  $(".wrap2");//Fields wrapper
						var add_button2 = $(".add_button2"); //Add button ID
							
						$(add_button2).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper2).append('<div><input class="form-control" type="text" name="kpi2[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper3  =  $(".wrap3");//Fields wrapper
						var add_button3 = $(".add_button3"); //Add button ID
							
						$(add_button3).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper3).append('<div><input class="form-control" type="text" name="kpi3[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper3).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapper4  =  $(".wrap4");//Fields wrapper
						var add_button4 = $(".add_button4"); //Add button ID
							
						$(add_button4).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper4).append('<div><input class="form-control" type="text" name="kpi4[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper4).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper5  =  $(".wrap5");//Fields wrapper
						var add_button5 = $(".add_button5"); //Add button ID
							
						$(add_button5).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper5).append('<div><input class="form-control" type="text" name="kpi5[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper5).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper6  =  $(".wrap6");//Fields wrapper
						var add_button6 = $(".add_button6"); //Add button ID
							
						$(add_button6).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper6).append('<div><input class="form-control" type="text" name="kpi6[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper6).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper7  =  $(".wrap7");//Fields wrapper
						var add_button7 = $(".add_button7"); //Add button ID
							
						$(add_button7).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper7).append('<div><input class="form-control" type="text" name="kpi7[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper7).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper8  =  $(".wrap8");//Fields wrapper
						var add_button8 = $(".add_button8"); //Add button ID
							
						$(add_button8).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper8).append('<div><input class="form-control" type="text" name="kpi8[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper8).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						var wrapper9  =  $(".wrap9");//Fields wrapper
						var add_button9 = $(".add_button9"); //Add button ID
							
						$(add_button9).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper9).append('<div><input class="form-control" type="text" name="kpi9[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper9).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapper10  =  $(".wrap10");//Fields wrapper
						var add_button10 = $(".add_button10"); //Add button ID
							
						$(add_button10).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper10).append('<div><input class="form-control" type="text" name="kpi10[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper10).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						var wrapper11  =  $(".wrap11");//Fields wrapper
						var add_button11 = $(".add_button11"); //Add button ID
							
						$(add_button11).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper11).append('<div><input class="form-control" type="text" name="kpi11[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper11).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						var wrapper12  =  $(".wrap12");//Fields wrapper
						var add_button12 = $(".add_button12"); //Add button ID
							
						$(add_button12).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper12).append('<div><input class="form-control" type="text" name="kpi12[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper12).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						
						var wrapper13  =  $(".wrap13");//Fields wrapper
						var add_button13 = $(".add_button13"); //Add button ID
							
						$(add_button13).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper13).append('<div><input class="form-control" type="text" name="kpi13[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper13).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapper14  =  $(".wrap14");//Fields wrapper
						var add_button14 = $(".add_button14"); //Add button ID
							
						$(add_button14).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper14).append('<div><input class="form-control" type="text" name="kpi14[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper14).on("click",".remove_field", function(e){ //user click on remove text
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapper15  =  $(".wrap15");//Fields wrapper
						var add_button15 = $(".add_button15"); //Add button ID
							
						$(add_button15).click(function(e){ //on add input button click
							e.preventDefault();
							$(wrapper15).append('<div><input class="form-control" type="text" name="kpi15[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
						});
							
						$(wrapper15).on("click",".remove_field", function(e){ //user click on remove text
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
