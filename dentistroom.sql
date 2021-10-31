-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2021 pada 05.45
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentistroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dentalrecords`
--

CREATE TABLE `dentalrecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggalkunjungan` date NOT NULL,
  `norm` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggallahir` date NOT NULL,
  `umurtahun` int(11) NOT NULL,
  `umurbulan` int(11) NOT NULL,
  `umurhari` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `pasien` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Baru',
  `diag_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dentalrecords`
--

INSERT INTO `dentalrecords` (`id`, `tanggalkunjungan`, `norm`, `nama`, `jeniskelamin`, `tanggallahir`, `umurtahun`, `umurbulan`, `umurhari`, `village_id`, `school_id`, `pasien`, `diag_id`, `treatment_id`, `obat`, `image`, `catatan`, `user_id`, `created_at`, `updated_at`) VALUES
(5, '2021-01-04', '0766', 'Ny. Masnah', 'Perempuan', '1979-10-06', 41, 2, 28, 6, NULL, 'Baru', 25, 7, 'Asmet 3x1\r\nAmox 3x1', NULL, 'Gigi 18', 1, '2021-01-03 20:55:06', '2021-01-17 22:56:41'),
(6, '2021-01-04', '302', 'An. Salma', 'Perempuan', '2017-09-20', 3, 3, 14, 2, NULL, 'Lama', 25, 7, 'Amox syr 3x1 cth', NULL, 'Gigi 84', 1, '2021-01-03 23:49:40', '2021-01-17 22:56:53'),
(19, '2021-02-22', '0220', 'An. Peri Ardianto', 'Laki-laki', '1995-10-07', 25, 4, 15, 1, NULL, 'Lama', 25, 1, 'Asmet 3x1\r\nAmox 3x1', NULL, 'Gigi 26', 1, '2021-02-21 23:20:40', '2021-02-21 23:20:40'),
(71, '2021-07-15', '0133', 'Nn. Andeni Oktarina Sari', 'Perempuan', '2001-10-28', 19, 8, 17, 1, NULL, 'Baru', 25, 7, 'Asmet 3x1\r\nAmox 3x1', NULL, 'Gigi 36\r\nTgl lhr 28102001', 1, '2021-07-14 19:11:29', '2021-07-14 19:11:29'),
(75, '2021-08-07', NULL, 'An. Najwa Asyilah', 'Perempuan', '2014-05-31', 7, 2, 6, 2, NULL, 'Baru', 25, 2, 'Pct 3x1/2', NULL, 'Gigi 51,52\r\nTgl lhr 31052014', 1, '2021-08-06 20:28:31', '2021-08-06 20:28:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dentistguests`
--

CREATE TABLE `dentistguests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `cektahun` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dentistguests`
--

INSERT INTO `dentistguests` (`id`, `tahun`, `cektahun`, `created_at`, `updated_at`) VALUES
(1, 2020, 0, '2020-12-16 07:40:24', '2021-01-03 21:05:41'),
(2, 2019, 0, '2020-12-16 07:40:24', '2021-01-03 21:05:41'),
(3, 2018, 0, '2020-12-16 07:40:24', '2021-01-03 21:05:41'),
(4, 2017, 0, '2020-12-16 07:40:24', '2021-01-03 21:05:41'),
(5, 2016, 0, '2020-12-16 07:40:24', '2020-12-16 08:07:22'),
(6, 2021, 1, '2021-01-03 21:05:36', '2021-01-03 21:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diags`
--

CREATE TABLE `diags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onoff` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diags`
--

INSERT INTO `diags` (`id`, `kode`, `diagnosa`, `onoff`, `created_at`, `updated_at`) VALUES
(1, 'B379', 'Kandidiasis Mulut', 1, NULL, '2020-12-17 08:32:14'),
(8, 'K00.0', 'Anadontia', 1, '2020-12-17 00:39:25', '2020-12-17 08:32:41'),
(10, 'K01', 'Embeded and impacted teeth', 1, '2020-12-17 00:40:21', '2020-12-17 00:40:21'),
(12, 'K02.0', 'Caries Enamel', 1, '2020-12-17 00:41:42', '2020-12-17 00:41:42'),
(13, 'K02.1', 'Caries of dentine', 1, '2020-12-17 00:42:06', '2020-12-17 00:42:06'),
(16, 'K03.1', 'Abrasion of teeth', 1, '2020-12-17 00:44:46', '2020-12-17 00:44:46'),
(17, 'K03.2', 'Erosion of teeth', 1, '2020-12-17 00:45:04', '2020-12-17 00:45:04'),
(19, 'K03.4', 'Hypercementosis', 0, '2020-12-17 00:45:47', '2020-12-17 08:37:28'),
(20, 'K03.5', 'Ankylosis of teeth', 0, '2020-12-17 00:46:08', '2020-12-17 19:00:01'),
(23, 'K03.8', 'Dentin sensitive', 1, '2020-12-17 00:47:27', '2020-12-17 00:47:27'),
(25, 'K04.0', 'Pulpitis', 1, '2020-12-17 00:48:43', '2020-12-17 00:48:43'),
(26, 'K04.1', 'Nekrosis pulpa', 1, '2020-12-17 00:49:09', '2020-12-17 00:49:09'),
(29, 'K04.4', 'Apikal periodontitis akut dari asal pulpa', 1, '2020-12-17 00:50:29', '2020-12-17 00:50:29'),
(30, 'K04.5', 'Apikal periodontitis kronis', 1, '2020-12-17 00:50:52', '2020-12-17 00:50:52'),
(34, 'K05.0', 'Gingivitis akut', 1, '2020-12-17 00:52:26', '2020-12-17 00:52:26'),
(35, 'K05.1', 'Gingivitis kroonis', 1, '2020-12-17 00:52:58', '2020-12-17 00:52:58'),
(36, 'K05.2', 'periodontitis akut', 1, '2020-12-17 00:54:46', '2020-12-17 00:54:46'),
(37, 'K05.3', 'Periodontitis kronis', 1, '2020-12-17 00:55:05', '2020-12-17 19:17:03'),
(45, 'K07.4', 'Malocclusion, unspicified', 1, '2020-12-17 01:00:01', '2020-12-17 01:00:01'),
(56, 'K12', 'Stomatitis and related lesions (sariawan)', 0, '2020-12-17 01:05:33', '2020-12-17 18:54:34'),
(68, 'Z01.2', 'Pemeriksaan gigi', 1, '2020-12-17 01:11:42', '2020-12-17 01:11:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_14_112350_create_dentalrecords_table', 2),
(5, '2020_12_14_112447_create_villages_table', 2),
(6, '2020_12_14_112511_create_dentistguests_table', 2),
(7, '2020_12_14_112541_create_treatments_table', 2),
(8, '2020_12_14_112608_create_schools_table', 2),
(9, '2020_12_14_112744_create_diags_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schools`
--

INSERT INTO `schools` (`id`, `sekolah`, `created_at`, `updated_at`) VALUES
(1, 'SMUN 1 Bunguran Utara', '2020-12-17 23:43:31', '2020-12-17 23:43:31'),
(2, 'SMPN 1 Bunguran Utara', '2021-10-30 21:02:58', '2021-10-30 21:02:58'),
(3, 'SDN 001 Kelarik Air Mali', '2021-10-30 21:03:46', '2021-10-30 21:03:46'),
(4, 'SDN 002 Kelarik', '2021-10-30 21:03:59', '2021-10-30 21:03:59'),
(5, 'SDN 003 Kelarik Utara', '2021-10-30 21:04:13', '2021-10-30 21:04:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tindakan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `treatments`
--

INSERT INTO `treatments` (`id`, `tindakan`, `created_at`, `updated_at`) VALUES
(1, 'Pencabutan gigi tetap', '2020-12-17 01:14:38', '2020-12-17 01:14:38'),
(2, 'Pencabutan gigi susu', '2020-12-17 01:15:07', '2020-12-17 01:15:07'),
(3, 'Penumpatan gigi tetap', '2020-12-17 01:15:16', '2020-12-17 01:15:16'),
(4, 'Penumpatan gigi susu', '2020-12-17 01:15:26', '2020-12-17 01:15:26'),
(5, 'Tindakan endodonti', '2020-12-17 01:16:00', '2020-12-17 01:16:00'),
(6, 'Scalling', '2020-12-17 01:16:13', '2020-12-17 01:16:13'),
(7, 'Premedikasi/pemberian obat', '2020-12-17 01:17:04', '2020-12-17 01:17:38'),
(8, 'Pemeriksaan gigi sehat dan konsultasi', '2020-12-17 01:17:59', '2020-12-17 01:17:59'),
(9, 'Rujuk', '2020-12-17 01:18:05', '2020-12-17 01:18:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `position`, `image`, `expired`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'drg. Natuna', 'dentist', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 'dentist', 'images/profile/drg.png', NULL, NULL, NULL, '2021-10-30 15:18:43'),
(2, 'Guest', 'guest', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 'dentistguest', 'images/profile/drg.png', '2021-12-31', NULL, NULL, '2021-01-17 20:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `villages`
--

INSERT INTO `villages` (`id`, `desa`, `created_at`, `updated_at`) VALUES
(1, 'Desa Kelarik', '2020-12-17 00:27:36', '2020-12-17 00:27:36'),
(2, 'Desa Kelarik Utara', '2021-01-03 20:59:23', '2021-01-03 20:59:23'),
(5, 'Kelarik Air Mali', '2021-01-03 21:00:02', '2021-01-03 21:00:02'),
(6, 'Desa Belakang Gunung', '2021-01-03 21:00:37', '2021-01-03 21:00:37'),
(8, 'Desa Gunung Durian', '2021-01-03 21:00:59', '2021-01-03 21:00:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dentalrecords`
--
ALTER TABLE `dentalrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dentistguests`
--
ALTER TABLE `dentistguests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diags`
--
ALTER TABLE `diags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dentalrecords`
--
ALTER TABLE `dentalrecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `dentistguests`
--
ALTER TABLE `dentistguests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `diags`
--
ALTER TABLE `diags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
