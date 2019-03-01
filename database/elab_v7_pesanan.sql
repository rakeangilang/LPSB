-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 11:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `NamaRekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaBank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoRekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VerifikasiPembayaran` tinyint(1) NOT NULL DEFAULT '0',
  `CatatanPembatalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasipesanan`
--

INSERT INTO `administrasipesanan` (`IDPesanan`, `NamaLengkap`, `Institusi`, `Alamat`, `NoHP`, `Email`, `NoNPWP`, `PenerimaSampel`, `Jabatan`, `NamaRekening`, `NamaBank`, `NoRekening`, `VerifikasiPembayaran`, `CatatanPembatalan`) VALUES
(1, 'Gilang', 'IPB', 'bogor', '999', 'ganteng@banget.com', '9182938', NULL, NULL, 'h3h3', 'jabar', '231992', 0, NULL);

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
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 4, 1, 'batang', 'Ekstrak', 'Toples', '9'),
(3, 4, 1, 'Daun', 'Ekstrak', 'Toples', '4'),
(4, 4, 1, 'Daun', 'Ekstrak', 'Toples', '4'),
(5, 4, 2, 'Daun', 'Ekstrak', 'Toples', '4');

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
(124, '2019_02_27_131540_change_hargasampel_at_sampel_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pelacakan`
--

CREATE TABLE `pelacakan` (
  `IDPesanan` bigint(20) UNSIGNED NOT NULL,
  `IDStatus` int(11) NOT NULL DEFAULT '1',
  `KirimSertifikat` tinyint(1) NOT NULL DEFAULT '0',
  `SisaDiterima` tinyint(1) NOT NULL DEFAULT '0',
  `SertifikatDiterima` tinyint(1) NOT NULL DEFAULT '0',
  `UpdateTerakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WaktuPembayaran` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelacakan`
--

INSERT INTO `pelacakan` (`IDPesanan`, `IDStatus`, `KirimSertifikat`, `SisaDiterima`, `SertifikatDiterima`, `UpdateTerakhir`, `WaktuPembayaran`) VALUES
(1, 1, 0, 0, 0, '2019-03-01 03:13:31', NULL);

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
(1, 'gilang@gmail.com', '$2y$10$DzKfbp59nxqMDRvT1LZI/.iZSSfCxOH8mgRAoKAfV3YrwYyankzQy', '$2y$10$xn48cSPXGdD2OEDxom498OFpiWyE2wpuleslsTW81d0wIqz1.G.ga', 'gilang', 'IPB', 'Depok', '1111', NULL, '1234', 'gilang', 'bank ipb', '123'),
(2, 'kurt@gmail.com', '$2y$10$NXsCQt3uvicxRocilH1./e9oOeBMJdhRgcmaVOP2eauV9xLiM1BdS', '$2y$10$CyIeiFlBxY3Bn1wgWI5QiOzQL.mXbLQIS6D0T69u9zhaYw34GO94.', 'Curt', 'Nirvana', 'LA', '911', NULL, '66666', 'RekBaru', 'west bank', '222'),
(3, 'cobain@gmail.com', '$2y$10$cI319PC4RQDCMyWGQr6lyep.2WPFyyVw6PVnOfeJUhYe.SJbrXbLi', '$2y$10$mHVv3ychc2HoFjzsbr/1qeY6Y75w2kuE/vUhuz/0FLaoPXFOTfLbW', 'cobain', 'LP', 'Lincoln Park', '8989', NULL, '3423', 'cot', 'ba', '42'),
(4, 'tes@gmail.com', 'jir', '$2y$10$GwnXzVvfthGKXPqhXaB/PeaFT/vfJpRq1/B99ZtDa5Dh.FC8.gmjS', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'anakbaru@gmail.com', '$2y$10$KaumnjiGuMqTnN1vljMo.uddaWNxqGUjF2haKHiPySZKJ0YaTNk26', '$2y$10$apSUyxlwHgwc5eQse86w8eWlB75cZCGm26cijG6WgIa.NPLy5kIma', 'anakbaru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'jer@gmail.com', '$2y$10$ZbMzRkmcH752G9BguVoGxu/zK65RnJk/KXETFmh0HGcXikbp2/aVK', '$2y$10$ZYQr8QZwnQRmHgCcTnHo2Ohd4ZZU3qgF6pg8zJ/BwFTWHul5brCAe', 'jer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'aaa@gmail.com', '$2y$10$fiM1lB2k9HyLVe6fID02ZOZVUJsflpPn08arATkFv3hy6oshoV7ry', '$2y$10$SzBbzwfFsRAcBB3S6BsbtOEVlhf6ohvIjVXk9j5dsmRlIldo91NRO', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `IDPemberitahuan` bigint(20) UNSIGNED NOT NULL,
  `IDPesanan` bigint(20) NOT NULL,
  `IDStatus` int(11) NOT NULL,
  `Dilihat` tinyint(1) NOT NULL DEFAULT '0',
  `DimulaiPada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KembalikanSampel` tinyint(1) NOT NULL DEFAULT '0',
  `TotalHarga` bigint(20) NOT NULL,
  `WaktuPemesanan` timestamp NULL DEFAULT NULL,
  `Ulasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`IDPesanan`, `IDPelanggan`, `NoPesanan`, `DiterimaTgl`, `SelesaiTgl`, `Percepatan`, `Keterangan`, `KembalikanSampel`, `TotalHarga`, `WaktuPemesanan`, `Ulasan`) VALUES
(1, 4, 1, NULL, NULL, 1, NULL, 1, 8888, '2019-03-01 03:13:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sampel`
--

CREATE TABLE `sampel` (
  `IDPesanan` bigint(255) NOT NULL,
  `IDSampel` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `sampel` (`IDPesanan`, `IDSampel`, `NoSampel`, `JenisSampel`, `BentukSampel`, `Kemasan`, `Jumlah`, `JenisAnalisis`, `Metode`, `HargaSampel`) VALUES
(1, 1, 1, 'Daun', 'Ekstrak', 'Toples', '5', 'Fitokimia', 'Visualisasi warna', 175000);

-- --------------------------------------------------------

--
-- Table structure for table `statuspelacakan`
--

CREATE TABLE `statuspelacakan` (
  `IDStatus` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bentuksampel`
--
ALTER TABLE `bentuksampel`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumenpesanan`
--
ALTER TABLE `dokumenpesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `IDItem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `pelacakan`
--
ALTER TABLE `pelacakan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IDPelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `IDPemberitahuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `IDPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sampel`
--
ALTER TABLE `sampel`
  MODIFY `IDSampel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  MODIFY `IDStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
