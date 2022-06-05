<?php 
include "model/database.php";
$follow_id=$_POST["follow_id"];
$user_id = $_SESSION["user_id"];
//$_SESSION["follow_id"]=$follow_id;
$count=$db->query("SELECT * FROM follows WHERE following_user_id=$follow_id AND follower_user_id=$user_id")->num_rows;

if($count==0)
{
    $db->query("INSERT INTO follows(follower_user_id,following_user_id) VALUES($user_id,$follow_id)");
    echo 1;
}
else{
    $db->query("DELETE FROM follows WHERE following_user_id=$follow_id AND follower_user_id=$user_id");
    echo 0;
}

?>