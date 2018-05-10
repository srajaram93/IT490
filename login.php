<?php
session_start();
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$user = $_POST['username'];
$pass = $_POST['password'];
$response = connection($user,$pass);
if($response == false)
  {
    echo"Login Unsuccessful. Please try again or Register";
    header("Refresh: 2; url= main.html"); 
  }
  else{
  echo "Login successful"; 
  $_SESSION["user"] = $user;
  header("Refresh: 5; url= main2.php");
}
  
?>
