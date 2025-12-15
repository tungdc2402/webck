<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
    <link rel="icon" type="image/png" href="../frontend/img/letter-z.png">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../frontend/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <base href="/DACS2/ShopDienTu/backend/">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    </head>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../frontend/css/grid.css" />
    <link rel="stylesheet" href="../frontend/css/base.css" />
    <link rel="stylesheet" href="../frontend/css/main.css" />
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <base href="/DACS2/ShopDienTu/backend/">
    <!-- Custom CSS -->
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
                        <li class="active"><a href="shoppage">Cửa hàng</a></li>
                        <li><a href="aboutus">Giới thiệu</a></li>
                        <li><a href="contact">Liên hệ</a></li>
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
                        <h2><b>Danh mục sản phẩm</b></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php while ($row = mysqli_fetch_array($products)) { ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="../frontend/img/<?php echo $row['ImageUrlProduct'] ?>" class="rounded product-img" alt="Hình ảnh sản phẩm">
                            </div>
                            <h2><a href=""><?php echo htmlspecialchars($row['NameProduct']); ?></a></h2>
                            <div class="product-carousel-price">
                                <ins>$99.00</ins> <del>$200.00</del>
                            </div>
                            <div class="product-option-shop">
                                <form action='index.php?url=add_to_cart' method='POST' style='margin: 0; padding: 0;'>

                                    <input type='hidden' name='product_id' value='<?php echo $row['IDProduct']; ?>'>

                                    <button type='submit' class='add_to_cart_button'>
                                        Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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