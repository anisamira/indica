<?php 
$conn = @mysql_connect ("mysql.hostinger.com", "u829614953_ugez", "eHagajaByb") or die ("Sorry - unable to connect to MySQL database.");
$rs = @mysql_select_db ("u829614953_ugez", $conn) or die ("error");    
?>