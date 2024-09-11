-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 10:35 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_website_jasa_penyelenggara`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa_penyelenggara`
--

CREATE TABLE `jasa_penyelenggara` (
  `id` int(11) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `dibuat` datetime NOT NULL,
  `dibuat_oleh` varchar(255) NOT NULL,
  `diupdate` datetime NOT NULL,
  `diupdate_oleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa_penyelenggara`
--

INSERT INTO `jasa_penyelenggara` (`id`, `jenis_produk`, `deskripsi`, `gambar`, `dibuat`, `dibuat_oleh`, `diupdate`, `diupdate_oleh`) VALUES
(1, 'Corporate Catering', 'Bingung ingin menyediakan catering untuk karyawan? Solusinya mudah! Hubungi kami dan tidak perlu lagi pusing soal makanan.', '6672fc37baebe.jpg', '2024-06-19 22:41:43', 'monthy', '2024-06-19 23:15:18', 'monthy'),
(2, 'Wedding Organizer', 'Bingung untuk mengatur acara pernikahan anda? Solusi mudah! Hubungi kami maka kami akan mengurus semua kebutuhan acara pernikahan anda.', '6672fea43c2be.jpg', '2024-06-19 22:52:04', 'monthy', '0000-00-00 00:00:00', ''),
(3, 'Private Military Service', 'Bingung mencari jasa perlindungan atau jasa untuk melakukan kegiatan militer? Mudah solusinya! Hubungi kami maka kami akan membantu anda dalam misi anda yang membutuhkan jasa tenaga tentara bayaran kami.', '667300937a63e.jpg', '2024-06-19 23:00:19', 'monthy', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`) VALUES
('00001', 'monthy', 'Monthy Goreng', 'monthy123'),
('00002', 'thomas', 'Thomas Becket Tegar Surya Christy', 'thomas123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa_penyelenggara`
--
ALTER TABLE `jasa_penyelenggara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
