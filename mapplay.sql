-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 10:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapplay`
--

CREATE TABLE `mapplay` (
  `ID` int(11) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `PlaceType` varchar(50) DEFAULT NULL,
  `PlaceDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapplay`
--

INSERT INTO `mapplay` (`ID`, `lat`, `lng`, `PlaceType`, `PlaceDesc`) VALUES
(1, '50.90366882857008', '-1.4050943621132952', 'Appa', 'Appa'),
(2, '50.90333053313173', '-1.4069598480081937', 'Shopping Center', 'Peaople shop there'),
(3, '50.90308695889401', '-1.3990688326157397', 'house', 'My house'),
(4, '50.90693889114714', '-1.4137887956894704', 'Southampton Central', 'Train Station great food'),
(5, '50.90693889114714', '-1.4144754411972829', 'null', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapplay`
--
ALTER TABLE `mapplay`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapplay`
--
ALTER TABLE `mapplay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
