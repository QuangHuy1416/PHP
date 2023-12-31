<?php
session_start();
require_once "root.php";
require_once BASE_PATH . "data/functions.php";
// require_once basePath("data/database.php");
// require_once basePath("data/response.php");

// Hàm này dùng để load tất cả các file có chứa class trong folder data
spl_autoload_register(function ($class){
    //require_once basePath("data/{$class}.php");
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require_once basePath("{$class}.php");
});

//require_once basePath("data/route.php");
require_once basePath('bootstrap.php');
use data\Router;
$routes = new Router();
require_once basePath("routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
// Nếu tồn tại $_POST['_method'] thì $method = $_POST['_method'], ngược lại thì $method = $_SERVER['REQUEST_METHOD']
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$routes->route($uri, $method); 