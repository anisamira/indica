
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
	<link rel="shortcut icon" href="faviconn.png">

	<!-- Web Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

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

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<div class="header">
				<div class="topbar">
					<ul class="loginbar pull-right">
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>

<div class="widget">
  <div class="widget-title">
    <h4 id="pageTitle"><i class="icon-reorder"></i>&nbsp;Approval Record</h4>
  </div>
  <div class="widget-body">
    <div class="tabbable tabbable-custom">
	<!-- The 2 Tabs Declaration-->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1_1" data-toggle="tab">List of Approval Record</a></li>
      </ul>
	  <!-- The 2 Tabs Content-->
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
		<li><a href="#tab_1_2" data-toggle="tab">Approval</a></li>

          <table class="table table-striped table-bordered" id="sample_1">
	<tr>
							<th>No.</th>
							<th>Goal</th>						
							<th>Key Performance Indicator (KPI)</th>
							<th>Achievement 2016</th>						
							<th>Ownerhip</th>
							<th>Data Source</th>
							<th>Action</th>
						</tr>
						<?php
						$x=1;
						$sql="SELECT goal.*,strategy.*, actionplan.*, kpi.*, baseline.*, target.*, reference.* 
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						WHERE module_id='M01'";
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$ownership		=$row['ownership'];
							$data_source	=$row['data_source'];
						   
						?>

							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td></td>
								<td><?php echo $ownership;?></td>
								<td><?php echo $data_source;?></td>
								<td><?php echo $action;?></td>   
								<button class="btn">Approve</button>
                               <button class="btn">Reject</i></button>
						
							</tr>
							<?php
						$x++;
						}
						?>
          
				<div class="tab-pane" id="tab_1_2">

		  <div id="main">
          <table class="table table-striped table-bordered" border="1" bordercolor="black" cellpadding="3" cellspacing="0"  id="sample_2">
           <thead>
              <tr>
                            <th>No.</th>
							<th>Goal</th>						
							<th>Key Performance Indicator (KPI)</th>
							<th>Achievement 2016</th>						
							<th>Ownerhip</th>
							<th>Data Source</th>
              </tr>
            </thead>
            <tbody>
              <?php
					$query1 = "SELECT * FROM goal";
					
						$result = mysql_query($sql) or die(mysql_error()); 
						while($row=mysql_fetch_array($result))
						{
							$goal_desc		=$row['goal_desc'];
							$kpi_desc		=$row['kpi_desc'];
							$ownership		=$row['ownership'];
							$data_source	=$row['data_source'];
						?>

							<tr>  
								<td><?php echo $x;?></td>
								<td><?php echo $goal_desc;?></td>
								<td><?php echo $kpi_desc;?></td>
								<td></td>
								<td><?php echo $ownership;?></td>
								<td><?php echo $data_source;?></td>
							</tr>
							<?php
						$x++;
						}
						?>
            </tbody>
          </table>
          </p>
		  </div>
			<table align="right"><td class="hidden-phone">
                  </a>&nbsp;&nbsp;<a data-toggle="modal" href="#">
					<button title="Print table" id="print" onclick="printDiv();"><i class="icon-print"></i></button>
                  </a></td>
			</table>
        </div>
			<div style="margin:20px;">
				<form action="index.php" method="post">
					<input type="checkbox" name="check" value="yes"> I hereby admit that all records / information submitted are true.</input></br></br>
					<input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to submit?');" /></input>
				</form>
			</div>
		</div>
	</div>
	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript"
		
		
      </div>
    </div>
  </div>
</div>
<script>
var fName=$("#pageTitle").text();
var showTitle="<center><b>"+fName+"</b>"+"</center>";
//- Using a function pointer:
document.getElementById("approve").onclick = doFunction;

//- Using an anonymous function:
document.getElementById("approve").onclick = function () { alert('Approve'); };
var el = document.getElementById("approve");
if (el.addEventListener)
    el.addEventListener("click", doFunction, false);
else if (el.attachEvent)
    el.attachEvent('onclick', doFunction);
}
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);


}

function printDiv() {
    var divToPrint = document.getElementById('sample_2');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
	newWin.document.write(showTitle);
    newWin.document.write("<br>"+htmlToPrint);
    newWin.print();
    newWin.close();
}
jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});


</script>
