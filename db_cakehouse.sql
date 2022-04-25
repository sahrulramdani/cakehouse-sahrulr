-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 09:56 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makanan`
--

CREATE TABLE `tbl_makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(250) NOT NULL,
  `harga` int(250) NOT NULL,
  `keterangan` varchar(255) NOT NULL COMMENT 'keterangan makanan',
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_makanan`
--

INSERT INTO `tbl_makanan` (`id_makanan`, `nama_makanan`, `harga`, `keterangan`, `gambar`) VALUES
(1, 'Bolu Klemben ', 15000, 'Bolu klemben merupakan sebuah kue tradisional Indonesia yang berasal dari daerah Banyuwangi. Kue ini juga sudah ada sejak jaman dahulu dan dijual pada pasar tradisional.', 'a1.jpg'),
(2, 'Brownies Coklat', 30000, 'Kue Brownies Coklat dengan tambahan chocochips diatasnya dan menggunakan coklat belgium ', 'a2.jpg'),
(3, 'Kue Pukis', 22000, 'Kue pukis adalah kue atau makanan ringan tradisional Indonesia yang terbuat dari adonan berbahan dasar tepung terigu dan dimasak dalam wajan cetakan khusus.', 'a3.jpg'),
(4, 'Strawberry Shortcake', 70000, 'Shortcake adalah kue bolu atau biskuit. Shortcake dihias dengan buah dan krim kocok. Shortcake biasanya dibuat dari terigu, gula, bakpuder, atau soda kue, garam, mentega, susu, atau krim, dan kadang-kadang telur.', 'a4.jpg'),
(5, 'Kue Nastar', 25000, 'Nastar Nanas dengan topping keju dengan kematangan sempurna dan cocok untuk cemilan keluarga dan saat lebaran atau hari hari besar lainnya ', 'a5.jpg'),
(6, 'Bolu Macan', 45000, 'Bolu Macam Khas Bangka, Kue lembut dan cocok untuk arisan dan kumpul keluarga ', 'a6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
