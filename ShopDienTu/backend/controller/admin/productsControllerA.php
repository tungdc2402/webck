<?php

namespace controller\admin;

use productsModel;
use \controller\user\orderController;

include(__DIR__ . "/../../model/productsModel.php");
include(__DIR__ . "/../../controller/user/orderController.php");

class productsControllerA
{
    public $proController;
    public $ordController;
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['RoleUser']) || $_SESSION['RoleUser'] != 1) {
            header("Location: ../../index.php?url=login");
            exit();
        }
        $this->ordController = new orderController();
        $this->proController = new productsModel();
    }

    public function shopPage()
    {
        $products = $this->proController->getAllProducts();
        include(__DIR__ . "/../../view/admin/sanpham.php");
    }

    public function search()
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $products = $this->proController->searchProducts($keyword);
            include(__DIR__ . "/../../view/user/viewSearch.php");
        } else {
            $this->shopPage();
        }
    }


    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->proController->getProductById($id);
            $isEdit = true;
            include(__DIR__ . "/../../view/admin/Location: admin_shop");
        }
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['NameProduct'];
            $price = $_POST['PriceProduct'];
            $stock = $_POST['StockQuantityProduct'];
            $desc = $_POST['DescriptionProduct'];
            $category = $_POST['IDCategory'];
            $discount = $_POST['Discount'];

            $image = $_POST['current_image'] ?? '';

            if (!empty($_POST['image_url'])) {
                $image = $_POST['image_url'];
            }
            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                $target_dir = "../frontend/img/";
                $filename = time() . "_" . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $filename;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $filename;
                }
            }

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $id = $_POST['id'];
                $this->proController->updateProduct($id, $name, $price, $stock, $desc, $image, $category, $discount);
            } else {
                $this->proController->insertProduct($name, $price, $stock, $desc, $image, $category, $discount);
            }
            header("Location: admin_shop");
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->proController->deleteProduct($id);
            header("Location: url=admin_shop");
        }
    }
    public function reviewPage()
    {
        $reviews = $this->proController->getAllReviews();
        include(__DIR__ . "/../../view/admin/danhgia.php");
    }

    public function deleteReview()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->proController->deleteReview($id);
            header("Location: url=admin_reviews");
            exit();
        }
    }
    public function discountPage()
    {
        $products = $this->proController->getAllProducts(); // Lấy tất cả sản phẩm
        include(__DIR__ . "/../../view/admin/admin_discount.php");
    }

    public function updateDiscount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $discount = max(0, min(90, (int)$_POST['discount'])); // Giới hạn 0-90%

            $this->proController->updateDiscount($id, $discount);

            // Có thể thêm thông báo thành công bằng session nếu muốn
            $_SESSION['success'] = "Cập nhật giảm giá thành công!";
            header("Location: index.php?url=admin_discount");
            exit();
        }
    }
    public function run()
    {
        $action = $_GET['url'] ?? 'admin_shop';

        switch ($action) {
            case 'admin_discount':
                $this->discountPage();
                break;
            case 'admin_update_discount':
                $this->updateDiscount();
                break;
            case 'admin_orders':
                $this->ordController->adminOrders();
                break;
            case 'Admin_order_Detail':
                $this->ordController->Admin_order_Detail();
                break;
            case 'admin_shop':
                $this->shopPage();
                break;
            case 'admin_edit':
                $this->edit();
                break;
            case 'admin_reviews':
                $this->reviewPage();
                break;
            case 'admin_review_delete':
                $this->deleteReview();
                break;
            case 'admin_store':
                $this->store();
                break;
            case 'admin_delete':
                $this->delete();
                break;
            default:
                $this->shopPage();
                break;
        }
    }
}
