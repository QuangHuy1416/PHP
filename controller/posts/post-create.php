<?php
require_once __DIR__ . "/../../data/connection.php";

// Muốn sử dụng 1 namespace trước tiên phải require hoặc include file chứa namespace đó
// sau đó dùng từ khóa use để nạp namespace cần sử dụng
require_once __DIR__ . "/../../data/validator.php";
use data\Validator;

$heading = "Create post";
$method = $_SERVER['REQUEST_METHOD'] ;
if( $method === "POST")
{
    $err = [];
    
    if(! Validator::string( $_POST['post'], 1,1000) )
    {
        $err['post'] = "A post can not more than 1000 character is required.";
    }
    if(empty($err))
    {
        $dbo->query("insert into post(post,user_id)values(:post,:user_id)",[
            'post' => $_POST['post'],
            'user_id' => 1
        ]);
        require_once "post.php";
    }
    else{
        view("posts/post-create.view.php");
    }
}