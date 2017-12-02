<?php 
$conn = @mysql_connect ("localhost", "root", "") or die ("Sorry - unable to connect to MySQL database.");
$rs = @mysql_select_db ("indica", $conn) or die ("error");    
?>