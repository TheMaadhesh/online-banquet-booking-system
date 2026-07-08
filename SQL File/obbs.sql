-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 04:06 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Mandy', 'Mandy@Admin', 9847364700, 'mandy@gmail.com', '27ef089cb965e946d8fe1a8a773f27b8', '2026-07-07 00:00:00'),
(2, 'Admin', 'admin', 9847563894, 'admin123@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2026-07-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(10) NOT NULL,
  `BookingID` int(10) DEFAULT NULL,
  `ServiceID` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `BookingFrom` date DEFAULT NULL,
  `BookingTo` date DEFAULT NULL,
  `EventType` varchar(200) DEFAULT NULL,
  `Numberofguest` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

-- (no sample contact data)

-- --------------------------------------------------------

--
-- Table structure for table `tbleventtype`
--

CREATE TABLE `tbleventtype` (
  `ID` int(10) NOT NULL,
  `EventType` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleventtype`
--

INSERT INTO `tbleventtype` (`ID`, `EventType`, `CreationDate`) VALUES
(1, 'Anniversary', '2020-01-22 07:01:39'),
(2, 'Birthday Party', '2020-01-22 07:02:34'),
(3, 'Charity', '2020-01-22 07:02:43'),
(4, 'Cocktail', '2020-01-22 07:03:00'),
(5, 'College', '2020-01-22 07:03:11'),
(6, 'Community', '2020-01-22 07:03:24'),
(7, 'Concert', '2020-01-22 07:03:35'),
(8, 'Engagement', '2020-01-22 07:03:51'),
(9, 'Get Together', '2020-01-22 07:04:04'),
(10, 'Government', '2020-01-22 07:04:15'),
(11, 'Night Club', '2020-01-22 07:04:26'),
(13, 'Post Wedding', '2020-01-22 07:05:01'),
(14, 'Pre Engagement', '2020-01-22 07:05:18'),
(15, 'Religious', '2020-01-22 07:05:27'),
(16, 'Sangeet', '2020-01-22 07:05:43'),
(17, 'Social', '2020-01-22 07:05:58'),
(18, 'Wedding', '2020-01-22 07:06:07'),
(19, 'Pongal Celebration', '2022-03-01 11:00:00'),
(20, 'Bharatanatyam Arangetram', '2022-03-01 11:05:00'),
(21, 'Upanayanam (Sacred Thread Ceremony)', '2022-03-01 11:10:00'),
(22, 'Seemantham (Baby Shower Ceremony)', '2022-03-01 11:15:00'),
(23, 'Griha Pravesam (Housewarming Ceremony)', '2022-03-01 11:20:00'),
(24, 'Aksharabhyasam (Initiation to Learning)', '2022-03-01 11:25:00'),
(25, 'Sashtiaptha Poorthi (60th Birthday)', '2022-03-01 11:30:00'),
(26, 'Kalyanam (Traditional Tamil Wedding)', '2022-03-01 11:35:00'),
(27, 'Temple Festival (Kovil Thiruvizha)', '2022-03-01 11:40:00'),
(28, 'Puberty Ceremony (Manjal Neerattu Vizha)', '2022-03-01 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(100) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<b>Sri Lakshmi Banquet Hall</b><div><b>Sri Lakshmi Banquet Hall is one of Chennai\'s most trusted venues for weddings, receptions, corporate events and private celebrations. Our elegant halls, in-house catering and experienced event team come together to make every occasion memorable.</b></div><div><b><br></b></div><div><b>&nbsp;With spacious air-conditioned halls, ample parking and flexible seating arrangements, we host everything from intimate gatherings to grand celebrations with equal care and attention to detail.&nbsp;</b></div>', NULL, NULL, '2022-02-19 17:54:36'),
(2, 'contactus', 'Contact Us', 'No. 24, Anna Salai, Teynampet, Chennai-600018, Tamil Nadu, India', 'info@srilakshmibanquethall.com', 9876543210, '2022-02-19 17:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `SerDes` varchar(250) NOT NULL,
  `ServicePrice` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`ID`, `ServiceName`, `SerDes`, `ServicePrice`, `CreationDate`) VALUES
(1, 'Wedding DJ', '(we install the DJ equipment before your ceremony or after your wedding breakfast)', '66400', '2020-01-24 07:17:43'),
(2, 'Party DJ', '(we install the DJ equipment 1 hour before your selected event start time)', '58100', '2020-01-24 07:18:32'),
(3, 'Ceremony Music', 'Our ceremony music service is a popular add on to our wedding DJ stay all day hire.', '53950', '2020-01-24 07:19:14'),
(4, 'Photo Booth Hire', '(early equipment setup included)', '41500', '2020-01-24 07:19:51'),
(5, 'Karaoke Add-on', 'Karaoke is a great alternative to a disco. It’s perfect for staff parties and children’s parties.', '37350', '2020-01-24 07:20:36'),
(6, 'Uplighters', 'Uplighters are bright lighting fixtures which are installed on the floor and shine a vibrant wash of colour over the walls of your venue', '16600', '2020-01-24 07:21:14'),
(7, 'Bharatanatyam Dance Performance', 'A classical Tamil Nadu temple dance performance by trained artists, perfect for wedding receptions and cultural evenings.', '15000', '2022-03-01 10:00:00'),
(8, 'Nadaswaram & Thavil Ensemble', 'Traditional South Indian processional music played on the nadaswaram and thavil to welcome the couple and guests.', '12000', '2022-03-01 10:05:00'),
(9, 'Kolam Rangoli Art Setup', 'Hand-drawn traditional kolam designs at the entrance and mandapam, done fresh with rice flour and coloured powders.', '5000', '2022-03-01 10:10:00'),
(10, 'Traditional Mandapam Decoration', 'South Indian temple-style wedding mandapam decorated with banana stems, mango leaves, garlands and fresh flowers.', '35000', '2022-03-01 10:15:00'),
(11, 'Filter Coffee & Tiffin Live Counter', 'A live counter serving authentic filter kaapi along with traditional tiffin items like idli, vada and sakkarai pongal.', '18000', '2022-03-01 10:20:00'),
(12, 'Traditional Banana Leaf Sadhya', 'A full traditional Tamil meal served on banana leaves, featuring sambar, rasam, kootu and payasam for your guests.', '20000', '2022-03-01 10:25:00'),
(13, 'Karagattam Folk Dance Performance', 'A lively Tamil folk dance performance where artists balance decorated pots on their heads, a festive crowd favourite.', '10000', '2022-03-01 10:30:00'),
(14, 'Silambam Martial Arts Show', 'A traditional Tamil martial arts display using bamboo sticks, showcasing skill and choreography for your guests.', '8000', '2022-03-01 10:35:00'),
(15, 'Oyilattam Folk Performance', 'A colourful traditional Tamil folk dance troupe, ideal for sangeet nights and pre-wedding celebrations.', '9000', '2022-03-01 10:40:00'),
(16, 'Temple Car Festival Themed Decor', 'A festival-inspired stage backdrop styled after the Tamil Nadu temple car (Ther) festival, with vibrant colours and motifs.', '25000', '2022-03-01 10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

-- (no sample user data)

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ServiceID` (`ServiceID`),
  ADD KEY `EventType` (`EventType`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbleventtype`
--
ALTER TABLE `tbleventtype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventType` (`EventType`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tbleventtype`
--
ALTER TABLE `tbleventtype`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `serivdi` FOREIGN KEY (`ServiceID`) REFERENCES `tblservice` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
