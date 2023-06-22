-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 01:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cierry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `created` date NOT NULL,
  `nama_image` varchar(50) NOT NULL,
  `type_image` varchar(50) NOT NULL,
  `size_image` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `deskripsi`, `harga`, `stok`, `created`, `nama_image`, `type_image`, `size_image`) VALUES
(1, 'Hijab Coklat Flower', 50000, 30, '2023-06-16', 'Elzatta-1-removebg-preview.png', 'image/png', 256443),
(2, 'Dress Aura Black ', 20000, 20, '2023-06-16', 'th__20_-removebg-preview.png', 'image/png', 20919),
(3, 'Jersey Argentina HOME 2017/2018', 120000, 50, '2018-01-01', '2.png', 'image/png', 86296);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `qty` int(50) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `date_in` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `qty` int(50) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `date_in` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_user`, `id_barang`, `ukuran`, `qty`, `kurir`, `date_in`, `total`) VALUES
(23, 2, 2, 'M', 3, 'JNE', '2023-06-17', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(100) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(6) NOT NULL,
  `password` varchar(6) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` text NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `alamat`, `no_hp`, `title`) VALUES
(1, 'Izra Noor Zahara Aliya', 'izra.aliya28@gmail.com', 'cierry', 'cierry', 'Jl. Tuban', '082333109593', 'admin'),
(2, 'Abdul Malik', 'malik@gmail.com', 'malik', 'malik', 'Jl. H Mali Jakarta Barat', '081344460967', 'user'),
(3, 'Thufail Erlangga', 'erlangga@gmail.com', 'angga', 'angga', 'Jl. H Junib Jakarta Barat', '088008800880', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
