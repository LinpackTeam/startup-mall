-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2019 at 04:05 PM
-- Server version: 10.2.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u703351455_yesboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_phone2` varchar(200) DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_image`, `admin_phone`, `admin_phone2`, `admin_email`, `admin_pass`) VALUES
(1, 'digambar singh', 'images/admin/profile/23-07-19/230719014721pm-activity.png', '8476978906', NULL, 'deekhati62@gmail.com', '$2y$10$.sOI9/OUKDrJOyNvFnecCO16nw89ekZ6TIC7.P2NHinRmrkTRpVIS');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_charge` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `city_id`, `area_name`, `cod`, `delivery_charge`, `created_at`, `updated_at`) VALUES
(1, '2', 'mayur vihar extension', 0, '50', '26-07-2019 07:02 am', '04-10-19 07:31 am'),
(2, '2', 'sector 58', 0, '0', '29/7/2019', 'N/A'),
(3, '2', 'cannaught palace', 0, '0', '20-08-2019 08:41 am', 'N/A'),
(4, '2', 'Saket Mzn.', 0, '0', '03-09-2019 06:07 pm', 'N/A'),
(5, '8', 'Pratap Nagar', 0, '0', '15-09-2019 04:16 am', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `assign_homecat`
--

CREATE TABLE `assign_homecat` (
  `assign_id` int(200) NOT NULL,
  `homecat_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_homecat`
--

INSERT INTO `assign_homecat` (`assign_id`, `homecat_id`, `cat_id`) VALUES
(16, '4\r\n', '15'),
(21, '2', '8'),
(22, '2', '9'),
(23, '2', '15'),
(24, '2', '16'),
(26, '1', '4'),
(27, '1', '5'),
(29, '3', '17'),
(30, '3', '18'),
(31, '3', '20'),
(32, '3', '21'),
(33, '4', '22'),
(34, '4', '23'),
(35, '4', '24'),
(37, '1', '6'),
(39, '4', '25'),
(40, '5', '26'),
(41, '5', '27'),
(42, '5', '28'),
(43, '5', '29'),
(44, '1', '7');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerloc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `cityadmin_id`, `banner_name`, `bannerloc_id`, `banner_image`, `keyword`, `created_at`, `updated_at`) VALUES
(1, '1', 'banner', 'home', 'banner/images/24-07-2019/240719115028am-people-are-shopping-in-a-supermarket-blurred-background_bjfu7eccz__F0000.png', 'butt', '24-07-2019 11:50 am', '24-07-19 11:58 am'),
(2, '1', 'juice', '5', 'banner/images/24-07-2019/240719115143am-banner-(2).png', 'jui', '24-07-2019 11:51 am', 'N/A'),
(3, '2', 'homebanner', 'home', 'banner/images/24-07-2019/240719015007pm-banner.png', 'butt', '24-07-2019 01:50 pm', 'N/A'),
(4, '1', 'home 2 banner slide 1', 'home2', 'banner/images/30-07-2019/300719045730am-banner-(2).png', 'ban', '30-07-2019 04:57 am', 'N/A'),
(5, '1', 'banner-slide2', 'home', 'banner/images/13-08-2019/130819082918am-776056bc419083e7e22ad17e9ba9747b.jpg', 'milk', '13-08-2019 08:29 am', 'N/A'),
(6, '1', 'banner-slide3', 'home', 'banner/images/13-08-2019/130819083316am-eb7df9_af648507766c441ca291466318f9ad44_mv2.jpg', 'real', '13-08-2019 08:33 am', 'N/A'),
(7, '1', 'banner-slide4', 'home2', 'banner/images/13-08-2019/130819083409am-110980283-orange-juice-drink-banner-ads-with-splashing-beverage-in-3d-illustration-on-bokeh-nature-background.jpg', 'chi', '13-08-2019 08:34 am', 'N/A'),
(8, '1', 'poultry', '4', 'banner/images/04-09-2019/040919111454am-images-(1).jpg', 'poultry', '04-09-2019 11:14 am', 'N/A'),
(9, '1', 'juices', '5', 'banner/images/04-09-2019/040919111624am-juices.jpg', 'juices', '04-09-2019 11:16 am', 'N/A'),
(10, '1', 'dairy', '6', 'banner/images/04-09-2019/040919111752am-dairy.jpg', 'dairy', '04-09-2019 11:17 am', 'N/A'),
(11, '1', 'snacks', '7', 'banner/images/04-09-2019/040919112010am-snacks.jpg', 'snacks', '04-09-2019 11:20 am', 'N/A'),
(12, '1', 'snacks', '7', 'banner/images/04-09-2019/040919112025am-snacks2.jpg', 'snacks', '04-09-2019 11:20 am', 'N/A'),
(13, '1', 'flour', '8', 'banner/images/04-09-2019/040919112358am-flour1.jpg', 'flour', '04-09-2019 11:23 am', 'N/A'),
(14, '1', 'flour', '8', 'banner/images/04-09-2019/040919112422am-flour2.jpg', 'flour', '04-09-2019 11:24 am', 'N/A'),
(15, '1', 'dal', '9', 'banner/images/04-09-2019/040919112548am-dal1.jpg', 'dal', '04-09-2019 11:25 am', 'N/A'),
(16, '1', 'dal', '9', 'banner/images/04-09-2019/040919112614am-dal2.jpg', 'dal', '04-09-2019 11:26 am', 'N/A'),
(17, '1', 'dal', '9', 'banner/images/04-09-2019/040919112621am-dal3.jpg', 'dal', '04-09-2019 11:26 am', 'N/A'),
(18, '1', 'limited offer', '15', 'banner/images/04-09-2019/040919112830am-limited-offer.jpg', 'limited offer', '04-09-2019 11:28 am', 'N/A'),
(19, '1', 'abc', '4', 'banner/images/14-09-19/140919074923am-Milk-Envato-inline.jpg', 'juices', '14-09-2019 07:47 am', '14-09-19 07:49 am');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_reason`
--

CREATE TABLE `cancel_reason` (
  `reason_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancel_reason`
--

INSERT INTO `cancel_reason` (`reason_id`, `reason`) VALUES
(2, 'shifted to another society.'),
(3, 'Order Placed Wrongly');

-- --------------------------------------------------------

--
-- Table structure for table `cash_recharge`
--

CREATE TABLE `cash_recharge` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_recharge`
--

INSERT INTO `cash_recharge` (`request_id`, `user_id`, `cityadmin_id`, `amount`, `date_of_collection`, `delivery_boy_id`, `status`, `created_at`) VALUES
(273, '326', '1', '1000', '05-10-2019', 'n/a', 'Unpaid', '2019-10-05 03:31:10'),
(274, '324', '1', '500', '07-10-2019', 'n/a', 'Unpaid', '2019-10-07 10:09:02'),
(275, '327', '1', '25000', '09-10-2019', 'n/a', 'Unpaid', '2019-10-09 17:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_pincode` varchar(200) NOT NULL,
  `city_image` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_pincode`, `city_image`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(2, 'New Delhi', '0120', 'city/image/23-08-19/230819074030am-new-delhi-icon.png', '28.6139391', '77.2090212', '18-07-2019 10:56 am', '23-08-19 07:40 am'),
(3, 'Noida', '', 'city/image/23-08-19/230819074442am-noida-icon.png', '28.5355161', '77.3910265', '22-07-2019 11:49 am', '23-08-19 07:44 am'),
(4, 'Gurugram', '', 'city/image/23-08-19/230819075501am-ggn-icon.png', '28.4594965', '77.0266383', '15-08-2019 05:46 pm', '23-08-19 07:55 am'),
(5, 'Kolkata', '', 'N/A', '22.572646', '88.36389500000001', '10-09-2019 03:40 pm', '23-09-19 04:49 am'),
(7, 'Faridabad', '', 'city/images/12-09-2019/120919113016am-faridabad.jpg', '28.4089123', '77.3177894', '12-09-2019 11:30 am', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `cityadmin`
--

CREATE TABLE `cityadmin` (
  `cityadmin_id` int(11) NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cityadmin`
--

INSERT INTO `cityadmin` (`cityadmin_id`, `city_id`, `cityadmin_name`, `cityadmin_image`, `cityadmin_phone`, `cityadmin_email`, `cityadmin_pass`, `cityadmin_address`, `lat`, `lng`, `device_id`, `created_at`, `updated_at`) VALUES
(1, '2', 'Ravi', 'cityadmin_img/images/09-08-19/090819122814pm-1CA.png', '9837444500', 'deekhati63@gmail.com', '$2y$10$i.JpONMDC0sckOvNoY0h7ePQRJDV/GULRImVKFuEci7.w8b7TGhG2', 'Saket ,new delhi', '28.5220971', '77.2101534', 'n/a', '16/09/2019', '03-09-19 05:53 pm'),
(2, '3', 'manoj', 'cityadmin_img/images/09-08-19/090819122838pm-585e4bf3cb11b227491c339a.png', '+918476978906', 'manoj@gmail.com', '$2y$10$vLNHKa6YpKKASmQCZymrBOoNlR8sSRSs6aN64vQpk.JX67mfhsSIW', 'vishal mega mart ,sector 58,noida', '28.6109652', '77.35406739999999', 'n/a', '22-07-2019 11:50 am', '03-09-19 04:26 pm'),
(8, '4', 'raga', 'cityadmin_img/images/20-08-2019/200819103014am-user.png', '+918476972136', 'deekhati64@gmail.com', '$2y$10$R3j3PKJuKQMAoxiTg.T9B.WKZ8w7eqMZwlapDn2cBOiXt8skILnDC', 'sector 63 Noida', '28.6209681', '77.3811702', 'n/a', '20-08-2019 10:30 am', 'N/A'),
(9, '7', 'Madhuri', 'cityadmin_img/images/12-09-19/120919113756am-comment_photo_2.jpg', '8859593839', 'yadavmadhuri0444@gmail.com', '$2y$10$pbXsHlRLCsLJUSWjvC4SdeUuxg4AJqWptHuO7dpIFIiXVsIX/7ko.', 'Sector 37Faridabad, Haryana', '28.4810408', '77.31166209999999', 'n/a', '12-09-2019 11:32 am', '12-09-19 11:40 am');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `complain_id` int(11) NOT NULL,
  `complain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`complain_id`, `complain_name`, `description`) VALUES
(1, 'product not delivered yet', 'product not delivered'),
(3, 'Product Damaged', 'igkhkkhk');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `completed_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subs_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `completed_orders`
--

INSERT INTO `completed_orders` (`completed_id`, `user_id`, `subs_id`, `delivery_date`, `delivery_boy_incentive`, `delivery_boy_id`, `created_at`) VALUES
(118, '324', '528', '08-10-2019', '10', '27', '2019-10-07 12:04:55'),
(119, '324', '528', '11-10-2019', '10', '27', '2019-10-11 12:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(200) NOT NULL,
  `cityadmin_id` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_start_date` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_value` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_end_date` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `cityadmin_id`, `coupon_name`, `coupon_code`, `coupon_start_date`, `coupon_value`, `coupon_end_date`) VALUES
(1, '1', 'Demo', 'OFF-40', '', '20', ''),
(2, '1', 'Demo 1', 'OFF-20', '', '40', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `currency_sign`) VALUES
(1, 'Rupees', 'Rs.');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `delivery_boy_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lng` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_boy_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`delivery_boy_id`, `cityadmin_id`, `delivery_boy_name`, `delivery_boy_image`, `delivery_boy_phone`, `delivery_boy_pass`, `lat`, `lng`, `device_id`, `created_at`, `updated_at`, `delivery_boy_status`, `is_confirmed`, `otp`, `phone_verify`) VALUES
(22, '1', 'rakesh', 'delivery_boy_img/images/29-07-2019/290719014331pm-1CA.png', '9756357656', '$2y$10$Bkp6W46j3QMj39RcPbPGw.IulfVwaEb.Sm2wt.qSUN4nIKUMGn8Ha', '29.6690893', '80.1300226', 'ytygdjkcnzui6v87djkc', '29-07-2019 01:43 pm', '15-08-19 05:57 pm', 'offline', 1, NULL, 0),
(23, '2', 'raamu', 'delivery_boy_img/images/30-07-2019/300719061906am-3UK.png', '+918476978908', 'surbhi', '28.620764', '77.363930', '', '30-07-2019 06:19 am', '30-07-19 06:19 am', 'online', 0, NULL, 0),
(24, '1', 'ram', 'delivery_boy_img/images/30-07-2019/300719080505am-1cd7a7f24400914d5c0555bbbb0265ac.jpg', '7895811769', 'ram', '28.599621', '77.373634', '', '30-07-2019 08:05 am', 'N/A', 'online', 1, NULL, 0),
(26, '1', 'yashasvi', 'delivery_boy_img/images/20-08-2019/200819051947am-user.png', '8750221354', '$2y$10$VfAq4u/fK5l1oGhVyXPO9evc4k.cxuwqGbSvBA48odOdVBQA2hy/W', '28.63063063063063', '77.37020126909101', '12345', '20-08-2019 05:19 am', '20-08-19 06:08 am', 'offline', 2, NULL, 0),
(27, '1', 'Mohit Dere wala', 'delivery_boy_img/images/10-09-2019/100919075040am-delivery-man.jpg', '9728529934', '$2y$10$oc5iEZrNKQdYtyncLwz0HeFiwMBLbilACrEXjoDmFU/ymkQF3GXIS', '28.63063063063063', '77.39072931400189', '1234', '10-09-2019 07:50 am', '24-09-19 02:09 pm', 'online', 1, NULL, 1),
(28, '1', 'Mohitiya', 'delivery_boy_img/images/11-09-2019/110919080430am-delivery-man.jpg', '7210804086', '$2y$10$Rh0qhjKf03LLXxXFq83Q5Of.PBnmpxakYUJPjXHxqbs8sclAIX4pa', '28.6690893', '79.1300226', 'N/A', '11-09-2019 08:04 am', 'N/A', 'online', 0, NULL, 0),
(31, '1', 'Pappu', 'delivery_boy_img/images/15-09-2019/150919072015am-20663667_1931724413765092_2485467944631862191_n.jpg', '9887251777', '$2y$10$wOBS/FiehgO3PCFwCW.1YOjZ6QAes9F2n4/cpTmbur8eMRrQDXphO', '31.6690893', '85.1300226', '12345', '15-09-2019 07:20 am', 'N/A', 'offline', 0, NULL, 0),
(32, '1', 'himanshu', 'delivery_boy_img/images/17-09-2019/170919095808am-10620780_326677070847361_4894746200701098486_n.jpg', '7579069269', '$2y$10$epYpvK0idPcJY0gsK4TMjeSAXLLd.KgullfglWl3fOEbdoneYRFPm', '39.6690893', '89.1300226', '12345', '17-09-2019 09:58 am', 'N/A', 'offline', 0, NULL, 0),
(33, '1', 'abcd', 'delivery_boy_img/images/24-09-2019/240919020553pm-709fb341-0eed-4e4b-8ee9-5f05e395bdf6.jpg', '9709613710', '$2y$10$GtR.Bc4cX/klMTbRmTPHeOjMQMkQegQtiL1U0SN7m2sXi6YMVQ546', '25.603603603603602', '85.17449017326751', '12345', '24-09-2019 02:05 pm', '24-09-19 02:08 pm', 'online', 2, NULL, 0),
(35, '1', 'FireDrag', 'N/A', '8795544121', '$2y$10$KyiR6xDYvOSVevbVzR4wu.SoPRUMBbna1NYdwvpnW/34.OVl.Sza2', '28.5355161', '77.3910265', 'abcd', '2019-10-03 12:02:52', 'N/A', 'offline', 1, NULL, 1),
(36, '2', 'hdhhd', 'N/A', '9728529932', '$2y$10$xpvsqMMqggVhxBNIE/Bfqu6rSpoW3NsmpJM0LJFr9iUL0vqR24sVi', '0.0', '0.0', '12344', '2019-10-07 08:05:03', 'N/A', 'offline', 0, '0723', 0),
(37, '2', 'HDTV RSS', 'N/A', '9253160840', '$2y$10$b1VDOd6yCqDsW6D.6Lz2WO2hTPENxbZdR0V8TuZLWWJ0dVkV8Wmva', '0.0', '0.0', '12344', '2019-10-07 08:06:12', 'N/A', 'offline', 0, '7607', 0),
(38, '1', 'mohit', 'N/A', '9253160849', '$2y$10$yRKfUj7H6iChOjqE1ailtubKJe5Znjvvo98n1OzS4ptXC8zksFX5.', '0.0', '0.0', '12344', '2019-10-07 09:24:45', 'N/A', 'offline', 0, '2913', 0),
(39, '1', 'NMS', 'N/A', '9897496747', '$2y$10$I9Qoq8K/DqMiO0UQMmcPR.Px11EeiMippB5dwRHpMNH.B4oM.0ZrW', '0.0', '0.0', '12344', '2019-10-10 16:43:44', 'N/A', 'offline', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_area`
--

CREATE TABLE `delivery_boy_area` (
  `delivery_boy_area_id` int(11) NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy_area`
--

INSERT INTO `delivery_boy_area` (`delivery_boy_area_id`, `delivery_boy_id`, `area_id`) VALUES
(12, '23', '1'),
(13, '23', '2'),
(15, '22', '3'),
(19, '26', '1'),
(24, '28', '1'),
(25, '28', '3'),
(26, '24', '3'),
(27, '29', '3'),
(28, '30', '5'),
(29, '31', '3'),
(30, '32', '3'),
(32, '33', '1'),
(33, '27', '1'),
(34, '27', '2'),
(35, '27', '3'),
(36, '27', '4'),
(37, '35', '4'),
(38, '36', '1'),
(39, '37', '1'),
(40, '38', '1'),
(41, '39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_timing`
--

CREATE TABLE `delivery_timing` (
  `delivery_timing_id` int(11) NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_timing_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_timing`
--

INSERT INTO `delivery_timing` (`delivery_timing_id`, `delivery_type`, `delivery_timing_text`, `delivery_time_slot`) VALUES
(1, 'subscribe', 'Delivery Between', '06:00 AM - 08:00 AM'),
(2, 'subscribe', 'Delivery Between', '06:00 PM - 08:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

CREATE TABLE `discount_type` (
  `discount_type_id` int(200) NOT NULL,
  `discount_type_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type_percent` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_type`
--

INSERT INTO `discount_type` (`discount_type_id`, `discount_type_name`, `discount_type_percent`) VALUES
(1, 'type1', '20'),
(2, 'type2', '30'),
(3, 'type3', '40'),
(4, 'type4', '50');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(2, 'How to subscribe a product ?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.');

-- --------------------------------------------------------

--
-- Table structure for table `fcm_key`
--

CREATE TABLE `fcm_key` (
  `unique_id` int(200) NOT NULL,
  `user_app_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dboy_app_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fcm_key`
--

INSERT INTO `fcm_key` (`unique_id`, `user_app_key`, `dboy_app_key`) VALUES
(1, 'AAAAeH4ujN8:APA91bHZHG4AvHjRyl7tRfipWJbpndcAcixffHZkDfsMZGZAApH0Gftsj9AnHBUBLQRL79SyEewtyaOr4khd6RAnoZdBTKyqMeL4VA74ce8sCpJHD1zkBftugkyonRxa6yi_sf_OdqvQ', 'AAAAjyd81L4:APA91bFVWAXfsPGhMkS4WjAPp92N8D_AyMOufp-UlI1lOCb7jtFsmgxYIA5FNmU86KlprkXRVTE-ds8g0vTsqLv0Avjdxv8lKQliT0rDLgkrUgXmcNLsFm8ulORiHmP3N2dzu_wYkTg6');

-- --------------------------------------------------------

--
-- Table structure for table `first_wallet_recharge`
--

CREATE TABLE `first_wallet_recharge` (
  `deal_id` int(11) NOT NULL,
  `min_wallet_recharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_wallet_recharge`
--

INSERT INTO `first_wallet_recharge` (`deal_id`, `min_wallet_recharge`, `product_id`, `city_id`, `free_for`) VALUES
(3, '2000', '2', '2', '5'),
(4, '3000', '5', '2', '10');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holiday_id`, `user_id`, `holiday`) VALUES
(6, '219', '09-08-2019'),
(7, '219', '10-08-2019'),
(8, '219', '12-08-2019'),
(9, '219', '09-08-2019'),
(10, '219', '10-08-2019'),
(11, '219', '12-08-2019'),
(12, '219', '09-08-2019'),
(13, '219', '10-08-2019'),
(14, '219', '12-08-2019'),
(15, '219', '09-08-2019'),
(16, '219', '10-08-2019'),
(17, '219', '12-08-2019');

-- --------------------------------------------------------

--
-- Table structure for table `homecat`
--

CREATE TABLE `homecat` (
  `homecat_id` int(200) NOT NULL,
  `homecat_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homecat_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_adminid` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homecat`
--

INSERT INTO `homecat` (`homecat_id`, `homecat_name`, `order`, `homecat_status`, `city_adminid`) VALUES
(1, 'Dairy Goodness', '2', '1', '1'),
(2, 'Breakfast', '1', '1', '1'),
(3, 'Cooking Delight', '5', '1', '1'),
(4, 'Cleaning Essentials', '6', '1', '1'),
(5, 'Baby Care', '2', '1', '1'),
(6, 'demo', '2', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `incentive`
--

CREATE TABLE `incentive` (
  `incentive_id` int(11) NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remaining_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incentive`
--

INSERT INTO `incentive` (`incentive_id`, `delivery_boy_id`, `total_incentive`, `paid_incentive`, `remaining_incentive`) VALUES
(1, '22', '95', '120', '-25'),
(2, '26', '62', '30', '32'),
(3, '27', '95', '0', '95');

-- --------------------------------------------------------

--
-- Table structure for table `incentive_amount`
--

CREATE TABLE `incentive_amount` (
  `incentive_amount_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incentive_amount`
--

INSERT INTO `incentive_amount` (`incentive_amount_id`, `cityadmin_id`, `delivery_boy_incentive`) VALUES
(1, '1', '10'),
(2, '8', '0'),
(3, '9', '0'),
(4, '10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_name`, `logo_image`) VALUES
(1, 'GoSubscribe', 'logo/image/23-08-19/230819124541pm-milk-subscription.png');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(200) NOT NULL,
  `user_id` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `user_id`, `plan_id`, `start_date`, `end_date`) VALUES
(1, '321', '1', '2019-10-03 05:11:13', '2019-10-10 05:11:13'),
(2, '321', '2', '2019-10-10 05:11:13', '2019-11-10 05:11:13'),
(3, '321', '2', '2019-11-10 05:11:13', '2019-12-10 05:11:13'),
(4, '323', '1', '2019-10-03 13:44:57', '2019-10-10 13:44:57'),
(5, '324', '1', '2019-10-04 06:50:26', '2019-10-11 06:50:26'),
(6, '327', '1', '2019-10-18 04:54:20', '2019-10-25 04:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE `membership_plan` (
  `plan_id` int(200) NOT NULL,
  `plan_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_day` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_subscription` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`plan_id`, `plan_name`, `plan_day`, `plan_price`, `plan_subscription`) VALUES
(1, 'Week', '7', '200', 'Plan For One Week Means 7 Days'),
(2, 'Month', '30', '500', 'Plan For One Month Means 30 Days'),
(3, 'Yearly', '365', '2000', 'Plan For One Year Means 365 Days');

-- --------------------------------------------------------

--
-- Table structure for table `notificationby`
--

CREATE TABLE `notificationby` (
  `n_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationby`
--

INSERT INTO `notificationby` (`n_id`, `user_id`, `sms`, `app`, `email`) VALUES
(78, '316', '1', '1', '0'),
(79, '317', '1', '1', '0'),
(80, '318', '1', '1', '0'),
(81, '319', '1', '1', '0'),
(82, '320', '1', '1', '0'),
(83, '321', '1', '1', '0'),
(84, '322', '1', '1', '0'),
(85, '323', '1', '1', '0'),
(86, '324', '1', '1', '0'),
(87, '325', '1', '1', '0'),
(88, '326', '1', '1', '0'),
(89, '327', '1', '1', '0'),
(90, '328', '1', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `not_accepted`
--

CREATE TABLE `not_accepted` (
  `not_accepted_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subs_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `not_accepted`
--

INSERT INTO `not_accepted` (`not_accepted_id`, `user_id`, `subs_id`, `delivery_boy_id`, `delivery_date`, `created_at`) VALUES
(23, '324', '530', '27', '11-10-2019', '2019-10-11 12:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_complains`
--

CREATE TABLE `order_complains` (
  `order_complain_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settled_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentvia`
--

CREATE TABLE `paymentvia` (
  `paymentvia_id` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Papi_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentvia`
--

INSERT INTO `paymentvia` (`paymentvia_id`, `payment_mode`, `Papi_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Razorpay', 'jhasvcjhdbgsdjkhckahscjhbjh', '1', '2019-08-13 12:15:46', '2019-08-23 11:03:52'),
(2, 'PayPal', 'sdjkhcjkdhcjkhsdjkhcjksd', '1', '2019-08-13 12:24:28', '2019-08-23 11:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `subcat_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `subscription_price` varchar(255) DEFAULT NULL,
  `membership_price` varchar(200) NOT NULL,
  `discount_price` varchar(500) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `weight` varchar(500) NOT NULL,
  `rate` varchar(300) NOT NULL,
  `time_slote` varchar(300) NOT NULL,
  `discount_type` varchar(300) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `subcat_id`, `product_name`, `mrp`, `price`, `subscription_price`, `membership_price`, `discount_price`, `qty`, `product_image`, `description`, `stock`, `unit`, `weight`, `rate`, `time_slote`, `discount_type`, `created_at`, `updated_at`) VALUES
(2, '7', 'Amul Masti Buttermilk 200ml', NULL, '20', NULL, '18', '', '200', 'product/images/29-08-19/290819065301am-download.jpeg', 'buttermilk', '489', 'ml', '', '', '1', '', '19-07-2019 12:44 pm', '29-08-19 07:36 am'),
(3, '2', 'Jersey fresh milk', NULL, '20', '19', '18', '', '200', 'product/images/29-08-19/290819070324am-00ef28b6241a42f21a6ce8af28358434.jpeg', 'toned milk', '465', 'ml', '', '', '2', '', '22-07-2019 01:05 pm', '29-08-19 07:03 am'),
(4, '3', 'Patanjali ghee', NULL, '250', NULL, '240', '', '600', 'product/images/29-08-19/290819070546am-1512813806COWSGHEE5LTR400x300.png', 'shuddh desi ghee', '669', 'g', '', '', '1', '', '26-07-2019 10:51 am', '29-08-19 07:37 am'),
(5, '4', 'Real Pomegranate 200 ml', NULL, '20', '19', '18', '', '200', 'product/images/29-08-19/290819070625am-200ml-real-pomegranate-juice-500x500.jpg', 'real juice tastier way of refreshing', '0', 'ml', '', '', '2', '', '30-07-2019 11:42 am', '29-08-19 07:06 am'),
(6, '4', 'Real guava 200 ml', NULL, '22', '20', '19', '', '200', 'product/images/29-08-19/290819085322am-real-guava-juice-200-ml-525x600.png', 'real juice tastier way of refreshing', '0', 'ml', '', '', '1', '', '31-07-2019 12:37 pm', '29-08-19 08:53 am'),
(7, '8', 'Moong Dal', NULL, '198', NULL, '190', '', '1', 'product/images/13-08-2019/130819091617am-25-Moong-dal.png', 'Premium Quality Pack', '953', 'kg', '', '', '2', '', '13-08-2019 09:16 am', '24-09-19 03:45 am'),
(17, '9', 'Pack of 8 large eggs', NULL, '54', NULL, '50', '', '6', 'product/images/29-08-2019/290819084947am-2SIX021.png', 'six large eggs pack', '574', 'pcs', '', '', '1', '', '29-08-2019 08:49 am', '07-09-19 08:03 am'),
(18, '8', 'Arhar Dal', '120', '115', '110', '100', '', '1', 'product/images/05-09-2019/050919102014am-arhar-dal.jpg', 'This is Unpolished Arhar Dal', '0', 'kg', '', '', '2', '', '05-09-2019 10:20 am', 'N/A'),
(19, '8', 'Channa Dal', NULL, '115', '110', '100', '', '1', 'product/images/05-09-2019/050919102133am-Chana-Dal.jpg', 'This is Unpolished Channa Dal', '0', 'KG', '', '', '1', '', '05-09-2019 10:21 am', '14-09-19 03:05 am'),
(20, '5', 'Squeezed mango Juice and Juice Drinks', NULL, '580', '570', '550', '', '1', 'product/images/05-09-2019/050919102813am-tropicana.jpeg', 'Tropicana Pure Premium Original No Pulp 100% Orange Juice 89 fl. oz. Jug', '30', 'Ltr', '', '', '2', '', '05-09-2019 10:28 am', '07-09-19 08:05 am'),
(21, '5', 'Original No Pulp 100% Orange Juice', '100', '97', '95', '90', '', '200', 'product/images/05-09-2019/050919105240am-Tropicana2.jpg', 'Tropicana Pure Premium Original No Pulp 100% Orange Juice 89 fl. oz. Jug', '5', 'ml', '', '', '1', '', '05-09-2019 10:52 am', 'N/A'),
(22, '9', 'Brown Eggs', NULL, '10', '8', '7', '', '1', 'product/images/14-09-2019/140919074019am-egggg.jpeg', 'Brown Egg', '93', 'Piece', '', '', '2', '', '14-09-2019 07:40 am', '14-09-19 07:42 am'),
(23, '10', 'Amul Milk', '26', '25', '24', '22', '', '5', 'product/images/15-09-2019/150919042906am-240px-Milk_glass.jpg', 'Milk Tone', '100', 'kg', '', '', '1', '', '15-09-2019 04:29 am', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `sms_api`
--

CREATE TABLE `sms_api` (
  `key_id` int(11) NOT NULL,
  `sender_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_api`
--

INSERT INTO `sms_api` (`key_id`, `sender_id`, `sms_api_key`) VALUES
(1, 'GBSCRB', '197064AVzt8vx55d4d55f3');

-- --------------------------------------------------------

--
-- Table structure for table `spldaynotification`
--

CREATE TABLE `spldaynotification` (
  `splnotification_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spldays_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celeb_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spldaynotification`
--

INSERT INTO `spldaynotification` (`splnotification_id`, `user_id`, `spldays_id`, `celeb_date`) VALUES
(1, '219', '10', '12/10/2012'),
(2, '219', '10', '12/11/2019');

-- --------------------------------------------------------

--
-- Table structure for table `spldays`
--

CREATE TABLE `spldays` (
  `spldays_id` int(11) NOT NULL,
  `spldays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wishmsg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spldays`
--

INSERT INTO `spldays` (`spldays_id`, `spldays`, `wishmsg`) VALUES
(9, 'Mom Birthday', 'Happy birthday to your mom. warm wishes for your mom from Go Subscribe team.'),
(10, 'child birthday', 'Happy birthday to your child. warm wishes from Go Subscribe team.'),
(11, 'Dad birthday', 'Happy birthday to your dad. warm wishes for your dad from Go Subscribe team.'),
(12, 'anniversary', 'happy aniversary dear.');

-- --------------------------------------------------------

--
-- Table structure for table `stock_update`
--

CREATE TABLE `stock_update` (
  `stock_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_stock_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `subcat_id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_image` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subcat_id`, `category_id`, `subcat_name`, `subcat_image`, `created_at`, `updated_at`) VALUES
(2, '6', 'Toned Milk', 'subcat/images/19-07-2019/190719123650pm-1CA.png', '19-07-2019 12:36 pm', '14-09-19 03:04 am'),
(3, '6', 'Full cream milk', 'subcat/images/19-07-19/190719123758pm-417rpz41OnL.png', '19-07-2019 12:37 pm', '29-08-19 06:59 am'),
(4, '5', 'Real', 'subcat/images/22-07-2019/220719125434pm-food.png', '22-07-2019 12:54 pm', '29-08-19 06:59 am'),
(5, '15', 'Tropicana', 'subcat/images/03-09-19/030919054506pm-g4_04.0.jpg', '01-08-2019 06:44 am', '03-09-19 05:45 pm'),
(6, '5', 'BB Natural', 'subcat/images/01-08-2019/010819064443am-1e76d30955641c9b83afcb469d3d9e87.png', '01-08-2019 06:44 am', '29-08-19 07:00 am'),
(7, '6', 'Buttermilk', 'subcat/images/13-08-2019/130819091242am-4CA.png', '13-08-2019 09:12 am', '29-08-19 07:00 am'),
(8, '15', 'Unpolished dals', 'subcat/images/13-08-2019/130819091421am-002-bed.png', '13-08-2019 09:14 am', '03-09-19 05:40 pm'),
(9, '4', 'Egg', 'subcat/images/29-08-2019/290819084644am-580b57fbd9996e24bc43c101.png', '29-08-2019 08:46 am', '24-09-19 10:04 am'),
(10, '19', 'Milk', 'subcat/images/15-09-2019/150919042645am-240px-Milk_glass.jpg', '15-09-2019 04:26 am', 'N/A'),
(11, '19', 'Egg', 'subcat/images/15-09-2019/150919042726am-bowl-full-of-eggs.jpg', '15-09-2019 04:27 am', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `plan_id` int(11) NOT NULL,
  `plans` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `skip_days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`plan_id`, `plans`, `days`, `description`, `skip_days`) VALUES
(1, 'Daily', '30', 'daily delivery in a month', '1'),
(3, 'Every 3rd Day', '30', 'skip two days b/w previous and next delivery', '3'),
(4, 'Alternate Days', '30', 'skip one day b/w previous and next delivery', '2'),
(5, 'Every 7th day', '30', 'skip six days b/w previous and next delivery', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL DEFAULT '0',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `cityadmin_id`, `category_name`, `category_image`, `home`, `created_at`, `updated_at`) VALUES
(4, '1', 'Milk', 'images/category/23-09-2019/paint1.png', '0', '2019-07-18 10:54:29', '2019-09-24 05:52:57'),
(5, '1', 'Paneer & Tofo', 'images/category/23-09-2019/paint2.png', '0', '2019-07-22 10:03:35', '2019-09-23 12:40:16'),
(6, '1', 'Vegan Milk', 'images/category/23-09-2019/paint4.png', '1', '2019-07-22 11:09:04', '2019-09-24 06:25:35'),
(7, '1', 'Yogurt & Cream', 'images/category/23-09-2019/paint5.png', '0', '2019-07-26 08:29:44', '2019-09-23 12:41:52'),
(8, '1', 'Eggs', 'images/category/23-09-2019/paint6.png', '0', '2019-07-26 08:30:17', '2019-09-23 12:42:17'),
(9, '1', 'Breads', 'images/category/23-09-2019/paint7.png', '0', '2019-07-26 08:30:54', '2019-09-24 06:25:04'),
(15, '1', 'Cereals', 'images/category/23-09-2019/paint8.png', '1', '2019-09-03 07:18:37', '2019-09-23 12:43:33'),
(16, '1', 'Breakfast', 'images/category/23-09-2019/paint9.png', '0', '2019-09-08 16:23:38', '2019-09-23 12:44:29'),
(17, '1', 'Dry Fruits', 'images/category/23-09-2019/paint0.png', '0', '2019-09-08 16:24:35', '2019-09-23 12:45:18'),
(18, '1', 'Rice', 'images/category/23-09-2019/paint10.png', '0', '2019-09-10 12:18:07', '2019-09-23 12:45:54'),
(19, '10', 'Dairy Product', 'images/category/15-09-2019/download.jpg', '1', '2019-09-15 04:25:25', '2019-09-15 04:25:25'),
(20, '1', 'Pulses', 'images/category/24-09-2019/paint11.png', '0', '2019-09-18 13:23:41', '2019-09-24 05:16:29'),
(21, '1', 'Oils', 'images/category/24-09-2019/paint12.png', '0', '2019-09-18 13:23:41', '2019-09-24 05:17:05'),
(22, '1', 'Disposables', 'images/category/24-09-2019/paint13.png', '0', '2019-09-24 05:17:53', '2019-09-24 05:17:53'),
(23, '1', 'Cleaning Accesories', 'images/category/24-09-2019/paint14.png', '0', '2019-09-24 05:18:38', '2019-09-24 05:18:38'),
(24, '1', 'Cleaners', 'images/category/24-09-2019/paint15.png', '0', '2019-09-24 05:19:15', '2019-09-24 05:19:15'),
(25, '1', 'Detergent', 'images/category/24-09-2019/paint16.png', '0', '2019-09-24 05:19:47', '2019-09-24 05:19:47'),
(26, '1', 'Accessories', 'images/category/24-09-2019/5.JPG', '0', '2019-09-24 05:22:32', '2019-09-24 05:22:32'),
(27, '1', 'Wash & Care', 'images/category/24-09-2019/6.JPG', '0', '2019-09-24 05:23:20', '2019-09-24 05:23:20'),
(28, '1', 'Diapers', 'images/category/24-09-2019/7.JPG', '0', '2019-09-24 05:23:57', '2019-09-24 05:23:57'),
(29, '1', 'Food & Formula', 'images/category/24-09-2019/8.JPG', '0', '2019-09-24 05:24:29', '2019-09-24 05:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `subs_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sub_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `pause_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `pause_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`subs_id`, `user_id`, `address_id`, `product_id`, `order_type`, `cart_id`, `plan_id`, `start_date`, `end_date`, `delivery_date`, `order_qty`, `price`, `delivery_boy_id`, `delivery_boy_incentive`, `sub_status`, `otp`, `cancel_reason`, `pause_start`, `pause_end`, `created_at`, `updated_at`) VALUES
(526, '324', '109', '2', 'Subscribe', 'n/a', '1', '05-10-2019', '09-10-2019', '05-10-2019', '1', '0', 'N/A', '0', 'free', NULL, 'n/a', 'n/a', 'n/a', '2019-10-04 05:44:25', '2019-10-04 05:44:25'),
(527, '324', '110', '21', 'buyonce', '61a72', 'n/a', '05-10-2019', 'n/a', '05-10-2019', '1', '90', '27', '10', 'buyonce', '3542', 'n/a', 'n/a', 'n/a', '2019-10-04 09:41:05', '2019-10-04 09:41:05'),
(528, '324', '112', '21', 'Subscribe', 'n/a', '3', '08-10-2019', 'n/a', '14-10-2019', '1', '95', '27', '10', 'ongoing', NULL, 'n/a', 'n/a', 'n/a', '2019-10-07 09:53:30', '2019-10-11 12:27:36'),
(529, '327', '106', '2', 'Subscribe', 'n/a', '1', '10-10-2019', '14-10-2019', '10-10-2019', '1', '0', 'N/A', '0', 'paused', NULL, 'n/a', '09-10-2019', '09-10-2019', '2019-10-09 17:08:24', '2019-10-09 17:08:53'),
(530, '324', '112', '20', 'buyonce', '41b8e', 'n/a', '11-10-2019', 'n/a', '11-10-2019', '2', '1100', '27', '10', 'not accepted', NULL, 'n/a', 'n/a', 'n/a', '2019-10-10 11:02:00', '2019-10-11 12:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_reward` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `wallet_credits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `first_recharge_coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_image`, `user_phone`, `user_password`, `user_reward`, `device_id`, `otp`, `phone_verified`, `wallet_credits`, `first_recharge_coupon`, `created_at`, `updated_at`) VALUES
(321, 'mohit', 'mohitrelhan1210@gmail.com', 'images/user/031019112144user_image.png', '9728529934', 'mohit123', '12', 'cyIsQZNeMi0:APA91bHpRcal_2ytdxoSUUcHmYC9_sSFYlA0OTRgdEAD2MZk2KV1tUnwzsWXjuPr-o_4HSOL_IfgKagoUCDrTG579w1Ttu8kYbUF_H4oIki7yuMZHLqisjv2AZu9ynpgimz93rLpAFip', '3339', 1, '0', '0', '2019-10-03 11:21:44', '2019-10-03 11:21:44'),
(323, 'mohit', 'mohitrelhan1210@gmail.com', 'images/user/031019112237user_image.png', '8795544122', 'mohit123', '20', 'cyIsQZNeMi0:APA91bHpRcal_2ytdxoSUUcHmYC9_sSFYlA0OTRgdEAD2MZk2KV1tUnwzsWXjuPr-o_4HSOL_IfgKagoUCDrTG579w1Ttu8kYbUF_H4oIki7yuMZHLqisjv2AZu9ynpgimz93rLpAFip', '1462', 1, '0', '0', '2019-10-03 11:22:37', '2019-10-03 11:22:37'),
(324, 'sourav', 'kumarrishabh050@gmail.com', 'images/user/031019134835user_image.png', '8795544121', 'mohit123', '15', 'cyIsQZNeMi0:APA91bHpRcal_2ytdxoSUUcHmYC9_sSFYlA0OTRgdEAD2MZk2KV1tUnwzsWXjuPr-o_4HSOL_IfgKagoUCDrTG579w1Ttu8kYbUF_H4oIki7yuMZHLqisjv2AZu9ynpgimz93rLpAFip', '1420', 1, '25', '1', '2019-10-03 13:48:35', '2019-10-03 13:48:35'),
(325, 'mukul', 'paas@gmail.com', 'images/user/031019151749user_image.png', '1234567890', '123', '22', 'cwMvscohtC8:APA91bETM4Ri4u4yt1_4S3EUpzeVwolZYCty0k6AbkUXSza7C6LWN6NNlsg84vHxP-Gh-33ytLdwHh4crO9VNBRPNMMixlogwokrcl3b0t_mbBzPC0rjVB4PPOxrU9zRn9eD2v7X4stN', '3131', 0, '0', '0', '2019-10-03 15:17:49', '2019-10-03 15:17:49'),
(326, 'mukul', 'paas@gmail.com', 'images/user/031019151809user_image.png', '7017192652', '123', '20', 'cwMvscohtC8:APA91bETM4Ri4u4yt1_4S3EUpzeVwolZYCty0k6AbkUXSza7C6LWN6NNlsg84vHxP-Gh-33ytLdwHh4crO9VNBRPNMMixlogwokrcl3b0t_mbBzPC0rjVB4PPOxrU9zRn9eD2v7X4stN', '0343', 1, '0', '0', '2019-10-03 15:18:09', '2019-10-03 15:18:09'),
(327, 'mohit', 'CAMOHIT.GARG@YAHOO.IN', 'images/user/041019050454user_image.png', '9319113210', 'mohit@123', '12', 'fcW-YizPHKc:APA91bEciuDxiOqu8imJUxEAOe-L8p5jqfhk64nGOhLl9Jul9tnzZmd-mEqcx4ZwP9EHvw68hblXnY0bUW8tR52qNrWsMmtzlKydqmKRQgtWJVO9qT4o5U_ur57hfK_sHYYBExtm_N1Y', '4513', 1, '9000', '1', '2019-10-04 05:04:54', '2019-10-04 05:04:54'),
(328, 'Neeraj', 'nb@tecmanic.com', 'images/user/041019073924user_image.png', '9149359056', '15101988', '10', 'cqW8VZsObqI:APA91bEW04Y2M1iceSruQtsiHmVcUuCdpoC6OkvBVZVLZYxazXfBxn2vuxvOZqAiBqCy7uLYMyKnxIDhN_9DA0yCxK9LqVcVSJE4cKLQzpShIVW4O5MzS2sGFIu_uqWF4cz7XGR8FkcT', '7376', 1, '0', '0', '2019-10-04 07:39:24', '2019-10-04 07:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_number` varchar(300) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `area_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT 'N/A',
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `user_name`, `user_number`, `city_id`, `area_id`, `address`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(100, '321', 'Dere Wala', '7210804086', '2', 1, '22,sector 55,mayur vihar extension,New Delhi', '28.5355161', '77.3910265', 'N/A', 'N/A'),
(101, '321', 'Mohitiya', '1234567890', '2', 1, '22,sector 55,mayur vihar extension,New Delhi', '28.5355161', '77.3910265', 'N/A', 'N/A'),
(103, '319', 'demo', '1231231230', '2', 1, '22,noida sectoe 63,mayur vihar extension,New Delhi,,', '28.589945', '77.298024', 'N/A', 'N/A'),
(104, '326', 'mukul', '7017192652', '2', 1, '12,saket,shop,mayur vihar extension,New Delhi,,', '28.5942434', '77.2947125', 'N/A', 'N/A'),
(105, '320', 'mohit', '9999111111', '2', 1, '33,hdjhd,mayur vihar extension,New Delhi,,', '28.5942434', '77.2947125', 'N/A', 'N/A'),
(106, '327', 'mohit', '9319113210', '2', 2, '467,fyuh,dyuh,sector 58,New Delhi,,', '28.6067511', '77.3597194', 'N/A', 'N/A'),
(110, '324', 'hhfufu', '9728529934', '2', 2, 'gzghdhdg,gdgdgydydg,gdggdge,sector 58,New Delhi,,', '28.6067511', '77.3597194', 'N/A', 'N/A'),
(112, '324', 'tyyy', '9999888989', '2', 1, 'hhh,hhhg,vgvh,mayur vihar extension,New Delhi,,', '28.5928265', '77.2947027', 'N/A', 'N/A'),
(113, '328', 'Neeraj', '9149359056', '2', 2, 'L12,Kite Road,Near School,sector 58,New Delhi,,', '28.6067511', '77.3597194', 'N/A', 'N/A'),
(114, '319', 'demo', '1231231230', '2', 1, '22,noida sectoe 63,mayur vihar extension,New Delhi,,', '28.589945', '77.298024', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharge_history`
--

CREATE TABLE `wallet_recharge_history` (
  `wallet_recharge_history_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recharge_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_recharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_recharge_history`
--

INSERT INTO `wallet_recharge_history` (`wallet_recharge_history_id`, `user_id`, `amount`, `recharge_status`, `date_of_recharge`) VALUES
(64, '324', '500', 'success', '2019-10-04 05:44:25'),
(65, '324', '1000', 'success', '2019-10-07 10:08:36'),
(66, '327', '9000', 'success', '2019-10-09 17:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `assign_homecat`
--
ALTER TABLE `assign_homecat`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `cash_recharge`
--
ALTER TABLE `cash_recharge`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `cityadmin`
--
ALTER TABLE `cityadmin`
  ADD PRIMARY KEY (`cityadmin_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`completed_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`delivery_boy_id`);

--
-- Indexes for table `delivery_boy_area`
--
ALTER TABLE `delivery_boy_area`
  ADD PRIMARY KEY (`delivery_boy_area_id`);

--
-- Indexes for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  ADD PRIMARY KEY (`delivery_timing_id`);

--
-- Indexes for table `discount_type`
--
ALTER TABLE `discount_type`
  ADD PRIMARY KEY (`discount_type_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `fcm_key`
--
ALTER TABLE `fcm_key`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `first_wallet_recharge`
--
ALTER TABLE `first_wallet_recharge`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `homecat`
--
ALTER TABLE `homecat`
  ADD PRIMARY KEY (`homecat_id`);

--
-- Indexes for table `incentive`
--
ALTER TABLE `incentive`
  ADD PRIMARY KEY (`incentive_id`);

--
-- Indexes for table `incentive_amount`
--
ALTER TABLE `incentive_amount`
  ADD PRIMARY KEY (`incentive_amount_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `membership_plan`
--
ALTER TABLE `membership_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `notificationby`
--
ALTER TABLE `notificationby`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `not_accepted`
--
ALTER TABLE `not_accepted`
  ADD PRIMARY KEY (`not_accepted_id`);

--
-- Indexes for table `order_complains`
--
ALTER TABLE `order_complains`
  ADD PRIMARY KEY (`order_complain_id`);

--
-- Indexes for table `paymentvia`
--
ALTER TABLE `paymentvia`
  ADD PRIMARY KEY (`paymentvia_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sms_api`
--
ALTER TABLE `sms_api`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `spldaynotification`
--
ALTER TABLE `spldaynotification`
  ADD PRIMARY KEY (`splnotification_id`);

--
-- Indexes for table `spldays`
--
ALTER TABLE `spldays`
  ADD PRIMARY KEY (`spldays_id`);

--
-- Indexes for table `stock_update`
--
ALTER TABLE `stock_update`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  ADD PRIMARY KEY (`wallet_recharge_history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assign_homecat`
--
ALTER TABLE `assign_homecat`
  MODIFY `assign_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash_recharge`
--
ALTER TABLE `cash_recharge`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cityadmin`
--
ALTER TABLE `cityadmin`
  MODIFY `cityadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `completed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `delivery_boy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `delivery_boy_area`
--
ALTER TABLE `delivery_boy_area`
  MODIFY `delivery_boy_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  MODIFY `delivery_timing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_type`
--
ALTER TABLE `discount_type`
  MODIFY `discount_type_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fcm_key`
--
ALTER TABLE `fcm_key`
  MODIFY `unique_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_wallet_recharge`
--
ALTER TABLE `first_wallet_recharge`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `homecat`
--
ALTER TABLE `homecat`
  MODIFY `homecat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `incentive`
--
ALTER TABLE `incentive`
  MODIFY `incentive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incentive_amount`
--
ALTER TABLE `incentive_amount`
  MODIFY `incentive_amount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_plan`
--
ALTER TABLE `membership_plan`
  MODIFY `plan_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notificationby`
--
ALTER TABLE `notificationby`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `not_accepted`
--
ALTER TABLE `not_accepted`
  MODIFY `not_accepted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_complains`
--
ALTER TABLE `order_complains`
  MODIFY `order_complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paymentvia`
--
ALTER TABLE `paymentvia`
  MODIFY `paymentvia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sms_api`
--
ALTER TABLE `sms_api`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spldaynotification`
--
ALTER TABLE `spldaynotification`
  MODIFY `splnotification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spldays`
--
ALTER TABLE `spldays`
  MODIFY `spldays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_update`
--
ALTER TABLE `stock_update`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  MODIFY `wallet_recharge_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
