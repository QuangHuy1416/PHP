<?php
require_once "root.php";
require_once BASE_PATH . "data/functions.php";
// require_once basePath("data/database.php");
// require_once basePath("data/response.php");

// Hàm này dùng để load tất cả các file có chứa class name trong folder data
spl_autoload_register(function ($class){
    //require_once basePath("data/{$class}.php");
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require_once basePath("{$class}.php");
});

require_once basePath("data/route.php");