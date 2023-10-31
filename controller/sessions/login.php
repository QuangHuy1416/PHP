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

if(!Validator::string($password)){
    $err['password'] = "Please provide valid a password.";
} 

if(!empty($err)){
    return view("sessions/create.view.php",['err' => $err]);
}

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email',['email' => $email])->find();

if(!$user){
    return view("sessions/create.view.php",[
        'err' => [
            'email' => "NO matching account found for that email address."
        ]
    ]);
}

if(password_verify($password, $user['pass'])){
    login($email);

    header('location: /');
    exit;
}

return view("sessions/create.view.php",[
    'err' => [
        'password' => "NO matching password."
    ]
]);
?>