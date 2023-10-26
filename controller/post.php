<?php
require_once "../data/connection.php";
$uri = $_SERVER["REQUEST_URI"];
$pos = strpos($uri, "id");

if($pos == false)
{
    $posts = $dbo->query("select * from post")->get();
    require_once "../view/posts.view.php";
}
else
{
    $post = $dbo->query("select * from post where id = ?",[$_GET['id']])->findOrFail();
    authorized($post['user_id'] === "1");
    require_once "../view/post.view.php";
}
