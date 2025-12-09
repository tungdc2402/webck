<?php
// controller/admin/CategoryControllerA.php
namespace controller\admin;
use CategoryModel;

include_once(__DIR__ . "/../../model/CategoryModel.php");

class CategoryControllerA {
    public $cateModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['RoleUser']) || $_SESSION['RoleUser'] != 1) {
            header("Location: index.php?url=login");
            exit();
        }
        $this->cateModel = new CategoryModel();
    }

    public function index() {
        $categories = $this->cateModel->getAll();
        include(__DIR__ . "/../../view/admin/danhmuc.php");
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['NameCategory'];
            $id = $_POST['id'] ?? '';

            if ($id != "") {
                // Logic Sửa
                $this->cateModel->update($id, $name);
            } else {
                // Logic Thêm mới
                $this->cateModel->insert($name);
            }

            header("Location: index.php?url=admin_category");
            exit();
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->cateModel->delete($id);
            header("Location: index.php?url=admin_category");
            exit();
        }
    }

    // Router nội bộ của controller này
    public function run() {
        $action = $_GET['url'];
        switch ($action) {
            case 'admin_category':
                $this->index();
                break;
            case 'admin_category_store':
                $this->store();
                break;
            case 'admin_category_delete':
                $this->delete();
                break;
            default:
                $this->index();
                break;
        }
    }
}
?>