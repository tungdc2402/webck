<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don hang cua toi</title>
</head>

<body>
    <h2>Đơn hàng của tôi</h2>
    <table width="100%">
        <tr>
            <th>Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Thanh toán</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        <?php foreach ($orders as $o): ?>
            <tr>
                <td><?= $o['OrderCode'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($o['OrderDateOrder'])) ?></td>
                <td><?= number_format($o['TotalAmountOrder']) ?>đ</td>
                <td><?= $o['PaymentMethodOrder'] ?></td>
                <td>
                    <span style="color: <?= $o['StatusOrder'] == 'Chờ xác nhận' ? 'orange' : ($o['StatusOrder'] == 'Hoàn thành' ? 'green' : 'blue') ?>">
                        <?= $o['StatusOrder'] ?>
                    </span>
                </td>
                <td><a href="index.php?url=order_detail&id=<?= $o['IDOrder'] ?>">Xem chi tiết</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>