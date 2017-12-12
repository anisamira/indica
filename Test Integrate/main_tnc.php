<?php
	include('style_dc.php');
	include ('nav-noti.php');
	
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 

 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
    $username		=$_SESSION['username'];

	$sql			="SELECT * FROM session where session_status='1'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['session_name']	=$row['session_name'];
							$year1=$row['year1'];
							$year2=$row['year2'];
							$year3=$row['year3'];
							$year4=$row['year4'];
							$year5=$row['year5'];
						}
						$session_name	=$_SESSION['session_name'];
					}
					else
					{
						echo "no data found";
					}
	$sql			= "SELECT * FROM form WHERE session_name='$session_name' AND module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$_SESSION['form_status']	=$row['form_status'];
							$_SESSION['form_id']		=$row['form_id'];
						}
						$form_status	=$_SESSION['form_status'];
						$form_id		=$_SESSION['form_id'];
					}
					else
					{
						echo "no data found";
					}

				
	 $sql			= "SELECT * FROM module WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$module_name=$row['module_name'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}


 $sql			= "SELECT * FROM year WHERE year_name='$curyear'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$year= $row['year_name'];
							$year_id=$row['year_id'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}
						

$sql			= "SELECT SUM(reference.estimated_cost) AS cost, SUM(reference.exp_fin_return) AS income
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN year ON achievement.year_id=year.year_id
						JOIN evidence ON evidence.ach_id=achievement.ach_id
						JOIN session ON session.session_name=goal.session_name
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND session.session_status='1'
						AND year.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$cost= $row['cost'];
							$income= $row['income'];
						}
						
					}
					else
					{
						echo "no data found";
					}
$sql = "SELECT COUNT(distinct goal.goal_id) AS gol, COUNT(kpi.kpi_id) AS kpi
										    FROM goal
											JOIN strategy ON strategy.goal_id=goal.goal_id 
											JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
											JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
											JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
											JOIN target ON target.kpi_id=kpi.kpi_id 
											JOIN reference ON reference.kpi_id=kpi.kpi_id
                                            JOIN form ON form.module_id=goal.module_id											
											WHERE goal.module_id='$module_id'
											AND goal.session_name='$session_name'
											AND form.form_status='approved'
											";
$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$goal_num= $row['gol'];
							$kpi_num= $row['kpi'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}											
					
$sql			= "SELECT COUNT(issue.issue_id) AS issue
						FROM goal 
						JOIN strategy ON strategy.goal_id=goal.goal_id 
						JOIN actionplan ON actionplan.strategy_id=strategy.strategy_id 
						JOIN kpi ON kpi.actionplan_id=actionplan.actionplan_id 
						JOIN baseline ON baseline.kpi_id=kpi.kpi_id 
						JOIN target ON target.kpi_id=kpi.kpi_id 
						JOIN reference ON reference.kpi_id=kpi.kpi_id 
						JOIN form ON form.module_id=goal.module_id
						JOIN achievement ON achievement.target_id=target.target_id
						JOIN issue ON issue.ach_id=achievement.ach_id
						JOIN year ON achievement.year_id=year.year_id
						JOIN session ON session.session_name=goal.session_name
                        WHERE goal.module_id='$module_id'
						AND goal.session_name='$session_name'
						AND form.form_status='approved'
						AND session.session_status='1'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							
							$issue_num= $row['issue'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}					


$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS capai
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_desc>achievement.target 
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
					";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$capai= $row['capai'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}

$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS takcapai
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_desc<achievement.target 
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$takcapai= $row['takcapai'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}					

$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS green
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_result >= 80 
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
					AND achievement.quarter='$quater'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$green= $row['green'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}
$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS yellow
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_result BETWEEN 50 AND 79 
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$yellow= $row['yellow'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}
$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS red
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_result BETWEEN 1 AND 50 
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$red= $row['red'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}
$sql			= "SELECT COUNT(DISTINCT achievement.ach_id) AS grey
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE achievement.ach_result=''
					AND form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$grey= $row['grey'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}					
$sql			= "SELECT COUNT(DISTINCT achievement.ach_result) AS resultt
					FROM achievement 
					JOIN form ON form.form_id=achievement.form_id 
					WHERE form.form_id='$form_id' 
					AND form.module_id='$module_id' 
					AND form.session_name='$session_name' 
					AND achievement.year_id='$year_id'
						";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$resultt= $row['resultt'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}										
					?>
	



		<div class="wrapper">		
		<!-- !PAGE CONTENT! -->

	<div id="content">	

	<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_name;?> <?=$session_name;?> YEAR <?=$year?>
  <br>
	</div>

 	<link rel="stylesheet" href="assets/best/css/style.css">

  <div class="cards">

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Goals</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Number of Goal: <?=$goal_num;?>
		<br>
<form class="pure-form pure-form-aligned" action="info_tnc.php" method="post" target="_blank" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="goal">Read More</button>
	  </div>
</form>
</br>	  
	  </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>KPI</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
      Number of KPI: <?=$kpi_num;?>
	  <br>
	  <form class="pure-form pure-form-aligned" action="info_tnc.php" method="post" target="_blank" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="goal">Read More</button>
	  </div>
</form>	
</br>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Achievement</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Number of Achieve Target: <?=$capai;?>
		<form class="pure-form pure-form-aligned" action="achieve_tnc.php" method="post" target="_blank" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="achieve">Read More</button>
	  </div>
</form>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Issue</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Number of Issue: <?=$issue_num;?>
		<form class="pure-form pure-form-aligned" action="issue_tnc.php" target="_blank" method="post" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="issue">Read More</button>
	  </div>
</form>	 
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Unachieve</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
         Number of NOT Achieve Target: <?=$takcapai;?>
		<form class="pure-form pure-form-aligned" action="achieve_tnc.php" method="post" target="_blank" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="unachieve">Read More</button>
	  </div>
</form>	 
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Expenditure</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
         Total Expenditure: 
		 <br>RM<?=$cost;?>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>ROI</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Return on Investment: 
		<br>RM<?=$income;?>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Health</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        KPI Health
		<br>
		Green:<?=$green;?>
		<br>
		Yellow:<?=$yellow;?>
		<br>
		Red:<?=$red;?>
		<br>
		Grey:<?=$grey;?>
<form class="pure-form pure-form-aligned" action="graph_kpi.php" method="post" target="_blank" name="Read">		
<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary" name="unachieve">Read More</button>
	  </div>
</form>	 
		
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Status</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
       Current Status Active <?=$year;?> Quater <?=$quater;?>
      </div>
    </div>

  </div>

</div>

	
		<script type="text/javascript" src="assets/best/js/index.js"></script>
  </div>
  
