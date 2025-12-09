<?php

namespace controller\admin;

use controller\user\cartController;
use controller\user\orderController;
use productsModel;
use ordersModel;

require_once(__DIR__ . "/../../model/productsModel.php");
require_once(__DIR__ . "/../user/orderController.php");
require_once(__DIR__ . "/../../model/ordersModel.php");

class productsControllerA
{
    public $proController;
    public $orderController;
    public $ordersModel;
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['RoleUser']) || $_SESSION['RoleUser'] != 1) {
            header("Location: ../../index.php?url=login");
            exit();
        }

        $this->proController = new productsModel();
        $this->orderController = new orderController();
        $this->ordersModel = new ordersModel();
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

    public function create()
    {
        $isEdit = false;
        include(__DIR__ . "/../../view/admin/them_san_pham.php");
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->proController->getProductById($id);
            $isEdit = true;
            include(__DIR__ . "/../../view/admin/them_san_pham.php");
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
            $image = "";
            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                $target_dir = "img/";
                $image = basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $image);
            }
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $id = $_POST['id'];
                $this->proController->updateProduct($id, $name, $price, $stock, $desc, $image, $category);
            } else {
                $this->proController->insertProduct($name, $price, $stock, $desc, $image, $category);
            }
            header("Location: run.php?url=shoppage");
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->proController->deleteProduct($id);
            header("Location: run.php?url=shoppage");
        }
    }

    public function adminOrders()
    {
        $orders = $this->ordersModel->getAllOrders();
        require_once(__DIR__ . "/../../view/admin/admin_orders.php");
        exit();
    }


    public function run()
    {
        $action = $_GET['url'] ?? 'admin_shop';

        switch ($action) {
            case 'admin_orders':
                $this->adminOrders();
            case 'admin_shop':
                $this->shopPage();
                break;
            case 'admin_create':
                $this->create();
                break;
            case 'admin_edit':
                $this->edit();
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
