<?php

namespace controller\user;
use cartItemsModel;
use shoppingCartsModel;

include(__DIR__ . "/../../model/cartItemsModel.php");
include(__DIR__ . "/../../model/shoppingCartsModel.php");
class cartController{
    public $shoppingCartsController;
    public $cartItemsController;
    public function __construct()
    {
        $this->shoppingCartsController = new shoppingCartsModel();
        $this->cartItemsController = new cartItemsModel();
    }
        private function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['login_message'] = "Bạn cần đăng nhập để sử dụng giỏ hàng!";
            $_SESSION['redirect_after_login'] = $_GET['url'] ?? 'cart';
            header("Location: index.php?url=login");
            exit();
        }
    }

    public function addToCart()
    {
        $this->requireLogin();
        $userId = $_SESSION['user_id'];
        $cartId = $this->shoppingCartsController->getOrCreateCart($userId);

        if (isset($_GET['remove'])) {
            $productId = (int)$_GET['remove'];
            if ($productId > 0) {
                $this->cartItemsController->removeFromCart($cartId, $productId);
            }
            header("Location: index.php?url=cart");
            exit();
        }
        // === XÓA TOÀN BỘ GIỎ HÀNG ===
    if (isset($_GET['remove']) && $_GET['remove'] === 'all') {
        $this->cartItemsController->clearCart($cartId); // hàm mới mình sẽ thêm dưới
        header("Location: index.php?url=cart");
        exit();
    }

    // === XÓA 1 SẢN PHẨM ===
    if (isset($_GET['remove'])) {
        $productId = (int)$_GET['remove'];
        if ($productId > 0) {
            $this->cartItemsController->removeFromCart($cartId, $productId);
        }
        header("Location: index.php?url=cart");
        exit();
    }
        // Xử lý thêm/cập nhật số lượng
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $quantity  = (int)($_POST['quantity'] ?? 1);

            if ($productId <= 0) {
                header("Location: index.php?url=shop");
                exit();
            }

            if ($quantity <= 0) {
                $this->cartItemsController->removeFromCart($cartId, $productId);
            } else {
                $this->cartItemsController->addToCart($cartId, $productId, $quantity);
            }

            header("Location: index.php?url=cart");
            exit();
        }
    }

    // controller/UserController.php

public function viewCart()
{
    $this->requireLogin();

    $userId = $_SESSION['user_id'];
    $cartId = $this->shoppingCartsController->getOrCreateCart($userId);

    // === XỬ LÝ XÓA SẢN PHẨM ===
    if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
        $productId = (int)$_GET['remove'];
        $this->cartItemsController->removeFromCart($cartId, $productId);
        header("Location: index.php?url=cart");
        exit();
    }

    // === XỬ LÝ XÓA TOÀN BỘ GIỎ HÀNG ===
    if (isset($_GET['clear_cart'])) {
        $this->cartItemsController->clearCart($cartId);
        header("Location: index.php?url=cart");
        exit();
    }

    // === LẤY DỮ LIỆU GIỎ HÀNG ===
    $cartItems = $this->cartItemsController->getCartItems($cartId);
    $cartCount = $this->cartItemsController->getCartCount($cartId);

    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $totalPrice += $item['PriceProduct'] * $item['QuantityCartItem'];
    }

    // === TRUYỀN DỮ LIỆU QUA VIEW ===
    include __DIR__ . '/../../view/user/cart.php';
}

}