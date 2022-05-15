<?php 
include "model/database.php";

$posts=$db->query("SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id");
$comments=$db->query("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id INNER JOIN posts ON comments.post_id=posts.p_id" );

require "view/home.php";
?>