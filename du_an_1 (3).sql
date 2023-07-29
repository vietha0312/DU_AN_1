-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 07:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name_bank` varchar(255) NOT NULL,
  `num_bank` varchar(255) NOT NULL,
  `name_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `bill_code` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán khi nhận hàng 2.Chuyển khoản ngân hàng 3.Thanh toán online',
  `order_date` datetime NOT NULL,
  `total_amount` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0.Đơn hàng mới \r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `status_pay` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `bill_code`, `id_user`, `id_pro`, `user_name`, `name_pro`, `full_name`, `address`, `phone`, `email`, `payment`, `order_date`, `total_amount`, `status`, `status_pay`) VALUES
(188, '76845', 0, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 08:47:13', 48000000, 2, '0'),
(189, '59481', 0, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 08:51:53', 7250000, 0, '0'),
(190, '53726', 0, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 09:00:14', 24000000, 0, '0'),
(191, '92385', 28, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 09:19:07', 28530000, 0, '0'),
(192, '31986', 28, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 09:50:54', 3260000, 0, '0'),
(193, '15637', 28, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-22 10:00:43', 1630000, 4, '1'),
(194, '15843', 28, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-25 10:37:57', 24000000, 2, '1'),
(195, '54781', 28, 0, 'vietha123', '', 'pham hong viet ha', 'thon bo duong', 334623400, 'pvietha301@gmail.com', 1, '2023-07-27 12:17:14', 34150000, 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price_pro` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `user_name`, `id_pro`, `img_pro`, `name_pro`, `price_pro`, `quantity`, `total_amount`, `id_bill`) VALUES
(114, 28, 'vietha123', 6, 'tải xuống (5).jpg', 'Samsung Galaxy S20 FE 256GB', 7250000, 1, 7250000, 189),
(115, 28, 'vietha123', 3, 'tải xuống (3).jpg', 'iPhone 13 Pro Max 128GB | Chính hãng VN/A', 24000000, 1, 24000000, 190),
(116, 28, 'vietha123', 2, 'tải xuống (2).jpg', 'iPhone 14 128GB | Chính hãng VN/A', 1630000, 1, 1630000, 191),
(117, 28, 'vietha123', 1, 'tải xuống (1).jpg', 'iPhone 14 Pro Max 128GB | Chính hãng VN/A', 26900000, 1, 26900000, 191),
(118, 28, 'vietha123', 2, 'tải xuống (2).jpg', 'iPhone 14 128GB | Chính hãng VN/A', 1630000, 1, 1630000, 193),
(119, 28, 'vietha123', 3, 'tải xuống (3).jpg', 'iPhone 13 Pro Max 128GB | Chính hãng VN/A', 24000000, 1, 24000000, 194),
(120, 28, 'vietha123', 6, 'tải xuống (5).jpg', 'Samsung Galaxy S20 FE 256GB', 7250000, 1, 7250000, 195),
(121, 28, 'vietha123', 1, 'tải xuống (1).jpg', 'iPhone 14 Pro Max 128GB | Chính hãng VN/A', 26900000, 1, 26900000, 195);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cate`, `name_cate`) VALUES
(24, 'Apple'),
(25, 'SAMSUNG'),
(26, 'NOKIA');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `comment_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_bank`
--

CREATE TABLE `history_bank` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `tranid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `short_des` text NOT NULL,
  `detail_des` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `idcate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `price`, `discount`, `img_pro`, `short_des`, `detail_des`, `view`, `idcate`) VALUES
(1, 'iPhone 14 Pro Max 128GB | Chính hãng VN/A', 26900000, 15, 'tải xuống (1).jpg', 'iPhone 14 Pro Max sở hữu thiết kế màn hình Dynamic Island ấn tượng cùng màn hình OLED 6,7 inch hỗ trợ always-on display và hiệu năng vượt trội với chip A16 Bionic. Bên cạnh đó máy còn sở hữu nhiều nâng cấp về camera với cụm camera sau 48MP, camera trước 12MP dùng bộ nhớ RAM 6G đa nhiệm vượt trội.  ', '<ul>\r\n	<li>M&agrave;n h&igrave;nh Dynamic Island - Sự biến mất của m&agrave;n h&igrave;nh tai thỏ thay thế bằng thiết kế vi&ecirc;n thuốc, OLED 6,7 inch, hỗ trợ always-on display</li>\r\n	<li>Cấu h&igrave;nh iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic</li>\r\n	<li>L&agrave;m chủ c&ocirc;ng nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động</li>\r\n	<li>Pin liền lithium-ion kết hợp c&ugrave;ng c&ocirc;ng nghệ sạc nhanh cải tiến</li>\r\n</ul>\r\n', 1, 24),
(2, 'iPhone 14 128GB | Chính hãng VN/A', 1630000, 15, 'tải xuống (2).jpg', 'iPhone 14 sở hữu màn hình Retina XDR OLED kích thước 6.1 inch cùng độ sáng vượt trội lên đến 1200 nits. Máy cũng sẽ được trang bị camera kép 12 MP phía sau cùng cảm biến điểm ảnh lớn, đạt 1.9 micron giúp cải thiện khả năng chụp thiếu sáng. Mẫu iPhone 14 mới cũng mang trong mình con chip Apple A15 Bionic phiên bản 5 nhân mang lại hiệu suất vượt trội.', '<ul>\r\n	<li>Tuyệt đỉnh thiết kế, tỉ mỉ từng đường n&eacute;t - N&acirc;ng cấp to&agrave;n diện với kiểu d&aacute;ng mới, nhiều lựa chọn m&agrave;u sắc trẻ trung</li>\r\n	<li>N&acirc;ng tầm trải ngiệm giải tr&iacute; đỉnh cao - M&agrave;n h&igrave;nh 6,1&quot;&quot; c&ugrave;ng tấm nền OLED c&oacute; c&ocirc;ng nghệ Super Retina XDR cao cấp</li>\r\n	<li>Chụp ảnh chuy&ecirc;n nghiệp hơn - Cụm 2 camera 12 MP đi k&egrave;m nhiều chế độ v&agrave; chức năng chụp hiện đại</li>\r\n	<li>Hiệu năng h&agrave;ng đầu thế giới - Apple A15 Bionic 6 nh&acirc;n xử l&iacute; nhanh, ổn định</li>\r\n</ul>\r\n', 0, 24),
(3, 'iPhone 13 Pro Max 128GB | Chính hãng VN/A', 24000000, 15, 'tải xuống (3).jpg', 'iPhone 13 Pro Max chắc chắn sẽ là chiếc smartphone cao cấp được quan tâm nhiều nhất trong năm 2021. Dòng iPhone 13 series được ra mắt vào ngày 14 tháng 9 năm 2021 tại sự kiện \"California Streaming\" diễn ra trực tuyến tương tự năm ngoái cùng với 3 phiên bản khác là iPhone 13, 13 mini và 13 Pro. Vậy điện thoại 13 Pro Max giá bao nhiêu? Có gì nổi bật? Cùng tìm hiểu ngay nhé!', '<ul>\r\n	<li>Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao</li>\r\n	<li>Kh&ocirc;ng gian hiển thị sống động - M&agrave;n h&igrave;nh 6.7&quot; Super Retina XDR độ s&aacute;ng cao, sắc n&eacute;t</li>\r\n	<li>Trải nghiệm điện ảnh đỉnh cao - Cụm 3 camera k&eacute;p 12MP, hỗ trợ ổn định h&igrave;nh ảnh quang học</li>\r\n	<li>Tối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 ph&uacute;t</li>\r\n</ul>\r\n', 9, 24),
(5, 'Samsung Galaxy S23 Ultra 256GB', 2690000, 15, 'tải xuống (4).jpg', 'Sau sự đổ bộ thành công của Samsung Galaxy S22 những chiếc điện thoại dòng Flagship tiếp theo - Điện thoại Samsung Galaxy S23 Ultra là đối tượng được Samfans hết mực săn đón. Kiểu dáng thanh lịch sang chảnh kết hợp với những bước đột phá trong công nghệ đã kiến tạo nên siêu phẩm Flagship nhà Samsung.', '<ul>\r\n	<li>Thoả sức chụp ảnh, quay video chuy&ecirc;n nghiệp - Camera đến 200MP, chế độ chụp đ&ecirc;m cải tiến, bộ xử l&iacute; ảnh th&ocirc;ng minh</li>\r\n	<li>Chiến game b&ugrave;ng nổ - chip Snapdragon 8 Gen 2 8 nh&acirc;n tăng tốc độ xử l&iacute;, m&agrave;n h&igrave;nh 120Hz, pin 5.000mAh</li>\r\n	<li>N&acirc;ng cao hiệu suất l&agrave;m việc với Si&ecirc;u b&uacute;t S Pen t&iacute;ch hợp, dễ d&agrave;ng đ&aacute;nh dấu sự kiện từ h&igrave;nh ảnh hoặc video</li>\r\n	<li>Thiết kế bền bỉ, th&acirc;n thiện - M&agrave;u sắc lấy cảm hứng từ thi&ecirc;n nhi&ecirc;n, chất liệu k&iacute;nh v&agrave; lớp phim phủ PET t&aacute;i chế</li>\r\n</ul>\r\n', 1, 25),
(6, 'Samsung Galaxy S20 FE 256GB', 7250000, 20, 'tải xuống (5).jpg', 'Samsung S20 FE là chiếc điện thoại thuộc dòng Samsung Galaxy S, với chữ FE trong tên gọi của máy có nghĩa là Fan Edition. Đây là dòng điện thoại ra mắt như để gửi lời tri ân đến các fan trung thành đã và đang sử dụng các sản phẩm của Samsung. Với số lượng sản phẩm được giới hạn và chỉ mở bán trong thời gian ngắn.  ', '<ul>\r\n	<li>Kh&ocirc;ng gian giải tr&iacute; bất tận - M&agrave;n h&igrave;nh Super Amoled 6.5&quot;, FullHD, HDR10+, 120Hz</li>\r\n	<li>Hiệu năng mạnh mẽ - Chip Snapdragon 865, chuẩn bộ nhớ UFS 3.1</li>\r\n	<li>Bừng s&aacute;ng mọi khung h&igrave;nh - Camera 12MP hỗ trợ quay phim 8K, zoom quang 3X</li>\r\n	<li>Năng lượng cho cả ng&agrave;y d&agrave;i - Vi&ecirc;n pin lớn 4500mAh, sạc nhanh 25W</li>\r\n</ul>\r\n', 9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_ques` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `contennt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT 0,
  `email_user` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_user` varchar(25) NOT NULL,
  `img_user` varchar(255) NOT NULL,
  `register_date` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `password`, `full_name`, `sex`, `email_user`, `address`, `phone_user`, `img_user`, `register_date`, `last_login`, `role`) VALUES
(26, 'admin1234', '123456', 'pham hong viet ha', 0, 'pvietha301@gmail.com', 'thon bo duong', '0334623400', 'f9e14634cb6769ae7e9395300b99d327.jpg', NULL, NULL, 1),
(28, 'vietha123', '123456', 'pham hong viet ha', 0, 'pvietha301@gmail.com', 'thon bo duong', '0334623400', 'taoanhdep_vinamilk_60913.png', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_pro_cart` (`id_pro`),
  ADD KEY `lk_bill_cart` (`id_bill`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `lk_user_cmt` (`id_user`),
  ADD KEY `lk_pro_cmt` (`id_pro`);

--
-- Indexes for table `history_bank`
--
ALTER TABLE `history_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `lk_cate_product` (`idcate`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_ques`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `history_bank`
--
ALTER TABLE `history_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_ques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_bill_cart` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `lk_pro_cart` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `lk_pro_cmt` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_cate_product` FOREIGN KEY (`idcate`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
