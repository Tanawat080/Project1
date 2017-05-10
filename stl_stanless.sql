-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 04:58 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stl stanless`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `accessory_ID` int(11) NOT NULL,
  `accessory_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `accessory_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `identification_No` varchar(15) NOT NULL,
  `admin_password` varchar(15) NOT NULL,
  `admin_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`identification_No`, `admin_password`, `admin_ID`) VALUES
('admin', 'admin1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_ID` int(11) NOT NULL,
  `b_Bank` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_Naccount` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_ID`, `b_Bank`, `b_Naccount`, `bank_IMG`, `b_Name`) VALUES
(1, 'กสิกรไทย', '1902383537', 'logo-kbank.jpg', 'สุรพล ดวงสำราญ'),
(2, 'กสิกรไทย', '0208250116', 'logo-kbank.jpg', 'สุรนันท์ การก่อสร้าง');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `company_Name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `company_Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `company_tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `company_Fax` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `company_Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `business_Hour` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`company_Name`, `company_Address`, `company_tel`, `company_Fax`, `company_Email`, `business_Hour`) VALUES
('บ้านสุรพล', '24/53 ม.1 ต.บางม่วง อ.ตะกั่วป่าว จ.พังงา 82110', '0813266568', '077777777', 'suraphol@email.com', '08.00-18.00'),
('บ้านสุรพล', '24/53 ม.1 ต.บางม่วง อ.ตะกั่วป่าว จ.พังงา 82110', '0813266568', '077777777', 'suraphol@email.com', '08.00-18.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `customer_password` varchar(12) NOT NULL,
  `customer_Name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone_No` varchar(11) NOT NULL,
  `identification_No` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `ID`, `customer_password`, `customer_Name`, `address`, `phone_No`, `identification_No`) VALUES
(1, 0, 'Gapom1892539', 'ธนวัฒน์ มีชัย', 'สุราษฎร์ธานี ', '0810851004', '1841500151441'),
(2, 1, 'dsadsad34234', 'พุทธินันท์ ดวงสำราญ', 'พังงา', '4444444444', '1232222222222'),
(3, 5, '3213123333', 'อุไรวรรณ เผือกเพ็ชร์', 'ภูเก็ต', '5555555555', '5444444444444'),
(4, 7, 'bb12345bb', 'aaaa', 'พังงา', '2323231232', '1232132132131'),
(5, 8, 'maxmaxmax', 'แมค', 'อะไรก็ได้', '0899999999', '1234567890919'),
(6, 9, '12345678', 'น้องครีม', 'นครศรีธรรมราช', '0811111111', '1473275983275'),
(7, 10, '123456789', 'abc', 'ภูเก็ต', '0810838484', '5784758784375'),
(8, 11, '12345678', 'เบส', 'ภูเก็ต', '0954583958', '1111111111111'),
(9, 12, '123456789', 'ทราย', 'พังงา', '0811111111', '2222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `data_status`
--

CREATE TABLE `data_status` (
  `locate_Date` date NOT NULL,
  `setup_Date` date NOT NULL,
  `status_ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_status`
--

INSERT INTO `data_status` (`locate_Date`, `setup_Date`, `status_ID`, `order_ID`) VALUES
('2016-03-16', '2016-04-01', 1, 1),
('2016-04-04', '2016-05-04', 3, 2),
('2016-03-16', '2016-04-01', 1, 1),
('2016-04-04', '2016-05-04', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_ID` int(11) NOT NULL,
  `deposit_cost` int(11) NOT NULL,
  `deposit_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `deposit_date` date NOT NULL,
  `deposit_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `bank_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_ID`, `deposit_cost`, `deposit_IMG`, `deposit_date`, `deposit_time`, `order_ID`, `bank_ID`) VALUES
(3, 300, '10.png', '2017-03-08', '12.45', 1, 2),
(4, 400, '10.png', '2017-03-20', '12.00', 1, 2),
(5, 100, '7.png', '2017-03-08', '12.99', 1, 1),
(6, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(7, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(8, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(9, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(10, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(11, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(12, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(13, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(14, 50, '10.png', '2017-03-17', '11.00', 1, 1),
(15, 200, '25.png', '2017-03-08', '12.00', 2, 1),
(16, 200, '25.png', '2017-03-08', '12.00', 2, 1),
(17, 100, '3.png', '2017-03-16', '12.45', 2, 1),
(18, 100, '1.png', '2017-03-17', '12.00', 1, 1),
(19, 150, 'kmobilebanking4.jpg', '2017-03-24', '12.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` int(11) NOT NULL,
  `order_Date` date DEFAULT NULL,
  `total_cost` int(11) NOT NULL,
  `customer_ID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_ID`, `order_Date`, `total_cost`, `customer_ID`) VALUES
(1, '2016-03-01', 1500, 1),
(2, '2016-03-21', 3000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_deatail`
--

CREATE TABLE `order_deatail` (
  `product_ID` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `longtitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `landmark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `selfDesign_ID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_deatail`
--

INSERT INTO `order_deatail` (`product_ID`, `amount`, `cost`, `latitude`, `longtitude`, `landmark`, `order_ID`, `selfDesign_ID`) VALUES
(1, 1, 500, '7.888820388585677', '98.3481797655761', 'อยู่ใกล้กับโลตัส', 1, NULL),
(4, 1, 3000, '7.888820388585677', '98.3481797655761', 'อยู่ใกล้กับโลตัส', 2, NULL),
(1, 1, 500, '7.888820388585677', '98.3481797655761', 'อยู่ใกล้กับโลตัส', 1, NULL),
(4, 1, 3000, '7.888820388585677', '98.3481797655761', 'อยู่ใกล้กับโลตัส', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type_ID` int(11) NOT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_Name`, `product_IMG`, `Description`, `type_ID`, `Price`) VALUES
(1, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 1', 'img1_w.jpg', 'ประตูสแตนเลสเลื่อนประกอบไปด้วยลายสับประรดใหญ่ ลายใบเฟิร์น ', 1, 8500),
(2, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 2', 'img2_w.jpg', 'ประตูสแตนเลสเลื่อนประกอบด้วยลายบัวกลาง และสแตนเลสเส้นดัดโค้ง', 1, 8500),
(3, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 3', 'img3_w.jpg', 'ประตูเลื่อนสแตนเลสประดับด้วยดอกบัวกลาง\r\n', 1, 8500),
(4, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 4', 'img4_w.jpg', 'ประตููผลัก ประกอบด้วยประตูเล็ก2บาน ประตูใหญ่1บาน และตัวล๊อค', 1, 8500),
(5, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 5', 'img5_w.jpg', 'ประตูสแตนเลสเลื่อน ประกอบด้วยประตูเล็กแบบผลัก 1 บาน ', 1, 8500),
(14, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 14', 'img14_w.jpg', 'ประตูสแตนเลสเลื่อนแบบเรียบๆ เหล็กเส้นดัดโค้ง ประกอบด้วยด้วยลวดลาย ', 1, 7500),
(6, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 6', 'img6_w.jpg', 'ประตูเลื่อน เรียบๆ ไม่มีลวดลาย', 1, 5500),
(7, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 7', 'img7_w.jpg', 'ประตูเลื่อน ประกอบด้วยลายเถาวัลย์ ตัวอักษร และบอล', 1, 6500),
(8, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 8', 'img8_w.jpg', 'ประตูแบบพับ ประกอบด้วยลายตะกร้อ ลายปีกนก ', 1, 6500),
(9, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 9', 'img9_w.jpg', 'ประตูเลื่อน ประกอบด้วยลายซีเล็ก วงกลมลายดอกเหมย ลายตะกร้อ', 1, 7500),
(10, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 10', 'img10_w.jpg', 'ประตูเลื่อน เหล็กแท่งดัดโค้ง และลายปีกนกสีเงิน', 1, 7500),
(11, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 11', 'img11_w.jpg', 'ประตูเลื่อน เหล็กแท่งดัดโค้ง และลายปีกนกสีทอง', 1, 7500),
(12, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 12', 'img12_w.jpg', 'ประตูเลื่อน ประกอบประตูเล็ก1บาน ตกแต่งด้วยลายซีเล็ก ลายดอกไม้', 1, 7500),
(13, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 13', 'img13_w.jpg', 'ประตูเลื่อน ตกแต่งหลายลวดลาย เช่น ตะกร้อ และดอกไม้แปดแฉก', 1, 8500),
(15, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 15', 'img15_w.jpg', 'ประตูเลื่อนผสมแบบทึบเล็กน้อย ประกอบด้วยลวกลายเรียบๆ เช่น ลายโดนัด', 1, 6500),
(16, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 16', 'img16_w.jpg', 'ประตูสแตนเลสเลื่อนประกอบด้วยลวดลาย เช่น ลายใบมะม่วงใหญ่สีทองและสีเงิน', 1, 8500),
(17, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 17', 'img17_w.jpg', 'ประตูแบบพับ ประกอบด้วยเหล็กเส้นดัดโค้งและลวดลายต่างๆ เช่น ลายตะกร้อ', 1, 8500),
(18, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 18', 'img18_w.jpg', 'ประตูสแตนเลสเลื่อนเรียบๆมีลายประกอบเป็นลายโดนัท', 1, 6500),
(19, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 19', 'img19_w.jpg', 'ประตูเลื่อนแบบเรียบๆที่มีลวดลายประกอบคือลายโดนัท และลายศรบัว\r\n', 1, 6500),
(20, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 20', 'img20_w.jpg', 'ประตูเลื่อนลายเรียบๆ มีลายกนกและลายบอล', 1, 7500),
(21, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 21', 'img21_w.jpg', 'ประตูพับมีตัวล็อคทึบด้านล่าง ด้านบนประกอบด้วยลายซีใหญ่ ตะกร้อ ดอกไม้5แฉก\r\n', 1, 7500),
(22, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 22', 'img22_w.jpg', 'ประตูพับแบบเรียบๆ และลายโดนัท', 1, 6500),
(23, 'ประตูสแตนเลสแบบโปร่งด้านนอกแบบที่ 23', 'img23_w.jpg', 'ประตูเลื่อนประกอบด้วยลวดลายมากมาย', 1, 7500),
(24, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 1', 'img1-win.jpg', 'หน้าต่างยึดติดกับผนังด้านนอก ประกอบด้วยเหล็กเส้นดัดโค้ง และลวดลาย เช่น ลายใบมะม่วงใหญ่ ', 2, 6500),
(26, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 2', 'img2-win.jpg', 'หน้าต่างยึดติดด้านนอก ประกอบด้วยลายโดนัท', 2, 6500),
(27, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 4', 'img4-win.jpg', 'หน้างต่างยึดด้านนอกแบบเรียบๆ', 2, 5500),
(28, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 5', 'img5-win.jpg', 'หน้าต่างยึดด้านนอกแบบเรียบๆ', 2, 5500),
(29, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 6', 'img6-win.jpg', 'หน้าต่างยึดด้านนอก ประกอบด้วยเหล็กเส้นดัดโค้ง และลวดลาย', 2, 7000),
(30, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 7', 'img7-win.jpg', 'หน้าต่างยืดด้านนอก ประกอบลายต่างๆ เช่น ลายโรมันสีทอง และลายศรแฉก', 2, 8500),
(31, 'หน้าต่างสแตนเลสด้านนอกแบบที่ 8', 'img8-win.jpg', 'หน้าต่างนึดด้านนอก ประกอบลายต่างๆ', 2, 7000),
(102, 'ราวระเบียง', 'img3-bc.jpg', 'ราวระเบียง', 3, 3500),
(101, 'ราวระเบียง', 'img2-bc.jpg', 'ราวระเบียง', 3, 3700),
(100, 'ราวระเบียง', 'img1-bc.jpg', 'ราวระเบียง', 3, 4000),
(99, 'ราวบันได', 'img10-ra.jpg', 'ราวบันได', 4, 3900),
(98, 'ราวบันได', 'img9-ra.jpg', 'ราวบันได', 4, 4000),
(97, 'ราวบันได', 'img8-ra.jpg', 'ราวบันได', 4, 4000),
(96, 'ราวบันได', 'img7-ra.jpg', 'ราวบันได', 4, 3700),
(95, 'ราวบันได', 'img6-ra.jpg', 'ราวบันได', 4, 3800),
(94, 'ราวบันได', 'img5-ra.jpg', 'ราวบันได', 4, 3900),
(93, 'ราวบันได', 'img4-ra.jpg', 'ราวบันได', 4, 3600),
(92, 'ราวบันได', 'img3-ra.jpg', 'ราวบันได', 4, 4500),
(91, 'ราวบันได', 'img2-ra.jpg', 'ราวบันได', 4, 3800),
(90, 'ราวบันได', 'img1-ra.jpg', 'ราวบันได', 4, 3500),
(88, 'รั้ว1', 'img26-hr.jpg', 'รั้ว1', 5, 6700),
(89, 'รั้ว', 'img27-hr.jpg', 'รั้ว', 5, 7500),
(87, 'รั้ว', 'img25-hr.jpg', 'รั้ว', 5, 7500),
(85, 'รั้ว', 'img11-hr.jpg', 'รั้ว', 5, 5500),
(86, 'รั้ว', 'img24-hr.jpg', 'รั้ว', 5, 8000),
(84, 'หลังคากันสาด14', 'img14-r.jpg', 'หลังคากันสาด', 6, 2500),
(83, 'หลังคากันสาด13', 'img13-r.jpg', 'หลังคากันสาด', 6, 2200),
(82, 'หลังคากันสาด12', 'img12-r.jpg', 'หลังคากันสาด', 6, 2800),
(81, 'หลังคากันสาด11', 'img11-r.jpg', 'หลังคากันสาด', 6, 2550),
(80, 'หลังคากันสาด10', 'img10-r.jpg', 'หลังคากันสาด', 6, 2700),
(79, 'หลังคากันสาด9', 'img9-r.jpg', 'หลังคากันสาด', 6, 2800),
(78, 'หลังคากันสาด8', 'img8-r.jpg', 'หลังคากันสาด', 6, 2400),
(77, 'หลังคากันสาด7', 'img7-r.jpg', 'หลังคากันสาด', 6, 2300),
(76, 'หลังคากันสาด5', 'img5-r.jpg', 'หลังคากันสาด', 6, 2600),
(75, 'หลังคากันสาด', 'img1-r.jpg', 'หลังคากันสาด', 6, 2500),
(74, 'หลังคาโรงจอดรถ10', 'img10-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2600),
(73, 'หลังคาโรงจอดรถ9', 'img9-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2700),
(72, 'หลังคาโรงจอดรถ8', 'img8-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2300),
(71, 'หลังคาโรงจอดรถ7', 'img7-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2700),
(70, 'หลังคาโรงจอดรถ6', 'img6-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2500),
(65, 'หลังคาโรงจอดรถ', 'img1-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2500),
(66, 'หลังคาโรงจอดรถ', 'img2-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2700),
(67, 'หลังคาโรงจอดรถ', 'img3-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2300),
(68, 'หลังคาโรงจอดรถ', 'img4-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2700),
(69, 'หลังคาโรงจอดรถ', 'img5-rc.jpg', 'หลังคาโรงจอดรถ', 7, 2600),
(104, 'ราวระเบียง', 'img5-bc.jpg', 'ราวระเบียง', 3, 3800),
(105, 'ราวระเบียง', 'img6-bc.jpg', 'ราวระเบียง', 3, 3600),
(106, 'ราวระเบียง', 'img7-bc.jpg', 'ราวระเบียง', 3, 3500),
(107, 'ราวระเบียง', 'img8-bc.jpg', 'ราวระเบียง', 3, 3500),
(108, 'ราวระเบียง', 'img9-bc.jpg', 'ราวระเบียง', 3, 3500),
(109, 'ราวระเบียง', 'img10-bc.jpg', 'ราวระเบียง', 3, 4300),
(110, 'เหล็กแหลม', 'img1-st.jpg', 'เหล็กหแลม', 8, 850),
(111, 'เหล็กแหลม', 'img2-st.jpg', 'เหล็กหแลม', 8, 650),
(112, 'เหล็กแหลม', 'img3-st.jpg', 'เหล็กหแลม', 8, 650),
(113, 'เหล็กแหลม', 'img4-st.jpg', 'เหล็กหแลม', 8, 1000),
(114, 'เหล็กแหลม', 'img5-st.jpg', 'เหล็กหแลม', 8, 650),
(115, 'เหล็กแหลม', 'img6-st.jpg', 'เหล็กหแลม', 8, 450),
(116, 'เหล็กหุ้มหลอดไฟ(วงกลม)', 'img11-etc.jpg', 'เหล็กหุ้มหลอดไฟ(วงกลม)', 9, 900),
(117, 'หัวราวบันได', 'img12-etc.jpg', 'หัวราวบันได', 9, 800),
(118, 'เสาบันได', 'img13-etc.jpg', 'เสาบันได', 9, 1000),
(119, 'เสาบันได', 'img14-etc.jpg', 'เสาบันได', 9, 1000),
(120, 'เสาบันได', 'img15-etc.jpg', 'เสาบันได', 9, 1000),
(121, 'เสาบันได', 'img16-etc.jpg', 'เสาบันได', 9, 1000),
(122, 'ของตกแต่ง(ช้าง)', 'img17-etc.jpg', 'ของตกแต่งบนประตู', 9, 400),
(123, 'ของตกแต่ง (ม้า)', 'img18-etc.jpg', 'ของตกแต่งบนประตู', 9, 400),
(124, 'ของตกแต่ง (ดอกไม้)', 'img19-etc.jpg', 'ของตกแต่งบนประตู', 9, 450),
(125, 'ของตกแต่ง (วงกลมดอกลีลาวดี)', 'img20-etc.jpg', 'ของตกแต่งบนประตู', 9, 450),
(126, 'ของตกแต่ง (แจกันดอกไม้)', 'img21.jpg', 'ของตกแต่งบนประตู', 9, 500),
(127, 'ของตกแต่ง (วงกลมดาว)', 'img22.jpg', 'ของตกแต่งบนประตู', 9, 450),
(128, 'ของตกแต่ง (สมอ)', 'img23.jpg', 'ของตกแต่งบนประตู', 9, 500),
(129, 'ของตกแต่ง (วงล้อ)', 'img24.jpg', 'ของตกแต่งบนประตู', 9, 500),
(130, 'ของตกแต่ง (วงล้อดอกไม้)', 'img25.jpg', 'ของตกแต่งบนประตู', 9, 450),
(131, 'ของตกแต่ง (วงล้อดาว)', 'img26.jpg', 'ของตกแต่งบนประตู', 9, 400),
(132, 'ของตกแต่ง (ดวงจันทร์)', 'img27.jpg', 'ของตกแต่งบนประตู', 9, 400),
(133, 'ของตกแต่ง (ดอกไม้ต่างๆ)', 'img28.jpg', 'ของตกแต่งบนประตู', 9, 300),
(134, 'ของตกแต่ง (โดนัทบอล)', 'img29.jpg', 'ของตกแต่งบนประตู', 9, 400),
(135, 'ของตกแต่ง (ดอกลีลาวดี)', 'img30.jpg', 'ของตกแต่งบนประตู', 9, 350),
(136, 'ของตกแต่ง (เหรียญจีน)', 'img31.jpg', 'ของตกแต่งบนประตู', 9, 400),
(137, 'ของตกแต่ง (กล่องจดหมาย)', 'img32.jpg', 'ของตกแต่งบนประตู', 9, 400),
(138, 'ประตูสแตนเลสแบบทึบ', 'img1_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(139, 'ประตูสแตนเลสแบบทึบ', 'img2_b.jpg', 'ประตูแบบทึบ', 1, 6000),
(140, 'ประตูสแตนเลสแบบทึบ', 'img3_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(141, 'ประตูสแตนเลสแบบทึบ (ลายไทย)', 'img4_b.jpg', 'ประตูแบบทึบ', 1, 8000),
(142, 'ประตูสแตนเลสเเบบทึบ ', 'img5_b.jpg', 'ประตูแบบทึบ', 1, 7500),
(143, 'ประตูสแตนเลสแบบทึบ ', 'img6_b.jpg', 'ประตูเเบบทึบ', 1, 7000),
(144, 'ประตูสแตนเลสแบบทึบ ', 'img7_b.jpg', 'ประตูแบบทึบ', 1, 7500),
(155, 'ประตูสแตนเลสแบบทึบ ', 'img18_b.jpg', 'ประตูแบบทึบ', 1, 6800),
(145, 'ประตูสแตนเลสแบบทึบ ', 'img8_b.jpg', 'ประตูแบบทึบ', 1, 6000),
(146, 'ประตูสแตนเลสแบบทึบ ', 'img9_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(154, 'ประตูสแตนเลสแบบทึบ ', 'img17_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(147, 'ประตูสแตนเลสแบบทึบ ', 'img10_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(148, 'ประตูสแตนเลสแบบทึบ ', 'img11_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(149, 'ประตูสแตนเลสแบบทึบ ', 'img12_b.jpg', 'ประตูแบบทึบ', 1, 6800),
(150, 'ประตูสแตนเลสแบบทึบ ', 'img13_b.jpg', 'ประตูแบบทึบ', 1, 8000),
(151, 'ประตูสแตนเลสแบบทึบ ', 'img14_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(153, 'ประตูสแตนเลสแบบทึบ ', 'img16_b.jpg', 'ประตูแบบทึบ', 1, 7500),
(152, 'ประตูสแตนเลสแบบทึบ ', 'img15_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(156, 'ประตูสแตนเลสแบบทึบ ', 'img19_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(157, 'ประตูสแตนเลสแบบทึบ ', 'img20_b.jpg', 'ประตูแบบทึบ', 1, 6800),
(158, 'ประตูสแตนเลสแบบทึบ ', 'img21_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(159, 'ประตูสแตนเลสแบบทึบ ', 'img22_b.jpg', 'ประตูแบบทึบ', 1, 6900),
(160, 'ประตูสแตนเลสแบบทึบ ', 'img23_b.jpg', 'ประตูแบบทึบ', 1, 6900),
(161, 'ประตูสแตนเลสแบบทึบ ', 'img24_b.jpg', 'ประตูแบบทึบ', 1, 6000),
(162, 'ประตูสแตนเลสแบบทึบ ', 'img25_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(163, 'ประตูสแตนเลสแบบทึบ ', 'img26_b.jpg', 'ประตูแบบทึบ', 1, 6000),
(164, 'ประตูสแตนเลสแบบทึบ ', 'img27_b.jpg', 'ประตูแบบทึบ', 1, 6500),
(165, 'ประตูสแตนเลสแบบทึบ ', 'img28_b.jpg', 'ประตูแบบทึบ', 1, 7000),
(166, 'ประตูสแตนเลสแบบทึบ ', 'img29_b.jpg', 'ประตูแบบทึบ', 1, 8000),
(167, 'ประตูสแตนเลสแบบทึบ', 'img30_b.jpg', 'ประตูแบบทึบ', 1, 7500),
(168, 'ประตูสแตนเลสแบบทึบ ', 'img31_b.jpg', 'ประตูแบบทึบ', 1, 6800),
(169, 'ประตูสแตนเลสแบบทึบ ', 'img32_b.jpg', 'ประตูแบบทึบ', 1, 7800),
(170, 'ประตูสแตนเลสแบบทึบ ', 'img33_b.jpg', 'ประตูแบบทึบ', 1, 7800),
(171, 'ประตูสแตนเลสแบบทึบ ', 'img34_b.jpg', 'ประตูแบบทึบ', 1, 8000),
(172, 'ประตูอะลูมิเนียม', 'img1_a.jpg', 'ประตูอะลูมิเนียม', 1, 5500),
(173, 'ประตูแบบผสม', 'img1_m.jpg', 'ประตูแบบผสม', 1, 7000),
(174, 'ประตูแบบผสม', 'img2_m.jpg', 'ประตูแบบผสม', 1, 8000),
(175, 'ประตูแบบผสม', 'img3_m.jpg', 'ประตูแบบผสม', 1, 8000),
(176, 'ประตูแบบผสม', 'img4_m.jpg', 'ประตูแบบผสม', 1, 7500),
(177, 'ประตูแบบผสม', 'img5_m.jpg', 'ประตูแบบผสม', 1, 7000),
(178, 'ประตูแบบผสม', 'img6_m.jpg', 'ประตูแบบผสม', 1, 7500),
(179, 'ประตูแบบผสม', 'img7_m.jpg', 'ประตูแบบผสม', 1, 8000),
(180, 'ประตูแบบผสม', 'img8_m.jpg', 'ประตูแบบผสม', 1, 7000),
(181, 'ประตูแบบผสม', 'img9_m.jpg', 'ประตูแบบผสม', 1, 7500),
(182, 'ประตูแบบผสม', 'img10_m.jpg', 'ประตูแบบผสม', 1, 8000),
(183, 'ประตูแบบผสม', 'img11_m.jpg', 'ประตูแบบผสม', 1, 7000),
(184, 'ประตูแบบผสม', 'img12_m.jpg', 'ประตูแบบผสม', 1, 7500),
(185, 'ประตูแบบผสม', 'img13_m.jpg', 'ประตูแบบผสม', 1, 8000),
(186, 'ประตูแบบผสม', 'img14_m.jpg', 'ประตูแบบผสม', 1, 7500),
(187, 'ประตูแบบผสม', 'img15_m.jpg', 'ประตูแบบผสม', 1, 8000),
(188, 'ประตูแบบผสม', 'img16_m.jpg', 'ประตูแบบผสม', 1, 7800),
(189, 'ประตูแบบผสม', 'img17_m.jpg', 'ประตูแบบผสม', 1, 7800),
(190, 'ประตูแบบผสม', 'img18_m.jpg', 'ประตูแบบผสม', 1, 7500),
(191, 'ประตูแบบผสม', 'img19_m.jpg', 'ประตูแบบผสม', 1, 8000),
(192, 'ประตูแบบผสม', 'img20_m.jpg', 'ประตูแบบผสม', 1, 7800),
(193, 'ประตูแบบผสม', 'img21_m.jpg', 'ประตูแบบผสม', 1, 7500),
(194, 'ประตูแบบผสม', 'img22_m.jpg', 'ประตูแบบผสม', 1, 7000),
(195, 'ประตูแบบผสม', 'img23_m.jpg', 'ประตูแบบผสม', 1, 8000),
(196, 'ประตูแบบผสม', 'img24_m.jpg', 'ประตูแบบผสม', 1, 7500),
(197, 'ประตูแบบผสม', 'img25_m.jpg', 'ประตูแบบผสม', 1, 7500),
(198, 'ประตูแบบผสม', 'img26_m.jpg', 'ประตูแบบผสม', 1, 6800),
(199, 'ประตูแบบผสม', 'img27_m.jpg', 'ประตูแบบผสม', 1, 7500),
(200, 'ประตูแบบผสม', 'img28_m.jpg', 'ประตูแบบผสม', 1, 8000),
(201, 'ประตูแบบผสม', 'img29_m.jpg', 'ประตูแบบผสม', 1, 7500),
(202, 'ประตูแบบผสม', 'img30_m.jpg', 'ประตูแบบผสม', 1, 7800),
(203, 'ประตูแบบผสม', 'img31_m.jpg', 'ประตูแบบผสม', 1, 8000),
(204, 'ประตูแบบผสม', 'img32_m.jpg', 'ประตูแบบผสม', 1, 7500),
(205, 'ประตูแบบผสม', 'img33_m.jpg', 'ประตูแบบผสม', 1, 6800),
(206, 'ประตูแบบผสม', 'img34_m.jpg', 'ประตูแบบผสม', 1, 7500),
(207, 'ประตูแบบผสม', 'img35_m.jpg', 'ประตูแบบผสม', 1, 6000),
(208, 'ประตูแบบผสม', 'img36_m.jpg', 'ประตูแบบผสม', 1, 7500),
(209, 'รั้ว', 'img1--.jpg', 'รั้ว', 5, 5500),
(210, 'รั้ว', 'img2--.jpg', 'รั้ว', 5, 7500),
(211, 'รั้ว', 'img3--.jpg', 'รั้ว', 5, 6000),
(212, 'รั้ว', 'img4--.jpg', 'รั้ว', 5, 6500),
(213, 'รั้ว', 'img5--.jpg', 'รั้ว', 5, 5500),
(214, 'รั้ว', 'img6--.jpg', 'รั้ว', 5, 6500),
(215, 'รั้ว', 'img7--.jpg', 'รั้ว', 5, 7500),
(216, 'รั้ว', 'img8--.jpg', 'รั้ว', 5, 5500),
(217, 'รั้ว', 'img9--.jpg', 'รั้ว', 5, 6500),
(218, 'รั้ว', 'img10--.jpg', 'รั้ว', 5, 5500),
(219, 'รั้ว', 'img11--.jpg', 'รั้ว', 5, 6500),
(220, 'รั้ั้ว', 'img12--.jpg', 'รั้ว', 5, 6500),
(221, 'รั้ว', 'img13--.jpg', 'รั้ว', 5, 6000),
(222, 'รั้ว', 'img14--.jpg', 'รั้ว', 5, 6000),
(223, 'รั้ว', 'img15--.jpg', 'รั้ว', 5, 5000),
(224, 'รั้ว', 'img16--.jpg', 'รั้ว', 5, 5500),
(225, 'รั้ว', 'img17--.jpg', 'รั้ว\r\n', 5, 5000),
(226, 'รั้ว', 'img18--.jpg', 'รั้ว', 5, 6000),
(227, 'รั้ว', 'img19--.jpg', 'รั้ว', 5, 6000),
(228, 'รั้ว', 'img20--.jpg', 'รั้ว', 5, 6000),
(229, 'รั้ว', 'img21--.jpg', 'รั้ว', 5, 6500),
(230, 'รั้ว', 'img22--.jpg\r\n', 'รั้ว', 5, 6800),
(231, 'รั้ว', 'img23--.jpg', 'รั้ว', 5, 7000),
(232, 'รั้ว', 'img24--.jpg', 'รั้ว', 5, 7500),
(233, 'รั้ว', 'img25--.jpg', 'รั้ว', 5, 6500),
(234, 'รั้ว', 'img26--.jpg', 'รั้ว', 5, 6000),
(235, 'รั้ว', 'img27--.jpg', 'รั้ว', 5, 5500),
(237, 'รั้ว', 'img28--.jpg', 'รั้ว', 5, 6000),
(238, 'รั้ว', 'img29--.jpg', 'รั้ว\r\n', 5, 6800),
(239, 'รั้ว	  	', 'img30--.jpg', 'รั้ว	', 5, 7000),
(240, 'รั้ว', 'img31--.jpg', 'รั้ว', 5, 7000),
(241, 'รั้ั้ว', 'img32--.jpg', 'รั้ว', 5, 7000),
(242, 'รั้ว', 'img33--.jpg', 'รั้ว', 5, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `detail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`detail`) VALUES
('have no promotion'),
('have no promotion');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_news`
--

CREATE TABLE `promotion_news` (
  `news` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_news`
--

INSERT INTO `promotion_news` (`news`) VALUES
('ยังไม่มี'),
('ยังไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `selfdesign`
--

CREATE TABLE `selfdesign` (
  `selfDesign_ID` int(11) NOT NULL,
  `selfDesign_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `selfDesign_Description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` int(11) NOT NULL,
  `status_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `status_status`) VALUES
(1, 'ยังไม่ดำเนินการ'),
(2, 'อยู่ระหว่างดำเนินการ'),
(3, 'รอติดตั้ง'),
(4, 'เสร็จแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tb_facebook`
--

CREATE TABLE `tb_facebook` (
  `ID` int(6) NOT NULL,
  `FACEBOOK_ID` varchar(50) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `LINK` varchar(250) NOT NULL,
  `CREATE_DATE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_ID` int(11) NOT NULL,
  `type_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type_IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_ID`, `type_Name`, `type_IMG`) VALUES
(1, 'ประตู', 'door.jpg'),
(2, 'หน้าต่าง', 'window.jpg'),
(3, 'ราวระเบียง', 'ราวระเบียง.jpg'),
(4, 'ราวบันได', 'ราวบันได.jpg'),
(5, 'รั้ว', 'รั้ว.jpg'),
(6, 'กันสาด,หลังคา', 'กันสาด.jpg'),
(7, 'หลังคาโรงจอดรถ', 'หลังคาโรงรถ.jpg'),
(8, 'เหล็กแหลมบนกำแพง', 'เหล็กแหลม.jpg'),
(9, 'อื่นๆ', 'asser.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Userlevel` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Userlevel`) VALUES
(1, '1841500151441', 'Gapom1892539', 'M'),
(2, '1232222222222', '123456787624', 'M'),
(3, '1232222222222', 'dsadsad34234', 'M'),
(4, '4324324324324', '4324324ff', 'M'),
(5, '5444444444444', '3213123333', 'M'),
(6, 'admin', 'admin1234', 'A'),
(7, '1232132132131', 'bb12345bb', 'M'),
(8, '1234567890919', 'maxmaxmax', 'M'),
(9, '1473275983275', '12345678', 'M'),
(10, '5784758784375', '123456789', 'M'),
(11, '1111111111111', '12345678', 'M'),
(12, '2222222222222', '123456789', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`accessory_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `selfdesign`
--
ALTER TABLE `selfdesign`
  ADD PRIMARY KEY (`selfDesign_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tb_facebook`
--
ALTER TABLE `tb_facebook`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`FACEBOOK_ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `accessory_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `selfdesign`
--
ALTER TABLE `selfdesign`
  MODIFY `selfDesign_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_facebook`
--
ALTER TABLE `tb_facebook`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
