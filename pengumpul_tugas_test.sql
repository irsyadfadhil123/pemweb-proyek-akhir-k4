-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengumpul_tugas_test`
--
CREATE DATABASE IF NOT EXISTS pengumpul_tugas_test;

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `diskusi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `reff` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`diskusi_id`, `user_id`, `tugas_id`, `pesan`, `waktu`, `reff`) VALUES
(1, 4, 5, 'tes', '2024-05-30 20:30:34', NULL),
(2, 4, 5, 'tes2', '2024-05-30 20:31:44', NULL),
(3, 4, 5, 'halo, nama saya User 3', '2024-05-31 08:17:43', NULL),
(7, 4, 5, 'reff test2', '2024-05-31 21:34:40', 1),
(12, 5, 3, 'tesfotoprofil', '2024-06-02 18:39:44', NULL),
(13, 5, 7, 'halo saya Kalfin dari Kenjeran', '2024-06-03 07:02:40', NULL),
(14, 5, 7, 'halo semuanya', '2024-06-03 07:03:58', 13);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `user_id`, `tugas_id`, `nama_file`, `catatan`, `nilai`) VALUES
(1, 5, 3, '665c6b434361a.pdf', '', NULL),
(2, 3, 9, '665eacc3272b5.pdf', NULL, NULL),
(3, 5, 7, '665f996d3a011.pdf', 'tes catatan', NULL),
(4, 5, 8, '665f99d109a63.pdf', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kehadiran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `tanggal_kehadiran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`kehadiran_id`, `user_id`, `tugas_id`, `tanggal_kehadiran`) VALUES
(1, 3, 3, '2024-05-13'),
(5, 4, 5, '2024-05-30'),
(6, 5, 5, '2024-06-02'),
(7, 5, 3, '2024-06-03'),
(8, 5, 7, '2024-06-03'),
(9, 5, 8, '2024-06-03'),
(10, 3, 9, '2024-06-04'),
(11, 3, 10, '2024-06-04'),
(12, 3, 11, '2024-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `user_id`, `tugas_id`, `admin`) VALUES
(2, 3, 3, 2),
(3, 3, 5, 3),
(7, 4, 5, 3),
(8, 4, 8, 4),
(10, 5, 3, 2),
(11, 5, 7, 2),
(12, 5, 8, 4),
(13, 5, 5, 3),
(14, 5, 9, 5),
(15, 5, 10, 5),
(16, 5, 11, 5),
(17, 3, 9, 5),
(18, 3, 10, 5),
(19, 3, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(11) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `kode_tugas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`tugas_id`, `admin`, `judul`, `deskripsi`, `deadline`, `kode_tugas`) VALUES
(3, '2', 'test', 'lorem ipsum', '2024-06-04 00:00:00', 'testing'),
(5, '3', 'Membuat MVC', 'membuat mvc degan php', '2024-06-06 23:59:00', 'phpmvc'),
(7, '2', 'Project Akhir', 'project akhir pemrograman web', '2024-06-07 00:00:00', 'weblastproject'),
(8, '4', 'Proyek Akhir PBO', 'membuat aplikasi sederhana', '2024-06-06 23:59:00', 'javapbo'),
(9, '5', 'test pagination', 'hanya test', '2024-06-06 23:59:00', 'testpagi'),
(10, '5', 'test pagination2', 'tes', '2024-06-06 04:09:00', 'tespag2'),
(11, '5', 'test pagination3', 'tes3', '2024-06-06 04:10:00', 'tespag3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` char(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `gambar`) VALUES
(3, 'irsyadfadhil123', '$2y$10$57B.G9H2Lr1MNdsGDWOguO/42auCFhgNR.CYDv3dwncqlK/57C7VK', 'Irsyad Fadhil', 'nophoto.png'),
(4, 'user3', '$2y$10$cEmcGNOFtFkWynXQOv5U2edk63HKmi5H1R8RW5Mo/lmLjMLgqx6zS', 'User 3', 'nophoto.png'),
(5, 'kalpinkenjeran', '$2y$10$ySlFMH73ogpSC/ja3s7nqOZT2w2f0L3GVR1ggXGRZM/l4wIlXeTTe', 'Kalfin Syah Kilau Mayya', '665c0faf7834d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`diskusi_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `tugas` (`tugas_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `tugas` (`tugas_id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kehadiran_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `tugas` (`tugas_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `tugas` (`tugas_id`),
  ADD KEY `admin` (`admin`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD UNIQUE KEY `kode tugas` (`kode_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `diskusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kehadiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diskusi_ibfk_2` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`tugas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
