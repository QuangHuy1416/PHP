<?php
//$self = $_SERVER['PHP_SELF'];
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$routes = [
    "/" => "../controller/index.php",
    "/product/" => "../controller/product.php",
    "/cart/" => "../controller/cart.php",
    "/post/" => "../controller/posts/post.php",
];

if(array_key_exists($uri,$routes))
{
    //require_once $routes[$uri];
    view($routes[$uri]);
}
else
{
    abort();
}

function abort($code = 404)
{
    http_response_code($code);
    view("{$code}.php");
    die();
}