-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2022 at 01:23 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-37+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appReservasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `username` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `leveluser` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`username`, `password`, `namauser`, `leveluser`) VALUES
('oya', '202cb962ac59075b964b07152d234b70', 'oya suryana', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas_hotel`
--

CREATE TABLE `tbl_fasilitas_hotel` (
  `id_fasilitas_hotel` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi_fasilitas` mediumtext NOT NULL,
  `foto_fasilitas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fasilitas_hotel`
--

INSERT INTO `tbl_fasilitas_hotel` (`id_fasilitas_hotel`, `nama_fasilitas`, `deskripsi_fasilitas`, `foto_fasilitas`) VALUES
(1, 'Kolam Renang', 'Kolam renang dewasa dan anak', 'swiming.jpg'),
(2, 'Gymnastic', 'Ruang gynmnastic dengan alat yang lengkap', 'swiming.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_fasilitas_hotel`
--
ALTER TABLE `tbl_fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fasilitas_hotel`
--
ALTER TABLE `tbl_fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
