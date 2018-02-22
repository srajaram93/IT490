<?php
error_reporting(-1);
ini_set('display_errors', false);

include ('client.php');
$email = $_POST['email'];
$firstname = $_POST['fName'];
$lastname  = $_POST['lName'];
$password = $_POST['passw']; 
$response = registration($email,$firstname,$lastname,$password);
if($response != true)
  {
    echo "Registration Failed. Please try a different email";
  }
  else
  {
    echo "Thank you for Registering!";
  }
?>
