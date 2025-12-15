<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($product['NameProduct']); ?> - Product Details</title>
    <link rel="icon" type="image/png" href="../frontend/img/letter-z.png">

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="../frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">
</head>

<body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="my_account.html"><i class="fa fa-user"></i> Tài Khoản</a></li>
                            <li><a href="404.html"><i class="fa fa-heart"></i> Yêu Thích</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> Giỏ Hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh Toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area1">
        <div class="container1">
            <div class="row1">
                <div class="header-left">
                    <div class="logo1">
                        <a href="./">
                            <img src="../frontend/img/logo.jpg" alt="Logo" />
                        </a>
                    </div>

                    <div class="search">
                        <form action="index.php" method="GET" style="display: flex;">
                            <input type="hidden" name="url" value="search">
                            <input type="text" name="keyword" placeholder="Tìm kiếm tại đây..." required
                                value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" />
                            <button style="background-color: #5cb85c; color: white; padding: 8px 16px; border: none; border-radius: 50px;">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="header-right">
                    <!-- <div class="col-sm-6"> -->
                    <div class="shopping-item">
                        <a href="cart.html">Cart<i class="fa fa-shopping-cart"></i> <span class="product-count">1</span></a>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="home">Trang chủ</a></li>
                        <li><a href="shoppage">Cửa hàng</a></li>
                        <li><a href="cart">Giỏ Hàng</a></li>
                        <li><a href="checkout">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

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
                        <h2 class="sidebar-title">TÌM KIẾM SẢN PHẨM</h2>
                        <form action="index.php" method="GET">
                            <input type="hidden" name="url" value="search">
                            <input type="text" name="keyword" placeholder="Tìm kiếm tại đây...">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Bài viết gần đây</h2>
                        <ul>
                            <li><a href="#">Case MIK BARBATOS</a></li>
                            <li><a href="#">Case ASUS A21 micro-ATX 3FA</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php?url=shoppage">Danh sách sản phẩm</a>
                            <a href=""><?php echo htmlspecialchars($product['NameProduct']); ?></a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="../frontend/img/<?php echo htmlspecialchars($product['ImageUrlProduct']); ?>" alt="">
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
                                            <button class="add_to_cart_button" type="submit">Thêm Giỏ Hàng</button>
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
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh Giá</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả sản phẩm</h2>
                                                <p><?php echo nl2br(htmlspecialchars($product['DescriptionProduct'])); ?></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Đánh giá</h2>

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
                            <h2 class="related-products-title">Sản Phẩm Liên Quan</h2>
                            <div class="related-products-carousel">
                                <?php
                                if ($relatedProducts) {
                                    while ($rowRel = mysqli_fetch_array($relatedProducts)) {
                                ?>
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="../frontend/img/<?php echo htmlspecialchars($rowRel['ImageUrlProduct']); ?>" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
                                                    <a href="index.php?url=detail&id=<?php echo $rowRel['IDProduct']; ?>" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
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
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Zo<span>nanio</span></h2>
                        <p>Trong thời đại hiện đại, sự tiện lợi và linh hoạt trong việc mua sắm trực tuyến ngày càng trở thành một xu hướng phổ biến. Đối với lĩnh vực điện tử, điện máy, việc tạo ra một website bán hàng chuyên nghiệp không chỉ là một cơ hội kinh doanh mà còn là cách để đáp ứng nhu cầu ngày càng cao của khách hàng.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Thanh điều hướng </h2>
                        <ul>
                            <li><a href="my_account.html">Tài khoản</a></li> <!-- filter -->
                            <li><a href="#">Lịch sử mua hàng</a></li> <!-- filter -->
                            <li><a href="#">Yêu thích</a></li> <!-- filter -->
                            <li><a href="#">Liên hệ</a></li> <!-- filter -->
                            <li><a href="index.html">Trang chủ</a></li> <!-- filter -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Danh mục</h2>
                        <ul>
                            <li><a href="shop.html">LAPTOP</a></li> <!-- filter -->
                            <li><a href="shop.html">Phụ Kiện </a></li> <!-- filter -->
                            <li><a href="shop.html">TV - Điện Máy</a></li> <!-- filter -->
                            <li><a href="shop.html">Đồng Hồ</a></li> <!-- filter -->
                            <li><a href="shop.html">Hàng Cũ</a></li> <!-- filter -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-feedback">
                        <h2 class="footer-wid-title">Phản hồi</h2>
                        <p>Vui lòng liên hệ với chúng tôi nếu bạn có bất kỳ thắc mắc, phản hồi hoặc cần hỗ trợ nào. Chúng tôi luôn sẵn lòng trợ giúp!</p>
                        <div class="feedback-form">
                            <form action="404.html">
                                <input type="email" placeholder="Nhập email...">
                                <input type="submit" value="ĐĂNG KÝ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; Zonanio. Bản quyền đã được bảo hộ. </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
    <!-- Latest jQuery form server -->

    <div class="floating-contact-wrap">

        <a href="https://zalo.me/0705955589" target="_blank" class="contact-btn btn-zalo">
            <span class="zalo-text">Z</span>
            <div class="contact-tooltip">Chat Zalo</div>
        </a>

        <a href="https://m.me/102803015947076" target="_blank" class="contact-btn btn-messenger">
            <svg viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.03 2 11C2 13.66 3.39 16.05 5.61 17.58L4.99 20.54C4.86 21.13 5.39 21.61 5.95 21.43L9.08 20.41C10.02 20.79 11 21 12 21C17.52 21 22 16.97 22 12C22 7.03 17.52 2 12 2ZM13.06 15.19L10.68 12.63L6.03 15.18C5.69 15.37 5.28 15 5.43 14.64L8.08 8.41C8.25 8.02 8.78 8.02 8.95 8.41L11.32 10.97L15.97 8.42C16.31 8.23 16.72 8.6 16.57 8.96L13.92 15.19C13.75 15.58 13.22 15.58 13.06 15.19Z" />
                </path>
            </svg>
            <div class="contact-tooltip">Chat Facebook</div>
        </a>

    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="../frontend/js/owl.carousel.min.js"></script>
    <script src="../frontend/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="../frontend/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="../frontend/js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="../frontend/js/bxslider.min.js"></script>
    <script type="text/javascript" src="../frontend/js/script.slider.js"></script>
</body>

</html>