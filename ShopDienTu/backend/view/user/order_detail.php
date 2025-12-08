<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Chi tiết đơn hàng: <?= $order['OrderCode'] ?></h2>
    <p>Trạng thái: <strong><?= $order['StatusOrder'] ?></strong></p>
    <p>Địa chỉ: <?= $order['ShippingAddressOrder'] ?></p>

    <table width="100%">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['NameProduct'] ?></td>
                <td><?= $item['QuantityOrderDetail'] ?></td>
                <td><?= number_format($item['UnitPriceOrderDetail']) ?>đ</td>
                <td><?= number_format($item['SubtotalOrderDetail']) ?>đ</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Tổng cộng</strong></td>
            <td><strong><?= number_format($order['TotalAmountOrder']) ?>đ</strong></td>
        </tr>
    </table>
    <br>
    <a href="index.php?url=my_orders">Quay lại</a>
</body>

</html>