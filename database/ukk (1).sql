-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 04:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `suhu` varchar(20) NOT NULL,
  `lon` varchar(20) NOT NULL,
  `lat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `nik`, `tanggal`, `lokasi`, `jam`, `suhu`, `lon`, `lat`) VALUES
(1, '1', '2022-01-06', '', '2', '2', '2', '2'),
(4, '99', '26-02-2022', 'dirumah', '20:27', '35', '112.63759670', '-8.17682830'),
(7, '3576447103910003', '26-02-2022', 'toko bunga         ', '21:11', '35.21  ', '112.63183594', '-7.97219771'),
(8, '3576447103910003', '26-02-2022', 'Stasiun, Kedungwuluh, ', '21:13', '45', '109.2221367', '-7.4194903'),
(9, '3576447103910003', '26-02-2022', 'Bandara, East Kalimantan  ', '21:14', '39 ', '117.1537681', '-0.4830461'),
(10, '3576447103910003', '27-02-2022', 'qeqwe ', '22:09', '23.23', '112.64485291', '-7.980589'),
(11, '3576447103910003', '26-02-2022', 'zzzzzzzzzz ', '23:39', '36.09', '112.5733026', '-8.1320077'),
(12, '3576447103910003', '28-02-2022', 'awokaowkokawokoakw', '11:38', '45.21', '106.82718602', '-6.17539360'),
(13, '2131231231231231', '02-03-2022', 'tes uzi ', '10:38', '47.98 ', '109.65194650', '-7.66868940');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `kelamin` enum('laki-laki','perempuan') NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `riwayat_penyakit` tinyint(100) NOT NULL,
  `perjanjian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nik`, `kelamin`, `telepon`, `agama`, `tempat_lahir`, `tanggal_lahir`, `long`, `lat`, `foto`, `riwayat_penyakit`, `perjanjian`) VALUES
(1, 123, 'laki-laki', '12321', 'islam', 'admin', 'tanggal_lahir', '', '-7.8011945', '1.PNG', 0, 'setuju'),
(2, 123, 'laki-laki', '213123', 'islam', 'admin123123', 'tanggal_lahir', '', '-7.8011945', '1.PNG', 121, 'setuju'),
(3, 1231233, 'laki-laki', '12312312', 'islam', 'admin', '2022-03-16', '110.364917', '-7.8011945', '2cd9d1d7bb30511eb4cd517c131ae148_L.jpg', 0, 'setuju'),
(4, 21321, 'laki-laki', '123', 'Kristen', 'admin', '2022-03-22', '110.364917', '-7.8011945', '2cd9d1d7bb30511eb4cd517c131ae148_L.jpg', 0, 'on'),
(5, 1, 'laki-laki', '+628818423260', 'islam', 'admin', '2022-03-21', '110.364917', '-7.8011945', '2cd9d1d7bb30511eb4cd517c131ae148_L.jpg', 0, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `email`, `password`) VALUES
(1, '123', 'uzi@uzi.com', 'd2a6e194da50ab1478744b3a74e3e003'),
(2, '12312', '', '12'),
(3, '0', '', ''),
(4, '0', '', ''),
(5, '0', '', ''),
(6, '0', '', 'asdasdasd'),
(7, 'ngengmyid@gmail.com', '', 'asdasdasd'),
(8, 'ngengmyid@gmail.com', '', 'asdasdasd'),
(9, '1', 'uzi@uzi.com', 'd2a6e194da50ab1478744b3a74e3e003'),
(10, '123', 'uzi@meninggal.tech', 'uzi'),
(11, '123', 'uzi@meninggal.tech', 'uzi'),
(12, '8990', 'ngengmyid@gmail.com', 'jljkljkl'),
(13, '2131231231231231', 'uzi@meninggal.tech', 'uzi'),
(14, '123', 'uzi@meninggal.tech', 'uzi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
