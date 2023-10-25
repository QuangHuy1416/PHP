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
    $id = $_GET['id'];
    $posts = $db->query("select * from post where id = ?",[$id])->fetch();
    require "../view/post.view.php";
}
