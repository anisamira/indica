<?php
function getdb(){
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "in");
try {
   
    $conn = mysqli_connect(DB_SERVER,DB_USER, DB_PASSWORD,DB_DATABASE);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>