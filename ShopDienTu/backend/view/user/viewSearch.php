<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kết quả tìm kiếm</title>

    <!-- CSS -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <base href="/DACS2/ShopDienTu/backend/">
    <link rel="stylesheet" href="../frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">

    <style>
        .search-area-advanced {
            background: #f4f4f4;
            padding: 30px 0;
            margin-bottom: 30px;
        }
        .search-form-wrap {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .search-form-wrap input, .search-form-wrap select {
            height: 40px;
            padding: 5px 10px;
            border: 1px solid #ddd;
        }
        .search-form-wrap button {
            background: #5a88ca;
            color: #fff;
            border: none;
            padding: 0 20px;
            font-weight: bold;
        }
        /* CSS sửa lỗi lệch khung sản phẩm */
        .single-product {
            margin-bottom: 30px;
            overflow: hidden;
        }
        .product-f-image img {
            height: 250px; /* Cố định chiều cao ảnh */
            width: 100%;
            object-fit: cover; /* Giữ ảnh không bị méo */
            transition: all 0.3s;
        }
    </style>
</head>

<body>
<!-- Main Menu -->
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
                    <li><a href="aboutus">Giới thiệu</a></li>
                    <li><a href="contact">Liên hệ</a></li>
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
                    <h2>Kết quả tìm kiếm</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Khu vực Form tìm kiếm nâng cao -->
<div class="search-area-advanced">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="index.php" method="GET" class="search-form-wrap">
                    <input type="hidden" name="url" value="search">

                    <!-- Input từ khóa -->
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..."
                           value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" style="width: 40%;">

                    <!-- Select Danh mục -->
                    <select name="cat_id" style="width: 20%;">
                        <option value="0">-- Tất cả danh mục --</option>
                        <?php if(isset($categories)): ?>
                            <?php while ($cat = mysqli_fetch_array($categories)): ?>
                                <option value="<?php echo $cat['IDCategory']; ?>"
                                    <?php if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat['IDCategory']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($cat['NameCategory']); ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>

                    <button type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Khu vực hiển thị kết quả -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php
            if (isset($products) && mysqli_num_rows($products) > 0):
                while ($row = mysqli_fetch_array($products)):
                    // Tính toán giá
                    $gia_goc = $row['PriceProduct'];
                    $giam    = isset($row['Discount']) ? (int)$row['Discount'] : 0;
                    $gia_moi = $gia_goc * (100 - $giam) / 100;
                    ?>

                    <!-- Bắt đầu chỉnh sửa: Dùng cấu trúc của Home Page -->
                    <div class="col-md-3 col-sm-6">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="../frontend/img/<?php echo htmlspecialchars($row['ImageUrlProduct']); ?>" alt="">

                                <!-- Phần Hover chứa 2 nút -->
                                <div class="product-hover">
                                    <a href="add_to_cart&id=<?php echo $row['IDProduct']; ?>" class="add-to-cart-link">
                                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                    </a>
                                    <a href="detail&id=<?php echo $row['IDProduct']; ?>" class="view-details-link">
                                        <i class="fa fa-link"></i> Xem chi tiết
                                    </a>
                                </div>
                            </div>

                            <h2><a href="detail&id=<?php echo $row['IDProduct']; ?>"><?php echo htmlspecialchars($row['NameProduct']); ?></a></h2>

                            <div class="product-carousel-price">
                                <ins><?php echo number_format($gia_moi); ?> VNĐ</ins>
                                <?php if($giam > 0): ?>
                                    <del><?php echo number_format($gia_goc); ?> VNĐ</del>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Kết thúc chỉnh sửa -->

                <?php
                endwhile;
            else:
                ?>
                <div class="col-md-12 text-center" style="padding: 50px;">
                    <h3>Không tìm thấy sản phẩm nào!</h3>
                    <p>Vui lòng thử lại với từ khóa khác hoặc chọn danh mục khác.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Footer Area -->
<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>Zo<span>nanio</span></h2>
                    <p>Website bán hàng điện tử chuyên nghiệp.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="../frontend/js/owl.carousel.min.js"></script>
<script src="../frontend/js/jquery.sticky.js"></script>
<script src="../frontend/js/main.js"></script>
</body>
</html>