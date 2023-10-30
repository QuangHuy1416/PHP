<?php
use data\App;
use data\Database;

$dbo = App::resolve(Database::class);

$post = $dbo->query("select * from post where id = ?",[$_GET['id']])->findOrFail();
authorized($post['user_id'] === "1");
?>