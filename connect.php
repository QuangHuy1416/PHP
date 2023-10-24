<?php
require "functions.php";
// Tạo liên kết đến MySQL
$connection = "mysql:host=localhost;post=3307;dbname=test;user=root;charset=utf8mb4";
$pdo = new PDO($connection);
$statement = $pdo->prepare("select * from post");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
DumAndDie($posts);
