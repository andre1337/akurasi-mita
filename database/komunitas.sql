-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 02:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komunitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif',
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`, `level`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif', 'admin'),
('ADM03', 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif', 'komunitas'),
('ADM01', 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Aktif', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_campaign`
--

CREATE TABLE `tb_campaign` (
  `id_campaign` varchar(10) NOT NULL,
  `judul_campaign` varchar(20) NOT NULL,
  `id_komunitas` varchar(10) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_campaign`
--

INSERT INTO `tb_campaign` (`id_campaign`, `judul_campaign`, `id_komunitas`, `uraian`, `gambar`, `status`, `keterangan`) VALUES
('ADM01', 'Awesome site templat', '2', 'Highlight a specific dropdown item with the .active class (adds a blue background color).\r\n\r\nTo disable an item in the dropdown menu, use the .disabled class (gets a light-grey text color and a \"no-pa', 'flag-pins-japan-indonesia.jpg', 'Aktif', '-'),
('CPG1907001', 'Besok Phuu', 'KOM1907003', 'Web Volunteer ini di buat agar masyarakat dapat melihat informasi kegiatan-kegiatan amal dengan mudah.\r\n\r\ndan memudahkan komunitas dalam mempromosikan dan merekrut calon anggota organisasi baru mereka', 'avatar.jpg', 'Aktif', '-'),
('CPG1907002', 'Hutan Merdeka', 'KOM1907008', '#HutanMerdeka with LindungiHutan.com\r\n\r\n       Apa yang lebih mengerikan dari menjarah? Mengambil sumberdaya hutan tanpa tanggungjawab? Yang lebih mengerikan adalah tidak mengambil peran. Penjarahan i', 'hutanmerdeka.jpeg', 'Aktif', 'untuk memperingati h'),
('CPG1907003', 'Pendidikan Untuk RPT', 'KOM1907007', 'Sebuah kegiatan untuk memberi pengetahuan ilmu-ilmu dasar untuk anak-anak di RPTRA gondangdia', 'rptra.jpg', 'Aktif', '-'),
('CPG1907004', 'Mengajar Di RPTRA Go', 'KOM1907009', 'Mengajar anak-anak dari usia  5-12 tahun di RPTRA Gondangdia bersama para relawan MEJIKUHIBINIU. Para pengajar kami berasal dari beragam latar belakang ras, agama, jenis kelamin dan profesi yang menja', 'mejiku1.jpg', 'Aktif', '-'),
('CPG1907005', 'Activities Campaign', 'KOM1907007', 'Kota Tua Jakarta', 'wmi.jpg', 'Aktif', '-'),
('CPG1907006', 'Berbagi di Kampung L', 'KOM1907007', '1. Penyuluhan Pendidikan.\r\n2. Belajar bersama anak-anak kampung Leuwimalang\r\n3. Bazar baju murah untuk warga.\r\n\r\nWarga sangat antusias mengikuti acara ini.', 'Untitled-2.jpg', 'Aktif', '\r\nWarga sangat antus'),
('CPG1907007', 'Rawat Bumi', 'KOM1907008', 'Untuk memperingati hari Bumi ', 'GUON8947.JPG', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datauji`
--

CREATE TABLE `tb_datauji` (
  `id_datauji` int(10) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` int(3) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL,
  `k6` varchar(20) NOT NULL,
  `k7` varchar(20) NOT NULL,
  `k8` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tk2` int(3) NOT NULL,
  `tk6` int(3) NOT NULL,
  `tk7` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datauji`
--

INSERT INTO `tb_datauji` (`id_datauji`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `kategori`, `tk2`, `tk6`, `tk7`) VALUES
(1, 'L', 23, 'olahraga', 'damai', 'tidak ada', '3', 'IPA', 'tidak ada', 'Pendidikan', 2, 2, 'IPA'),
(2, 'P', 23, 'membaca', 'optimis', 'ada', '3', 'Pendidikan', 'tidak ada', 'Pendidikan', 2, 2, 'IPS'),
(3, 'P', 21, 'olahraga', 'damai', 'ada', '2', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, ''),
(4, 'L', 22, 'traveling', 'damai', 'ada', '1', 'sastra & ilmu budaya', 'tidak ada', 'Budaya', 2, 1, 'Seni dan Budaya'),
(5, 'P', 21, 'membaca', 'optimis', 'ada', '1', 'Pendidikan', 'tidak ada', 'Pendidikan', 2, 1, 'IPS'),
(6, 'P', 22, 'olahraga', 'damai', 'ada', '2', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, ''),
(7, 'P', 19, 'olahraga', 'optimis', 'ada', '3', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, ''),
(8, 'P', 19, 'membaca', 'optimis', 'ada', '2', 'Pendidikan', 'tidak ada', 'Pendidikan', 2, 2, 'IPS'),
(9, 'P', 20, 'olahraga', 'damai', 'ada', '1', 'Kesehatan', 'ada', 'Kesehatan', 2, 1, ''),
(10, 'P', 21, 'traveling', 'leadership', 'ada', '2', 'sastra & ilmu budaya', 'tidak ada', 'Kesehatan', 2, 2, ''),
(11, 'L', 28, 'olahraga', 'optimis', 'ada', '2', 'Kesehatan', 'tidak ada', 'Kesehatan', 3, 2, ''),
(12, 'P', 22, 'naik gunung', 'leadership', 'ada', '3', 'Teknik', 'tidak ada', 'Lingkungan', 2, 2, ''),
(13, 'P', 23, 'naik gunung', 'optimis', 'ada', '4', 'Teknik', 'tidak ada', 'Budaya', 2, 3, 'IPA'),
(14, 'L', 19, 'olahraga', 'damai', 'ada', '3', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, ''),
(15, 'L', 23, 'traveling', 'optimis', 'ada', '1', 'sastra & ilmu budaya', 'tidak ada', 'Budaya', 2, 1, 'Seni dan Budaya'),
(16, 'L', 27, 'naik gunung', 'leadership', 'ada', '3', 'Profesi & Ilmu Terap', 'ada', 'Lingkungan', 3, 2, ''),
(17, 'P', 21, 'membaca', 'optimis', 'ada', '2', 'Pendidikan', 'tidak ada', 'Budaya', 2, 2, 'IPS'),
(18, 'L', 25, 'olahraga', 'damai', 'ada', '2', 'sosial & humaniora', 'tidak ada', 'Kesehatan', 3, 2, ''),
(19, 'P', 22, 'traveling', 'optimis', 'ada', '3', 'sastra & ilmu budaya', 'ada', 'Budaya', 2, 2, 'Seni dan Budaya'),
(20, 'P', 23, 'olahraga', 'optimis', 'ada', '4', 'Pendidikan', 'tidak ada', 'Pendidikan', 2, 3, 'IPS'),
(21, 'P', 19, 'naik gunung', 'leadership', 'ada', '2', 'Pendidikan', 'ada', 'Lingkungan', 2, 2, 'IPS'),
(22, 'L', 19, 'olahraga', 'leadership', 'ada', '3', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, 'IPA'),
(23, 'L', 20, 'olahraga', 'damai', 'ada', '2', 'Kesehatan', 'ada', 'Kesehatan', 2, 2, 'IPA'),
(24, 'P', 21, 'naik gunung', 'damai', 'ada', '2', 'Teknik', 'tidak ada', 'Budaya', 2, 2, 'IPA'),
(25, 'L', 20, 'membaca', 'optimis', 'ada', '2', 'Pendidikan', 'ada', 'Pendidikan', 2, 2, 'IPS'),
(26, 'P', 20, 'membaca', 'optimis', 'ada', '3', 'sastra & ilmu budaya', 'ada', 'Lingkungan', 2, 2, 'Seni dan Budaya'),
(27, 'P', 24, 'olahraga', 'optimis', 'tidak ada', '1', 'IPA', 'tidak ada', 'Kesehatan', 2, 1, 'IPA'),
(28, 'P', 23, 'naik gunung', 'leadership', 'ada', '1', 'Teknik', 'tidak ada', 'Lingkungan', 2, 1, 'IPA'),
(29, 'P', 22, 'naik gunung', 'leadership', 'ada', '1', 'MIPA', 'tidak ada', 'Lingkungan', 2, 1, 'IPA'),
(30, 'P', 21, 'olahraga', 'damai', 'ada', '2', 'MIPA', 'tidak ada', 'Kesehatan', 2, 2, 'IPA'),
(31, 'L', 20, 'traveling', 'leadership', 'ada', '1', 'sastra & ilmu budaya', 'tidak ada', 'Pendidikan', 2, 1, 'Seni dan Budaya'),
(32, 'L', 23, 'naik gunung', 'leadership', 'ada', '2', 'MIPA', 'tidak ada', 'Lingkungan', 2, 2, 'IPA'),
(34, 'L', 21, 'olahraga', 'damai', 'ada', '1', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 1, 'IPA'),
(35, 'L', 21, 'traveling', 'optimis', 'ada', '1', 'sastra & ilmu budaya', 'tidak ada', 'Budaya', 2, 1, 'Seni dan Budaya'),
(36, 'P', 22, 'traveling', 'optimis', 'ada', '2', 'sastra & ilmu budaya', 'tidak ada', 'Budaya', 2, 2, 'Seni dan Budaya'),
(37, 'P', 22, 'naik gunung', 'leadership', 'ada', '3', 'MIPA', 'tidak ada', 'Lingkungan', 2, 2, 'IPA'),
(38, 'L', 22, 'olahraga', 'damai', 'ada', '3', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, 'IPA'),
(39, 'L', 24, 'olahraga', 'damai', 'ada', '2', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, 'IPA'),
(40, 'P', 24, 'naik gunung', 'leadership', 'ada', '4', 'Ekonomi &bisnis', 'tidak ada', 'Lingkungan', 2, 3, 'IPS'),
(41, 'P', 21, 'olahraga', 'optimis', 'tidak ada', '4', 'IPA', 'tidak ada', 'Budaya', 2, 3, 'IPA'),
(42, 'P', 24, 'olahraga', 'damai', 'tidak ada', '5', 'Pendidikan', 'tidak ada', 'Pendidikan', 2, 3, 'IPS'),
(43, 'P', 23, 'olahraga', 'damai', 'ada', '4', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 3, 'IPA'),
(44, 'L', 19, 'naik gunung', 'leadership', 'ada', '5', 'Profesi & Ilmu Terap', 'tidak ada', 'Lingkungan', 2, 3, 'IPA'),
(45, 'P', 22, 'naik gunung', 'leadership', 'ada', '5', 'pertanian', 'tidak ada', 'Pendidikan', 2, 3, 'IPA'),
(46, 'P', 21, 'olahraga', 'damai', 'ada', '3', 'Kesehatan', 'tidak ada', 'Kesehatan', 2, 2, 'IPA'),
(47, 'L', 27, 'traveling', 'optimis', 'ada', '2', 'sastra & ilmu budaya', 'tidak ada', 'Budaya', 3, 2, 'Seni dan Budaya'),
(48, 'L', 27, 'naik gunung', 'leadership', 'ada', '1', 'pertanian', 'tidak ada', 'Kesehatan', 3, 1, 'IPA'),
(49, 'L', 26, 'olaraga', 'optimis', 'ada', '2', 'IPA', 'tidak ada', 'Lingkungan', 3, 2, 'IPA'),
(50, 'L', 26, 'olahraga', 'damai', 'tidak ada', '2', 'Kesehatan', 'tidak ada', 'Lingkungan', 3, 2, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galery`
--

CREATE TABLE `tb_galery` (
  `id_galery` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_komunitas` varchar(30) NOT NULL,
  `judulgambar` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galery`
--

INSERT INTO `tb_galery` (`id_galery`, `tanggal`, `id_komunitas`, `judulgambar`, `deskripsi`, `gambar`, `status`, `keterangan`) VALUES
(1, '2019-07-05', 'KOM1907001', 'sdasd', 'dsadasd', 'avatar.jpg', 'Publish', 'asdasd'),
(3, '2019-07-06', 'KOM1907003', 'Hore', 'Web Volunteer ini di buat agar masyarakat dapat melihat informasi kegiatan-kegiatan amal dengan muda', 'abstract-paper-background_23-2147734433.jpg', 'Publish', '-'),
(4, '2019-07-08', 'KOM1907006', 'q', 'q', 'Penguins.jpg', 'Publish', 'q'),
(5, '2019-07-09', 'KOM1907009', 'Bersama Adik dan Par', 'Belajar Bersama di sela-sela waktu libur', 'mejiku1.jpg', 'Publish', '-'),
(6, '2019-07-09', 'KOM1907008', 'Rawat Bumi', '-', 'JNDK9653.JPG', 'Publish', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id_komunitas` varchar(10) NOT NULL,
  `nama_komunitas` varchar(30) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `instagram` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komunitas`
--

INSERT INTO `tb_komunitas` (`id_komunitas`, `nama_komunitas`, `deskripsi`, `kategori`, `alamat`, `email`, `no_tlp`, `instagram`, `username`, `password`, `status`, `keterangan`, `gambar`) VALUES
('KOM1907001', 'Awesome site template corporat', 'Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum', 'Budaya', 'Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi laci', 'mitasari_7@yahoo.com', 2147483647, '@asasa', 'salmaa', 'salma', 'Aktif', '-', ''),
('KOM1907002', 'corporate business', ' Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum\r\n', 'Lingkungan', ' Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lac', '1@gmail.com', 80808098, '1MIII', 'qqqq', '1111', 'Aktif', '-', ''),
('KOM1907003', 'Kopi Manis', '-', 'Pendidikan', 'hahaha', 'sealam@gmail.comasda', 2147483647, 'asdasd', 'zzx', 'zzx', 'Aktif', 'aaa', ''),
('KOM1907004', 'Sebumi', 'hshshshs', 'Lingkungan', 'hhshshs', 'sebumi@gmail.com', 877727221, 'sebumi', 'sebumi', 'sebumi', 'Aktif', 'kakakak', ''),
('KOM1907005', '', '', 'Lingkungan', '', '', 0, '', 'a', 'a', 'Aktif', '', 'avatar.jpg'),
('KOM1907006', 'q', 'q', 'Pendidikan', 'q', 'q', 0, 'q', 'q', 'q', 'Aktif', 'q', 'Lighthouse.jpg'),
('KOM1907007', 'World Merit Indonesia Chapter ', 'World Merit adalah organisasi internasional yang berbasis di Liverpool, Britania Raya. Anggota World Merit Saat ini adalah sebanyak 98916 orang yang tersebar di 255 negara, termasuk di Indonesia seper', 'Pendidikan', 'DKI Jakarta', 'worldmeritindonesiaj', 2147483647, 'worldmeritindon', 'worldmeritindonesia', 'worldmeritindonesia', 'Aktif', '-', 'WMJ.jpeg'),
('KOM1907008', 'Lindungi Hutan', 'Apa Yang Kami Lakukan?\r\n\r\nTidak hanya melakukan aktifitas penanaman,\r\nLindungiHutan juga melakukan aktifitas-aktifitas untuk mendukung aksi pelestarian hutan.\r\n\r\n\r\nCampaign Penghijauan\r\n\r\nMembawa kaba', 'Lingkungan', 'Jl. Lempongsari 1 No 405 Semarang, Indonesia.', 'admin@lindungihutan.', 2147483647, 'lindungihutan', 'lindungihutan', 'lindungihutan', 'Aktif', '-', 'lindungihutan.png'),
('KOM1907009', 'MEJIKUHIBINIU', 'MejikuhibiniuÂ·Selasa, 26 Februari 2019\r\nMejikuhibiniu merupakan sebuah komunitas pendidikan berbasis relawan yang fokus pada pemberian pembelajaran formal bagi anak-anak. Komunitas ini lahir sebagai ', 'Pendidikan', 'Gondangdia, Jakarta', 'mejikuhibiniu@gmail.', 2147483647, 'mejikuhibiniu', 'mejikuhibiniu', 'mejikuhibiniu', 'Aktif', '-', 'mejiku.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status_ket` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nama`, `email`, `no_tlp`, `alamat`, `username`, `password`, `status_ket`, `keterangan`, `gambar`) VALUES
('KDP1907001', 'Budi Iskandar', 'lisaaaa@gmail.com', 2147483647, 'Jakarta Selatan', 'am', 'am', 'Aktif', '0', 'avatar.jpg'),
('KDP1907002', 'Iksan Nurhamid', 'Iksan Nurhamid', 2147483647, 'Jakarta Selatan', 'iksan', 'iksan', 'Aktif', 'KOM1907002', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `id_pengujian` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(15) NOT NULL,
  `nama_pengujian` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL,
  `k6` varchar(20) NOT NULL,
  `k7` varchar(20) NOT NULL,
  `k8` varchar(20) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `kategori2` varchar(30) NOT NULL,
  `rekapitulasi` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`id_pengujian`, `tgl`, `jam`, `nama_pengujian`, `nama`, `email`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `kategori`, `kategori2`, `rekapitulasi`, `keterangan`) VALUES
('UJI1907001', '2019-07-05', '09:24:55', 'sad', 'asdasdas', 'dasdasdas', 'Laki-Laki', 'das', 'naik gunung', 'damai', 'tidak ada', '2', 'seni', 'tidak ada', 'lingkungan', '', 'sadas', 'dasda'),
('UJI1907002', '2019-07-07', '19:14:45', 'Tes u Tetangga 1', 'BU INA', 'a@a.com', 'Perempuan', '24', 'traveling', 'optimis', 'ada', '3', 'pertanian', 'ada', 'Budaya', 'Kesehatan', '1. Budaya->(7/30) x (2/7) x (4/7) x (0/7) x (5/7) ', '\r\n<b>Analisa  Saran '),
('UJI1907003', '2019-07-07', '19:40:04', 'relawan', 'mita sari', 'mitasari0315@gmail.c', 'Perempuan', '22', 'naik gunung', 'leadership', 'ada', '3', 'komputer & teknologi', 'tidak ada', '', '', '', ''),
('UJI1907004', '2019-07-07', '20:02:03', '', '', '', 'Laki-Laki', '21', 'traveling', 'damai', 'ada', '2', 'sastra & ilmu budaya', 'ada', '', '', '1. Budaya->(10/49) x (0/10) x (0/10) x (0/10) x (2', '\r\n<b>Analisa  Saran '),
('UJI1907005', '2019-07-07', '21:27:41', 'Tes u Tetangga 1', 'Joko Kendil', 'a@a.com', 'Laki-Laki', '29', 'travelling', 'Optimis', 'Ada', '3', 'MIPA', 'ada', 'Budaya', 'Kesehatan', '1. Budaya->(10/49) x (4/10) x (1/10) x (0/10) x (8', '\r\n<b><h2>Analisa  Sa'),
('UJI1907006', '2019-07-07', '22:04:04', 'relawan', 'Joshua', 'joshua@gmail.com', 'Laki-Laki', '23', 'olahraga', 'damai', 'tidak ada', '3', 'IPA', 'tidak ada', 'Kesehatan', 'Budaya', '1. Kesehatan->(18/49) x (9/18) x (15/18) x (16/18)', '\r\n<b><h2>Analisa  Sa'),
('UJI1907007', '2019-07-08', '19:33:14', 'Pengujian Saya', 'Tonny', 'lisaaaa@gmail.com', 'Laki-Laki', '17', 'naik gunung', 'damai', 'tidak ada', '0', 'IPA', 'tidak ada', 'Budaya', 'Lingkungan', '1. Budaya->(10/49) x (4/10) x (9/10) x (2/10) x (2', '\r\n<b><h2>Analisa  Sa'),
('UJI1907008', '2019-07-09', '13:26:32', 'U tetangga 2', 'Budiman', 'admin@lindungihutan.', 'Laki-Laki', '17', 'membaca', 'optimis', 'ada', '2', 'Pendidikan', 'ada', 'Pendidikan', 'Budaya', '1. Pendidikan->(9/49) x (3/9) x (9/9) x (4/9) x (5', '\r\n<b><h2>Analisa  Sa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_relawan`
--

CREATE TABLE `tb_relawan` (
  `id_relawan` varchar(20) NOT NULL,
  `id_pendaftaran` varchar(20) NOT NULL,
  `id_komunitas` varchar(20) NOT NULL,
  `tgl_join` date NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tb_campaign`
--
ALTER TABLE `tb_campaign`
  ADD PRIMARY KEY (`id_campaign`);

--
-- Indexes for table `tb_datauji`
--
ALTER TABLE `tb_datauji`
  ADD PRIMARY KEY (`id_datauji`);

--
-- Indexes for table `tb_galery`
--
ALTER TABLE `tb_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`id_pengujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datauji`
--
ALTER TABLE `tb_datauji`
  MODIFY `id_datauji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tb_galery`
--
ALTER TABLE `tb_galery`
  MODIFY `id_galery` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
