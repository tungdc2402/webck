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

    public function searchProducts($keyword){
        include("connect.php");
        $safe_keyword = mysqli_real_escape_string($conn, $keyword);
        $sql = "SELECT * FROM products WHERE NameProduct LIKE '%$safe_keyword%'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
?>