<?php

use data\App;
use data\Database;

$dbo = App::resolve(Database::class);
// require_once __DIR__ . "/../../data/validator.php";
$post = $dbo->query("select * from post where id = ?",[$_GET['id']])->findOrFail();
authorized($post['user_id'] === "1");
view("posts/edit.view.php",['post' => $post]);
?>