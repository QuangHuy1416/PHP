<?php
    use data\Router;
    //use data\Response;
    require_once "response.php";
    function DumAndDie($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function UrlIs($value){
        return $_SERVER['REQUEST_URI'] === $value;
    }

    function authorized($condition,$status = Response::FORBIDDEN){
        if(!$condition){
            $route = new Router();
            $route->abort($status);
        }
    }

    function basePath($path){
        return BASE_PATH . $path;
    }

    function view($path, $attribute = []){
        extract($attribute);
        //$posts = $value;
        require_once basePath('view/' . $path);
    }

    function login($email){
        $_SESSION['user'] = $email;
    }
?>