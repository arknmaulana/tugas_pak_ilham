-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 08:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kode_detail_transaksi` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_sepatu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(6, 'Sneakers\r\n'),
(7, 'Sport'),
(8, 'Flatshoes');

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `kode_sepatu` int(11) NOT NULL,
  `nama_sepatu` varchar(50) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `kode_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`kode_sepatu`, `nama_sepatu`, `size`, `kode_kategori`, `harga`, `merk`, `stok`) VALUES
(29, 'Nike Zoom', 38, 7, 1500000, 'Nike\r\n', 5),
(30, 'Adidas Ace', 40, 6, 1000000, 'Adidas', 5),
(31, 'Diadora', 39, 7, 500000, 'Diadora', 12);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) DEFAULT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_user`, `nama_pembeli`, `total`, `tanggal_beli`) VALUES
(14, 1, 'Icha', 145000, '2018-05-09'),
(16, 1, 'edede', 7000, '2018-05-09'),
(29, 5, 'bisa', 400000, '2018-05-09'),
(36, 5, 'biss', 120000, '2018-05-09'),
(37, 5, 'boss', 150000, '2018-05-09'),
(38, 5, 'boss', 240000, '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Nabila', 'admin1', 'admin1', 'admin'),
(4, 'bagus', 'kasir1', 'kasir1', 'kasir'),
(5, 'doni', 'kasir2', 'kasir2', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kode_detail_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_sepatu`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`kode_sepatu`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `kode_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `kode_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_sepatu`) REFERENCES `sepatu` (`kode_sepatu`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `sepatu_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
