<?php
require_once __DIR__ . "/../../data/connection.php";
$uri = $_SERVER["REQUEST_URI"];
$pos = strpos($uri, "id");

if($pos == false){
    $posts = $dbo->query("select * from post")->get();
// require_once __DIR__ . "/../../view/posts/posts.view.php";
view("posts/posts.view.php",['posts' => $posts]);
} else {
    $post = $dbo->query("select * from post where id = ?",[$_GET['id']])->findOrFail();
    authorized($post['user_id'] === "1");
    view("posts/post.view.php",['post' => $post]);
}
?>