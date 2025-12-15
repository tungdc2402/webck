<?php
include("connect.php");
class productsModel
{
    public function getAllProducts()
    {
        include("connect.php");
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function get10LatestProducts()
    {
        include("connect.php");
        $sql = "SELECT * FROM products
        ORDER BY IDProduct
        DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function searchProducts($keyword)
    {
        include("connect.php");
        $safe_keyword = mysqli_real_escape_string($conn, $keyword);
        $sql = "SELECT * FROM products WHERE NameProduct LIKE '%$safe_keyword%'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function getProductById($id)
    {
        include("connect.php");
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM products WHERE IDProduct = '$id'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_array($result);
    }

    public function insertProduct($name, $price, $stock, $desc, $image, $category)
    {
        include("connect.php");
        $sql = "INSERT INTO products (NameProduct, PriceProduct, StockQuantityProduct, DescriptionProduct, ImageUrlProduct, IDCategory) 
                VALUES ('$name', '$price', '$stock', '$desc', '$image', '$category')";
        return mysqli_query($conn, $sql);
    }

    public function updateProduct($id, $name, $price, $stock, $desc, $image, $category)
    {
        include("connect.php");
        if ($image != "") {
            $sql = "UPDATE products SET 
                    NameProduct='$name', PriceProduct='$price', StockQuantityProduct='$stock', 
                    DescriptionProduct='$desc', ImageUrlProduct='$image', IDCategory='$category' 
                    WHERE IDProduct='$id'";
        } else {
            $sql = "UPDATE products SET 
                    NameProduct='$name', PriceProduct='$price', StockQuantityProduct='$stock', 
                    DescriptionProduct='$desc', IDCategory='$category' 
                    WHERE IDProduct='$id'";
        }
        return mysqli_query($conn, $sql);
    }

    public function deleteProduct($id)
    {
        include("connect.php");
        $sql = "DELETE FROM products WHERE IDProduct = '$id'";
        return mysqli_query($conn, $sql);
    }

    public function getReviewsByProductId($id)
    {
        include("connect.php");
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM reviews WHERE IDProduct = '$id' ORDER BY IDReview DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function insertReview($idProduct, $name, $email, $rating, $content)
    {
        include("connect.php");
        $idProduct = mysqli_real_escape_string($conn, $idProduct);
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $rating = (int)$rating;
        $content = mysqli_real_escape_string($conn, $content);

        $sql = "INSERT INTO reviews (IDProduct, NameComment, EmailComment, Rating, Content) 
                VALUES ('$idProduct', '$name', '$email', '$rating', '$content')";
        return mysqli_query($conn, $sql);
    }
    public function decreaseStock($productId, $quantity)
    {
        global $conn;
        $productId = mysqli_real_escape_string($conn, $productId);
        $quantity = mysqli_real_escape_string($conn, $quantity);
        $sql = "UPDATE products SET QuantityProduct = QuantityProduct - $quantity WHERE IDProduct = '$productId'";
        return mysqli_query($conn, $sql);
    }

    public function increaseSold($productId, $quantity)
    {
        global $conn;
        $productId = mysqli_real_escape_string($conn, $productId);
        $quantity = (int)$quantity; // Đảm bảo là số nguyên
        $sql = "UPDATE products SET Sold = Sold + $quantity WHERE IDProduct = '$productId'";
        return mysqli_query($conn, $sql);
    }
    public function getAllReviews()
    {
        include("connect.php");
        $sql = "SELECT r.*, p.NameProduct, p.ImageUrlProduct 
                FROM reviews r 
                INNER JOIN products p ON r.IDProduct = p.IDProduct 
                ORDER BY r.IDReview DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function deleteReview($id)
    {
        include("connect.php");
        $id = (int)$id;
        $sql = "DELETE FROM reviews WHERE IDReview = '$id'";
        return mysqli_query($conn, $sql);
    }
    public function getProductsByCategory($idCat)
    {
        include("connect.php");
        $sql = "SELECT * FROM products WHERE IDCategory = '$idCat'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
