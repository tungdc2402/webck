<?php
// model/UserModel.php
require_once 'connect.php';
require_once 'Users.php';

class UserModel{
    public function insertUser($FullNameUser, $BirthDay, $PhoneNumberUser, $EmailUser, $PasswordHashUser) {
        include("connect.php");
        $sql = "INSERT INTO users (FullNameUser, BirthDay, PhoneNumberUser, EmailUser, PasswordHashUser) 
                VALUES ('$FullNameUser', '$BirthDay', '$PhoneNumberUser', '$EmailUser', '$PasswordHashUser')";
        return mysqli_query($conn, $sql);
    }

    public function getUserByPhone($phone) {
        include("connect.php");
        $safe_phone = mysqli_real_escape_string($conn, $phone);
        $sql = "SELECT * FROM users WHERE PhoneNumberUser = '$safe_phone' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_array($result);
    }

    public function checkPhoneExists($phone) {
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
}

?>