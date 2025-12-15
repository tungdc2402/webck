-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th12 13, 2025 lúc 03:08 PM
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
-- Cấu trúc bảng cho bảng `cartitems`
--

CREATE TABLE `cartitems` (
  `IDCartItem` bigint(20) NOT NULL,
  `IDShoppingCart` bigint(20) NOT NULL,
  `IDProduct` bigint(20) NOT NULL,
  `QuantityCartItem` int(11) NOT NULL DEFAULT 1,
  `CreatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cartitems`
--

INSERT INTO `cartitems` (`IDCartItem`, `IDShoppingCart`, `IDProduct`, `QuantityCartItem`, `CreatedAt`) VALUES
(43, 3, 102, 2, '2025-12-10 01:46:41'),
(44, 3, 103, 1, '2025-12-10 01:48:04'),
(49, 2, 103, 1, '2025-12-13 16:41:00');

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
(4, 'LAPTOP'),
(2, 'PC GAMING'),
(3, 'Phụ Kiện'),
(1, 'TV-Điện Máy'),
(5, 'Đồng Hồ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `IDOrder` bigint(20) NOT NULL,
  `OrderCode` varchar(20) DEFAULT NULL,
  `FullNameUser` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Ward` varchar(50) DEFAULT NULL,
  `AddressDetail` text DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `IDUser` bigint(20) NOT NULL,
  `OrderDateOrder` datetime NOT NULL DEFAULT current_timestamp(),
  `TotalAmountOrder` decimal(10,2) NOT NULL,
  `ShippingAddressOrder` varchar(255) NOT NULL,
  `StatusOrder` enum('Chờ xác nhận','Đang chuẩn bị hàng','Đang vận chuyển','Hoàn thành','Hủy') DEFAULT 'Chờ xác nhận',
  `PaymentMethodOrder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`IDOrder`, `OrderCode`, `FullNameUser`, `Phone`, `Province`, `Ward`, `AddressDetail`, `Note`, `CreatedAt`, `IDUser`, `OrderDateOrder`, `TotalAmountOrder`, `ShippingAddressOrder`, `StatusOrder`, `PaymentMethodOrder`) VALUES
(1, 'ORD176485448150', '', '', '', '', '', '', '2025-12-04 20:21:21', 5, '2025-12-04 20:21:21', 99999999.99, ', , ', 'Đang chuẩn bị hàng', ''),
(2, 'ORD176485455481', '', '', '', '', '', '', '2025-12-04 20:22:34', 5, '2025-12-04 20:22:34', 29925000.00, ', , ', 'Đang chuẩn bị hàng', ''),
(3, 'ORD176485459887', '', '', '', '', '', '', '2025-12-04 20:23:18', 5, '2025-12-04 20:23:18', 47250000.00, ', , ', 'Đang chuẩn bị hàng', ''),
(4, 'ORD176485482495', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehe', '2025-12-04 20:27:04', 5, '2025-12-04 20:27:04', 47250000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'cheque'),
(5, 'ORD176485572576', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'heheee', '2025-12-04 20:42:05', 5, '2025-12-04 20:42:05', 59850000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'cheque'),
(6, 'ORD176485593676', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehheee', '2025-12-04 20:45:36', 3, '2025-12-04 20:45:36', 94500000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'cheque'),
(7, 'ORD176509734859', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehe', '2025-12-07 15:49:08', 3, '2025-12-07 15:49:08', 47250000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'bacs'),
(8, 'ORD176518704410', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehehe\r\n', '2025-12-08 16:44:04', 5, '2025-12-08 16:44:04', 47250000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'cheque'),
(9, 'ORD176524063798', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'heheh', '2025-12-09 07:37:17', 5, '2025-12-09 07:37:17', 94500000.00, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Đang chuẩn bị hàng', 'cheque'),
(10, 'ORD176563470343', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehe', '2025-12-13 21:05:03', 5, '2025-12-13 21:05:03', 99999999.99, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Chờ xác nhận', 'cheque'),
(11, 'ORD176563481940', 'Nguyen Van Hieu', '0374758834', ' Hà Tĩnh', 'Xã hehe', 'thôn hehehe', 'hehe', '2025-12-13 21:06:59', 5, '2025-12-13 21:06:59', 99999999.99, 'thôn hehehe, Xã hehe,  Hà Tĩnh', 'Chờ xác nhận', 'cheque');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `IDOrderDetail` bigint(20) NOT NULL,
  `IDOrder` bigint(20) NOT NULL,
  `IDProduct` bigint(20) NOT NULL,
  `NameProduct` varchar(255) DEFAULT NULL,
  `ImageProduct` varchar(255) DEFAULT NULL,
  `QuantityOrderDetail` int(11) NOT NULL,
  `UnitPriceOrderDetail` decimal(10,2) NOT NULL,
  `SubtotalOrderDetail` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`IDOrderDetail`, `IDOrder`, `IDProduct`, `NameProduct`, `ImageProduct`, `QuantityOrderDetail`, `UnitPriceOrderDetail`, `SubtotalOrderDetail`) VALUES
(1, 1, 102, 'Samsung Galaxy S24 Ultra', NULL, 4, 28500000.00, 99999999.99),
(2, 1, 103, 'MacBook Pro M3', NULL, 1, 45000000.00, 45000000.00),
(3, 2, 102, 'Samsung Galaxy S24 Ultra', NULL, 1, 28500000.00, 28500000.00),
(4, 3, 103, 'MacBook Pro M3', NULL, 1, 45000000.00, 45000000.00),
(5, 4, 103, 'MacBook Pro M3', NULL, 1, 45000000.00, 45000000.00),
(6, 5, 102, 'Samsung Galaxy S24 Ultra', NULL, 2, 28500000.00, 57000000.00),
(7, 6, 103, 'MacBook Pro M3', NULL, 2, 45000000.00, 90000000.00),
(8, 7, 103, 'MacBook Pro M3', NULL, 1, 45000000.00, 45000000.00),
(9, 8, 103, 'MacBook Pro M3', NULL, 1, 45000000.00, 45000000.00),
(10, 9, 103, 'MacBook Pro M3', NULL, 2, 45000000.00, 90000000.00),
(11, 10, 102, 'Samsung Galaxy S24', NULL, 2, 28500000.00, 57000000.00),
(12, 10, 103, 'MacBook Pro M3', NULL, 4, 45000000.00, 99999999.99),
(13, 11, 103, 'MacBook Pro M3', NULL, 4, 45000000.00, 99999999.99);

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
  `IsActiveProduct` tinyint(1) DEFAULT 1,
  `Discount` int(11) NOT NULL,
  `Sold` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `QuantityProduct` int(11) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`IDProduct`, `NameProduct`, `DescriptionProduct`, `IDCategory`, `PriceProduct`, `StockQuantityProduct`, `ImageUrlProduct`, `IsActiveProduct`, `Discount`, `Sold`, `video`, `QuantityProduct`) VALUES
(102, 'Samsung Galaxy S24', 'Thiết bị hàng đầu của Samsung, tích hợp AI và S Pen.', 1, 28500000.00, 10, 'product-thumb-3.jpg', 1, 10, 20000, 'https://www.youtube.com/embed/tgbNymZ7vqY', 100),
(103, 'MacBook Pro M3', 'Máy tính xách tay hiệu năng cao dành cho chuyên gia.', 2, 45000000.00, 5, 'apple-macbook-pro-14-inch-macbook-pro-14-inch-m3-pro-12-core-silver-2023-excellent-46542882439484.webp', 1, 0, 500000, 'https://www.youtube.com/embed/tgbNymZ7vqY', 100),
(122, 'MacBook M3 Pro', 'tuyệt vời', 1, 15000000.00, 14, 'apple-macbook-pro-14-inch-macbook-pro-14-inch-m3-pro-12-core-silver-2023-excellent-46542882439484.webp', 1, 0, 0, '', 100),
(123, 'Tivi 4K', 'đẹp sắc nét', 1, 99999999.99, 10, '1765622645_a5776dff5ccc89626358eab8e8b1f1aa.png', 1, 0, 0, '', 100),
(125, 'Legion', 'chất', 1, 15000000.00, 7, '1765622819_screenshot-2024-08-08-182121-b19274bf-c66c-4b20-996b-5d1b3f815270-f859c767-8d6c-4e83-bd02-944dacc67b8d (1).webp', 1, 0, 0, '', 100),
(126, 'Ip', 'đẹp và chất', 1, 99999999.99, 58, '1765629515_tải xuống.jfif', 1, 0, 0, '', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `IDReview` int(11) NOT NULL,
  `IDProduct` int(11) NOT NULL,
  `NameComment` varchar(100) NOT NULL,
  `EmailComment` varchar(100) NOT NULL,
  `Rating` int(11) DEFAULT 5,
  `Content` text NOT NULL,
  `DateComment` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`IDReview`, `IDProduct`, `NameComment`, `EmailComment`, `Rating`, `Content`, `DateComment`) VALUES
(1, 105, 'tùng', 'tungdcit@vku.udn.vn', 4, 'nhu cc', '2025-11-29 00:38:45'),
(2, 104, 'Đặng Công Tùng', '39dangcongtung@gmail.com', 5, 'agfafsfsa', '2025-11-29 01:08:08'),
(3, 104, 'Đặng Công Tùng', 'tungdc.24it@vku.udn.vn', 2, 'àgasadsdgs', '2025-11-29 22:43:40'),
(4, 106, 'Đặng Công Tùng', 'tungdcit@vku.udn.vn', 5, 'i love you', '2025-12-01 16:19:38'),
(5, 111, 'Đặng Công Tùng', 'tungdc.24it@vku.udn.vn', 2, 'Như CC', '2025-12-02 10:52:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcarts`
--

CREATE TABLE `shoppingcarts` (
  `IDShoppingCart` bigint(20) NOT NULL,
  `IDUser` bigint(20) NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shoppingcarts`
--

INSERT INTO `shoppingcarts` (`IDShoppingCart`, `IDUser`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 5, '2025-12-02 20:38:59', '2025-12-02 20:38:59'),
(2, 3, '2025-12-04 20:43:03', '2025-12-04 20:43:03'),
(3, 7, '2025-12-10 01:43:15', '2025-12-10 01:43:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `IDUser` bigint(20) NOT NULL,
  `BirthDay` varchar(50) NOT NULL,
  `PasswordHashUser` varchar(255) NOT NULL,
  `EmailUser` varchar(100) NOT NULL,
  `FullNameUser` varchar(100) NOT NULL,
  `PhoneNumberUser` varchar(15) DEFAULT NULL,
  `AddressUser` varchar(255) DEFAULT NULL,
  `RoleUser` int(11) DEFAULT 0,
  `CreatedAtUser` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`IDUser`, `BirthDay`, `PasswordHashUser`, `EmailUser`, `FullNameUser`, `PhoneNumberUser`, `AddressUser`, `RoleUser`, `CreatedAtUser`) VALUES
(1, '24/02/2006', '$2y$10$YQdmJBCeT/GhNmWiBbPzPOWJTcuhA76Gwvi/zJLlbutjZU7Vb25Aa', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0987654311', NULL, 1, '2025-11-25 21:14:15'),
(3, '24/02/2006', '$2y$10$uBF9z3bCYSR7hf/LdvqaE.eUSlSG2oXGXoCPo0ww3sHLVPKc0VhQm', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0987654331', NULL, 1, '2025-11-25 21:47:33'),
(4, '01/01/2000', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin@store.com', 'Super Admin', '0999999999', NULL, 1, '2025-11-25 23:50:55'),
(5, '24/02/2006', '$2y$10$d2og6xSFVpDblHzncHMMR.65VuidtO97xTud8WIL3KmrLfNQ2OIdm', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0123456789', NULL, 0, '2025-11-26 00:03:37'),
(7, '22/06/2006', '$2y$10$xRj/OEBX84viwJLqDhRotumLayA0EVtWOvn7Lz.4gsa1DiDhcAvE.', 'hieuhehe@gmail.com', 'Nguyen Van Hieu', '11111111', NULL, 0, '2025-12-10 01:41:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`IDCartItem`),
  ADD UNIQUE KEY `uniq_cart_product` (`IDShoppingCart`,`IDProduct`),
  ADD KEY `fk_cartitem_product` (`IDProduct`);

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
  ADD UNIQUE KEY `OrderCode` (`OrderCode`),
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
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`IDReview`);

--
-- Chỉ mục cho bảng `shoppingcarts`
--
ALTER TABLE `shoppingcarts`
  ADD PRIMARY KEY (`IDShoppingCart`),
  ADD UNIQUE KEY `uniq_user_cart` (`IDUser`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `PhoneNumberUser` (`PhoneNumberUser`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `IDCartItem` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `IDCategory` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `IDOrder` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `IDOrderDetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `IDProduct` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `IDReview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `shoppingcarts`
--
ALTER TABLE `shoppingcarts`
  MODIFY `IDShoppingCart` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `IDUser` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `fk_cartitem_cart` FOREIGN KEY (`IDShoppingCart`) REFERENCES `shoppingcarts` (`IDShoppingCart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cartitem_product` FOREIGN KEY (`IDProduct`) REFERENCES `products` (`IDProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_OrderDetails_Orders` FOREIGN KEY (`IDOrder`) REFERENCES `orders` (`IDOrder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_OrderDetails_Products` FOREIGN KEY (`IDProduct`) REFERENCES `products` (`IDProduct`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`IDOrder`) REFERENCES `orders` (`IDOrder`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`IDProduct`) REFERENCES `products` (`IDProduct`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`IDCategory`) REFERENCES `categories` (`IDCategory`);

--
-- Các ràng buộc cho bảng `shoppingcarts`
--
ALTER TABLE `shoppingcarts`
  ADD CONSTRAINT `fk_shoppingcart_user` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
