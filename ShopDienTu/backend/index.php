<?php

use controller\admin\productsControllerA;
use controller\user\productsController;
use controller\UserController;

session_start();

$url = $_GET['url'] ?? 'home';

$userRoutes = ['login', 'loginPost', 'register', 'registerPost', 'logout', 'add_to_cart', 'cart', 'checkout', 'place_order', 'my_orders', 'order_detail'];
$adminRoutes = ['admin_shop', 'admin_create', 'admin_edit', 'admin_store', 'admin_delete','admin_orders'];


if (in_array($url, $userRoutes)) {
    require_once('controller/UserController.php');
    $userController = new UserController();
    $userController->run();
} elseif (in_array($url, $adminRoutes)) {
    require_once('controller/admin/productsControllerA.php');
    $proControllerA = new productsControllerA();
    $proControllerA->run();
}
elseif ($url == 'admin_orders') {
    require_once('controller/user/orderController.php');
    $orderCtrl = new controller\user\orderController();
    $orderCtrl->adminOrders();
} else {
    require_once('controller/user/productsController.php');
    $proController = new productsController();
    $proController->run();
}
