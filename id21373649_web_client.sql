-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 12:42 PM
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
-- Database: `web_client_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `premium_id` bigint(20) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `xp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `email`, `premium_id`, `level`, `xp`) VALUES
(1, 'user', 'user', 'user@user.com', NULL, 1, 20),
(2, 'user2', 'user2', 'user2@user.com', 1, 5, 250),
(3, 'user3', 'user3', 'user3@user.com', NULL, 16, 1200),
(4, 'user4', 'user4', 'user4@user.com', 2, 2, 150),
(5, 'user5', 'user5', 'user5@user.com', 3, 12, 1000),
(6, 'user6', 'user6', 'user6@user.com', 4, 19, 3000),
(7, 'user7', 'user7', 'user7@user.com', NULL, 1, 20),
(8, 'user8', 'user8', 'user8@user.com', NULL, 8, 800),
(9, 'user9', 'user9', 'user9@user.com', NULL, 3, 175),
(10, 'user10', 'user10', 'user10@user.com', 5, 10, 950);

-- --------------------------------------------------------

--
-- Stand-in structure for view `client_data`
-- (See below for the actual view)
--
CREATE TABLE `client_data` (
`clientID` bigint(20)
,`username` varchar(45)
,`password` varchar(45)
,`email` varchar(45)
,`premiumID` bigint(20)
,`level` int(11)
,`XP` int(11)
,`Premium_ends` datetime
,`discount` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `favorites_list`
-- (See below for the actual view)
--
CREATE TABLE `favorites_list` (
`clientID` bigint(20)
,`username` varchar(45)
,`parkingID` bigint(20)
,`address` varchar(90)
,`price` double
);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_parking`
--

CREATE TABLE `favorite_parking` (
  `client_id` bigint(20) NOT NULL,
  `parking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `favorite_parking`
--

INSERT INTO `favorite_parking` (`client_id`, `parking_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 1),
(4, 5),
(4, 10),
(5, 2),
(5, 6),
(5, 8),
(6, 3),
(6, 7),
(6, 9),
(7, 6),
(7, 8),
(7, 10),
(8, 1),
(8, 2),
(8, 10),
(9, 3),
(9, 4),
(9, 7),
(10, 5),
(10, 8),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` bigint(20) NOT NULL,
  `address` varchar(90) NOT NULL,
  `price` double NOT NULL,
  `is_premium` tinyint(1) NOT NULL,
  `partner_id` bigint(20) NOT NULL,
  `max_spots` int(11) NOT NULL,
  `spots_taken` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `is_for_disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `address`, `price`, `is_premium`, `partner_id`, `max_spots`, `spots_taken`, `start_time`, `end_time`, `is_for_disabled`) VALUES
(1, 'Rumbulas, bld. 1/2, Rīga', 0, 0, 1, 24, 15, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 0),
(2, 'Brīvības iela 374, Rīga', 0, 0, 2, 120, 85, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1),
(3, 'K.Valdemāra iela 5a, Rīga', 1.5, 1, 3, 80, 23, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1),
(4, 'Krāsotāju iela 14, Rīga', 0, 0, 3, 5, 5, '2023-09-01 00:00:00', '2024-12-31 23:59:59', 1),
(5, 'Ģertrūdes iela 103, Rīga', 2, 0, 3, 20, 17, '2023-09-01 00:00:00', '2024-12-31 23:59:59', 0),
(6, 'Blaumaņa iela 26, Rīga', 3, 0, 3, 50, 34, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1),
(7, 'Tērbatas iela 4, Rīga', 3, 1, 3, 15, 13, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1),
(8, 'Elizabetes iela 27, Rīga', 2.5, 1, 3, 20, 9, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 0),
(9, 'Balasta dambis 56, Rīga', 1.5, 0, 3, 120, 59, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1),
(10, 'Antenas iela 2, Rīga', 1.5, 0, 3, 10, 2, '2023-09-01 00:00:00', '2023-12-31 23:59:59', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `parking_list`
-- (See below for the actual view)
--
CREATE TABLE `parking_list` (
`id` bigint(20)
,`address` varchar(90)
,`company_name` varchar(45)
,`price` double
,`is_premium` tinyint(1)
,`max_spots` int(11)
,`spots_taken` int(11)
,`start_time` datetime
,`end_time` datetime
,`is_for_disabled` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` bigint(20) NOT NULL,
  `company_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `company_name`) VALUES
(1, 'Rumbulas'),
(2, 'Alfa'),
(3, 'Rīgas satiksme');

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` bigint(20) NOT NULL,
  `end_date` datetime NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `premium`
--

INSERT INTO `premium` (`id`, `end_date`, `discount`) VALUES
(1, '2023-12-31 23:59:59', 0.25),
(2, '2024-12-31 23:59:59', 0.15),
(3, '2024-12-31 23:59:59', 0.3),
(4, '2023-12-31 23:59:59', 0.5),
(5, '2024-12-31 23:59:59', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(20) NOT NULL,
  `parking_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `parking_id`, `client_id`, `end_time`) VALUES
(1, 1, 1, '2023-11-30 19:59:59'),
(2, 2, 1, '2023-11-20 11:59:59'),
(3, 3, 1, '2023-11-10 11:59:59'),
(4, 4, 2, '2023-11-15 11:59:59'),
(5, 5, 2, '2023-11-15 23:59:59'),
(6, 6, 2, '2023-11-16 23:59:59'),
(7, 7, 3, '2023-11-10 23:59:59'),
(8, 8, 3, '2023-11-18 11:59:59'),
(9, 9, 3, '2023-11-19 11:59:59'),
(10, 10, 4, '2023-11-20 11:59:59'),
(11, 1, 4, '2023-11-22 11:59:59'),
(12, 2, 4, '2023-11-25 11:59:59'),
(13, 3, 5, '2023-11-05 11:59:59'),
(14, 4, 5, '2023-11-06 11:59:59'),
(15, 5, 5, '2023-11-07 11:59:59'),
(16, 6, 6, '2023-11-10 11:59:59'),
(17, 7, 6, '2023-11-11 11:59:59'),
(18, 8, 6, '2023-11-11 23:59:59'),
(19, 9, 7, '2023-11-15 23:59:59'),
(20, 10, 7, '2023-11-18 23:59:59'),
(21, 1, 7, '2023-11-19 23:59:59'),
(22, 2, 8, '2023-11-20 23:59:59'),
(23, 3, 8, '2023-11-21 23:59:59'),
(24, 4, 8, '2023-11-24 23:59:59'),
(25, 5, 9, '2023-11-14 23:59:59'),
(26, 6, 9, '2023-11-16 11:59:59'),
(27, 7, 9, '2023-11-18 11:59:59'),
(28, 8, 10, '2023-11-10 11:59:59'),
(29, 9, 10, '2023-11-29 11:59:59'),
(30, 10, 10, '2023-11-30 23:59:59');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservation_list`
-- (See below for the actual view)
--
CREATE TABLE `reservation_list` (
`id` bigint(20)
,`username` varchar(45)
,`email` varchar(45)
,`parking_id` bigint(20)
,`start_time` datetime
,`end_time` datetime
,`address` varchar(90)
,`company_name` varchar(45)
,`price` double
);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `parking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `title`, `description`, `rating`, `time`, `client_id`, `parking_id`) VALUES
(1, 'Very accessible', 'The parking spot was conveniently located near the entrance, making it easy to access.', 4, '2023-09-01 00:00:00', 1, 1),
(2, 'Cleanliness', 'The parking space was well-maintained and clean.', 5, '2023-09-01 00:00:00', 2, 1),
(3, 'Easy to find', 'The availability of ample parking spots eased the search.', 5, '2023-09-20 11:59:59', 3, 1),
(4, 'Spacious', 'The parking area was quite spacious, allowing for easy maneuvering of vehicles.', 5, '2023-09-20 11:59:59', 4, 2),
(5, 'Security', 'I appreciated the security measures in place, which made me feel safe leaving my car there.', 5, '2023-09-24 11:59:59', 5, 2),
(6, 'Friendliness', 'The parking attendants were friendly and helpful, providing a pleasant experience.', 4, '2023-09-29 11:59:59', 6, 2),
(7, 'Covered area', 'The site had a covered parking area, protecting my car from the elements.', 4, '2023-09-11 11:59:59', 7, 3),
(8, 'Good value', 'The parking rates were reasonable, offering good value for money.', 3, '2023-09-15 11:59:59', 8, 3),
(9, 'Convenient', 'The convenience of having multiple entrances and exits made it easy to enter and exit.', 3, '2023-09-17 11:59:59', 9, 3),
(10, 'Well organized', 'The parking spots were well-marked, ensuring clear demarcation between vehicles.', 4, '2023-09-12 11:59:59', 10, 4),
(11, 'Inclusive', 'The site had designated spots for disabled individuals, showing consideration for accessibility.', 5, '2023-09-14 11:59:59', 1, 4),
(12, 'Good organization', 'The parking attendants were efficient in guiding vehicles and managing the flow of traffic.', 4, '2023-09-19 11:59:59', 2, 4),
(13, 'Eco-friendly', 'Appreciated the availability of electric vehicle charging stations, catering to eco-friendly drivers.', 5, '2023-09-01 11:59:59', 3, 5),
(14, 'Feeling of security', 'The parking area was well-lit, providing a sense of security during nighttime parking.', 4, '2023-09-12 11:59:59', 4, 5),
(15, 'Conveniently located', 'The site has a convenient location near popular attractions, making it a great choice for tourists.', 5, '2023-09-15 11:59:59', 5, 5),
(16, 'Comfort', 'The parking spaces were wide, allowing for easy opening of car doors.', 4, '2023-09-10 11:59:59', 6, 6),
(17, 'Competitive price', 'The parking rates are competitive compared to nearby options.', 3, '2023-09-16 11:59:59', 7, 6),
(18, 'Assistance', 'The parking attendants were prompt in assisting with any issues or inquiries.', 4, '2023-09-18 11:59:59', 8, 6),
(19, 'Accessible for motorcycle owners', 'The site had a dedicated area for motorcycle parking, catering to two-wheeler owners.', 4, '2023-09-10 11:59:59', 9, 7),
(20, 'Well-maintained', 'The parking area at was well-maintained, with regular cleaning and upkeep.', 4, '2023-09-15 11:59:59', 10, 7),
(21, 'Shuttle service', 'I appreciated the availability of a shuttle service to nearby locations, making it convenient for travelers.', 4, '2023-09-17 11:59:59', 1, 7),
(22, 'Convenient location', 'The parking spots at were conveniently located near the building entrance, saving time and effort.', 3, '2023-09-07 11:59:59', 2, 8),
(23, 'Mobile app', 'Site had a user-friendly mobile app for booking and managing parking reservations.', 4, '2023-09-08 11:59:59', 3, 8),
(24, 'Professionalism', 'The parking attendants were courteous and professional, providing a positive customer service experience.', 4, '2023-09-11 11:59:59', 4, 8),
(25, '24/7 security', 'The availability of 24/7 security personnel, ensuring the safety of parked vehicles, was appreciated.', 5, '2023-09-12 11:59:59', 5, 9),
(26, 'Well-organized', 'The parking area was well-organized, with clear signage for easy navigation.', 4, '2023-09-14 11:59:59', 6, 9),
(27, 'Great offers', 'The site offered discounted rates for long-term parking, making it suitable for extended trips.', 5, '2023-09-28 11:59:59', 7, 9),
(28, 'Considarate', 'The parking spaces were spacious, accommodating larger vehicles comfortably.', 4, '2023-09-03 11:59:59', 8, 10),
(29, 'Walking distance', 'The availability of covered walkways from the parking area to nearby buildings were appreciated.', 3, '2023-09-06 11:59:59', 9, 10),
(30, 'User-friendly', 'The site had a user-friendly payment system, allowing for quick and hassle-free transactions.', 4, '2023-09-16 11:59:59', 10, 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `review_list`
-- (See below for the actual view)
--
CREATE TABLE `review_list` (
`parkingID` bigint(20)
,`title` varchar(45)
,`description` varchar(500)
,`rating` int(11)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `client_data`
--
DROP TABLE IF EXISTS `client_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `client_data`  AS SELECT `client`.`id` AS `clientID`, `client`.`username` AS `username`, `client`.`password` AS `password`, `client`.`email` AS `email`, `premium`.`id` AS `premiumID`, `client`.`level` AS `level`, `client`.`xp` AS `XP`, `premium`.`end_date` AS `Premium_ends`, `premium`.`discount` AS `discount` FROM (`client` left join `premium` on(`client`.`premium_id` = `premium`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `favorites_list`
--
DROP TABLE IF EXISTS `favorites_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favorites_list`  AS SELECT `client`.`id` AS `clientID`, `client`.`username` AS `username`, `parking`.`id` AS `parkingID`, `parking`.`address` AS `address`, `parking`.`price` AS `price` FROM ((`client` left join `favorite_parking` on(`client`.`id` = `favorite_parking`.`client_id`)) join `parking` on(`favorite_parking`.`parking_id` = `parking`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `parking_list`
--
DROP TABLE IF EXISTS `parking_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `parking_list`  AS SELECT `parking`.`id` AS `id`, `parking`.`address` AS `address`, `partner`.`company_name` AS `company_name`, `parking`.`price` AS `price`, `parking`.`is_premium` AS `is_premium`, `parking`.`max_spots` AS `max_spots`, `parking`.`spots_taken` AS `spots_taken`, `parking`.`start_time` AS `start_time`, `parking`.`end_time` AS `end_time`, `parking`.`is_for_disabled` AS `is_for_disabled` FROM (`parking` left join `partner` on(`parking`.`partner_id` = `partner`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reservation_list`
--
DROP TABLE IF EXISTS `reservation_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservation_list`  AS SELECT `client`.`id` AS `id`, `client`.`username` AS `username`, `client`.`email` AS `email`, `parking`.`id` AS `parking_id`, `parking`.`start_time` AS `start_time`, `reservation`.`end_time` AS `end_time`, `parking`.`address` AS `address`, `partner`.`company_name` AS `company_name`, `parking`.`price` AS `price` FROM (((`client` left join `reservation` on(`client`.`id` = `reservation`.`client_id`)) left join `parking` on(`reservation`.`parking_id` = `parking`.`id`)) left join `partner` on(`parking`.`partner_id` = `partner`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `review_list`
--
DROP TABLE IF EXISTS `review_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `review_list`  AS SELECT `parking`.`id` AS `parkingID`, `review`.`title` AS `title`, `review`.`description` AS `description`, `review`.`rating` AS `rating`, `client`.`username` AS `username` FROM ((`parking` left join `review` on(`parking`.`id` = `review`.`parking_id`)) join `client` on(`review`.`client_id` = `client`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `PremiumID` (`premium_id`) USING BTREE;

--
-- Indexes for table `favorite_parking`
--
ALTER TABLE `favorite_parking`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `parking_id` (`parking_id`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ParkingID` (`parking_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClientID` (`client_id`),
  ADD KEY `parking_id` (`parking_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite_parking`
--
ALTER TABLE `favorite_parking`
  ADD CONSTRAINT `favorite_parking_ibfk_1` FOREIGN KEY (`parking_id`) REFERENCES `parking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_parking_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `premium`
--
ALTER TABLE `premium`
  ADD CONSTRAINT `premium_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`premium_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`parking_id`) REFERENCES `parking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`parking_id`) REFERENCES `parking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
