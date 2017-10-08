<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "kpi");
try {
   
    $conn = mysqli_connect(DB_SERVER,DB_USER, DB_PASSWORD,DB_DATABASE);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
?>

<?php 
$conn = @mysql_connect ("localhost", "id3183055_admin1", "umisone") or die ("Sorry - unable to connect to MySQL database.");
$rs = @mysql_select_db ("id3183055_indi", $conn) or die ("error");  

?>