-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2021 pada 01.52
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webuser_sistempakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `kode` varchar(6) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`kode`, `keterangan`) VALUES
('GJL01', 'Kesulitan bernapas'),
('GJL02', 'Ngorok'),
('GJL03', 'Lesu'),
('GJL04', 'Lemah'),
('GJL05', 'Bulu Kusam'),
('GJL06', 'Nafsu makan menurun'),
('GJL07', 'Ayam berputar-putar'),
('GJL08', 'Jengger & pial kebiruan'),
('GJL09', 'Kurus & bobot menurun'),
('GJL10', 'Berak bercampur darah'),
('GJL11', 'Mata berair'),
('GJL12', 'Berak berwarna putih'),
('GJL13', 'Keluar cairan dari hidung'),
('GJL14', 'Pincang'),
('GJL15', 'Kelumpuhan'),
('GJL16', 'Kelopak mata lengket'),
('GJL17', 'Ayam selalu gelisah'),
('GJL18', 'Penurunan produksi telur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejalapenyakit`
--

CREATE TABLE `tb_gejalapenyakit` (
  `kodePenyakit` varchar(10) NOT NULL,
  `kodeGejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejalapenyakit`
--

INSERT INTO `tb_gejalapenyakit` (`kodePenyakit`, `kodeGejala`) VALUES
('P1', 'GJL01'),
('P1', 'GJL02'),
('P1', 'GJL03'),
('P1', 'GJL04'),
('P1', 'GJL05'),
('P1', 'GJL06'),
('P1', 'GJL07'),
('P1', 'GJL08'),
('P2', 'GJL03'),
('P2', 'GJL04'),
('P2', 'GJL05'),
('P2', 'GJL06'),
('P2', 'GJL09'),
('P3', 'GJL03'),
('P3', 'GJL04'),
('P3', 'GJL05'),
('P3', 'GJL06'),
('P3', 'GJL09'),
('P3', 'GJL10'),
('P4', 'GJL03'),
('P4', 'GJL04'),
('P4', 'GJL05'),
('P4', 'GJL06'),
('P4', 'GJL11'),
('P5', 'GJL03'),
('P5', 'GJL04'),
('P5', 'GJL05'),
('P5', 'GJL06'),
('P5', 'GJL09'),
('P5', 'GJL12'),
('P5', 'GJL13'),
('P6', 'GJL06'),
('P6', 'GJL09'),
('P6', 'GJL14'),
('P6', 'GJL15'),
('P7', 'GJL06'),
('P7', 'GJL09'),
('P7', 'GJL13'),
('P7', 'GJL16'),
('P7', 'GJL17'),
('P7', 'GJL18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pencegahan`
--

CREATE TABLE `tb_pencegahan` (
  `kode` varchar(6) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pencegahan`
--

INSERT INTO `tb_pencegahan` (`kode`, `keterangan`) VALUES
('PCG01', 'sanitasi kandang'),
('PCG02', 'vaksinasi ND secara berkala'),
('PCG03', 'jauhkan ayam yang sakit dengan kelompok yang sehat'),
('PCG04', 'hindari kontak langsung dengan ayam yang sehat'),
('PCG05', 'memberikan suplemen kalsium'),
('PCG06', 'pemberian vitamin B complex dalam pakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pencegahanpenyakit`
--

CREATE TABLE `tb_pencegahanpenyakit` (
  `kodePenyakit` varchar(10) NOT NULL,
  `kodePencegahan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pencegahanpenyakit`
--

INSERT INTO `tb_pencegahanpenyakit` (`kodePenyakit`, `kodePencegahan`) VALUES
('P1', 'PCG01'),
('P1', 'PCG02'),
('P2', 'PCG01'),
('P3', 'PCG01'),
('P3', 'PCG03'),
('P4', 'PCG01'),
('P4', 'PCG04'),
('P5', 'PCG01'),
('P5', 'PCG03'),
('P6', 'PCG01'),
('P6', 'PCG05'),
('P6', 'PCG06'),
('P7', 'PCG01'),
('P7', 'PCG03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `kode` varchar(5) NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`kode`, `nama`, `keterangan`) VALUES
('P1', 'Penyakit Tetelo (Newcastle Disease)', ''),
('P2', 'Penyakit Cacing', ''),
('P3', 'Penyakit Berak Darah (Coccsidiosis)', ''),
('P4', 'Penyakit Mata (Oxypiurasis)', ''),
('P5', 'Penyakit Berak putih (Pullorum)', ''),
('P6', 'Penyakit Bengkak persendian tulang kaki', ''),
('P7', 'Penyakit Pilek (Snot)', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tb_pencegahan`
--
ALTER TABLE `tb_pencegahan`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD UNIQUE KEY `kode` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
