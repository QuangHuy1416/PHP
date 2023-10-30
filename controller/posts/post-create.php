<?php
//require_once __DIR__ . "/../../data/connection.php";
//require_once __DIR__ . "/../../data/App.php";
require_once __DIR__ . "/../../bootstrap.php";

use data\App;
use data\Database;

$dbo = App::resolve(Database::class);
require_once __DIR__ . "/../../data/validator.php";
//use data\Validator;

$heading = "Create post";
$method = $_SERVER['REQUEST_METHOD'] ;
if( $method === "POST"){
    $err = [];
    
    if(! Validator::string( $_POST['post'], 1,1000) ){
        $err['post'] = "A post can not more than 1000 character is required.";
    }
    if(empty($err)){
        $dbo->query("insert into post(post,user_id)values(:post,:user_id)",[
            'post' => $_POST['post'],
            'user_id' => 1
        ]);
        require_once "post.php";
    } else {
        view("posts/post-create.view.php");
    }
}
?>