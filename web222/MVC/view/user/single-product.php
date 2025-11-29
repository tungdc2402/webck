<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($product['NameProduct']); ?> - Product Details</title> <link rel="icon" type="image/png" href="img/logo.png">

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?url=home">Home</a></li>
                    <li><a href="index.php?url=shoppage">Shop page</a></li>
                    <li><a href="cart.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><b><?php echo htmlspecialchars($product['NameProduct']); ?></b></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="index.php" method="GET">
                        <input type="hidden" name="url" value="search">
                        <input type="text" name="keyword" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="#">Case MIK BARBATOS</a></li>
                        <li><a href="#">Case ASUS A21 micro-ATX 3FA</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="index.php?url=shoppage">Products list</a>
                        <a href=""><?php echo htmlspecialchars($product['NameProduct']); ?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="img/<?php echo htmlspecialchars($product['ImageUrlProduct']); ?>" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo htmlspecialchars($product['NameProduct']); ?></h2>
                                <div class="product-inner-price">
                                    <ins>$<?php echo htmlspecialchars($product['PriceProduct']); ?></ins>
                                </div>

                                <?php if (isset($_SESSION['user_name'])): ?>
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                <?php else: ?>
                                    <div class="cart">
                                        <a href="index.php?url=login" class="add_to_cart_button" style="text-decoration: none; display: inline-block; text-align: center; line-height: 40px;">
                                            <i class="fa fa-lock"></i> Đăng nhập để mua hàng
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="product-inner-category">
                                    <p>Category ID: <a href=""><?php echo htmlspecialchars($product['IDCategory']); ?></a></p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p><?php echo nl2br(htmlspecialchars($product['DescriptionProduct'])); ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>

                                            <div class="review-list" style="margin-bottom: 30px;">
                                                <?php
                                                if (isset($reviews) && mysqli_num_rows($reviews) > 0) {
                                                    while ($rowReview = mysqli_fetch_array($reviews)) {
                                                        ?>
                                                        <div class="single-review" style="border-bottom: 1px solid #ddd; padding: 10px 0;">
                                                            <p>
                                                                <strong><?php echo htmlspecialchars($rowReview['NameComment']); ?></strong> -
                                                                <span style="color: #888; font-size: 12px;"><?php echo date('d/m/Y', strtotime($rowReview['DateComment'])); ?></span>
                                                            </p>
                                                            <div class="review-rating" style="color: #ffc107;">
                                                                <?php
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    if ($i <= $rowReview['Rating']) {
                                                                        echo '<i class="fa fa-star"></i>';
                                                                    } else {
                                                                        echo '<i class="fa fa-star-o"></i>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <p><?php echo nl2br(htmlspecialchars($rowReview['Content'])); ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<p>Chưa có đánh giá nào. Hãy là người đầu tiên!</p>";
                                                }
                                                ?>
                                            </div>

                                            <div class="submit-review">
                                                <h3>Viết đánh giá của bạn</h3>

                                                <?php if (isset($_SESSION['user_name'])): ?>

                                                    <form action="index.php?url=submit_review" method="POST">
                                                        <input type="hidden" name="id_product" value="<?php echo $product['IDProduct']; ?>">

                                                        <p>
                                                            <label for="name">Tên hiển thị</label>
                                                            <input name="name" type="text" value="<?php echo $_SESSION['user_name']; ?>" required class="form-control">
                                                        </p>
                                                        <p><label for="email">Email</label> <input name="email" type="email" required class="form-control"></p>

                                                        <div class="rating-chooser" style="margin-bottom: 15px;">
                                                            <label>Đánh giá sao:</label>
                                                            <select name="rating" class="form-control" style="width: 200px;">
                                                                <option value="5">5 Sao - Tuyệt vời</option>
                                                                <option value="4">4 Sao - Tốt</option>
                                                                <option value="3">3 Sao - Bình thường</option>
                                                                <option value="2">2 Sao - Kém</option>
                                                                <option value="1">1 Sao - Tệ</option>
                                                            </select>
                                                        </div>

                                                        <p><label for="review">Nội dung đánh giá</label> <textarea name="review" id="" cols="30" rows="5" required class="form-control"></textarea></p>
                                                        <p><input type="submit" value="Gửi đánh giá" class="btn btn-primary"></input></p>
                                                    </form>

                                                <?php else: ?>

                                                    <div class="alert alert-warning">
                                                        Bạn cần <a href="index.php?url=login"><strong>Đăng nhập</strong></a> để gửi đánh giá cho sản phẩm này.
                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            <?php
                            // Reset pointer nếu đã dùng ở nơi khác hoặc loop qua biến relatedProducts
                            if ($relatedProducts) {
                                while($rowRel = mysqli_fetch_array($relatedProducts)) {
                                    ?>
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="img/<?php echo htmlspecialchars($rowRel['ImageUrlProduct']); ?>" alt="">
                                            <div class="product-hover">
                                                <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a href="index.php?url=detail&id=<?php echo $rowRel['IDProduct']; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                            </div>
                                        </div>

                                        <h2><a href="index.php?url=detail&id=<?php echo $rowRel['IDProduct']; ?>"><?php echo htmlspecialchars($rowRel['NameProduct']); ?></a></h2>

                                        <div class="product-carousel-price">
                                            <ins>$<?php echo htmlspecialchars($rowRel['PriceProduct']); ?></ins>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><p>&copy; 2024 IE104.</p></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.easing.1.3.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>