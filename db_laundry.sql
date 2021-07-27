-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 08:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `idbiaya` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`idbiaya`, `tgl`, `ket`, `total`) VALUES
(1, '2021-07-22', 'Listrik', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `iddetail` int(5) NOT NULL,
  `notransaksi` varchar(15) NOT NULL,
  `jenisny` varchar(50) NOT NULL,
  `subjenisny` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `hargany` float NOT NULL,
  `subharga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`iddetail`, `notransaksi`, `jenisny`, `subjenisny`, `jumlah`, `hargany`, `subharga`) VALUES
(6, '2021072609', 'Cuci Kiloan', 'Paket 1 (Cuci Kering 5kg)', 2, 10000, 15000),
(7, '2021072609', 'Cuci Kiloan', 'Cuci Basah', 3, 5000, 15000),
(8, '2021072657', 'Cuci Satuan', 'Cuci Kering Setrika', 4, 3500, 50000),
(9, '2021072657', 'Cuci Kiloan', 'Paket 1 (Cuci Kering 5kg)', 5, 10000, 50000),
(10, '2021072755', 'Cuci Kiloan', 'Paket 1 (Cuci Kering 5kg)', 3, 10000, 30000),
(11, '2021072727', 'Cuci Kiloan', 'Paket 1 (Cuci Kering 5kg)', 2, 10000, 17500),
(12, '2021072727', 'Cuci Satuan', 'Cuci Kering Setrika', 5, 3500, 17500);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `idgaji` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`idgaji`, `id`, `tgl`, `total`) VALUES
(1, 4, '2021-07-23', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `idinventori` int(2) NOT NULL,
  `namainven` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`idinventori`, `namainven`, `merk`, `stok`) VALUES
(2, 'Mesin Cuci', 'RCTI', 2),
(4, 'Setrika', 'Sanyo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventorimasuk`
--

CREATE TABLE `inventorimasuk` (
  `idinventorimasuk` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorimasuk`
--

INSERT INTO `inventorimasuk` (`idinventorimasuk`, `idinventori`, `tgl`, `ket`, `jumlah`, `harga`, `total`) VALUES
(4, 4, '2021-07-23', '-', 3, 50000, 150000);

--
-- Triggers `inventorimasuk`
--
DELIMITER $$
CREATE TRIGGER `gaJadiMasuk` AFTER DELETE ON `inventorimasuk` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `saatBarangMasuk` AFTER INSERT ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahMasuk` AFTER UPDATE ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok - OLD.jumlah, 
                     stok = stok + NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorirusak`
--

CREATE TABLE `inventorirusak` (
  `idinventorirusak` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `tglrusak` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorirusak`
--

INSERT INTO `inventorirusak` (`idinventorirusak`, `idinventori`, `id`, `tglrusak`, `ket`, `jumlah`) VALUES
(5, 2, 1, '2021-07-23', '-', 1),
(6, 2, 6, '2021-07-27', '-', 1);

--
-- Triggers `inventorirusak`
--
DELIMITER $$
CREATE TRIGGER `gaJadiRusak` AFTER DELETE ON `inventorirusak` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok + OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `saatRusak` AFTER INSERT ON `inventorirusak` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahRusak` AFTER UPDATE ON `inventorirusak` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + OLD.jumlah, 
                     stok = stok - NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int(5) NOT NULL,
  `jenis` enum('Cuci Kiloan','Cuci Satuan') NOT NULL,
  `subjenis` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idjenis`, `jenis`, `subjenis`, `harga`, `ket`) VALUES
(2, 'Cuci Satuan', 'Cuci Kering Setrika', 3500, '-'),
(3, 'Cuci Kiloan', 'Paket 1 (Cuci Kering 5kg)', 10000, '-'),
(4, 'Cuci Kiloan', 'Cuci Basah', 5000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `idpromo` int(5) NOT NULL,
  `waktu1` datetime NOT NULL,
  `waktu2` datetime NOT NULL,
  `idjenis` int(2) NOT NULL,
  `hargaawal` float NOT NULL,
  `hargapromo` float NOT NULL,
  `event` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`idpromo`, `waktu1`, `waktu2`, `idjenis`, `hargaawal`, `hargapromo`, `event`) VALUES
(1, '2021-07-27 19:09:00', '2021-07-29 19:09:00', 4, 5000, 4500, 'Cuci Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `notransaksi` varchar(15) NOT NULL,
  `id` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `total` float NOT NULL,
  `dicuci` enum('Belum','Sudah') NOT NULL,
  `antarjemput` enum('Ya','Tidak') NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`notransaksi`, `id`, `tgl`, `total`, `dicuci`, `antarjemput`, `catatan`) VALUES
('2021072609', 3, '2021-07-26 10:37:00', 35000, 'Belum', 'Ya', '-'),
('2021072657', 3, '2021-08-04 18:33:00', 64000, 'Belum', 'Ya', '-'),
('2021072727', 5, '2021-07-27 06:53:00', 37500, 'Belum', 'Ya', '-'),
('2021072755', 3, '2021-07-27 06:23:00', 30000, 'Belum', 'Ya', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jk` enum('Laki-Laki','Wanita') NOT NULL,
  `ttl` varchar(80) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jk`, `ttl`, `telp`, `alamat`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', '', '', '', '', 'Admin'),
(3, 'Rendi', 'rendi', 'rendi', 'Laki-Laki', 'BJM, 31 April 1995', '089172314213', 'BJM', 'Pelanggan'),
(4, 'Tretan', 'tretan', 'tretan', 'Laki-Laki', 'betulbanar, 15 Mei 1999', '089666714255', 'hantu mariaban', 'Karyawan'),
(5, 'Mawar', 'mawar', 'mawar', 'Wanita', 'Banten, 17 Maret 1995', '082172614255', '-', 'Pelanggan'),
(6, 'Portgas D. Ace', 'ace', 'ace', 'Wanita', 'Seoul, 19 Januari 1992', '08888314764', '-', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`idbiaya`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `notransaksi` (`notransaksi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`idgaji`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`idinventori`);

--
-- Indexes for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD PRIMARY KEY (`idinventorimasuk`),
  ADD KEY `idinventori` (`idinventori`);

--
-- Indexes for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  ADD PRIMARY KEY (`idinventorirusak`),
  ADD KEY `idinventori` (`idinventori`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`idpromo`),
  ADD KEY `idjenis` (`idjenis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`notransaksi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `idbiaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `iddetail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `idgaji` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
  MODIFY `idinventori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  MODIFY `idinventorimasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  MODIFY `idinventorirusak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `idpromo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`notransaksi`) REFERENCES `transaksi` (`notransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD CONSTRAINT `inventorimasuk_ibfk_1` FOREIGN KEY (`idinventori`) REFERENCES `inventori` (`idinventori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  ADD CONSTRAINT `inventorirusak_ibfk_1` FOREIGN KEY (`idinventori`) REFERENCES `inventori` (`idinventori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
