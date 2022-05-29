<?php 
try{
include "model/database.php";

$text = $_POST["text"];
$post_id = $_POST["post_id"];
$user_id = $_SESSION["user_id"];

$db->query("INSERT INTO comments(text,post_id,user_id) VALUES('$text',$post_id,$user_id");
echo 1;
}
catch(Exception $e){
    echo 0;
}

?>