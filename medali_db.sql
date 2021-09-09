-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2021 pada 08.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medali_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabor_data`
--

CREATE TABLE `cabor_data` (
  `cabor_id` int(11) NOT NULL,
  `cabor_nama` varchar(20) NOT NULL,
  `cabor_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabor_data`
--

INSERT INTO `cabor_data` (`cabor_id`, `cabor_nama`, `cabor_ket`) VALUES
(1, 'Karate', 'aodsd'),
(2, 'Atletik', 'mantap'),
(5, 'Renang', 'p'),
(6, 'Dayung', 'q'),
(7, 'Anggar', 'w');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_data`
--

CREATE TABLE `event_data` (
  `event_id` int(11) NOT NULL,
  `event_nama` varchar(20) NOT NULL,
  `cabor_id` int(20) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_data`
--

INSERT INTO `event_data` (`event_id`, `event_nama`, `cabor_id`, `event_start`, `event_end`) VALUES
(7, 'lari 100 m putra', 2, '2021-08-26', '2022-08-28'),
(9, 'lari 100 m putri', 2, '2021-08-27', '2021-08-29'),
(10, 'lempar lembing putra', 2, '2021-08-26', '2021-09-01'),
(11, 'komite 60kg putra', 1, '2021-08-27', '2021-08-30'),
(12, 'Lempar Lembing Putri', 2, '2021-08-26', '2021-08-29'),
(13, 'kata putra', 1, '2021-08-27', '2021-09-01'),
(16, 'renang 10m', 5, '2021-09-01', '2021-09-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontingen_data`
--

CREATE TABLE `kontingen_data` (
  `kontingen_id` int(11) NOT NULL,
  `kontingen_nama` varchar(15) NOT NULL,
  `kontingen_manajer` varchar(15) NOT NULL,
  `kontingen_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontingen_data`
--

INSERT INTO `kontingen_data` (`kontingen_id`, `kontingen_nama`, `kontingen_manajer`, `kontingen_ket`) VALUES
(4, 'Lempangan', 'Lali', 'Indonesia'),
(5, 'Bulukumba', 'Sasa', 'Ayo main'),
(6, 'Makassar', 'Wahyu', 'Asilole'),
(7, 'Sinjai', 'Nini', 'apapi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_data`
--

CREATE TABLE `lokasi_data` (
  `lokasi_id` int(11) NOT NULL,
  `lokasi_nama` text NOT NULL,
  `lokasi_long` double NOT NULL,
  `lokasi_lat` double NOT NULL,
  `cabor_id` int(11) DEFAULT NULL,
  `kontingen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi_data`
--

INSERT INTO `lokasi_data` (`lokasi_id`, `lokasi_nama`, `lokasi_long`, `lokasi_lat`, `cabor_id`, `kontingen_id`) VALUES
(4, '', -5, 100, 1, 7),
(5, '', 0, 0, 1, 5),
(6, '', 0, 0, 1, 5),
(7, 'gedung olahraga sinjai', -5, 100, 7, NULL),
(8, '', 0, 0, 7, NULL),
(9, 'rumahku', -5.281002, 20.119298, 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `medali_data`
--

CREATE TABLE `medali_data` (
  `id` int(11) NOT NULL,
  `medali_id` varchar(20) NOT NULL,
  `kontingen_id` varchar(20) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `nama_atlet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medali_data`
--

INSERT INTO `medali_data` (`id`, `medali_id`, `kontingen_id`, `event_id`, `nama_atlet`) VALUES
(8, '3', '6', '9', ''),
(23, '', '', '', ''),
(26, '1', '5', '', ''),
(30, '1', '5', '13', ''),
(49, '1', '4', '10', ''),
(51, '3', '5', '12', ''),
(52, '1', '4', '12', ''),
(53, '2', '6', '12', ''),
(65, '2', '5', '7', 'Wahyu'),
(67, '3', '7', '7', 'Wahyu'),
(70, '1', '4', '7', 'Wahyu'),
(71, '2', '4', '9', 'Wahyu'),
(72, '1', '5', '9', 'piidah'),
(73, '3', '4', '13', 'Wahyu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medali_ref`
--

CREATE TABLE `medali_ref` (
  `medali_id` int(11) NOT NULL,
  `medali_nama` varchar(25) NOT NULL,
  `medali_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medali_ref`
--

INSERT INTO `medali_ref` (`medali_id`, `medali_nama`, `medali_img`) VALUES
(1, 'Emas', '#FFD700'),
(2, 'Perak', '#C0C0C0'),
(3, 'Perunggu', '#cd7f32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `waktu_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `waktu_buat`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$vPBV3fwszW.dGQPZT8KDju.qH7yaUWYM9nJLQmyWHjE3XVUKaEGwq', 1, 1, 1630881455),
(9, 'kominfo', 'kominfo@gmail.com', '$2y$10$HzIxavXx.WWAYI19X0xy6u1nLdA9qj2gg8qk2tsvamKknltoUSw8q', 2, 1, 1630892492),
(23, 'fidah', 'naziahmufidah@gmail.com', '$2y$10$GKP.JzhJPaLQG9FPPAyhdOsti27SjySimzuKmin2guDhjfv0zqw9C', 2, 1, 1630985129),
(25, 'devi', 'dhevilestari942@gmail.com', '$2y$10$.0lW0UOubRqI4bs6IzZbNeHhs.IEY327H.zLTl/3tWAZZWuwSVjk6', 2, 0, 1630985356),
(29, 'p.cedi', 'cedirusyaid@gmail.com', '$2y$10$DpO43O.CcpfZL/ZRODyVUO0DXxIBIAfUGZ7CY4.87UsMkS62CsrKi', 2, 0, 1630997629),
(32, 'wahyu', 'wm337708@gmail.com', '$2y$10$lMFY9iTZJo2CrJE5dUMPXOtdKLsbzIdLLAnbix49XzpD.Y1x5V4hK', 2, 1, 1631166408);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_token`) VALUES
(14, 'dhevilestari942@gmail.com', 'Naj08td61bRNYrFDVW94hVWDkkP0bTfAc2IAcGKqBFc=', 1630985356),
(18, 'cedirusyaid@gmail.com', 'A1rjukiSsXq3TjWNnfCdDROzro+J3hjMue/PmnySfYs=', 1630997629),
(28, 'naziahmufidah@gmail.com', '7ITRFBsyhXwwuFnRXrSpnfN9ZXtqGyPHVz3CEzDeUc4=', 1631074098);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabor_data`
--
ALTER TABLE `cabor_data`
  ADD PRIMARY KEY (`cabor_id`);

--
-- Indeks untuk tabel `event_data`
--
ALTER TABLE `event_data`
  ADD PRIMARY KEY (`event_id`);

--
-- Indeks untuk tabel `kontingen_data`
--
ALTER TABLE `kontingen_data`
  ADD PRIMARY KEY (`kontingen_id`);

--
-- Indeks untuk tabel `lokasi_data`
--
ALTER TABLE `lokasi_data`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indeks untuk tabel `medali_data`
--
ALTER TABLE `medali_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medali_ref`
--
ALTER TABLE `medali_ref`
  ADD UNIQUE KEY `medali_id` (`medali_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabor_data`
--
ALTER TABLE `cabor_data`
  MODIFY `cabor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `event_data`
--
ALTER TABLE `event_data`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kontingen_data`
--
ALTER TABLE `kontingen_data`
  MODIFY `kontingen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lokasi_data`
--
ALTER TABLE `lokasi_data`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `medali_data`
--
ALTER TABLE `medali_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `medali_ref`
--
ALTER TABLE `medali_ref`
  MODIFY `medali_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
