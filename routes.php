<?php
    $routes->get('/','controller/index.php');
    $routes->get('/product/','controller/product.php');
    $routes->get('/cart/','controller/cart.php');
    $routes->get('/post/','controller/posts/post.php');

    $routes->delete('/post/','controller/posts/detroy.php');
    $routes->create('/post/','controller/posts/post-create.php');
    //$routes->delete('/post/','controller/posts/post-create.php');
?>