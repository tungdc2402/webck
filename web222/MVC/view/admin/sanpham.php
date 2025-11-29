<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản Lý Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 260px; --bg-color: #f8f9fa; }
        body { background-color: var(--bg-color); overflow-x: hidden; }
        .card { margin-left: 265px; margin-right: 20px; margin-top: 20px; border: none; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .product-img { width: 50px; height: 50px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<?php include 'layout/header.php'; ?>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="card-title mb-0">Danh sách sản phẩm</h3>
            <div>
                <button type="button" class="btn btn-primary" onclick="openAddModal()">
                    <i class="fas fa-plus"></i> Thêm mới
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Kho</th>
                    <th>Danh mục</th>
                    <th class="text-end">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($products)) { ?>
                    <tr>
                        <td>
                            <img src="img/product-1.jpg" class="rounded product-img" alt="img">
                        </td>
                        <td>
                            <span class="fw-bold"><?php echo htmlspecialchars($row['NameProduct']); ?></span>
                            <br><small class="text-muted">ID: <?php echo $row['IDProduct']; ?></small>
                        </td>
                        <td class="text-danger fw-bold"><?php echo number_format($row['PriceProduct']); ?>₫</td>
                        <td><span class="badge bg-info text-dark"><?php echo $row['StockQuantityProduct']; ?></span></td>
                        <td><?php echo $row['IDCategory']; ?></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary me-2"
                                    onclick='openEditModal(<?php echo json_encode($row); ?>)'>
                                <i class="fas fa-edit"></i>
                            </button>

                            <a href="index.php?url=admin_delete&id=<?php echo $row['IDProduct']; ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="index.php?url=admin_store" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm sản phẩm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="productId">

                    <input type="hidden" name="IDCategory" id="IDCategory" value="1">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="NameProduct" id="NameProduct" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Giá bán</label>
                            <input type="number" class="form-control" name="PriceProduct" id="PriceProduct" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số lượng kho</label>
                            <input type="number" class="form-control" name="StockQuantityProduct" id="StockQuantityProduct" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="DescriptionProduct" id="DescriptionProduct" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                            <small class="text-muted" id="imageHelp">Chỉ chọn ảnh nếu muốn thay đổi.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openAddModal() {
        document.getElementById('modalTitle').innerText = 'Thêm sản phẩm mới';
        document.getElementById('productId').value = '';

        // Reset form
        document.getElementById('NameProduct').value = '';
        document.getElementById('PriceProduct').value = '';
        document.getElementById('StockQuantityProduct').value = '';
        document.getElementById('DescriptionProduct').value = '';
        document.getElementById('IDCategory').value = '1';

        var myModal = new bootstrap.Modal(document.getElementById('productModal'));
        myModal.show();
    }

    function openEditModal(product) {
        document.getElementById('modalTitle').innerText = 'Cập nhật sản phẩm';

        document.getElementById('productId').value = product.IDProduct;
        document.getElementById('NameProduct').value = product.NameProduct;
        document.getElementById('PriceProduct').value = product.PriceProduct;
        document.getElementById('StockQuantityProduct').value = product.StockQuantityProduct;
        document.getElementById('DescriptionProduct').value = product.DescriptionProduct;
        document.getElementById('IDCategory').value = product.IDCategory;

        var myModal = new bootstrap.Modal(document.getElementById('productModal'));
        myModal.show();
    }
</script>

</body>
</html>