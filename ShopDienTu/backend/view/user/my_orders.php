<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đơn Hàng</title>
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
    <style>
        .container2 {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            color: #333;
            vertical-align: middle;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        /* Định dạng giá tiền */
        .price {
            font-weight: bold;
            color: #d63031;
        }

        /* Định dạng nút xem chi tiết */
        .btn-view {
            text-decoration: none;
            color: #0984e3;
            font-weight: 500;
            border: 1px solid #0984e3;
            padding: 6px 12px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .btn-view:hover {
            background-color: #0984e3;
            color: #fff;
        }

        /* Badge trạng thái */
        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        /* Chờ xác nhận */
        .status-processing {
            background-color: #cce5ff;
            color: #004085;
        }

        /* Đang chuẩn bị hàng */
        .status-shipping {
            background-color: #e0cffc;
            color: #3d0096;
        }

        /* Đang giao */
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        /* Hoàn thành/Giao thành công */
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Đã hủy */

        .empty-order {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>
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
                        <li class="active"><a href="my_orders">Đơn Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="container2">
        <h2>Đơn hàng của tôi</h2>

        <div class="table-responsive">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $o):
                            // Xử lý class màu sắc dựa trên text trong database của bạn
                            $statusClass = '';
                            $statusText = trim($o['StatusOrder']);

                            switch ($statusText) {
                                case 'Chờ xác nhận':
                                    $statusClass = 'status-pending';
                                    break;
                                case 'Đang chuẩn bị hàng': // Dựa trên hình ảnh DB dòng 1-9
                                    $statusClass = 'status-processing';
                                    break;
                                case 'Đang giao hàng':
                                    $statusClass = 'status-shipping';
                                    break;
                                case 'Giao hàng thành công':
                                case 'Hoàn thành':
                                    $statusClass = 'status-completed';
                                    break;
                                case 'Đã hủy':
                                    $statusClass = 'status-cancelled';
                                    break;
                                default:
                                    $statusClass = 'status-pending'; // Mặc định
                            }
                        ?>
                            <tr>
                                <td><strong>#<?= htmlspecialchars($o['OrderCode']) ?></strong></td>

                                <!-- Format ngày tháng -->
                                <td><?= date('d/m/Y H:i', strtotime($o['OrderDateOrder'])) ?></td>

                                <!-- Format tiền tệ -->
                                <td class="price"><?= number_format($o['TotalAmountOrder'], 0, ',', '.') ?>đ</td>

                                <td style="text-transform: capitalize;"><?= htmlspecialchars($o['PaymentMethodOrder']) ?></td>

                                <!-- Badge trạng thái -->
                                <td>
                                    <span class="badge <?= $statusClass ?>">
                                        <?= htmlspecialchars($o['StatusOrder']) ?>
                                    </span>
                                </td>

                                <td>
                                    <a href="index.php?url=order_detail&id=<?= $o['IDOrder'] ?>" class="btn-view">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="empty-order">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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