-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 07:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_esi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buah`
--

CREATE TABLE `buah` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `id_cat_buah` int(11) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `createdate` varchar(20) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `lastupdate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buah`
--

INSERT INTO `buah` (`id`, `name`, `id_cat_buah`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(5, 'Nanas', 4, NULL, NULL, NULL, NULL),
(6, 'Jambu Biji', 7, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kriteria_buah`
--

CREATE TABLE `m_kriteria_buah` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `createdate` varchar(20) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `lastupdate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_kriteria_buah`
--

INSERT INTO `m_kriteria_buah` (`id`, `name`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(3, 'Matang', 'admin', '2021-07-04 02:49:14', NULL, NULL),
(4, 'Lewat Matang', 'admin', '2021-07-04 02:49:22', NULL, NULL),
(5, 'Busuk', 'admin', '2021-07-04 02:49:29', NULL, NULL),
(6, 'Tangkai Panjang', 'admin', '2021-07-04 02:49:35', NULL, NULL),
(7, 'Buah Keras', 'admin', '2021-07-04 02:49:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` int(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createby` varchar(50) DEFAULT NULL,
  `createdate` varchar(50) DEFAULT NULL,
  `lastby` varchar(50) DEFAULT NULL,
  `lastupdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `username`, `password`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(1, 'admin', 'YQ==', NULL, NULL, NULL, NULL),
(6, 'okki', 'YQ==', 'admin', '2021-07-04 05:43:13', 'admin', '2021-07-04 05:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `notrans` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `divisi` int(1) DEFAULT NULL,
  `totalbuah` int(1) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `createdate` varchar(20) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `lastupdate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `notrans`, `tanggal`, `divisi`, `totalbuah`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(2, '202107040000001', '2021-07-04', 7, 6, 'admin', '2021-07-04 04:27:18', NULL, NULL),
(3, '202107040000002', '2021-07-18', 90, 99, 'admin', '2021-07-04 04:27:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `notrans` varchar(20) DEFAULT NULL,
  `idbuah` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `lastupdate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `notrans`, `idbuah`, `jumlah`, `lastby`, `lastupdate`) VALUES
(3, '202107040000001', 6, 5, NULL, NULL),
(4, '202107040000002', 5, 9, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buah`
--
ALTER TABLE `buah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kriteria_buah`
--
ALTER TABLE `m_kriteria_buah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buah`
--
ALTER TABLE `buah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_kriteria_buah`
--
ALTER TABLE `m_kriteria_buah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
