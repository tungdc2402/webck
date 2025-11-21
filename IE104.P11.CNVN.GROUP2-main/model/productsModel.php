<?php
include("connect.php");
class productsModel {
    public function getAllProducts(){
        include("connect.php");
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

     public function get10LatestProducts(){
        include("connect.php");
        $sql = "SELECT * FROM products
        ORDER BY IDProduct
        DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
?>