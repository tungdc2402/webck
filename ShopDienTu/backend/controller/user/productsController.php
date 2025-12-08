<?php

namespace controller\user;

use productsModel;

require_once(__DIR__ . "/../../model/productsModel.php");

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
        require_once(__DIR__ . "/../../view/user/shop.php");
    }

    public function home()
    {
        $products = $this->proController->get10LatestProducts();
        require_once(__DIR__ . "/../../view/user/home.php");
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


    public function detail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->proController->getProductById($id);
            $relatedProducts = $this->proController->get10LatestProducts();
            $reviews = $this->proController->getReviewsByProductId($id);
            if ($product) {
                include(__DIR__ . "/../../view/user/single-product.php");
            } else {
                $this->home();
            }
        } else {
            $this->home();
        }
    }

    public function submitReview()
    {
        if (!isset($_SESSION['user_name'])) {
            header("Location: index.php?url=login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProduct = $_POST['id_product'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $rating = $_POST['rating'];
            $content = $_POST['review'];
            $this->proController->insertReview($idProduct, $name, $email, $rating, $content);
            header("Location: index.php?url=detail&id=" . $idProduct);
            exit;
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
        } elseif ($action === 'detail') {
            $this->detail();
        } elseif ($action === 'submit_review') {
            $this->submitReview();
        } else {
            $this->home();
        }
    }
}
