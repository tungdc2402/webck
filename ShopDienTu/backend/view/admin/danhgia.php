<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản Lý Đánh Giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 260px; --bg-color: #f8f9fa; }
        body { background-color: var(--bg-color); overflow-x: hidden; }
        .main-content { margin-left: var(--sidebar-width); padding: 20px; }
        .product-mini-img { width: 40px; height: 40px; object-fit: cover; border-radius: 4px; margin-right: 10px; }
        .card { border: none; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .star-rating { color: #ffc107; font-size: 0.9rem; }
    </style>
</head>
<body>

<?php include 'layout/header.php'; ?>

<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-4">
                <i class="fas fa-comments text-primary"></i> Quản lý Đánh giá & Bình luận
            </h3>

            <div class="table-responsive">
                <table class="table table-hover align-middle border">
                    <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th style="width: 250px;">Sản phẩm</th>
                        <th style="width: 150px;">Người gửi</th>
                        <th style="width: 100px;">Đánh giá</th>
                        <th>Nội dung bình luận</th>
                        <th class="text-end" style="width: 100px;">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($reviews) > 0) {
                        while($row = mysqli_fetch_array($reviews)) {
                            $imgSrc = $row['ImageUrlProduct'];
                            if (strpos($imgSrc, 'http') === 0) {
                                $hinh = $imgSrc;
                            } else {
                                $hinh = "../frontend/img/" . $imgSrc;
                            }
                            ?>
                            <tr>
                                <td>#<?php echo $row['IDReview']; ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo htmlspecialchars($hinh); ?>" class="product-mini-img">
                                        <small class="fw-bold text-muted"><?php echo htmlspecialchars($row['NameProduct']); ?></small>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold d-block"><?php echo htmlspecialchars($row['NameComment']); ?></span>
                                    <small class="text-muted" style="font-size: 11px;"><?php echo htmlspecialchars($row['EmailComment']); ?></small>
                                </td>
                                <td>
                                    <div class="star-rating">
                                        <?php
                                        // Vòng lặp vẽ sao
                                        for($i=1; $i<=5; $i++) {
                                            if($i <= $row['Rating']) echo '<i class="fas fa-star"></i>';
                                            else echo '<i class="far fa-star text-muted"></i>';
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 text-secondary" style="font-size: 0.95rem;">
                                        "<?php echo htmlspecialchars($row['Content']); ?>"
                                    </p>
                                </td>
                                <td class="text-end">
                                    <a href="index.php?url=admin_review_delete&id=<?php echo $row['IDReview']; ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Bạn có chắc muốn xóa bình luận này không?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6" class="text-center py-4">Chưa có đánh giá nào.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>