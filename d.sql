-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 11:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `num`
--

-- --------------------------------------------------------

--
-- Table structure for table `numpeo`
--

CREATE TABLE IF NOT EXISTS `numpeo` (
`id` int(10) unsigned NOT NULL,
  `sub` varchar(35) NOT NULL,
  `number1` int(10) NOT NULL,
  `number2` int(10) NOT NULL,
  `number3` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numpeo`
--

INSERT INTO `numpeo` (`id`,`sub`, `number1`, `number2`,`number3`) VALUES
(1, 'ต.ป่าตอง',13711, '7848' , '5863'),
(2, 'ต.เชิงทะเล',13015, '8070' , '4945'),
(3, 'ต.วิชิต',40158, '7848' , '13869'),
(4, 'ต.ฉลอง',20187, '12859' , '7328');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `numpeo`
--
ALTER TABLE `numpeo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `numpeo`
--
ALTER TABLE `numpeo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
