
<?php
	include('sidebar.php');
	include('style_dc.php');
	include('script.php');
?>

<body>
	<div class="wrapper">
		<div class="container content-sm">
			<div class="w3-main" style="margin-left:300px;margin-top:43px;">
				<table class="table table-bordered"> 
					<tr>
						<th>Version</th>						
						<th>Last Updated</th>
						<th>Status</th>
						<th>Action</th>						
					</tr>
					<tr>  
						<td>KPI Achievement August 2017</td>
						<td>30 / 8 / 2017</td>
						<td>Pending for Approval</td>
						<td>
							<a href="datamanager_viewevidence.php" style="text-decoration:none;">
								<button>View</button>
							</a>
						</td>
					</tr>
					<tr>  
						<td>KPI Achievement February 2017</td>
						<td>25 / 02 / 2017</td>
						<td>Approved</td>
						<td>
							<a href="datamanager_viewevidence.php" style="text-decoration:none;">
								<button>View</button>
							</a>
						</td>
					</tr>
					<tr>  
						<td>KPI Achievement August 2016</td>
						<td>31 / 08 / 2016</td>
						<td>Approved</td>
						<td>
							<a href="datamanager_viewevidence.php" style="text-decoration:none;">
								<button>View</button>
							</a>
						</td>
					</tr>
					<tr>  
						<td>KPI Achievement Session 2016-2020</td>
						<td>29 / 02 / 2016</td>
						<td>Approved</td>
						<td>
							<a href="datamanager_viewevidence.php" style="text-decoration:none;">
								<button>View</button>
							</a>
						</td>
					</tr>
				</table>
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
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>




