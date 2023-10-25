<?php
$config = require("../data/config.php");
require "../data/database.php";
$db = new Database($config);
$uri = $_SERVER["REQUEST_URI"];
$pos = strpos($uri, "id");

if($pos == false)
{
    $posts = $db->query("select * from post")->fetchAll();
    require "../view/posts.view.php";
}
else
{
    $post = $db->query("select * from post where id = ?",[$_GET['id']])->fetch();
    if(!$post)
    {
        abort();
    }
    if($post['user_id'] !== "1")
    {
        abort(403);
    }
    require "../view/post.view.php";
}
