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
    public function getProductsByFilter($start, $limit, $catId = 0)
    {
        include("connect.php");
        $sql = "SELECT * FROM products";
        // Nếu có catId thì thêm WHERE, không thì lấy hết
        if ($catId > 0) {
            $sql .= " WHERE IDCategory = " . (int)$catId;
        }
        $sql .= " ORDER BY IDProduct DESC LIMIT $start, $limit";
        return mysqli_query($conn, $sql);
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

    public function searchProducts($keyword, $categoryId = 0)
    {
        include("connect.php");
        $safe_keyword = mysqli_real_escape_string($conn, $keyword);

        $sql = "SELECT * FROM products WHERE NameProduct LIKE '%$safe_keyword%'";

        // Nếu có chọn danh mục (ID > 0) thì thêm điều kiện AND
        if ($categoryId > 0) {
            $safe_catId = (int)$categoryId;
            $sql .= " AND IDCategory = '$safe_catId'";
        }

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
    public function countTotalProducts($catId = 0)
    {
        include("connect.php");
        $sql = "SELECT COUNT(*) as total FROM products";
        if ($catId > 0) {
            $sql .= " WHERE IDCategory = " . (int)$catId;
        }
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row['total'];
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
    // Thêm vào cuối class productsModel (trước dấu } cuối cùng)
    public function getTopSellingProducts($limit = 3)
    {
        include("connect.php");
        $limit = (int)$limit;
        $sql = "SELECT IDProduct, NameProduct, PriceProduct, Discount, ImageUrlProduct, Sold
            FROM products
            WHERE IsActiveProduct = 1
            ORDER BY Sold DESC
            LIMIT $limit";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    // Thêm vào cuối class productsModel (trước dấu } cuối cùng)

    public function getMostReviewedProducts($limit = 3)
    {
        include("connect.php");
        $limit = (int)$limit;
        $sql = "SELECT p.IDProduct, p.NameProduct, p.PriceProduct, p.Discount, p.ImageUrlProduct,
                   COUNT(r.IDReview) AS review_count
            FROM products p
            LEFT JOIN reviews r ON p.IDProduct = r.IDProduct
            WHERE p.IsActiveProduct = 1
            GROUP BY p.IDProduct
            ORDER BY review_count DESC
            LIMIT $limit";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function updateDiscount($id, $discount)
    {
        include("connect.php");

        $id = (int)$id;
        $discount = (int)$discount;

        $sql = "UPDATE products 
            SET Discount = $discount 
            WHERE IDProduct = $id";

        $result = mysqli_query($conn, $sql);

        // Trả về true nếu update thành công, false nếu thất bại
        return $result !== false;
    }
}
