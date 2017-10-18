-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 08:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpclassfall2017`
--
CREATE DATABASE IF NOT EXISTS `phpclassfall2017` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `phpclassfall2017`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstName`, `lastName`, `dob`, `height`) VALUES
(1, 'Ryan', 'Reynolds', '1976-10-23', '6&#39; 2&#34;'),
(2, 'Maggie', 'Smith', '1934-12-28', '5&#39; 5&#34;'),
(3, 'Maggie', 'Smith', '1934-12-28', '5&#39; 5&#34;'),
(4, 'Daniel', 'Radcliffe', '1989-07-23', '5&#39; 5&#34;'),
(5, 'Richard', 'Harris', '1930-10-01', '6&#39; 0&#34;'),
(6, 'Ben', 'Affleck', '1972-08-15', '6&#39; 3.5&#34;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
