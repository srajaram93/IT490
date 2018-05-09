<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

echo "What version would you like to install?"; 
$verno=trim(fgets(STDIN));
echo "What ip address should this version be installed? "; 
$ip=trim(fgets(STDIN)); 

function VersionControl($verno, $ip){
    $client = new rabbitMQClient("testRabbitMQ.ini","orcServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    $request = array();
    $request['type'] = "versioncontrol"; 
    $request['versionno'] ="$verno"; 
    $request['ip']=$ip; 
    $client->send_request($request);
    #$client->send_request($ip);

}

VersionControl($verno,$ip)

?>
