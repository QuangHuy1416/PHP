<?php
require_once "../data/connection.php";
$heading = "Create post";
$method = $_SERVER['REQUEST_METHOD'] ;
if( $method === "POST")
{
    $dbo->query("insert into post(post,user_id)values(:post,:user_id)",[
        'post' => $_POST['post'],
        'user_id' => 1
    ]);
}
//$posts = $db->query("select * from post")->get();
//require "../view/posts.view.php";
require_once "post.php";