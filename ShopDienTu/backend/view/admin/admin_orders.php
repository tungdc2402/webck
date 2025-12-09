<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'layout/header.php'; ?>
    <h2>Quản lý đơn hàng</h2>
    <table width="100%">
        <tr>
            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($orders as $o): ?>
            <tr>
                <td><?= $o['OrderCode'] ?></td>
                <td><?= $o['CustomerName'] ?></td>
                <td><?= number_format($o['TotalAmountOrder']) ?>đ</td>
                <td><?= date('d/m/Y H:i', strtotime($o['OrderDateOrder'])) ?></td>
                <td><?= $o['StatusOrder'] ?></td>
                <td>
                    <?php if ($o['StatusOrder'] == 'Chờ xác nhận'): ?>
                        <a href="index.php?url=admin_orders&action=confirm&id=<?= $o['IDOrder'] ?>">Duyệt đơn</a> |
                    <?php endif; ?>
                    <?php if ($o['StatusOrder'] == 'Đang chuẩn bị hàng'): ?>
                        <a href materie="index.php?url=admin_orders&action=ship&id=<?= $o['IDOrder'] ?>">Gửi hàng</a> |
                    <?php endif; ?>
                    <?php if ($o['StatusOrder'] == 'Đang vận chuyển'): ?>
                        <a href="index.php?url=admin_orders&action=complete&id=<?= $o['IDOrder'] ?>">Hoàn thành</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>