-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2013 at 04:43 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tarea4_tics`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`) VALUES
(1, 'Credit Card'),
(3, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `published_by` int(11) NOT NULL,
  `img_src` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_references_user_with_published_by` (`published_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `published_at`, `published_by`, `img_src`) VALUES
(6, 'Howling Wolf', 'Descripcion', 4990, 5, '2013-06-02 20:06:51', 10, '396023_312074655-tsrms105_b.jpg'),
(7, 'Inu Princess', 'Descripcion', 4990, 5, '2013-06-02 20:21:27', 10, '3347216_11053304-tsrmw104_b.jpg'),
(8, 'Angry Cat Pillow', 'Descripcion', 8990, 3, '2013-06-02 20:22:45', 12, '3427806_8314320-plwfr2_b.jpg'),
(9, 'Too Old For This Shit', 'Descripcion', 4990, 5, '2013-06-02 20:23:44', 12, '366371_312354947-tsrms102_b.jpg'),
(10, 'Growlithe', 'Descripcion', 9990, 4, '2013-06-02 20:24:33', 12, '3554516_12393666-sswtz014_b.jpg'),
(11, 'High Dali', 'Descripcion', 4990, 6, '2013-06-02 20:25:13', 10, '3655800_5803046-tsrws102_b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_sales`
--

CREATE TABLE IF NOT EXISTS `products_sales` (
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`sale_id`),
  KEY `fk_products_sales_references_products_with_product_id` (`product_id`),
  KEY `fk_products_sales_references_sales_with_sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sales_references_users_with_user_id` (`user_id`),
  KEY `fk_sales_references_payment_methods_with_payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `rut` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `registered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `accessed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_references_user_types_with_user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `username`, `password`, `firstname`, `lastname`, `rut`, `address`, `phone`, `email`, `registered_at`, `accessed_at`) VALUES
(7, 7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '2013-05-26 05:44:46', NULL),
(10, 1, 'jurzua', '20c09166635ee087229508d449b44a7b', 'Jonathan', 'Urzua', '9.999.999-9', 'Calle del valle 1234', '+5698889992', 'jurzua@jurzua.cl', '2013-06-02 19:36:48', '0000-00-00 00:00:00'),
(11, 3, 'jmaguilera', '09ce555a2aba0973b125e354ee68f4c4', 'Jose Manuel', 'Aguilera', '6.666.666-6', 'Calle del monje 1234', '+5697878787', 'jmaguilera@jmaguilera', '2013-06-02 19:38:46', '0000-00-00 00:00:00'),
(12, 1, 'avega', 'e6a21db1d51a891d72f6a71534a87244', 'Alfredo Emiliano', 'Vega', '5.555.555-5', 'Calle del monasterio 1234', '+5692342345', 'avega@avega', '2013-06-02 19:39:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'Provider'),
(3, 'Client'),
(7, 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`published_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products_sales`
--
ALTER TABLE `products_sales`
  ADD CONSTRAINT `products_sales_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_references_payment_methods_with_payment_method_id` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_references_user_types_with_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
