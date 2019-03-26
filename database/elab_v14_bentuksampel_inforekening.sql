-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2019 pada 05.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `administrasipesanan`
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
-- Dumping data untuk tabel `administrasipesanan`
--

INSERT INTO `administrasipesanan` (`IDPesanan`, `NamaLengkap`, `Institusi`, `Alamat`, `NoHP`, `Email`, `NoNPWP`, `PenerimaSampel`, `Jabatan`, `NamaRekening`, `NamaBank`, `NoRekening`, `VerifikasiPembayaran`, `CatatanPembatalan`, `KeteranganPesanan`) VALUES
(1, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, NULL, NULL),
(3, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h4h4', 'BI', '223', 0, 'gabisa cuk', 'haha'),
(4, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, NULL, NULL),
(5, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', NULL, 0, NULL, NULL),
(6, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', NULL, 0, NULL, NULL),
(7, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', NULL, 0, 'gabisa cuk', 'tes'),
(8, 'jerry', 'Institut Pertanian Bogor', 'Balebak', '343434', 'jer@gmail.com', '33333', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'Yang cepat ya'),
(9, 'jerry', 'Institut Pertanian Bogor', 'Balebak', '343434', 'jer@gmail.com', '33333', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(10, 'gilang2', 'IPB', 'Depok1', '88', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 0, NULL, 'Jangan lama2 ya'),
(11, 'gilang3', 'IPB', 'Depok1', '88', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 0, NULL, NULL),
(12, 'gilang3', 'IPB', 'Depok1', '88', 'gilang@gmail.com', '77', NULL, NULL, 'gilang', 'bank ipb', '123', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentuksampel`
--

CREATE TABLE `bentuksampel` (
  `IDKatalog` int(10) UNSIGNED NOT NULL,
  `Ekstrak` int(11) DEFAULT NULL,
  `Simplisia` int(11) DEFAULT NULL,
  `Cairan` int(11) DEFAULT NULL,
  `Serbuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bentuksampel`
--

INSERT INTO `bentuksampel` (`IDKatalog`, `Ekstrak`, `Simplisia`, `Cairan`, `Serbuk`) VALUES
(1, 25, 25, NULL, NULL),
(2, 10, 10, NULL, NULL),
(3, 10, 25, 25, NULL),
(4, 10, 25, 25, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumenpesanan`
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
-- Dumping data untuk tabel `dokumenpesanan`
--

INSERT INTO `dokumenpesanan` (`IDPesanan`, `BuktiPengiriman`, `BuktiPembayaran`, `PermohonanAnalisis`, `TandaTerimaSampel`, `Sertifikat`, `UpdateTerakhir`, `BuktiPengembalianSampel`, `BuktiPengembalianUang`, `BuktiPengirimanSertifikat`) VALUES
(1, '-KirimSendiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '-KirimSendiri', 'lul', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '8478457', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
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
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`IDKatalog`, `IDKategori`, `JenisAnalisis`, `HargaIPB`, `HargaNONIPB`, `Metode`, `Keterangan`, `StatusAktif`, `DitambahkanPada`, `DiupdatePada`, `FotoKatalog`) VALUES
(1, 1, 'Fitokimia', 175000, 200000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(2, 1, 'Alkaloid', 45000, 50000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(3, 2, 'Kapang/kamir', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL),
(4, 2, 'PCA (TPC)', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-18 17:00:00', '2019-02-18 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `IDKategori` int(10) UNSIGNED NOT NULL,
  `Kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FotoKategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IDKategori`, `Kategori`, `FotoKategori`) VALUES
(1, 'Fitokimia', NULL),
(2, 'Mikrobiologi', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
(137, '2019_03_11_040800_change_kirimsertifikat_at_pelacakan_table', 22),
(138, '2019_03_12_062320_add_waktu_pembatalan_to_pelacakan_table', 23),
(139, '2019_03_24_173431_create_survey_table', 23),
(140, '2019_03_26_103941_change_all_sampel_type_and_add_satuan_to_bentuksampel_table', 23),
(141, '2019_03_26_110500_delete_waktubatal_at_pelacakan_table', 24),
(142, '2019_03_26_111910_change_jumlah_at_sampel_table', 25),
(143, '2019_03_26_113827_delete_inforekening_at_pelanggan_table', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelacakan`
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
  `WaktuUlasan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelacakan`
--

INSERT INTO `pelacakan` (`IDPesanan`, `IDStatus`, `Pembayaran`, `KirimSampel`, `KirimSertifikat`, `SisaSampel`, `UpdateTerakhir`, `WaktuPembayaran`, `WaktuKirimSampel`, `WaktuTerimaSisa`, `WaktuTerimaSertif`, `WaktuUlasan`) VALUES
(1, 1, 1, 2, 1, 1, '2019-03-11 01:46:10', NULL, '2019-03-11 15:46:10', NULL, NULL, '2019-03-11 12:01:24'),
(3, 5, 2, 2, 2, 2, '2019-03-12 07:59:12', '2019-03-11 08:49:55', '2019-03-11 15:45:07', '2019-03-12 10:23:41', NULL, '2019-03-12 10:01:37'),
(4, 2, 1, 1, 1, 1, '2019-03-14 05:46:17', NULL, NULL, NULL, NULL, NULL),
(5, 1, 1, 1, 1, 1, '2019-03-05 04:05:32', NULL, NULL, NULL, NULL, NULL),
(6, 1, 1, 1, 0, 1, '2019-03-13 23:52:09', NULL, NULL, NULL, NULL, NULL),
(7, 7, 1, 2, 0, 1, '2019-03-14 00:31:04', NULL, '2019-03-14 07:31:04', NULL, NULL, NULL),
(8, 2, 1, 1, 0, 1, '2019-03-14 05:47:57', NULL, NULL, NULL, NULL, NULL),
(9, 1, 1, 1, 0, 1, '2019-03-14 08:02:13', NULL, NULL, NULL, NULL, NULL),
(10, 1, 1, 1, 0, 1, '2019-03-19 02:27:46', NULL, NULL, NULL, NULL, NULL),
(11, 2, 3, 3, 0, 1, '2019-03-26 02:41:40', NULL, NULL, NULL, NULL, NULL),
(12, 2, 1, 1, 0, 1, '2019-03-19 03:40:47', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
  `NoIdentitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`IDPelanggan`, `Email`, `api_token`, `Password`, `Nama`, `Perusahaan`, `Alamat`, `NoHP`, `NoNPWP`, `NoIdentitas`) VALUES
(1, 'gilang@gmail.com', '$2y$10$DzKfbp59nxqMDRvT1LZI/.iZSSfCxOH8mgRAoKAfV3YrwYyankzQy', '$2y$10$xn48cSPXGdD2OEDxom498OFpiWyE2wpuleslsTW81d0wIqz1.G.ga', 'gilang3', 'IPB', 'Depok1', '88', '77', '99'),
(2, 'kurt@gmail.com', '$2y$10$NXsCQt3uvicxRocilH1./e9oOeBMJdhRgcmaVOP2eauV9xLiM1BdS', '$2y$10$CyIeiFlBxY3Bn1wgWI5QiOzQL.mXbLQIS6D0T69u9zhaYw34GO94.', 'Curt', 'Nirvana', 'LA', '911', NULL, '66666'),
(3, 'cobain@gmail.com', '$2y$10$cI319PC4RQDCMyWGQr6lyep.2WPFyyVw6PVnOfeJUhYe.SJbrXbLi', '$2y$10$mHVv3ychc2HoFjzsbr/1qeY6Y75w2kuE/vUhuz/0FLaoPXFOTfLbW', 'cobain', 'LP', 'Lincoln Park', '8989', NULL, '3423'),
(4, 'tes@gmail.com', 'jir', '$2y$10$GwnXzVvfthGKXPqhXaB/PeaFT/vfJpRq1/B99ZtDa5Dh.FC8.gmjS', 'tes', NULL, NULL, NULL, NULL, NULL),
(5, 'anakbaru@gmail.com', '$2y$10$KaumnjiGuMqTnN1vljMo.uddaWNxqGUjF2haKHiPySZKJ0YaTNk26', '$2y$10$apSUyxlwHgwc5eQse86w8eWlB75cZCGm26cijG6WgIa.NPLy5kIma', 'anakbaru', NULL, NULL, NULL, NULL, NULL),
(6, 'jer@gmail.com', '$2y$10$ZbMzRkmcH752G9BguVoGxu/zK65RnJk/KXETFmh0HGcXikbp2/aVK', '$2y$10$ZYQr8QZwnQRmHgCcTnHo2Ohd4ZZU3qgF6pg8zJ/BwFTWHul5brCAe', 'jerry', 'Institut Pertanian Bogor', 'Balebak', '343434', '33333', 'G64159999'),
(7, 'aaa@gmail.com', '$2y$10$fiM1lB2k9HyLVe6fID02ZOZVUJsflpPn08arATkFv3hy6oshoV7ry', '$2y$10$SzBbzwfFsRAcBB3S6BsbtOEVlhf6ohvIjVXk9j5dsmRlIldo91NRO', 'aaa', NULL, NULL, NULL, NULL, NULL),
(8, 'joni@gmail.com', '$2y$10$KxDCpg.lMFR5BLHWhUfARuYfjnRH1qV.z.TIyAEv2RHpW48bNoxy6', '$2y$10$S8RJxkQq4jQdoxn.O79IvOFN7i6gqYcqI7Nc3AKb9iQCUaVx8lgma', 'joni', 'Institut Pertanian Bogor', NULL, NULL, NULL, '123'),
(9, 'joko@gmail.com', '$2y$10$EDa8SxMYxjiZwb6VMEIfjOBIk1cMmkOaDnedt5Hrlsq8xXie7i59G', '$2y$10$gBUzoccajLMQ0h3h3qzkhO/li5bwA2ZDSaRIQPDVxtqa8BYUhUpsa', 'joko', 'Institut Pertanian Bogor', 'bumi', '88', '11', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
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
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`IDPemberitahuan`, `IDPesanan`, `IDStatus`, `Dilihat`, `WaktuPemberitahuan`, `IDPelanggan`) VALUES
(1, 3, 1, 0, '2019-03-04 23:32:14', 4),
(2, 3, 4, 0, '2019-03-12 10:53:58', 4),
(3, 3, 4, 0, '2019-03-12 10:55:47', 4),
(4, 3, 22, 0, '2019-03-12 10:56:06', 4),
(5, 3, 4, 0, '2019-03-12 10:56:54', 4),
(6, 3, 22, 0, '2019-03-12 10:57:51', 4),
(7, 3, 21, 0, '2019-03-12 11:00:13', 4),
(8, 3, 4, 0, '2019-03-12 11:01:15', 4),
(9, 3, 21, 0, '2019-03-12 11:01:53', 4),
(10, 3, 22, 0, '2019-03-12 11:02:13', 4),
(11, 3, 51, 0, '2019-03-12 11:02:58', 4),
(12, 3, 51, 0, '2019-03-12 11:03:53', 4),
(13, 3, 21, 0, '2019-03-12 11:10:23', 4),
(14, 3, 21, 0, '2019-03-12 11:14:56', 4),
(15, 3, 51, 0, '2019-03-12 11:15:07', 4),
(16, 3, 5, 0, '2019-03-12 11:15:22', 4),
(17, 3, 51, 0, '2019-03-12 11:15:43', 4),
(18, 3, 51, 0, '2019-03-12 11:35:17', 4),
(19, 3, 52, 0, '2019-03-12 12:02:57', 4),
(20, 3, 51, 0, '2019-03-12 12:05:50', 4),
(21, 3, 51, 0, '2019-03-12 12:08:58', 4),
(23, 3, 5, 0, '2019-03-12 14:59:13', 4),
(25, 7, 7, 0, '2019-03-14 07:03:12', 4),
(26, 4, 2, 0, '2019-03-14 12:46:19', 4),
(27, 8, 2, 0, '2019-03-14 12:47:58', 6),
(28, 11, 2, 0, '2019-03-19 10:38:10', 1),
(29, 12, 2, 0, '2019-03-19 10:40:48', 1),
(30, 11, 21, 0, '2019-03-26 09:41:18', 1),
(31, 11, 22, 0, '2019-03-26 09:41:45', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
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
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`IDPesanan`, `IDPelanggan`, `NoPesanan`, `DiterimaTgl`, `SelesaiTgl`, `Percepatan`, `KembalikanSampel`, `TotalHarga`, `WaktuPemesanan`, `Ulasan`) VALUES
(1, 4, 1, NULL, NULL, 1, 1, 8888, '2019-03-01 03:13:31', 'haha'),
(3, 4, 2, NULL, NULL, 1, 1, 8888, '2019-03-02 09:20:51', 'hahi'),
(4, 4, 3, NULL, NULL, 1, 1, 8888, '2019-03-03 21:22:10', NULL),
(5, 4, 4, NULL, NULL, 1, 1, 8888, '2019-03-05 04:05:32', NULL),
(6, 4, 5, NULL, NULL, 1, 1, 8888, '2019-03-13 23:52:08', NULL),
(7, 4, 6, NULL, NULL, 1, 1, 8888, '2019-03-13 23:54:41', NULL),
(8, 6, 7, NULL, NULL, 1, 1, 175429, '2019-03-14 05:35:49', NULL),
(9, 6, 8, NULL, NULL, 1, 0, 175429, '2019-03-14 08:02:13', NULL),
(10, 1, 9, NULL, NULL, 2, 1, 250429, '2019-03-19 02:27:45', NULL),
(11, 1, 10, NULL, NULL, 2, 1, 50429, '2019-03-19 02:29:14', NULL),
(12, 1, 11, NULL, NULL, 1, 1, 200429, '2019-03-19 03:40:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampel`
--

CREATE TABLE `sampel` (
  `IDPesanan` bigint(255) NOT NULL,
  `IDSampel` bigint(20) UNSIGNED NOT NULL,
  `IDKatalog` int(11) NOT NULL,
  `NoSampel` int(11) DEFAULT NULL,
  `JenisSampel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BentukSampel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kemasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `JenisAnalisis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HargaSampel` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sampel`
--

INSERT INTO `sampel` (`IDPesanan`, `IDSampel`, `IDKatalog`, `NoSampel`, `JenisSampel`, `BentukSampel`, `Kemasan`, `Jumlah`, `JenisAnalisis`, `Metode`, `HargaSampel`) VALUES
(1, 1, 1, 1, 'Daun', 'Ekstrak', 'Toples', 5, 'Fitokimia', 'Visualisasi warna', 175000),
(3, 2, 1, 1, 'batang', 'Ekstrak', 'Toples', 9, 'Fitokimia', 'Visualisasi warna', 175000),
(4, 3, 1, 1, 'batang', 'Ekstrak', 'Toples', 9, 'Fitokimia', 'Visualisasi warna', 175000),
(5, 4, 1, 1, 'bom', 'Ekstrak', 'Toples', 9, 'Fitokimia', 'Visualisasi warna', 175000),
(6, 5, 2, 1, 'buah', 'Ekstrak', 'Toples', 4, 'Alkaloid', 'Visualisasi warna', 175000),
(7, 6, 2, 1, 'daun', 'Ekstrak', 'Toples', 4, 'Alkaloid', 'Visualisasi warna', 175000),
(8, 7, 1, 1, 'Daun', 'Ekstrak', 'Kardus', 8, 'Fitokimia', 'Visualisasi warna', 175000),
(9, 8, 1, 1, 'Daun', 'Ekstrak', 'Plastik', 8, 'Fitokimia', 'Visualisasi warna', 175000),
(10, 9, 1, 1, 'Coba2', 'Ekstrak', 'Box', 100, 'Fitokimia', 'Visualisasi warna', 200000),
(10, 10, 2, 2, 'Coba', 'Ekstrak', 'Plastik', 8, 'Alkaloid', 'Visualisasi warna', 50000),
(11, 11, 2, 1, 'asd', 'Ekstrak', 'asd', 1, 'Alkaloid', 'Visualisasi warna', 50000),
(12, 12, 1, 1, 'daun baru', 'Ekstrak', 'Plastik', 8, 'Fitokimia', 'Visualisasi warna', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuspelacakan`
--

CREATE TABLE `statuspelacakan` (
  `IDStatus` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuspelacakan`
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
-- Struktur dari tabel `survey`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indeks untuk tabel `administrasipesanan`
--
ALTER TABLE `administrasipesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `bentuksampel`
--
ALTER TABLE `bentuksampel`
  ADD PRIMARY KEY (`IDKatalog`);

--
-- Indeks untuk tabel `dokumenpesanan`
--
ALTER TABLE `dokumenpesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`IDKatalog`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IDKategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`IDItem`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelacakan`
--
ALTER TABLE `pelacakan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDPelanggan`),
  ADD UNIQUE KEY `pelanggan_email_unique` (`Email`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`IDPemberitahuan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `sampel`
--
ALTER TABLE `sampel`
  ADD PRIMARY KEY (`IDSampel`);

--
-- Indeks untuk tabel `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  ADD PRIMARY KEY (`IDStatus`);

--
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrasipesanan`
--
ALTER TABLE `administrasipesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `bentuksampel`
--
ALTER TABLE `bentuksampel`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumenpesanan`
--
ALTER TABLE `dokumenpesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IDKategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `IDItem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `pelacakan`
--
ALTER TABLE `pelacakan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IDPelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `IDPemberitahuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sampel`
--
ALTER TABLE `sampel`
  MODIFY `IDSampel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  MODIFY `IDStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
