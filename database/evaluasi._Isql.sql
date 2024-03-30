-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2024 pada 18.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `pg` varchar(10) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk table `kegiatan`
--

INSERT INTO `kegiatan` (`pg`, `judul`) VALUES
('A11', 'Optimalisasi Respon Pengaduan  Masyarakat yang cepat dan berkuaitas oleh akun resmi Satuan Wil/Sat \r\n'),
('A21', 'Optimalisasi penyebaran konten positif dan pengalihan isu negatif Polri yang dilakukan oleh akun Sobat Kamtibmas');

-- --------------------------------------------------------

--
-- Struktur dari table `laporan_polda`
--

CREATE TABLE `laporan_polda` (
  `id` int(11) NOT NULL,
  `Polda` varchar(255) NOT NULL,
  `Periode` date NOT NULL,
  `PG` varchar(30) NOT NULL,
  `Min` float NOT NULL,
  `Max` float NOT NULL,
  `Triwulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari table `laporan_polres`
--

CREATE TABLE `laporan_polres` (
  `id` int(11) NOT NULL,
  `Polres` varchar(255) NOT NULL,
  `PG` varchar(30) NOT NULL,
  `Min` float NOT NULL,
  `Max` float NOT NULL,
  `Periode` date NOT NULL,
  `Triwulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk table `laporan_polres`
--

INSERT INTO `laporan_polres` (`id`, `Polres`, `PG`, `Min`, `Max`, `Periode`, `Triwulan`) VALUES
(5, '', 'A11', 65, 90, '2024-03-25', 1),
(6, '', 'A21', 65, 90, '2024-03-25', 1),
(7, '', 'C71', 65, 90, '2024-03-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari table `persentase_polres`
--

CREATE TABLE `persentase_polres` (
  `id` int(100) NOT NULL,
  `Polda` varchar(225) NOT NULL,
  `Polres` varchar(255) NOT NULL,
  `Periode` date NOT NULL,
  `Persentase` float NOT NULL,
  `PG` varchar(255) NOT NULL,
  `Triwulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk table `persentase_polres`
--

INSERT INTO `persentase_polres` (`id`, `Polda`, `Polres`, `Periode`, `Persentase`, `PG`, `Triwulan`) VALUES
(392, '', 'Aceh Barat', '2024-03-25', 88.89, 'A11', 0),
(393, '', 'Bireuen', '2024-03-25', 88.89, 'A11', 0),
(394, '', 'Pidie Jaya', '2024-03-25', 88.89, 'A11', 0),
(395, '', 'Pidie', '2024-03-25', 88.89, 'A11', 0),
(396, '', 'Nagan Raya', '2024-03-25', 88.89, 'A11', 0),
(397, '', 'Kota Subulussalam', '2024-03-25', 88.89, 'A11', 0),
(398, '', 'Kota Sabang', '2024-03-25', 88.89, 'A11', 0),
(399, '', 'Kota Lhokseumawe', '2024-03-25', 88.89, 'A11', 0),
(400, '', 'Kota Langsa', '2024-03-25', 88.89, 'A11', 0),
(401, '', 'Kota Banda Aceh', '2024-03-25', 88.89, 'A11', 0),
(402, '', 'Gayo Lues', '2024-03-25', 88.89, 'A11', 0),
(403, '', 'Bener Meriah', '2024-03-25', 88.89, 'A11', 0),
(404, '', 'Aceh Barat Daya', '2024-03-25', 88.89, 'A11', 0),
(405, '', 'Aceh Utara', '2024-03-25', 88.89, 'A11', 0),
(406, '', 'Aceh Timur', '2024-03-25', 88.89, 'A11', 0),
(407, '', 'Aceh Tenggara', '2024-03-25', 88.89, 'A11', 0),
(408, '', 'Aceh Tengah', '2024-03-25', 88.89, 'A11', 0),
(409, '', 'Aceh Tamiang', '2024-03-25', 88.89, 'A11', 0),
(410, '', 'Aceh Singkil', '2024-03-25', 88.89, 'A11', 0),
(411, '', 'Aceh Selatan', '2024-03-25', 88.89, 'A11', 0),
(412, '', 'Aceh Jaya', '2024-03-25', 88.89, 'A11', 0),
(413, '', 'Aceh Besar', '2024-03-25', 88.89, 'A11', 0),
(414, '', 'Simeulue', '2024-03-25', 88.89, 'A11', 0),
(415, '', 'Aceh Barat', '2024-03-25', 88.89, 'A21', 0),
(416, '', 'Bireuen', '2024-03-25', 88.89, 'A21', 0),
(417, '', 'Pidie Jaya', '2024-03-25', 88.89, 'A21', 0),
(418, '', 'Pidie', '2024-03-25', 88.89, 'A21', 0),
(419, '', 'Nagan Raya', '2024-03-25', 88.89, 'A21', 0),
(420, '', 'Kota Subulussalam', '2024-03-25', 88.89, 'A21', 0),
(421, '', 'Kota Sabang', '2024-03-25', 88.89, 'A21', 0),
(422, '', 'Kota Lhokseumawe', '2024-03-25', 88.89, 'A21', 0),
(423, '', 'Kota Langsa', '2024-03-25', 88.89, 'A21', 0),
(424, '', 'Kota Banda Aceh', '2024-03-25', 88.89, 'A21', 0),
(425, '', 'Gayo Lues', '2024-03-25', 88.89, 'A21', 0),
(426, '', 'Bener Meriah', '2024-03-25', 88.89, 'A21', 0),
(427, '', 'Aceh Barat Daya', '2024-03-25', 88.89, 'A21', 0),
(428, '', 'Aceh Utara', '2024-03-25', 88.89, 'A21', 0),
(429, '', 'Aceh Timur', '2024-03-25', 88.89, 'A21', 0),
(430, '', 'Aceh Tenggara', '2024-03-25', 88.89, 'A21', 0),
(431, '', 'Aceh Tengah', '2024-03-25', 88.89, 'A21', 0),
(432, '', 'Aceh Tamiang', '2024-03-25', 88.89, 'A21', 0),
(433, '', 'Aceh Singkil', '2024-03-25', 88.89, 'A21', 0),
(434, '', 'Aceh Selatan', '2024-03-25', 88.89, 'A21', 0),
(435, '', 'Aceh Jaya', '2024-03-25', 88.89, 'A21', 0),
(436, '', 'Aceh Besar', '2024-03-25', 88.89, 'A21', 0),
(437, '', 'Simeulue', '2024-03-25', 88.89, 'A21', 0),
(438, '', 'Aceh Barat', '2024-03-25', 100, 'C71', 0),
(439, '', 'Bireuen', '2024-03-25', 100, 'C71', 0),
(440, '', 'Pidie Jaya', '2024-03-25', 100, 'C71', 0),
(441, '', 'Pidie', '2024-03-25', 100, 'C71', 0),
(442, '', 'Nagan Raya', '2024-03-25', 100, 'C71', 0),
(443, '', 'Kota Subulussalam', '2024-03-25', 100, 'C71', 0),
(444, '', 'Kota Sabang', '2024-03-25', 100, 'C71', 0),
(445, '', 'Kota Lhokseumawe', '2024-03-25', 100, 'C71', 0),
(446, '', 'Kota Langsa', '2024-03-25', 100, 'C71', 0),
(447, '', 'Kota Banda Aceh', '2024-03-25', 100, 'C71', 0),
(448, '', 'Gayo Lues', '2024-03-25', 100, 'C71', 0),
(449, '', 'Bener Meriah', '2024-03-25', 100, 'C71', 0),
(450, '', 'Aceh Barat Daya', '2024-03-25', 100, 'C71', 0),
(451, '', 'Aceh Utara', '2024-03-25', 100, 'C71', 0),
(452, '', 'Aceh Timur', '2024-03-25', 100, 'C71', 0),
(453, '', 'Aceh Tenggara', '2024-03-25', 100, 'C71', 0),
(454, '', 'Aceh Tengah', '2024-03-25', 100, 'C71', 0),
(455, '', 'Aceh Tamiang', '2024-03-25', 100, 'C71', 0),
(456, '', 'Aceh Singkil', '2024-03-25', 100, 'C71', 0),
(457, '', 'Aceh Selatan', '2024-03-25', 100, 'C71', 0),
(458, '', 'Aceh Jaya', '2024-03-25', 100, 'C71', 0),
(459, '', 'Aceh Besar', '2024-03-25', 100, 'C71', 0),
(460, '', 'Simeulue', '2024-03-25', 100, 'C71', 0);

-- --------------------------------------------------------

--
-- Struktur dari table `polres`
--

CREATE TABLE `polres` (
  `nama` varchar(158) NOT NULL,
  `lokasi` varchar(158) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari table `user`
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
-- Dumping data untuk table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(4, 'admin', '$2y$10$KfroUfCRTIo0r8do5HBMt.KM.g.oCb.ilCxCy1k0jI4R3Z9KHdfTK', '_mrizky', 'Aceh Besar', 'Komandan', '384-spiderman.jpg'),
(5, 'user', '$2y$10$2/mxOR8f4yVw0wtCb/5DOeMYL65hWgpSgY/t5fsTLJQKNL4dO7XXS', 'dark', 'Aceh Besar', 'Komandan', 'profil.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`pg`);

--
-- Indeks untuk table `laporan_polda`
--
ALTER TABLE `laporan_polda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk table `laporan_polres`
--
ALTER TABLE `laporan_polres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk table `persentase_polres`
--
ALTER TABLE `persentase_polres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk table `polres`
--
ALTER TABLE `polres`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk table yang dibuang
--

--
-- AUTO_INCREMENT untuk table `laporan_polda`
--
ALTER TABLE `laporan_polda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk table `laporan_polres`
--
ALTER TABLE `laporan_polres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk table `persentase_polres`
--
ALTER TABLE `persentase_polres`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT untuk table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
