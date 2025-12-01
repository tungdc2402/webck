<?php
$conn  = mysqli_connect("localhost","root","","dacs2");
if (!$conn) {
    echo "Kết nối thất bại" . mysqli_connect_error();
    exit();
}
?>

