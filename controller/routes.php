<?php
// Định nghĩa các tuyến đường
$routes = [
    '/' => function() {
        require "index.php";
    },
    '/product' => function() {
        require "product.php";
    },
    '/cart' => function() {
        require "cart.php";
    }
];

// Lấy URL hiện tại
$url = $_SERVER['REQUEST_URI'];

// Kiểm tra xem tuyến đường có tồn tại hay không
if (array_key_exists($url, $routes)) {
    // Nếu tuyến đường tồn tại, gọi hàm callback tương ứng
    $callback = $routes[$url];
    $callback();
} else {
    // Nếu tuyến đường không tồn tại, hiển thị trang 404
    echo '404 - Page not found';
}
?>