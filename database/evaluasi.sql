-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 06:56 AM
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
-- Database: `evaluasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `Pg` varchar(10) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`Pg`, `judul`) VALUES
('A11', 'Optimalisasi Respon Pengaduan  Masyarakat yang cepat dan berkuaitas oleh akun resmi Satuan Wil/Sat \r\n'),
('A21', 'Optimalisasi penyebaran konten positif dan pengalihan isu negatif Polri yang dilakukan oleh akun Sobat Kamtibmas');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `Polres` varchar(50) NOT NULL,
  `Periode` date NOT NULL,
  `Pg` varchar(30) NOT NULL,
  `Persentase` float NOT NULL,
  `Mix` float NOT NULL,
  `Max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`Polres`, `Periode`, `Pg`, `Persentase`, `Mix`, `Max`) VALUES
('', '2024-03-09', 'A11', 0, 45, 67);

-- --------------------------------------------------------

--
-- Table structure for table `Polres`
--

CREATE TABLE `Polres` (
  `nama` varchar(158) NOT NULL,
  `lokasi` varchar(158) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Polres`
--

INSERT INTO `Polres` (`nama`, `lokasi`) VALUES
('Bireuen', '6P5X+WWF, Jl. Medan B. Aceh 24261 Bireuen Aceh'),
('Kota Sabang', 'V8QF+JFJ, Jl. Perdagangan 24411 Sabang Sumatera'),
('Nagan Raya', '583F+WF7 23671 Nagan Raya Aceh'),
('Pidie ', '9XM6+X78 24114 Pidie Aceh '),
('Pidie Jaya', '67M2+HJV Pidie Jaya Aceh\r\n'),
('Simeuleu', 'C9J9+XC3, Tim. 24782 Lasikin Aceh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(4, 'admin', '$2y$10$KfroUfCRTIo0r8do5HBMt.KM.g.oCb.ilCxCy1k0jI4R3Z9KHdfTK', '_mrizky', 'Aceh Besar', 'Komandan', '384-spiderman.jpg'),
(5, 'user', '$2y$10$2/mxOR8f4yVw0wtCb/5DOeMYL65hWgpSgY/t5fsTLJQKNL4dO7XXS', 'dark', 'Aceh Besar', 'Komandan', 'profil.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`Pg`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`Polres`);

--
-- Indexes for table `Polres`
--
ALTER TABLE `Polres`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
