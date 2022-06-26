-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `details`, `image`, `active_status`) VALUES
(1, 'ssssssssssss', 'Sikder5767', 'Hi676', '', 0),
(2, 'Shakil Islam', 'Sikder', '1324dsd', '', 1),
(3, 'Shakil Saasas', 'Sikderaaasa', 'asasasa', '', 1),
(4, 'Shakill; AASwsew', 'sadsdfs23245456', 'sdsdasdsa354656', '', 0),
(5, 'SK', 'SKA', 'SAKS', '', 0),
(6, 'abc title', 'abc sub title', 'details', '1655834101.png', 1),
(7, 'Sasdad', 'Sikder', 'sdsaads', '1656012361.png', 1),
(8, 'Ttile', 'Sub Ttile', 'DetailsDetailsDetailsDetailsDetails', '1656174068.jpg', 1),
(9, 'TtileTtile', 'Sub TtileSub Ttile', 'DetailsDetailsDetailsDetails', '1656174115.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active_status`) VALUES
(1, 'Web Design & Development', 1),
(2, 'Web Development', 1),
(3, 'WordPress', 1),
(4, 'WooCommerce', 1),
(5, 'shopify', 1),
(6, 'shopify WooCommerce', 1),
(7, 'shopify WooCommerce Lms', 1),
(8, 'WooCommerce Lms', 1),
(9, 'shopify', 1),
(10, 'shopify 2121', 0),
(11, 'shopify', 1),
(12, 'shopify', 1),
(13, 'Landing page', 0),
(14, 'Web Design & Development qqqq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_massages`
--

CREATE TABLE `contact_massages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `massage` text NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 2 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_massages`
--

INSERT INTO `contact_massages` (`id`, `name`, `email`, `subject`, `massage`, `active_status`) VALUES
(1, 'Shakill adsad', 'shakil@gmail.com', 'PHP', 'Hi', 2),
(2, 'MD: Shakil Sikder', 'alorshikha24@gmail.com', 'cPanel', 'Hi', 0),
(3, 'MD: Shakil Sikder', 'alorshikha24@gmail.com', 'cPanel 2', 'cPanel 2cPanel 2cPanel 2cPanel 2', 0),
(4, 'MD: Shakil Sikder', 'alorshikha24@gmail.com', 'cPanel 2', 'contact_massagescontact_massages', 0),
(5, 'MD: Shakil Sikder', 'alorshikha24@gmail.com', 'cPanel', 'client_detalsclient_detals', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_detals` text NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `contact_title`, `contact_detals`, `icon_name`, `active_status`) VALUES
(1, 'Contact Title. Contact Title. Contact Title', 'Contact Detals.', 'Icon Name-0', 0),
(2, 'Contact Title. Contact Title. Contact Title', 'Contact Title. Contact Title. Contact Title', 'Icon Name2', 2),
(3, 'Contact Title. Contact Title. Contact Title5', 'Contact Title. Contact Title. Contact TitleContact Title. Contact Title. Contact TitleContact Title. Contact Title. Contact Title5', 'Icon Name5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `our_client`
--

CREATE TABLE `our_client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `client_detals` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `client_review` text NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `our_project`
--

CREATE TABLE `our_project` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` text DEFAULT NULL,
  `project_image` varchar(50) NOT NULL,
  `active_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_project`
--

INSERT INTO `our_project` (`id`, `category_id`, `project_name`, `project_link`, `project_image`, `active_status`) VALUES
(1, 0, 'http://localhost/user_admin/admin/ourProject/projetcAdd.php', '1655916037.png', '1655916037.png', 1),
(2, 0, 'http://localhost/user_admin/admin/ourProject/projetcAdd.php', '1655919246.png', '1655919246.png', 1),
(3, 5, 'LMS Website 12wew', 'http://localhost/user_admin/', '1655987550.png', 1),
(4, 2, 'Landing Page Design', 'www.fiverr.com/users/alor_shikha/', '1656004107.png', 0),
(5, 2, 'LMS Website 12', 'http://sadsds', '1656008071.png', 1),
(6, 2, 'LMS Website 12', 'http://localhost/user_admin/admin/ourProject/projetcAdd.php', '1656171664.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `services_detals` text NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  `design_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=InActive, 2=Active	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `services_detals`, `icon_name`, `design_status`) VALUES
(1, 'Business Strategy. Business Strategy.', 'icon flaticon-ideas', ' Lorem ipsum dolor sit amet, consectetur adipisici', 2),
(2, 'Service Name', 'Icon Name', 'Icon NameIcon', 1),
(3, 'Business Strategy. Business Strategy. Lorem ipsum dolor sit amet, consectetur ', 'Icon Name', 'Services Detals Lorem ipsum dolor sit amet, consec', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_massages`
--
ALTER TABLE `contact_massages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_client`
--
ALTER TABLE `our_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_project`
--
ALTER TABLE `our_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_massages`
--
ALTER TABLE `contact_massages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `our_client`
--
ALTER TABLE `our_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_project`
--
ALTER TABLE `our_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
