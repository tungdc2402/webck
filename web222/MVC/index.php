<?php
session_start();

$url = $_GET['url'] ?? 'home';

$userRoutes = ['login', 'loginPost', 'register', 'registerPost', 'logout'];

$adminRoutes = ['admin_shop', 'admin_create', 'admin_edit', 'admin_store', 'admin_delete'];


if (in_array($url, $userRoutes)) {
    require_once('controller/UserController.php');
    $userController = new UserController();
    $userController ->run();

} elseif (in_array($url, $adminRoutes)) {
    require_once('controller/admin/productsControllerA.php');
    $proControllerA = new productsControllerA();
    $proControllerA ->run();

} else {
    require_once('controller/user/productsController.php');
    $proController = new productsController();
    $proController ->run();
}
?>