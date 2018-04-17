-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 04:16 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poip2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Apparatus'),
(2, 'Consumable'),
(3, 'Equipment'),
(4, 'Reagent');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iid` int(11) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `iname`, `cid`, `mid`, `status`) VALUES
(47, 'Baking Soda', 1, 1, 1),
(48, 'wayne', 1, 1, 1),
(49, 'Wayne', 1, 1, 1),
(52, 'QQé£žè½¦', 1, 2, 1),
(53, 'Aqua', 4, 1, 1),
(54, 'å¼¹å¼¹å ‚', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `mid` int(11) NOT NULL,
  `mname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measure`
--

INSERT INTO `measure` (`mid`, `mname`) VALUES
(1, 'Mol'),
(2, 'Gallon');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `quantity` decimal(11,2) NOT NULL,
  `purpose` longtext NOT NULL,
  `rDate` date DEFAULT NULL,
  `rStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `uid`, `iid`, `quantity`, `purpose`, `rDate`, `rStatus`) VALUES
(5, 2, 47, '12.33', 'Just for fun', '2018-04-11', 'Stocked Up'),
(6, 2, 48, '34.00', 'Just for fun', '2018-04-11', 'Pending'),
(7, 3, 49, '100.00', 'HAHAHA', '2018-04-11', 'Stocked Up'),
(8, 2, 52, '50.00', 'I dont know', '2018-04-17', 'Stocked Up'),
(9, 2, 47, '60.00', 'No reason', '2018-04-17', 'Pending'),
(10, 2, 47, '60.00', 'No reason', '2018-04-17', 'Stocked Up');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `sid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expire` date NOT NULL,
  `sStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sid`, `iid`, `quantity`, `expire`, `sStatus`) VALUES
(36, 47, 10, '2018-04-11', 0),
(37, 48, 12, '2018-04-13', 1),
(38, 49, 100, '2018-04-11', 1),
(40, 52, 1, '2018-04-20', 1),
(44, 47, 12, '2018-04-24', 1),
(49, 52, 11, '2018-04-19', 1),
(51, 54, 10, '2018-05-02', 1),
(52, 54, 5, '2018-04-18', 1),
(53, 54, 1, '2018-04-27', 1),
(55, 52, 50, '2018-04-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `firstlogin` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastlogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `password`, `email`, `role`, `firstlogin`, `created`, `lastlogin`) VALUES
(1, 'Admin', '$2y$10$LD5tNJ0nqQo7S1o1Lg/CeudjQpIZXztFa3MZRUHqxRlroIyf/1ami', 'Admin', 0, 1, '2018-04-05 02:33:31', '0000-00-00 00:00:00'),
(2, 'user', '$2y$10$XpnnpIztdBIEAE.dOViej.JeRhNENPIw2XVDtlEWjtNEcx3J4YJt2', 'user', 1, 0, '2018-04-11 06:13:49', '0000-00-00 00:00:00'),
(3, 'Wayne', '$2y$10$R/Z2SV9IiHZzbSDVJINUWOB/jJ9smoKtwYZBt1BBn2AXIYNfDe3zq', 'wayne.ng6010@gmail.com', 1, 0, '2018-04-11 05:00:41', '0000-00-00 00:00:00'),
(4, 'tan chnong how', '$2y$10$Nl7MtQ3fYx3.oiO3jMCKa.uRgB3/FSCLUVyrZRkMhl7t9LShmvUoG', 'chong.how97@live.com', 0, 0, '2018-04-16 08:50:18', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
