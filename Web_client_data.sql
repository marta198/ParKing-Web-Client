-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.byetcluster.com
-- Generation Time: Oct 09, 2023 at 04:26 AM
-- Server version: 10.4.17-MariaDB
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
-- Database: `if0_35190414_Web_client`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `ID` bigint(20) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PremiumID` bigint(20) DEFAULT NULL,
  `Level` int(11) NOT NULL,
  `XP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`ID`, `Username`, `Password`, `Email`, `PremiumID`, `Level`, `XP`) VALUES
(1, 'user', 'user', 'user@user.com', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Parking`
--

CREATE TABLE `Parking` (
  `ID` bigint(20) NOT NULL,
  `Address` varchar(90) NOT NULL,
  `Price` int(11) NOT NULL,
  `IsPremium` tinyint(1) NOT NULL,
  `PartnerID` bigint(20) NOT NULL,
  `MaxSpots` int(11) NOT NULL,
  `SpotsTaken` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Premium`
--

CREATE TABLE `Premium` (
  `ID` bigint(20) NOT NULL,
  `EndDate` datetime NOT NULL,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ID` bigint(20) NOT NULL,
  `ParkingID` bigint(20) NOT NULL,
  `EndTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reservation_table`
--

CREATE TABLE `Reservation_table` (
  `ClientID` bigint(20) NOT NULL,
  `ReservationID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Time` datetime NOT NULL,
  `ClientID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Web_client`
--

CREATE TABLE `Web_client` (
  `Client_ID` bigint(20) NOT NULL,
  `IsLoggedIn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `PremiumID` (`PremiumID`);

--
-- Indexes for table `Parking`
--
ALTER TABLE `Parking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Premium`
--
ALTER TABLE `Premium`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ParkingID` (`ParkingID`);

--
-- Indexes for table `Reservation_table`
--
ALTER TABLE `Reservation_table`
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `Web_client`
--
ALTER TABLE `Web_client`
  ADD PRIMARY KEY (`Client_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`PremiumID`) REFERENCES `Premium` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`ParkingID`) REFERENCES `Parking` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reservation_table`
--
ALTER TABLE `Reservation_table`
  ADD CONSTRAINT `Reservation_table_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `Reservation` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reservation_table_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `Client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `Client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Web_client`
--
ALTER TABLE `Web_client`
  ADD CONSTRAINT `Web_client_ibfk_1` FOREIGN KEY (`Client_ID`) REFERENCES `Client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
