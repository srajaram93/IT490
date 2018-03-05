<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

include ('client.php');

$zipcode = $_GET['u'];
$today = date("Y-m-d"); 


$response = apicall($today, $zipcode);
echo $response; 
?>
