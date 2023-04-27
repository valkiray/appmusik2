-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 07:02 AM
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
-- Database: `appmusik`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `judul_album` varchar(255) NOT NULL,
  `artis` varchar(255) NOT NULL,
  `tgl_rilis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `judul_album`, `artis`, `tgl_rilis`) VALUES
(1, 'thunder', 'Imagine Dragons', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `artis`
--

CREATE TABLE `artis` (
  `id_artis` int(11) NOT NULL,
  `nama_artis` varchar(255) NOT NULL,
  `label_musik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artis`
--

INSERT INTO `artis` (`id_artis`, `nama_artis`, `label_musik`) VALUES
(0, 'Imagine Dragons ', 'masih gatau');

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id_lagu` int(11) NOT NULL,
  `judul_lagu` varchar(255) NOT NULL,
  `artis` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `durasi` time NOT NULL,
  `size` float NOT NULL,
  `lagu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id_lagu`, `judul_lagu`, `artis`, `album`, `durasi`, `size`, `lagu`) VALUES
(8, 'Apocalypse', 'Cigarettes After Sex', 'Apocalypse', '04:50:00', 4.48, 'Cigarettes After Sex - Apocalypse.mp3'),
(9, 'Jim Labrador', 'The Panturas', 'Ombak Banyu Asmara', '04:03:00', 4.1, 'The Panturas - Jim Labrador.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `judul_playlist` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `judul_playlist`, `nama_user`) VALUES
(0, 'pecel lele mang ujang', 'tejo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`id_artis`);

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id_lagu`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id_lagu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
