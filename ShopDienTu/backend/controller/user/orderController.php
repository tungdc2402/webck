<?php

namespace controller\user;

use order_detailsModel;
use ordersModel;
use productsModel;

require_once(__DIR__ . "/../../model/ordersModel.php");
require_once(__DIR__ . "/../../model/order_detailsModel.php");
require_once(__DIR__ . "/../../model/productsModel.php");
require_once(__DIR__ . "/cartController.php");

class orderController
{
    private $ordersModel;
    private $detailsModel;
    private $cartController;
    private $productsModel;

    public function __construct()
    {
        $this->ordersModel = new ordersModel();
        $this->detailsModel = new order_detailsModel();
        $this->cartController = new cartController();
        $this->productsModel = new productsModel();
    }

    // Trang checkout → nhấn Đặt hàng
    public function placeOrder()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'];
            $cartData = $this->cartController->getFullCart($userId);

            if (empty($cartData['items'])) {
                header("Location: index.php?url=cart");
                exit();
            }

            $data = [
                'fullName' => $_POST['FullNameUser'] ?? '',
                'phone' => $_POST['Phone'] ?? '',
                'province' => $_POST['Province'] ?? '',
                'ward' => $_POST['Ward'] ?? '',
                'addressDetail' => $_POST['AddressDetail'] ?? '',
                'note' => $_POST['Note'] ?? '',
                'payment' => $_POST['PaymentMethodOrder'] ?? '',
                'userId' => $userId,
                'total' => $cartData['orderTotal'],
                'fullAddress' => ($_POST['AddressDetail'] ?? '') . ", " . ($_POST['Ward'] ?? '') . ", " . ($_POST['Province'] ?? '')
            ];
            // Danh sách required fields
            $required = ['fullName', 'phone', 'province', 'ward', 'addressDetail', 'payment'];
            $errors = [];

            foreach ($required as $field) {
                if (empty($data[$field])) {
                    $errors[] = ucfirst($field) . ' là bắt buộc!';  // Ví dụ: 'Fullname là bắt buộc!'
                }
            }

            if (!empty($errors)) {
                // Lưu errors vào session để hiển thị ở view
                $_SESSION['checkout_errors'] = $errors;

                // Redirect về checkout để hiển thị form lại
                header("Location: index.php?url=checkout");
                exit();
            }

            $orderId = $this->ordersModel->createOrder($data);

            if ($orderId) {
                // Thêm chi tiết đơn hàng
                foreach ($cartData['items'] as $item) {
                    $this->detailsModel->addDetail(
                        $orderId,
                        $item['IDProduct'],
                        $item['NameProduct'],
                        $item['QuantityCartItem'],
                        $item['PriceProduct']
                    );
                }

                // Xóa giỏ hàng
                $cartId = $cartData['IDShoppingCart'];
                mysqli_query($GLOBALS['conn'], "DELETE FROM CartItems WHERE IDShoppingCart = '$cartId'");

                // Hiển thị thành công
                include(__DIR__ . "/../../view/user/order_success.php");
                exit();
            }
        }
    }

    public function myOrders()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }
        $orders = $this->ordersModel->getOrdersByUser($_SESSION['user_id']);
        include(__DIR__ . "/../../view/user/my_orders.php");
    }

    public function orderDetail()
    {
        if (!isset($_SESSION['user_id'])) exit(header("Location: index.php?url=login"));
        if (!isset($_GET['id'])) exit(header("Location: index.php?url=my_orders"));

        $orderId = $_GET['id'];
        $order = $this->ordersModel->getOrderById($orderId);
        if ($order['IDUser'] != $_SESSION['user_id']) {
            header("Location: index.php?url=my_orders");
            exit();
        }
        $items = $this->detailsModel->getDetailsByOrder($orderId);
        include(__DIR__ . "/../../view/user/order_detail.php");
    }

    // ADMIN
    public function adminOrders()
    {
        if ($_SESSION['RoleUser'] != 1) {
            header("Location: index.php?url=home");
            exit();
        }

        // Xử lý duyệt / gửi hàng
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $id = $_GET['id'];
            $order = $this->ordersModel->getOrderById($id);

            if ($_GET['action'] == 'confirm' && $order['StatusOrder'] == 'Chờ xác nhận') {
                $this->ordersModel->updateStatus($id, 'Đang chuẩn bị hàng');
            }
            if ($_GET['action'] == 'ship' && $order['StatusOrder'] == 'Đang chuẩn bị hàng') {
                $this->ordersModel->updateStatus($id, 'Đang vận chuyển');

                // Trừ kho
                $items = $this->detailsModel->getDetailsByOrder($id);
                foreach ($items as $item) {
                    $this->productsModel->decreaseStock($item['IDProduct'], $item['QuantityOrderDetail']);
                }
            }
            if ($_GET['action'] == 'complete') {
                $this->ordersModel->updateStatus($id, 'Hoàn thành');
            }
            header("Location: index.php?url=admin_orders");
            exit();
        }

        $orders = $this->ordersModel->getAllOrders();
        include(__DIR__ . "/../../view/admin/admin_orders.php");
    }
}
