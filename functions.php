#!/usr/bin/php
<?php

ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");


require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function auth($user, $pass) {
    ( $db = mysqli_connect ( 'localhost', 'testuser', 'test', 'ActiveMembers' ) );
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
    echo "Successfully connected to MySQL<br><br>";
    mysqli_select_db($db, 'ActiveMembers' );
    $s = "select * from users where email= '$user' and password = '$pass'";
    //echo "The SQL statement is $s";
    ($t = mysqli_query ($db,$s)) or die(mysqli_error());
    $num = mysqli_num_rows($t);
    if ($num == 0){
      return false;
    }else
    {
      print "<br>Authorized";
      return true;
    }
}

function registration($email,$firstname,$lastname,$password) {
    ( $db = mysqli_connect ( 'localhost', 'testuser', 'test', 'ActiveMembers' ) );
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
    echo "Successfully connected to MySQL";
    mysqli_select_db($db, 'ActiveMembers' );
    $e = "SELECT * FROM users WHERE email = '$email'";
    $t = mysqli_query($db, $e) or die(mysqli_error($db));
    $r = mysqli_fetch_array($t, MYSQLI_ASSOC);
    $p = $r["email"];

    if($email == $p){
        echo "  Email has already been used";
	return false; 
    }else{
          mysqli_query($db,"INSERT INTO users (email, firstname, lastname, password) VALUES ('$email', '$firstname', '$lastname', '$password')");
print "You have successfully registerd. Please return to login page";
 

    return true;
}
}
function api($today, $zipcode){
ini_set("allow_url_fpen",1);

$url = "http://data.tmsapi.com/v1.1/movies/showings?startDate=$today&zip=$zipcode&api_key=54jmnjmpmgek7ydjy7984zxq";

$contents = file_get_contents($url);
echo $contents;
return $contents;

}


function requestProcessor($request)
  {
      echo "received request".PHP_EOL;
      var_dump($request);
      if(!isset($request['type']))
      {
        return "ERROR: unsupported message type";
      }
      switch ($request['type'])
      {
        case "login":
          return auth($request['username'],$request['password']);
        case "validate_session":
          return doValidate($request['sessionId']);
        case "register":
          return registration($request['email'],$request['firstname'],$request['lastname'],$request['password']);
	   case "apicall": 
	 return api($request['today'], $request['zipcode']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }
    $server = new rabbitMQServer("testRabbitMQ.ini","testServer");
    $server->process_requests('requestProcessor');
    exit();
?>
