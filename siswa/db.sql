-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 11, 2026 at 09:25 AM
-- Server version: 8.0.44
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_mas_wahyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_siswa`
--

CREATE TABLE `foto_siswa` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` int UNSIGNED DEFAULT NULL,
  `file_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto_siswa`
--

INSERT INTO `foto_siswa` (`id`, `id_siswa`, `file_foto`, `keterangan`) VALUES
(34, 1, 'download-app-store.png', 'test'),
(36, 6, '300x300.png', 'bunga foto'),
(39, 2, '300x300-6af427e02e76a.png', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` int UNSIGNED DEFAULT NULL,
  `id_mata_pelajaran` int UNSIGNED DEFAULT NULL,
  `jadwal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_siswa`, `id_mata_pelajaran`, `jadwal`) VALUES
(6, 2, 3, '2026-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int UNSIGNED NOT NULL,
  `kode_mata_pelajaran` varchar(255) DEFAULT NULL,
  `nama_mata_pelajaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `kode_mata_pelajaran`, `nama_mata_pelajaran`) VALUES
(1, '001', 'Programming'),
(2, '100', 'Bahasa Indonesia'),
(3, '003', 'Bahasa Inggris'),
(4, '004', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `modul_mata_pelajaran`
--

CREATE TABLE `modul_mata_pelajaran` (
  `id` int UNSIGNED NOT NULL,
  `id_mata_pelajaran` int UNSIGNED DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `modul_mata_pelajaran`
--

INSERT INTO `modul_mata_pelajaran` (`id`, `id_mata_pelajaran`, `nama_file`, `keterangan`) VALUES
(18, 1, 'Modul Web Design WebHozz.pdf', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$hGeqP73Dx9dgQquBq8XF7O45OA8GK6kvvMD.AoGloyLA31WAFiiSK');

-- --------------------------------------------------------

--
-- Table structure for table `table_siswa`
--

CREATE TABLE `table_siswa` (
  `id` int UNSIGNED NOT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_siswa`
--

INSERT INTO `table_siswa` (`id`, `nisn`, `nama_siswa`, `alamat`, `tanggal_lahir`) VALUES
(1, 'ABC123', 'Budi', 'Jakarta', '2000-01-20'),
(2, 'ABC124', 'Andre', 'Tangerang', '2001-02-18'),
(3, 'ABC125', 'Iwan', 'Bogor', '2000-02-02'),
(4, 'ABC126', 'Rina', 'Depok', '2001-03-31'),
(5, 'ABC127', 'Rini', 'Bandung', '2002-05-12'),
(6, 'ABC128', 'Bunga', 'Karawang', '2001-08-14'),
(7, 'ABC129', 'Andi', 'Jakarta', '2002-09-03'),
(8, 'ABC1210', 'Tulipe', 'Bekasi', '2000-07-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_siswa`
--
ALTER TABLE `foto_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul_mata_pelajaran`
--
ALTER TABLE `modul_mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_siswa`
--
ALTER TABLE `table_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_siswa`
--
ALTER TABLE `foto_siswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `modul_mata_pelajaran`
--
ALTER TABLE `modul_mata_pelajaran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_siswa`
--
ALTER TABLE `table_siswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_siswa`
--
ALTER TABLE `foto_siswa`
  ADD CONSTRAINT `fk_foto_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `table_siswa` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `table_siswa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `modul_mata_pelajaran`
--
ALTER TABLE `modul_mata_pelajaran`
  ADD CONSTRAINT `modul_mata_pelajaran_ibfk_1` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
