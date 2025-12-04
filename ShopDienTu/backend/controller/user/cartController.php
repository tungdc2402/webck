<?php

namespace controller\user;

use cartItemsModel;
use shoppingCartsModel;

include(__DIR__ . "/../../model/cartItemsModel.php");
include(__DIR__ . "/../../model/shoppingCartsModel.php");
class cartController
{
    public $shoppingCartsController;
    public $cartItemsController;
    public function __construct()
    {
        $this->shoppingCartsController = new shoppingCartsModel();
        $this->cartItemsController = new cartItemsModel();
    }
    public function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['login_message'] = "Bạn cần đăng nhập để sử dụng giỏ hàng!";
            $_SESSION['redirect_after_login'] = $_GET['url'] ?? 'cart';
            header("Location: index.php?url=login");
            exit();
        }
    }
    public function getFullCart($userId)
    {
        $cartId = $this->shoppingCartsController->getOrCreateCart($userId);
        $items  = $this->cartItemsController->getCartItems($cartId);

        $subtotal = 0;
        $totalItems = 0;
        foreach ($items as $item) {
            $subtotal   += $item['PriceProduct'] * $item['QuantityCartItem'];
            $totalItems += $item['QuantityCartItem'];
        }
        $vat        = $subtotal * 0.05;
        $orderTotal = $subtotal + $vat;

        return [
            'IDShoppingCart' => $cartId,
            'items'          => $items,          // PHẢI LÀ 'items' – không được là 'item', 'cartItems'
            'subtotal'       => $subtotal,       // PHẢI LÀ 'subtotal'
            'totalItems'     => $totalItems,     // PHẢI LÀ 'totalItems'
            'vat'            => $vat,            // PHẢI LÀ 'vat'
            'orderTotal'     => $orderTotal      // PHẢI LÀ 'orderTotal'
        ];
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
        if (isset($_GET['remove']) && $_GET['remove'] === 'all') {
            $this->cartItemsController->clearCart($cartId);
            header("Location: index.php?url=cart");
            exit();
        }

        if (isset($_GET['remove'])) {
            $productId = (int)$_GET['remove'];
            if ($productId > 0) {
                $this->cartItemsController->removeFromCart($cartId, $productId);
            }
            header("Location: index.php?url=cart");
            exit();
        }
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

    public function viewCart()
    {
        $this->requireLogin();

        $userId = $_SESSION['user_id'];
        $cartId = $this->shoppingCartsController->getOrCreateCart($userId);

        if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
            $productId = (int)$_GET['remove'];
            $this->cartItemsController->removeFromCart($cartId, $productId);
            header("Location: index.php?url=cart");
            exit();
        }

        if (isset($_GET['clear_cart'])) {
            $this->cartItemsController->clearCart($cartId);
            header("Location: index.php?url=cart");
            exit();
        }

        $cart = $this->getFullCart($userId);

        // Gán biến cho view
        $cartItems     = $cart['items'];
        $subtotal       = $cart['subtotal'];
        $vat            = $cart['vat'];
        $orderTotal     = $cart['orderTotal'];
        $totalItems     = $cart['totalItems'];
        $IDShoppingCart = $cart['IDShoppingCart'];
        $cartCount      = $totalItems;  // Thay thế $cartCount cũ
        include __DIR__ . '/../../view/user/cart.php';
    }
}
