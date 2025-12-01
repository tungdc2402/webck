<?php
// controller/UserController.php
namespace controller;
use UserModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . "/../model/UserModel.php");

class UserController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function loginPage()
    {
        include(__DIR__ . "/../view/Login.php");
    }

    public function registerPage()
    {
        include(__DIR__ . "/../view/Register.php");
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

?>