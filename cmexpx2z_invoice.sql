-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2023 at 05:18 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmexpx2z_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `fax_no` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `customer_id`, `address`, `country`, `state`, `city`, `zip_code`, `fax_no`, `created_at`, `updated_at`) VALUES
(14, 13, 'dungarpur rajasthan', 'India (+91)', 'rajasthan', 'dungarpur', '314001', '2525285', '2020-07-07 07:15:16', '2020-07-17 01:29:04'),
(15, 14, 'sadsa', 'India (+91)', 'a', 'dungarpur', '314001', '2525285', '2020-07-07 07:16:58', '2020-07-08 10:15:02'),
(16, 15, 'street no1', 'Algeria (+213)', 'Gujarat', 'Ahmedabad', '26', '155', '2020-07-08 12:35:02', '2020-07-08 12:35:02'),
(17, 16, 'Kariya , street no 2', 'United Arab Emirates (+971)', 'Gujarat', 'Ahmedabad', '014', '15245', '2020-07-08 03:30:22', '2020-07-08 03:30:22'),
(18, 17, 'ahemdabad gujrat', 'India (+91)', 'rajasthan', 'ahemdabad', '314001', '2525285', '2020-07-09 02:36:34', '2020-07-09 02:36:34'),
(19, 18, '146 East Second Boulevard', 'Faroe Islands (+298)', 'Corrupti veritatis ', 'Laborum omnis nostru', '39298', '+1 (222) 454-8186', '2021-12-07 06:02:10', '2021-12-07 06:02:10'),
(20, 19, '350 West Rocky Hague Court', 'Bolivia (+591)', 'Pariatur Est quis o', 'Anim duis doloremque', '56232', '+1 (708) 577-9508', '2021-12-08 01:34:37', '2021-12-08 01:45:44'),
(22, 21, '61 Milton Freeway', 'Gabon (+241)', 'Inventore dolor numq', 'Ea eligendi tenetur ', '87540', '+1 (423) 627-1502', '2021-12-15 02:54:23', '2021-12-15 02:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_number`
--

CREATE TABLE `contact_number` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `office_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(255) NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`) VALUES
(1, 'INR(indian Ruppies)'),
(2, 'Dollar'),
(3, 'Yen'),
(4, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `salutaion` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `office_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `textarea` varchar(1500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `salutaion`, `first_name`, `last_name`, `company_name`, `customer_email`, `office_number`, `mobile_number`, `website`, `currency`, `textarea`, `created_at`, `updated_at`) VALUES
(13, 1, 'Mr', 'shahid', 'abdul rahman', 'cmexpertise', 'sahid.cmexpertise@gmail.com', '2964230032', '9950612429', 'http://www.cmexpertise.com', 'Dollar', 'hekoo its etesting', '2020-07-07 07:15:16', '2020-07-17 01:29:04'),
(14, 1, 'Mr', 'pratick', 'shah', 'infotech', 'hello.cmexpertise@gmail.com', '2964230032', '9950612429', 'http://www.cmexpertise.com', 'Dollar', 'asdasd', '2020-07-07 07:16:58', '2020-07-08 10:15:02'),
(15, 1, 'Mr', 'john', 'jun', 'cmexpertise infotech', 'cmexpertise@gmail.com', '0245154715', '9698588455', 'http://google.com', 'Yen', 'testing', '2020-07-08 12:35:02', '2020-07-08 12:35:02'),
(16, 1, 'Mr', 'Bart', 'Reay', 'cmexpertise Infotech', 'cmexpertise@gmail.com', '0245153452', '8544527621', 'http://google.com', 'Dollar', 'fweew', '2020-07-08 03:30:22', '2020-07-08 03:30:22'),
(17, 6, 'Mr', 'bran', 'lara', 'cmexpertise', 'lara@gmail.com', '1234567890', '1234569870', 'http://cmexpertiseinfotech.com', 'Dollar', 'asdfasdf', '2020-07-09 02:36:34', '2020-07-09 02:36:34'),
(18, 7, 'Mrs', 'Jarrod', 'Pierce', 'Porter and Nichols LLC', 'gucufizy@mailinator.com', '9876543215', '9876543215', 'https://www.wajyqoniqe.org', 'INR(indian Ruppies)', 'Occaecat consequatur', '2021-12-07 06:02:10', '2021-12-07 06:02:10'),
(19, 8, 'Miss', 'Ivor3', 'Weaver', 'Mullen and Turner Associatess', 'sinawesul@mailinator.com', '9876543215', '9876543215', 'https://www.meqery.info', 'Dinner', 'Aut quia anim quo no', '2021-12-08 01:34:37', '2021-12-08 01:45:44'),
(21, 8, 'Mr', 'Damian', 'Walls', 'Levy and Valenzuela Trading', 'mebyw@mailinator.com', '9578596969', '7894561235', 'https://www.viwyzid.me', 'Dollar', 'Quaerat a iusto cupi', '2021-12-15 02:54:23', '2021-12-15 02:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_project`
--

CREATE TABLE `customer_project` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_detail` varchar(255) NOT NULL,
  `hours` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `terms` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  `customer_notes` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `adjusment` varchar(255) NOT NULL,
  `adjusment_price` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `term_condition` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `after_discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_id`, `user_id`, `invoice_no`, `invoice_date`, `terms`, `due_date`, `subject`, `customer_notes`, `sub_total`, `adjusment`, `adjusment_price`, `discount`, `total_discount`, `discount_type`, `term_condition`, `total`, `created_at`, `updated_at`, `after_discount`) VALUES
(44, 13, 1, 'INV-1827677376', '2020-07-07', 'test', '2020-07-07', 'dszfds', 'asdas', '1452.00', '', '', 10, '145.20', 'percent', 'as', '1306.8', '2020-07-07 07:49:12', '2020-07-08 06:17:26', '1306.8'),
(45, 13, 1, 'INV-1351364859', '2020-07-08', 'test', '2020-07-08', 'sds sdf', 'asdas', '594.00', '', '', 100, '100', 'doller', 'sadas', '494', '2020-07-08 10:43:26', '2020-07-10 06:13:45', '494'),
(46, 13, 1, 'INV-1351364859', '2020-07-08', 'test', '2020-07-08', 'sds sdf', 'asdas', '714.00', '', '', 100, '100', 'doller', 'sadas', '614', '2020-07-08 11:02:33', '2020-07-10 05:53:59', '614'),
(47, 13, 1, 'INV-100003', '2020-07-08', '62', '2020-07-08', 'asddsamu', 'vgrdfrfmy', '2169.00', '', '100', 69, '69', 'doller', 'akuybc def', '2000', '2020-07-08 12:31:03', '2020-07-08 05:09:21', '2100'),
(48, 13, 1, 'INV-21533379', '2020-07-08', 'test', '2020-07-08', 'Invoice for website', 'Thank for your business', '120000.00', 'test', '10000', 25, '30000.00', 'percent', 'abcd poiu', '80000', '2020-07-08 03:19:47', '2020-07-10 06:29:20', '90000'),
(49, 17, 6, 'INV-1682793633', '2020-07-09', 'due', '2020-07-09', 'sadsa', 'dsa', '144.00', '', '', 10, '10', 'doller', 'sadas', '134', '2020-07-09 02:39:18', '2020-07-09 02:39:18', '134'),
(50, 19, 8, 'INV-1424083017', '2021-12-15', '12', '2021-12-17', 's test', 'hell', '360.00', '', '', 36, '36.00', 'percent', '', '324.00', '2021-12-15 10:46:31', '2021-12-15 10:46:31', '324.00'),
(51, 19, 8, 'Dolore repellendus ', '1980-01-12', '09-Aug-2013', '1973-12-19', 'Et nihil ad in aut o', 'Consectetur providen', '40.00', '', '', 4, '4.00', 'percent', 'Consequat Omnis nob', '36.00', '2021-12-15 01:56:39', '2021-12-15 01:56:39', '36.00'),
(52, 19, 8, 'Incidunt odio nihil', '2003-12-19', '30-May-1996', '2001-10-14', 'Delectus perspiciat', 'Quo fuga Cumque del', '100.00', '', '', 0, '0.00', 'doller', 'Nihil dolore animi ', '100.00', '2021-12-16 03:51:44', '2021-12-16 03:51:44', '100.00'),
(53, 21, 8, 'INV-160460181', '1993-08-04', '15', '2010-12-04', 'Deleniti animi duci', 'Aliquid quam assumen', '100.00', '', '', 0, '0.00', 'doller', 'Dicta sint consecte', '100.00', '2021-12-16 03:53:13', '2021-12-16 03:53:13', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_client_email`
--

CREATE TABLE `invoice_client_email` (
  `id` int(255) NOT NULL,
  `invoice_id` int(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_client_email`
--

INSERT INTO `invoice_client_email` (`id`, `invoice_id`, `client_email`, `created_at`, `updated_at`) VALUES
(67, 45, 'sahid.cmexpertise@gmail.com', '2020-07-08 10:43:26', '2020-07-10 06:13:45'),
(68, 46, 'sahid.cmexpertise@gmail.com', '2020-07-08 11:02:33', '2020-07-10 05:53:59'),
(70, 48, 'sahid.cmexpertise@gmail.com', '2020-07-08 03:19:47', '2020-07-10 06:29:20'),
(73, 47, 'vivek.cmexpertise@gmail.com', '2020-07-08 05:09:21', '2020-07-08 05:09:21'),
(74, 47, 'sahid.cmexpertise@gmail.com', '2020-07-08 05:09:21', '2020-07-08 05:09:21'),
(75, 47, 'cmexpertise@gmail.com', '2020-07-08 05:09:21', '2020-07-08 05:09:21'),
(76, 44, 'vivek.cmexpertise@gmail.com', '2020-07-08 05:50:23', '2020-07-08 06:17:26'),
(77, 44, 'sahid.cmexpertise@gmail.com', '2020-07-08 05:50:23', '2020-07-08 06:17:26'),
(78, 49, 'lara@gmail.com', '2020-07-09 02:39:18', '2020-07-09 02:39:18'),
(79, 50, 'sahid.cmexpertise@gmail.com', '2021-12-15 10:46:31', '2021-12-15 10:46:31'),
(80, 51, 'kunal.cmexpertise@gmail.com', '2021-12-15 01:56:39', '2021-12-15 01:56:39'),
(81, 52, 'sinawesul@mailinator.com', '2021-12-16 03:51:44', '2021-12-16 03:51:44'),
(82, 53, 'mebyw@mailinator.com', '2021-12-16 03:53:13', '2021-12-16 03:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_project`
--

CREATE TABLE `invoice_project` (
  `id` int(255) NOT NULL,
  `invoice_id` int(255) NOT NULL,
  `project_selection` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_project`
--

INSERT INTO `invoice_project` (`id`, `invoice_id`, `project_selection`, `item_details`, `hours`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(71, 44, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '121', '12', '1452.00', '2020-07-07 07:49:12', '2020-07-08 06:17:26'),
(72, 45, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '12', '12', '144.00', '2020-07-08 10:43:26', '2020-07-10 06:13:45'),
(73, 45, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '45', '10', '450.00', '2020-07-08 10:43:26', '2020-07-10 06:13:45'),
(76, 46, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '12', '12', '144.00', '2020-07-08 11:22:13', '2020-07-10 05:53:59'),
(77, 46, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '45', '10', '450.00', '2020-07-08 11:22:13', '2020-07-10 05:53:59'),
(78, 46, 'insta Order', 'testing', '10', '12', '120.00', '2020-07-08 11:22:13', '2020-07-10 05:53:59'),
(80, 47, 'Ecommaerce website ', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their custome', '10', '200', '2000.00', '2020-07-08 03:00:37', '2020-07-08 05:09:21'),
(81, 47, 'online invoive managment', 'The primary goal of an e-commerce site is to sell goods online. This project deals with developing an e-commerce website for Online Product Sale. It provides the user with a catalog of different product available for purchase in the store. In order to fac', '13', '13', '169.00', '2020-07-08 03:00:37', '2020-07-08 05:09:21'),
(82, 48, 'Ecommaerce website ', 'The primary goal of an e-commerce site is to sell goods online. This project deals with developing an e-commerce website for Online Product Sale. It provides the user with a catalog of different product available for purchase in the store. In order to fac', '80', '1500', '120000.00', '2020-07-08 03:19:47', '2020-07-10 06:29:20'),
(83, 49, 'Ecommaerce website ', 'sajd nbasdgh jhasd sdbahd hgsd jnasgd asjdg dn', '12', '12', '144.00', '2020-07-09 02:39:18', '2020-07-09 02:39:18'),
(84, 50, 'Theodore Velasquez', 'Ut adipisci adipisic', '15', '24', '360.00', '2021-12-15 10:46:31', '2021-12-15 10:46:31'),
(85, 51, 'Perferendis quia adi', 'Veritatis voluptatum', '5', '8', '40.00', '2021-12-15 01:56:39', '2021-12-15 01:56:39'),
(86, 52, 'Ad ratione autem dol', 'Dicta veniam except', '2', '50', '100.00', '2021-12-16 03:51:44', '2021-12-16 03:51:44'),
(87, 53, 'Doloremque nemo fuga', 'Assumenda consectetu', '2', '50', '100.00', '2021-12-16 03:53:13', '2021-12-16 03:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `decription` text NOT NULL,
  `customer_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `billing_method` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `decription`, `customer_id`, `user_id`, `billing_method`, `created_at`, `updated_at`) VALUES
(10, 'online invoive managment', 'This project aims at developing a robust online invoicing application based on the Software as a Service model. ... In addition to generating and sending invoices in an easy and automated fashion, the sys- tem will enable its users to manage their customer information, stock details, orders and sales more effectively', 13, 1, 'Give Dedicated', '2020-07-07 07:22:22', '2020-07-07 07:26:51'),
(11, 'Ecommaerce website ', 'The primary goal of an e-commerce site is to sell goods online. This project deals with developing an e-commerce website for Online Product Sale. It provides the user with a catalog of different product available for purchase in the store. In order to facilitate online purchase a shopping cart is provided to the user', 14, 1, 'Time and Material', '2020-07-07 07:28:34', '2020-07-07 07:28:45'),
(12, 'insta Order', 'testing', 13, 1, 'Give Dedicated', '2020-07-07 08:20:08', '2020-07-07 08:28:51'),
(13, 'laundry application', 'Develop Application to easily find nearly Laundry Service and Dry Cleaning.', 16, 1, 'Time and Material', '2020-07-08 06:09:37', '2020-07-08 06:09:37'),
(14, 'Ecommaerce website ', 'sajd nbasdgh jhasd sdbahd hgsd jnasgd asjdg dn', 17, 6, 'Give Dedicated', '2020-07-09 02:37:53', '2020-07-09 02:37:53'),
(16, 'Theodore Velasquez', 'Ut adipisci adipisic', 14, 8, 'Time and Material', '2021-12-08 07:15:00', '2021-12-14 02:32:04'),
(18, 'Accounts', 'Keep accounts clean', 19, 8, 'Time and Material', '2021-12-16 06:09:38', '2021-12-18 12:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_task_section`
--

CREATE TABLE `project_task_section` (
  `id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_task_section`
--

INSERT INTO `project_task_section` (`id`, `project_id`, `task`, `created_at`, `updated_at`) VALUES
(23, 10, 'sadsada', '2020-07-07 07:24:53', '2020-07-07 07:26:51'),
(24, 10, 'xyz ', '2020-07-07 07:24:53', '2020-07-07 07:26:51'),
(25, 11, 'xyz edit', '2020-07-07 07:28:34', '2020-07-07 07:28:45'),
(26, 12, 'xyz edit', '2020-07-07 08:20:08', '2020-07-07 08:28:51'),
(27, 12, 'sss', '2020-07-07 08:20:08', '2020-07-07 08:28:51'),
(28, 13, 'dry clean', '2020-07-08 06:09:37', '2020-07-08 06:09:37'),
(29, 14, 'xyz ', '2020-07-09 02:37:53', '2020-07-09 02:37:53'),
(31, 16, 'Qui ipsam sed qui ve', '2021-12-08 07:15:00', '2021-12-14 02:32:04'),
(34, 18, 'Reiciendis est dolor', '2021-12-16 06:09:38', '2021-12-18 12:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_user_section`
--

CREATE TABLE `project_user_section` (
  `id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_user_section`
--

INSERT INTO `project_user_section` (`id`, `project_id`, `user_email`, `user`, `created_at`, `updated_at`) VALUES
(43, 10, 'pratick.cmexpertise@gmail.com', 'shahid.cmexpertise.@gmail.com', '2020-07-07 07:22:22', '2020-07-07 07:26:51'),
(44, 11, 'do@gmail.com', 'pratick.cmexoertise@gmail.com', '2020-07-07 07:28:34', '2020-07-07 07:28:45'),
(46, 12, 'pratick.cmexpertise@gmail.com', 'shahid.cmexpertise.@gmail.com', '2020-07-07 08:28:51', '2020-07-07 08:28:51'),
(47, 12, 'sss@gmail.com', 'm@gmail.co', '2020-07-07 08:28:51', '2020-07-07 08:28:51'),
(48, 13, 'cmexpertise@gmail.com', 'Minesh', '2020-07-08 06:09:37', '2020-07-08 06:09:37'),
(49, 14, 'lara@gmail.com', 'bran lara', '2020-07-09 02:37:53', '2020-07-09 02:37:53'),
(54, 16, 'xopyxar@mailinator.com', 'qwerty', '2021-12-14 02:30:43', '2021-12-14 02:32:04'),
(55, 16, 'sasa@gmail.com', 'sdasdasd', '2021-12-14 02:30:43', '2021-12-14 02:32:04'),
(56, 18, 'fesidaz@mailinator.com', 'Iste et qui sit ea e', '2021-12-16 06:09:38', '2021-12-18 12:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'shahid', 'abdul rahman', 'sahid.cmexpertise@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '2020-06-15 11:20:00', '2020-07-10 06:06:17'),
(2, 'admin', 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '2020-06-15 07:21:10', '2020-06-15 07:21:10'),
(6, 'abc', 'xyz', 'xyz@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '2020-07-09 02:32:11', '2020-07-09 02:32:11'),
(7, 'kunal', 'chauhan', 'kunal.cmexpertise@gmail.com', 'b8a20fd3a3b7c71d711e836f5310cc09', '', '2021-12-06 05:14:41', '2021-12-08 01:32:21'),
(8, 'sample', 'sample', 'sample@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-12-08 01:33:54', '2021-12-08 01:33:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `contact_number`
--
ALTER TABLE `contact_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_project`
--
ALTER TABLE `customer_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `invoice_client_email`
--
ALTER TABLE `invoice_client_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_project`
--
ALTER TABLE `invoice_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_task_section`
--
ALTER TABLE `project_task_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_user_section`
--
ALTER TABLE `project_user_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_number`
--
ALTER TABLE `contact_number`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_project`
--
ALTER TABLE `customer_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `invoice_client_email`
--
ALTER TABLE `invoice_client_email`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `invoice_project`
--
ALTER TABLE `invoice_project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_task_section`
--
ALTER TABLE `project_task_section`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `project_user_section`
--
ALTER TABLE `project_user_section`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD CONSTRAINT `customer_id_billing_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_number`
--
ALTER TABLE `contact_number`
  ADD CONSTRAINT `user_id_contact_user_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `users_id_curency_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `customer_id_invoice_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_invoice_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_client_email`
--
ALTER TABLE `invoice_client_email`
  ADD CONSTRAINT `invoice_client_email_invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_project`
--
ALTER TABLE `invoice_project`
  ADD CONSTRAINT `invoice_id_invoice_project` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `customer_id_project_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_project_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_task_section`
--
ALTER TABLE `project_task_section`
  ADD CONSTRAINT `project_id_project_taski_section_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_user_section`
--
ALTER TABLE `project_user_section`
  ADD CONSTRAINT `project_id_project_user_section_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
