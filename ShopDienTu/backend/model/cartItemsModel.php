<?php
include("connect.php");
class cartItemsModel {
    public function addToCart($cartId, $productId, $quantity = 1) {
    include("connect.php");
    $safe_cartId = mysqli_real_escape_string($conn, $cartId);
    $safe_productId = mysqli_real_escape_string($conn, $productId);
    $safe_quantity = mysqli_real_escape_string($conn, $quantity);

    $sql = "SELECT QuantityCartItem FROM CartItems WHERE IDShoppingCart = '$safe_cartId' AND IDProduct = '$safe_productId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $newQty = $row['QuantityCartItem'] + $safe_quantity;
        $sql = "UPDATE CartItems SET QuantityCartItem = '$newQty' WHERE IDShoppingCart = '$safe_cartId' AND IDProduct = '$safe_productId'";
    } else {
        $sql = "INSERT INTO CartItems (IDShoppingCart, IDProduct, QuantityCartItem) VALUES ('$safe_cartId', '$safe_productId', '$safe_quantity')";
    }
    return mysqli_query($conn, $sql);
}
    public function getCartItems($cartId) {
    include("connect.php");
    $safe_cartId = mysqli_real_escape_string($conn, $cartId);
    $sql = "SELECT ci.IDProduct, ci.QuantityCartItem, p.NameProduct, p.PriceProduct
            FROM CartItems ci
            JOIN products p ON ci.IDProduct = p.IDProduct 
            WHERE ci.IDShoppingCart = '$safe_cartId'";
    $result = mysqli_query($conn, $sql);
    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    return $items;
}

    public function getCartCount($cartId) {
    include("connect.php");
    $safe_cartId = mysqli_real_escape_string($conn, $cartId);
    $sql = "SELECT SUM(QuantityCartItem) AS total FROM CartItems WHERE IDShoppingCart = '$safe_cartId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}
    public function removeFromCart($cartId, $productId) {
    include("connect.php");
    $safe_cartId = mysqli_real_escape_string($conn, $cartId);
    $safe_productId = mysqli_real_escape_string($conn, $productId);
    $sql = "DELETE FROM CartItems WHERE IDShoppingCart = '$safe_cartId' AND IDProduct = '$safe_productId'";
    return mysqli_query($conn, $sql);
}
    public function clearCart($cartId) {
    include("connect.php");
    $safe_cartId = mysqli_real_escape_string($conn, $cartId);
    $sql = "DELETE FROM CartItems WHERE IDShoppingCart = '$safe_cartId'";
    return mysqli_query($conn, $sql);
}
}
?>