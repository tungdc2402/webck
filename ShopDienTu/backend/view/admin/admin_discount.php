<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <?php
    $id = isset($isEdit) && $isEdit ? $product['IDProduct'] : '';
    $name = isset($isEdit) && $isEdit ? $product['NameProduct'] : '';
    $price = isset($isEdit) && $isEdit ? $product['PriceProduct'] : '';
    $stock = isset($isEdit) && $isEdit ? $product['StockQuantityProduct'] : '';
    $desc = isset($isEdit) && $isEdit ? $product['DescriptionProduct'] : '';
    $img = isset($isEdit) && $isEdit ? $product['ImageUrlProduct'] : '';
    $cat = isset($isEdit) && $isEdit ? $product['IDCategory'] : '';

    $title = (isset($isEdit) && $isEdit) ? "Cập nhật sản phẩm" : "Thêm sản phẩm mới";
    ?>

    <form action="index.php?url=admin_store" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="card" id="product-form-view">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-5"><?php echo $title; ?></span>
                <a href="index.php?url=admin_shop" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="prodTab" role="tablist">
                    <li class="nav-item"><button class="nav-link active" type="button" data-bs-toggle="tab" data-bs-target="#info">Thông tin chung</button></li>
                    <li class="nav-item"><button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#price">Giá & Kho</button></li>
                    <li class="nav-item"><button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#images">Hình ảnh</button></li>
                </ul>

                <div class="tab-content" id="prodTabContent">
                    <div class="tab-pane fade show active" id="info">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="NameProduct"
                                        value="<?php echo htmlspecialchars($name); ?>"
                                        placeholder="Ví dụ: iPhone 15 Pro Max" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mô tả chi tiết</label>
                                    <textarea class="form-control" rows="8" name="DescriptionProduct"
                                        placeholder="Nhập mô tả sản phẩm..."><?php echo htmlspecialchars($desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Danh mục (ID)</label>
                                    <input type="number" class="form-control" name="IDCategory"
                                        value="<?php echo $cat; ?>" placeholder="Nhập ID danh mục (VD: 1)" required>
                                    <small class="text-muted">Nhập ID của danh mục sản phẩm.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="price">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                                <input type="number" class="form-control" name="PriceProduct"
                                    value="<?php echo $price; ?>" placeholder="VD: 25000000" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Số lượng tồn kho</label>
                                <input type="number" class="form-control" name="StockQuantityProduct"
                                    value="<?php echo $stock; ?>" placeholder="VD: 100" required>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="images">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Ảnh sản phẩm</label>
                                <div class="image-upload-box" onclick="document.getElementById('fileInput').click()">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                    <p class="mt-2">Click để chọn ảnh mới (Nếu muốn thay đổi)</p>
                                    <input type="file" name="image" class="d-none" id="fileInput" onchange="previewImage(this)">
                                </div>

                                <div class="mt-3">
                                    <p class="mb-1 fw-bold">Ảnh hiện tại/Xem trước:</p>
                                    <?php if ($img != ""): ?>
                                        <img id="preview" src="img/<?php echo $img; ?>" class="img-thumbnail" style="max-height: 200px;">
                                    <?php else: ?>
                                        <img id="preview" src="https://via.placeholder.com/150?text=No+Image" class="img-thumbnail" style="max-height: 200px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="specs">
                        <p class="text-muted">Chức năng đang cập nhật (Cần tạo thêm bảng TechSpecs trong Database)...</p>
                        <div id="spec-container">
                            <div class="row spec-row">
                                <div class="col-4"><input type="text" class="form-control" placeholder="Tên thông số (VD: RAM)" disabled></div>
                                <div class="col-7"><input type="text" class="form-control" placeholder="Giá trị (VD: 8GB)" disabled></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 border-top pt-3 text-end">
                    <a href="index.php?url=admin_shop" class="btn btn-secondary me-2">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu sản phẩm
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hàm xem trước ảnh khi chọn file
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
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

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
            background: #343a40;
            border-left-color: var(--primary-color);
        }

        .sidebar i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }

        /* Card Styling */
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            /* Căn chỉnh card ra giữa hoặc lệch phải tùy layout admin của bạn,
               nếu có sidebar thì bỏ margin-left hoặc set theo sidebar */
            margin-left: 20px;
            margin-right: 20px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            padding: 15px 20px;
        }

        /* Product Image Upload */
        .image-upload-box {
            border: 2px dashed #ced4da;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
            background: #fff;
            position: relative;
        }

        .image-upload-box:hover {
            border-color: var(--primary-color);
            background: #f1f8ff;
        }

        /* Status Badges */
        .badge-status-processing {
            background-color: #0dcaf0;
            color: #000;
        }

        .badge-status-shipping {
            background-color: #ffc107;
            color: #000;
        }

        .badge-status-completed {
            background-color: #198754;
        }

        .badge-status-cancelled {
            background-color: #dc3545;
        }

        /* Tech Specs Table */
        .spec-row {
            margin-bottom: 10px;
        }

        /* Utility classes */
        .hidden {
            display: none;
        }
    </style>
</html>