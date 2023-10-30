<?php
//require_once __DIR__ . "/../../data/connection.php";
use data\App;
use data\Database;

$dbo = App::resolve(Database::class);

// kiểm tra có tồn tại id get được trong database hay không
$post = $dbo->query("select * from post where id = ?",[$_GET['id']])->findOrFail();

// cho phép xóa nếu có cùng user_id
authorized($post['user_id'] === "1");
$dbo->query("delete from post where id = :id",["id" => $_GET['id']]);

//header dùng để điều hướng trang web
//trong đó location: là từ khóa bắt buộc, phần sau là đường dẫn muốn trỏ tới
header("location: /post");
//exit;
?>