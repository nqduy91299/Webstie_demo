-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 10:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE `account_admin` (
  `id` int(11) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`id`, `email`, `password`, `name`, `phone`) VALUES
(1, 'admin@gmail.com', '123', 'admin', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `account_customer`
--

CREATE TABLE `account_customer` (
  `id` int(11) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_customer`
--

INSERT INTO `account_customer` (`id`, `email`, `password`, `name`, `phone`) VALUES
(1, 'duy@gmail.com', '123', 'Nguyen Quoc Duy', '9874563210'),
(3, 'thang@gmail.com', '123', 'Ly Duc Thang', '454334355'),
(5, 'nguyenquocduy91299@gmail.com', '123', 'Nguyen Quoc Duy', '0837034291');

-- --------------------------------------------------------

--
-- Table structure for table `bangtam`
--

CREATE TABLE `bangtam` (
  `id_tam` int(11) NOT NULL,
  `checkIn` char(50) NOT NULL,
  `checkOut` char(50) NOT NULL,
  `guest` int(11) NOT NULL,
  `room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nameRoom` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `nameUser` varchar(50) NOT NULL,
  `email` char(50) NOT NULL,
  `phone` char(11) NOT NULL,
  `checkin` char(50) NOT NULL,
  `checkout` char(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `nameRoom`, `price`, `nameUser`, `email`, `phone`, `checkin`, `checkout`, `type`, `room`) VALUES
(1, 'P-101', 100, 'DUy', 'duy@gmail.com', '13265899', '30/03/2020', '05/04/2020', 'Single Room', 1),
(2, 'P-401', 400, 'hai', 'admin@gmail.com', '65465123', '30/05/2020', '31/05/2020', 'Deluxe Room', 1),
(4, 'P-301', 300, 'Ly Duc Thang', 'thang@gmail.com', '454334355', '30/05/2020', '31/05/2020', 'Family Room', 1),
(13, 'P-201', 200, 'Ly Duc Thang', 'thang@gmail.com', '454334355', '30/05/2020', '31/05/2020', 'Double Room', 1),
(14, 'P-402', 800, 'Nguyen Quoc Duy', 'nguyenquocduy91299@gmail.com', '0837034291', '01/06/2020', '03/06/2020', 'Deluxe Room', 1),
(15, 'P-201', 400, 'Nguyen Quoc Duy', 'nguyenquocduy91299@gmail.com', '0837034291', '04/06/2020', '06/06/2020', 'Double Room', 1),
(16, 'P-402', 400, 'Ly Duc Thang', 'thang@gmail.com', '454334355', '02/06/2020', '03/06/2020', 'Deluxe Room', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `image` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `type`, `image`) VALUES
(6, 'P-101', 100, 'Single Room', 'PhongDon.png'),
(7, 'P-201', 200, 'Double Room', 'phongdoi2.jpg'),
(8, 'P-301', 300, 'Family Room', 'phongdorm2.jpg'),
(9, 'P-401', 400, 'Deluxe Room', 'phongking3.jpg'),
(10, 'P-402', 400, 'Deluxe Room', 'phongking4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `account_customer`
--
ALTER TABLE `account_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bangtam`
--
ALTER TABLE `bangtam`
  ADD PRIMARY KEY (`id_tam`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_customer`
--
ALTER TABLE `account_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bangtam`
--
ALTER TABLE `bangtam`
  MODIFY `id_tam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
