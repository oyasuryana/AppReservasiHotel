-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2022 at 08:43 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appReservasiHotel`
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
('Farhan', '202cb962ac59075b964b07152d234b70', 'Farhan', 'petugas'),
('oya', '202cb962ac59075b964b07152d234b70', 'oya suryana', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_kamar`
--

CREATE TABLE `tbl_detail_kamar` (
  `id_detail_kamar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_fasilitas_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_kamar`
--

INSERT INTO `tbl_detail_kamar` (`id_detail_kamar`, `id_kamar`, `id_fasilitas_kamar`) VALUES
(86, 7, 3),
(87, 8, 3),
(88, 8, 8),
(89, 5, 3),
(90, 5, 4),
(91, 5, 8);

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
(7, 'Gymnasium', 'Arena gymnasium untuk kebugaran pengunjung hotel', 'gymnasium.jpeg'),
(8, 'Kolam Renang', 'Kolam Renang', 'kolam_renang.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas_kamar`
--

CREATE TABLE `tbl_fasilitas_kamar` (
  `id_fasilitas_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi_fasilitas` mediumtext NOT NULL,
  `foto_fasilitas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fasilitas_kamar`
--

INSERT INTO `tbl_fasilitas_kamar` (`id_fasilitas_kamar`, `nama_fasilitas`, `deskripsi_fasilitas`, `foto_fasilitas`) VALUES
(3, 'Smart TV', 'Smart TV dengan ratusan channel dan akses    internet (Home Smart TV)', 'tv.jpg'),
(4, 'Kulkas Mini', 'Untuk menjaga kesegaran minuman dan makanan disediakan mini refrigerator', 'kulkas-mini.jpeg'),
(8, 'Telepon Antar Ruang (AIphone)', 'Telp', 'the-wolverine-wallpapers-30133-8349383.jpg');

--
-- Triggers `tbl_fasilitas_kamar`
--
DELIMITER $$
CREATE TRIGGER `hapusFasilitasKamar` AFTER DELETE ON `tbl_fasilitas_kamar` FOR EACH ROW DELETE FROM tbl_detail_kamar WHERE id_fasilitas_kamar=OLD.id_fasilitas_kamar
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` int(11) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `tipe_kamar` enum('standar','single','deluxe','suite') NOT NULL,
  `foto_kamar` varchar(150) NOT NULL,
  `jml_kamar` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `harga_kamar`, `tipe_kamar`, `foto_kamar`, `jml_kamar`) VALUES
(5, 1500000, 'suite', 'presiden_room.jpg', 4),
(7, 500000, 'standar', 'standar_A01.jpg', 3),
(8, 1000000, 'deluxe', 'the-wolverine-wallpapers-30133-9881380.jpg', 5);

--
-- Triggers `tbl_kamar`
--
DELIMITER $$
CREATE TRIGGER `hapusDetailKamar` AFTER DELETE ON `tbl_kamar` FOR EACH ROW delete from tbl_detail_kamar where tbl_detail_kamar.id_kamar=old.id_kamar
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservasi`
--

CREATE TABLE `tbl_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_handphone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_cek_in` date NOT NULL,
  `tgl_cek_out` date DEFAULT NULL,
  `jml_kamar_dipesan` int(11) NOT NULL,
  `status` enum('in','out') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservasi`
--

INSERT INTO `tbl_reservasi` (`id_reservasi`, `nama_pemesan`, `no_handphone`, `email`, `nama_tamu`, `id_kamar`, `tgl_cek_in`, `tgl_cek_out`, `jml_kamar_dipesan`, `status`) VALUES
(2, 'Oya', '086', 'oya@uniku.ac.id', 'Oya', 7, '2022-03-26', '2022-03-27', 1, 'out'),
(3, 'Oya', '0852241966', 'oyasuryan@gmail.com', 'Ghazali', 5, '2022-03-28', '2022-03-29', 2, 'out'),
(4, 'Rika Widianingsih', '08528788878', 'rika9344@gmail.com', 'Rika', 5, '2022-03-30', '2022-03-31', 1, 'out'),
(5, 'oya', '0998', 'oya@uniku.ac.id', 'oya', 7, '2022-03-30', '2022-03-31', 2, 'out'),
(6, 'Rika', '08', 'rika@yahooc.om', 'Rika', 5, '2022-03-30', '2022-03-31', 1, 'out'),
(7, 'Sri', '0808089', 'Sri@yahoo.com', 'Sri', 5, '2022-03-30', '2022-03-31', 1, 'out'),
(8, 'Ghzali', '088989', 'gajali@yahoo.com', 'ghzali', 8, '2022-03-30', '2022-03-31', 2, 'out'),
(9, 'Dinda', '087787', 'dinda@gmail.com', 'dinda', 7, '2022-03-30', '2022-03-31', 1, 'out'),
(10, 'Dinda', '088787', 'dinda@yahoo.com', 'Dinda', 8, '2022-03-30', '2022-03-31', 1, 'out'),
(11, 'Elsa', '0888', 'elsa@yahoo.com', 'Elsa', 8, '2022-03-30', '2022-03-31', 1, 'out'),
(12, 'Abiq Sabiqul Khoir', '08834785577', 'abiq@gmail.com', 'Abiq Sabiqul Khoir', 5, '2022-03-30', '2022-03-31', 1, 'in'),
(13, 'Farhan', '08787878', 'farhan@yahoo.com', 'Farhan', 5, '2022-03-30', '2022-03-31', 1, 'out');

--
-- Triggers `tbl_reservasi`
--
DELIMITER $$
CREATE TRIGGER `infoJmlKamar` AFTER UPDATE ON `tbl_reservasi` FOR EACH ROW BEGIN
		IF (NEW.status='in') THEN
			UPDATE tbl_kamar SET jml_kamar=jml_kamar-OLD.jml_kamar_dipesan
			WHERE tbl_kamar.id_kamar=NEW.id_kamar;
		ELSE
			UPDATE tbl_kamar SET jml_kamar=jml_kamar+OLD.jml_kamar_dipesan
			WHERE tbl_kamar.id_kamar=NEW.id_kamar;		
		END IF;	
	END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_detail_kamar`
--
ALTER TABLE `tbl_detail_kamar`
  ADD PRIMARY KEY (`id_detail_kamar`);

--
-- Indexes for table `tbl_fasilitas_hotel`
--
ALTER TABLE `tbl_fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- Indexes for table `tbl_fasilitas_kamar`
--
ALTER TABLE `tbl_fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_kamar`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_kamar`
--
ALTER TABLE `tbl_detail_kamar`
  MODIFY `id_detail_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_fasilitas_hotel`
--
ALTER TABLE `tbl_fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_fasilitas_kamar`
--
ALTER TABLE `tbl_fasilitas_kamar`
  MODIFY `id_fasilitas_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
