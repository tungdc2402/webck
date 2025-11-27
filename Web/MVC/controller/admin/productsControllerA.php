<?php
include(__DIR__ . "/../../model/productsModel.php");

class productsControllerA
{
    public $proController;

    public function __construct()
    {
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

    public function run()
    {
        $action = $_GET['url'] ?? 'shoppage';

        if ($action === 'shoppage') {
            $this->shopPage();
        } elseif ($action === 'search') {
            $this->search();
        } else {
            $this->shoppage();
        }
    }

}
?>