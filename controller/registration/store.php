<?php

use data\App;
use data\Database;

require_once __DIR__ . "/../../data/validator.php";
$email = $_POST['email'];
$password = $_POST['password'];

$err = [];

if(!Validator::email($email)){
    $err['email'] = "Please provide a valid email address.";
} 

if(!Validator::string($password,7,255)){
    $err['password'] = "Please provide a password of at least seven character.";
} 

if(!empty($err)){
    return view("registration/create.view.php",['err' => $err]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email',['email' => $email])->find();

if($user){
    $err['email'] = "Account exist.";
    return view("registration/create.view.php",['err' => $err]);
} else {
    $db->query('INSERT INTO users(email, pass) VALUES (:email, :pass)',[
        'email' => $email,
        'pass' => password_hash($password, PASSWORD_BCRYPT) // hàm này dùng để mã hóa $password trước khi insert vào database
    ]);

    login($email);
    //$_SESSION['user'] = $email;
    header('location: /');
    exit;
}
?>