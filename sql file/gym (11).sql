-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 07:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `profile_id` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `about_gym` varchar(1000) NOT NULL,
  `gym_mem_id` int(11) NOT NULL,
  `mobile_no_visible` enum('YES','NO') NOT NULL,
  `gym_land_mark` varchar(300) NOT NULL,
  `gym_location` varchar(500) DEFAULT NULL,
  `fb` varchar(300) NOT NULL,
  `tw` varchar(300) NOT NULL,
  `ins` varchar(300) NOT NULL,
  `yt` varchar(300) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`profile_id`, `photo`, `name`, `address`, `email`, `mobile`, `about_gym`, `gym_mem_id`, `mobile_no_visible`, `gym_land_mark`, `gym_location`, `fb`, `tw`, `ins`, `yt`, `update_date`) VALUES
(1, '937817_photo.jpg', 'Admin', 'Pondicherry,india', 'gym@gym.in', '7777777778', 'good one in pondicherry', 1, 'YES', 'lamp post near1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.483320060626!2d79.8129806!3d11.9410022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53616c50165c35%3A0xc85c4cc7c03f4c42!2sGym%20and%20Fitness%20Certification%20Training!5e0!3m2!1sen!2sin!4v1619510395916!5m2!1sen!2sin', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.483320060626!2d79.8129806!3d11.9410022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53616c50165c35%3A0xc85c4cc7c03f4c42!2sGym%20and%20Fitness%20Certification%20Training!5e0!3m2!1sen!2sin!4v1619510395916!5m2!1sen!2sin', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.483320060626!2d79.8129806!3d11.9410022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53616c50165c35%3A0xc85c4cc7c03f4c42!2sGym%20and%20Fitness%20Certification%20Training!5e0!3m2!1sen!2sin!4v1619510395916!5m2!1sen!2sin', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.483320060626!2d79.8129806!3d11.9410022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53616c50165c35%3A0xc85c4cc7c03f4c42!2sGym%20and%20Fitness%20Certification%20Training!5e0!3m2!1sen!2sin!4v1619510395916!5m2!1sen!2sin', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.483320060626!2d79.8129806!3d11.9410022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53616c50165c35%3A0xc85c4cc7c03f4c42!2sGym%20and%20Fitness%20Certification%20Training!5e0!3m2!1sen!2sin!4v1619510395916!5m2!1sen!2sin', '2021-05-15 05:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `gym_mem_id` int(11) NOT NULL,
  `batch_name` varchar(150) NOT NULL,
  `batch_limit` int(11) NOT NULL,
  `batch_start_time` time NOT NULL,
  `batch_end_time` time NOT NULL,
  `batch_status` enum('YES','NO') NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `gym_mem_id`, `batch_name`, `batch_limit`, `batch_start_time`, `batch_end_time`, `batch_status`, `update_date`, `create_date`) VALUES
(1, 1, 'morning batch', 150, '21:20:00', '20:20:00', 'YES', '2021-10-10 08:49:44', '2020-12-03 07:24:09'),
(2, 1, 'Evening batch', 150, '21:40:00', '23:37:00', 'YES', '2020-12-03 07:41:17', '2020-12-03 07:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `mail_details`
--

CREATE TABLE `mail_details` (
  `mail_inc_id` int(11) NOT NULL,
  `mail_id` varchar(200) NOT NULL,
  `header` varchar(150) NOT NULL,
  `body_content` text NOT NULL,
  `gym_mem_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_details`
--

INSERT INTO `mail_details` (`mail_inc_id`, `mail_id`, `header`, `body_content`, `gym_mem_id`, `create_date`) VALUES
(1, '2', 'GYM Alert', 'Your Fee Has been pending', 1, '2022-04-02 03:03:58'),
(2, '2', 'SAMPLE', 'YES THIS SAMPLE ONE', 1, '2022-04-02 03:23:42'),
(3, '1', 'Dear admin', 'i have one doubut', 2, '2022-04-02 06:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_trainer`
--

CREATE TABLE `tbl_assign_trainer` (
  `assign_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `time_start` float NOT NULL,
  `time_end` float NOT NULL,
  `visible` enum('YES','NO') DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assign_trainer`
--

INSERT INTO `tbl_assign_trainer` (`assign_id`, `trainer_id`, `day`, `time_start`, `time_end`, `visible`, `update_date`) VALUES
(1, 1, 'Monday', 14, 16, 'YES', '2021-04-30 04:25:02'),
(3, 3, 'Thursday', 10, 13, 'YES', '0000-00-00 00:00:00'),
(4, 2, 'Tuesday', 10, 12, 'YES', '0000-00-00 00:00:00'),
(5, 4, 'Thursday', 14, 15, 'YES', '0000-00-00 00:00:00'),
(6, 5, 'Friday', 12, 14, 'YES', '0000-00-00 00:00:00'),
(7, 6, 'Saturday', 16, 18, 'YES', '0000-00-00 00:00:00'),
(9, 3, 'Wednesday', 16, 18, 'YES', '0000-00-00 00:00:00'),
(10, 1, 'Sunday', 18, 20, 'YES', '0000-00-00 00:00:00'),
(11, 5, 'Saturday', 14, 16, 'YES', '0000-00-00 00:00:00'),
(12, 4, 'Friday', 20, 21, 'YES', '0000-00-00 00:00:00'),
(15, 3, 'Monday', 20, 23, 'YES', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diet_plan`
--

CREATE TABLE `tbl_diet_plan` (
  `diet_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `min_height` decimal(10,2) NOT NULL,
  `max_height` decimal(10,2) NOT NULL,
  `min_weight` decimal(10,2) NOT NULL,
  `max_weight` decimal(10,2) NOT NULL,
  `gym_mem_id` int(11) NOT NULL,
  `foods_m` text NOT NULL,
  `foods_an` text NOT NULL,
  `foods_e` text NOT NULL,
  `foods_n` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diet_plan`
--

INSERT INTO `tbl_diet_plan` (`diet_id`, `workout_id`, `min_height`, `max_height`, `min_weight`, `max_weight`, `gym_mem_id`, `foods_m`, `foods_an`, `foods_e`, `foods_n`) VALUES
(1, 1, '52.00', '55.00', '52.00', '55.00', 1, 'peanut butter,banana at night,yes,', 'yes,yes,yes,', 'yes,yes,yes,', 'yes,yes,yes,'),
(2, 1, '52.00', '55.00', '52.00', '55.00', 1, 'peanut butter,', '', '', ''),
(3, 1, '50.00', '60.00', '50.00', '60.00', 1, 'milk,', 'lunch,', 'snacks,', 'egg,');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diet_plan_name`
--

CREATE TABLE `tbl_diet_plan_name` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `gym_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diet_plan_name`
--

INSERT INTO `tbl_diet_plan_name` (`plan_id`, `plan_name`, `gym_mem_id`) VALUES
(1, 'MASS', 1),
(2, 'WEIGHT LOSS', 1),
(3, 'CUTTINGS', 1),
(4, 'WEIGHT GAIN', 1),
(6, 'ABS', 1),
(52, 'NORMAL DIET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `equipment_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `visibile` enum('YES','NO') NOT NULL,
  `gym_mem_id` int(11) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`equipment_id`, `name`, `photo`, `visibile`, `gym_mem_id`, `update_date`) VALUES
(4, 'shoulder ', '338880_photo.jpg', 'YES', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_login`
--

CREATE TABLE `tbl_member_login` (
  `gym_mem_id` int(11) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `gym_mem_id_2` varchar(11) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `member_name` varchar(60) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `mobile_no_visible` enum('YES','NO') DEFAULT NULL,
  `fb` varchar(150) NOT NULL,
  `ins` varchar(150) NOT NULL,
  `role` varchar(15) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `login_status` enum('YES','NO') NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `join_date` date NOT NULL,
  `training_type` varchar(150) NOT NULL,
  `admission_fees` int(11) NOT NULL,
  `medical_info` varchar(500) NOT NULL,
  `who_added_id` int(11) DEFAULT NULL,
  `workout_id` int(11) NOT NULL,
  `about_gym` varchar(500) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lmail_date` varchar(150) DEFAULT NULL,
  `last_health_checkup` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_login`
--

INSERT INTO `tbl_member_login` (`gym_mem_id`, `email_id`, `gym_mem_id_2`, `password`, `member_name`, `mobile_no`, `mobile_no_visible`, `fb`, `ins`, `role`, `photo`, `gender`, `login_status`, `DOB`, `address`, `join_date`, `training_type`, `admission_fees`, `medical_info`, `who_added_id`, `workout_id`, `about_gym`, `update_date`, `create_date`, `lmail_date`, `last_health_checkup`) VALUES
(1, 'gym@gym.in', NULL, '$2y$10$q3ZIbiucWwVDWRDHN1tpCeV3mNWnL5szgn/JsvLl.jKx.EcfTXkFG', 'GYM 1', '77777777', NULL, '', '', 'admin', '', 'MALE', 'YES', '0000-00-00', 'pondicherry,india', '0000-00-00', '', 0, '', NULL, 0, NULL, '2020-12-09 10:13:17', '0000-00-00 00:00:00', NULL, NULL),
(2, 'user@gym.in', 'GYM2', '$2y$10$AnU6Hr2h2VW6Y3HqOfsXGOexRqt2VRfk5UHne5aoYwhxasbMPmmJq', 'user1', '7777777777', 'NO', 'https://www.facebook.com/rag.van.35/', '', 'member', '606265_photo.jpg', 'FEMALE', 'YES', '2020-12-11', 'pondicherry,india', '2022-04-15', 'personal_training', 100, 'hellow', 1, 1, 'www', '2022-04-15 02:11:05', '2020-12-10 01:13:09', '2022-03-20 13:20:46', NULL),
(3, 'deragav@gmail.com', 'GYM3', '$2y$10$Ucu2.QjSffL8e4Wpx7okKuS3F9TVBC5hvkBpIV2MyUidQpuKXR8RK', 'user1', '7092887009', NULL, '', '', 'member', '932502_photo.jpeg', 'MALE', 'YES', '2022-04-14', 'rrewr', '2022-04-15', 'general_training', 200, 'werewr', 1, 1, NULL, '2022-04-15 02:14:11', '2022-04-15 02:12:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_payment`
--

CREATE TABLE `tbl_member_payment` (
  `payment_id` int(11) NOT NULL,
  `gym_mem_id` int(11) DEFAULT NULL,
  `gym_mem_id_2` varchar(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `discount_type` varchar(150) NOT NULL,
  `discout_amount_or_percentage` varchar(150) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `payment_comments` varchar(500) NOT NULL,
  `date_of_given` date NOT NULL,
  `expiry_date` date NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_payment`
--

INSERT INTO `tbl_member_payment` (`payment_id`, `gym_mem_id`, `gym_mem_id_2`, `amount`, `discount_type`, `discout_amount_or_percentage`, `due_amount`, `payment_comments`, `date_of_given`, `expiry_date`, `batch_id`, `plan_id`, `update_date`, `create_date`) VALUES
(3, 1, 'GYM2', 500, 'Percent', '0', 400, 'yes', '2022-01-31', '2022-03-20', 0, 7, '2022-03-20 12:18:53', '2021-02-05 05:46:03'),
(4, 6, 'GYM6', 500, 'Percent', '0', 400, 'yes', '2022-01-31', '2022-03-20', 0, 7, '2022-04-04 17:17:21', '2021-02-05 00:16:03'),
(5, 1, 'GYM3', 500, 'Percent', '0', 0, 'none', '2022-04-15', '2022-05-15', 1, 2, '0000-00-00 00:00:00', '2022-04-15 02:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_diet`
--

CREATE TABLE `tbl_mem_diet` (
  `mem_diet_id` int(11) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `chest_size` varchar(10) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `gym_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_diet`
--

INSERT INTO `tbl_mem_diet` (`mem_diet_id`, `height`, `weight`, `chest_size`, `plan_id`, `date`, `gym_mem_id`) VALUES
(1, '55', '55', '55', 1, '2022-04-06', 2),
(2, '55', '55', '55', 2, '2022-05-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msg_id` int(11) NOT NULL,
  `client_msg` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `date_of_msg` date NOT NULL,
  `date_of_reply` date NOT NULL,
  `common_reply` enum('NO','YES') NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msg_id`, `client_msg`, `client_id`, `reply`, `reply_id`, `date_of_msg`, `date_of_reply`, `common_reply`) VALUES
(23, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(24, 'hellow', 2, 'yes', 1, '2022-05-04', '2022-05-04', 'NO'),
(25, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(26, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(27, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(28, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(29, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(30, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(31, 'hello i need help for payment', 2, 'yes we can help you tell me', 1, '2022-05-04', '2022-05-04', 'YES'),
(32, 'hello i need help for payment', 2, 'yes we can help you tell me', 0, '2022-05-04', '2022-05-04', 'YES'),
(33, 'hello i need help for payment', 2, 'yes we can help you tell me', 0, '2022-05-04', '2022-05-04', 'YES'),
(34, 'dddd', 2, 'ddd', 1, '2022-05-04', '2022-05-04', 'NO'),
(35, 'gggg', 2, 'fsdfgf', 1, '2022-05-04', '2022-05-04', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(150) NOT NULL,
  `plan_amount` int(11) NOT NULL,
  `plan_months` int(11) NOT NULL,
  `plan_status` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `gym_mem_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_plans`
--

INSERT INTO `tbl_plans` (`plan_id`, `plan_name`, `plan_amount`, `plan_months`, `plan_status`, `gym_mem_id`, `update_date`, `create_date`) VALUES
(2, '500 - one month plan', 500, 1, 'YES', 1, '2020-12-03 06:40:30', '2020-12-02 05:52:45'),
(7, 'three month pack', 900, 3, 'YES', 1, '2021-10-10 12:16:06', '2020-12-02 06:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queries`
--

CREATE TABLE `tbl_queries` (
  `ticket_id` int(11) NOT NULL,
  `ticket_issue` varchar(50) DEFAULT NULL,
  `ticket_comment` varchar(500) DEFAULT NULL,
  `date_given` timestamp NULL DEFAULT NULL,
  `ticket_status` enum('SUCCESS','PENDING') DEFAULT NULL,
  `reply_comment` varchar(500) DEFAULT NULL,
  `reply_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ticket_rise_gm_id` int(11) DEFAULT NULL,
  `ticket_reply_gm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_issues`
--

CREATE TABLE `tbl_ticket_issues` (
  `ticket_issues_id` int(11) NOT NULL,
  `issues_name` varchar(100) NOT NULL,
  `visible` enum('YES','NO') NOT NULL,
  `gym_mem_id` int(11) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ticket_issues`
--

INSERT INTO `tbl_ticket_issues` (`ticket_issues_id`, `issues_name`, `visible`, `gym_mem_id`, `update_date`, `create_date`) VALUES
(1, 'payment issues', 'YES', 1, '2021-04-27 02:27:49', NULL),
(2, 'Gender issues', 'YES', 1, '2021-04-27 02:27:50', NULL),
(3, 'Others', 'YES', 1, '2021-04-27 02:51:40', NULL),
(5, 'machine problem', 'YES', 1, '2021-10-10 12:22:10', '2021-04-27 02:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE `tbl_trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `specialist` varchar(150) NOT NULL,
  `discriptions` varchar(500) DEFAULT NULL,
  `photo` varchar(300) NOT NULL,
  `photo1` varchar(150) DEFAULT NULL,
  `visible` enum('YES','NO') NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fb` varchar(500) DEFAULT NULL,
  `tw` varchar(500) DEFAULT NULL,
  `ins` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`trainer_id`, `trainer_name`, `specialist`, `discriptions`, `photo`, `photo1`, `visible`, `update_date`, `fb`, `tw`, `ins`) VALUES
(1, 'Professor', 'Racing runing', 'Racing runing, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '884150_photo.jpg', '293381_photo1.jpg', 'YES', '2021-05-01 13:46:42', NULL, NULL, NULL),
(2, 'masco', 'Body building', 'Body Building, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '126378_photo.jpg', '709790_photo1.jpg', 'YES', '2021-05-01 13:46:52', NULL, NULL, NULL),
(3, 'berlin', 'Yoga Fitness', 'Yoga Fitness, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '155253_photo.jpg', '675806_photo1.jpg', 'YES', '2021-05-01 13:47:00', NULL, NULL, NULL),
(4, 'tokiyo', 'Kick boxing', 'Kick boxing, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '710335_photo.jpg', '799014_photo1.jpg', 'YES', '2021-05-01 13:47:12', NULL, NULL, NULL),
(5, 'danvor', 'Cardio workout', 'Cardio workout, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '590388_photo.jpg', '911787_photo1.jpg', 'YES', '2021-05-01 13:47:22', NULL, NULL, NULL),
(6, 'Nairobi', 'Martial Arts', 'Martial Arts, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast! Focusing on low weight loads and high repetition movements, you\'ll burn fat', '495489_photo.jpg', '489751_photo1.jpg', 'YES', '2021-05-01 13:47:30', NULL, NULL, NULL),
(7, 'arturo', 'Martial Arts', NULL, '346251_photo.jpg', '411408_photo1.jpg', 'YES', '2021-05-02 01:52:27', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unregister_msg`
--

CREATE TABLE `tbl_unregister_msg` (
  `msg_id` int(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_subject` varchar(150) DEFAULT NULL,
  `sender_mail` varchar(150) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `send_msg` varchar(500) NOT NULL,
  `status` enum('PENDING','REPLYED') NOT NULL,
  `reply_comt` varchar(500) NOT NULL,
  `date_of_reply` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workouts`
--

CREATE TABLE `tbl_workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_name` varchar(150) NOT NULL,
  `video_links` text NOT NULL,
  `gym_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_workouts`
--

INSERT INTO `tbl_workouts` (`workout_id`, `workout_name`, `video_links`, `gym_mem_id`) VALUES
(1, 'Cardio', 'https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,', 1),
(2, 'free workouts', 'https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,', 1),
(3, 'mass', 'https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,', 1),
(4, 'abs', 'https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,https://www.youtube.com/,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workout_update`
--

CREATE TABLE `tbl_workout_update` (
  `w_id` int(11) NOT NULL,
  `gym_mem_id` int(11) NOT NULL,
  `situp1` varchar(50) NOT NULL,
  `chest_press` varchar(50) NOT NULL,
  `sit_up` varchar(50) NOT NULL,
  `pushup` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `body_weight` varchar(50) NOT NULL,
  `date_` text NOT NULL,
  `shoulder_` text NOT NULL,
  `chest_` text NOT NULL,
  `trunk_` text NOT NULL,
  `arm_` text NOT NULL,
  `waist_` text NOT NULL,
  `hips_` text NOT NULL,
  `thigh_` text NOT NULL,
  `calf_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_workout_update`
--

INSERT INTO `tbl_workout_update` (`w_id`, `gym_mem_id`, `situp1`, `chest_press`, `sit_up`, `pushup`, `height`, `body_weight`, `date_`, `shoulder_`, `chest_`, `trunk_`, `arm_`, `waist_`, `hips_`, `thigh_`, `calf_`) VALUES
(1, 6, '44', '44', '56', '34', '67', '44', '2022-04-13,2022-04-21,2022-04-06', '4,435,4', '4,34,4', '4,34,44', '4,345,4', '4,345,', '4,345,4', '4,345,4', '4,345,4'),
(2, 2, '44', '44', '44', '44', '44', '44', '2022-04-27', '44', '44', '44', '44', '44', '44', '44', '44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `mail_details`
--
ALTER TABLE `mail_details`
  ADD PRIMARY KEY (`mail_inc_id`);

--
-- Indexes for table `tbl_assign_trainer`
--
ALTER TABLE `tbl_assign_trainer`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_diet_plan`
--
ALTER TABLE `tbl_diet_plan`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `tbl_diet_plan_name`
--
ALTER TABLE `tbl_diet_plan_name`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `tbl_member_login`
--
ALTER TABLE `tbl_member_login`
  ADD PRIMARY KEY (`gym_mem_id`);

--
-- Indexes for table `tbl_member_payment`
--
ALTER TABLE `tbl_member_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_mem_diet`
--
ALTER TABLE `tbl_mem_diet`
  ADD PRIMARY KEY (`mem_diet_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_queries`
--
ALTER TABLE `tbl_queries`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `tbl_ticket_issues`
--
ALTER TABLE `tbl_ticket_issues`
  ADD PRIMARY KEY (`ticket_issues_id`);

--
-- Indexes for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `tbl_unregister_msg`
--
ALTER TABLE `tbl_unregister_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_workouts`
--
ALTER TABLE `tbl_workouts`
  ADD PRIMARY KEY (`workout_id`);

--
-- Indexes for table `tbl_workout_update`
--
ALTER TABLE `tbl_workout_update`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mail_details`
--
ALTER TABLE `mail_details`
  MODIFY `mail_inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assign_trainer`
--
ALTER TABLE `tbl_assign_trainer`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_diet_plan`
--
ALTER TABLE `tbl_diet_plan`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_diet_plan_name`
--
ALTER TABLE `tbl_diet_plan_name`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member_login`
--
ALTER TABLE `tbl_member_login`
  MODIFY `gym_mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member_payment`
--
ALTER TABLE `tbl_member_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mem_diet`
--
ALTER TABLE `tbl_mem_diet`
  MODIFY `mem_diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_queries`
--
ALTER TABLE `tbl_queries`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ticket_issues`
--
ALTER TABLE `tbl_ticket_issues`
  MODIFY `ticket_issues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_unregister_msg`
--
ALTER TABLE `tbl_unregister_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_workouts`
--
ALTER TABLE `tbl_workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_workout_update`
--
ALTER TABLE `tbl_workout_update`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
