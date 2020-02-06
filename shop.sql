-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2020 at 07:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skprojekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

DROP TABLE IF EXISTS `cart_order`;
CREATE TABLE IF NOT EXISTS `cart_order` (
  `id_cart_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `order_text` text NOT NULL,
  `total_price` float NOT NULL,
  `status` enum('purchased','proccessing','sent') NOT NULL,
  PRIMARY KEY (`id_cart_order`),
  KEY `id_product` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_item`
--

DROP TABLE IF EXISTS `cart_order_item`;
CREATE TABLE IF NOT EXISTS `cart_order_item` (
  `id_cart_order_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_cart_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` smallint(6) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id_cart_order_item`),
  KEY `id_cart_order` (`id_cart_order`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'monitor'),
(2, 'mouse'),
(5, 'laptop'),
(28, 'keyboard');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id_groups` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`id_groups`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_groups`, `name`, `permissions`) VALUES
(1, 'Registered User', ''),
(2, 'Administrator', '{\"admin: 1\"}');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `updated_at` timestamp NOT NULL,
  `crated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `title`, `price`, `image`, `description`, `updated_at`, `crated_at`) VALUES
(1, 5, 'ASUS - ROG G531GT 15.12', 700, 'laptop1.jpg', 'Gaming Laptop - Intel Core i7 - 8GB Memory - NVIDIA GeForce GTX 1650 - 512GB Solid State Drive - Black', '2020-01-13 21:14:42', '2019-12-20 22:18:15'),
(2, 5, 'HP - 11', 200, 'laptop2.jpg', 'Touch-Screen Laptop - Intel Core i7 - 12GB Memory - 512GB SSD + 32GB Optane - Natural Silver, Sandblasted Anodized Finish', '2019-12-20 22:20:37', '2019-12-20 22:20:37'),
(3, 5, 'HP - ENVY x360 2-in-1 15.6', 900, 'laptop3.jpg', 'Touch-Screen Laptop - Intel Core i7 - 12GB Memory - 512GB SSD + 32GB Optane - Natural Silver', '2019-12-20 22:23:38', '2019-12-20 22:23:38'),
(5, 1, 'Dell - SE2717HR 26', 190, 'monitor1.jpg', 'IPS LED FHD FreeSync Monitor - Piano black', '2020-02-06 15:47:08', '2019-12-20 22:27:40'),
(6, 1, 'Samsung - CHG9 Series C49HG90DMN 49', 674, 'monitor2.jpg', 'HDR LED Curved FHD FreeSync Monitor - Matte dark blue black', '2019-12-20 22:30:09', '2019-12-20 22:30:09'),
(7, 1, 'Acer - SA230 23', 87, 'monitor3.jpg', 'IPS LED FHD Monitor - Black', '2019-12-20 22:31:24', '2019-12-20 22:31:24'),
(8, 1, 'ViewSonic - 32', 280, 'monitor4.jpg', 'LED Curved FHD FreeSync Monitor - Black', '2019-12-20 22:32:33', '2019-12-20 22:32:33'),
(9, 5, 'Lenovo - Yoga C940 2-in-1 14', 1200, 'laptop5.jpg', '4K Ultra HD Touch-Screen Laptop - Intel Core i7 - 16GB Memory - 512GB SSD + 32GB Optane - Mica', '2020-01-04 21:07:32', '2019-12-22 15:19:34'),
(12, 5, 'Dell - Inspiron 15.2', 1150, 'laptop6.jpg', '2-in-1 Touch-Screen Laptop - Intel Core i5 - 8GB Memory - 512GB SSD + 32GB Optane - Silver', '2020-01-04 23:55:09', '2020-01-04 23:54:43'),
(13, 2, 'Logitech - G602', 28, 'mouse1.jpg', 'Wireless Optical 11-Button Scrolling Gaming Mouse - Black', '2020-01-05 00:03:01', '2020-01-05 00:03:01'),
(15, 2, 'Razer  Mamba Elite ', 79, 'mouse2.jpg', 'Wired Optical Gaming Mouse - Black', '2020-01-05 14:48:38', '2020-01-05 14:48:38'),
(16, 1, 'Samsung - 390 Series 24', 169, 'monitor10.jpg', 'LED Curved FHD FreeSync Monitor - High glossy black', '2020-01-29 13:14:34', '2020-01-29 13:14:34'),
(17, 2, 'Microsoft - Wireless Mobile Mouse 3500 ', 7, 'mouse3.jpg', 'Loch Ness Gray', '2020-01-29 20:18:39', '2020-01-29 20:18:39'),
(46, 28, 'Razer', 45, 'key1.jpg', ' Razer Campus RGB', '2020-02-06 15:49:59', '2020-02-06 15:49:59'),
(50, 1, 'LG - UltraFine 27', 1300, '6362421_sd.jpg', ' IPS LCD 5K UHD Monitor', '2020-02-06 15:53:56', '2020-02-06 15:53:56'),
(52, 5, 'Acer - Nitro 22 3', 230, 'laptop4.jpg', ' Gaming Laptop - Intel Core i5 - 8GB Memory - NVIDIA GeForce GTX 1650 - 512GB Solid State Drive - Black', '2020-02-06 19:33:06', '2020-02-06 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_paypal`
--

DROP TABLE IF EXISTS `transactions_paypal`;
CREATE TABLE IF NOT EXISTS `transactions_paypal` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_paypal`
--

INSERT INTO `transactions_paypal` (`id_trans`, `user_id`, `payment_id`, `hash`, `complete`) VALUES
(27, 3, 'PAYID-LYR4EJY6XK11429YE308020D', 'beb70689553fc7ffdff273ad2b6d5aaf', 1),
(28, 3, 'PAYID-LYR4FHY63A03257HD141932F', 'c80c78d7cb0623612cb82c8d62260946', 1),
(29, 4, 'PAYID-LYSG2IQ4MV69800V6543505A', '36415bdbd26b302bc54f58ad6d52e13d', 1),
(30, 4, 'PAYID-LYSG3EI5HM03506DL685680U', 'af953cb03ef57a79294f1c51df741807', 1),
(31, 4, 'PAYID-LYSG5JY7PX69324X8163882L', '57a33044dca9d4b06f4ff3c828c57c57', 1),
(32, 4, 'PAYID-LYSHBCY9A6678684P763691R', '96b18f7f95d1bd87d71e356c2299e045', 1),
(33, 4, 'PAYID-LYSIBPY7JK12238UN472814E', 'c0e11cfcf7d2d34b9c19ceb12653a1c7', 1),
(34, 4, 'PAYID-LYWDPKA8E092164B10857916', '3a43567b5cc5a2f226ff27784efaebe7', 0),
(35, 6, 'PAYID-LYWJGSY81F27978FU484391C', '3899272c629ec77e3de7ae814c45e02d', 0),
(36, 6, 'PAYID-LYWJGUA0TB42314243599925', '5cd3c47d20941288aa9f7f43e9a0e7d8', 1),
(37, 6, 'PAYID-LYYHS7Y51514675C6777181T', '4dd218c99ea98d3b674fc0a303809aec', 0),
(38, 6, 'PAYID-LYY7GUQ19164014UR297131E', '47a3806867d908b6601930d28b13a98b', 0),
(39, 6, 'PAYID-LYY7HRA1MJ86595RN574602R', '3ed305a286e82b415cae0e8d8c7e95e6', 0),
(40, 6, 'PAYID-LYY7L4A8KU07698RN6244711', '18d893ff5575af4f2c1a18ad3e605810', 0),
(41, 6, 'PAYID-LY242JQ4LG65488S7807480K', '38f5b31fe471f8b2332d26c5e59d6115', 0),
(42, 6, 'PAYID-LY25UNI0LS381611X449883P', 'b714665dadaa10c65df3bc2f587cf316', 0),
(43, 6, 'PAYID-LY3B3YI0SJ60076X1316225N', '75e8c09f074b0c4fed485236a495053d', 1),
(44, 6, 'PAYID-LY3CVZQ9G183091NA228830F', '9d72f83c29b9d89629719cad42cbe8f9', 1),
(45, 11, 'PAYID-LY3MLEY3X64077262239533N', '23616463b192a5e7f05ff4f2eb7e2179', 1),
(46, 6, 'PAYID-LY3PHQY8MC91143TK783963P', 'e574bf73ff2b4a9c4964a87e8d197097', 1),
(47, 6, 'PAYID-LY3TDCQ2DT8138668172981J', 'd7d82dbf6142aef6107573b3dd794809', 0),
(48, 6, 'PAYID-LY46K7I8UR72318LX037871U', '3c73d42bf4535516a12e3ec391d0e874', 1),
(49, 6, 'PAYID-LY46NWI57R72094R2529061U', '0e91e6edf5728273aadd6760b7b4dce5', 1),
(50, 6, 'PAYID-LY46O4I56A0502020846694P', 'bf81d48c9e4b0d1669205fb59beb1756', 1),
(51, 6, 'PAYID-LY46PRA8EF17933E0788243T', '8b23abacba3a4c06fb4dba214830b8b9', 1),
(52, 6, 'PAYID-LY46QIY42V70234E79866249', '4e3c09557f8b35c1c31c64aa2e519a7f', 1),
(53, 6, 'PAYID-LY46RCI3RR12906EC5642607', '4c70ae3c0f1e36e3b6c3fd3f2e6e1c4e', 1),
(54, 6, 'PAYID-LY46THI1U696855CA1631055', '94bddd43e62f14b0b111ee957fe8b529', 1),
(55, 6, 'PAYID-LY464TI2MM51800VL289900F', '333613bd23fb6b34ec310c7b7a7b3d33', 1),
(56, 6, 'PAYID-LY47BRI5W004969YF6169448', 'fcb6296215848da7c5d64cccf1360c58', 1),
(57, 6, 'PAYID-LY47CTY1R63415812349332X', '3630fb312fc16c7dedc34431472c6bdc', 1),
(58, 6, 'PAYID-LY47DKQ2VX32400A2310250T', '94f77aaa130c40345315c7b7055374ee', 1),
(59, 6, 'PAYID-LY47KYI29990700UC459080H', '7d80d7514e04dbdcf6a91d7b4546495c', 1),
(60, 6, 'PAYID-LY6D2BA82339803W1558391C', '9dadca9fed118375fdb642c5ba71c291', 1),
(61, 6, 'PAYID-LY6D4AY9ST54107FX109415P', '8178dcb31981cfe0fc346429d37d56f5', 1),
(62, 6, 'PAYID-LY6D6MY9KP22214X39038533', '8d012c53dbcc60c059d48ccf82d2c8ff', 1),
(63, 6, 'PAYID-LY6EARY9GT83695TL229753H', 'e766120f1347de1b155a4942ca258d67', 1),
(64, 6, 'PAYID-LY6ESTA71K0830865902203B', 'e4478be61bc37556a9399890689a2e5f', 1),
(65, 6, 'PAYID-LY6EVIA55W251104B985581D', '6516f7e998ef60fd597ae631e1254834', 1),
(66, 6, 'PAYID-LY6EWGA14X735360H488784T', '52bfa8918b1a6b64907eec4fac09165a', 1),
(67, 6, 'PAYID-LY6EXGI0JT65702WL6870317', '09d3d5d49d01069ba761358b85a9c23a', 1),
(68, 6, 'PAYID-LY6EYSQ7SK09472MD9230347', '8f97ceba6433558d0e181adcae572f85', 1),
(69, 6, 'PAYID-LY6EZOQ0ED16216A8996674X', '1a787a75b430f4ed4d1ff00338badc59', 1),
(70, 6, 'PAYID-LY6EZ2Q28E92628Y2055825J', 'a76ea252949aad5a1a7ffbdf76ae586a', 1),
(71, 6, 'PAYID-LY6FJPY70H721604H550921A', 'c383057949b54c1022c0ce030a4b5635', 1),
(72, 6, 'PAYID-LY6F5JA8NX02198FD4069059', '5cb925987713cddb3b296e34d0889772', 1),
(73, 6, 'PAYID-LY6GJBI7HY37579UX783393P', '3099b97a2a33389e8c467a09f91d8a4d', 1),
(74, 6, 'PAYID-LY6GNMA3AE31891FY019193X', 'a49c146182baf84e9c3f69dd3e9dc7c9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_groups` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vkey` varchar(50) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `joined` date NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_groups` (`id_groups`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_groups`, `name`, `email`, `password`, `vkey`, `verified`, `joined`) VALUES
(6, 1, 'srdjan', 'zaricsrdjan10@gmail.com', 'wtSHSU890381IC412344CITAcywut46a', '50b2d45af7e7fb492b7c3daa1bcab29e', 1, '2020-01-25'),
(10, 2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2020-01-29'),
(11, 1, 'fudi', 'foodlet101@gmail.com', 'wtSHSU890381IC4srdjan4CITAcywut46a', '7e5a472651465a3130e3488233e178d5', 1, '2020-02-02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD CONSTRAINT `user_fkkk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `groups_fk` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id_groups`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
