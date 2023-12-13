-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 16.03
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkmoora`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(25) NOT NULL,
  `nama_alternatif` varchar(80) NOT NULL,
  `c1` varchar(25) NOT NULL,
  `c2` varchar(25) NOT NULL,
  `c3` varchar(25) NOT NULL,
  `c4` varchar(25) NOT NULL,
  `c5` varchar(25) NOT NULL,
  `c6` varchar(25) NOT NULL,
  `c7` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`) VALUES
('01', 'A1', '1.000', '1.000', '0.000', '1.000', '0.100', '0.100', '1.000'),
('02', 'A2', '0.789', '0.000', '0.000', '1.000', '0.978', '0.897', '1.000'),
('03', 'A3', '0.565', '1.000', '0.000', '1.000', '0.432', '0.100', '0.000'),
('04', 'A4', '0.789', '0.000', '1.000', '0.000', '0.735', '0.100', '1.000'),
('05', 'A5', '0.565', '0.000', '0.000', '1.000 ', '0.978', '0.899', '0.000'),
('06', 'A6', '0.487', '0.000 ', '0.589', '1.000', '0.100', '0.100 ', '1.000'),
('07', 'A7', '0.685', '1.000', '0.000', '0.000', '0.978', '0.908', '1.000'),
('08', 'A8', '0.487', '0.000 ', '1.000', '0.000', '0.978', '1.000', '0.000'),
('09', 'A9', '0.200', '1.000', '0.000', '1.000', '0.978', '0.897', '1.000'),
('10', 'A10', '0.300', '0.000', '0.589', '1.000', '0.432', '0.100', '1.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `kode`, `tanggal`) VALUES
(8, 'k002', '25 - Aug - 2021 | 18 : 47 : 49'),
(11, 'k005', '25 - Aug - 2021 | 23 : 06 : 55'),
(12, 'k006', '11 - Oct - 2021 | 15 : 36 : 17'),
(18, 'k007', '09 - Dec - 2023 | 20 : 01 : 15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(80) NOT NULL,
  `bobot` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `type`) VALUES
(1, 'Anggota RT', '0.200', 'Benefit'),
(2, 'Anggota RT balita dan anak sekolah', '0.200', 'Benefit'),
(3, 'Status ', '0.150', 'Benefit'),
(4, 'Tanggungan Lansia', '0.150', 'Benefit'),
(5, 'Tempat Tinggal ', '0.100', 'Benefit'),
(6, 'Pendapatan', '0.100', 'Cost'),
(7, 'Status PKH', '0.100', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kode_hasil` varchar(20) NOT NULL,
  `id_alternatif` varchar(25) NOT NULL,
  `nama_alternatif` varchar(80) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `kode_hasil`, `id_alternatif`, `nama_alternatif`, `total`) VALUES
(30, 'k002', '89003417', 'Lotto Flash', '0.1816'),
(31, 'k002', '89007475', 'Piero Royale', '0.2375'),
(32, 'k002', '89007659', 'Yonex 777', '0.2099'),
(33, 'k002', '89008545', 'Li-Ning Attack', '0.1851'),
(34, 'k002', '89008634', 'Ortuseight Wavez', '0.2965'),
(40, 'k005', '89008545', 'Li-Ning Attack', '0.2543'),
(41, 'k005', '89008634', 'Ortuseight Wavez', '0.4328'),
(42, 'k006', '89003417', 'Lotto Flash', '0.1816'),
(43, 'k006', '89007475', 'Piero Royale', '0.2375'),
(44, 'k006', '89007659', 'Yonex 777', '0.2099'),
(45, 'k006', '89008545', 'Li-Ning Attack', '0.1851'),
(46, 'k006', '89008634', 'Ortuseight Wavez', '0.2965'),
(66, 'k007', '01', 'A1', '0.2944'),
(67, 'k007', '02', 'A2', '0.1714'),
(68, 'k007', '03', 'A3', '0.2267'),
(69, 'k007', '04', 'A4', '0.2344'),
(70, 'k007', '05', 'A5', '0.111'),
(71, 'k007', '06', 'A6', '0.1966'),
(72, 'k007', '07', 'A7', '0.2037'),
(73, 'k007', '08', 'A8', '0.133'),
(74, 'k007', '09', 'A9', '0.2122'),
(75, 'k007', '10', 'A10', '0.1917');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
