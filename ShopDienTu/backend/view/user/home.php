<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
                            <li><a href="cart"><i class="fa fa-user"></i> Giỏ Hàng</a></li>
                            <li><a href="checkout"><i class="fa fa-user"></i> Thanh Toán</a></li>
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
                    <div class="cart">
                        <a href="cart"><i class="fa fa-shopping-cart" style="font-size:30px;color:red"></i></a>
                    </div>

                    <div class="auth-buttons" style="display: flex; align-items: center; gap: 10px;">
                        <?php if (isset($_SESSION['user_name'])): ?>

                            <div class="user-info">
                                <!-- Thêm thẻ A bao quanh để click được -->
                                <a href="my_account" style="text-decoration: none; color: #333; font-weight: 600; display: flex; align-items: center; gap: 5px;" title="Cập nhật thông tin">

                                    <?php
                                    // 1. Lấy tên ảnh từ Session
                                    $avatarName = $_SESSION['user_avatar'] ?? '';

                                    // 2. Đường dẫn ảnh
                                    $avatarPath = "../frontend/img/avatars/" . $avatarName;

                                    // 3. Kiểm tra và hiển thị
                                    if (!empty($avatarName) && file_exists(__DIR__ . "/../frontend/img/avatars/" . $avatarName)) {
                                        echo '<img src="' . $avatarPath . '" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; border: 1px solid #d70018;">';
                                    } else {
                                        echo '<i class="fa fa-user" style="color: #d70018; font-size: 20px;"></i>';
                                    }
                                    ?>

                                    <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                                </a>
                            </div>
                            <a href="logout" class="btn-auth" style="background: #555; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 14px;">
                                Đăng xuất
                            </a>

                        <?php else: ?>

                            <a href="login" class="btn-auth btn-login">Đăng nhập</a>
                            <a href="register" class="btn-auth btn-register">Đăng ký</a>

                        <?php endif; ?>
                    </div>
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
                        <li class="active">
                            <a href="home">Trang chủ</a>
                        </li>
                        <li><a href="shoppage">Cửa hàng</a></li>
                        <li><a href="aboutus">Giới thiệu</a></li>
                        <li><a href="contact">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <a href="shop.html">
                        <img src="../frontend/img/h4-slide.png" alt="Slide">
                    </a>
                </li>
                <li>
                    <a href="shop.html">
                        <img src="../frontend/img/h4-slide2.png" alt="Slide">
                    </a>
                </li>
                <li>
                    <a href="shop.html">
                        <img src="../frontend/img/h4-slide3.png" alt="Slide">
                    </a>
                </li>
                <li>
                    <a href="shop.html">
                        <img src="../frontend/img/h4-slide4.png" alt="Slide">
                    </a>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Ngày Đổi Trả</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Miễn Phí Giao Hàng</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Thanh Toán Bảo Mật</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Cam Kết Hàng Mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    <!-- hiển thị sản phẩm mới nhất -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản Phẩm Mới Nhất</h2>
                        <div class="product-carousel">

                            <?php while ($row = mysqli_fetch_array($products)):
                                // Tính giá sau giảm
                                $gia_goc = $row['PriceProduct'];
                                $giam    = isset($row['Discount']) ? (int)$row['Discount'] : 0;
                                $gia_moi = $gia_goc * (100 - $giam) / 100;
                            ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="../frontend/img/<?php echo htmlspecialchars($row['ImageUrlProduct']); ?>" alt="" class="product-img">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a>
                                            <a href="detail&id=<?php echo $row['IDProduct']; ?>" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                        </div>
                                    </div>

                                    <h2>
                                        <a href="detail&id=<?php echo $row['IDProduct']; ?>">
                                            <?php echo htmlspecialchars($row['NameProduct']); ?>
                                        </a>
                                    </h2>

                                    <div class="product-carousel-price">
                                        <ins>$<?php echo number_format($gia_moi); ?></ins>
                                        <?php if ($giam > 0): ?>
                                            <del>$<?php echo number_format($gia_goc); ?></del>
                                        <?php endif; ?>

                                        <?php if ($giam > 0): ?>
                                            <span class="onsale">-<?php echo $giam; ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Latest Products -->>



    <div class="product-category-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Danh mục nổi bật</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=laptop" class="cat-item">
                        <div class="cat-text">Laptop</div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=pc" class="cat-item">
                        <div class="cat-text">PC Gaming</div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=cpu" class="cat-item">
                        <div class="cat-text">Phụ Kiện</div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=vga" class="cat-item">
                        <div class="cat-text">TV-Điện Máy</div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=mainboard" class="cat-item">
                        <div class="cat-text">Đồng Hồ</div>
                    </a>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <a href="shop&cat=phukien" class="cat-item">
                        <div class="cat-text">Hàng Cũ</div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="product-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bán Chạy</h2>
                        <a href="" class="wid-view-more">Xem Tất Cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Mainboard Gigabyte AORUS Z890</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case ASUS A21 micro-ATX 3FA</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$199.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Mục Vừa Xem</h2>
                        <a href="#" class="wid-view-more">Xem Tất Cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Corsair NAUTILUS 240 ARGB</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>

                            </div>
                            <div class="product-wid-price">
                                <ins>$100.00</ins> <del>$125.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Mainboard Gigabyte AORUS Z890</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Nổi Bật</h2>
                        <a href="#" class="wid-view-more">Xem Tất Cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case ASUS A21 micro-ATX 3FA</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$199.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Corsair NAUTILUS 240 ARGB</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>

                            </div>
                            <div class="product-wid-price">
                                <ins>$100.00</ins> <del>$125.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="../frontend/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

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