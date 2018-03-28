<?php 
$db = mysqli_connect ( 'localhost', 'testuser', 'test', 'ActiveMembers' ) ;
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
   
    mysqli_select_db($db, 'ActiveMembers' );

mysqli_query($db, "truncate movie"); 

?>
