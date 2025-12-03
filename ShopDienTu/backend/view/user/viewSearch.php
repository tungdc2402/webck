<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">
</head>

<body>
    <a href="index.php">back</a>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Kết quả tìm kiếm cho: "<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($products) > 0) {
                    while ($row = mysqli_fetch_array($products)) {
                ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="../frontend/img/product-2.jpg" alt="">
                                </div>
                                <h2><a href="single-product.html"><?php echo htmlspecialchars($row['NameProduct']); ?></a></h2>
                                <div class="product-carousel-price">
                                    <ins>$899.00</ins> <del>$999.00</del>
                                </div>

                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="col-md-12 text-center" style="padding: 50px 0;">';
                    echo '<h3>Rất tiếc, không tìm thấy sản phẩm nào phù hợp haha.</h3>';
                    echo '<p>Hãy thử tìm với từ khóa khác xem sao?</p>';
                    echo '<a href="index.php" class="btn btn-primary">Quay về trang chủ</a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>

</body>

</html>