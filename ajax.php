<?php
$ucopy = $_GET["u"];
$ucopy = "$ucopy";
$today = date("Y-m-d"); 
$today = "$today";

sleep(2);
$url = "http://data.tmsapi.com/v1.1/movies/showings?startDate=$today&zip=$ucopy&api_key=54jmnjmpmgek7ydjy7984zxq"; 

$fp = fopen ( $url , "r" ); 
$contents = "";
while ( $more = fread ( $fp, 1000  ) ) {
   $contents .=  $more ;
}
  
echo $contents ; 
?>
