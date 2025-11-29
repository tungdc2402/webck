<?php
include(__DIR__ . "/../../model/productsModel.php");

class productsController
{
    public $proController;

    public function __construct()
    {
        $this->proController = new productsModel();
    }

    public function shopPage()
    {
        $products = $this->proController->getAllProducts();
        require_once (__DIR__ . "/../../view/user/shop.php");
    }

    public function home()
    {
        $products = $this->proController->get10LatestProducts();
        require_once __DIR__ . "/../../view/user/home.php";
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

    public function run()
    {
        $action = $_GET['url'] ?? 'home';
        if (empty($action) || $action === 'home') {
            $this->home();
        } elseif ($action === 'shoppage') {
            $this->shopPage();
        } elseif ($action === 'search') {
            $this->search();
        } else {
            $this->home();
        }
    }
}

?>