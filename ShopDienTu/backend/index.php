<?php

use controller\admin\productsControllerA;
use controller\user\productsController;
use controller\UserController;
use controller\admin\CategoryControllerA;
use controller\user\cartController;

session_start();

$url = $_GET['url'] ?? 'home';

$userRoutes = ['login', 'loginPost', 'register', 'registerPost', 'logout'];
$cartRoutes = ['cart', 'add_to_cart'];
$adminRoutes = ['admin_shop', 'admin_create', 'admin_edit', 'admin_store', 'admin_delete', 'admin_category', 'admin_category_store', 'admin_category_delete','admin_reviews', 'admin_review_delete','admin_orders'];



if (in_array($url, $userRoutes)) {
    require_once('controller/UserController.php');
    $userController = new UserController();
    $userController ->run();

} elseif (in_array($url, $adminRoutes)) {

    if (strpos($url, 'admin_category') !== false) {
        require_once('controller/admin/CategoryControllerA.php');
        $cateController = new CategoryControllerA();
        $cateController->run();
    }
    else {
        require_once('controller/admin/productsControllerA.php');
        $proControllerA = new productsControllerA();
        $proControllerA ->run();
    }

}elseif (in_array($url, $cartRoutes)) {
    require_once('controller/user/cartController.php');
    $cartController = new cartController();

    if ($url == 'cart') {
        $cartController->viewCart();
    } elseif ($url == 'add_to_cart') {
        $cartController->addToCart();
    }
} else {
    require_once('controller/user/productsController.php');
    $proController = new productsController();
    $proController ->run();
}
?>