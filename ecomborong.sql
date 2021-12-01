-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 10:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomborong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `nama`, `level`, `saldo`, `gambar`) VALUES
(1, 'admin', 'admin', 'Galang Putra', 'admin', 0, 'gambar_pp/default.png'),
(2, 'galang21', 'qwerty', 'Galang Putra', 'pengunjung', 10000000, 'gambar_pp/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `idcheckout` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `noktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `alamat_pengiriman` varchar(255) NOT NULL,
  `jenis_pengiriman` varchar(255) NOT NULL,
  `tgl_checkout` date NOT NULL,
  `wkt_checkout` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`idcheckout`, `idadmin`, `noktp`, `nama`, `notelp`, `kodepos`, `alamat`, `alamat_pengiriman`, `jenis_pengiriman`, `tgl_checkout`, `wkt_checkout`, `status`) VALUES
(1, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNT', '2020-11-29', '11:19:48', 'Belum Sampai'),
(2, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'POS INDONESIA', '2020-11-29', '11:30:31', 'Belum Sampai'),
(3, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'POS INDONESIA', '2020-11-29', '11:47:55', 'Belum Sampai'),
(4, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNT', '2020-11-29', '12:46:50', 'Belum Sampai'),
(5, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNE', '2020-11-29', '12:47:32', 'Belum Sampai'),
(6, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNE', '2020-11-29', '12:48:25', 'Belum Sampai'),
(7, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNE', '2020-11-29', '12:49:12', 'Belum Sampai'),
(8, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNE', '2020-11-29', '12:50:52', 'Belum Sampai'),
(9, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNE', '2020-12-01', '07:18:12', 'Belum Sampai'),
(10, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNT', '2020-12-01', '18:12:49', 'Belum Sampai'),
(11, 2, '123', 'Galang', '51231213', '60246', 'asdasd', 'asdasd', 'JNT', '2020-12-01', '18:16:33', 'Belum Sampai');

-- --------------------------------------------------------

--
-- Table structure for table `daftarp`
--

CREATE TABLE `daftarp` (
  `id_beli` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `noktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `alamatkirim` varchar(255) NOT NULL,
  `jkirim` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarp`
--

INSERT INTO `daftarp` (`id_beli`, `idadmin`, `idproduk`, `noktp`, `nama`, `notelp`, `alamatkirim`, `jkirim`, `jumlah`, `harga`, `subtotal`, `tgl`, `waktu`, `status`) VALUES
(1, 2, 12, '123', 'Galang', '51231213', 'asdasd', 'JNT', 1, 250000, 250000, '2020-11-29', '11:19:48', 'Belum Sampai'),
(2, 2, 10, '123', 'Galang', '51231213', 'asdasd', 'POS INDONESIA', 1, 250000, 250000, '2020-11-29', '11:30:31', 'Belum Sampai'),
(3, 2, 9, '123', 'Galang', '51231213', 'asdasd', 'POS INDONESIA', 1, 200000, 200000, '2020-11-29', '11:47:55', 'Belum Sampai'),
(4, 2, 9, '123', 'Galang', '51231213', 'asdasd', 'POS INDONESIA', 1, 200000, 200000, '2020-11-29', '11:47:55', 'Belum Sampai');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `idkategoriproduk` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`idkategoriproduk`, `kategori`) VALUES
(1, 'Keyboard'),
(2, 'Mouse'),
(3, 'Headset'),
(10, 'Mousepad');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `namamember` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_produk`
--

CREATE TABLE `pesan_produk` (
  `idpesanproduk` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategoriproduk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi_singkat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategoriproduk`, `nama_produk`, `harga`, `deskripsi_singkat`, `deskripsi`, `tanggal_input`, `waktu_input`, `gambar`) VALUES
(20, 1, 'Razer Huntsman', '2199000', 'Keyboard Gaming', '', '2020-12-01', '19:38:00', 'gambar_produk/razer-huntsman.jpg'),
(22, 1, 'Corsair K95', '2500000', 'Keyboard Gaming', '', '2020-12-01', '19:40:15', 'gambar_produk/corsair-k95.jpg'),
(23, 1, 'Steelseries Apex Pro', '3200000', 'Keyboard Gaming', '', '2020-12-01', '19:40:50', 'gambar_produk/ss-apex-pro.jpg'),
(24, 3, 'Steelseries Arctis Pro', '2800000', 'Headset Gaming', '', '2020-12-01', '19:42:40', 'gambar_produk/ss-arctis-pro.jpg'),
(25, 3, 'Hyper X Revolver S', '1300000', 'Headset Gaming', '', '2020-12-01', '19:43:11', 'gambar_produk/hypex-revolver-s.jpg'),
(26, 3, 'Logitech G Pro X Wireless', '2100000', 'Headset Gaming', '', '2020-12-01', '19:43:46', 'gambar_produk/logitech-gpro-x-wireless.jpg'),
(27, 2, 'Steelseries Sensei Ten', '910000', 'Mouse Gaming', '', '2020-12-01', '19:45:16', 'gambar_produk/ss-sensei-ten.jpg'),
(28, 2, 'Steelseries Rival 710', '1200000', 'Mouse Gaming', '', '2020-12-01', '19:45:39', 'gambar_produk/ss-rival710.jpg'),
(29, 2, 'Razer Deathadder', '1100000', 'Mouse Gaming', '', '2020-12-01', '19:46:03', 'gambar_produk/rz-deathadder.jpg'),
(30, 10, 'Steelseries QcK', '210000', 'Mousepad', '', '2020-12-01', '19:47:45', 'gambar_produk/ssqck.jpg'),
(31, 10, 'Corsair MM800', '550000', 'Mousepad', '', '2020-12-01', '19:48:13', 'gambar_produk/corsair-mm800.jpg'),
(32, 10, 'Corsair MM100 Qi', '400000', 'Mousepad', '', '2020-12-01', '19:48:45', 'gambar_produk/corsair-mm100-qi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `req_saldo`
--

CREATE TABLE `req_saldo` (
  `id` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`idcheckout`);

--
-- Indexes for table `daftarp`
--
ALTER TABLE `daftarp`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`idkategoriproduk`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `pesan_produk`
--
ALTER TABLE `pesan_produk`
  ADD PRIMARY KEY (`idpesanproduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `req_saldo`
--
ALTER TABLE `req_saldo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `idcheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftarp`
--
ALTER TABLE `daftarp`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `idkategoriproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_produk`
--
ALTER TABLE `pesan_produk`
  MODIFY `idpesanproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `req_saldo`
--
ALTER TABLE `req_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
