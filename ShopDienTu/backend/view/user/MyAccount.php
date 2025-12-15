<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tài khoản của tôi</title>

    <!-- Copy CSS từ file index.php của bạn -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">

    <style>
        .profile-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .profile-title {
            font-size: 24px;
            font-weight: bold;
            color: #d70018;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .form-control {
            height: 45px;
            border-radius: 4px;
        }
        .btn-update {
            background: #d70018;
            color: #fff;
            padding: 10px 30px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            transition: 0.3s;
        }
        .btn-update:hover {
            background: #b30014;
            color: #fff;
        }
        .sidebar-menu li a {
            padding: 10px 15px;
            display: block;
            border-bottom: 1px solid #eee;
            color: #333;
            font-weight: 600;
        }
        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            background: #f8f9fa;
            color: #d70018;
        }
    </style>
</head>
<body>

<!-- HEADER AREA (Copy lại từ index.php hoặc include nếu đã tách file) -->
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="my_account"><i class="fa fa-user"></i> Tài Khoản</a></li>
                        <li><a href="cart"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                        <li><a href="checkout"><i class="fa fa-money"></i> Thanh Toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="home"><img src="../frontend/img/logo.png" style="max-height: 60px;"></a></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home">Trang chủ</a></li>
                    <li><a href="shop">Cửa hàng</a></li>
                    <li class="active"><a href="my_account">Tài khoản</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER AREA -->

<!-- MAIN CONTENT -->
<div class="single-product-area">
    <div class="container">
        <div class="row">

            <!-- Sidebar bên trái -->
            <div class="col-md-3">
                <div class="profile-container" style="padding: 15px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width: 80px; border-radius: 50%;">
                        <h4 style="margin-top: 10px;"><?php echo htmlspecialchars($user['FullNameUser']); ?></h4>
                    </div>
                    <ul class="sidebar-menu list-unstyled">
                        <li class="active"><a href="my_account"><i class="fa fa-user"></i> Thông tin tài khoản</a></li>
                        <li><a href="my_orders"><i class="fa fa-list-alt"></i> Đơn hàng của tôi</a></li>
                        <li><a href="logout"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

            <!-- Form cập nhật bên phải -->
            <div class="col-md-9">
                <div class="profile-container">
                    <h2 class="profile-title">Hồ Sơ Của Tôi</h2>

                    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'updated'): ?>
                        <div class="alert alert-success">Cập nhật thông tin thành công!</div>
                    <?php endif; ?>

                    <!-- QUAN TRỌNG: Thêm enctype="multipart/form-data" để gửi file -->
                    <form action="update_profile" method="POST" enctype="multipart/form-data">

                        <!-- Phần hiển thị và chọn Avatar -->
                        <div class="row" style="margin-bottom: 20px; display: flex; align-items: center;">
                            <div class="col-md-3 text-center">
                                <?php
                                // Kiểm tra xem user có avatar chưa, nếu chưa dùng ảnh mặc định
                                $avatarPath = "../frontend/img/avatars/" . ($user['AvatarUser'] ?? 'default.jpg');
                                // Nếu file không tồn tại thực tế thì dùng ảnh default của w3school hoặc ảnh mặc định
                                if (empty($user['AvatarUser']) || !file_exists(__DIR__ . "/../../frontend/img/avatars/" . $user['AvatarUser'])) {
                                    $displayAvatar = "https://www.w3schools.com/howto/img_avatar.png";
                                } else {
                                    $displayAvatar = $avatarPath;
                                }
                                ?>
                                <img src="<?php echo $displayAvatar; ?>" alt="Avatar" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #d70018;">
                            </div>
                            <div class="col-md-9">
                                <label>Thay đổi ảnh đại diện</label>
                                <input type="file" name="avatar" class="form-control" accept="image/*">
                                <small style="color: #666;">Chấp nhận: .jpg, .jpeg, .png</small>
                            </div>
                        </div>
                        <!-- Hết phần Avatar -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="FullNameUser" value="<?php echo htmlspecialchars($user['FullNameUser']); ?>" required>
                                </div>
                            </div>
                            <!-- ... Các ô input khác giữ nguyên ... -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="PhoneNumberUser" value="<?php echo htmlspecialchars($user['PhoneNumberUser']); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="EmailUser" value="<?php echo htmlspecialchars($user['EmailUser']); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control" name="BirthDay" value="<?php echo htmlspecialchars($user['BirthDay']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ giao hàng mặc định</label>
                                    <input type="text" class="form-control" name="AddressUser" value="<?php echo htmlspecialchars($user['AddressUser'] ?? ''); ?>" placeholder="Số nhà, đường, phường/xã...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Giới tính: </label> &nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="GenderUser" value="1" <?php echo ($user['GenderUser'] == 1) ? 'checked' : ''; ?>> Nam
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="GenderUser" value="2" <?php echo ($user['GenderUser'] == 2) ? 'checked' : ''; ?>> Nữ
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="GenderUser" value="0" <?php echo ($user['GenderUser'] == 0) ? 'checked' : ''; ?>> Khác
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 20px;">
                            <button type="submit" class="btn-update">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
<!-- Script JS -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="../frontend/js/main.js"></script>
</body>
</html>