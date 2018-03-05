<?php
error_reporting(-1);
ini_set('display_errors', true);
include ('client.php');

$zipcode = $_GET['u'];
$today = date("Y-m-d"); 


$response = apicall($today, $zipcode);
echo $response; 
?>
