<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng #<?= $order['OrderCode'] ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            color: #333;
        }

        .main-content {
            padding: 20px 30px;
            margin-left:270px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 24px;
            color: #2c3e50;
            margin: 0;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
        }

        /* CARDS & GRID */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
        }

        .card-title {
            font-size: 15px;
            font-weight: 700;
            color: #0984e3;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            text-transform: uppercase;
        }

        /* INFO ROWS */
        .info-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-label {
            width: 140px;
            color: #636e72;
            font-weight: 500;
        }

        .info-value {
            flex: 1;
            color: #2d3436;
            font-weight: 600;
        }

        /* TABLE */
        table { width: 100%; border-collapse: collapse; }
        thead { background-color: #f8f9fa; }
        th, td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; font-size: 14px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* TOTAL */
        .total-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
            font-size: 16px;
        }
        .final-price {
            font-size: 20px;
            font-weight: bold;
            color: #d63031;
            margin-left: 20px;
        }

        /* BADGES */
        .badge { padding: 5px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .bg-pending { background: #fff3cd; color: #856404; }
        .bg-processing { background: #d1ecf1; color: #0c5460; }
        .bg-shipping { background: #e2e3e5; color: #383d41; }
        .bg-completed { background: #d4edda; color: #155724; }
        .bg-cancel { background: #f8d7da; color: #721c24; }

        /* BUTTONS */
        .btn {
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }
        .btn-back { background: #636e72; color: white; }
        .btn-print { background: #fff; border: 1px solid #ccc; color: #333; }
        .btn-success { background: #28a745; color: white; }
        .btn-info { background: #17a2b8; color: white; }
        .btn-primary { background: #007bff; color: white; }
        .btn-danger { background: #dc3545; color: white; }

        .btn:hover { opacity: 0.9; }

        /* ACTION BAR */
        .action-bar {
            background: #fff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Ẩn các phần không cần thiết khi in */
        @media print {
            .no-print, .action-bar, header, .sidebar { display: none !important; }
            .main-content { margin: 0; padding: 0; }
            .card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
</head>

<body>
<!-- Giả sử bạn có layout header admin -->
<div class="no-print">
    <?php include __DIR__ . '/../admin/layout/header.php'; // Điều chỉnh đường dẫn nếu cần ?>
</div>

<div class="main-content">
    <!-- HEADER -->
    <div class="page-header">
        <div>
            <a href="index.php?url=admin_orders" class="btn btn-back no-print">← Quay lại</a>
            <h2 class="page-title">Đơn hàng #<?= $order['OrderCode'] ?></h2>
        </div>
        <div>
            <button onclick="window.print()" class="btn btn-print no-print">🖨️ In hóa đơn</button>
        </div>
    </div>

    <!-- INFO GRID -->
    <div class="info-grid">
        <!-- Cột Khách hàng -->
        <div class="card">
            <div class="card-title">Thông tin khách hàng</div>
            <div class="info-row">
                <span class="info-label">Người nhận:</span>
                <span class="info-value"><?= htmlspecialchars($order['FullNameUser'] ?? 'Khách lẻ') ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Số điện thoại:</span>
                <span class="info-value"><?= htmlspecialchars($order['Phone']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Địa chỉ:</span>
                <span class="info-value"><?= htmlspecialchars($order['ShippingAddressOrder']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Ghi chú:</span>
                <span class="info-value" style="font-style: italic;"><?= htmlspecialchars($order['Note'] ?? 'Không có') ?></span>
            </div>
        </div>

        <!-- Cột Trạng thái -->
        <div class="card">
            <div class="card-title">Thông tin đơn hàng</div>

            <?php
            // Xử lý Badge màu sắc
            $stt = trim($order['StatusOrder']);
            $bgClass = 'bg-pending';
            if($stt == 'Đang chuẩn bị hàng') $bgClass = 'bg-processing';
            elseif($stt == 'Đang vận chuyển') $bgClass = 'bg-shipping';
            elseif($stt == 'Hoàn thành') $bgClass = 'bg-completed';
            elseif($stt == 'Đã hủy') $bgClass = 'bg-cancel';
            ?>

            <div class="info-row">
                <span class="info-label">Trạng thái:</span>
                <span class="info-value"><span class="badge <?= $bgClass ?>"><?= $stt ?></span></span>
            </div>
            <div class="info-row">
                <span class="info-label">Ngày đặt:</span>
                <span class="info-value"><?= date('d/m/Y H:i', strtotime($order['OrderDateOrder'])) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Thanh toán:</span>
                <span class="info-value" style="text-transform: capitalize;"><?= $order['PaymentMethodOrder'] ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">ID Tài khoản:</span>
                <span class="info-value">#<?= $order['IDUser'] ?></span>
            </div>
        </div>
    </div>

    <!-- PRODUCT LIST -->
    <div class="card">
        <div class="card-title">Chi tiết sản phẩm</div>
        <table>
            <thead>
            <tr>
                <th width="5%">#</th>
                <th width="45%">Sản phẩm</th>
                <th width="15%" class="text-center">Số lượng</th>
                <th width="15%" class="text-right">Đơn giá</th>
                <th width="20%" class="text-right">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($items as $item): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><strong><?= htmlspecialchars($item['NameProduct']) ?></strong></td>
                    <td class="text-center">x<?= $item['QuantityOrderDetail'] ?></td>
                    <td class="text-right"><?= number_format($item['UnitPriceOrderDetail']) ?>đ</td>
                    <td class="text-right"><strong><?= number_format($item['SubtotalOrderDetail']) ?>đ</strong></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-row">
            <span>Tổng cộng:</span>
            <span class="final-price"><?= number_format($order['TotalAmountOrder']) ?>đ</span>
        </div>
    </div>

    <!-- ACTION BAR (Chỉ hiện nếu chưa hoàn thành/hủy) -->
    <?php if($stt != 'Hoàn thành' && $stt != 'Đã hủy'): ?>
        <div class="action-bar no-print">
            <strong style="margin-right: 10px;">Xử lý đơn hàng:</strong>

            <!-- CHỜ XÁC NHẬN -->
            <?php if ($stt == 'Chờ xác nhận'): ?>
                <a href="index.php?url=admin_orders&action=confirm&id=<?= $order['IDOrder'] ?>" class="btn btn-success">
                    ✓ Duyệt đơn
                </a>
                <a href="index.php?url=admin_orders&action=cancel&id=<?= $order['IDOrder'] ?>"
                   onclick="return confirm('Bạn chắc chắn muốn hủy đơn này?')" class="btn btn-danger">
                    ✕ Hủy đơn
                </a>

                <!-- ĐANG CHUẨN BỊ -->
            <?php elseif ($stt == 'Đang chuẩn bị hàng'): ?>
                <a href="index.php?url=admin_orders&action=ship&id=<?= $order['IDOrder'] ?>" class="btn btn-info">
                    🚚 Gửi hàng đi (Vận chuyển)
                </a>

                <!-- ĐANG VẬN CHUYỂN -->
            <?php elseif ($stt == 'Đang vận chuyển'): ?>
                <a href="index.php?url=admin_orders&action=complete&id=<?= $order['IDOrder'] ?>" class="btn btn-primary">
                    ★ Xác nhận Hoàn thành
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
</body>
</html>