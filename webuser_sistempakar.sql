-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 07 Nov 2018 pada 11.00
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('GJL01', 'Gangguan pernapasan'),
('GJL02', 'Jengger dan Pial berwarna kemerahan sampai kebiruan'),
('GJL03', 'Penurunan produksi telur'),
('GJL04', 'Diare'),
('GJL05', 'Kelumpuhan'),
('GJL06', 'Bercak darah pada kaki'),
('GJL07', 'Menyebabkan kematian'),
('GJL08', 'Kematian Mendadak'),
('GJL09', 'Angka kematian yang tinggi'),
('GJL10', 'Diare berwarna hijau'),
('GJL11', 'Kelemahan/Malas Bergerak'),
('GJL12', 'Kehilangan nafsu makan'),
('GJL13', 'Kehilangan nafsu minum'),
('GJL14', 'Batuk'),
('GJL15', 'Bulu Berdiri'),
('GJL16', 'Keluarnya leleran dari hidung'),
('GJL17', 'Keluarnya leleran yang bercampur darah dari hidung dan mulut'),
('GJL18', 'Mata Berair'),
('GJL19', 'Mengantuk'),
('GJL20', 'Munculnya lesi pada daerah yang tidak di tumbuhi bulu'),
('GJL21', 'Pembengkakan dari sinus dan mata'),
('GJL22', 'Warna bulu kusam'),
('GJL23', 'Konjungtiva kemerahan'),
('GJL24', 'Bengkak pada kelenjar air mata'),
('GJL25', 'Ayam cenderung menggaruk bagian muka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejalaPenyakit`
--

CREATE TABLE `tb_gejalaPenyakit` (
  `kodePenyakit` varchar(10) NOT NULL,
  `kodeGejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejalaPenyakit`
--

INSERT INTO `tb_gejalaPenyakit` (`kodePenyakit`, `kodeGejala`) VALUES
('P1', 'GJL01'),
('P1', 'GJL02'),
('P1', 'GJL03'),
('P1', 'GJL04'),
('P1', 'GJL05'),
('P1', 'GJL06'),
('P1', 'GJL07'),
('P1', 'GJL08'),
('P1', 'GJL09'),
('P2', 'GJL01'),
('P2', 'GJL03'),
('P2', 'GJL07'),
('P2', 'GJL09'),
('P2', 'GJL10'),
('P2', 'GJL11'),
('P2', 'GJL12'),
('P2', 'GJL13'),
('P3', 'GJL01'),
('P3', 'GJL03'),
('P3', 'GJL11'),
('P3', 'GJL14'),
('P3', 'GJL15'),
('P3', 'GJL16'),
('P4', 'GJL01'),
('P4', 'GJL03'),
('P4', 'GJL14'),
('P4', 'GJL17'),
('P4', 'GJL18'),
('P4', 'GJL19'),
('P5', 'GJL01'),
('P5', 'GJL20'),
('P5', 'GJL21'),
('P6', 'GJL04'),
('P6', 'GJL07'),
('P6', 'GJL11'),
('P6', 'GJL13'),
('P6', 'GJL15'),
('P6', 'GJL22'),
('P7', 'GJL01'),
('P7', 'GJL03'),
('P7', 'GJL23'),
('P7', 'GJL24'),
('P7', 'GJL25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pakar`
--

CREATE TABLE `tb_pakar` (
  `id` int(11) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `nomorHp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pakar`
--

INSERT INTO `tb_pakar` (`id`, `namaDepan`, `namaBelakang`, `nomorHp`, `email`, `password`) VALUES
(1, 'Agung', 'Febriyanto', '085729349718', 'admin@sistempakar.com', '$2y$10$aA6OPZvgG2EZaoo6mPHekeTc.tAnJMpaTeJLoeEafg.XCCoNBfQI2');

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
('PCG01', 'Dianjurkan untuk dimusnahkan'),
('PCG02', 'Melaksanakan bio security secara ketat'),
('PCG03', 'Melakukan sanitasi dan Desinfeksi'),
('PCG04', 'Memberikan multivitamin'),
('PCG05', 'Memberikan Vaksin'),
('PCG06', 'Memberikan vaksin SOTASEC'),
('PCG07', 'Memberikan Vaksin AVABRON HN-63'),
('PCG08', 'Memberikan Vaksin LT-IVAX'),
('PCG09', 'Memberikan Vaksin AVAPOX'),
('PCG10', 'Memberikan Vaksin BURSIMUNE atau BIOGUMBORO'),
('PCG11', 'Memberikan Vaksin AVIFFA – RTI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pencegahanPenyakit`
--

CREATE TABLE `tb_pencegahanPenyakit` (
  `kodePenyakit` varchar(10) NOT NULL,
  `kodePencegahan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pencegahanPenyakit`
--

INSERT INTO `tb_pencegahanPenyakit` (`kodePenyakit`, `kodePencegahan`) VALUES
('P1', 'PCG01'),
('P1', 'PCG02'),
('P1', 'PCG03'),
('P1', 'PCG04'),
('P1', 'PCG05'),
('P2', 'PCG01'),
('P2', 'PCG03'),
('P2', 'PCG04'),
('P2', 'PCG05'),
('P2', 'PCG06'),
('P3', 'PCG03'),
('P3', 'PCG04'),
('P3', 'PCG05'),
('P3', 'PCG07'),
('P4', 'PCG03'),
('P4', 'PCG04'),
('P4', 'PCG05'),
('P4', 'PCG08'),
('P5', 'PCG03'),
('P5', 'PCG04'),
('P5', 'PCG05'),
('P5', 'PCG09'),
('P6', 'PCG03'),
('P6', 'PCG04'),
('P6', 'PCG05'),
('P6', 'PCG10'),
('P7', 'PCG03'),
('P7', 'PCG04'),
('P7', 'PCG05'),
('P7', 'PCG11');

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
('P1', 'Avian Influenza (Flu Burung)', 'Avian Influenza (AI) atau flu burung adalah penyakit yang disebabkan oleh virus influenza tipe A. Virus influenza tipe A dapat berubah-ubah bentuk (Drift, Shift), dan dapat menyebabkan epidemi dan pandemi. Virus influenza tipe A terdiri dari Hemaglutinase (H) dan Neuroamidase (N), kedua huruf ini digunakan sebagai identifikasi kode subtipe flu burung yang banyak jenisnya. Ini merupakan virus yang paling berbahaya, karena bersifat zoonosis (menyerang manusia). Avian Influenza dapat memberikan dampak kerugian ekonomik yang cukup tinggi dalam industri perunggasan.'),
('P2', 'Newcastle disease (ND)', 'Newcastle disease (ND) merupakan suatu penyakit pernapasan dan sistemik, yang bersifat akut dan mudah sekali menular, yang disebabkan oleh virus Avian Paramyxovirus dan menyerang berbagai jenis unggas, terutama ayam. Newcastle disease merupakan suatu penyakit yang bersifat kompleks oleh karena isolat dan strain virus yang berbeda dapat menimbulkan variasi yang besar dalam derajat keparahan dari penyakit. Newcastle disease dapat memberikan dampak kerugian ekonomik yang cukup tinggi dalam industri perunggasan. Gejala yang dialami pada ayam yaitu gangguan pernapasan, diare berwarna hijau, kelemahan, kehilangan nafsu makan, kehilangan nafsu minum, penurunan produksi telur, dapat menyebabkan kematian dan angka kematian yang tinggi.'),
('P3', 'Infectius Bronchitis (IB)', 'Infectius Bronchitis (IB) merupakan penyakit yang menyerang saluran pernapasan ayam yang bersifat akut dan sangat mudah menular. Penyakit ini disebabkan oleh adanya cairan dalam trakea. Dan disebabkan oleh virus yang tergolong single stranded RNA, famili coronividae dan genus coronavirus.'),
('P4', 'Infectius Laryngotracheitis (ILT,LT)', 'Infectius Laryngotracheitis (ILT,LT) merupakan suatu penyakit viral pada ayam yang bersifat akut maupun ringan, yang tersifat adanya kesulitan bernapas dan adanya eksudat bercampur darah yang berasal dari trakea dan keluar melalui hidung ataupun mulut. Dan disebabkan oleh herpesvirus group A yang termasuk famili Hervesviridae, subfamili Alphahervesvirinae.'),
('P5', 'Fowl Pox (Cacar Unggas)', 'Fowl Pox (cacar unggas) merupakan penyakit viral pada unggas peliharan, yang tersifat oleh adanya lesi berbentuk nodular, yang bersifat proliferatif dan menyebar pada kulit dari bagian tubuh yang tidak ditumbuhi oleh bulu. Disebakan oleh virus pox serta dan banyak dijumpai pada daerah yang terdapat insekta penghisap darah, misalnya nyamuk serta tempat berkembang biaknya seperti rawa-rawa (Tabbu, 2002).'),
('P6', 'Infectious Bursal Disease (IBD)', 'Infectious Bursal Disease (IBD) atau Gumboro merupakan penyakit yang bersifat akut dan sangat mudah menular. Penyakit ini merusak berbagai organ limfoid, sehingga ayam yang terserang akan lebih peka terhadap berbagai penyakit. Disebabkan oleh virus yang tergolong genus Birnavirus dan famili Birnaviridae.'),
('P7', 'Swollen Head Syndrome (SHS)', 'Swollen Head Syndrome (SHS) merupakan penyakit yang disebabkan oleh virus Avian Pneumovirus yang menyebabkan nekrosis dan pendarahan pada saluran pernapasan bagian atas serta menyebabkan kebengkakan di daerah kepala.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `tb_pakar`
--
ALTER TABLE `tb_pakar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_pencegahan`
--
ALTER TABLE `tb_pencegahan`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pakar`
--
ALTER TABLE `tb_pakar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
