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
    private function loadTopSellingProducts()
    {
        return $this->proController->getTopSellingProducts(3);
    }
    public function home()
    {
        $recentlyViewed = [];
        if (!empty($_SESSION['recently_viewed'])) {
            // Lấy tối đa 3 sản phẩm gần nhất từ session
            $viewedIds = $_SESSION['recently_viewed'];
            $viewedIds = array_slice($viewedIds, 0, 3); // Chỉ lấy 3 cái mới nhất
            // === PHẦN MỚI: NỔI BẬT - SẢN PHẨM ĐƯỢC REVIEW NHIỀU NHẤT ===
            $featuredProducts = $this->proController->getMostReviewedProducts(3);
            foreach ($viewedIds as $viewedId) {
                $viewedProduct = $this->proController->getProductById($viewedId);
                if ($viewedProduct) { // Phòng trường hợp sản phẩm bị xóa
                    $recentlyViewed[] = $viewedProduct;
                }
            }
        }
        // ============================================

        // Nếu mày có phần Bán Chạy ở home thì thêm luôn
        $topSelling = $this->proController->getTopSellingProducts(3);
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
            // === PHẦN LƯU LỊCH SỬ XEM - GIỮ HẾT, KHÔNG GIỚI HẠN TRƯỚC ===
            if (!isset($_SESSION['recently_viewed'])) {
                $_SESSION['recently_viewed'] = []; // Lần đầu tạo mảng rỗng
            }

            // Nếu sản phẩm đã xem rồi thì xóa đi để đưa lên đầu lại (tránh lặp)
            if (($key = array_search($id, $_SESSION['recently_viewed'])) !== false) {
                unset($_SESSION['recently_viewed'][$key]);
            }

            // Đưa sản phẩm hiện tại lên đầu danh sách
            array_unshift($_SESSION['recently_viewed'], $id);

            $product = $this->proController->getProductById($id);
            $relatedProducts = $this->proController->get10LatestProducts();
            $reviews = $this->proController->getReviewsByProductId($id);

            // === LẤY 3 SẢN PHẨM GẦN NHẤT ĐỂ HIỂN THỊ (loại trừ sản phẩm hiện tại) ===
            $recentlyViewed = [];
            if (!empty($_SESSION['recently_viewed'])) {
                // Copy mảng để xử lý
                $viewedIds = $_SESSION['recently_viewed'];

                // Loại bỏ sản phẩm đang xem hiện tại
                if (($key = array_search($id, $viewedIds)) !== false) {
                    unset($viewedIds[$key]);
                }

                // Lấy tối đa 3 cái đầu tiên (gần nhất)
                $viewedIds = array_values($viewedIds); // reset key
                $viewedIds = array_slice($viewedIds, 0, 3);

                // Lấy thông tin từng sản phẩm
                foreach ($viewedIds as $viewedId) {
                    $viewedProduct = $this->proController->getProductById($viewedId);
                    if ($viewedProduct) { // phòng trường hợp sản phẩm bị xóa
                        $recentlyViewed[] = $viewedProduct;
                    }
                }
            }
            // ====================================================================

            if ($product) {
                require_once(__DIR__ . "/../../view/user/single-product.php");
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
