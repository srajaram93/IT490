<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function authentication($user,$pass){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    $request = array();
    $request['type'] = "login";
    $request['username'] = $user;
    $request['password'] = $pass;
    $response = $client->send_request($request); 
    return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}

function registration($email,$firstname,$lastname,$password){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    $request = array();
    $request['type'] = "register";
    $request['email'] = $email;
    $request['firstname'] = $firstname;
    $request['lastname'] = $lastname;
    $request['password'] = $password;
    $response = $client->send_request($request);
    return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}
function apicall($today,$zipcode){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    $request = array();
    $request['type'] = "apicall";
    $request['today'] = $today; 
    $request['zipcode'] = $zipcode;
    $response = $client->send_request($request);
    return $response;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}

function getData($today,$zipcode){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    $request = array();
    $request['type'] = "getData";
    $request['today'] = $today;
    $request['zipcode'] = $zipcode;
    $response1 = $client->send_request($request);
    return $response1;
    echo "\n\n";
    echo $argv[0]." END".PHP_EOL;
}


?>
