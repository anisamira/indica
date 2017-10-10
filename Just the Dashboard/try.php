
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>


<?php
	require_once 'config.php';
	
	$con = getdb();
$sql = "SELECT module_name FROM module";
$result = $con->query($sql);
$resultData = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $resultData[$row['module_name']] = $row['module_name'];
    }
}
	
	
?>


<center>
<br>
<div id="back">
<br><br>
<br><br>
Snapshot Report<br><br>mn
<table>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
<tr>
<select name="module" size="5" multiple="multiple">
<?php
foreach ($resultData as $key => $value) {
    echo '<option value="'.$key.'">'.$value.'</option>';
}
?>
</select>

<input type="submit" name="submit" value="submit">
</form>
<?php
if(isset($_POST['submit'])){
  if(isset($_POST[''])){

  
  ?>
  
  <script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>

<select class="js-example-basic-multiple" multiple="multiple">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
</select>