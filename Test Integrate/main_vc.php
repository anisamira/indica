
<?php
	include('sidebar.php');
	include('style_dc.php');
	$curyear=date ('Y');
    $date_now=date ("m/d/Y");
    $date_q= date ("06/30/Y");
 
	$module_id		=$_SESSION['module_id'];
	$user_id		=$_SESSION['user_id'];
 
 if ($date_now<=$date_q)
{
	$quater=1;
}
else
    $quater=2;	
	
	
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
 $sql			= "SELECT COUNT(goal_id) AS goalie FROM goal WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$goals=$row['goalie'];
							
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
						
				
					?>



		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->

	<div class="w3-main" style="margin-left:300px;margin-top:43px;">	

	<div style="padding-left:16px">
  &nbsp&nbspWELCOME TO <?=$module_name?> <?=$session_name;?> YEAR <?=$year?>
  <br>
	</div>

 	<link rel="stylesheet" href="assets/best/css/style.css">


  <div class="cards">

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Carder</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <span>Card</span>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        Expander
      </div>
    </div>

  </div>

</div>

	<script type="text/javascript" src="assets/best/js/index.js"></script>

  
  
		
  </div>



