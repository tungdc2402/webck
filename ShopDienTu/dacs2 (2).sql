-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `IDCategory` bigint(20) NOT NULL,
  `NameCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`IDCategory`, `NameCategory`) VALUES
(4, 'Máy ảnh'),
(2, 'Máy tính xách tay'),
(3, 'Phụ kiện điện tử'),
(1, 'Điện thoại thông minh');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `IDOrder` bigint(20) NOT NULL,
  `IDUser` bigint(20) NOT NULL,
  `OrderDateOrder` datetime NOT NULL DEFAULT current_timestamp(),
  `TotalAmountOrder` decimal(10,2) NOT NULL,
  `ShippingAddressOrder` varchar(255) NOT NULL,
  `StatusOrder` enum('Pending','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `PaymentMethodOrder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `IDOrderDetail` bigint(20) NOT NULL,
  `IDOrder` bigint(20) NOT NULL,
  `IDProduct` bigint(20) NOT NULL,
  `QuantityOrderDetail` int(11) NOT NULL,
  `UnitPriceOrderDetail` decimal(10,2) NOT NULL,
  `SubtotalOrderDetail` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`IDProduct`, `NameProduct`, `DescriptionProduct`, `IDCategory`, `PriceProduct`, `StockQuantityProduct`, `ImageUrlProduct`, `IsActiveProduct`) VALUES
(101, 'iPhone 15 Pro Max cu', 'Điện thoại cao cấp nhất của Apple với chip A17 Bionic.', 1, 30000000.00, 15, 'product-1.jpg', 1),
(102, 'Samsung Galaxy S24 Ultra', 'Thiết bị hàng đầu của Samsung, tích hợp AI và S Pen.', 1, 28500000.00, 10, 'product-2.jpg', 1),
(103, 'MacBook Pro M3', 'Máy tính xách tay hiệu năng cao dành cho chuyên gia.', 2, 45000000.00, 5, 'product-3.jpg', 1),
(104, 'Laptop Dell XPS 15', 'Máy tính Windows cao cấp, màn hình 4K sắc nét.', 2, 35000000.00, 8, 'product-5.jpg', 1),
(105, 'Tai nghe Sony WH-1000XM5', 'Tai nghe chống ồn hàng đầu, pin 30 giờ.', 3, 7500000.00, 25, 'product-1.jpg', 1),
(106, 'Sạc dự phòng Anker 20000mAh', 'Sạc nhanh, dung lượng lớn, an toàn.', 3, 1200000.00, 50, 'product-1.jpg', 1),
(107, 'Ổ cứng SSD Samsung 1TB', 'Ổ cứng thể rắn tốc độ cao.', 3, 2500000.00, 0, 'product-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
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
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`IDReview`, `IDProduct`, `NameComment`, `EmailComment`, `Rating`, `Content`, `DateComment`) VALUES
(1, 105, 'tùng', 'tungdcit@vku.udn.vn', 4, 'nhu cc', '2025-11-29 00:38:45'),
(2, 104, 'Đặng Công Tùng', '39dangcongtung@gmail.com', 5, 'agfafsfsa', '2025-11-29 01:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDUser`, `BirthDay`, `PasswordHashUser`, `EmailUser`, `FullNameUser`, `PhoneNumberUser`, `AddressUser`, `RoleUser`, `CreatedAtUser`) VALUES
(1, '24/02/2006', '$2y$10$YQdmJBCeT/GhNmWiBbPzPOWJTcuhA76Gwvi/zJLlbutjZU7Vb25Aa', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0987654311', NULL, 1, '2025-11-25 21:14:15'),
(3, '24/02/2006', '$2y$10$uBF9z3bCYSR7hf/LdvqaE.eUSlSG2oXGXoCPo0ww3sHLVPKc0VhQm', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0987654331', NULL, 1, '2025-11-25 21:47:33'),
(4, '01/01/2000', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin@store.com', 'Super Admin', '0999999999', NULL, 1, '2025-11-25 23:50:55'),
(5, '24/02/2006', '$2y$10$d2og6xSFVpDblHzncHMMR.65VuidtO97xTud8WIL3KmrLfNQ2OIdm', 'Tungsoine@gmail.com', 'Đặng Công Tùng', '0123456789', NULL, 0, '2025-11-26 00:03:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`IDCategory`),
  ADD UNIQUE KEY `NameCategory` (`NameCategory`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`IDOrder`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`IDOrderDetail`),
  ADD UNIQUE KEY `unique_order_product` (`IDOrder`,`IDProduct`),
  ADD KEY `IDProduct` (`IDProduct`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`IDProduct`),
  ADD KEY `IDCategory` (`IDCategory`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`IDReview`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `PhoneNumberUser` (`PhoneNumberUser`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `IDCategory` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `IDOrder` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `IDOrderDetail` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `IDProduct` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `IDReview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IDUser` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`IDOrder`) REFERENCES `orders` (`IDOrder`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`IDProduct`) REFERENCES `products` (`IDProduct`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`IDCategory`) REFERENCES `categories` (`IDCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
