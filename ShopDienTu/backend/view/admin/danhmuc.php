<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản Lý Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 260px; --bg-color: #f8f9fa; }
        body { background-color: var(--bg-color); overflow-x: hidden; }
        /* Canh lề trái để tránh menu sidebar (nếu có) */
        .card { margin-left: 265px; margin-right: 20px; margin-top: 20px; border: none; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<?php include 'layout/header.php'; ?>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="card-title mb-0">Quản lý Danh mục sản phẩm</h3>
            <button type="button" class="btn btn-primary" onclick="openAddModal()">
                <i class="fas fa-plus"></i> Thêm danh mục
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>Tên Danh Mục</th>
                    <th class="text-end" style="width: 200px;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($categories)) { ?>
                    <tr>
                        <td>#<?php echo $row['IDCategory']; ?></td>
                        <td class="fw-bold text-primary"><?php echo htmlspecialchars($row['NameCategory']); ?></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary me-2"
                                    onclick='openEditModal(<?php echo json_encode($row); ?>)'>
                                <i class="fas fa-edit"></i>
                            </button>

                            <a href="index.php?url=admin_category_delete&id=<?php echo $row['IDCategory']; ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
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

<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php?url=admin_category_store" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm danh mục mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="categoryId">

                    <div class="mb-3">
                        <label class="form-label">Tên Danh mục</label>
                        <input type="text" class="form-control" name="NameCategory" id="NameCategory" required placeholder="Ví dụ: Laptop, Điện thoại...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Hàm mở modal để THÊM mới
    function openAddModal() {
        document.getElementById('modalTitle').innerText = 'Thêm danh mục mới';
        document.getElementById('categoryId').value = ''; // Xóa ID
        document.getElementById('NameCategory').value = ''; // Xóa tên

        var myModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        myModal.show();
    }

    // Hàm mở modal để SỬA (nhận object category từ PHP truyền vào)
    function openEditModal(cat) {
        document.getElementById('modalTitle').innerText = 'Cập nhật danh mục';
        document.getElementById('categoryId').value = cat.IDCategory; // Điền ID cũ
        document.getElementById('NameCategory').value = cat.NameCategory; // Điền tên cũ

        var myModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        myModal.show();
    }
</script>

</body>
</html>