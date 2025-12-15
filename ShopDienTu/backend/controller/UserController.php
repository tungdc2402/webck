<?php

namespace controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use controller\user\cartController;
use controller\user\orderController;
use shoppingCartsModel;
use UserModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../model/UserModel.php");
require_once "user/cartController.php";
require_once "user/orderController.php";
// Đường dẫn tới thư viện PHPMailer của bạn (Sửa lại cho đúng đường dẫn thực tế)
require_once __DIR__ . '/../PHPMailer/src/Exception.php';
require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

class UserController
{
    public $userModel;
    public $cartController;
    public $orderController;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->cartController = new CartController();
        $this->orderController = new orderController();
    }

    public function loginPage()
    {
        require_once(__DIR__ . "/../view/Login.php");
    }

    public function registerPage()
    {
        require_once(__DIR__ . "/../view/Register.php");
    }
    public function checkOut()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit();
        }

        $userId = $_SESSION['user_id'];
        $cartData = $this->cartController->getFullCart($userId);
        if (empty($cartData['items'])) {
            header("Location: cart");
            exit();
        }
        // Xử lý submit form đặt hàng
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->orderController->placeOrder();
            return;  // Ngăn include view lại sau khi xử lý
        }
        extract($cartData);                    // Tự động tạo: $items, $subtotal, $vat, $orderTotal, $totalItems, $IDShoppingCart
        $cartItems = $items;                   // Vì view đang dùng $cartItems
        // ==================================================

        require_once(__DIR__ . "/../view/user/checkout.php");
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
                    header("Location: login&msg=registered");
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
                $cartModel = new shoppingCartsModel();
                $cartId = $cartModel->getOrCreateCart($user['IDUser']);
                $_SESSION['IDShoppingCart'] = $cartId;

                if ($role == 1) {
                    header("Location: admin_shop");
                } else {
                    header("Location: home");
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
        header("Location: home");
    }

    public function forgotPasswordPage()
    {
        require_once(__DIR__ . "/../view/ForgotPassword.php");
    }

    public function aboutUs()
    {
        require_once(__DIR__ . "/../view/user/about-us.php");
    }

    public function contact()
    {
        require_once(__DIR__ . "/../view/user/contact.php");
    }

    // 2. Xử lý gửi Mã OTP
    public function sendResetCode()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $user = $this->userModel->getUserByEmail($email);

            if ($user) {
                // Tạo mã 6 số ngẫu nhiên
                $code = rand(100000, 999999);

                // Lưu vào DB
                $this->userModel->updateResetCode($email, $code);

                // Gửi mail
                $this->sendMailOTP($email, $code);

                // Lưu email vào Session để sang trang nhập mã dùng
                $_SESSION['reset_email'] = $email;

                // Chuyển sang trang nhập mã
                header("Location: verify_code");
                exit();
            } else {
                $error = "Email này chưa đăng ký!";
                include(__DIR__ . "/../view/ForgotPassword.php");
            }
        }
    }

    // Hàm gửi mail chứa OTP (Sửa lại nội dung mail)
    private function sendMailOTP($toEmail, $code)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tungdc.24it@vku.udn.vn'; // <--- Điền Email của bạn
            $mail->Password   = 'uzwb jypt dpro tsnb';       // <--- Điền App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom('tungdc.24it@vku.udn.vn', 'ZONANIO');
            $mail->addAddress($toEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Mã xác nhận đổi mật khẩu';
            $mail->Body    = "
                <h3>Mã xác nhận của bạn là: <span style='color:red; font-size: 20px;'>$code</span></h3>
                <p>Mã này sẽ hết hạn sau 15 phút.</p>
            ";

            $mail->send();
        } catch (Exception $e) {
            // Xử lý lỗi nếu cần
        }
    }

    // 3. Trang nhập Mã OTP (Bước 2)
    public function verifyCodePage()
    {
        // Nếu chưa nhập email thì đá về trang quên mật khẩu
        if (!isset($_SESSION['reset_email'])) {
            header("Location: forgot_password");
            exit();
        }
        require_once(__DIR__ . "/../view/VerifyCode.php");
    }

    // 4. Xử lý kiểm tra Mã OTP
    public function submitVerifyCode()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $code = $_POST['otp_code'];
            $email = $_SESSION['reset_email'];

            $user = $this->userModel->verifyCode($email, $code);

            if ($user) {
                // Mã đúng -> Đánh dấu đã xác thực thành công
                $_SESSION['allow_reset_pass'] = true;

                header("Location: reset_password");
                exit();
            } else {
                $error = "Mã xác nhận không đúng hoặc đã hết hạn!";
                require_once(__DIR__ . "/../view/VerifyCode.php");
            }
        }
    }

    // 5. Trang Đổi mật khẩu mới (Bước 3)
    public function resetPasswordPage()
    {
        // Kiểm tra xem đã xác thực mã chưa, chưa thì không cho vào
        if (!isset($_SESSION['allow_reset_pass']) || !$_SESSION['allow_reset_pass']) {
            header("Location: forgot_password");
            exit();
        }
        require_once(__DIR__ . "/../view/ResetPassword.php");
    }

    // 6. Xử lý lưu mật khẩu mới
    public function submitNewPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];
            $email = $_SESSION['reset_email'];

            if ($password !== $confirm) {
                $error = "Mật khẩu xác nhận không khớp!";
                require_once(__DIR__ . "/../view/ResetPassword.php");
                return;
            }

            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $this->userModel->updatePasswordByEmail($email, $passHash);

            // Xóa hết session tạm
            unset($_SESSION['reset_email']);
            unset($_SESSION['allow_reset_pass']);

            header("Location: login");
            exit();
        }
    }



    // 1. Hiển thị trang Hồ sơ của tôi
    public function myAccountPage()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit();
        }

        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($userId);

        require_once(__DIR__ . "/../view/user/MyAccount.php");
    }

    public function updateProfile()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'];
            $fullname = $_POST['FullNameUser'];
            $phone = $_POST['PhoneNumberUser'];
            $email = $_POST['EmailUser'];
            $address = $_POST['AddressUser'];
            $birthday = $_POST['BirthDay'];
            $gender = $_POST['GenderUser'];

            // --- XỬ LÝ UPLOAD ẢNH ---
            $avatarName = null; // Mặc định là null (không đổi ảnh)

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $filename = $_FILES['avatar']['name'];
                $filetype = $_FILES['avatar']['type'];
                $filesize = $_FILES['avatar']['size'];

                // Lấy đuôi file
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                // Kiểm tra đuôi file và kích thước (ví dụ < 5MB)
                if (in_array($ext, $allowed) && $filesize < 5000000) {
                    // Đặt tên file mới để tránh trùng: time_tên_gốc
                    $newFilename = time() . "_" . $filename;

                    // Đường dẫn lưu file: đi ra khỏi controller/user -> vào frontend/img/avatars
                    $uploadDir = __DIR__ . "/../../frontend/img/avatars/";

                    // Tạo thư mục nếu chưa có
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Di chuyển file
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadDir . $newFilename)) {
                        $avatarName = $newFilename; // Gán tên file để lưu vào DB

                        // Cập nhật session avatar luôn để hiển thị ngay (nếu cần)
                        $_SESSION['user_avatar'] = $newFilename;
                    }
                }
            }
            // --- KẾT THÚC XỬ LÝ ẢNH ---

            $result = $this->userModel->updateUserInfo($userId, $fullname, $phone, $email, $address, $birthday, $gender, $avatarName);

            if ($result) {
                $_SESSION['user_name'] = $fullname;
                $_SESSION['user_phone'] = $phone;
                header("Location: my_account&msg=updated");
            } else {
                header("Location: my_account&msg=error");
            }
        }
    }

    public function run()
    {
        $action = $_GET['url'] ?? 'home';

        switch ($action) {
            case 'forgot_password':
                $this->forgotPasswordPage();
                break;
            case 'send_reset_code':   // <--- Sửa tên action này
                $this->sendResetCode();
                break;
            case 'verify_code':       // <--- Mới
                $this->verifyCodePage();
                break;
            case 'submit_verify_code': // <--- Mới
                $this->submitVerifyCode();
                break;
            case 'reset_password':
                $this->resetPasswordPage();
                break;
            case 'submit_new_password':
                $this->submitNewPassword();
                break;
            case 'my_account':         // <--- Mới
                $this->myAccountPage();
                break;
            case 'update_profile':     // <--- Mới
                $this->updateProfile();
                break;
            case 'contact':
                $this->contact();
                break;
            case 'aboutus':
                $this->aboutUs();
                break;
            case 'my_orders':
                $this->orderController->myOrders();
                break;
            case 'order_detail':
                $this->orderController->orderDetail();
                break;
            case 'place_order':  // Optional, phòng trường hợp bạn muốn route riêng
                $this->orderController->placeOrder();
                break;
            case 'checkout':
                $this->checkOut();
                break;
            case 'add_to_cart':
                $this->cartController->addToCart();
                break;
            case 'cart':
                $this->cartController->viewCart();
                break;
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
                header("Location: home");
                break;
        }
    }
}
