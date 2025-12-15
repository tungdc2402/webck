<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng | Tech Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            color: #333;
        }

        /* Container chính để nội dung không bị dính sát lề nếu có sidebar */
        .main-content {
            padding: 20px 30px;
            margin-left:270px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin: 0;
        }

        /* Card bao quanh bảng */
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            overflow: hidden; /* Để bo góc bảng */
        }

        /* Bảng dữ liệu */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #343a40; /* Màu tối giống sidebar Tech Admin */
            color: #fff;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        /* Định dạng cột cụ thể */
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-bold { font-weight: 600; }

        .price { color: #d63031; font-weight: bold; }

        /* Badge trạng thái */
        .status-badge {
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; } /* Chờ xác nhận */
        .status-processing { background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; } /* Đang chuẩn bị/Gửi hàng */
        .status-shipping { background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db; } /* Đang vận chuyển */
        .status-completed { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; } /* Hoàn thành */
        .status-cancel { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; } /* Đã hủy */

        /* Nút hành động */
        .action-btn {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 5px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 4px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-confirm { background-color: #28a745; color: white; } /* Xanh lá */
        .btn-confirm:hover { background-color: #218838; }

        .btn-ship { background-color: #17a2b8; color: white; } /* Xanh dương nhạt */
        .btn-ship:hover { background-color: #138496; }

        .btn-complete { background-color: #6610f2; color: white; } /* Tím */
        .btn-complete:hover { background-color: #5a0dd3; }

        .btn-detail { background-color: #6c757d; color: white; } /* Xám */
        .btn-detail:hover { background-color: #545b62; }

    </style>
</head>

<body>
<!-- Header/Sidebar Admin -->
<?php include 'layout/header.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h2>Quản lý đơn hàng</h2>
    </div>

    <div class="card">
        <table width="100%">
            <thead>
            <tr>
                <th width="10%">Mã đơn</th>
                <th width="20%">Khách hàng</th>
                <th width="15%" class="text-right">Tổng tiền</th>
                <th width="15%" class="text-center">Ngày đặt</th>
                <th width="15%" class="text-center">Trạng thái</th>
                <th width="25%">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $o): ?>
                <?php
                // Xử lý class màu sắc cho trạng thái
                $stt = trim($o['StatusOrder']);
                $badgeClass = 'status-pending';
                if($stt == 'Chờ xác nhận') $badgeClass = 'status-pending';
                elseif($stt == 'Đang chuẩn bị hàng') $badgeClass = 'status-processing';
                elseif($stt == 'Đang vận chuyển' || $stt == 'Đang giao hàng') $badgeClass = 'status-shipping';
                elseif($stt == 'Hoàn thành' || $stt == 'Giao hàng thành công') $badgeClass = 'status-completed';
                elseif($stt == 'Đã hủy') $badgeClass = 'status-cancel';
                ?>
                <tr>
                    <td class="font-bold">#<?= htmlspecialchars($o['OrderCode']) ?></td>
                    <td><?= htmlspecialchars($o['FullNameUser']) ?></td>
                    <td class="text-right price"><?= number_format($o['TotalAmountOrder']) ?>đ</td>
                    <td class="text-center"><?= date('d/m/Y H:i', strtotime($o['OrderDateOrder'])) ?></td>

                    <td class="text-center">
                                <span class="status-badge <?= $badgeClass ?>">
                                    <?= htmlspecialchars($o['StatusOrder']) ?>
                                </span>
                    </td>

                    <td>
                        <!-- Nút Xem chi tiết (Luôn hiển thị) -->
                        <a href="index.php?url=Admin_order_Detail&id=<?= $o['IDOrder'] ?>" class="action-btn btn-detail">
                            Xem
                        </a>

                        <!-- Các nút xử lý trạng thái -->
                        <?php if ($stt == 'Chờ xác nhận'): ?>
                            <a href="index.php?url=admin_orders&action=confirm&id=<?= $o['IDOrder'] ?>" class="action-btn btn-confirm">
                                Duyệt đơn
                            </a>
                        <?php endif; ?>

                        <?php if ($stt == 'Đang chuẩn bị hàng'): ?>
                            <a href="index.php?url=admin_orders&action=ship&id=<?= $o['IDOrder'] ?>" class="action-btn btn-ship">
                                Gửi hàng
                            </a>
                        <?php endif; ?>

                        <?php if ($stt == 'Đang vận chuyển' || $stt == 'Đang giao hàng'): ?>
                            <a href="index.php?url=admin_orders&action=complete&id=<?= $o['IDOrder'] ?>" class="action-btn btn-complete">
                                Hoàn thành
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>