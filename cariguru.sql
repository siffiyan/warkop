-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2020 pada 17.20
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cariguru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_les`
--

CREATE TABLE `biaya_les` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kurikulum_id` bigint(20) NOT NULL,
  `harga_tambahan_per_1` bigint(20) NOT NULL,
  `harga_90` int(11) NOT NULL,
  `harga_120` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biaya_les`
--

INSERT INTO `biaya_les` (`id`, `jenjang_id`, `kurikulum_id`, `harga_tambahan_per_1`, `harga_90`, `harga_120`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30000, 50000, 75000, NULL, '2020-09-01 00:07:29', '2020-09-01 00:07:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approve','reject','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_promo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `presentase` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `kode_promo`, `tanggal_mulai`, `tanggal_akhir`, `admin_id`, `presentase`, `created_at`, `updated_at`) VALUES
(1, 'semangatbelajar', '2020-09-01', '2020-09-30', NULL, 10, '2020-09-01 00:04:09', '2020-09-01 00:04:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id`, `jenjang`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'SMP', NULL, '2020-09-01 00:02:20', '2020-09-01 00:02:20'),
(2, 'SMA', NULL, '2020-09-01 00:02:25', '2020-09-01 00:02:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kurikulum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `kurikulum`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Kurukulum Nasional', NULL, '2020-09-01 00:01:15', '2020-09-01 00:01:32'),
(2, 'Kurikulum Internasional', NULL, '2020-09-01 00:01:41', '2020-09-01 00:01:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurikulum` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mata_pelajaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `jenjang`, `kurikulum`, `mata_pelajaran`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Matematika', NULL, '2020-09-01 00:03:09', '2020-09-01 00:03:09'),
(2, '1', '1', 'Biologi', NULL, '2020-09-01 00:03:24', '2020-09-01 00:03:24');

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
(1, '2020_08_08_070723_create_diskon_table', 1),
(2, '2020_08_08_071509_create_share_profit_table', 1),
(3, '2020_08_08_082507_create_jenjang_table', 1),
(4, '2020_08_08_094710_create_kurikulum_table', 1),
(5, '2020_08_09_014810_create_mata_pelajaran_table', 1),
(6, '2020_08_09_031204_create_blog_table', 1),
(7, '2020_08_15_082920_create_biaya_les_table', 1),
(8, '2020_08_17_163350_create_pengalaman_mengajar_mitra_table', 1),
(9, '2020_08_18_072014_create_prestasi_mitra_table', 1),
(10, '2020_08_18_125549_create_pilihan_mengajar_mitra_table', 1),
(11, '2020_08_19_165107_create_poin_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `pendidikan_terakhir` varchar(30) DEFAULT NULL,
  `nama_institusi` varchar(120) DEFAULT NULL,
  `prodi` varchar(120) DEFAULT NULL,
  `foto_profil` varchar(100) NOT NULL DEFAULT 'guru.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat_domisili`, `no_hp`, `pendidikan_terakhir`, `nama_institusi`, `prodi`, `foto_profil`, `created_at`, `updated_at`) VALUES
(5, 'abidah kamilah', 'abidahkamilah@gmail.com', '$2y$10$40.Ultth/RSz1cTSSqjwTOQ0YDg.PMGHtbgk5UBpqjCAL8RU7Aa7i', 'Surabaya', NULL, NULL, '08564737272', 'S1', 'Universitas Airlangga', 'Sistem Informasi', '1598944989a.png', '2020-09-01 07:23:09', '2020-09-01 00:23:09'),
(6, 'kenny karnama', 'kennykarnama@gmail.com', '$2y$10$cmEiHTdm0jjxl4XcyrZnr.uoZ0GkyowinCWZmx1ZahA.NFjzg8S6i', 'Sidoarjo', NULL, NULL, '08564731212', 'S1', 'Institut Teknologi Sepuluh November', 'Matematika', 'guru.png', '2020-09-02 06:13:14', '2020-09-01 00:18:46'),
(7, 'Pratomo Adi', 'pratomo@gmail.com', '$2y$10$kMgB.e2XOO/P3zF152ndGuTTVRtgl3sksf8OotvaCsi6QgmP2aQWG', 'Surabaya', NULL, NULL, '08564321272', 'S1', 'Universitas Negeri Surabaya', 'Matematika', '1598945078b.png', '2020-09-01 13:40:32', '2020-09-01 06:40:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`id`, `nama`, `username`, `email`, `password`, `no_hp`, `alamat`, `tanggal_lahir`, `verified`, `created_at`, `updated_at`) VALUES
(2, 'siffiyan assauri', 'siffiyan', 'siffiyanassauri@gmail.com', '$2y$10$hgglNXjyVTfZp/6s1hQQM.jZOXyiRbLSKNw/IhIgo8mQfn.M5K.tS', '082137870821', NULL, NULL, 0, '2020-08-31 23:58:02', '2020-08-31 23:58:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman_mengajar_mitra`
--

CREATE TABLE `pengalaman_mengajar_mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_mengajar_mitra`
--

CREATE TABLE `pilihan_mengajar_mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kurikulum_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pilihan_mengajar_mitra`
--

INSERT INTO `pilihan_mengajar_mitra` (`id`, `mitra_id`, `jenjang_id`, `kurikulum_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 1, '2020-09-01 00:18:57', '2020-09-01 00:18:57'),
(2, 5, 1, 1, 2, '2020-09-01 00:19:23', '2020-09-01 00:19:23'),
(3, 7, 1, 1, 1, '2020-09-01 06:40:39', '2020-09-01 06:40:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi_mitra`
--

CREATE TABLE `prestasi_mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `keterangan_prestasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `share_profit`
--

CREATE TABLE `share_profit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner` int(11) NOT NULL,
  `mitra` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `share_profit`
--

INSERT INTO `share_profit` (`id`, `owner`, `mitra`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 80, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `total_biaya` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `murid_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `judul`, `total_biaya`, `status`, `murid_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(7, 'Les Matematika Kurukulum Nasional SMP', 130000, 'menunggu pembayaran', 2, NULL, '2020-09-04 14:11:30', NULL),
(8, 'Les Matematika Kurukulum Nasional SMP', 130000, 'menunggu pembayaran', 2, NULL, '2020-09-04 15:04:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `tanggal_pertemuan` datetime DEFAULT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `biaya` double NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `tanggal_pertemuan`, `jumlah_orang`, `durasi`, `biaya`, `transaksi_id`, `created_at`, `updated_at`) VALUES
(3, NULL, 1, 90, 50000, 7, NULL, NULL),
(4, NULL, 2, 90, 80000, 7, NULL, NULL),
(5, NULL, 1, 90, 50000, 8, NULL, NULL),
(6, NULL, 2, 90, 80000, 8, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biaya_les`
--
ALTER TABLE `biaya_les`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biaya_les_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diskon_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenjang_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kurikulum_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_pelajaran_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengalaman_mengajar_mitra`
--
ALTER TABLE `pengalaman_mengajar_mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengalaman_mengajar_mitra_mitra_id_foreign` (`mitra_id`);

--
-- Indeks untuk tabel `pilihan_mengajar_mitra`
--
ALTER TABLE `pilihan_mengajar_mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilihan_mengajar_mitra_mitra_id_foreign` (`mitra_id`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poin_mitra_id_foreign` (`mitra_id`);

--
-- Indeks untuk tabel `prestasi_mitra`
--
ALTER TABLE `prestasi_mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasi_mitra_mitra_id_foreign` (`mitra_id`);

--
-- Indeks untuk tabel `share_profit`
--
ALTER TABLE `share_profit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `share_profit_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `biaya_les`
--
ALTER TABLE `biaya_les`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengalaman_mengajar_mitra`
--
ALTER TABLE `pengalaman_mengajar_mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pilihan_mengajar_mitra`
--
ALTER TABLE `pilihan_mengajar_mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `poin`
--
ALTER TABLE `poin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi_mitra`
--
ALTER TABLE `prestasi_mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `share_profit`
--
ALTER TABLE `share_profit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `biaya_les`
--
ALTER TABLE `biaya_les`
  ADD CONSTRAINT `biaya_les_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD CONSTRAINT `jenjang_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD CONSTRAINT `kurikulum_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengalaman_mengajar_mitra`
--
ALTER TABLE `pengalaman_mengajar_mitra`
  ADD CONSTRAINT `pengalaman_mengajar_mitra_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pilihan_mengajar_mitra`
--
ALTER TABLE `pilihan_mengajar_mitra`
  ADD CONSTRAINT `pilihan_mengajar_mitra_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi_mitra`
--
ALTER TABLE `prestasi_mitra`
  ADD CONSTRAINT `prestasi_mitra_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `share_profit`
--
ALTER TABLE `share_profit`
  ADD CONSTRAINT `share_profit_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
