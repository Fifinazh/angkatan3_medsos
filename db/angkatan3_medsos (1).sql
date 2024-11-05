-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 09:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan3_medsos`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `status_id`, `user_id`, `comment_text`, `created_at`) VALUES
(1, 1, 1, 'tes', '2024-11-05 04:34:59'),
(2, 1, 1, 'tes', '2024-11-05 04:38:55'),
(3, 1, 1, 'tes', '2024-11-05 04:38:56'),
(4, 6, 0, 'coba lagi', '2024-11-05 06:51:58'),
(5, 6, 0, 'coba lagi', '2024-11-05 06:55:44'),
(6, 6, 0, 'tess', '2024-11-05 06:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `id_user`, `content`, `foto`, `created_at`, `update_at`) VALUES
(1, 1, '<p>Holaaa</p>', '', '2024-11-04 08:29:26', '2024-11-04 08:29:26'),
(2, 1, '<p>Holaaa</p>', '', '2024-11-04 08:31:26', '2024-11-04 08:31:26'),
(3, 1, '<p>Holaaa</p>', '', '2024-11-04 08:46:57', '2024-11-04 08:46:57'),
(4, 1, '<p>Holaaa</p>', '', '2024-11-04 08:47:54', '2024-11-04 08:47:54'),
(5, 1, 'asas', '', '2024-11-04 09:02:23', '2024-11-04 09:02:23'),
(6, 0, '<p>asas</p>', '', '2024-11-04 09:04:20', '2024-11-04 09:04:20'),
(7, 0, '<p>asas</p>', '', '2024-11-04 09:04:25', '2024-11-04 09:04:25'),
(8, 1, '<p>tewesss</p>', '', '2024-11-04 09:04:53', '2024-11-04 09:04:53'),
(9, 1, '<p>sasas</p>', 'siluet.png', '2024-11-04 09:05:21', '2024-11-04 09:05:21'),
(10, 1, '', 'FNA logo.png', '2024-11-05 02:19:45', '2024-11-05 02:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `nama_pengguna`, `email`, `password`, `foto`, `cover`, `created_at`, `update_at`) VALUES
(1, 'Fitria Nur Azizah', 'fifiajaa', 'admin@gmail.com', '123', 'pixelcut-export.png', 'fitria nur a (2).png', '2024-10-31 08:12:06', '2024-11-04 06:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
