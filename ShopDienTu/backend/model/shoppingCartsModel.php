<?php
include("connect.php");
class shoppingCartsModel {
    public function getOrCreateCart($userId) {
    include("connect.php");
    $safe_userId = mysqli_real_escape_string($conn, $userId);
    $sql = "SELECT IDShoppingCart FROM ShoppingCarts WHERE IDUser = '$safe_userId' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['IDShoppingCart'];
    } else {
        $sql = "INSERT INTO ShoppingCarts (IDUser) VALUES ('$safe_userId')";
        mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }
    }
}
?>