<?php
//error_reporting(-1);
//ini_set('display_errors', true);
include ('client.php');
$user = $_POST['user'];
$pass = $_POST['pass'];

$response = authentication($user,$pass);
if($response == false)
  {
    echo "Login Failed";
  }
  else
  {
  echo "Login Successful!";
  }
?>
