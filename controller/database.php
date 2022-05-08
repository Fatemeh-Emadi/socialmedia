<?php 


$db = new mysqli("localhost","root","","fatigeram");
if($db->connect_error)
{
   echo "error!";
   echo $db->connect_error;
}
else{
    $db->query("SET CHARACTER SET utf8");
}


?>