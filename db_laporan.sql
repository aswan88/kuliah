-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 06:26 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal_tulis` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi_artikel` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `tanggal_tulis`, `gambar`, `deskripsi_artikel`) VALUES
(3, 'Tangkap Penyebar Hoaks', '2019-10-20', '17112019181709bg.png', 'Aparat kepolisian polda Maluku membekuk seorang pemuda penyebar hoaks bernama Vicardy Kempa alias hardy, di Ambon, Minggu (20/102019).\r\nHardy diketahui merupakan salah satu pelaku penyebar hoaks yang menyebarkan berita bohong tentang akan terjadinya gempa besar dan tsunami di Maluku melalu media sosial.\r\nBerita hoaks yang disebar ini pun membuat warga di kota Ambon panik dan ketakutan hingga mengumsi di ke gunung dan hutan. saat menyebarkan berita hoaks tersebut, Hardy ikut mencatut nama Wali kota Ambon, Richard Louhenapessy, sehingga warga yang membaca pesan yang viral di media sosial tersebut mengira kalau pesan itu resmi besar dari Wali Kota Ambon.\r\n&quot;Sudah ditangkap, dan saat ini statusnya sudah resmi dijadikan sebagai tersangka,&quot; kata Kabid Humas Polda Maluku, Kombes Pol Muhamad Roem Ohoirat.'),
(5, 'Isu gempa Besar Bakal Terjadi di Ambon', '2019-09-29', '17112019193937bg_pengungsi.jpg', '&quot;Terkait dengan isu akan terjadi  Gempa dan tsunami di Ambon, Teluk Piru, dan Saparua adalah tidak benar atau bohong(HOAKS), karena hingga saat ini belum ada teknologi yang dapat memprediksi gempa. Gempa bumi dengan tepat dan akurat, kapan, di mana, dan berapa kekuatannya,&quot; kata dia. Oleh karenanya, masyarakat, khususnya di lokasi bencana gempa bumi diminta untuk tidak panik dan terpancing oleh informasi yang tidak diketahui kebenarannya. \r\nuntuk mendapatkan pembaruan informasi terkait konsdisi maupun prakiran kondisi di wilayahnya.');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `nama_isu` varchar(100) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal`, `sumber`, `nama_isu`, `deskripsi`) VALUES
(4, '2019-11-08', 'Orang kesurupan', 'Ambon Akan Tenggelam', 'kl'),
(5, '2019-11-08', 'Orang kesurupan', 'Ambon Akan Tenggelam', 'kl'),
(6, '2019-11-18', 'Orang kesurupan', 'Ambon Akan Tenggelam', 'oh jadi bagini tdi mllm itu tho org kesurupan la ambon ini akang mo lenyap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `username`, `password`) VALUES
(2, 1, 'admin', 'admin'),
(3, 2, 'aswan', '123'),
(4, 2, 'felo', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `level`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
