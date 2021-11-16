-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 05:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `name_bank` varchar(150) NOT NULL,
  `name_rekening` varchar(150) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `kcp_bank` varchar(150) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `name_bank`, `name_rekening`, `no_rekening`, `kcp_bank`, `created`, `updated`) VALUES
(1, 'BCA', 'PT GRAHA PUJI PROPERTINDO', '485-1234-777', 'Jl. Raya Cikarang Cibarusah Bekasi', '2021-11-09', '2021-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `image`, `address`, `phone`, `fax`, `created`, `updated`) VALUES
(1, 'Azalea Suites', 'logo-211109-0ae8053439.jpeg', 'Cikarang', '0218939888', '02189321515', '2021-11-09', '2021-11-09'),
(2, 'Pudjiadi Prestige', 'logo-211109-f37e8b207e.jpeg', 'Jakarta', '0216241030', '0216240981', '2021-11-09', '2021-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `unit_id`, `email`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Eka Shinta', 2, 'eka@gmail.com', '081298333999', 'Cikarang', '2021-11-12', NULL),
(2, 'MR. Suzuki', 1, 'suzuki@gmail.com', '0218939888', 'Cikarang Sekatan', '2021-11-12', '2021-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `iuran_id` int(11) NOT NULL,
  `iuran_name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`iuran_id`, `iuran_name`, `price`, `created`, `updated`) VALUES
(1, 'Iuran Lingkungan 2018', 15000, '2021-11-12', '2021-11-12'),
(2, ' Iuran Lingkungan 2019', 15000, '2021-11-12', '2021-11-12'),
(3, 'Iuran Sinking Fund', 2000, '2021-11-12', '2021-11-12'),
(4, 'Iuran Lingkungan 2020', 16000, '2021-11-12', NULL),
(5, 'Iuran Lingkungan 2021', 18000, '2021-11-12', NULL),
(6, 'Iuran ONSEN', 700000, '2021-11-12', NULL),
(7, 'Iuran WIFI', 700000, '2021-11-12', NULL),
(8, 'Iuran Parkir', 400000, '2021-11-12', NULL),
(9, 'Iuran Pemakaian Air', 14000, '2021-11-12', NULL),
(10, 'Iuran Beban Tetap Air', 26920, '2021-11-12', NULL),
(11, 'Iuran PBB', 16342, '2021-11-12', NULL),
(12, 'Asuransi Gedung', 305000, '2021-11-12', NULL),
(13, 'Iuran Administrasi', 20000, '2021-11-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `tipe_unit` varchar(10) NOT NULL,
  `size_unit` varchar(20) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `tipe_unit`, `size_unit`, `created`, `updated`) VALUES
(1, 'B-26.09', 'SS', '43M', '2021-11-11', NULL),
(2, 'B-07.07', 'MM', '38M', '2021-11-11', '2021-11-11'),
(4, 'B-08.08', 'MM', '38M', '2021-11-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Yudi', 'Depok', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Anto', 'Jakarta', 2),
(6, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Contoh', 'Bekasi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`iuran_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `iuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
