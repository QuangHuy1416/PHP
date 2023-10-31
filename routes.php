<?php
    $routes->get('/','controller/index.php');
    $routes->get('/product/','controller/product.php');
    $routes->get('/cart/','controller/cart.php');
    $routes->get('/post/','controller/posts/post.php')->only('auth');
    $routes->get('/post/edit/','controller/posts/edit.php');
    $routes->get('/register/','controller/registration/create.php')->only('guest');
    $routes->patch('/post/edit/index.php','controller/posts/update.php');
    $routes->post('/register/index.php','controller/registration/store.php');

    $routes->delete('/post/','controller/posts/detroy.php');
    $routes->create('/post/','controller/posts/post-create.php');
    //$routes->delete('/post/','controller/posts/post-create.php');
?>