<?php
use data\App;
use data\Database;
require_once __DIR__ . "/../../data/validator.php";
$dbo = App::resolve(Database::class);

//Check exist
$post = $dbo->query("select * from post where id = ?",[$_POST['id']])->findOrFail();

//Check authorized
authorized($post['user_id'] === "1");

$err = [];

// check validate
if(! Validator::string( $_POST['post'], 1,1000) ){
    $err['post'] = "A post can not more than 1000 character is required.";
}

// check error
if(count($err)){
    return view('posts/edit.view.php', [
        'err' => $err,
        'post' => $post
    ]);
}

// update ở database
$dbo->query('update post set post = :post where id = :id',[
    'post' => $_POST['post'],
    'id' => $_POST['id']
]);

header('location: /post');
die;
?>