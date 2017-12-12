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



<?php
	include('nav-noti.php');

if ($_GET['id']) {

     $id = $_GET['id'];

}

$id = mysql_real_escape_string($id);

$id = eregi_replace("`", "", $id);

$sql = mysql_query("SELECT * FROM Members WHERE id='$id'");

while($row = mysql_fetch_array($sql)){

        ///Fetch member data user name,email,location etc...
}

?>

Displaying user data here with form at the bottom of the page.

  <form name="form" method="post" action="update.php">

    <table width="300" border="1">

      <tr>
        <td>About </td>
        <td><select name="am">
        <option value="<?php echo $am;?>" SELECTED></option>
          <option value="1">Approved</option>
          <option value="0">Denied</option>
        </select></td>
      </tr>
      <tr>
        <td>Pol</td>
        <td><select name="pol">
        <option value="<?php echo $pol;?>" SELECTED></option>
          <option value="1">Approved</option>
          <option value="0">Denied</option>
        </select></td>
      </tr>
      <tr>
        <td>Pic </td>
        <td><select name="pic">
        <option value="<?php echo $pic;?>" SELECTED></option>
          <option value="1">Approved</option>
          <option value="0">Denied</option>
        </select></td>
      </tr>

           <tr>
        <td> </td>
        <td><input type="submit" name="Submit" value="Submit"></td>
      </tr>
    </table>
  </form>
