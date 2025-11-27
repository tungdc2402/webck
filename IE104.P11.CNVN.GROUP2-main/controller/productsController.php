<?php
include(__DIR__ . "/../model/productsModel.php");
class productsController {
    public $proController;
    public function __construct() {
        $this->proController = new productsModel();
    }
    public function shopPage(){
        $products = $this->proController->getAllProducts();
        include(__DIR__ . "/../view/shop.php");
    }
    public function home(){
        $products = $this->proController->get10LatestProducts();
        include(__DIR__ . "/../view/index.php");
    }

    public function run(){
        $action = $_GET['url'] ?? 'home';
        if (empty($action) || $action === 'home') {
            $this->home();
        } elseif ($action === 'tungdubai') {
            $this->shopPage();
        } else {
            $this->home();
        }
    }
}
?>