-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 12:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `codex`
--
-- --------------------------------------------------------
--
-- Table structure for table `brands`
--
Drop schema if exists codeX;
create schema codeX;
use codeX;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `brands`
--
INSERT INTO `brands` (`brand_id`, `brand_name`)
VALUES (1, 'Apple'),
  (2, 'Dell'),
  (3, 'HP'),
  (4, 'Huawei'),
  (5, 'Lenovo'),
  (6, 'Samsung');
-- --------------------------------------------------------
--
-- Table structure for table `cart`
--
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `categories`
--
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `categories`
--
INSERT INTO `categories` (`cat_id`, `cat_name`)
VALUES (1, 'Phones'),
  (2, 'Tablets'),
  (3, 'Laptops'),
  (4, 'Desktops'),
  (5, 'Desktops'),
  (6, 'Watches'),
  (7, 'Accessories');
-- --------------------------------------------------------
--
-- Table structure for table `orderdetails`
--
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `orders`
--
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `payment`
--
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `products`
--
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_keywords` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `products`
--
INSERT INTO `products` (
    `product_id`,
    `product_cat`,
    `product_brand`,
    `product_title`,
    `product_price`,
    `product_desc`,
    `product_image`,
    `product_keywords`,
    `stock`
  )
VALUES (
    1,
    1,
    1,
    'iPhone 12',
    0.5,
    'Apple\'s newest iPhones with updated cameras, new colors, smaller notches, and faster A15 chip. Launched September 24.',
    '../Assets/Images/products/iPhone12.png',
    'apple',
    20
  ),
  (
    2,
    1,
    1,
    'iPhone 13',
    1,
    'Apple\'s newest iPhones with updated cameras, new colors, smaller notches, and faster A15 chip. Launched September 24.',
    '../Assets/Images/products/iPhone13.png',
    'apple,iphone',
    10
  ),
  (
    3,
    2,
    2,
    'Dell Latitude 7000',
    0.5,
    'Dell Latitude 7000 is a Windows 10 Professional laptop with a 12.50-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM',
    '../Assets/Images/products/DellLatitude1.png',
    'dell,latitude',
    30
  ),
  (
    4,
    2,
    2,
    'Dell Latitude 8000',
    1,
    'Dell Latitude 8000 is a Windows 10 Professional laptop with a 12.50-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM.',
    '../Assets/Images/products/DellLatitude2.jpg',
    'latitude,dell,laptop',
    10
  ),
  (
    5,
    3,
    3,
    'HP Pavilion 1',
    0.3,
    'HP Pavilion Notebook is a Windows 10 laptop with a 15.60-inch display. It is powered by a Core i7 processor and it comes with 8GB of RAM.',
    '../Assets/Images/products/HPPavilion1.jpg',
    'hp,pavilion.laptop',
    4
  ),
  (
    6,
    3,
    3,
    'HP Pavilion 2',
    1,
    'HP Pavilion Notebook is a Windows 10 laptop with a 15.60-inch display. It is powered by a Core i7 processor and it comes with 8GB of RAM.',
    '../Assets/Images/products/HPPavilion2.png',
    'hp,pavilion',
    10
  ),
  (
    7,
    4,
    4,
    'Huawei MateStation S',
    0.5,
    'HUAWEI MateStation S features a compact case and star-trail design. It has a 7 nm AMD Ryzen 4000G series processor.',
    '../Assets/Images/products/Huawei1.jpg',
    'huawei',
    30
  ),
  (
    8,
    4,
    4,
    'Huawei MateStation T',
    1,
    'HUAWEI MateStation T features a compact case and star-trail design. It has a 7 nm AMD Ryzen 4000G series processor.',
    '../Assets/Images/products/Huawei2.png',
    'huawei',
    7
  ),
  (
    9,
    5,
    5,
    'Lenovo SmartWatch 1',
    1,
    'Lenovo S2 Smart Watch. Display: 1.4inch IPS LCD 240*240pixels. Sensor: G-sensor,Heart Rate Sensor. Battery Capacity: 180mAh',
    '../Assets/Images/products/Lenovo1.jpg',
    'lenovo',
    6
  ),
  (
    10,
    5,
    5,
    'Lenovo SmartWatch 2',
    1,
    'Lenovo S2 Smart Watch. Display: 1.4inch IPS LCD 240*240pixels. Sensor: G-sensor,Heart Rate Sensor. Battery Capacity: 180mAh',
    '../Assets/Images/products/Lenovo2.jpg',
    'lenovo',
    50
  ),
  (
    11,
    6,
    6,
    'Samsung Earphone 1',
    1,
    'The all-plastic build feels cheap, but has its benefits by keeping the earphones lightweight, comfortable, and lest we forget: affordable.',
    '../Assets/Images/products/Samsung1.png',
    'samsung',
    10
  ),
  (
    12,
    6,
    6,
    'Samsung Earphone 2',
    1,
    'The all-plastic build feels cheap, but has its benefits by keeping the earphones lightweight, comfortable, and lest we forget: affordable.',
    '../Assets/Images/products/Samsung2.png',
    'samsung',
    20
  );
-- --------------------------------------------------------
--
-- Table structure for table `product_review`
--
CREATE TABLE IF NOT EXISTS `product_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(150) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_role` int(11) DEFAULT 2,
  PRIMARY KEY (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `wishlist`
--
CREATE TABLE IF NOT EXISTS `wishlist` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;