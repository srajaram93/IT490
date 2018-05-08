<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function VC($versionnumber, $ipaddress){ 
exec("sudo rm -r /home/stefan/unzippedversions/*");
exec("sudo unzip -u /home/stefan/versions/version$versionnumber.zip -d /home/stefan/unzippedversions");
exec("sshpass -p 'test' rsync -e 'ssh -o StrictHostKeyChecking=no' -arvc /home/stefan/unzippedversions/var/www/html/ stefan@$ipaddress:/var/www/html --delete");

echo "Version$versionnumber has successfully installed on production server with ip address:$ipaddress"; 
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
        case "versioncontrol":
          return VC($request['versionno'],$request['ip']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }
    $server = new rabbitMQServer("testRabbitMQ.ini","orcServer");
    $server->process_requests('requestProcessor');
    exit();


?>
