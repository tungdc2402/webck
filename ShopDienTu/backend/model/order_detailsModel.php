<?php
require_once("connect.php");

class order_detailsModel
{
    public function addDetail($orderId, $productId, $name, $quantity, $price)
    {
        global $conn;
        $subtotal = $price * $quantity;

        $sql = "INSERT INTO order_details 
                (IDOrder, IDProduct, NameProduct, QuantityOrderDetail, UnitPriceOrderDetail, SubtotalOrderDetail)
                VALUES ('$orderId', '$productId', '$name', '$quantity', '$price', '$subtotal')";
        return mysqli_query($conn, $sql);
    }

    public function getDetailsByOrder($orderId)
    {
        global $conn;
        $orderId = mysqli_real_escape_string($conn, $orderId);
        $sql = "SELECT * FROM order_details WHERE IDOrder = '$orderId'";
        $result = mysqli_query($conn, $sql);
        $items = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
        return $items;
    }
}
