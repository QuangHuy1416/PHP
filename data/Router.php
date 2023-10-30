<?php
namespace data;
class Router {
    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller){
        $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller){
        $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller){
        $this->add("DELETE", $uri, $controller);
    }

    public function patch($uri, $controller){
        $this->add("PATCH", $uri, $controller);
    }

    public function put($uri, $controller){
        $this->add("PUT", $uri, $controller);
    }

    public function create($uri, $controller){
        $this->add("CREATE", $uri, $controller);
    }

    public function route($uri, $method){
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require_once basePath($route['controller']);
            }
        }
        $this->abort();
    }

    function abort($code = 404){
        http_response_code($code);
        view("{$code}.php");
        die();
    }
}



//$self = $_SERVER['PHP_SELF'];
// $uri = parse_url($_SERVER["REQUEST_URI"])['path'];
// $routes = [
//     "/" => "../controller/index.php",
//     "/product/" => "../controller/product.php",
//     "/cart/" => "../controller/cart.php",
//     "/post/" => "../controller/posts/post.php",
// ];

// if(array_key_exists($uri,$routes)){
//     //require_once $routes[$uri];
//     view($routes[$uri]);
// }else{
//     abort();
// }

// function abort($code = 404){
//     http_response_code($code);
//     view("{$code}.php");
//     die();
// }
?>