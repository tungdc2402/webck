<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cửa Hàng Điện Tử</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #0d6efd;
            --bg-color: #f8f9fa;
        }

        body {
            background-color: var(--bg-color);
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #212529;
            color: white;
            padding-top: 20px;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover, .sidebar a.active {
            color: white;
            background: #343a40;
            border-left-color: var(--primary-color);
        }

        .sidebar i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h4 class="text-center text-white mb-4">TECH ADMIN</h4>
    <a href="#" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#" class="nav-link"><i class="fas fa-mobile-alt"></i> Sản phẩm</a>
    <a href="#" class="nav-link"><i class="fas fa-list"></i> Danh mục & Hãng</a>
    <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> Đơn hàng</a>
    <a href="#" class="nav-link"><i class="fas fa-users"></i> Khách hàng</a>
    <a href="#" class="nav-link"><i class="fas fa-cog"></i> Cấu hình</a>
</div>
</body>
</html>