<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid method']);
    exit;
}

if (!isset($_SESSION['IDShoppingCart']) || !isset($_POST['IDProduct'])) {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
    exit;
}

$cartId    = (int)$_SESSION['IDShoppingCart'];
$productId = (int)$_POST['IDProduct'];
$quantity  = max(1, (int)($_POST['quantity'] ?? 1));

try {
    require_once __DIR__ . '/../model/cartItemsModel.php';

    $cartModel = new cartItemsModel();
    $result = $cartModel->updateQuantity($cartId, $productId, $quantity);

    echo json_encode(['success' => (bool)$result]);
} catch (Throwable $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Server error',
    ]);
}
exit;
