<?php 
$conn = @mysql_connect ("localhost", "root", "") or die ("Sorry - unable to connect to MySQL database.");
$rs = @mysql_select_db ("test2", $conn) or die ("error");    
?>