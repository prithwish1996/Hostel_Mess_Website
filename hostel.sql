-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2017 at 02:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `billfactors`
--

CREATE TABLE `billfactors` (
  `id` int(11) NOT NULL,
  `coupon` float NOT NULL,
  `extra` float NOT NULL,
  `milk` float NOT NULL,
  `openstock` float NOT NULL,
  `closestock` float NOT NULL,
  `establishment` float NOT NULL,
  `milk15` float NOT NULL,
  `milk30` float NOT NULL,
  `perday` float NOT NULL,
  `tpgc` float NOT NULL,
  `src` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billfactors`
--

INSERT INTO `billfactors` (`id`, `coupon`, `extra`, `milk`, `openstock`, `closestock`, `establishment`, `milk15`, `milk30`, `perday`, `tpgc`, `src`) VALUES
(1, 21312, 2312, 13212, 13212, 1231, 13212, 13212, 12312, 9.73965, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `commpass`
--

CREATE TABLE `commpass` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LAST_DATE` date NOT NULL,
  `BOOLEAN` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commpass`
--

INSERT INTO `commpass` (`USERNAME`, `PASSWORD`, `LAST_DATE`, `BOOLEAN`) VALUES
('asdf', 'asdf', '2017-03-31', 1),
('tyui', 'tyui', '2017-02-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `room` int(11) NOT NULL,
  `Menu` varchar(10) NOT NULL,
  `Breakfast` tinyint(1) NOT NULL,
  `Lunch` tinyint(1) NOT NULL,
  `Tea` tinyint(1) NOT NULL,
  `TeaSnacks` tinyint(1) NOT NULL,
  `Snacks` tinyint(1) NOT NULL,
  `Dinner` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `Name`, `room`, `Menu`, `Breakfast`, `Lunch`, `Tea`, `TeaSnacks`, `Snacks`, `Dinner`) VALUES
(1, 'akjshdj', 23, 'V', 1, 0, 0, 0, 0, 0),
(2, 'asda', 12, 'VEG', 1, 0, 0, 0, 0, 1),
(3, 'Anlln', 45, 'NV', 1, 1, 0, 0, 1, 0),
(4, 'aaassf', 13, 'NV', 0, 0, 0, 0, 0, 1),
(5, 'hjkl', 7, 'NV', 0, 0, 0, 0, 0, 1),
(6, 'qwer', 47, 'NV', 1, 0, 0, 1, 0, 0),
(7, 'jhklj', 1, 'VEG', 0, 0, 0, 1, 0, 0),
(8, 'dgeg', 45, 'VEG', 0, 1, 0, 0, 0, 0),
(9, 'Prithwish', 87, 'VEG', 1, 0, 1, 0, 0, 0),
(10, 'Prashant', 86, 'VEG', 1, 0, 1, 0, 0, 0),
(11, '', 0, 'VFC', 0, 1, 0, 0, 0, 0),
(12, 'wd', 0, 'VEG', 0, 0, 1, 0, 0, 0),
(13, '', 0, 'NVFC', 0, 1, 0, 0, 0, 1),
(14, 'wqd', 0, 'VEG', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dummyeffdays`
--

CREATE TABLE `dummyeffdays` (
  `ID` int(4) NOT NULL,
  `EFFECTIVE_DAYS` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummyeffdays`
--

INSERT INTO `dummyeffdays` (`ID`, `EFFECTIVE_DAYS`) VALUES
(101, 19),
(102, 12),
(103, 21),
(104, 23),
(105, 31),
(106, 23),
(107, 10),
(108, 27),
(109, 17),
(110, 28),
(111, 10),
(112, 17),
(113, 28),
(114, 0),
(115, 25),
(116, 22),
(117, 29),
(118, 24),
(119, 29),
(120, 19),
(121, 400),
(122, 18),
(123, 19),
(124, 17),
(125, 17),
(126, 16),
(127, 20),
(128, 17),
(129, 25),
(130, 23),
(131, 15),
(132, 5),
(133, 16),
(134, 10),
(135, 19),
(136, 5),
(137, 18),
(138, 11),
(139, 19),
(140, 16),
(141, 8),
(142, 16),
(143, 0),
(144, 11),
(145, 20),
(146, 31),
(147, 21),
(148, 22),
(149, 5),
(150, 24),
(151, 21),
(152, 5),
(153, 9),
(154, 5),
(155, 5),
(156, 5),
(157, 11),
(158, 21),
(159, 18),
(160, 14),
(161, 16),
(162, 22),
(163, 5),
(164, 5),
(165, 27),
(166, 5),
(167, 19),
(168, 24),
(169, 13),
(170, 14),
(171, 25),
(172, 11),
(173, 17),
(174, 12),
(175, 20),
(176, 5),
(177, 19),
(178, 18),
(179, 19),
(180, 18),
(181, 20),
(182, 26),
(183, 18),
(184, 17),
(185, 31),
(186, 12),
(187, 12),
(188, 10),
(189, 5),
(190, 0),
(191, 5),
(192, 18),
(193, 12),
(194, 20),
(195, 8),
(196, 11),
(197, 21),
(198, 15),
(199, 14),
(200, 13),
(201, 19),
(202, 15),
(203, 27),
(204, 23),
(205, 15),
(206, 9),
(207, 10),
(208, 15),
(209, 5),
(210, 27),
(211, 16),
(212, 26),
(213, 18),
(214, 24),
(215, 28),
(216, 23),
(217, 18),
(218, 30),
(219, 17),
(220, 18),
(221, 31),
(222, 11),
(223, 30),
(224, 31),
(225, 5),
(226, 30),
(227, 13),
(228, 5),
(229, 5),
(230, 5),
(231, 22),
(232, 24),
(233, 7),
(234, 31),
(235, 12),
(236, 26),
(237, 9),
(238, 19),
(239, 23),
(240, 5),
(241, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dummypurchases`
--

CREATE TABLE `dummypurchases` (
  `DATE` date NOT NULL,
  `EXPENDITURE_PAID` int(11) NOT NULL,
  `EXPENDITURE_UNPAID` int(11) NOT NULL,
  `ESTABLISHMENT_PAID` int(11) NOT NULL,
  `ESTABLISHMENT_UNPAID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummypurchases`
--

INSERT INTO `dummypurchases` (`DATE`, `EXPENDITURE_PAID`, `EXPENDITURE_UNPAID`, `ESTABLISHMENT_PAID`, `ESTABLISHMENT_UNPAID`) VALUES
('0000-00-00', 0, 0, 0, 0),
('2017-01-03', 21312, 231, 2312, 12321),
('2017-01-05', 0, 0, 0, 0),
('2017-01-06', 0, 0, 0, 0),
('2017-01-07', 0, 0, 0, 0),
('2017-01-08', 0, 0, 0, 0),
('2017-01-10', 0, 0, 0, 0),
('2017-01-18', 0, 0, 0, 0),
('2017-01-19', 0, 0, 0, 0),
('2017-01-20', 0, 0, 0, 0),
('2017-01-23', 0, 0, 0, 0),
('2017-01-25', 0, 0, 0, 0),
('2017-01-26', 0, 0, 0, 0),
('2017-01-30', 1, 2, 3, 4),
('2017-01-31', 3213, 23124, 12412, 2413),
('2017-02-01', 5, 0, 0, 0),
('2017-02-06', 0, 0, 0, 0),
('2017-02-08', 0, 0, 0, 0),
('2017-02-15', 0, 0, 0, 0),
('2017-02-22', 0, 0, 0, 0),
('2017-06-21', 12, 12, 23, 32),
('2017-10-03', 12, 23, 45, 56),
('2017-10-10', 12, 21, 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `lastday`
--

CREATE TABLE `lastday` (
  `temper` varchar(10) NOT NULL,
  `temper1` date NOT NULL,
  `temper2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lastday`
--

INSERT INTO `lastday` (`temper`, `temper1`, `temper2`) VALUES
('FRIDAY', '0000-00-00', '2017-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `latecoupon`
--

CREATE TABLE `latecoupon` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `room` int(11) NOT NULL,
  `Menu` varchar(10) NOT NULL,
  `Breakfast` tinyint(1) NOT NULL,
  `Lunch` tinyint(1) NOT NULL,
  `Tea` tinyint(1) NOT NULL,
  `TeaSnacks` tinyint(1) NOT NULL,
  `Snacks` tinyint(1) NOT NULL,
  `Dinner` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latecoupon`
--

INSERT INTO `latecoupon` (`id`, `Name`, `room`, `Menu`, `Breakfast`, `Lunch`, `Tea`, `TeaSnacks`, `Snacks`, `Dinner`) VALUES
(11, 'adsd', 5, 'NV', 1, 1, 0, 0, 0, 0),
(2, 'Prithwish', 87, 'VEG', 1, 1, 1, 0, 0, 0),
(3, 'eknmlk', 0, 'VEG', 0, 1, 0, 0, 0, 0),
(4, 'ancwjn', 123, 'VEG', 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `latejoin`
--

CREATE TABLE `latejoin` (
  `id` int(11) NOT NULL,
  `Menu` varchar(10) NOT NULL,
  `effective` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messjoin`
--

CREATE TABLE `messjoin` (
  `ID` int(11) NOT NULL,
  `Menu` varchar(10) NOT NULL,
  `effective` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messjoin`
--

INSERT INTO `messjoin` (`ID`, `Menu`, `effective`, `active`) VALUES
(124, 'VEG', 20, 0),
(105, 'Veg', 0, 0),
(114, 'VEG', 20, 0),
(103, 'VEG', 13, 1),
(104, 'VEG', 12, 1),
(107, 'VEG', 1, 1),
(101, 'VEG', 0, 1),
(102, 'VEG', 0, 1),
(109, 'VEG', 0, 1),
(125, 'VEG', 0, 0),
(167, 'VEG', 0, 1),
(198, 'VEG', 0, 1),
(190, 'VEG', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `milkfirsthalf`
--

CREATE TABLE `milkfirsthalf` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milkfirsthalf`
--

INSERT INTO `milkfirsthalf` (`id`) VALUES
(107),
(112);

-- --------------------------------------------------------

--
-- Table structure for table `milksecondhalf`
--

CREATE TABLE `milksecondhalf` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milksecondhalf`
--

INSERT INTO `milksecondhalf` (`id`) VALUES
(107),
(108),
(109),
(111),
(125);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `Date` date NOT NULL,
  `Expenditure_Paid` int(10) NOT NULL,
  `Expenditure_Unpaid` int(10) NOT NULL,
  `Establishment_Paid` int(10) NOT NULL,
  `Establishment_Unpaid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Date`, `Expenditure_Paid`, `Expenditure_Unpaid`, `Establishment_Paid`, `Establishment_Unpaid`) VALUES
('0000-00-00', 23, 45, 76, 87),
('2017-01-07', 0, 0, 0, 0),
('2017-01-08', 0, 0, 0, 0),
('2017-01-10', 0, 0, 0, 0),
('2017-01-19', 0, 0, 0, 0),
('2017-01-20', 0, 0, 0, 0),
('2017-01-23', 0, 0, 0, 0),
('2017-01-25', 0, 0, 0, 0),
('2017-01-26', 0, 0, 0, 0),
('2017-01-30', 1, 2, 3, 4),
('2017-01-31', 3213, 23124, 12412, 2413),
('2017-02-06', 0, 0, 0, 0),
('2017-02-08', 0, 0, 0, 0),
('2017-02-15', 0, 0, 0, 0),
('2017-02-22', 0, 0, 0, 0),
('2017-02-27', 190, 19983, 653, 1213),
('2017-06-21', 12, 12, 23, 32),
('2017-10-03', 12, 23, 45, 56),
('2017-10-10', 12, 21, 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `reduction`
--

CREATE TABLE `reduction` (
  `ID` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reduction`
--

INSERT INTO `reduction` (`ID`, `count`, `active`, `total`) VALUES
(103, 0, 0, 0),
(0, 0, 0, 0),
(107, 0, 0, 0),
(124, 0, 1, 0),
(125, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `secpass`
--

CREATE TABLE `secpass` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secpass`
--

INSERT INTO `secpass` (`USERNAME`, `PASSWORD`) VALUES
('aqwe', 'aqwe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(3) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `DEPT` varchar(10) NOT NULL,
  `ROOM_NO` varchar(50) NOT NULL,
  `I_CARD_NO` int(10) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `DUE` int(10) NOT NULL,
  `CAUTION_DEPOSIT` int(10) NOT NULL,
  `FINE` int(8) NOT NULL,
  `messblock` tinyint(1) NOT NULL,
  `messbill` float NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `DEPT`, `ROOM_NO`, `I_CARD_NO`, `YEAR`, `DUE`, `CAUTION_DEPOSIT`, `FINE`, `messblock`, `messbill`, `total`) VALUES
(101, 'Manjari', 'cusat', '01', 0, 2017, 99, 0, 0, 0, 489.167, 0),
(102, 'Athira', 'cusat', '01', 0, 2017, -500, 0, 0, 0, 494, 0),
(103, 'Divya Ponnuswany', 'cusat', '02', 0, 2017, 0, 0, 0, 0, 494, 500),
(104, 'Jisha', 'cusat', '03', 0, 2017, 900, 0, 300, 0, 494, 1200),
(105, 'Aneesha', 'cusat', '03', 0, 2017, 0, 0, 0, 0, 494, 0),
(106, 'Honey', 'cusat', '04', 0, 2017, 0, 0, 0, 0, 494, 0),
(107, 'Parvati', 'cusat', '04', 0, 2017, 0, 0, 0, 0, 26018, 0),
(108, 'Akhitha', 'cusat', '05', 0, 2017, 0, 0, 0, 0, 12806, 0),
(109, 'Moushmi', 'cusat', '05', 0, 2017, 0, 0, 0, 0, 12806, 0),
(110, 'Arsha', 'cusat', '06', 0, 2017, 0, 0, 0, 0, 494, 0),
(111, 'Anila', 'cusat', '06', 0, 2017, 0, 0, 0, 0, 12806, 0),
(112, 'Ranjana', 'cusat', '07', 0, 2017, 0, 0, 0, 0, 13706, 0),
(113, 'Nishad', 'cusat', '07', 0, 2017, 0, 0, 0, 0, 494, 0),
(114, 'Parvathy', 'cusat', '08', 0, 2017, 0, 0, 0, 0, 494, 0),
(115, 'Beena', 'cusat', '08', 0, 2017, 0, 0, 0, 0, 494, 0),
(116, 'Nimya', 'cusat', '09', 0, 2017, 0, 0, 0, 0, 494, 0),
(117, 'Rajalekshmi', 'cusat', '09', 0, 2017, 0, 0, 0, 0, 494, 0),
(118, 'Shinu', 'cusat', '10', 0, 2017, 0, 0, 0, 0, 494, 0),
(119, 'Christene Elizabath', 'cusat', '10', 0, 2017, 0, 0, 0, 0, 494, 0),
(120, 'Sangeetha', 'cusat', '11', 0, 2017, 0, 0, 0, 0, 494, 0),
(121, 'Seersha', 'cusat', '11', 0, 2017, 0, 0, 0, 0, 494, 0),
(122, 'Aswathy', 'cusat', '12', 0, 2017, 0, 0, 0, 0, 494, 0),
(123, 'Sruthy', 'cusat', '12', 0, 2017, 0, 0, 0, 0, 494, 0),
(124, 'Jessica', 'cusat', '13', 0, 2017, 0, 0, 0, 0, 494, 0),
(125, 'Sariga', 'cusat', '13', 0, 2017, 0, 0, 0, 0, 12806, 0),
(126, 'Nayana', 'cusat', '14', 0, 2017, 0, 0, 0, 0, 494, 0),
(127, 'Aishwarya', 'cusat', '14', 0, 2017, 0, 0, 0, 0, 494, 0),
(128, 'Soumini C', 'cusat', '15', 0, 2017, 0, 0, 0, 0, 494, 0),
(129, 'Sneha', 'cusat', '15', 0, 2017, 0, 0, 0, 0, 494, 0),
(130, 'Anju', 'cusat', '16', 0, 2017, 0, 0, 0, 0, 494, 0),
(131, 'Revathy', 'cusat', '16', 0, 2017, 0, 0, 0, 0, 494, 0),
(132, 'Ammu', 'cusat', '18', 0, 2017, 0, 0, 0, 0, 494, 0),
(133, 'Saleena', 'cusat', '18', 0, 2017, 0, 0, 0, 0, 494, 0),
(134, 'Nisa', 'cusat', '19', 0, 2017, 0, 0, 0, 0, 494, 0),
(135, 'Aswathy', 'cusat', '19', 0, 2017, 0, 0, 0, 0, 494, 0),
(136, 'Soumya', 'cusat', '20', 0, 2017, 0, 0, 0, 0, 494, 0),
(137, 'Namitha', 'cusat', '20', 0, 2017, 0, 0, 0, 0, 494, 0),
(138, 'Saritha', 'cusat', '21', 0, 2017, 0, 0, 0, 0, 494, 0),
(139, 'Ajilisa', 'cusat', '21', 0, 2017, 0, 0, 0, 0, 494, 0),
(140, 'Thanooja', 'cusat', '22', 0, 2017, 0, 0, 0, 0, 494, 0),
(141, 'Archana', 'cusat', '22', 0, 2017, 0, 0, 0, 0, 494, 0),
(142, 'Malu', 'cusat', '23', 0, 2017, 0, 0, 0, 0, 494, 0),
(143, 'Prasitha', 'cusat', '23', 0, 2017, 0, 0, 0, 0, 494, 0),
(144, 'Soorya', 'cusat', '24', 0, 2017, 0, 0, 0, 0, 494, 0),
(145, 'Rani Mol', 'cusat', '25', 0, 2017, 0, 0, 0, 0, 494, 0),
(146, 'Lakshmi', 'cusat', '25', 0, 2017, 0, 0, 0, 0, 494, 0),
(147, 'Honey', 'cusat', '26', 0, 2017, 0, 0, 0, 0, 494, 0),
(148, 'Tina', 'cusat', '26', 0, 2017, 0, 0, 0, 0, 494, 0),
(149, 'Chandni', 'cusat', '27', 0, 2017, 0, 0, 0, 0, 494, 0),
(150, 'Sangeetha', 'cusat', '27', 0, 2017, 0, 0, 0, 0, 494, 0),
(151, 'Chaithanya', 'cusat', '28', 0, 2017, 0, 0, 0, 0, 494, 0),
(152, 'Aswathi', 'cusat', '29', 0, 2017, 0, 0, 0, 0, 494, 0),
(153, 'Anju K R', 'cusat', '29', 0, 2017, 0, 0, 0, 0, 494, 0),
(154, 'Dhanya Shaji', 'cusat', '30', 0, 2017, 0, 0, 0, 0, 494, 0),
(155, 'Anooja', 'cusat', '30', 0, 2017, 0, 0, 0, 0, 494, 0),
(156, 'Asha', 'cusat', '31', 0, 2017, 0, 0, 0, 0, 494, 0),
(157, 'Savitha', 'cusat', '31', 0, 2017, 0, 0, 0, 0, 494, 0),
(158, 'Sethulakshmi', 'cusat', '32', 0, 2017, 0, 0, 0, 0, 494, 0),
(159, 'Athira', 'cusat', '32', 0, 2017, 0, 0, 0, 0, 494, 0),
(160, 'Anu', 'cusat', '33', 0, 2017, 0, 0, 0, 0, 494, 0),
(161, 'Jiji', 'cusat', '33', 0, 2017, 0, 0, 0, 0, 494, 0),
(162, 'Nimitha', 'cusat', '34', 0, 2017, 0, 0, 0, 0, 494, 0),
(163, 'Aparna', 'cusat', '34', 0, 2017, 0, 0, 0, 0, 494, 0),
(164, 'Sreekala', 'cusat', '35', 0, 2017, 0, 0, 0, 0, 494, 0),
(165, 'Jayashree', 'cusat', '35', 0, 2017, 0, 0, 0, 0, 494, 0),
(166, 'Shejina', 'cusat', '36', 0, 2017, 0, 0, 0, 0, 494, 0),
(167, 'Aishwarya', 'cusat', '36', 0, 2017, 0, 0, 0, 0, 494, 0),
(168, 'Shilpa', 'cusat', '37', 0, 2017, 0, 0, 0, 0, 494, 0),
(169, 'Rejisha', 'cusat', '37', 0, 2017, 0, 0, 0, 0, 494, 0),
(170, 'Shiji', 'cusat', '38', 0, 2017, 0, 0, 0, 0, 494, 0),
(171, 'Dibin', 'cusat', '38', 0, 2017, 0, 0, 0, 0, 494, 0),
(172, 'Anitha', 'cusat', '39', 0, 2017, 0, 0, 0, 0, 494, 0),
(173, 'Priya', 'cusat', '39', 0, 2017, 0, 0, 0, 0, 494, 0),
(174, 'Vishnupriya', 'cusat', '40', 0, 2017, 0, 0, 0, 0, 494, 0),
(175, 'Remsha', 'cusat', '40', 0, 2017, 0, 0, 0, 0, 494, 0),
(176, 'Jisha', 'cusat', '41', 0, 2017, 0, 0, 0, 0, 494, 0),
(177, 'Shebitha', 'cusat', '41', 0, 2017, 0, 0, 0, 0, 494, 0),
(178, 'Archana', 'cusat', '42', 0, 2017, 0, 0, 0, 0, 494, 0),
(179, 'Anju K S', 'cusat', '42', 0, 2017, 0, 0, 0, 0, 494, 0),
(180, 'Deepa', 'cusat', '43', 0, 2017, 0, 0, 0, 0, 494, 0),
(181, 'Rani', 'cusat', '43', 0, 2017, 0, 0, 0, 0, 494, 0),
(182, 'Remya', 'cusat', '44', 0, 2017, 0, 0, 0, 0, 494, 0),
(183, 'Sabira', 'cusat', '45', 0, 2017, 0, 0, 0, 0, 494, 0),
(184, 'Shaheeda', 'cusat', '45', 0, 2017, 0, 0, 0, 0, 494, 0),
(185, 'Priyanka', 'cusat', '46', 0, 2017, 0, 0, 0, 0, 494, 0),
(186, 'Divya', 'cusat', '46', 0, 2017, 0, 0, 0, 0, 494, 0),
(187, 'Bini', 'cusat', '47', 0, 2017, 0, 0, 0, 0, 494, 0),
(188, 'Pooja Mol', 'cusat', '47', 0, 2017, 0, 0, 0, 0, 494, 0),
(189, 'Arpana', 'cusat', '48', 0, 2017, 0, 0, 0, 0, 494, 0),
(190, 'Cerene', 'cusat', '48', 0, 2017, 0, 0, 0, 0, 494, 0),
(191, 'Sharanya A Sankar', 'cusat', '49', 0, 2017, 0, 0, 0, 0, 494, 0),
(192, 'Shaibuna', 'cusat', '49', 0, 2017, 0, 0, 0, 0, 494, 0),
(193, 'Ronia', 'cusat', '50', 0, 2017, 0, 0, 0, 0, 494, 0),
(194, 'Prasara', 'cusat', '50', 0, 2017, 0, 0, 0, 0, 494, 0),
(195, 'Anu Maria', 'cusat', '51', 0, 2017, 0, 0, 0, 0, 494, 0),
(196, 'Neethu', 'cusat', '51', 0, 2017, 0, 0, 0, 0, 494, 0),
(197, 'Aswathy', 'cusat', '52', 0, 2017, 0, 0, 0, 0, 494, 0),
(198, 'Letcy', 'cusat', '52', 0, 2017, 0, 0, 0, 0, 494, 0),
(199, 'Anjali', 'cusat', '53', 0, 2017, 0, 0, 0, 0, 494, 0),
(200, 'Soumya', 'cusat', '53', 0, 2017, 0, 0, 0, 0, 494, 0),
(201, 'Shinu', 'cusat', '54', 0, 2017, 0, 0, 0, 0, 494, 0),
(202, 'Anjana', 'cusat', '54', 0, 2017, 0, 0, 0, 0, 494, 0),
(203, 'Anjali C P', 'cusat', '55', 0, 2017, 0, 0, 0, 0, 494, 0),
(204, 'Bhavya', 'cusat', '55', 0, 2017, 0, 0, 0, 0, 494, 0),
(205, 'Lekshmi N', 'cusat', '56', 0, 2017, 0, 0, 0, 0, 494, 0),
(206, 'Sisuma', 'cusat', '56', 0, 2017, 0, 0, 0, 0, 494, 0),
(207, 'Vineetha', 'cusat', '57', 0, 2017, 0, 0, 0, 0, 494, 0),
(208, 'Jinisha', 'cusat', '57', 0, 2017, 0, 0, 0, 0, 494, 0),
(209, 'Kanaklatha', 'cusat', '58', 0, 2017, 0, 0, 0, 0, 494, 0),
(210, 'Sreejina', 'cusat', '58', 0, 2017, 0, 0, 0, 0, 494, 0),
(211, 'Sreelekshmi', 'cusat', '59', 0, 2017, 0, 0, 0, 0, 494, 0),
(212, 'Latha', 'cusat', '59', 0, 2017, 0, 0, 0, 0, 494, 0),
(213, 'Anjitha', 'cusat', '60', 0, 2017, 0, 0, 0, 0, 494, 0),
(214, 'Anupama', 'cusat', '60', 0, 2017, 0, 0, 0, 0, 494, 0),
(215, 'Siril', 'cusat', '61', 0, 2017, 0, 0, 0, 0, 494, 0),
(216, 'Liz', 'cusat', '61', 0, 2017, 0, 0, 0, 0, 494, 0),
(217, 'Somalatha', 'cusat', '62', 0, 2017, 0, 0, 0, 0, 494, 0),
(218, 'Anu Krishna', 'cusat', '63', 0, 2017, 0, 0, 0, 0, 494, 0),
(219, 'Krishna', 'cusat', '63', 0, 2017, 0, 0, 0, 0, 494, 0),
(220, 'Shahanaz', 'cusat', '64', 0, 2017, 0, 0, 0, 0, 494, 0),
(221, 'Jasna', 'cusat', '64', 0, 2017, 0, 0, 0, 0, 494, 0),
(222, 'Ajina', 'cusat', '65', 0, 2017, 0, 0, 0, 0, 494, 0),
(223, 'Anoopa', 'cusat', '65', 0, 2017, 0, 0, 0, 0, 494, 0),
(224, 'LIncy', 'cusat', '66', 0, 2017, 0, 0, 0, 0, 494, 0),
(225, 'Vishnupriya', 'cusat', '66', 0, 2017, 0, 0, 0, 0, 494, 0),
(226, 'Remya', 'cusat', '67', 0, 2017, 0, 0, 0, 0, 494, 0),
(227, 'Fiona', 'cusat', '67', 0, 2017, 0, 0, 0, 0, 494, 0),
(228, 'Stonia', 'cusat', '68', 0, 2017, 0, 0, 0, 0, 494, 0),
(229, 'Heera', 'cusat', '68', 0, 2017, 0, 0, 0, 0, 494, 0),
(230, 'Theresa', 'cusat', '69', 0, 2017, 0, 0, 0, 0, 494, 0),
(231, 'Thasneem', 'cusat', '69', 0, 2017, 0, 0, 0, 0, 494, 0),
(232, 'Radhika', 'cusat', '70', 0, 2017, 0, 0, 0, 0, 494, 0),
(233, 'Savitha', 'cusat', '70', 0, 2017, 0, 0, 0, 0, 494, 0),
(234, 'Remisha', 'cusat', '71', 0, 2017, 0, 0, 0, 0, 494, 0),
(235, 'Shyja', 'cusat', '71', 0, 2017, 0, 0, 0, 0, 494, 0),
(236, 'Santu', 'cusat', '72', 0, 2017, 0, 0, 0, 0, 494, 0),
(237, 'Geethu', 'cusat', '72', 0, 2017, 0, 0, 0, 0, 494, 0),
(238, 'Ahal', 'cusat', '73', 0, 2017, 0, 0, 0, 0, 494, 0),
(239, 'Vinisha', 'cusat', '73', 0, 2017, 0, 0, 0, 0, 494, 0),
(240, 'Athiramol', 'cusat', '74', 0, 2017, 0, 0, 0, 0, 494, 0),
(241, 'Syamili', 'cusat', '74', 0, 2017, 0, 0, 0, 0, 494, 0);

-- --------------------------------------------------------

--
-- Table structure for table `valueset2`
--

CREATE TABLE `valueset2` (
  `DAYS` varchar(10) NOT NULL,
  `BREAKFAST` int(5) NOT NULL,
  `LUNCH` int(5) NOT NULL,
  `TEA` int(5) NOT NULL,
  `TEA_SNACKS` int(5) NOT NULL,
  `DINNER` int(5) NOT NULL,
  `SNACKS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valueset2`
--

INSERT INTO `valueset2` (`DAYS`, `BREAKFAST`, `LUNCH`, `TEA`, `TEA_SNACKS`, `DINNER`, `SNACKS`) VALUES
('FRIDAY', 25, 25, 29, 30, 35, 0),
('MONDAY', 1, 1, 1, 1, 1, 0),
('SATURDAY', 20, 25, 23, 45, 50, 0),
('SUNDAY', 45323, 23, 65, 21, 78, 0),
('THURSDAY', 0, 0, 0, 0, 0, 0),
('TUESDAY', 34, 231, 231, 321, 23123, 0),
('WEDNESDAY', 56, 32, 21, 12, 12, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billfactors`
--
ALTER TABLE `billfactors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commpass`
--
ALTER TABLE `commpass`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummyeffdays`
--
ALTER TABLE `dummyeffdays`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dummypurchases`
--
ALTER TABLE `dummypurchases`
  ADD PRIMARY KEY (`DATE`);

--
-- Indexes for table `lastday`
--
ALTER TABLE `lastday`
  ADD PRIMARY KEY (`temper`);

--
-- Indexes for table `latecoupon`
--
ALTER TABLE `latecoupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latejoin`
--
ALTER TABLE `latejoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messjoin`
--
ALTER TABLE `messjoin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `milkfirsthalf`
--
ALTER TABLE `milkfirsthalf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milksecondhalf`
--
ALTER TABLE `milksecondhalf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `reduction`
--
ALTER TABLE `reduction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `secpass`
--
ALTER TABLE `secpass`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `valueset2`
--
ALTER TABLE `valueset2`
  ADD PRIMARY KEY (`DAYS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
