-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2019 pada 03.23
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
-- Struktur dari tabel `bentuksample`
--

CREATE TABLE `bentuksample` (
  `IDKatalog` int(11) NOT NULL,
  `Ekstrak` tinyint(1) NOT NULL,
  `Cairan` tinyint(1) NOT NULL,
  `Serbuk` tinyint(1) NOT NULL,
  `Simplisia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bentuksample`
--

INSERT INTO `bentuksample` (`IDKatalog`, `Ekstrak`, `Cairan`, `Serbuk`, `Simplisia`) VALUES
(1, 1, 0, 0, 1),
(2, 1, 0, 0, 1),
(3, 1, 1, 0, 1),
(4, 1, 1, 0, 1),
(5, 1, 1, 0, 1),
(6, 1, 1, 0, 1),
(7, 1, 0, 0, 0),
(8, 1, 0, 0, 0),
(9, 1, 0, 0, 1),
(10, 1, 0, 0, 1),
(11, 0, 0, 1, 1),
(12, 0, 0, 1, 1),
(13, 1, 0, 0, 0),
(14, 1, 1, 1, 1);

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
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `DitambahkanPada` timestamp NULL DEFAULT NULL,
  `DiupdatePada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`IDKatalog`, `IDKategori`, `JenisAnalisis`, `HargaIPB`, `HargaNONIPB`, `Metode`, `Keterangan`, `Status`, `DitambahkanPada`, `DiupdatePada`) VALUES
(1, 1, 'Fitokimia', 175000, 200000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-11 23:00:00', '2019-02-11 23:00:00'),
(2, 1, 'Alkaloid', 45000, 50000, 'Visualisasi warna', 'Kualitatif', 1, '2019-02-11 23:00:00', '2019-02-11 23:00:00'),
(3, 2, 'Kapang/kamir', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(4, 2, 'PCA(TPC)', 110000, 125000, 'Cawan tuang', 'Keamanan mikroba', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(5, 3, 'Pb', 110000, 125000, 'AAS', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(6, 3, 'Cd', 110000, 125000, 'AAS', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(7, 4, 'Androgafolida', 465000, 535000, 'HPLC', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(8, 4, 'Apigenin', 950000, 1100000, 'HPLC', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(9, 5, 'Kadar abu', 30000, 35000, 'Gravimetri', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(10, 5, 'Kadar Abu tak larut asam', 55000, 65000, 'Gravimetri', 'Kuantitatif', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(11, 6, 'Ekstraksi 50 gram', 350000, 410000, 'Maserasi', NULL, 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(12, 6, 'Ekstraksi 100 gram', 600000, 700000, 'Maserasi', NULL, 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(13, 7, 'Uji toksisitas', 130000, 150000, 'BSLT', 'Aktivitas', 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(14, 7, 'FTIR', 100000, 125000, 'Spektrometer', NULL, 1, '2019-02-11 17:00:00', '2019-02-11 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `IDKategori` int(10) UNSIGNED NOT NULL,
  `Kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IDKategori`, `Kategori`) VALUES
(1, 'Fitokimia'),
(2, 'Mikrobiologi'),
(3, 'Logam berat'),
(4, 'Senyawa penciri'),
(5, 'Kadar'),
(6, 'Ekstraksi'),
(7, 'Lainnya');

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
(50, '2019_02_11_021215_create_katalog_table', 1),
(51, '2019_02_11_023752_create__kategori_table', 1),
(52, '2019_02_11_025114_create__pelanggan_table', 1),
(53, '2019_02_11_025145_create__pesanan_table', 1),
(54, '2019_02_11_025213_create__sampel_table', 1),
(55, '2019_02_11_025242_create__pelacakan_table', 1),
(56, '2019_02_11_025332_create__status_pelacakan_table', 1),
(57, '2019_02_11_232439_create__bentuk_sample_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelacakan`
--

CREATE TABLE `pelacakan` (
  `IDPesanan` int(11) NOT NULL,
  `IDStatus` int(11) NOT NULL,
  `KirimSertifikat` tinyint(1) NOT NULL,
  `SisaDiterima` tinyint(1) NOT NULL,
  `SertifikatDiterima` tinyint(1) NOT NULL,
  `UpdateTerakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDPelanggan` int(10) UNSIGNED NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoHP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoIdentitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaBank` text COLLATE utf8mb4_unicode_ci,
  `NoRekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `IDPesanan` int(10) UNSIGNED NOT NULL,
  `IDPelanggan` int(11) NOT NULL,
  `NoPesanan` int(11) NOT NULL,
  `DiterimaTgl` timestamp NULL DEFAULT NULL,
  `SelesaiTgl` timestamp NULL DEFAULT NULL,
  `Asal` tinyint(1) NOT NULL,
  `Percepatan` tinyint(1) NOT NULL DEFAULT '0',
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KembalikanSampel` tinyint(1) NOT NULL DEFAULT '0',
  `TotalBiaya` bigint(20) NOT NULL,
  `BuktiPengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuktiPembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ulasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WaktuPemesanan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampel`
--

CREATE TABLE `sampel` (
  `IDPesanan` int(11) NOT NULL,
  `NoSampel` int(11) DEFAULT NULL,
  `JenisSampel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kemasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `JenisAnalisis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ListHargaSampel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuspelacakan`
--

CREATE TABLE `statuspelacakan` (
  `IDStatus` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDPelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`IDPesanan`);

--
-- Indeks untuk tabel `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  ADD PRIMARY KEY (`IDStatus`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `IDKatalog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IDKategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IDPelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `IDPesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statuspelacakan`
--
ALTER TABLE `statuspelacakan`
  MODIFY `IDStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
