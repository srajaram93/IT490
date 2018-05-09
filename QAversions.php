<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function QA(){
/*$dir ="/home/stefan/versions";
$a=scandir($dir);
unset($a[0],$a[1]);


($db=mysqli_connect ( '192.168.55.21', 'testuser', 'test', 'ActiveMembers' ) );
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
    echo "Successfully connected to MySQL";
    mysqli_select_db($db, 'ActiveMembers' );
    mysqli_query($db,"truncate versions1");
    

   foreach($a as $value){
    mysqli_query($db,"INSERT INTO versions1(Package) VALUES ('$value')");
    
}
*/
exec('sshpass -p "test" rsync -zaPvh /home/stefan/versions/ stefan@192.168.55.22:/home/stefan/versions/ --delete');
echo "Sucessfully shipped versions archieve to production and stored in MYSQL"; 

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
        case "QA":
           QA();
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }
    $server = new rabbitMQServer("testRabbitMQ.ini","orcServer");
    $server->process_requests('requestProcessor');
    exit();


?>
