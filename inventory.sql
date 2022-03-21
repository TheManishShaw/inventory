-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 12:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `alter_tbl`
--

CREATE TABLE `alter_tbl` (
  `alt_id` int(11) NOT NULL,
  `alt_uid` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_old` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_new` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_tbl` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_field` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_date` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_time` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tbl`
--

CREATE TABLE `auth_tbl` (
  `auth_id` int(20) NOT NULL,
  `u_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_page` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_status` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_ip` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_stamp` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cat_id` int(11) NOT NULL,
  `cat_brand` varchar(250) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_uset` int(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dash_tbl`
--

CREATE TABLE `dash_tbl` (
  `dash_id` int(11) NOT NULL,
  `dash_data` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dash_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dash_grp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dash_status` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dash_timestamp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navc_tbl`
--

CREATE TABLE `navc_tbl` (
  `navc_id` int(11) NOT NULL,
  `navc_data` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_grp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_status` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navc_timestamp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navm_tbl`
--

CREATE TABLE `navm_tbl` (
  `navm_id` int(11) NOT NULL,
  `navc_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_data` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_grp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_status` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_level` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navm_timestamp` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_tbl`
--

CREATE TABLE `roles_tbl` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_status` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_stamp` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_tbl`
--

CREATE TABLE `tax_tbl` (
  `tax_id` int(20) NOT NULL,
  `tax_name` varchar(100) NOT NULL,
  `tax_percent` varchar(100) NOT NULL,
  `default` varchar(100) NOT NULL,
  `u_set` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(11) NOT NULL,
  `f_name` varchar(500) DEFAULT NULL,
  `l_name` varchar(500) DEFAULT NULL,
  `email_id` varchar(500) DEFAULT NULL,
  `tel_no` varchar(500) DEFAULT NULL,
  `pass_id` varchar(500) DEFAULT NULL,
  `u_type` varchar(500) DEFAULT NULL,
  `business_name` varchar(250) NOT NULL,
  `gst_num` varchar(250) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `u_location` varchar(500) DEFAULT NULL,
  `u_city` varchar(500) DEFAULT NULL,
  `u_stats` varchar(500) DEFAULT NULL,
  `u_pic` varchar(500) DEFAULT '',
  `u_set` varchar(500) DEFAULT NULL,
  `u_timestamp` varchar(500) DEFAULT NULL,
  `u_mstats` varchar(500) DEFAULT NULL,
  `u_estats` varchar(500) DEFAULT NULL,
  `u_lastlogin` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uset_tbl`
--

CREATE TABLE `uset_tbl` (
  `uset_id` int(11) NOT NULL,
  `uset_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uset_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uset_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uset_site` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `uset_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `uset_pincode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uset_gst_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uset_image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uset_status` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'active',
  `uset_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uset_obj` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uset_created_at` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `uset_updated_at` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uset_deleted_at` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_brands`
--

CREATE TABLE `_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(192) NOT NULL,
  `description` varchar(192) DEFAULT NULL,
  `image` varchar(192) DEFAULT NULL,
  `u_set` varchar(500) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tbladjustment`
--

CREATE TABLE `_tbladjustment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(500) NOT NULL,
  `adj_id` varchar(100) NOT NULL,
  `uset_id` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tbladjustment_details`
--

CREATE TABLE `_tbladjustment_details` (
  `id` int(11) NOT NULL,
  `adj_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adj_type` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblproducts`
--

CREATE TABLE `_tblproducts` (
  `id` int(15) NOT NULL,
  `u_set` int(15) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type_barcode` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `category_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL,
  `unit_id` int(15) NOT NULL,
  `sale_unit_id` int(15) NOT NULL,
  `purchase_unit_id` int(15) NOT NULL,
  `stock_alert` int(10) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `tax` int(10) NOT NULL,
  `tax_method` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `note` varchar(500) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblpurchase`
--

CREATE TABLE `_tblpurchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `uset` int(11) NOT NULL,
  `net_tax` double NOT NULL,
  `discount` double NOT NULL,
  `discount_method` varchar(250) NOT NULL,
  `total_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `split_amount` double NOT NULL,
  `split_payment_method` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblpurchase_details`
--

CREATE TABLE `_tblpurchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `net_tax` double NOT NULL,
  `total_amount` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `u_set` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblsales`
--

CREATE TABLE `_tblsales` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `sale_id` varchar(250) NOT NULL,
  `is_pos` int(15) NOT NULL,
  `client_id` int(15) NOT NULL,
  `uset` int(15) NOT NULL,
  `net_tax` double NOT NULL,
  `discount` double NOT NULL,
  `discount_method` varchar(250) NOT NULL,
  `total_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `split_amount` varchar(200) NOT NULL,
  `split_payment_method` varchar(200) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `invoice_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`invoice_data`)),
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblsales_details`
--

CREATE TABLE `_tblsales_details` (
  `id` int(11) NOT NULL,
  `sale_id` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `net_tax` double NOT NULL,
  `total_amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `u_set` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tblunits`
--

CREATE TABLE `_tblunits` (
  `id` int(11) NOT NULL,
  `name` varchar(192) NOT NULL,
  `ShortName` varchar(192) NOT NULL,
  `base_unit` varchar(200) DEFAULT NULL,
  `operator` char(192) DEFAULT '*',
  `operator_value` double DEFAULT 1,
  `u_set` varchar(500) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alter_tbl`
--
ALTER TABLE `alter_tbl`
  ADD PRIMARY KEY (`alt_id`);

--
-- Indexes for table `auth_tbl`
--
ALTER TABLE `auth_tbl`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `dash_tbl`
--
ALTER TABLE `dash_tbl`
  ADD PRIMARY KEY (`dash_id`);

--
-- Indexes for table `navc_tbl`
--
ALTER TABLE `navc_tbl`
  ADD PRIMARY KEY (`navc_id`);

--
-- Indexes for table `navm_tbl`
--
ALTER TABLE `navm_tbl`
  ADD PRIMARY KEY (`navm_id`);

--
-- Indexes for table `roles_tbl`
--
ALTER TABLE `roles_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `tel_no` (`tel_no`);

--
-- Indexes for table `uset_tbl`
--
ALTER TABLE `uset_tbl`
  ADD PRIMARY KEY (`uset_id`);

--
-- Indexes for table `_brands`
--
ALTER TABLE `_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tbladjustment`
--
ALTER TABLE `_tbladjustment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tbladjustment_details`
--
ALTER TABLE `_tbladjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblproducts`
--
ALTER TABLE `_tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblpurchase`
--
ALTER TABLE `_tblpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblpurchase_details`
--
ALTER TABLE `_tblpurchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblsales`
--
ALTER TABLE `_tblsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblsales_details`
--
ALTER TABLE `_tblsales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tblunits`
--
ALTER TABLE `_tblunits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alter_tbl`
--
ALTER TABLE `alter_tbl`
  MODIFY `alt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tbl`
--
ALTER TABLE `auth_tbl`
  MODIFY `auth_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dash_tbl`
--
ALTER TABLE `dash_tbl`
  MODIFY `dash_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navc_tbl`
--
ALTER TABLE `navc_tbl`
  MODIFY `navc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navm_tbl`
--
ALTER TABLE `navm_tbl`
  MODIFY `navm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_tbl`
--
ALTER TABLE `roles_tbl`
  MODIFY `role_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  MODIFY `tax_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uset_tbl`
--
ALTER TABLE `uset_tbl`
  MODIFY `uset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_brands`
--
ALTER TABLE `_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tbladjustment`
--
ALTER TABLE `_tbladjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tbladjustment_details`
--
ALTER TABLE `_tbladjustment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblproducts`
--
ALTER TABLE `_tblproducts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblpurchase`
--
ALTER TABLE `_tblpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblpurchase_details`
--
ALTER TABLE `_tblpurchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblsales`
--
ALTER TABLE `_tblsales`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblsales_details`
--
ALTER TABLE `_tblsales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tblunits`
--
ALTER TABLE `_tblunits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
