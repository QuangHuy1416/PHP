<?php
//require "route.php";
require "functions.php";
// Tạo liên kết đến MySQL
try {
    //$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    $connection = "mysql:host=localhost;post=3307;dbname=test;user=root;charset=utf8mb4";
    $pdo = new PDO($connection);
    $statement = $pdo->prepare("select * from post");
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    DumAndDie($posts);
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
}
