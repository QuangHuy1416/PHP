<?php
$self = $_SERVER['PHP_SELF'];
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$url = $_SERVER["REQUEST_URI"];
$routes = [
    "/" => "index.php",
    "/product/" => "product.php",
    "/cart/" => "cart.php",
    "/post/" => "post.php",
    "/post?post-create" => "post-create.php"
];
if(array_key_exists($url,$routes))
{
    require $routes[$url];
    die();
}
if(array_key_exists($uri,$routes))
{
    require $routes[$uri];
}
else
{
    abort();
}

// Trả về các trang lỗi
function abort($code = 404)
{
    http_response_code($code);
    require "view/{$code}.php";
    die();
}