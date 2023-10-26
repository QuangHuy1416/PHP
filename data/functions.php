<?php
    require_once "response.php";
    function DumAndDie($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function UrlIs($value)
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }

    function authorized($condition,$status = Response::FORBIDDEN)
    {
        if(!$condition)
        {
            abort($status);
        }
    }