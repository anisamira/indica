
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
 $sql			= "SELECT COUNT(goal_id) AS goal FROM goal WHERE module_id='$module_id'";
					$result = mysql_query($sql) or die(mysql_error()); 
					if(mysql_num_rows($result)>0)
					{
						while($row=mysql_fetch_array($result))
						{
							$goals=$row['goal'];
							
						}
						
					}
					else
					{
						echo "no data found";
					}									

?>

<div class="wrapper">


		<div class="container content-sm">		
		<!-- !PAGE CONTENT! -->

<div class="cards">
    <div class="card">
    <img src="http://s4c.cymru/temp/wave2.jpg"></img>
    <div class="card-title">
      <a href="#" class="toggle-info btn">
        <span class="left"></span>
        <span class="right"></span>
      </a>
      <h2>
          Card title
          <small>Image from unsplash.com</small>
      </h2>
    </div>
    <div class="card-flap flap1">
      <div class="card-description">
        This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
      </div>
      <div class="card-flap flap2">
        <div class="card-actions">
          <a href="#" class="btn">Read more</a>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <img src="http://s4c.cymru/temp/wave3.jpg"></img>
    <div class="card-title">
      <a href="#" class="toggle-info btn">
        <span class="left"></span>
        <span class="right"></span>
      </a>
      <h2>
          Card title
          <small>Image from unsplash.com</small>
      </h2>
    </div>
    <div class="card-flap flap1">
      <div class="card-description">
        This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
      </div>
      <div class="card-flap flap2">
        <div class="card-actions">
          <a href="#" class="btn">Read more</a>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <img src="http://s4c.cymru/temp/wave2.jpg"></img>
    <div class="card-title">
      <a href="#" class="toggle-info btn">
        <span class="left"></span>
        <span class="right"></span>
      </a>
      <h2>
          Card title
          <small>Image from unsplash.com</small>
      </h2>
    </div>
    <div class="card-flap flap1">
      <div class="card-description">
        This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
      </div>
      <div class="card-flap flap2">
        <div class="card-actions">
          <a href="#" class="btn">Read more</a>
        </div>
      </div>
    </div>
  </div>


</div>



</div>
</div>

<script>

$(document).ready(function(){
  var zindex = 10;
  
  $("div.card").click(function(e){
    e.preventDefault();

    var isShowing = false;

    if ($(this).hasClass("show")) {
      isShowing = true
    }

    if ($("div.cards").hasClass("showing")) {
      // a card is already in view
      $("div.card.show")
        .removeClass("show");

      if (isShowing) {
        // this card was showing - reset the grid
        $("div.cards")
          .removeClass("showing");
      } else {
        // this card isn't showing - get in with it
        $(this)
          .css({zIndex: zindex})
          .addClass("show");

      }

      zindex++;

    } else {
      // no cards in view
      $("div.cards")
        .addClass("showing");
      $(this)
        .css({zIndex:zindex})
        .addClass("show");

      zindex++;
    }
    
  });
});
</script>

<style>
// font stuff
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900);


// colour stuff
@white: #ffffff;
@lightBG: #dce1df;
@salmon: #ff6666;

@teal: #0096a0;
@tealMid: #0ebac7;
@tealContrast: #33ffff;
@tealShade:	#007c85;

@darkGrey: #4f585e;

body {
  background: @lightBG;
  color: @darkGrey;
  font-family: 'Source Sans Pro', sans-serif;
  text-rendering: optimizeLegibility;
}

a.btn {
  background: @teal;
  border-radius: 4px;
	box-shadow: 0 2px 0px 0 rgba(0,0,0,0.25);
  color: @white;
  display: inline-block;
  padding: 6px 30px 8px;
  position: relative;
  text-decoration: none;
	transition: all 0.1s 0s ease-out;
}

.no-touch a.btn:hover {
  background: lighten(@teal,2.5);
  box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
  transform: translateY(-2px);
  transition: all 0.25s 0s ease-out;
}

.no-touch a.btn:active,
a.btn:active {
  background: darken(@teal,2.5);
  box-shadow: 0 1px 0px 0 rgba(255,255,255,0.25);
  transform: translate3d(0,1px,0);
  transition: all 0.025s 0s ease-out;
}

div.cards {
  margin: 80px auto;
  max-width: 960px;
  text-align: center;
}

div.card {
  background: @white;
  display: inline-block;
  margin: 8px;
  max-width: 300px;
  perspective: 1000;
  position: relative;
  text-align: left;
  transition: all 0.3s 0s ease-in;
  z-index: 1;

  img {
    max-width: 300px;
  }

  div.card-title {
    background: @white;
    padding: 6px 15px 10px;
    position: relative;
    z-index: 0;
    
    a.toggle-info {
      border-radius: 32px;
      height: 32px;
      padding: 0;
      position: absolute;
      right: 15px;
      top: 10px;
      width: 32px;
      
      span {
        background: @white;
        display: block;
        height: 2px;
        position: absolute;
        top: 16px;
        transition: all 0.15s 0s ease-out;
        width: 12px;
      }
      
      span.left {
        right: 14px;
        transform: rotate(45deg);
      }
      span.right {
        left: 14px;
        transform: rotate(-45deg);
      }
    }
    
    h2 {
      font-size: 24px;
      font-weight: 700;
      letter-spacing: -0.05em;
      margin: 0;
      padding: 0;
      
      small {
        display: block;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: -0.025em;
      }
    }
  }

  div.card-description {
    padding: 0 15px 10px;
    position: relative;
    font-size: 14px;
  }

  div.card-actions {
  	box-shadow: 0 2px 0px 0 rgba(0,0,0,0.075);
    padding: 10px 15px 20px;
    text-align: center;
  }
  
  div.card-flap {
    background: darken(@white,15);
    position: absolute;
    width: 100%;
    transform-origin: top;
    transform: rotateX(-90deg);
  }
  div.flap1 {
    transition: all 0.3s 0.3s ease-out;
    z-index: -1;
  }
  div.flap2 {
    transition: all 0.3s 0s ease-out;
    z-index: -2;
  }
  
}

div.cards.showing {
  div.card {
    cursor: pointer;
    opacity: 0.6;
    transform: scale(0.88);
  }
}

.no-touch  div.cards.showing {
  div.card:hover {
    opacity: 0.94;
    transform: scale(0.92);
  }
}

div.card.show {
  opacity: 1 !important;
  transform: scale(1) !important;

  div.card-title {
    a.toggle-info {
      background: @salmon !important;
      span {
        top: 15px;
      }
      span.left {
        right: 10px;
      }
      span.right {
        left: 10px;
      }
    }
  }
  div.card-flap {
    background: @white;
    transform: rotateX(0deg);
  }
  div.flap1 {
    transition: all 0.3s 0s ease-out;
  }
  div.flap2 {
    transition: all 0.3s 0.2s ease-out;
  }
}



</style>