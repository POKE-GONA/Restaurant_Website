-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 05:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` varchar(50) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `Status` varchar(30) NOT NULL,
  `BuyQuantity` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `CardNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `CustomerID`, `BookingDate`, `Status`, `BuyQuantity`, `TotalAmount`, `PaymentType`, `CardNo`) VALUES
('B-000001', 2, '2020-09-28', 'Pending', 1, 30000, 'VISA', 159753852),
('B-000002', 2, '2020-09-28', 'Pending', 1, 15000, 'MPU', 159753456),
('B-000003', 1, '2020-09-28', 'Bconfirmed', 2, 80000, 'VISA', 1597533645);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `BookingID` varchar(50) NOT NULL,
  `MenuTypeID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`BookingID`, `MenuTypeID`, `Price`, `Quantity`) VALUES
('B-000001', 1, 30000, 1),
('B-000002', 2, 15000, 1),
('B-000003', 3, 50000, 1),
('B-000003', 1, 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Status`) VALUES
(1, 'Pork2', 'active'),
(2, 'Chicken', 'active'),
(3, 'Beef', 'active'),
(5, 'Seafood2', 'active'),
(6, 'Seafood3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Email`, `Password`, `Phone`, `Address`) VALUES
(1, 'Thiha Kyaw', 'thk1@gmail.com', '123654', 925018064, '						Sanchaung, Tanta Da Street, Yangon.									'),
(2, 'Aye Chan Moe', 'acm1@gmail.com', '123456', 2147483647, '			Yangon.												');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `MenuTypeID` int(11) NOT NULL,
  `MenuName` varchar(100) NOT NULL,
  `AdditionalCost` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `MenuImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `CategoryID`, `MenuTypeID`, `MenuName`, `AdditionalCost`, `Description`, `MenuImage`) VALUES
(1, 1, 1, 'Korea Pork BBQ', 11000, 'This all menu are include in Family Set.', 'image/_Unlimited Time BBQ and Hot pot.jpg'),
(2, 2, 2, 'Korea Chicken BBQ', 14000, 'This all menu are include in Single Set.', 'image/_Unlimited BBQ.jpg'),
(3, 3, 3, 'Korea Beef BBQ', 16000, 'Include all menu price is Friends Set.', 'image/_Unlimited Time BBQ.jpg'),
(5, 5, 5, 'Korea Seafood BBQ', 10000, 'This all menu are include in Double Set.', 'image/_Hot Pot.jpg'),
(6, 6, 6, 'Korea Sea Fish BBQ', 12000, 'This all menu are include in Double Set.', 'image/_Hot Pot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `MenuItemID` int(11) NOT NULL,
  `MenuTypeID` int(11) NOT NULL,
  `Meat` varchar(200) NOT NULL,
  `Vegetables` varchar(200) NOT NULL,
  `Seafood` varchar(200) NOT NULL,
  `Seafood2` varchar(100) NOT NULL,
  `Additionalfood` varchar(100) NOT NULL,
  `Descriptions` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `MenuTypeID`, `Meat`, `Vegetables`, `Seafood`, `Seafood2`, `Additionalfood`, `Descriptions`) VALUES
(1, 1, 'Spick Sliced Pork - 5000MMK', 'Brocolli             - 1500MMK', 'Pawn             - 2500MMK', 'Squid         -2000', 'Fried Rice     -0MMK', 'This all menu are include in Family Set'),
(2, 2, 'Spick Sliced Chicken - 5000MMK', 'Brocolli             - 1500MMK', 'Pawn             - 2500MMK', 'Chicken Meatball - 2000MMK', 'Fried Vermicelli   -3000MMK', 'This all menu are include in Single Set'),
(3, 3, 'Spick Sliced Beef - 6000MMK', 'Set of Vegetables   3000MMK', 'Crab           -5000MMK', 'Fish ball     -2000MMK', 'Icecream    -0MMK', 'Include all menu price is Friends Set'),
(5, 5, 'Spick Sliced Beef - 5000MMK', 'Set of Vegetables  - 2500MMK', 'Crab           - 4000MMK', 'Fish ball     - 2500MMK', 'Icecream    - 0MMK', 'Include all menu price is Double Set'),
(6, 6, 'Spick Sliced small water hyacinth - 5000MMK', 'Spick Sliced Beef - 5000MMK', 'Spick Sliced Beef - 5000MMK', 'Chicken Meatball - 2000MMK', 'Chicken Meatball - 2000MMK', 'Include all menu price is Double Set');

-- --------------------------------------------------------

--
-- Table structure for table `menutype`
--

CREATE TABLE `menutype` (
  `MenuTypeID` int(11) NOT NULL,
  `MenuTypeName` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menutype`
--

INSERT INTO `menutype` (`MenuTypeID`, `MenuTypeName`, `Quantity`, `Price`) VALUES
(1, 'Family Set', -128, 30000),
(2, 'Single Buffet BBQ', -42, 15000),
(3, 'Friends Set', -28, 50000),
(5, 'Double Buffet BBQ Set', -7, 23000),
(6, 'Double Set', 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `OrderingID` varchar(50) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderingDate` date NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `DeliveryPhone` varchar(100) NOT NULL,
  `DeliveryCost` int(11) NOT NULL,
  `BuyQuantity` int(11) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `PaymentType` varchar(50) NOT NULL,
  `CardNo` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `VAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`OrderingID`, `CustomerID`, `OrderingDate`, `DeliveryAddress`, `DeliveryPhone`, `DeliveryCost`, `BuyQuantity`, `TotalAmount`, `GrandTotal`, `PaymentType`, `CardNo`, `Status`, `VAT`) VALUES
('O-000001', 2, '2020-09-28', 'Yangon.', '09250180640', 1500, 1, '30000', 33000, 'VISA', 159753852, 'Pending', 1500),
('O-000002', 2, '2020-09-28', 'Yangon.', '09250180123', 3000, 1, '15000', 18750, 'MPU', 159357258, 'Pending', 750),
('O-000003', 2, '2020-09-29', 'Yangon.', '09250180640', 3000, 1, '30000', 34500, 'MPU', 789456123, 'Oconfirmed', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `orderingdetail`
--

CREATE TABLE `orderingdetail` (
  `OrderingID` varchar(50) NOT NULL,
  `MenuTypeID` int(11) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `OrderingQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderingdetail`
--

INSERT INTO `orderingdetail` (`OrderingID`, `MenuTypeID`, `Price`, `OrderingQuantity`) VALUES
('O-000001', 1, '30000', 1),
('O-000002', 2, '15000', 1),
('O-000003', 1, '30000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(50) DEFAULT NULL,
  `StaffEmail` varchar(50) DEFAULT NULL,
  `StaffPassword` varchar(50) DEFAULT NULL,
  `StaffPhone` varchar(50) DEFAULT NULL,
  `StaffImage` text,
  `StaffPosition` varchar(50) DEFAULT NULL,
  `StaffAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffEmail`, `StaffPassword`, `StaffPhone`, `StaffImage`, `StaffPosition`, `StaffAddress`) VALUES
(1, 'Yu Mya', 'yu1@gmail.com', '12345678', '09250180640', 'staffimage/_2.jpg', 'Administrative Staff', 'Pyay Road, Yangon.'),
(2, 'Hlaing Hlaing', 'hh1@gmail.com', '12345678', '09052081046', 'staffimage/_3.jpg', 'Administrative Staff', '			Yangon.																						');

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `TownshipID` int(11) NOT NULL,
  `TownshipName` varchar(100) NOT NULL,
  `DeliveryCost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`TownshipID`, `TownshipName`, `DeliveryCost`) VALUES
(2, 'Sanchaung', '1500'),
(3, 'SouthOkkalapa', '3000'),
(4, 'Insein', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- Indexes for table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`MenuTypeID`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`OrderingID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`TownshipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `MenuTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `TownshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
