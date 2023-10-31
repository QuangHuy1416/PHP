<?php
namespace data;

use data\Middleware\Auth;
use data\Middleware\Guest;
use data\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller){
        return $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller){
        return $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller){
        return $this->add("DELETE", $uri, $controller);
    }

    public function patch($uri, $controller){
        return $this->add("PATCH", $uri, $controller);
    }

    public function put($uri, $controller){
        return $this->add("PUT", $uri, $controller);
    }

    public function create($uri, $controller){
        return $this->add("CREATE", $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method){
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

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