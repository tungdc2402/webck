<?php

namespace controller;

use controller\user\cartController;
use controller\user\orderController;
use shoppingCartsModel;
use UserModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../model/UserModel.php");
require_once "user/cartController.php";
require_once "user/orderController.php";
class UserController
{
    public $userModel;
    public $cartController;
    public $orderController;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->cartController = new CartController();
        $this->orderController = new orderController();
    }

    public function loginPage()
    {
        require_once(__DIR__ . "/../view/Login.php");
    }

    public function registerPage()
    {
        require_once(__DIR__ . "/../view/Register.php");
    }
    public function checkOut()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        $userId = $_SESSION['user_id'];
        $cartData = $this->cartController->getFullCart($userId);
        if (empty($cartData['items'])) {
            header("Location: index.php?url=cart");
            exit();
        }
        // Xử lý submit form đặt hàng
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->orderController->placeOrder();
            return;  // Ngăn include view lại sau khi xử lý
        }
        extract($cartData);                    // Tự động tạo: $items, $subtotal, $vat, $orderTotal, $totalItems, $IDShoppingCart
        $cartItems = $items;                   // Vì view đang dùng $cartItems
        // ==================================================

        require_once(__DIR__ . "/../view/user/checkout.php");
    }

    public function SubmitRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['FullNameUser'];
            $phone = $_POST['PhoneNumberUser'];
            $password = $_POST['PasswordHashUser'];
            $birthday = $_POST['BirthDay'];
            $email = $_POST['EmailUser'] ?? '';

            if ($this->userModel->checkPhoneExists($phone)) {
                $error = "Số điện thoại này đã được đăng ký!";
                include(__DIR__ . "/../view/Register.php");
            } else {
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                $result = $this->userModel->insertUser($fullname, $birthday, $phone, $email, $passHash);

                if ($result) {
                    header("Location: index.php?url=login&msg=registered");
                    exit();
                } else {
                    $error = "Đăng ký thất bại, vui lòng thử lại!";
                    include(__DIR__ . "/../view/Register.php");
                }
            }
        }
    }

    public function SubmitLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $_POST['PhoneNumberUser'];
            $password = $_POST['PasswordHashUser'];

            $user = $this->userModel->getUserByPhone($phone);

            if ($user && password_verify($password, $user['PasswordHashUser'])) {
                $_SESSION['user_id'] = $user['IDUser'];
                $_SESSION['user_name'] = $user['FullNameUser'];
                $_SESSION['user_phone'] = $user['PhoneNumberUser'];

                $role = $user['RoleUser'] ?? 0;
                $_SESSION['RoleUser'] = $role;
                $cartModel = new shoppingCartsModel();
                $cartId = $cartModel->getOrCreateCart($user['IDUser']);
                $_SESSION['IDShoppingCart'] = $cartId;

                if ($role == 1) {
                    header("Location: index.php?url=admin_shop");
                } else {
                    header("Location: index.php?url=home");
                }
                exit();
            } else {
                $error = "Sai số điện thoại hoặc mật khẩu!";
                include(__DIR__ . "/../view/Login.php");
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?url=home");
    }

    public function run()
    {
        $action = $_GET['url'] ?? 'home';

        switch ($action) {
            case 'my_orders':
                $this->orderController->myOrders();
                break;
            case 'order_detail':
                $this->orderController->orderDetail();
                break;
            case 'place_order':  // Optional, phòng trường hợp bạn muốn route riêng
                $this->orderController->placeOrder();
                break;
            case 'checkout':
                $this->checkOut();
                break;
            case 'add_to_cart':
                $this->cartController->addToCart();
                break;
            case 'cart':
                $this->cartController->viewCart();
                break;
            case 'login':
                $this->loginPage();
                break;
            case 'loginPost':
                $this->SubmitLogin();
                break;
            case 'register':
                $this->registerPage();
                break;
            case 'registerPost':
                $this->SubmitRegister();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                header("Location: index.php?url=home");
                break;
        }
    }
}
