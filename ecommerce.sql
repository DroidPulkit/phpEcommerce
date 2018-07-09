-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 11:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `picture`) VALUES
(1, 'clothing', 'All the clothing for men and women', ''),
(2, 'Shoes', 'All the shoes for everyone', ''),
(3, 'accessories', 'All kind of accessories', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 2, 5),
(2, 1, 10, 2),
(3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `description` varchar(850) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `category_id`, `description`, `picture`) VALUES
(1, 'Tommy Hilfiger Mens Two Button Pinstripe Blazer', '97.88', 1, '<li>98% Cotton, 2% Spandex</li> <li>Dry Clean Only</li> <li>Trim fit, fully lined jacket</li>\r\n<li>Great seasonal fabric</li>', 'cloth1_1, cloth1_2'),
(2, 'Levi\'s Men\'s The Trucker Jacket', '88.17', 1, '<li>100% Cotton</li>\r\n<li>Button closure</li>\r\n<li>Machine Wash</li>\r\n<li>With a hem that hits below the waist and welt hand pockets</li>\r\n<li>Standard fit</li>\r\n', 'cloth2_1, cloth2_2'),
(3, 'Yumi Kim Womens Kennedy Dress', '203.82', 1, '<li>Fabric: 100% Polyester</li>\r\n<li>Tie closure</li>\r\n<li>Dry Clean Only</li>\r\n<li>Details include a flattering crossover neckline, self-tie waist, and hidden snap chest closure</li>\r\n<li>Fabric: 100 percent polyester chiffon length: top of shoulder to hem 35 inch</li>', 'cloth3_1, cloth3_2'),
(4, 'Ella Moss Womens Velvet Long Sleeves Bomber Jacket', '259.99', 1, '<li>100% Polyester</li>\r\n<li>Zipper closure</li>\r\n<li>Velvet</li>\r\n<li>Long Sleeves</li>\r\n<li>Coat</li>\r\n<li>China</li>', 'cloth4_1, cloth4_2'),
(5, 'PUMA Men\'s Tazon 6 Fm Cross-Trainer Shoe', '67.98', 2, '<li>Synthetic Leather</li>\r\n<li>Rubber sole</li>\r\n<li>Shaft measures approximately 2.75\" from arch</li>\r\n<li>Run-Train Performance Sneaker</li>\r\n<li>Tazon</li>', 'shoe1_1, shoe1_2'),
(6, 'adidas Questar BYD Sneakers, Core', '39.39', 2, '<li>Textile and Synthetic</li>\r\n<li>Rubber sole</li>\r\n<li>These shoes go beyond the ordinary with a two-tone mesh upper and embroidered details</li>\r\n<li>An adidas sneaker that responds to you</li>\r\n<li>Tpu on the heel finishes the sleek design</li>\r\n<li>Mesh upper provides breathability</li>\r\n<li>Cushioned with resilient cloud foam</li>', 'shoe2_1, shoe2_2'),
(7, 'Under Armour Men\'s Rapid Sneaker', '75.99', 2, '<li>Synthetic</li>\r\n<li>Rubber sole</li>\r\n<li>Shaft measures approximately low-top from arch</li>\r\n<li>Flexible knit upper for the ultimate in lightweight comfort</li>', 'shoe3_1, shoe3_2'),
(8, 'PUMA Men\'s Tsugi APEX Running Shoes', '54.69', 2, '<li>Synthetic</li>\r\n<li>Rubber sole</li>\r\n<li>Shaft measures approximately low-top from arch</li>\r\n<li>Injection-molded ethylene-vinyl acetate midsole for lightweight performance</li>\r\n<li>Heel pull tab for easy on/off</li>', 'shoe4_1, shoe4_2'),
(9, 'Versus by Versace', '237.78', 3, '<li>Case size: 45mm</li>\r\n<li>Water resistant to 50m</li>\r\n<li>Quartz Movement</li>\r\n<li>Case Diameter: 45mm</li>', 'accessories1_1, accessories1_2'),
(10, 'ATTCL Hot Classic Aviator Polarized Sunglasses', '24.98', 3, '<li>metal frame</li>\r\n<li>Composite lens</li>\r\n<li>polarized</li>\r\n<li>Lens width: 64 millimeters</li>\r\n<li>Shatterproof Polycarbonate lens</li>', 'accessories2_1, accessories2_2'),
(11, 'Versace Women Swiss Quartz', '166.55', 3, '<li>Swiss made</li>\r\n<li>Palazzo empire</li>\r\n<li>Swiss-quartz Movement</li>\r\n<li>Case Diameter: 39mm</li>', 'accessories3_1, accessories3_2'),
(12, 'Samsonite Omni PC Hardside Spinner 20', '84.44', 3, '<li>Micro-diamond texture is extremely scratch-resistant, keeping cases beautiful after a trip</li>\r\n<li>Re-engineered lightweight spinner wheels for effortless mobility</li>\r\n<li>Consumer preferred expansion on all sides</li>', 'accessories4_1, accessories4_2');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Amazing Mart Store 1', '1019 Sheppard Ave E, North York, ON', 43.767792, -79.367691),
(2, 'Amazing Mart Store 2', '26 Golden Gate Ct, Scarborough, ON M1P 3A5', 43.771866, -79.263763),
(3, 'Amazing Mart Store 3', '1107 Woodbine Ave, East York, ON', 43.689499, -79.314194),
(4, 'Amazing Mart Store 4', '3580 Rutherford Rd #98, Woodbridge, ON', 43.827576, -79.550697),
(5, 'Amazing Mart Store 5', '1001 Islington Avenue South, Etobicoke, ON', 43.630001, -79.518028),
(6, 'Current Location', '', 43.773258, -79.335899);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `gender` int(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `sum` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `phone`, `gender`, `dob`, `address`, `sum`) VALUES
('pulkitkumar190@gmail.com', 'test', 'Pulkit Kumar', 2147483647, 0, '2018-07-10', '190 Sewak Colony, Patiala', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
