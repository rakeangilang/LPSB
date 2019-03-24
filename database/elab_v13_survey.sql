-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 11:59 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elab`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasipesanan`
--

CREATE TABLE `administrasipesanan` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `NamaLengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Institusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoHP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoNPWP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenerimaSampel` text COLLATE utf8mb4_unicode_ci,
  `Jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaBank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VerifikasiPembayaran` tinyint(1) NOT NULL DEFAULT '0',
  `CatatanPembatalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KeteranganPesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasipesanan`
--

INSERT INTO `administrasipesanan` (`IDPesanan`, `NamaLengkap`, `Institusi`, `Alamat`, `NoHP`, `Email`, `NoNPWP`, `PenerimaSampel`, `Jabatan`, `NamaRekening`, `NamaBank`, `NoRekening`, `VerifikasiPembayaran`, `CatatanPembatalan`, `KeteranganPesanan`) VALUES
(1, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, NULL, NULL),
(3, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, 'tes', NULL),
(4, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, NULL, NULL),
(5, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', NULL, 0, NULL, NULL),
(6, 'tess', 'lab sebelah', 'jalan jalan', '093420940', 'tess@gmail.com', '343434', NULL, NULL, 'Sudrajat', 'BNN', '324234', 1, NULL, 'tes'),
(7, 'tess', 'lab sebelah', 'jalan jalan', '093420940', 'tess@gmail.com', '343434', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'asdf'),
(8, 'tess', 'lab sebelah', 'jalan jalan', '093420940', 'tess@gmail.com', '343434', NULL, NULL, 'Sudrajati', 'BNN', '324234', 1, NULL, NULL),
(9, 'tess', 'lab sebelah', 'jalan jalan', '093420940', 'tess@gmail.com', '343434', NULL, NULL, 'Sudrajat', 'BNN', '324234', 0, NULL, NULL),
(10, 'tess', 'lab sebelah', 'jalan jalan', '093420940', 'tess@gmail.com', '343434', NULL, NULL, 'Sudrajat', 'BNN', '324234', 0, NULL, NULL),
(11, 'gilang1', 'IPB', 'Depok1', '88', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 0, 'ganti tempat analisis', NULL),
(12, 'gilang1', 'IPB', 'Depok1', '99', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 1, NULL, NULL),
(13, 'gilang1', 'IPB', 'Depok1', '99', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bentuksampel`
--

CREATE TABLE `bentuksampel` (
  `IDKatalog` int(10) UNSIGNED NOT NULL,
  `Ekstrak` tinyint(1) NOT NULL DEFAULT '0',
  `Simplisia` tinyint(1) NOT NULL DEFAULT '0',
  `Cairan` tinyint(1) NOT NULL DEFAULT '0',
  `Serbuk` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bentuksampel`
--

INSERT INTO `bentuksampel` (`IDKatalog`, `Ekstrak`, `Simplisia`, `Cairan`, `Serbuk`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 1, 0, 0),
(3, 1, 1, 1, 0),
(4, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumenpesanan`
--

CREATE TABLE `dokumenpesanan` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `BuktiPengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuktiPembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PermohonanAnalisis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TandaTerimaSampel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UpdateTerakhir` timestamp NULL DEFAULT NULL,
  `BuktiPengembalianSampel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuktiPengembalianUang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuktiPengirimanSertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumenpesanan`
--

INSERT INTO `dokumenpesanan` (`IDPesanan`, `BuktiPengiriman`, `BuktiPembayaran`, `PermohonanAnalisis`, `TandaTerimaSampel`, `Sertifikat`, `UpdateTerakhir`, `BuktiPengembalianSampel`, `BuktiPengembalianUang`, `BuktiPengirimanSertifikat`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 'tes', NULL, NULL, NULL, NULL, NULL, NULL, '324'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '-KirimSendiri', 'tes', NULL, NULL, NULL, NULL, '324', NULL, NULL),
(9, '-KirimSendiri', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1234', 'tes', NULL, NULL, NULL, NULL, '324', NULL, '325'),
(13, '-KirimSendiri', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `IDKatalog` int(10) UNSIGNED NOT NULL,
  `IDKategori` int(11) NOT NULL,
  `JenisAnalisis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HargaIPB` bigint(20) NOT NULL,
  `HargaNONIPB` bigint(20) NOT NULL,
  `Metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StatusAktif` tinyint(1) NOT NULL DEFAULT '1',
  `DitambahkanPada` timestamp NULL DEFAULT NULL,
  `DiupdatePada` timestamp NULL DEFAULT NULL,
  `FotoKatalog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`IDKatalog`, `IDKategori`, `JenisAnalisis`, `HargaIPB`, `HargaNONIPB`, `Metode`, `Keterangan`, `StatusAktif`, `DitambahkanPada`, `DiupdatePada`, `FotoKatalog`) VALUES
(1, 1, 'Fitokimia', 175000, 200000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(2, 1, 'Alkaloid', 45000, 50000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(3, 2, 'Kapang/kamir', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(4, 2, 'PCA (TPC)', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `IDKategori` int(10) UNSIGNED NOT NULL,
  `Kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FotoKategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`IDKategori`, `Kategori`, `FotoKategori`) VALUES
(1, 'Fitokimia', NULL),
(2, 'Mikrobiologi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `IDItem` bigint(20) UNSIGNED NOT NULL,
  `IDPelanggan` int(11) NOT NULL,
  `IDKatalog` int(11) NOT NULL,
  `JenisSampel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BentukSampel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kemasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`IDItem`, `IDPelanggan`, `IDKatalog`, `JenisSampel`, `BentukSampel`, `Kemasan`, `Jumlah`) VALUES
(5, 4, 2, 'Daun', 'Ekstrak', 'Toples', '4'),
(9, 1, 1, 'tes1', 'Simplisia', 'Plastik', '123 gr'),
(10, 1, 2, 'tes2', 'Simplisia', 'toples', '89 gr'),
(11, 1, 4, 'tes3', 'Cairan', 'Plastik', '80 cc');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(100, '2019_02_11_021215_create_katalog_table', 1),
(101, '2019_02_11_023752_create__kategori_table', 1),
(102, '2019_02_11_025114_create__pelanggan_table', 1),
(103, '2019_02_11_025145_create__pesanan_table', 1),
(104, '2019_02_11_025213_create__sampel_table', 1),
(105, '2019_02_11_025242_create__pelacakan_table', 1),
(106, '2019_02_11_025332_create__status_pelacakan_table', 1),
(107, '2019_02_11_232439_create__bentuk_sampel_table', 1),
(108, '2019_02_17_194230_create__administrasi_pesanan_table', 1),
(109, '2019_02_17_194532_create__pemberitahuan_table', 1),
(110, '2019_02_17_195649_create__dokumen_pesanan_table', 1),
(111, '2019_02_18_200103_add_api_token_to_pelanggan', 2),
(112, '2019_02_18_204510_make_email_on_pelanggan_unique', 3),
(113, '2019_02_24_043251_create_keranjang_table', 4),
(114, '2019_02_25_020542_add_npwp_to_pelanggan_table', 5),
(115, '2019_02_25_032253_add_status_item_to_keranjang_table', 6),
(116, '2019_02_25_064830_reconstruct_keranjang_table', 7),
(117, '2019_02_25_144735_change_jumlah_at_keranjang_table', 8),
(118, '2019_02_25_145414_change_jumlah_at_sampel_table', 8),
(119, '2019_02_25_145633_delete_status_keranjang_at_keranjang_table', 8),
(120, '2019_02_26_043649_change__i_d_status_at_pelacakan_table', 9),
(121, '2019_02_27_101028_change_idpesanan_at_sampel_table', 10),
(122, '2019_02_27_101128_add_idsampel_and_metode_at_sampel_table', 11),
(124, '2019_02_27_131540_change_hargasampel_at_sampel_table', 12),
(125, '2019_03_02_153256_add_keterangan_to_administrasipesanan_table', 13),
(126, '2019_03_03_105146_add_idkatalog_to_sampel_table', 14),
(127, '2019_03_05_013548_add_idpelanggan_to_pemberitahuan', 15),
(128, '2019_03_05_030058_change_dimulaipada_at_pemberitahuan', 16),
(131, '2019_03_05_030335_alter_pelacakan_table', 17),
(132, '2019_03_05_031937_add_waktu2_to_pelacakan_table', 17),
(133, '2019_03_05_043130_change_status_sisasampel_kirimsertifikat_at_pelacakan_table', 18),
(134, '2019_03_05_051938_add_waktu_ulasan_to_pelacakan_table', 19),
(135, '2019_03_05_110113_change_rekenings_at_administrasipesanan_table', 20),
(136, '2019_03_11_023447_drop_keterangan_from_pesanan_table', 21),
(137, '2019_03_11_040800_change_kirimsertifikat_at_pelacakan_table', 21),
(138, '2019_03_12_062320_add_waktu_pembatalan_to_pelacakan_table', 21),
(139, '2019_03_24_173431_create_survey_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pelacakan`
--

CREATE TABLE `pelacakan` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `IDStatus` int(11) NOT NULL DEFAULT '1',
  `Pembayaran` tinyint(1) NOT NULL DEFAULT '1',
  `KirimSampel` tinyint(1) NOT NULL DEFAULT '1',
  `KirimSertifikat` tinyint(1) NOT NULL DEFAULT '0',
  `SisaSampel` tinyint(1) NOT NULL DEFAULT '1',
  `UpdateTerakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WaktuPembayaran` timestamp NULL DEFAULT NULL,
  `WaktuKirimSampel` datetime DEFAULT NULL,
  `WaktuTerimaSisa` datetime DEFAULT NULL,
  `WaktuTerimaSertif` datetime DEFAULT NULL,
  `WaktuUlasan` datetime DEFAULT NULL,
  `WaktuBatal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelacakan`
--

INSERT INTO `pelacakan` (`IDPesanan`, `IDStatus`, `Pembayaran`, `KirimSampel`, `KirimSertifikat`, `SisaSampel`, `UpdateTerakhir`, `WaktuPembayaran`, `WaktuKirimSampel`, `WaktuTerimaSisa`, `WaktuTerimaSertif`, `WaktuUlasan`, `WaktuBatal`) VALUES
(1, 1, 1, 1, 1, 1, '2019-03-05 04:33:44', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 7, 1, 1, 1, 1, '2019-03-11 23:36:26', NULL, NULL, NULL, NULL, NULL, '2019-03-12 06:36:26'),
(4, 1, 1, 1, 1, 1, '2019-03-05 04:33:55', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 1, 1, 1, 1, '2019-03-05 04:05:32', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, 2, 2, 3, 3, '2019-03-16 02:28:48', '2019-03-16 01:40:38', '2019-03-16 08:50:01', '2019-03-16 09:28:48', '2019-03-16 09:27:29', '2019-03-16 09:24:24', NULL),
(7, 6, 1, 1, 0, 1, '2019-03-16 02:29:51', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 5, 2, 2, 3, 3, '2019-03-16 02:39:14', '2019-03-16 02:32:58', '2019-03-16 09:32:35', '2019-03-16 09:39:07', '2019-03-16 09:39:05', '2019-03-16 09:39:14', NULL),
(9, 5, 2, 2, 0, 0, '2019-03-16 02:45:20', '2019-03-16 02:43:32', '2019-03-16 09:43:26', NULL, NULL, NULL, NULL),
(10, 2, 2, 2, 0, 1, '2019-03-16 02:53:34', '2019-03-16 02:53:34', '2019-03-16 09:53:30', NULL, NULL, NULL, NULL),
(11, 6, 1, 1, 0, 0, '2019-03-17 05:10:52', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 5, 2, 2, 3, 3, '2019-03-17 05:31:30', '2019-03-17 05:17:20', '2019-03-17 12:16:02', '2019-03-17 12:28:10', '2019-03-17 12:28:13', '2019-03-17 12:31:30', NULL),
(13, 5, 2, 2, 1, 1, '2019-03-17 05:36:18', '2019-03-17 05:33:44', '2019-03-17 12:33:26', NULL, NULL, '2019-03-17 12:36:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDPelanggan` int(10) UNSIGNED NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoHP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoNPWP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoIdentitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaBank` text COLLATE utf8mb4_unicode_ci,
  `NoRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IDPelanggan`, `Email`, `api_token`, `Password`, `Nama`, `Perusahaan`, `Alamat`, `NoHP`, `NoNPWP`, `NoIdentitas`, `NamaRekening`, `NamaBank`, `NoRekening`) VALUES
(1, 'gilang@gmail.com', '$2y$10$DzKfbp59nxqMDRvT1LZI/.iZSSfCxOH8mgRAoKAfV3YrwYyankzQy', '$2y$10$xn48cSPXGdD2OEDxom498OFpiWyE2wpuleslsTW81d0wIqz1.G.ga', 'gilang1', 'IPB', 'Depok1', '99', '77', '99', 'gilang', 'bank ipb', '123'),
(2, 'kurt@gmail.com', '$2y$10$NXsCQt3uvicxRocilH1./e9oOeBMJdhRgcmaVOP2eauV9xLiM1BdS', '$2y$10$CyIeiFlBxY3Bn1wgWI5QiOzQL.mXbLQIS6D0T69u9zhaYw34GO94.', 'Curt', 'Nirvana', 'LA', '911', NULL, '66666', 'RekBaru', 'west bank', '222'),
(3, 'cobain@gmail.com', '$2y$10$cI319PC4RQDCMyWGQr6lyep.2WPFyyVw6PVnOfeJUhYe.SJbrXbLi', '$2y$10$mHVv3ychc2HoFjzsbr/1qeY6Y75w2kuE/vUhuz/0FLaoPXFOTfLbW', 'cobain', 'LP', 'Lincoln Park', '8989', NULL, '3423', 'cot', 'ba', '42'),
(4, 'tes@gmail.com', 'jir', '$2y$10$GwnXzVvfthGKXPqhXaB/PeaFT/vfJpRq1/B99ZtDa5Dh.FC8.gmjS', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'anakbaru@gmail.com', '$2y$10$KaumnjiGuMqTnN1vljMo.uddaWNxqGUjF2haKHiPySZKJ0YaTNk26', '$2y$10$apSUyxlwHgwc5eQse86w8eWlB75cZCGm26cijG6WgIa.NPLy5kIma', 'anakbaru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'jer@gmail.com', '$2y$10$ZbMzRkmcH752G9BguVoGxu/zK65RnJk/KXETFmh0HGcXikbp2/aVK', '$2y$10$ZYQr8QZwnQRmHgCcTnHo2Ohd4ZZU3qgF6pg8zJ/BwFTWHul5brCAe', 'jer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'aaa@gmail.com', '$2y$10$fiM1lB2k9HyLVe6fID02ZOZVUJsflpPn08arATkFv3hy6oshoV7ry', '$2y$10$SzBbzwfFsRAcBB3S6BsbtOEVlhf6ohvIjVXk9j5dsmRlIldo91NRO', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'tess@gmail.com', '$2y$10$pZCNwfx66fjVPw./fjnL5ug35hgvWKLOPOjLOjHBr14m3x5tDk4oy', '$2y$10$FLkiWTYSgfAM0w.xOSoLluA4Qrsbz0wA/KZ09Dn12EvrOvDqBGIvG', 'tess', 'lab sebelah', 'jalan jalan', '093420940', '343434', NULL, 'Sudrajat', 'BNN', '324234');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `IDPemberitahuan` bigint(20) UNSIGNED NOT NULL,
  `IDPesanan` bigint(20) NOT NULL,
  `IDStatus` int(11) NOT NULL,
  `Dilihat` tinyint(1) NOT NULL DEFAULT '0',
  `WaktuPemberitahuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IDPelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`IDPemberitahuan`, `IDPesanan`, `IDStatus`, `Dilihat`, `WaktuPemberitahuan`, `IDPelanggan`) VALUES
(1, 3, 1, 1, '2019-03-04 23:32:14', 4),
(2, 3, 2, 0, '2019-03-07 04:42:20', 4),
(3, 3, 3, 0, '2019-03-07 12:01:15', 4),
(4, 3, 6, 0, '2019-03-12 06:32:37', 4),
(5, 3, 7, 0, '2019-03-12 06:36:11', 4),
(6, 3, 7, 0, '2019-03-12 06:36:27', 4),
(7, 6, 2, 1, '2019-03-16 08:36:34', 8),
(8, 6, 21, 1, '2019-03-16 08:51:18', 8),
(9, 6, 22, 1, '2019-03-16 09:16:22', 8),
(10, 6, 3, 1, '2019-03-16 09:16:56', 8),
(11, 6, 4, 1, '2019-03-16 09:18:42', 8),
(12, 6, 5, 1, '2019-03-16 09:18:57', 8),
(13, 6, 51, 1, '2019-03-16 09:24:49', 8),
(14, 6, 52, 0, '2019-03-16 09:26:41', 8),
(15, 7, 6, 0, '2019-03-16 09:29:51', 8),
(16, 8, 2, 0, '2019-03-16 09:32:07', 8),
(17, 8, 21, 0, '2019-03-16 09:33:16', 8),
(18, 8, 22, 0, '2019-03-16 09:33:19', 8),
(19, 8, 3, 0, '2019-03-16 09:33:43', 8),
(20, 8, 4, 1, '2019-03-16 09:34:03', 8),
(21, 8, 5, 0, '2019-03-16 09:34:22', 8),
(22, 8, 52, 0, '2019-03-16 09:37:42', 8),
(23, 8, 51, 0, '2019-03-16 09:38:07', 8),
(24, 9, 2, 0, '2019-03-16 09:43:08', 8),
(25, 9, 3, 0, '2019-03-16 09:44:26', 8),
(26, 9, 4, 0, '2019-03-16 09:44:30', 8),
(27, 9, 5, 1, '2019-03-16 09:44:33', 8),
(28, 10, 2, 0, '2019-03-16 09:52:09', 8),
(29, 11, 6, 1, '2019-03-17 12:10:52', 1),
(30, 12, 2, 1, '2019-03-17 12:14:14', 1),
(31, 12, 21, 1, '2019-03-17 12:18:11', 1),
(32, 12, 22, 1, '2019-03-17 12:18:18', 1),
(33, 12, 3, 0, '2019-03-17 12:20:24', 1),
(34, 12, 4, 1, '2019-03-17 12:20:43', 1),
(35, 12, 5, 0, '2019-03-17 12:21:01', 1),
(36, 12, 51, 0, '2019-03-17 12:22:25', 1),
(37, 12, 52, 1, '2019-03-17 12:22:31', 1),
(38, 13, 2, 1, '2019-03-17 12:33:08', 1),
(39, 13, 21, 0, '2019-03-17 12:34:57', 1),
(40, 13, 22, 0, '2019-03-17 12:35:00', 1),
(41, 13, 3, 0, '2019-03-17 12:35:20', 1),
(42, 13, 4, 0, '2019-03-17 12:35:33', 1),
(43, 13, 5, 0, '2019-03-17 12:35:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `IDPelanggan` int(11) NOT NULL,
  `NoPesanan` int(11) NOT NULL,
  `DiterimaTgl` timestamp NULL DEFAULT NULL,
  `SelesaiTgl` timestamp NULL DEFAULT NULL,
  `Percepatan` tinyint(1) NOT NULL DEFAULT '0',
  `KembalikanSampel` tinyint(1) NOT NULL DEFAULT '0',
  `TotalHarga` bigint(20) NOT NULL,
  `WaktuPemesanan` timestamp NULL DEFAULT NULL,
  `Ulasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`IDPesanan`, `IDPelanggan`, `NoPesanan`, `DiterimaTgl`, `SelesaiTgl`, `Percepatan`, `KembalikanSampel`, `TotalHarga`, `WaktuPemesanan`, `Ulasan`) VALUES
(1, 4, 1, NULL, NULL, 1, 1, 8888, '2019-03-01 03:13:31', NULL),
(3, 4, 2, NULL, NULL, 1, 1, 8888, '2019-03-02 09:20:51', 'abcd'),
(4, 4, 3, NULL, NULL, 1, 1, 8888, '2019-03-03 21:22:10', NULL),
(5, 4, 4, NULL, NULL, 1, 1, 8888, '2019-03-05 04:05:32', NULL),
(6, 8, 5, NULL, NULL, 1, 1, 325429, '2019-03-16 01:26:57', NULL),
(7, 8, 6, NULL, NULL, 2, 1, 1000429, '2019-03-16 01:32:59', NULL),
(8, 8, 7, NULL, NULL, 1, 0, 125429, '2019-03-16 02:31:34', 'asdf'),
(9, 8, 8, NULL, NULL, 1, 0, 125429, '2019-03-16 02:41:36', NULL),
(10, 8, 9, NULL, NULL, 1, 1, 200429, '2019-03-16 02:51:40', NULL),
(11, 1, 10, NULL, NULL, 1, 0, 200429, '2019-03-17 05:09:56', NULL),
(12, 1, 11, NULL, NULL, 2, 1, 100429, '2019-03-17 05:12:21', 'nice job'),
(13, 1, 12, NULL, NULL, 1, 1, 125429, '2019-03-17 05:32:26', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `sampel`
--

CREATE TABLE `sampel` (
  `IDPesanan` bigint(255) NOT NULL,
  `IDSampel` bigint(20) UNSIGNED NOT NULL,
  `IDKatalog` int(11) NOT NULL,
  `NoSampel` int(11) DEFAULT NULL,
  `JenisSampel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BentukSampel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kemasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisAnalisis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HargaSampel` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sampel`
--

INSERT INTO `sampel` (`IDPesanan`, `IDSampel`, `IDKatalog`, `NoSampel`, `JenisSampel`, `BentukSampel`, `Kemasan`, `Jumlah`, `JenisAnalisis`, `Metode`, `HargaSampel`) VALUES
(1, 1, 1, 1, 'Daun', 'Ekstrak', 'Toples', '5', 'Fitokimia', 'Visualisasi warna', 175000),
(3, 2, 1, 1, 'batang', 'Ekstrak', 'Toples', '9', 'Fitokimia', 'Visualisasi warna', 175000),
(4, 3, 1, 1, 'batang', 'Ekstrak', 'Toples', '9', 'Fitokimia', 'Visualisasi warna', 175000),
(5, 4, 1, 1, 'bom', 'Ekstrak', 'Toples', '9', 'Fitokimia', 'Visualisasi warna', 175000),
(6, 5, 3, 1, 'jamur', 'Ekstrak', 'Kardus', '5 gr', 'Kapang/kamir', 'Cawan tuang', 125000),
(6, 6, 1, 2, 'dedaunan', 'Simplisia', 'Plastik', '7 gr', 'Fitokimia', 'Visualisasi warna', 200000),
(7, 7, 1, 1, 'daun a', 'Ekstrak', 'Plastik', '10 gr', 'Fitokimia', 'Visualisasi warna', 200000),
(7, 8, 2, 2, 'daun b', 'Ekstrak', 'kresek', '8 gr', 'Alkaloid', 'Visualisasi warna', 50000),
(7, 9, 3, 3, 'jamur a', 'Ekstrak', 'Kardus', '5 gram', 'Kapang/kamir', 'Cawan tuang', 125000),
(7, 10, 4, 4, 'jamur b', 'Cairan', 'Plastik', '100 ml', 'PCA (TPC)', 'Cawan tuang', 125000),
(8, 11, 4, 1, 'cobaa', 'Simplisia', 'Plastik', '33', 'PCA (TPC)', 'Cawan tuang', 125000),
(9, 12, 3, 1, 'roti', 'Ekstrak', 'Plastik', '100 gram', 'Kapang/kamir', 'Cawan tuang', 125000),
(10, 13, 1, 1, 'testing', 'Ekstrak', 'Plastik', '8', 'Fitokimia', 'Visualisasi warna', 200000),
(11, 14, 1, 1, 'batu', 'Ekstrak', 'Kardus', '1 kg', 'Fitokimia', 'Visualisasi warna', 200000),
(12, 15, 2, 1, 'Serbuk', 'Simplisia', 'Plastik', '100 gr', 'Alkaloid', 'Visualisasi warna', 50000),
(13, 16, 4, 1, 'cairan', 'Cairan', 'Plastik', '100 ml', 'PCA (TPC)', 'Cawan tuang', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `statuspelacakan`
--

CREATE TABLE `statuspelacakan` (
  `IDStatus` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuspelacakan`
--

INSERT INTO `statuspelacakan` (`IDStatus`, `Status`) VALUES
(1, 'Pesanan dibuat'),
(2, 'Pesanan divalidasi'),
(3, 'Dikaji ulang'),
(4, 'Dianalisis'),
(5, 'Analisis selesai'),
(6, 'Pesanan dibatalkan pelanggan'),
(7, 'Pesanan dibatalkan sistem'),
(21, 'Pembayaran divalidasi'),
(22, 'Sampel diterima dan divalidasi'),
(51, 'Sisa sampel dikirim'),
(52, 'Sertifikat dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `Survey1` tinyint(4) DEFAULT NULL,
  `Survey2` tinyint(4) DEFAULT NULL,
  `Survey3` tinyint(4) DEFAULT NULL,
  `Survey4` tinyint(4) DEFAULT NULL,
  `Survey5` tinyint(4) DEFAULT NULL,
  `Survey6` tinyint(4) DEFAULT NULL,
  `Survey7` tinyint(4) DEFAULT NULL,
  `Survey8` tinyint(4) DEFAULT NULL,
  `Survey9` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`IDPesanan`, `Survey1`, `Survey2`, `Survey3`, `Survey4`, `Survey5`, `Survey6`, `Survey7`, `Survey8`, `Survey9`) VALUES
(13, 1, 2, 3, 4, 5, 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasipesanan`
--
ALTER TABLE `administrasipesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `bentuksampel`
--
ALTER TABLE `bentuksampel`
  ADD PRIMARY KEY (`IDKatalog`);

--
-- Indexes for table `dokumenpesanan`
--
ALTER TABLE `dokumenpesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`IDKatalog`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IDKategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`IDItem`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelacakan`
--
ALTER TABLE `pelacakan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDPelanggan`),
  ADD UNIQUE KEY `pelanggan_email_unique` (`Email`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`IDPemberitahuan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `sampel`
--
ALTER TABLE `sampel`
  ADD PRIMARY KEY (`IDSampel`);

--
-- Indexes for table `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  ADD PRIMARY KEY (`IDStatus`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasipesanan`
--
ALTER TABLE `administrasipesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bentuksampel`
--
ALTER TABLE `bentuksampel`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumenpesanan`
--
ALTER TABLE `dokumenpesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IDKategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `IDItem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `pelacakan`
--
ALTER TABLE `pelacakan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IDPelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `IDPemberitahuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sampel`
--
ALTER TABLE `sampel`
  MODIFY `IDSampel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  MODIFY `IDStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
