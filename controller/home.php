<?php 
include "model/database.php";
include "controller/functions.php";
$posts=$db->query("SELECT *, users.id AS id_kardar, posts.id AS id_post FROM posts INNER JOIN users ON posts.user_id=users.id ORDER BY time DESC");
//$posts=$db->query("SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id");
//$comments=$db->query("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id INNER JOIN posts ON comments.post_id=posts.p_id" );
//$posts=$db->query("SELECT *,users.id AS id_karbar,posts.p_id AS id_post FROM posts INNER JOIN users ON posts.user_id=users.id");
//$posts=$db->query("SELECT posts.id AS post_id, posts.caption, posts.media, posts.time, posts.user_id, users.id AS user_id, users.image, users.email,users.name,users.gender FROM posts INNER JOIN users ON posts.user_id=users.id ORDER BY time DESC");
$posts_array=array();

foreach($posts as $post){
    $post_id=$post["id_post"];
    $post["likes"]=$db->query("SELECT COUNT(*) AS count FROM likes WHERE post_id=$post_id")->fetch_assoc();
    $post["comments"]=$db->query("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE post_id=$post_id
                                  ORDER BY time DESC");
    $posts_array[]=$post;
}



require "view/home.php";
?>