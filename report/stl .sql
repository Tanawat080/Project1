-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 11:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stl`
--

-- --------------------------------------------------------

--
-- Table structure for table `perday`
--

CREATE TABLE `perday` (
  `OrderID` int(50) NOT NULL,
  `OrderDate` date NOT NULL,
  `Total` int(50) NOT NULL,
  `CustomerID` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perday`
--

INSERT INTO `perday` (`OrderID`, `OrderDate`, `Total`, `CustomerID`) VALUES
(1, '2016-02-03', 5000, 1),
(2, '2016-02-10', 4500, 2),
(3, '2015-08-09', 8000, 3),
(4, '2015-03-16', 5500, 4),
(5, '2016-09-23', 8500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permonth`
--

CREATE TABLE `permonth` (
  `Month` varchar(40) NOT NULL,
  `Circulation` int(30) NOT NULL,
  `Income` int(30) NOT NULL,
  `Increase` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permonth`
--

INSERT INTO `permonth` (`Month`, `Circulation`, `Income`, `Increase`) VALUES
('January', 685900, 45000, 15),
('Febuary', 743000, 23000, 32),
('March', 450784, 13500, 33),
('April', 567000, 12000, 47),
('May', 654900, 23490, 27),
('June', 832954, 44500, 18),
('July', 556000, 11000, 50),
('August', 765000, 13890, 55),
('September', 769349, 22400, 34),
('October', 764389, 11405, 67),
('November', 887520, 33200, 26),
('December', 854210, 22450, 38);

-- --------------------------------------------------------

--
-- Table structure for table `peryear`
--

CREATE TABLE `peryear` (
  `NO` int(30) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `2012` int(20) NOT NULL,
  `2013` int(20) NOT NULL,
  `2014` int(20) NOT NULL,
  `2015` int(20) NOT NULL,
  `2016` int(20) NOT NULL,
  `2017` int(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peryear`
--

INSERT INTO `peryear` (`NO`, `Company`, `2012`, `2013`, `2014`, `2015`, `2016`, `2017`, `Total`) VALUES
(1, 'BlueScope Lysaght (Thailand) Co.,Ltd.', 0, 0, 3422134, 654900, 0, 0, 4077034),
(2, 'Map Ta Phut Tank Terminal Co.,Ltd', 4578999, 0, 2356784, 0, 1435678, 0, 8371461),
(3, 'Rohm And Haas Chemical (Thailand) Co.,Ltd.', 1356668, 0, 0, 0, 0, 0, 1356668),
(4, 'PTT Tank Terminal Co.,Ltd.', 0, 0, 0, 0, 4785683, 0, 4785683),
(5, 'Purac (Thailand) Co.,Ltd.', 1239000, 0, 1321000, 0, 0, 0, 2560000),
(6, 'K 999 Engineering & Construction Co.,Ltd.', 4567000, 0, 0, 0, 0, 1239000, 5806000),
(7, 'A-Tek (Material) Co.,Ltd.', 1244356, 1378900, 0, 2390000, 0, 0, 5013256),
(8, 'Kongpatana Engineering And Construction Co.,Ltd.', 1245566, 2445622, 0, 0, 0, 0, 3691188),
(9, 'Grand Unity (Thailand) Co.,Ltd.', 0, 3445600, 0, 0, 0, 0, 3445600),
(10, 'V R T Autopart Limited Partnership', 0, 1233548, 0, 0, 0, 4553320, 5786868);

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE `vat` (
  `NO` int(10) NOT NULL,
  `Circulation` int(20) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`NO`, `Circulation`, `vat`, `Total`) VALUES
(1, 685900, '7%', 4801300),
(2, 743000, '7%', 5201000),
(3, 450784, '7%', 3155488),
(4, 567000, '7%', 3969000),
(5, 654900, '7%', 4584300),
(6, 832954, '7%', 5830678),
(7, 556000, '7%', 3892000),
(8, 765000, '7%', 5355000),
(9, 769349, '7%', 5385443),
(10, 764389, '7%', 5350723),
(11, 887520, '7%', 6212640),
(12, 854210, '7%', 5979470);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perday`
--
ALTER TABLE `perday`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `peryear`
--
ALTER TABLE `peryear`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `vat`
--
ALTER TABLE `vat`
  ADD PRIMARY KEY (`NO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
