<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản Lý Giảm Giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Trong file CSS của Admin Panel */
        .main-content {
            /* Vị trí hiện tại, cố định cho màn hình lớn */
            margin-left: 270px;
        }

        /* MEDIA QUERY: Tối ưu cho thiết bị nhỏ (dưới 992px) */

        .discount-badge {
            font-size: 1.1em;
            padding: 8px 15px;
            border-radius: 12px;
        }

        .discount-0 {
            background-color: #e9ecef;
            color: #495057;
        }

        .discount-positive {
            background-color: #d4edda;
            color: #155724;
        }

        .table img.product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .price {
            font-weight: 600;
            color: #2c3e50;
        }
    </style>
</head>

<body>

    <?php include 'layout/header.php'; ?> // Nếu bạn có sidebar riêng ?>

    <div class="main-content">
        <div class="container-fluid py-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary"><i class="fas fa-percentage me-2"></i> Quản Lý Giảm Giá Sản Phẩm</h4>
                    <a href="index.php?url=admin_shop" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="100">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th width="180" class="text-center">Giá bán</th>
                                    <th width="180" class="text-center">Giảm giá</th>
                                    <th width="100" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Giả sử $products đã được truyền từ controller
                                foreach ($products as $p):
                                    $discount = (int)$p['Discount'];
                                    $price_formatted = number_format($p['PriceProduct'], 0, ',', '.') . 'đ';
                                ?>
                                    <tr>
                                        <td>
                                            <img src="../frontend/img/<?php echo htmlspecialchars($p['ImageUrlProduct']); ?>"
                                                alt="<?php echo htmlspecialchars($p['NameProduct']); ?>"
                                                class="product-img">
                                        </td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($p['NameProduct']); ?></strong>
                                            <br><small class="text-muted">ID: <?php echo $p['IDProduct']; ?></small>
                                        </td>
                                        <td class="text-center price">
                                            <?php echo $price_formatted; ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge discount-badge <?php echo $discount > 0 ? 'discount-positive' : 'discount-0'; ?>">
                                                <?php echo $discount; ?>%
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <!-- Nút sửa nhanh -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editDiscountModal"
                                                data-id="<?php echo $p['IDProduct']; ?>"
                                                data-name="<?php echo htmlspecialchars($p['NameProduct']); ?>"
                                                data-discount="<?php echo $discount; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal chỉnh sửa giảm giá -->
    <div class="modal fade" id="editDiscountModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="index.php?url=admin_update_discount" method="POST">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fas fa-percentage me-2"></i> Cập nhật giảm giá</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Sản phẩm:</strong> <span id="modalProductName"></span></p>
                        <input type="hidden" name="id" id="modalProductId">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Phần trăm giảm giá (%)</label>
                            <input type="number" name="discount" id="modalDiscount" class="form-control text-center"
                                min="0" max="90" value="0" required>
                            <small class="text-muted">Nhập 0 nếu không giảm giá</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Lưu thay đổi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Đổ dữ liệu vào modal khi bấm nút sửa
        const modal = document.getElementById('editDiscountModal');
        modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const discount = button.getAttribute('data-discount');

            document.getElementById('modalProductId').value = id;
            document.getElementById('modalProductName').textContent = name;
            document.getElementById('modalDiscount').value = discount;
        });
    </script>

</body>

</html>