<?php

include "dbtest.php";

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE goli SET ".$field."='".$value."' WHERE id=".$editid;
mysql_query($query);

echo 1;