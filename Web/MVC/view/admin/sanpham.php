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

        /* Sidebar Styling */
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

        .card{
            margin-left:265px;
        }
    </style>
</head>
<body>
<?php
include 'layout/header.php';
?>


<div class="card" id="product-table-view">
    <div id="products-section" class="hidden">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Danh sách sản phẩm</h3>
            <div>
                <button class="btn btn-success me-2"><i class="fas fa-file-excel"></i> Import Excel</button>
                <button class="btn btn-primary" onclick="toggleProductForm(true)"><i class="fas fa-plus"></i> Thêm mới</button>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Kho</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($products))
                {
                ?>
                <tr>
                    <td><img src="img/product-1.jpg" class="rounded" alt="img"></td>
                    <td><?php echo htmlspecialchars($row['NameProduct']); ?> <br><small class="text-muted">SKU: IP15PM-256</small></td>
                    <td><span class="text-danger fw-bold"><?php echo htmlspecialchars($row['PriceProduct']); ?></span> <br> <small class="text-decoration-line-through text-muted">36.000.000₫</small></td>
                    <td><span class="badge bg-warning text-dark"><?php echo htmlspecialchars($row['StockQuantityProduct']); ?></span></td>
                    <td>Điện thoại / Apple</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>