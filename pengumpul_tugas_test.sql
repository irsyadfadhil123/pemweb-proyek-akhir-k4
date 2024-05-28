-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 01:19 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `diskusi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 2, 5, '2024-05-18');

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
(1, 2, 3, 2),
(2, 3, 3, 2),
(3, 3, 5, 3),
(4, 2, 5, 3),
(6, 2, 7, 2),
(7, 4, 5, 3),
(8, 4, 8, 4);

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
(3, '2', 'test', 'lorem ipsum', '2024-05-31 00:00:00', 'testing'),
(5, '3', 'Membuat MVC', 'membuat mvc degan php', '2024-05-31 23:59:00', 'phpmvc'),
(7, '2', 'Project Akhir', 'project akhir pemrograman web', '2024-06-21 00:00:00', 'weblastproject'),
(8, '4', 'Proyek Akhir PBO', 'membuat aplikasi sederhana', '2024-05-31 23:59:00', 'javapbo');

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
(2, 'kalpinkenjeran', '$2y$10$I1LCdbNJ.dtslQ/lbAZHmOveChgVKQ9RAdgdKSe/x9xnjmqOZlw5e', 'Kalfin Syah', ''),
(3, 'irsyadfadhil123', '$2y$10$57B.G9H2Lr1MNdsGDWOguO/42auCFhgNR.CYDv3dwncqlK/57C7VK', 'Irsyad Fadhil', ''),
(4, 'user3', '$2y$10$cEmcGNOFtFkWynXQOv5U2edk63HKmi5H1R8RW5Mo/lmLjMLgqx6zS', 'User 3', '');

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
  MODIFY `diskusi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kehadiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
