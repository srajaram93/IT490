<?php
session_start();
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");

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
  $_SESSION['user'] = $user;
  echo $_SESSION['user'];
  }
?>
