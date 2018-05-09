<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function QAtoProd(){
    $client = new rabbitMQClient("testRabbitMQ.ini","orcServer");
    $request = array();
    $request['type'] = "QA"; 
    $client->send_request($request);

}

QAtoProd();

?>
