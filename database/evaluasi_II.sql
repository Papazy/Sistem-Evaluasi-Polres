-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2024 pada 12.44
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
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `pg` varchar(10) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`pg`, `judul`) VALUES
('A11', 'Optimalisasi Respon Pengaduan  Masyarakat yang cepat dan berkuaitas oleh akun resmi Satuan Wil/Sat \r\n'),
('A21', 'Optimalisasi penyebaran konten positif dan pengalihan isu negatif Polri yang dilakukan oleh akun Sobat Kamtibmas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_polda`
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
-- Struktur dari tabel `laporan_polres`
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
-- Dumping data untuk tabel `laporan_polres`
--

INSERT INTO `laporan_polres` (`id`, `PG`, `Min`, `Max`, `Periode`, `Triwulan`) VALUES
(8, 'A11', 65, 90, '2024-03-25', 1),
(9, 'A21', 65, 90, '2024-03-25', 1),
(10, 'C72', 65, 90, '2024-03-25', 1),
(11, 'E131', 65, 90, '2024-03-25', 1),
(12, 'D101', 70, 90, '2024-03-27', 1),
(13, 'A11', 50, 90, '2024-03-31', 2),
(14, 'A21', 50, 90, '2024-03-31', 2),
(15, 'C72', 50, 90, '2024-03-31', 2),
(16, 'A11', 40, 80, '2024-03-31', 3),
(17, 'A21', 40, 80, '2024-03-31', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persentase_polres`
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
-- Dumping data untuk tabel `persentase_polres`
--

INSERT INTO `persentase_polres` (`id`, `Polres`, `Periode`, `Persentase`, `PG`, `Triwulan`) VALUES
(461, 'Aceh Barat', '2024-03-25', 20, 'A11', 1),
(463, 'Pidie Jaya', '2024-03-25', 88.89, 'A11', 1),
(464, 'Pidie', '2024-03-25', 88.89, 'A11', 1),
(465, 'Nagan Raya', '2024-03-25', 88.89, 'A11', 1),
(466, 'Kota Subulussalam', '2024-03-25', 88.89, 'A11', 1),
(467, 'Kota Sabang', '2024-03-25', 88.89, 'A11', 1),
(468, 'Kota Lhokseumawe', '2024-03-25', 22.89, 'A11', 1),
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
(484, 'Aceh Barat', '2024-03-25', 18.89, 'A21', 1),
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
(511, 'Nagan Raya', '2024-03-25', 67, 'C72', 1),
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
(529, 'Simeulue', '2024-03-25', 100, 'C72', 1),
(530, 'Aceh Barat', '2024-03-25', 100, 'E131', 1),
(531, 'Bireuen', '2024-03-25', 100, 'E131', 1),
(532, 'Pidie Jaya', '2024-03-25', 100, 'E131', 1),
(533, 'Pidie', '2024-03-25', 100, 'E131', 1),
(534, 'Nagan Raya', '2024-03-25', 100, 'E131', 1),
(535, 'Kota Subulussalam', '2024-03-25', 100, 'E131', 1),
(536, 'Kota Sabang', '2024-03-25', 100, 'E131', 1),
(537, 'Kota Lhokseumawe', '2024-03-25', 100, 'E131', 1),
(538, 'Kota Langsa', '2024-03-25', 100, 'E131', 1),
(539, 'Kota Banda Aceh', '2024-03-25', 100, 'E131', 1),
(540, 'Gayo Lues', '2024-03-25', 100, 'E131', 1),
(541, 'Bener Meriah', '2024-03-25', 100, 'E131', 1),
(542, 'Aceh Barat Daya', '2024-03-25', 100, 'E131', 1),
(543, 'Aceh Utara', '2024-03-25', 100, 'E131', 1),
(544, 'Aceh Timur', '2024-03-25', 100, 'E131', 1),
(545, 'Aceh Tenggara', '2024-03-25', 100, 'E131', 1),
(546, 'Aceh Tengah', '2024-03-25', 100, 'E131', 1),
(547, 'Aceh Tamiang', '2024-03-25', 100, 'E131', 1),
(548, 'Aceh Singkil', '2024-03-25', 100, 'E131', 1),
(549, 'Aceh Selatan', '2024-03-25', 100, 'E131', 1),
(550, 'Aceh Jaya', '2024-03-25', 100, 'E131', 1),
(551, 'Aceh Besar', '2024-03-25', 100, 'E131', 1),
(552, 'Simeulue', '2024-03-25', 100, 'E131', 1),
(553, 'Aceh Barat', '2024-03-27', 32.29, 'D101', 1),
(554, 'Bireuen', '2024-03-27', 32.29, 'D101', 1),
(555, 'Pidie Jaya', '2024-03-27', 32.29, 'D101', 1),
(556, 'Pidie', '2024-03-27', 32.29, 'D101', 1),
(557, 'Nagan Raya', '2024-03-27', 32.29, 'D101', 1),
(558, 'Kota Subulussalam', '2024-03-27', 88.89, 'D101', 1),
(559, 'Kota Sabang', '2024-03-27', 88.89, 'D101', 1),
(560, 'Kota Lhokseumawe', '2024-03-27', 88.89, 'D101', 1),
(561, 'Kota Langsa', '2024-03-27', 88.89, 'D101', 1),
(562, 'Kota Banda Aceh', '2024-03-27', 88.89, 'D101', 1),
(563, 'Gayo Lues', '2024-03-27', 88.89, 'D101', 1),
(564, 'Bener Meriah', '2024-03-27', 88.89, 'D101', 1),
(565, 'Aceh Barat Daya', '2024-03-27', 88.89, 'D101', 1),
(566, 'Aceh Utara', '2024-03-27', 88.89, 'D101', 1),
(567, 'Aceh Timur', '2024-03-27', 88.89, 'D101', 1),
(568, 'Aceh Tenggara', '2024-03-27', 90, 'D101', 1),
(569, 'Aceh Tengah', '2024-03-27', 90, 'D101', 1),
(570, 'Aceh Tamiang', '2024-03-27', 90, 'D101', 1),
(571, 'Aceh Singkil', '2024-03-27', 90, 'D101', 1),
(572, 'Aceh Selatan', '2024-03-27', 88.89, 'D101', 1),
(573, 'Aceh Jaya', '2024-03-27', 88.89, 'D101', 1),
(574, 'Aceh Besar', '2024-03-27', 88.89, 'D101', 1),
(575, 'Simeulue', '2024-03-27', 88.89, 'D101', 1),
(576, 'Aceh Barat', '2024-03-31', 88.89, 'A11', 2),
(577, 'Bireuen', '2024-03-31', 88.89, 'A11', 2),
(578, 'Pidie Jaya', '2024-03-31', 88.89, 'A11', 2),
(579, 'Pidie', '2024-03-31', 88.89, 'A11', 2),
(580, 'Nagan Raya', '2024-03-31', 88.89, 'A11', 2),
(581, 'Kota Subulussalam', '2024-03-31', 88.89, 'A11', 2),
(582, 'Kota Sabang', '2024-03-31', 88.89, 'A11', 2),
(583, 'Kota Lhokseumawe', '2024-03-31', 88.89, 'A11', 2),
(584, 'Kota Langsa', '2024-03-31', 88.89, 'A11', 2),
(585, 'Kota Banda Aceh', '2024-03-31', 88.89, 'A11', 2),
(586, 'Gayo Lues', '2024-03-31', 88.89, 'A11', 2),
(587, 'Bener Meriah', '2024-03-31', 88.89, 'A11', 2),
(588, 'Aceh Barat Daya', '2024-03-31', 88.89, 'A11', 2),
(589, 'Aceh Utara', '2024-03-31', 88.89, 'A11', 2),
(590, 'Aceh Timur', '2024-03-31', 88.89, 'A11', 2),
(591, 'Aceh Tenggara', '2024-03-31', 88.89, 'A11', 2),
(592, 'Aceh Tengah', '2024-03-31', 88.89, 'A11', 2),
(593, 'Aceh Tamiang', '2024-03-31', 88.89, 'A11', 2),
(594, 'Aceh Singkil', '2024-03-31', 88.89, 'A11', 2),
(595, 'Aceh Selatan', '2024-03-31', 88.89, 'A11', 2),
(596, 'Aceh Jaya', '2024-03-31', 88.89, 'A11', 2),
(597, 'Aceh Besar', '2024-03-31', 88.89, 'A11', 2),
(598, 'Simeulue', '2024-03-31', 88.89, 'A11', 2),
(599, 'Aceh Barat', '2024-03-31', 88.89, 'A21', 2),
(600, 'Bireuen', '2024-03-31', 88.89, 'A21', 2),
(601, 'Pidie Jaya', '2024-03-31', 88.89, 'A21', 2),
(602, 'Pidie', '2024-03-31', 88.89, 'A21', 2),
(603, 'Nagan Raya', '2024-03-31', 88.89, 'A21', 2),
(604, 'Kota Subulussalam', '2024-03-31', 88.89, 'A21', 2),
(605, 'Kota Sabang', '2024-03-31', 88.89, 'A21', 2),
(606, 'Kota Lhokseumawe', '2024-03-31', 88.89, 'A21', 2),
(607, 'Kota Langsa', '2024-03-31', 88.89, 'A21', 2),
(608, 'Kota Banda Aceh', '2024-03-31', 88.89, 'A21', 2),
(609, 'Gayo Lues', '2024-03-31', 88.89, 'A21', 2),
(610, 'Bener Meriah', '2024-03-31', 88.89, 'A21', 2),
(611, 'Aceh Barat Daya', '2024-03-31', 88.89, 'A21', 2),
(612, 'Aceh Utara', '2024-03-31', 88.89, 'A21', 2),
(613, 'Aceh Timur', '2024-03-31', 88.89, 'A21', 2),
(614, 'Aceh Tenggara', '2024-03-31', 88.89, 'A21', 2),
(615, 'Aceh Tengah', '2024-03-31', 88.89, 'A21', 2),
(616, 'Aceh Tamiang', '2024-03-31', 88.89, 'A21', 2),
(617, 'Aceh Singkil', '2024-03-31', 88.89, 'A21', 2),
(618, 'Aceh Selatan', '2024-03-31', 88.89, 'A21', 2),
(619, 'Aceh Jaya', '2024-03-31', 88.89, 'A21', 2),
(620, 'Aceh Besar', '2024-03-31', 88.89, 'A21', 2),
(621, 'Simeulue', '2024-03-31', 88.89, 'A21', 2),
(622, 'Aceh Barat', '2024-03-31', 100, 'C72', 2),
(623, 'Bireuen', '2024-03-31', 100, 'C72', 2),
(624, 'Pidie Jaya', '2024-03-31', 100, 'C72', 2),
(625, 'Pidie', '2024-03-31', 100, 'C72', 2),
(626, 'Nagan Raya', '2024-03-31', 100, 'C72', 2),
(627, 'Kota Subulussalam', '2024-03-31', 100, 'C72', 2),
(628, 'Kota Sabang', '2024-03-31', 100, 'C72', 2),
(629, 'Kota Lhokseumawe', '2024-03-31', 100, 'C72', 2),
(630, 'Kota Langsa', '2024-03-31', 100, 'C72', 2),
(631, 'Kota Banda Aceh', '2024-03-31', 100, 'C72', 2),
(632, 'Gayo Lues', '2024-03-31', 100, 'C72', 2),
(633, 'Bener Meriah', '2024-03-31', 100, 'C72', 2),
(634, 'Aceh Barat Daya', '2024-03-31', 100, 'C72', 2),
(635, 'Aceh Utara', '2024-03-31', 100, 'C72', 2),
(636, 'Aceh Timur', '2024-03-31', 100, 'C72', 2),
(637, 'Aceh Tenggara', '2024-03-31', 100, 'C72', 2),
(638, 'Aceh Tengah', '2024-03-31', 100, 'C72', 2),
(639, 'Aceh Tamiang', '2024-03-31', 100, 'C72', 2),
(640, 'Aceh Singkil', '2024-03-31', 100, 'C72', 2),
(641, 'Aceh Selatan', '2024-03-31', 100, 'C72', 2),
(642, 'Aceh Jaya', '2024-03-31', 100, 'C72', 2),
(643, 'Aceh Besar', '2024-03-31', 100, 'C72', 2),
(644, 'Simeulue', '2024-03-31', 100, 'C72', 2),
(645, 'Aceh Barat', '2024-03-31', 100, 'A11', 3),
(646, 'Bireuen', '2024-03-31', 100, 'A11', 3),
(647, 'Pidie Jaya', '2024-03-31', 100, 'A11', 3),
(648, 'Pidie', '2024-03-31', 100, 'A11', 3),
(649, 'Nagan Raya', '2024-03-31', 100, 'A11', 3),
(650, 'Kota Subulussalam', '2024-03-31', 100, 'A11', 3),
(651, 'Kota Sabang', '2024-03-31', 100, 'A11', 3),
(652, 'Kota Lhokseumawe', '2024-03-31', 100, 'A11', 3),
(653, 'Kota Langsa', '2024-03-31', 100, 'A11', 3),
(654, 'Kota Banda Aceh', '2024-03-31', 100, 'A11', 3),
(655, 'Gayo Lues', '2024-03-31', 100, 'A11', 3),
(656, 'Bener Meriah', '2024-03-31', 100, 'A11', 3),
(657, 'Aceh Barat Daya', '2024-03-31', 100, 'A11', 3),
(658, 'Aceh Utara', '2024-03-31', 100, 'A11', 3),
(659, 'Aceh Timur', '2024-03-31', 100, 'A11', 3),
(660, 'Aceh Tenggara', '2024-03-31', 100, 'A11', 3),
(661, 'Aceh Tengah', '2024-03-31', 100, 'A11', 3),
(662, 'Aceh Tamiang', '2024-03-31', 100, 'A11', 3),
(663, 'Aceh Singkil', '2024-03-31', 100, 'A11', 3),
(664, 'Aceh Selatan', '2024-03-31', 100, 'A11', 3),
(665, 'Aceh Jaya', '2024-03-31', 100, 'A11', 3),
(666, 'Aceh Besar', '2024-03-31', 100, 'A11', 3),
(667, 'Simeulue', '2024-03-31', 100, 'A11', 3),
(668, 'Aceh Barat', '2024-03-31', 100, 'A21', 3),
(669, 'Bireuen', '2024-03-31', 100, 'A21', 3),
(670, 'Pidie Jaya', '2024-03-31', 100, 'A21', 3),
(671, 'Pidie', '2024-03-31', 100, 'A21', 3),
(672, 'Nagan Raya', '2024-03-31', 100, 'A21', 3),
(673, 'Kota Subulussalam', '2024-03-31', 100, 'A21', 3),
(674, 'Kota Sabang', '2024-03-31', 100, 'A21', 3),
(675, 'Kota Lhokseumawe', '2024-03-31', 100, 'A21', 3),
(676, 'Kota Langsa', '2024-03-31', 100, 'A21', 3),
(677, 'Kota Banda Aceh', '2024-03-31', 100, 'A21', 3),
(678, 'Gayo Lues', '2024-03-31', 100, 'A21', 3),
(679, 'Bener Meriah', '2024-03-31', 100, 'A21', 3),
(680, 'Aceh Barat Daya', '2024-03-31', 100, 'A21', 3),
(681, 'Aceh Utara', '2024-03-31', 100, 'A21', 3),
(682, 'Aceh Timur', '2024-03-31', 100, 'A21', 3),
(683, 'Aceh Tenggara', '2024-03-31', 100, 'A21', 3),
(684, 'Aceh Tengah', '2024-03-31', 100, 'A21', 3),
(685, 'Aceh Tamiang', '2024-03-31', 100, 'A21', 3),
(686, 'Aceh Singkil', '2024-03-31', 100, 'A21', 3),
(687, 'Aceh Selatan', '2024-03-31', 100, 'A21', 3),
(688, 'Aceh Jaya', '2024-03-31', 100, 'A21', 3),
(689, 'Aceh Besar', '2024-03-31', 100, 'A21', 3),
(690, 'Simeulue', '2024-03-31', 100, 'A21', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `polres`
--

CREATE TABLE `polres` (
  `nama` varchar(158) NOT NULL,
  `lokasi` varchar(158) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(4, 'admin', '$2y$10$KfroUfCRTIo0r8do5HBMt.KM.g.oCb.ilCxCy1k0jI4R3Z9KHdfTK', '_mrizky', 'Aceh Besar', 'Komandan', '384-spiderman.jpg'),
(5, 'user', '$2y$10$2/mxOR8f4yVw0wtCb/5DOeMYL65hWgpSgY/t5fsTLJQKNL4dO7XXS', 'dark', 'Aceh Besar', 'Komandan', 'profil.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`pg`);

--
-- Indeks untuk tabel `laporan_polda`
--
ALTER TABLE `laporan_polda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_polres`
--
ALTER TABLE `laporan_polres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persentase_polres`
--
ALTER TABLE `persentase_polres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `polres`
--
ALTER TABLE `polres`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_polda`
--
ALTER TABLE `laporan_polda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_polres`
--
ALTER TABLE `laporan_polres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `persentase_polres`
--
ALTER TABLE `persentase_polres`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=691;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
