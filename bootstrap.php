<?php
use data\App;
use data\Container;
use data\Database;
$container  = new Container();

$container->bind('data\Database', function(){
    require_once basePath('data/config.php');
    return new Database($config);
});

App::setContainer($container);
?>
