<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function package($in){
exec("sudo zip -r /var/www/versions/version$in.zip /var/www/html/ ");
exec('sshpass -p "test" rsync -zaPvh /var/www/versions stefan@192.168.55.21:~/ --delete');
echo "Sucessfully packaged and shipped to QA";  
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
        case "package":
          return package($request['versionno']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }
    $server = new rabbitMQServer("testRabbitMQ.ini","orcServer");
    $server->process_requests('requestProcessor');
    exit();


?>
