<?php
require_once 'connect.php';
require_once 'Users.php';

class UserModel
{
    public function insertUser($FullNameUser, $BirthDay, $PhoneNumberUser, $EmailUser, $PasswordHashUser)
    {
        include("connect.php");
        $sql = "INSERT INTO users (FullNameUser, BirthDay, PhoneNumberUser, EmailUser, PasswordHashUser) 
                VALUES ('$FullNameUser', '$BirthDay', '$PhoneNumberUser', '$EmailUser', '$PasswordHashUser')";
        return mysqli_query($conn, $sql);
    }

    public function getUserByPhone($phone)
    {
        include("connect.php");
        $safe_phone = mysqli_real_escape_string($conn, $phone);
        $sql = "SELECT * FROM users WHERE PhoneNumberUser = '$safe_phone' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_array($result);
    }

    public function checkPhoneExists($phone)
    {
        include("connect.php");
        $safe_phone = mysqli_real_escape_string($conn, $phone);

        $sql = "SELECT IDUser FROM users WHERE PhoneNumberUser = '$safe_phone'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    // 1. Kiểm tra email có tồn tại không
    public function getUserByEmail($email)
    {
        include("connect.php");
        $safe_email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE EmailUser = '$safe_email' LIMIT 1";
        return mysqli_fetch_array(mysqli_query($conn, $sql));
    }

    // 2. Lưu Mã OTP (6 số) vào DB
    public function updateResetCode($email, $code)
    {
        include("connect.php");
        $safe_email = mysqli_real_escape_string($conn, $email);
        // Mã hết hạn sau 15 phút
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expire = date("Y-m-d H:i:s", time() + (15 * 60));

        $sql = "UPDATE users SET reset_token = '$code', reset_token_expire = '$expire' WHERE EmailUser = '$safe_email'";
        return mysqli_query($conn, $sql);
    }

    // 3. Kiểm tra Mã OTP có đúng và còn hạn không
    public function verifyCode($email, $code)
    {
        include("connect.php");
        $safe_email = mysqli_real_escape_string($conn, $email);
        $safe_code = mysqli_real_escape_string($conn, $code);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM users WHERE EmailUser = '$safe_email' AND reset_token = '$safe_code' AND reset_token_expire > '$now' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_array($result);
    }

    // 4. Đổi mật khẩu và xóa mã
    public function updatePasswordByEmail($email, $newPass)
    {
        include("connect.php");
        $safe_email = mysqli_real_escape_string($conn, $email);

        $sql = "UPDATE users SET PasswordHashUser = '$newPass', reset_token = NULL, reset_token_expire = NULL WHERE EmailUser = '$safe_email'";
        return mysqli_query($conn, $sql);
    }

    // Lấy thông tin user theo ID (dùng cho trang Profile)
    public function getUserById($userId)
    {
        include("connect.php");
        $sql = "SELECT * FROM users WHERE IDUser = $userId";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_array($result);
    }

    // Cập nhật thông tin cá nhân (Thêm tham số $avatar)
    public function updateUserInfo($userId, $fullname, $phone, $email, $address, $birthday, $gender, $avatar = null)
    {
        include("connect.php");

        $fullname = mysqli_real_escape_string($conn, $fullname);
        $phone = mysqli_real_escape_string($conn, $phone);
        $email = mysqli_real_escape_string($conn, $email);
        $address = mysqli_real_escape_string($conn, $address);
        $birthday = mysqli_real_escape_string($conn, $birthday);

        // Logic: Nếu có up ảnh mới ($avatar không null) thì cập nhật cột AvatarUser
        // Nếu không up ảnh ($avatar là null) thì giữ nguyên ảnh cũ
        if ($avatar != null) {
            $avatarSql = ", AvatarUser = '$avatar'";
        } else {
            $avatarSql = ""; // Không làm gì cả
        }

        $sql = "UPDATE users 
                SET FullNameUser = '$fullname', 
                    PhoneNumberUser = '$phone', 
                    EmailUser = '$email', 
                    AddressUser = '$address', 
                    BirthDay = '$birthday',
                    GenderUser = '$gender'
                    $avatarSql
                WHERE IDUser = $userId";

        return mysqli_query($conn, $sql);
    }
}
