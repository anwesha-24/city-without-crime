-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 02:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city_without_crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Id` int(8) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `PStation_Id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`Id`, `Description`, `PStation_Id`) VALUES
(1, 'Vandalism at 456 Oak St', 'PS001'),
(2, 'Theft at 789 Pine St', 'PS002');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_master`
--

CREATE TABLE `criminal_master` (
  `CriminalID` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Gender` varchar(5) DEFAULT NULL,
  `Height` varchar(5) DEFAULT NULL,
  `Weight` varchar(5) DEFAULT NULL,
  `PStation_Id` varchar(10) DEFAULT NULL,
  `Crimelevel` varchar(20) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `Criminal_Picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criminal_master`
--

INSERT INTO `criminal_master` (`CriminalID`, `Name`, `Gender`, `Height`, `Weight`, `PStation_Id`, `Crimelevel`, `Status`, `Criminal_Picture`) VALUES
('C001', 'Richard Brown', 'Male', '5.9', '100', 'PS001', 'High', 'Active', 'brown.jpg'),
('C002', 'Lucas Hartt', 'Male', '6.0', '120', 'PS002', 'Low', 'At Large', 'hartt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `Sno` int(3) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`Sno`, `Description`) VALUES
(1, 'Fire outbreak at 123 Elm St'),
(2, 'Armed robbery at 101 Maple Ave');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Mobile` decimal(10,0) DEFAULT NULL,
  `Full_Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Enabled` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`UserName`, `Password`, `Mobile`, `Full_Name`, `Address`, `Enabled`) VALUES
('anwe@gmail.com', 'abc', 1234567890, 'Anwesha Roy', '123 Main St', b'1'),
('anwesha@gmail.com', 'abc', 1234567890, 'Anwesha Roy', '123 Main St', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `police_station_master`
--

CREATE TABLE `police_station_master` (
  `PStation_Id` varchar(10) NOT NULL,
  `PStation_Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` decimal(10,0) DEFAULT NULL,
  `Mobile` decimal(10,0) DEFAULT NULL,
  `PStation_Head` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `police_station_master`
--

INSERT INTO `police_station_master` (`PStation_Id`, `PStation_Name`, `Address`, `Phone`, `Mobile`, `PStation_Head`, `Password`) VALUES
('PS001', 'Central Station', '123 Central St', 1234567890, 9876543210, 'John Doe', 'centralabc'),
('PS002', 'East Station', '456 East St', 2345678901, 8765432109, 'Jane Smith', 'eastxyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `criminal_master`
--
ALTER TABLE `criminal_master`
  ADD PRIMARY KEY (`CriminalID`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `police_station_master`
--
ALTER TABLE `police_station_master`
  ADD PRIMARY KEY (`PStation_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `Sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
