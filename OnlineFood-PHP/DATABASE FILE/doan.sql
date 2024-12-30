-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2024 lúc 09:04 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '123456', 'admin@mail.com', '', '2022-05-27 06:21:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(18, 3, 'Cơm chiên rau củ', 'Cơm thập cẩm Trung Quốc với bắp cải, đậu, cà rốt và hành lá.', 7.00, '6733091bf036b.jpg'),
(19, 3, 'Gà Mãn Châu', 'Thịt gà nấu chậm với hành lá trong nước sốt kiểu Mãn Châu do chúng tôi tự làm.', 11.00, '67330932b858f.jpg'),
(21, 1, 'sushi', 'gồm nhiều loại sushi khác nhau được trình bày tinh tế', 20.00, '673309461d57e.jpg'),
(22, 2, 'tempura', 'tôm được nhúng vào bột rồi chiên giòn tạo lớp vỏ giòn nhẹ, không ngấm dầu và giữ được vị tươi ngon tự nhiên của nguyên liệu bên trong', 6.00, '67330957f4063.jpg'),
(23, 10, 'Chạo tôm cuốn dừa', 'tôm xay nhuyễn quấn quanh que mía, nướng thơm phức, ăn kèm nước mắm chua ngọt và rau sống.', 3.00, '673309aa1a59d.jpg'),
(24, 10, 'Rau diếp cuốn tôm', 'món ăn thanh mát, gồm tôm tươi cuộn trong lá rau diếp, kèm rau thơm và bún, chấm nước mắm chua ngọt.', 4.00, '673309d168698.jpg'),
(25, 10, 'lươn cuốn mỡ chài', 'món ăn đặc sản với thịt lươn được ướp gia vị, cuốn trong lớp mỡ chài béo ngậy, nướng vàng giòn, ăn kèm rau sống và chấm mắm me chua ngọt.', 5.00, '67330a06a5b54.jpg'),
(26, 11, 'Spaghetti Bolognese', 'món mì Ý nổi tiếng, gồm mì spaghetti kết hợp với sốt thịt bò băm, cà chua, hành tây, cà rốt, và cần tây, nêm nếm gia vị thơm ngon và rắc thêm phô mai Parmesan.', 7.00, '67330a42e44df.jpg'),
(27, 11, 'Striploin', 'phần thịt lưng bò, mềm và ít mỡ, nổi tiếng với hương vị đậm đà, thường được chế biến thành bít tết nướng hoặc áp chảo để giữ độ ngọt tự nhiên và kết cấu mềm mọng.', 8.50, '67330a7988d90.jpg'),
(28, 11, 'Beefsteak', 'bít tết làm từ miếng thịt bò nguyên bản được nướng hoặc áp chảo, thường ăn kèm sốt và rau củ, thể hiện hương vị thơm ngon tự nhiên của thịt bò.', 9.50, '67330abdbd097.jpg'),
(29, 12, 'Vịt quay Bẫc Kinh', 'vịt được quay vàng giòn, da mỏng, thịt mềm ngọt, thường cuốn cùng bánh tráng mỏng, hành lá, dưa leo, và chấm nước sốt đặc trưng.', 15.00, '67330afc3e273.jpg'),
(30, 12, 'Bò cay Hồ Nam', 'Thịt bò xào cay đậm đà, kết hợp các gia vị như ớt khô, tiêu Tứ Xuyên và tỏi, mang hương vị cay nồng đặc trưng của ẩm thực Hồ Nam.', 5.50, '67330b4e2a24f.jpg'),
(31, 12, 'Lẩu cay Tứ Xuyên', 'đặc trưng với nước dùng đỏ sánh từ ớt và tiêu Tứ Xuyên, tạo vị cay tê đầu lưỡi. Món lẩu này thường đi kèm nhiều loại thịt, hải sản, rau và nấm nhúng, mang đến trải nghiệm hương vị đậm đà và ấm nóng.', 10.00, '67330b9941f90.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-04-30 22:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 04:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 04:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 04:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 04:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 04:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 06:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 06:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 06:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 06:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 06:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 06:18:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Hatoyama', 'hatoyama@gmail.com', '1900 636 061', 'www.hatoyamafood.com', '7am', '8pm', '24hr-x7', '  Số 8 Vạn Phúc, Quận Ba Đình, Hà Nội \r\nSố 13 Lý Thường Kiệt, Quận Hoàn Kiếm, Hà Nội ', '6727c63a1df4f.jpg', '2024-11-12 07:33:44'),
(2, 1, 'Ganeya', 'ganeyajp@gmail.com', '0329 909 698', 'www.ganeya.com', '10am', '10pm', 'Mon-Sat', ' 41 Trần Quốc Toản, quận Hoàn Kiếm, Hà Nội', '6727c5f69b6c8.jpg', '2024-11-12 07:34:56'),
(3, 3, 'FengHuang', 'fenghhuang@gmail.com', '0888119986', 'www.fenghuang.com', '10am', '8pm', '24hr-x7', ' 35 Trần Kim Xuyến, Yên Hòa, Hà Nội ', '6727c9333390e.jpg', '2024-11-12 07:35:12'),
(10, 4, 'Phụng Thanh', 'phungthanh@gmail.com', '0329 909 698', 'www.phungthanhres.com', '9am', '6pm', '24hr-x7', 'Số 3 Nguyễn Bỉnh Khiêm, Hai Bà Trưng, Hà Nội', '673307f50ac21.jpg', '2024-11-12 07:47:01'),
(11, 2, 'Botanica', 'botanica@gmail.com', '0743954872', 'www.botanica.com', '9am', '12am', '24hr-x7', 'Số 3 Thái Phiên, Hai Bà Trưng, Hà Nội', '6733088fc9cb9.jpg', '2024-11-12 07:49:35'),
(12, 3, 'Long Phụng', 'longphungcn@gmail.com', '0796372642', 'www.longphungcn.com', '8am', '10pm', 'Mon-Sat', 'Tầng 2, Tòa nhà 29T2, Khu N05, Đường Hoàng Đạo Thúy, Trung Hòa Nhân Chính, Cầu Giấy, Hà Nội', '673308dd8d2ad.jpg', '2024-11-12 07:50:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Nhật', '2024-11-12 07:34:19'),
(2, 'Tây', '2024-11-12 07:34:24'),
(3, 'Trung', '2024-11-12 07:34:30'),
(4, 'Việt', '2024-11-12 07:34:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'eric', 'Eric', 'Lopez', 'eric@mail.com', '1458965547', '123456', '87 Armbrester Drive', 1, '2022-05-27 01:40:36'),
(2, 'harry', 'Harry', 'Holt', 'harryh@mail.com', '3578545458', '123456', '33 Stadium Drive', 1, '2022-05-27 01:41:07'),
(3, 'james', 'James', 'Duncan', 'james@mail.com', '0258545696', '123456', '67 Hiney Road', 1, '2022-05-27 01:41:37'),
(4, 'christine', 'Christine', 'Moore', 'christine@mail.com', '7412580010', '123456', '114 Test Address', 1, '2022-04-30 22:14:42'),
(5, 'scott', 'Scott', 'Miller', 'scott@mail.com', '7896547850', '123456', '63 Charack Road', 1, '2022-05-27 03:53:51'),
(6, 'liamoore', 'Liam', 'Moore', 'liamoore@mail.com', '7896969696', '123456', '122 Bleck Street', 1, '2022-05-27 05:57:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Chỉ mục cho bảng `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Chỉ mục cho bảng `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Chỉ mục cho bảng `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Chỉ mục cho bảng `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
