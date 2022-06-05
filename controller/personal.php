<?php 
include "model/database.php";
include "controller/functions.php";

$user_id=$_SESSION["user_id"];
$users=$db->query("SELECT * FROM users WHERE id=$user_id");
$all_users=$db->query("SELECT * FROM users");

$posts=$db->query("SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id WHERE user_id=$user_id ORDER BY time DESC");
$posts_array=array();

foreach($posts as $post){
    $post_id=$post["id"];
    $post["likes"]=$db->query("SELECT COUNT(*) AS count FROM likes WHERE post_id=$post_id")->fetch_assoc();
    $post["comments"]=$db->query("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE post_id=$post_id
                                  ORDER BY time DESC");
     $post["followers"]=$db->query("SELECT COUNT(*) AS count FROM follows WHERE follower_user_id=$user_id")->fetch_assoc(); 
                                
    $posts_array[]=$post;
}
require "view/personal.php";
?>