-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th10 21, 2025 lúc 02:04 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `IDCategory` bigint(20) NOT NULL,
  `NameCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`IDCategory`, `NameCategory`) VALUES
(4, 'Máy ảnh'),
(2, 'Máy tính xách tay'),
(3, 'Phụ kiện điện tử'),
(1, 'Điện thoại thông minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `IDOrder` bigint(20) NOT NULL,
  `IDUser` bigint(20) NOT NULL,
  `OrderDateOrder` datetime NOT NULL DEFAULT current_timestamp(),
  `TotalAmountOrder` decimal(10,2) NOT NULL,
  `ShippingAddressOrder` varchar(255) NOT NULL,
  `StatusOrder` enum('Pending','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `PaymentMethodOrder` varchar(50) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `IDOrderDetail` bigint(20) NOT NULL,
  `IDOrder` bigint(20) NOT NULL,
  `IDProduct` bigint(20) NOT NULL,
  `QuantityOrderDetail` int(11) NOT NULL,
  `UnitPriceOrderDetail` decimal(10,2) NOT NULL,
  `SubtotalOrderDetail` decimal(10,2) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `IDProduct` bigint(20) NOT NULL,
  `NameProduct` varchar(255) NOT NULL,
  `DescriptionProduct` text DEFAULT NULL,
  `IDCategory` bigint(20) NOT NULL,
  `PriceProduct` decimal(10,2) NOT NULL,
  `StockQuantityProduct` int(11) NOT NULL DEFAULT 0,
  `ImageUrlProduct` varchar(255) DEFAULT NULL,
  `IsActiveProduct` tinyint(1) DEFAULT 1
) ;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`IDProduct`, `NameProduct`, `DescriptionProduct`, `IDCategory`, `PriceProduct`, `StockQuantityProduct`, `ImageUrlProduct`, `IsActiveProduct`) VALUES
(101, 'iPhone 15 Pro Max', 'Điện thoại cao cấp nhất của Apple với chip A17 Bionic.', 1, 30000000.00, 15, 'iphone15promax.jpg', 1),
(102, 'Samsung Galaxy S24 Ultra', 'Thiết bị hàng đầu của Samsung, tích hợp AI và S Pen.', 1, 28500000.00, 10, 's24ultra.jpg', 1),
(103, 'MacBook Pro M3', 'Máy tính xách tay hiệu năng cao dành cho chuyên gia.', 2, 45000000.00, 5, 'macbookprom3.jpg', 1),
(104, 'Laptop Dell XPS 15', 'Máy tính Windows cao cấp, màn hình 4K sắc nét.', 2, 35000000.00, 8, 'dellxps15.jpg', 1),
(105, 'Tai nghe Sony WH-1000XM5', 'Tai nghe chống ồn hàng đầu, pin 30 giờ.', 3, 7500000.00, 25, 'sonyxm5.jpg', 1),
(106, 'Sạc dự phòng Anker 20000mAh', 'Sạc nhanh, dung lượng lớn, an toàn.', 3, 1200000.00, 50, 'anker20k.jpg', 1),
(107, 'Ổ cứng SSD Samsung 1TB', 'Ổ cứng thể rắn tốc độ cao.', 3, 2500000.00, 0, 'ssd1tb.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `IDUser` bigint(20) NOT NULL,
  `UsernameUser` varchar(50) NOT NULL,
  `PasswordHashUser` varchar(255) NOT NULL,
  `EmailUser` varchar(100) NOT NULL,
  `FullNameUser` varchar(100) NOT NULL,
  `PhoneNumberUser` varchar(15) DEFAULT NULL,
  `AddressUser` varchar(255) DEFAULT NULL,
  `RoleUser` enum('Customer','Admin') NOT NULL DEFAULT 'Customer',
  `CreatedAtUser` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`IDCategory`),
  ADD UNIQUE KEY `NameCategory` (`NameCategory`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`IDOrder`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`IDOrderDetail`),
  ADD UNIQUE KEY `unique_order_product` (`IDOrder`,`IDProduct`),
  ADD KEY `IDProduct` (`IDProduct`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`IDProduct`),
  ADD KEY `IDCategory` (`IDCategory`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `UsernameUser` (`UsernameUser`),
  ADD UNIQUE KEY `EmailUser` (`EmailUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `IDCategory` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `IDOrder` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `IDOrderDetail` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `IDProduct` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `IDUser` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`IDOrder`) REFERENCES `orders` (`IDOrder`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`IDProduct`) REFERENCES `products` (`IDProduct`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`IDCategory`) REFERENCES `categories` (`IDCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
