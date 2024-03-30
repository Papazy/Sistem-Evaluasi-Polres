-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2024 pada 19.05
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
  `PG` varchar(30) NOT NULL,
  `Min` float NOT NULL,
  `Max` float NOT NULL,
  `Periode` date NOT NULL,
  `Triwulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk table `laporan_polres`
--

INSERT INTO `laporan_polres` (`id`, `PG`, `Min`, `Max`, `Periode`, `Triwulan`) VALUES
(8, 'A11', 65, 90, '2024-03-25', 1),
(9, 'A21', 65, 90, '2024-03-25', 1),
(10, 'C72', 65, 90, '2024-03-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari table `persentase_polres`
--

CREATE TABLE `persentase_polres` (
  `id` int(100) NOT NULL,
  `Polres` varchar(255) NOT NULL,
  `Periode` date NOT NULL,
  `Persentase` float NOT NULL,
  `PG` varchar(255) NOT NULL,
  `Triwulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk table `persentase_polres`
--

INSERT INTO `persentase_polres` (`id`, `Polres`, `Periode`, `Persentase`, `PG`, `Triwulan`) VALUES
(461, 'Aceh Barat', '2024-03-25', 88.89, 'A11', 1),
(462, 'Bireuen', '2024-03-25', 88.89, 'A11', 1),
(463, 'Pidie Jaya', '2024-03-25', 88.89, 'A11', 1),
(464, 'Pidie', '2024-03-25', 88.89, 'A11', 1),
(465, 'Nagan Raya', '2024-03-25', 88.89, 'A11', 1),
(466, 'Kota Subulussalam', '2024-03-25', 88.89, 'A11', 1),
(467, 'Kota Sabang', '2024-03-25', 88.89, 'A11', 1),
(468, 'Kota Lhokseumawe', '2024-03-25', 88.89, 'A11', 1),
(469, 'Kota Langsa', '2024-03-25', 88.89, 'A11', 1),
(470, 'Kota Banda Aceh', '2024-03-25', 88.89, 'A11', 1),
(471, 'Gayo Lues', '2024-03-25', 88.89, 'A11', 1),
(472, 'Bener Meriah', '2024-03-25', 88.89, 'A11', 1),
(473, 'Aceh Barat Daya', '2024-03-25', 88.89, 'A11', 1),
(474, 'Aceh Utara', '2024-03-25', 88.89, 'A11', 1),
(475, 'Aceh Timur', '2024-03-25', 88.89, 'A11', 1),
(476, 'Aceh Tenggara', '2024-03-25', 88.89, 'A11', 1),
(477, 'Aceh Tengah', '2024-03-25', 88.89, 'A11', 1),
(478, 'Aceh Tamiang', '2024-03-25', 88.89, 'A11', 1),
(479, 'Aceh Singkil', '2024-03-25', 88.89, 'A11', 1),
(480, 'Aceh Selatan', '2024-03-25', 88.89, 'A11', 1),
(481, 'Aceh Jaya', '2024-03-25', 88.89, 'A11', 1),
(482, 'Aceh Besar', '2024-03-25', 88.89, 'A11', 1),
(483, 'Simeulue', '2024-03-25', 88.89, 'A11', 1),
(484, 'Aceh Barat', '2024-03-25', 88.89, 'A21', 1),
(485, 'Bireuen', '2024-03-25', 88.89, 'A21', 1),
(486, 'Pidie Jaya', '2024-03-25', 88.89, 'A21', 1),
(487, 'Pidie', '2024-03-25', 88.89, 'A21', 1),
(488, 'Nagan Raya', '2024-03-25', 88.89, 'A21', 1),
(489, 'Kota Subulussalam', '2024-03-25', 88.89, 'A21', 1),
(490, 'Kota Sabang', '2024-03-25', 88.89, 'A21', 1),
(491, 'Kota Lhokseumawe', '2024-03-25', 88.89, 'A21', 1),
(492, 'Kota Langsa', '2024-03-25', 88.89, 'A21', 1),
(493, 'Kota Banda Aceh', '2024-03-25', 88.89, 'A21', 1),
(494, 'Gayo Lues', '2024-03-25', 88.89, 'A21', 1),
(495, 'Bener Meriah', '2024-03-25', 88.89, 'A21', 1),
(496, 'Aceh Barat Daya', '2024-03-25', 88.89, 'A21', 1),
(497, 'Aceh Utara', '2024-03-25', 88.89, 'A21', 1),
(498, 'Aceh Timur', '2024-03-25', 88.89, 'A21', 1),
(499, 'Aceh Tenggara', '2024-03-25', 88.89, 'A21', 1),
(500, 'Aceh Tengah', '2024-03-25', 88.89, 'A21', 1),
(501, 'Aceh Tamiang', '2024-03-25', 88.89, 'A21', 1),
(502, 'Aceh Singkil', '2024-03-25', 88.89, 'A21', 1),
(503, 'Aceh Selatan', '2024-03-25', 88.89, 'A21', 1),
(504, 'Aceh Jaya', '2024-03-25', 88.89, 'A21', 1),
(505, 'Aceh Besar', '2024-03-25', 88.89, 'A21', 1),
(506, 'Simeulue', '2024-03-25', 88.89, 'A21', 1),
(507, 'Aceh Barat', '2024-03-25', 100, 'C72', 1),
(508, 'Bireuen', '2024-03-25', 100, 'C72', 1),
(509, 'Pidie Jaya', '2024-03-25', 100, 'C72', 1),
(510, 'Pidie', '2024-03-25', 100, 'C72', 1),
(511, 'Nagan Raya', '2024-03-25', 100, 'C72', 1),
(512, 'Kota Subulussalam', '2024-03-25', 100, 'C72', 1),
(513, 'Kota Sabang', '2024-03-25', 100, 'C72', 1),
(514, 'Kota Lhokseumawe', '2024-03-25', 100, 'C72', 1),
(515, 'Kota Langsa', '2024-03-25', 100, 'C72', 1),
(516, 'Kota Banda Aceh', '2024-03-25', 100, 'C72', 1),
(517, 'Gayo Lues', '2024-03-25', 100, 'C72', 1),
(518, 'Bener Meriah', '2024-03-25', 100, 'C72', 1),
(519, 'Aceh Barat Daya', '2024-03-25', 100, 'C72', 1),
(520, 'Aceh Utara', '2024-03-25', 100, 'C72', 1),
(521, 'Aceh Timur', '2024-03-25', 100, 'C72', 1),
(522, 'Aceh Tenggara', '2024-03-25', 100, 'C72', 1),
(523, 'Aceh Tengah', '2024-03-25', 100, 'C72', 1),
(524, 'Aceh Tamiang', '2024-03-25', 100, 'C72', 1),
(525, 'Aceh Singkil', '2024-03-25', 100, 'C72', 1),
(526, 'Aceh Selatan', '2024-03-25', 100, 'C72', 1),
(527, 'Aceh Jaya', '2024-03-25', 100, 'C72', 1),
(528, 'Aceh Besar', '2024-03-25', 100, 'C72', 1),
(529, 'Simeulue', '2024-03-25', 100, 'C72', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk table `persentase_polres`
--
ALTER TABLE `persentase_polres`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT untuk table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
