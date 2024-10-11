-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 11:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `no` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `CC` varchar(255) NOT NULL,
  `tanggal_berlaku` date NOT NULL DEFAULT current_timestamp(),
  `kkarbon` varchar(255) NOT NULL,
  `skarbon` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`no`, `id`, `nama`, `alamat`, `uid`, `merk`, `no_plat`, `tipe`, `CC`, `tanggal_berlaku`, `kkarbon`, `skarbon`, `files`) VALUES
(31, '0000', 'RIDHO SETIAWAN', 'MEDAN', '000', 'YAMAHA', 'BK 3233  AA', 'N-MAX', '150', '2024-10-26', '500000', '500000', '1728559756_download-removebg-preview.png'),
(32, '0001', 'Khairul Fattah', 'RIAU', '000', 'HONDA', 'BM 6545 AAP', 'SUPRA', '125', '2028-06-13', '500000', '500000', '1728559816_downloadx-removebg-preview.png'),
(33, '0010', 'Zaldi ', 'MEDAN', '000', 'HONDA', 'BK 0656 PAA', 'SCOOPY', '110', '2026-07-08', '500000', '500000', '1728559884_download__1_-removebg-preview.png'),
(34, '0011', 'M.YAVI', 'RIAU', '000', 'HONDA', 'BM 1232 PAA', 'VARIO', '125', '2027-06-16', '500000', '500000', '1728560359_vario-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uid`, `username`, `password`) VALUES
(1, '000', 'ridho', 'ridho');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `no` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `co2` varchar(255) NOT NULL,
  `no2` varchar(255) NOT NULL,
  `nh3` varchar(255) NOT NULL,
  `jkarbon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`no`, `id`, `co2`, `no2`, `nh3`, `jkarbon`) VALUES
(1, '0000', '54', '32', '34', '2'),
(2, '0001', '65', '34', '44', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `no` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `karbon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`no`, `id`, `nama`, `karbon`) VALUES
(2, '0000', 'Ridho Setiawan', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
