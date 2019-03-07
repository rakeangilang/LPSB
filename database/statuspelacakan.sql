-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 05:13 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elab`
--

-- --------------------------------------------------------

--
-- Table structure for table `statuspelacakan`
--

CREATE TABLE `statuspelacakan` (
  `IDStatus` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuspelacakan`
--

INSERT INTO `statuspelacakan` (`IDStatus`, `Status`) VALUES
(1, 'Pesanan dibuat'),
(2, 'Pesanan divalidasi'),
(3, 'Dikaji ulang'),
(4, 'Dianalisis'),
(5, 'Analisis selesai'),
(6, 'Pesanan dibatalkan pelanggan'),
(7, 'Pesanan dibatalkan sistem'),
(21, 'Pembayaran divalidasi'),
(22, 'Sampel diterima dan divalidasi'),
(51, 'Sisa sampel dikirim'),
(52, 'Sertifikat dikirim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  ADD PRIMARY KEY (`IDStatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  MODIFY `IDStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
