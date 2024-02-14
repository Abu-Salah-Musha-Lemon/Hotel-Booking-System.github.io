-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 07:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sr_no` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'lemon', '123');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `db_picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `db_picture`) VALUES
(2, 'IMG_60840.jpg'),
(3, 'IMG_49447.png'),
(4, 'IMG_12983.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address_db` varchar(255) NOT NULL,
  `gmap_db` varchar(255) NOT NULL,
  `pn1_db` bigint(20) NOT NULL,
  `pn2_db` bigint(20) NOT NULL,
  `email_db` varchar(255) NOT NULL,
  `fb_db` varchar(255) NOT NULL,
  `insta_db` varchar(255) NOT NULL,
  `tw_db` varchar(255) NOT NULL,
  `iframe_db` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address_db`, `gmap_db`, `pn1_db`, `pn2_db`, `email_db`, `fb_db`, `insta_db`, `tw_db`, `iframe_db`) VALUES
(2, 'XYZ, JatraBark, Dhaka 1', 'https://goo.gl/maps/HFvB8rHkUVgYECKZ7', 990045555, 8812345555, 'asmlhote@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.06396869835!2d90.25487678497385!3d23.780753030831328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1699027044198!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `sr_no` int(11) NOT NULL,
  `db_name` varchar(200) NOT NULL,
  `db_icon` varchar(100) NOT NULL,
  `db_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`sr_no`, `db_name`, `db_icon`, `db_desc`) VALUES
(25, 'wifi', 'IMG_63577.svg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content her'),
(26, 'tv', 'IMG_21637.svg', 'Standard communication and entertainment options.'),
(27, 'ac', 'IMG_81257.svg', 'Essential for comfort, especially in warm climates.\n'),
(28, 'fire', 'IMG_21478.svg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content her'),
(29, 'Good Showers:', 'IMG_18761.svg', 'A refreshing shower with consistent water pressure and temperature.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `sr_no` int(11) NOT NULL,
  `db_fea_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`sr_no`, `db_fea_name`) VALUES
(7, 'Toiletries'),
(8, 'Personal Care Items'),
(9, 'Coffee Kit'),
(10, 'Tissue Box'),
(11, 'athrobes and Slippers'),
(12, 'ast Wireless Connectivity (Wi-Fi)'),
(13, 'Smart Rooms &amp; Smart Technology'),
(14, 'USB Charger Ports &amp; Universal Plug-ins'),
(15, 'Smart TV with Complimentary Movie Library'),
(16, 'In-Room Coffee Machine'),
(17, 'Music Player with Wireless Connection'),
(18, 'Cove Lighting');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`sr_no`, `name`, `area`, `price`, `quantity`, `adult`, `child`, `desc`, `status`) VALUES
(36, 'adf', 123, 300, 2, 4, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 1),
(37, 'B02', 240, 400, 3, 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 0),
(38, 'B03', 123, 123, 2, 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 0),
(39, 'A01', 200, 700, 4, 2, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 0),
(40, 'D4', 200, 200, 2, 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 0),
(41, 'D5', 200, 200, 2, 3, 2, 'ipsum dolor sit amet consectetur adipisicing elit. Debitis, reiciendis! Fugiat tempora maxime, ipsum dolorem, sed corrupti delectus, nihil eveniet rem provident aut est sit! Ullam quisquam laboriosam assumenda vero.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_facilities`
--

CREATE TABLE `rooms_facilities` (
  `sr_no` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_facilities`
--

INSERT INTO `rooms_facilities` (`sr_no`, `rooms_id`, `facilities_id`) VALUES
(10, 36, 25),
(11, 37, 25),
(12, 38, 25),
(13, 39, 25),
(14, 39, 26),
(15, 39, 27),
(16, 39, 28),
(17, 40, 25),
(18, 40, 26),
(19, 40, 27),
(20, 40, 28),
(21, 41, 25),
(22, 41, 26),
(23, 41, 27);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_features`
--

CREATE TABLE `rooms_features` (
  `sr_no` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_features`
--

INSERT INTO `rooms_features` (`sr_no`, `rooms_id`, `features_id`) VALUES
(2, 36, 7),
(3, 37, 7),
(4, 38, 7),
(5, 39, 9),
(6, 40, 7),
(7, 40, 8),
(8, 40, 9),
(9, 41, 7),
(10, 41, 10),
(11, 41, 12),
(12, 41, 14);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `sr_no` int(11) NOT NULL,
  `site_title_db` varchar(255) NOT NULL,
  `site_about_db` varchar(3000) NOT NULL,
  `shutdown_db` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sr_no`, `site_title_db`, `site_about_db`, `shutdown_db`) VALUES
(1, 'ASM Lab', 'Our travel website combines stunning photography, enticing summaries of destinations, and practical tips. Discover hotel recommendations, explore recreation activities, and immerse yourself in arts and culture. Whether you’re planning a city escape or an exotic adventure, we’ve got you covered. From packing guides to public transport info, we simplify your journey. Trust us to inspire your wanderlust and empower your travel plans. 🌎✈️', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `tm_name_db` varchar(255) NOT NULL,
  `tm_picture_db` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `tm_name_db`, `tm_picture_db`) VALUES
(20, 'leon', 'IMG_30180.jpg'),
(21, 'lemon', 'IMG_34294.jpg'),
(22, 'redoy', 'IMG_11467.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) NOT NULL,
  `t_expire` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`sr_no`, `name`, `email`, `address`, `phone`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(1, 'lemon ', 'lemon@gmail.com', 'XYZ, JatraBark, Dhaka 1204', '02212345555', 123123, '2024-02-07', 0, '1234', 0, '', '0000-00-00', 1, 0),
(2, 'leon', 'leon@gmail.com', 'XYZ, JatraBark, Dhaka 1204', '1000000000', 123123, '2024-02-10', 0, 'leon', 1, '', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

CREATE TABLE `user_query` (
  `sr_no` int(11) NOT NULL,
  `db_name` varchar(50) NOT NULL,
  `db_email` varchar(150) NOT NULL,
  `db_subject` varchar(200) NOT NULL,
  `db_message` varchar(1500) NOT NULL,
  `db_date` date NOT NULL DEFAULT current_timestamp(),
  `db_seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `rooms_facilities`
--
ALTER TABLE `rooms_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rooms id` (`rooms_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indexes for table `rooms_features`
--
ALTER TABLE `rooms_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`rooms_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_query`
--
ALTER TABLE `user_query`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sr_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rooms_facilities`
--
ALTER TABLE `rooms_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rooms_features`
--
ALTER TABLE `rooms_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms_facilities`
--
ALTER TABLE `rooms_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`sr_no`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rooms id` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`sr_no`) ON UPDATE NO ACTION;

--
-- Constraints for table `rooms_features`
--
ALTER TABLE `rooms_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`sr_no`),
  ADD CONSTRAINT `rm id` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`sr_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
