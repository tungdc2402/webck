<?php
include("connect.php");

class ordersModel
{
    public function createOrder($data)
    {
        global $conn;
        $orderCode = "ORD" . time() . rand(10, 99);

        $sql = "INSERT INTO orders 
                (OrderCode, FullNameUser, Phone, Province, Ward, AddressDetail, Note, 
                 IDUser, TotalAmountOrder, ShippingAddressOrder, PaymentMethodOrder, StatusOrder)
                VALUES 
                ('$orderCode', '{$data['fullName']}', '{$data['phone']}', '{$data['province']}', 
                 '{$data['ward']}', '{$data['addressDetail']}', '{$data['note']}', 
                 '{$data['userId']}', '{$data['total']}', '{$data['fullAddress']}', 
                 '{$data['payment']}', 'Chờ xác nhận')";

        if (mysqli_query($conn, $sql)) {
            return mysqli_insert_id($conn);
        }
        return false;
    }

    public function getOrdersByUser($userId)
    {
        global $conn;
        $userId = mysqli_real_escape_string($conn, $userId);
        $sql = "SELECT * FROM orders WHERE IDUser = '$userId' ORDER BY OrderDateOrder DESC";
        $result = mysqli_query($conn, $sql);
        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        return $orders;
    }

    public function getAllOrders()
    {
        global $conn;
        $sql = "SELECT o.*, u.FullNameUser as CustomerName FROM orders o 
                JOIN users u ON o.IDUser = u.IDUser 
                ORDER BY o.OrderDateOrder DESC";
        $result = mysqli_query($conn, $sql);
        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        return $orders;
    }

    public function getOrderById($id)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM orders WHERE IDOrder = '$id'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function updateStatus($id, $status)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $status = mysqli_real_escape_string($conn, $status);
        $sql = "UPDATE orders SET StatusOrder = '$status' WHERE IDOrder = '$id'";
        return mysqli_query($conn, $sql);
    }
}
