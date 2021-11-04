-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 10:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_qty` int(11) DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Web'),
(2, 'Mobile'),
(3, 'Desktop Application');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `product_subcategory` varchar(255) DEFAULT NULL,
  `reviews` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `lang_used` varchar(50) DEFAULT NULL,
  `multi_lang` tinyint(1) DEFAULT NULL,
  `responsive` tinyint(1) DEFAULT NULL,
  `product_vid` varchar(255) DEFAULT NULL,
  `product_img1` varchar(255) DEFAULT NULL,
  `product_img2` varchar(255) DEFAULT NULL,
  `product_img3` varchar(255) DEFAULT NULL,
  `product_img4` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_subcategory`, `reviews`, `product_price`, `product_description`, `lang_used`, `multi_lang`, `responsive`, `product_vid`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `user_id`) VALUES
(1, 'App 1', 'Mobile', 'eCommerce', NULL, 500, 'eCommerce App For Android/IOS Mobiles', 'Flutter', NULL, NULL, '', 'images - 2021-02-28T042744.764.jpeg', 'images - 2021-02-28T042755.389.jpeg', 'images - 2021-02-28T042814.033.jpeg', '', 1),
(2, 'App 2 ', 'Mobile', 'freelancing', NULL, 250, 'Freelancing App For Android/IOS Mobiles', 'Java', NULL, NULL, '', 'images - 2021-02-28T042814.033.jpeg', 'images - 2021-02-28T042744.764.jpeg', 'images - 2021-02-28T042755.389.jpeg', '', 1),
(3, 'Website 1', 'Web', 'education', NULL, 600, 'Education website ', 'php', NULL, NULL, '', 'images - 2021-02-28T042712.327.jpeg', 'images - 2021-02-28T042716.042.jpeg', 'images - 2021-02-28T042708.014.jpeg', '', 2),
(4, 'Website 2', 'Web', 'eCommerce', NULL, 400, 'eCommerce website', 'python', NULL, NULL, '', 'images - 2021-02-28T041919.739.jpeg', 'images - 2021-02-28T041943.736.jpeg', 'images - 2021-02-28T041952.490.jpeg', '', 2),
(5, 'Website 3', 'Web', 'eCommerce', NULL, 320, 'eCommerce Web ', 'php', NULL, NULL, '', 'images - 2021-02-28T041952.490.jpeg', 'images - 2021-02-28T042005.115.jpeg', 'images - 2021-02-28T042120.838.jpeg', '', 3),
(6, 'Website 4', 'Web', 'eCommerce', NULL, 750, 'eCommerce website', 'Laravel', NULL, NULL, '', 'images - 2021-02-28T042031.249.jpeg', 'images - 2021-02-28T042120.838.jpeg', 'images - 2021-02-28T042653.552.jpeg', '', 3),
(7, 'Website 4', 'Web', 'Education', NULL, 255, 'Education website ', 'php', NULL, NULL, '', 'images - 2021-02-28T042644.958.jpeg', 'images - 2021-02-28T042641.617.jpeg', 'images - 2021-02-28T042653.552.jpeg', '', 4),
(8, 'App 3', 'Mobile', 'Freelancing', NULL, 1000, 'Freelancing App For Android/IOS Mobiles', 'Flutter', NULL, NULL, '', 'images - 2021-02-28T042744.764.jpeg', 'images - 2021-02-28T042755.389.jpeg', 'images - 2021-02-28T042814.033.jpeg', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_content` text DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`) VALUES
(1, 'eCommerce'),
(2, 'Freelancing'),
(3, 'Education'),
(4, 'Small-Shops'),
(5, 'Companies-Systems'),
(6, 'CRMs'),
(7, 'Chatting-Apps'),
(8, 'Portofolios');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'images - 2021-02-28T055930.611.jpeg',
  `cover_pic` varchar(255) DEFAULT 'images - 2021-02-28T060140.227.jpeg',
  `bio` varchar(255) DEFAULT NULL,
  `reviews` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `phone_no`, `country`, `email`, `profile_pic`, `cover_pic`, `bio`, `reviews`) VALUES
(1, 'mohamed8', '$2y$10$T2FLxSnfGdN3B7KBQvEZ4ejWZ/exxJSmp4iysMwDt4CAhFexlKTJS', 'Mohamedd', 'Hesham', '01282304755', 'egypt', 'mohamedhesmam8@gmail.com', '1.jpg', 'Screenshot 2020-12-14 154819.png', 'hello i\'m love animals', NULL),
(2, 'omar', '$2y$10$oM/aFaszxT5U5T/TZ1RpqOMUngu0/I.PK.0oCiYYtdaTGq4.cxGEC', 'Omar', 'Draz', '01288226548', 'egypt', 'omarnader6636@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'images - 2021-02-28T060140.227.jpeg', '', NULL),
(3, 'mustafa', '$2y$10$4Gz0fHO59K8v22DIiTmkuOEb5nQgRefSLqWO5x9HHCG1wRwM9qoIa', 'Mustafa', 'Husseni', '0123456789', 'egypt', 'mustafa@moom.com', 'images - 2021-02-28T042340.393.jpeg', 'images - 2021-02-28T060140.227.jpeg', 'hello i\'m in love with this site', NULL),
(4, 'maria', '$2y$10$5Obd8vAm4im8stfog24GS.TKSV0XRVeh15yPsu0LYXAu3vfd.8Iya', 'Maria', 'Santa', '0128462584', 'egypt', 'maria@moom.com', 'images - 2021-02-28T042243.063.jpeg', 'Screenshot 2021-01-22 225706.png', 'hello i\'m in love with this site', NULL),
(5, 'M@gmail.com', '$2y$10$RUwzgdZJB/tVzaiaM88I9.3QfGEpCyJPsZF5aNrFfgH2u6LpQFBRy', 'mohamed', 'hesham', NULL, NULL, 'M@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'images - 2021-02-28T060140.227.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
