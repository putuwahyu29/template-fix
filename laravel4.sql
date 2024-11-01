-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2024 pada 02.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_06_144627_create_role_master_table', 1),
(7, '2023_07_06_144717_create_role_user_table', 1),
(8, '2024_09_21_150856_create_jobs_table', 1),
(9, '2024_10_19_151525_create_user_profiles_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sifulan@gmail.com', '$2y$10$KiXBGn.0/wPtLxRAwLvlIOirnzHYQMERGk2WV5oT8V8BqZcBD5SPa', '2024-10-31 01:23:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawasan`
--

CREATE TABLE `pengawasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Pengawas` varchar(255) NOT NULL,
  `Kegiatan` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam_Mulai` time NOT NULL,
  `Jam_Selesai` time NOT NULL,
  `Coordinates` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Petugas` varchar(255) NOT NULL,
  `Catatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengawasan`
--

INSERT INTO `pengawasan` (`id`, `Nama_Pengawas`, `Kegiatan`, `Tanggal`, `Jam_Mulai`, `Jam_Selesai`, `Coordinates`, `Alamat`, `Petugas`, `Catatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'biljono', 'Pengawasan', '2024-02-07', '09:03:41', '09:03:42', '-7.32835,112.72845', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'Likah(sakernas)', 'Pengumpulan dokumen', 'a', NULL, NULL),
(2, 'biljono', 'Pengawasan', '0000-00-00', '09:03:41', '09:03:42', '-7.32835,112.72845', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'fvv', 'dff', 'a ', NULL, NULL),
(3, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen', 'b ', NULL, NULL),
(4, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen', 'a ', NULL, NULL),
(5, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen', 'b ', NULL, NULL),
(6, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '14:11:12', '14:12:47', '-7.29165,112.74072', 'Jl. Serayu No.33, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241, Indonesia', 'Endang Rusmianingsih', 'Penerimaan Dokumen DSRT blok 042B Kelurahan Ketintang', 'a ', NULL, NULL),
(7, 'sulrini', 'Pengawasan', '0000-00-00', '15:25:21', '15:26:32', '-7.32903,112.72806', 'Jl. Gayung Kebonsari No.152A, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'pengumpulan dokumen', '', 'b ', NULL, NULL),
(8, 'sulrini', 'Pengawasan', '0000-00-00', '15:25:21', '15:26:32', '-7.32903,112.72806', 'Jl. Gayung Kebonsari No.152A, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'pengumpulan dokumen', '', 'a ', NULL, NULL),
(9, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '16:19:34', '16:20:04', '-7.32877,112.74751', 'Jl. Raya Kendangsari Gg. II No.5, Kendangsari, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292, Indonesia', 'Sri Prasetyanti (SUSENAS(', 'penyerahan dokumen DSRT', 'b ', NULL, NULL),
(10, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '16:19:34', '16:20:04', '-7.32877,112.74751', 'Jl. Raya Kendangsari Gg. II No.5, Kendangsari, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292, Indonesia', 'Sri Prasetyanti (SUSENAS(', 'penyerahan dokumen DSRT', 'a ', NULL, NULL),
(11, 'akhdiri', 'Pengawasan', '0000-00-00', '10:03:54', '10:38:24', '-7.21005,112.77594', 'Jl. Tambak Wedi No.28, RT.003/RW.02, Tambak Wedi, Kec. Kenjeran, Surabaya, Jawa Timur 60126, Indonesia', 'snapshot', '', 'b ', NULL, NULL),
(12, 'ichuadi', 'Pengawasan', '0000-00-00', '10:54:46', '10:59:05', '-7.25822,112.74728', 'Jl. Sedap Malam No.1-7, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272, Indonesia', 'Ichwan ( Panjang Jalan) ', '', 'a ', NULL, NULL),
(13, 'faharno', 'Pengawasan', '0000-00-00', '15:52:52', '15:54:51', '-7.32835,112.72842', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'likah(sakernas)', '', 'b ', NULL, NULL),
(14, 'parutri', 'Pengawasan', '0000-00-00', '10:54:42', '10:54:43', '-7.23222,112.62668', 'Pondok Benowo Indah blok BW-01, RT.02, RW.09 Surabaya, Babat Jerawat, Kec. Pakal, Surabaya, Jawa Timur 60197, Indonesia', 'kpps', '', 'a ', NULL, NULL),
(15, 'faharno', 'Pengawasan', '0000-00-00', '10:19:48', '11:25:17', '-7.22879,112.77354', 'Jl. Kalilom Lor III Jl. Kalilom Lor No.24, RT.004/RW.03, Tanah Kali Kedinding, Kec. Kenjeran, Surabaya, Jawa Timur 60129, Indonesia', 'tatik(sakernas)', '', 'b ', NULL, NULL),
(16, 'faharno', 'Pengawasan', '0000-00-00', '14:51:05', '14:49:42', '-7.2465,112.7197', 'Jl. Simo Gn. Bar. Tol Sidorukun Gg. III No.15, Dupak, Kec. Krembangan, Surabaya, Jawa Timur 60179, Indonesia', 'hanif (sakernas)', '', 'a ', NULL, NULL),
(17, 'faharno', 'Pengawasan', '0000-00-00', '16:27:18', '16:27:22', '-7.3284,112.72845', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'testing', '', 'b ', NULL, NULL),
(18, 'faharno', 'Pengawasan', '0000-00-00', '16:27:47', '16:27:22', '-7.3284,112.72845', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'testing', '', 'a ', NULL, NULL),
(19, 'andyadi', 'Pengawasan', '0000-00-00', '09:48:00', '09:47:57', '-7.29819,112.7552', 'Jl. Bratang Wetan III A No.4-G, RT.007/RW.08, Ngagelrejo, Kec. Wonokromo, Surabaya, Jawa Timur 60245, Indonesia', 'devie (seruti )', '', 'b ', NULL, NULL),
(20, 'achyadi', 'Pengawasan', '0000-00-00', '09:54:11', '09:58:12', '-7.25829,112.75237', 'Jl. Kenikir No.16, RT.002/RW.02, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272, Indonesia', 'sakernas respondem pak toha', '', 'a ', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawasan1`
--

CREATE TABLE `pengawasan1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Survei` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam_Mulai` time NOT NULL,
  `Jam_Selesai` time NOT NULL,
  `Coordinates` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Peserta` varchar(255) NOT NULL,
  `Catatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengawasan1`
--

INSERT INTO `pengawasan1` (`id`, `Nama`, `Survei`, `Tanggal`, `Jam_Mulai`, `Jam_Selesai`, `Coordinates`, `Alamat`, `Peserta`, `Catatan`, `created_at`, `updated_at`) VALUES
(1, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen ', NULL, NULL),
(2, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen ', NULL, NULL),
(3, 'sulrini', 'Pengawasan', '0000-00-00', '13:30:49', '13:31:47', '-7.3284,112.72841', 'Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235, Indonesia', 'susenas', 'pengumpulan dokumen ', NULL, NULL),
(4, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '14:11:12', '14:12:47', '-7.29165,112.74072', 'Jl. Serayu No.33, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241, Indonesia', 'Endang Rusmianingsih', 'Penerimaan Dokumen DSRT blok 042B Kelurahan Ketintang ', NULL, NULL),
(5, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '16:19:34', '16:20:04', '-7.32877,112.74751', 'Jl. Raya Kendangsari Gg. II No.5, Kendangsari, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292, Indonesia', 'Sri Prasetyanti (SUSENAS(', 'penyerahan dokumen DSRT ', NULL, NULL),
(6, 'nugrohoaryo', 'Pengawasan', '0000-00-00', '16:19:34', '16:20:04', '-7.32877,112.74751', 'Jl. Raya Kendangsari Gg. II No.5, Kendangsari, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292, Indonesia', 'Sri Prasetyanti (SUSENAS(', 'penyerahan dokumen DSRT ', NULL, NULL),
(7, 'retsati', 'Pengawasan', '0000-00-00', '09:23:28', '10:22:01', '-7.32816,112.72799', 'MPCH Q82, Gayungan, Surabaya, East Java 60235, Indonesia', 'sumarni', 'pengawasan susenas ', NULL, NULL),
(8, 'diawari', 'Pengawasan', '0000-00-00', '09:42:14', '10:37:46', '-7.26152,112.68056', 'Jl. Darmo Indah Barat I Blok AC No.22, Karangpoh, Kec. Tandes, Surabaya, Jawa Timur 60186, Indonesia', 'Janti Sulistyowati', 'SUSENAS SERUTI ', NULL, NULL),
(9, 'biljono', 'Pengawasan', '0000-00-00', '09:58:22', '10:43:14', '-7.24258,112.79178', 'Jl. Bambang Sutoro No.26, Komp. Kenjeran, Kec. Bulak, Surabaya, Jawa Timur 60121, Indonesia', 'Agustina (Susenas)', 'Semua item perlu disebutkan,,Sebelum menanyakan konsumsi tolong sebutkan rentang waktunya,,makanan jadi berbeda dengan bahan makanan instant,,kuantitas nya juga harus ditanyakan,,aplikasi lancar ', NULL, NULL),
(10, 'retsati', 'Pengawasan', '0000-00-00', '09:23:28', '10:22:01', '-7.32816,112.72799', 'MPCH Q82, Gayungan, Surabaya, East Java 60235, Indonesia', 'sumarni', 'pengawasan susenas ', NULL, NULL),
(11, 'retsati', 'Pengawasan', '0000-00-00', '09:23:28', '10:22:01', '-7.32816,112.72799', 'MPCH Q82, Gayungan, Surabaya, East Java 60235, Indonesia', 'sumarni (susenas)', 'pengawasan susenas ', NULL, NULL),
(12, 'roberth', 'Pengawasan', '0000-00-00', '10:57:23', '11:06:24', '-7.2551,112.75092', 'Jl. Ambengan Batu II No.9, RT.002/RW.04, Tambaksari, Kec. Tambaksari, Surabaya, Jawa Timur 60136, Indonesia', 'dwi ernawati (susenas)', 'responden : prihartiningsih ', NULL, NULL),
(13, 'diawari', 'Pengawasan', '0000-00-00', '11:00:32', '11:48:05', '-7.26199,112.68129', 'Darmo Indah Barat VI Blok AD No.37, Karangpoh, Kec. Tandes, Surabaya, Jawa Timur 60186, Indonesia', 'Janti S', 'SERUTI ', NULL, NULL),
(14, 'faliman', 'Pengawasan', '0000-00-00', '09:42:44', '11:48:09', '-7.34288,112.79608', 'No address available', 'Falah Susenas', 'Pengawasan Susenas ', NULL, NULL),
(15, 'faliman', 'Pengawasan', '0000-00-00', '09:50:21', '11:57:07', '-7.34287,112.79608', 'No address available', 'Ika Puji Indrasari SUSENAS', 'Pengawasan Susenas ', NULL, NULL),
(16, 'Winarsih', 'Pengawasan', '0000-00-00', '13:05:31', '13:19:18', '-7.27918,112.72598', 'Banyu Urip Wetan V No.32E, RT.004/RW.04, Putat Jaya, Kec. Sawahan, Surabaya, Jawa Timur 60255, Indonesia', 'EMMi ROFIK', 'Pengawasan pencacahan Susenas ', NULL, NULL),
(17, 'faliman', 'Pengawasan', '0000-00-00', '12:40:04', '14:44:38', '-7.31601,112.77587', 'Jl. Kedung Asem No.111, Kedung Baruk, Kec. Rungkut, Surabaya, Jawa Timur 60298, Indonesia', 'Maftukah SUSENAS', 'Pengawasan SUSENAS ', NULL, NULL),
(18, 'faliman', 'Pengawasan', '0000-00-00', '12:40:04', '14:44:38', '-7.31601,112.77587', 'Jl. Kedung Asem No.111, Kedung Baruk, Kec. Rungkut, Surabaya, Jawa Timur 60298, Indonesia', 'Maftukah SUSENAS', 'Pengawasan SUSENAS ', NULL, NULL),
(19, 'roberth', 'Pengawasan', '0000-00-00', '17:13:59', '18:29:29', '-7.25501,112.75101', 'Jl. Ambengan Batu II No.15, RT.002/RW.04, Tambaksari, Kec. Tambaksari, Surabaya, Jawa Timur 60136, Indonesia', 'dwi ernawati (susenas)', 'responden : slamet riyadi ', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_master`
--

CREATE TABLE `role_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_master`
--

INSERT INTO `role_master` (`id`, `role_name`, `role_code`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'ROLE_USER', NULL, NULL),
(2, 'Operator', 'ROLE_OPERATOR', NULL, NULL),
(3, 'Supervisor', 'ROLE_SUPERVISOR', NULL, NULL),
(4, 'Administrator', 'ROLE_ADMIN', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 1, 3, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 3, 3, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 5, 1, NULL, NULL),
(12, 6, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(13, 7, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(14, 8, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(15, 9, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(16, 10, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(17, 11, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(18, 12, 1, '2024-10-31 00:39:42', '2024-10-31 00:39:42'),
(19, 13, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(20, 14, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(21, 15, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(22, 16, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(23, 17, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(24, 18, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(25, 19, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(26, 20, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(27, 21, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(28, 22, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(29, 23, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(30, 24, 1, '2024-10-31 00:39:43', '2024-10-31 00:39:43'),
(31, 25, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(32, 26, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(33, 27, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(34, 28, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(35, 29, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(36, 30, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(37, 31, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(38, 32, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(39, 33, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(40, 34, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(41, 35, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(42, 36, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(43, 37, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(44, 38, 1, '2024-10-31 00:39:44', '2024-10-31 00:39:44'),
(45, 39, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(46, 40, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(47, 41, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(48, 42, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(49, 43, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(50, 44, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(51, 45, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(52, 46, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(53, 47, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(54, 48, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(55, 49, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(56, 50, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(57, 51, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(58, 52, 1, '2024-10-31 00:39:45', '2024-10-31 00:39:45'),
(59, 53, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(60, 54, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(61, 55, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(62, 56, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(63, 57, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(64, 58, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(65, 59, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(66, 60, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(67, 61, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(68, 62, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(69, 63, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(70, 64, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(71, 65, 1, '2024-10-31 00:39:46', '2024-10-31 00:39:46'),
(72, 66, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(73, 67, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(74, 68, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(75, 69, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(76, 70, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(77, 71, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(78, 72, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(79, 73, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(80, 74, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(81, 75, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(82, 76, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(83, 77, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(84, 78, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(85, 79, 1, '2024-10-31 00:39:47', '2024-10-31 00:39:47'),
(86, 80, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(87, 81, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(88, 82, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(89, 83, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(90, 84, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(91, 85, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(92, 86, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(93, 87, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(94, 88, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(95, 89, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(96, 90, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(97, 91, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(98, 92, 1, '2024-10-31 00:39:48', '2024-10-31 00:39:48'),
(99, 93, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(100, 94, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(101, 95, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(102, 96, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(103, 97, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(104, 98, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(105, 99, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(106, 100, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(107, 101, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(108, 102, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(109, 103, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(110, 104, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(111, 105, 1, '2024-10-31 00:39:49', '2024-10-31 00:39:49'),
(112, 106, 1, '2024-10-31 00:41:12', '2024-10-31 00:41:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampel2024`
--

CREATE TABLE `sampel2024` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nama_survei` varchar(255) NOT NULL,
  `nama_responden` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sampel2024`
--

INSERT INTO `sampel2024` (`id`, `nama_petugas`, `nama_user`, `nama_survei`, `nama_responden`, `created_at`, `updated_at`) VALUES
(1, 'A. Karim', 'abdkarim', 'SHP', 'SINAR BAJA ELECTRIC, CV', NULL, NULL),
(2, 'A. Karim', 'abdkarim', 'SHP', 'DAYA SATYA ABRASIVES, PT', NULL, NULL),
(3, 'A. Karim', 'abdkarim', 'SHP', 'ACC. UD', NULL, NULL),
(4, 'A. Karim', 'abdkarim', 'SHP', 'TUNAS SEJATI PERKASA, PT', NULL, NULL),
(5, 'A. Karim', 'abdkarim', 'SHP', 'WELLGAN GEMILANG, PT', NULL, NULL),
(6, 'A. Karim', 'abdkarim', 'SHP', 'PINGAN SEAFOOD PRODUCT MANUFAKTUR, PT', NULL, NULL),
(7, 'A. Karim', 'abdkarim', 'SHP', 'KAIROS LOGAM MAKMUR, PT', NULL, NULL),
(8, 'A. Karim', 'abdkarim', 'SHP', 'TRIJAYA GEMILANG, CV', NULL, NULL),
(9, 'A. Karim', 'abdkarim', 'SHP', 'CIPTA WARNA JAYA, CV', NULL, NULL),
(10, 'Arifin', 'muhhafin', 'SHP', 'GOLDCOIN INDONESIA, PT', NULL, NULL),
(11, 'Arifin', 'muhhafin', 'SHP', 'INDOBERKA INVESTAMA, PT', NULL, NULL),
(12, 'Arifin', 'muhhafin', 'SHP', 'MATAHARI SAKTI, PT', NULL, NULL),
(13, 'Arifin', 'muhhafin', 'SHP', 'CARVIN ARTAMAS, PT', NULL, NULL),
(14, 'Arifin', 'muhhafin', 'SHP', 'SUPARINDO JAYA MAKMUR, PT', NULL, NULL),
(15, 'Arifin', 'muhhafin', 'SHP', 'BENTENG MAS ABADI, PT', NULL, NULL),
(16, 'Diah Muharini', 'dyaahini', 'SHP', 'GOLDEN CENDANA JAYA, PT', NULL, NULL),
(17, 'Diah Muharini', 'dyaahini', 'SHP', 'ALLNEX RESIN INDONESIA, PT', NULL, NULL),
(18, 'Diah Muharini', 'dyaahini', 'SHP', 'HANA COSMETIC, UD', NULL, NULL),
(19, 'Inur', 'inurinur', 'SHP', 'BAYER INDONESIA, PT', NULL, NULL),
(20, 'Inur', 'inurinur', 'SHP', 'AKTIF INDONESIA INDAH, PT', NULL, NULL),
(21, 'Inur', 'inurinur', 'SHP', 'MULTI ANEKA PANGAN NUSANTARA, PT', NULL, NULL),
(22, 'Inur', 'inurinur', 'SHP', 'TRANSGOLD, CV', NULL, NULL),
(23, 'Inur', 'inurinur', 'SHP', 'GOROM KENCANA, PT', NULL, NULL),
(24, 'Inur', 'inurinur', 'SHP', 'IKAN DORANG, PT', NULL, NULL),
(25, 'Inur', 'inurinur', 'SHP', 'LIMA BENUA KONEKSINDO', NULL, NULL),
(26, 'Kasiyanto', 'kasiyanto', 'SHP', 'ISHIZUKA MASPION INDONESIA, PT', NULL, NULL),
(27, 'Kasiyanto', 'kasiyanto', 'SHP', 'SUSANTI MEGAH, PT', NULL, NULL),
(28, 'Kasiyanto', 'kasiyanto', 'SHP', 'JISHUI MULIA ABADI, PT', NULL, NULL),
(29, 'Kasiyanto', 'kasiyanto', 'SHP', 'SS UTAMA SHOES DIVISION, PT', NULL, NULL),
(30, 'Kasiyanto', 'kasiyanto', 'SHP', 'KALEO PRIMA PERKASA, CV', NULL, NULL),
(31, 'Kasiyanto', 'kasiyanto', 'SHP', 'MAKMUR MARINA METALINDO, PT', NULL, NULL),
(32, 'Kasiyanto', 'kasiyanto', 'SHP', 'PAGODA PERKASA', NULL, NULL),
(33, 'Kasiyanto', 'kasiyanto', 'SHP', 'TUNAS JAYA SANTOSA, PT', NULL, NULL),
(34, 'Kasiyanto', 'kasiyanto', 'SHP', 'LIMAS ANUGRAH STEEL, PT', NULL, NULL),
(35, 'Kasiyanto', 'kasiyanto', 'SHP', 'GEMA LESTARI INDONESIA, PT', NULL, NULL),
(36, 'Kasiyanto', 'kasiyanto', 'SHP', 'SKYLINE JAYA, PT', NULL, NULL),
(37, 'Kasiyanto', 'kasiyanto', 'SHP', 'TRIAS ADATU CIPTA, PT', NULL, NULL),
(38, 'Kasiyanto', 'kasiyanto', 'SHP', 'GUNAWAN DIANJAYA STEEL TBK, PT', NULL, NULL),
(39, 'Lena', 'lenawati', 'SHP', 'GELORA DJAJA, PT', NULL, NULL),
(40, 'Lena', 'lenawati', 'SHP', 'HEPTASARI UNGGUL, PT', NULL, NULL),
(41, 'Lena', 'lenawati', 'SHP', 'PAKABAJA, PT', NULL, NULL),
(42, 'Lena', 'lenawati', 'SHP', 'PERURI WIRA TIMUR, PT', NULL, NULL),
(43, 'Mariatun', 'mariatun', 'SHP', 'GUNUNG SARI MAKMUR, PT', NULL, NULL),
(44, 'Mariatun', 'mariatun', 'SHP', 'MIRADO ABADI, PT', NULL, NULL),
(45, 'Mariatun', 'mariatun', 'SHP', 'REMAJA PRIMA ENGINEERING, PT', NULL, NULL),
(46, 'Mariatun', 'mariatun', 'SHP', 'DAMAI, CV', NULL, NULL),
(47, 'Nunik', 'nuniyuli', 'SHP', 'SINAR ALASKA MULIA PERKASA, PT', NULL, NULL),
(48, 'Nunik', 'nuniyuli', 'SHP', 'NISSO BAHARI, PT', NULL, NULL),
(49, 'Nunik', 'nuniyuli', 'SHP', 'KEDAWUNG SURYA IND LTD, PT', NULL, NULL),
(50, 'Nunik', 'nuniyuli', 'SHP', 'KEDAWUNG SUBUR, PT', NULL, NULL),
(51, 'Nunik', 'nuniyuli', 'SHP', 'METRO ABDIBINA SENTOSA, PT', NULL, NULL),
(52, 'Nunik', 'nuniyuli', 'SHP', 'CLASSIC PRIMA MARKET INDUSTRIES, PT', NULL, NULL),
(53, 'Siti Latifah', 'sitilatifah', 'SHP', 'SC JOHNSON MANUFACTURING SURABAYA', NULL, NULL),
(54, 'Siti Latifah', 'sitilatifah', 'SHP', 'VITAPHARM, PT', NULL, NULL),
(55, 'Siti Latifah', 'sitilatifah', 'SHP', 'SINAR ANGKASA RUNGKUT, PT', NULL, NULL),
(56, 'Siti Latifah', 'sitilatifah', 'SHP', 'SARANA INDAH JAYA, CV', NULL, NULL),
(57, 'Siti Latifah', 'sitilatifah', 'SHP', 'WINGS SURYA, PT', NULL, NULL),
(58, 'Siti Latifah', 'sitilatifah', 'SHP', 'DJATIM SURABAYA PERKASA, PT', NULL, NULL),
(59, 'Siti Latifah', 'sitilatifah', 'SHP', 'UTOMODECK METAL WORK, PT', NULL, NULL),
(60, 'Siti Latifah', 'sitilatifah', 'SHP', 'SMART CORPORATION, PT', NULL, NULL),
(61, 'Siti Latifah', 'sitilatifah', 'SHP', 'SURYA MULTI INDOPACK, PT', NULL, NULL),
(62, 'Siti Latifah', 'sitilatifah', 'SHP', 'MUTIARA CAHAYA PLATTINDO, PT', NULL, NULL),
(63, 'Soegiartatik', 'soegiartatik', 'SHP', 'METRONIK EKO PERTIWI, PT', NULL, NULL),
(64, 'Soegiartatik', 'soegiartatik', 'SHP', 'COLLEGE', NULL, NULL),
(65, 'Soegiartatik', 'soegiartatik', 'SHP', 'PREMIUM PARFUM INDONESIA, PT', NULL, NULL),
(66, 'Soegiartatik', 'soegiartatik', 'SHP', 'KAROSERI NGAGEL TAMA', NULL, NULL),
(67, 'Soesilo', 'soesilo', 'SHP', 'MAJU, UD', NULL, NULL),
(68, 'Soesilo', 'soesilo', 'SHP', 'PROFIL 88, CV', NULL, NULL),
(69, 'Soesilo', 'soesilo', 'SHP', 'KENT POWER DINAMIKA INDONESIA, PT', NULL, NULL),
(70, 'Soesilo', 'soesilo', 'SHP', 'BOGASARI, PT', NULL, NULL),
(71, 'Soesilo', 'soesilo', 'SHP', 'MITRA CAHAYA ABADI METALINDO PT.', NULL, NULL),
(72, 'Soesilo', 'soesilo', 'SHP', 'WELCO, PT', NULL, NULL),
(73, 'Soesilo', 'soesilo', 'SHP', 'ANDALAN BANGUN BUANA, PT', NULL, NULL),
(74, 'Soesilo', 'soesilo', 'SHP', 'KONVEKSI AYZAH', NULL, NULL),
(75, 'Soesilo', 'soesilo', 'SHP', 'SIGARET SRIWIDJAYA, PT', NULL, NULL),
(76, 'Soesilo', 'soesilo', 'SHP', 'SAMODRA MAS, CV', NULL, NULL),
(77, 'Soesilo', 'soesilo', 'SHP', 'MAKMUR, UD', NULL, NULL),
(78, 'Soesilo', 'soesilo', 'SHP', 'BOOMAX CHEMICAL WORK, PT', NULL, NULL),
(79, 'Soesilo', 'soesilo', 'SHP', 'KASA HUSADA WIRA JATIM, PT', NULL, NULL),
(80, 'Soesilo', 'soesilo', 'SHP', 'BEN SANTOSA, PT', NULL, NULL),
(81, 'Soesilo', 'soesilo', 'SHP', 'SAHATI HARAPAN TANGGUH, PT', NULL, NULL),
(82, 'Soesilo', 'soesilo', 'SHP', 'REMPEYEK TIYAH', NULL, NULL),
(83, 'Soesilo', 'soesilo', 'SHP', 'KONVEKSI SUMARNI', NULL, NULL),
(84, 'Soesilo', 'soesilo', 'SHP', 'ENAM JAYA OFFSET', NULL, NULL),
(85, 'Soesilo', 'soesilo', 'SHP', 'BAKWAN GILI', NULL, NULL),
(86, 'Soesilo', 'soesilo', 'SHP', 'BAK SAMPAH HASUN', NULL, NULL),
(87, 'Soesilo', 'soesilo', 'SHP', 'KACANG EMA', NULL, NULL),
(88, 'Soesilo', 'soesilo', 'SHP', 'PAGAR YOYOK', NULL, NULL),
(89, 'Soesilo', 'soesilo', 'SHP', 'KUSEN PINTU NAWAWI', NULL, NULL),
(90, 'Suprihatin', 'suphatin', 'SHP', 'SOLIHIN JAYA INDUSTRI', NULL, NULL),
(91, 'Suyono', 'suyono', 'SHP', 'CAMPINA, PT', NULL, NULL),
(92, 'Suyono', 'suyono', 'SHP', 'CENTRAL DIESEL, PT', NULL, NULL),
(93, 'Suyono', 'suyono', 'SHP', 'NYATA CORP, PT', NULL, NULL),
(94, 'Suyono', 'suyono', 'SHP', 'MENJANGAN, CV', NULL, NULL),
(95, 'Tatik', 'tattiati', 'SHP', 'MORODADI', NULL, NULL),
(96, 'Tatik', 'tattiati', 'SHP', 'SOFTNESS INDONESIA INDAH', NULL, NULL),
(97, 'Tatik', 'tattiati', 'SHP', 'GARUDA TOP PLASINDO. PT', NULL, NULL),
(98, 'Tatik', 'tattiati', 'SHP', 'RUNGKUT CAHAYA INDUSTRI', NULL, NULL),
(99, 'Tatik', 'tattiati', 'SHP', 'CATUR PUTRA SURYA, PT', NULL, NULL),
(100, 'Tatik', 'tattiati', 'SHP', 'IMEX TAMA, CV', NULL, NULL),
(101, 'Tatik', 'tattiati', 'SHP', 'SUMATRACO LANGGENG MAKMUR, PT', NULL, NULL),
(102, 'Tatik', 'tattiati', 'SHP', 'VARIA', NULL, NULL),
(103, 'Tatik', 'tattiati', 'SHP', 'KARYA BARU', NULL, NULL),
(104, 'Tatik', 'tattiati', 'SHP', 'ALMICOS PRATAMA', NULL, NULL),
(105, 'Tatik', 'tattiati', 'SHP', 'WISMA JAYA', NULL, NULL),
(106, 'Tatik', 'tattiati', 'SHP', 'INDONESIA MULTI COLOUR PRINTING, PT', NULL, NULL),
(107, 'Tatik', 'tattiati', 'SHP', 'ARJUNA UTAMA KIMIA, PT', NULL, NULL),
(108, 'Tatik', 'tattiati', 'SHP', 'KEN JAYA GARMEN, UD', NULL, NULL),
(109, 'Tatik', 'tattiati', 'SHP', 'CAHAYA ARGO TEKNIK', NULL, NULL),
(110, 'Tatik', 'tattiati', 'SHP', 'MATAHARI ANEKA JAYA', NULL, NULL),
(111, 'Tatik', 'tattiati', 'SHP', 'NIKI MAPAN', NULL, NULL),
(112, 'Tatik', 'tattiati', 'SHP', 'TAHU GO HANG BUN', NULL, NULL),
(113, 'Tatik', 'tattiati', 'SHP', 'DUTA SARANA PRATAMA, CV', NULL, NULL),
(114, 'Tatik', 'tattiati', 'SHP', 'UNTUNG BERSAMA SEJAHTERA, PT', NULL, NULL),
(115, 'Tatik', 'tattiati', 'SHP', 'CELLENE SHOES', NULL, NULL),
(116, 'Yusron', 'yusron', 'SHP', 'TRI INDAH JAYA', NULL, NULL),
(117, 'Yusron', 'yusron', 'SHP', 'DIMAS REIZA PERWIRA, PT', NULL, NULL),
(118, 'Yusron', 'yusron', 'SHP', 'BANGUN, UD', NULL, NULL),
(119, 'Yusron', 'yusron', 'SHP', 'TIGA RASA INDONESIA, PT', NULL, NULL),
(120, 'Yusron', 'yusron', 'SHP', 'LINTECH FUJIKEN ENGINEERING, PT', NULL, NULL),
(121, 'Yusron', 'yusron', 'SHP', 'GOOD YEAR, CV', NULL, NULL),
(122, 'Yusron', 'yusron', 'SHP', 'WARU GUNUNG, PT', NULL, NULL),
(123, 'Yusron', 'yusron', 'SHP', 'SIDOMUNCUL/PORNOMO SARI PLASTIK, UD', NULL, NULL),
(124, 'Yusron', 'yusron', 'SHP', 'ASIA PLASTIK, CV', NULL, NULL),
(125, 'Yusron', 'yusron', 'SHP', 'SUPARMA TBK, PT', NULL, NULL),
(126, 'Yusron', 'yusron', 'SHP', 'SUKSES MITRA SEJAHTERA, PT', NULL, NULL),
(127, 'Yusron', 'yusron', 'SHP', 'KARUNIA ALAM SEGAR, PT', NULL, NULL),
(128, 'Yusron', 'yusron', 'SHP', 'WONOSARI JAYA, PT', NULL, NULL),
(129, 'Djumain', 'djudjuma', 'SHPB', 'Bintang sakti', NULL, NULL),
(130, 'Djumain', 'djudjuma', 'SHPB', 'ASTELIA CELL', NULL, NULL),
(131, 'Djumain', 'djudjuma', 'SHPB', 'AKHOIRI', NULL, NULL),
(132, 'Djumain', 'djudjuma', 'SHPB', 'ASTA PARAWISINDA SENTAUSA, PT', NULL, NULL),
(133, 'Djumain', 'djudjuma', 'SHPB', 'ALPHA UTAMA MANDIRI', NULL, NULL),
(134, 'Eva Riana Dewi', 'evariewi', 'SHPB', 'PT ANTAR SURYA', NULL, NULL),
(135, 'Eva Riana Dewi', 'evariewi', 'SHPB', 'INDO KIMIA', NULL, NULL),
(136, 'Eva Riana Dewi', 'evariewi', 'SHPB', 'PT SURYA POLY PLAS', NULL, NULL),
(137, 'Eva Riana Dewi', 'evariewi', 'SHPB', 'CV KARUNIA', NULL, NULL),
(138, 'Eva Riana Dewi', 'evariewi', 'SHPB', 'PRIMA UNTUNG BERSAMA, PT', NULL, NULL),
(139, 'Fajar Z.', 'fajfari', 'SHPB', 'PT. MEGAH MEDIKA PHARMA', NULL, NULL),
(140, 'Fajar Z.', 'fajfari', 'SHPB', 'PT. KARUNIA DINAMIKA CEMERLANG', NULL, NULL),
(141, 'Fajar Z.', 'fajfari', 'SHPB', 'DELPHIA PRIMA JAYA, PT', NULL, NULL),
(142, 'Fajar Z.', 'fajfari', 'SHPB', 'SAI INDONESIA, PT', NULL, NULL),
(143, 'Inur', 'inurinur', 'SHPB', 'MULTI SARANA COMPUTER, PT', NULL, NULL),
(144, 'Inur', 'inurinur', 'SHPB', 'NEW RUKUN JAYA TEXTIL', NULL, NULL),
(145, 'Inur', 'inurinur', 'SHPB', 'UHATA CITRA INDO PRIMA, CV', NULL, NULL),
(146, 'Karim', 'abdkarim', 'SHPB', 'PT. KAIROS LOGAM MAKMUR', NULL, NULL),
(147, 'Karim', 'abdkarim', 'SHPB', 'Memorandum Sejahtera', NULL, NULL),
(148, 'Karim', 'abdkarim', 'SHPB', 'BHISMA SAKTI JAYA, PT', NULL, NULL),
(149, 'Karim', 'abdkarim', 'SHPB', 'JAYA MAKMUR GROSIR', NULL, NULL),
(150, 'Karim', 'abdkarim', 'SHPB', 'RICKY JAYA SAKTI, PT', NULL, NULL),
(151, 'Karim', 'abdkarim', 'SHPB', 'SUMBER INTI KIMIA', NULL, NULL),
(158, 'Karim', 'abdkarim', 'SHPB', 'UD SURYA TERANG SANTOSA', NULL, NULL),
(159, 'Karim', 'abdkarim', 'SHPB', 'TOKO BANGUNAN MEGA', NULL, NULL),
(160, 'Lena', 'lenawati', 'SHPB', 'ANUGRAH INDAH ABADI, CV', NULL, NULL),
(161, 'Lena', 'lenawati', 'SHPB', 'CAHAYA FAJAR, PT', NULL, NULL),
(162, 'Lena', 'lenawati', 'SHPB', 'DUNIA BAN', NULL, NULL),
(163, 'Lena', 'lenawati', 'SHPB', 'DEPO BANGUNAN (NUSANTARA BUIL', NULL, NULL),
(164, 'Lena', 'lenawati', 'SHPB', 'ECS INDO JAYA', NULL, NULL),
(165, 'MARIATUN', 'mariatun', 'SHPJ', 'HOKA-HOKA BENTO', NULL, NULL),
(166, 'MARIATUN', 'mariatun', 'SHPJ', 'UNIVERSITAS NAHDATUL ULAMA', NULL, NULL),
(167, 'MARIATUN', 'mariatun', 'SHPJ', 'PIZZA HUT MULYOSARI', NULL, NULL),
(168, 'MARIATUN', 'mariatun', 'SHPJ', 'AW', NULL, NULL),
(169, '169MARIATUN', 'mariatun', 'SHPJ', 'RSUD DR. M. SOEWANDHIE', NULL, NULL),
(170, 'MARIATUN', 'mariatun', 'SHPJ', 'PERUSAHAAN GAS NEGARA', NULL, NULL),
(171, 'MARIATUN', 'mariatun', 'SHPJ', 'PDAM SURYA SEMBADA', NULL, NULL),
(172, 'Mariatun', 'mariatun', 'SHPB', 'UD Karunia jaya', NULL, NULL),
(173, 'Mariatun', 'mariatun', 'SHPB', 'Toko Thomas', NULL, NULL),
(174, 'Mariatun', 'mariatun', 'SHPB', 'Penjual Daging ayam Hj. Noor', NULL, NULL),
(175, 'Mariatun', 'mariatun', 'SHPB', 'Dewa Ruci, ud', NULL, NULL),
(176, 'Mariatun', 'mariatun', 'SHPB', 'AJBS HOME CENTER', NULL, NULL),
(177, 'Mariatun', 'mariatun', 'SHPB', 'MPM DISTRIBUTOR', NULL, NULL),
(178, 'Mariatun', 'mariatun', 'SHPB', 'PEDAGANG MBAK NUR', NULL, NULL),
(179, 'Mariatun', 'mariatun', 'SHPB', 'UD PIRAMIDA', NULL, NULL),
(180, 'Mariatun', 'mariatun', 'SHPB', 'TOKO ANUGRAH JAYA', NULL, NULL),
(181, 'Mariatun', 'mariatun', 'SHPB', 'CV MULYA ABADI', NULL, NULL),
(182, 'PUTRA', 'rizkyp', 'SHPJ', 'UD. DINOYO BARU BERSATU', NULL, NULL),
(183, 'PUTRA', 'rizkyp', 'SHPJ', 'SARI AMPENAN, PT', NULL, NULL),
(184, 'PUTRA', 'rizkyp', 'SHPJ', 'SARANA BANDAR LOGISTIK, PT', NULL, NULL),
(185, 'PUTRA', 'rizkyp', 'SHPJ', 'ASDP INDONESIA FERRY', NULL, NULL),
(186, 'PUTRA', 'rizkyp', 'SHPJ', 'PELNI CABANG SURABAYA', NULL, NULL),
(187, 'Ratnawati', 'ratwati', 'SHPB', 'Restu kita', NULL, NULL),
(188, 'Ratnawati', 'ratwati', 'SHPB', 'ROTI RAMAYANA PT', NULL, NULL),
(189, 'Ratnawati', 'ratwati', 'SHPB', 'SUMBER MURNI, UD', NULL, NULL),
(190, 'Ratnawati', 'ratwati', 'SHPB', 'TITANI ALAM SEMESTA, PT', NULL, NULL),
(191, 'Ratnawati', 'ratwati', 'SHPB', 'WIMCYCLE (GUNAWAN SUTEDJA)', NULL, NULL),
(192, 'Ratnawati', 'ratwati', 'SHPB', 'TOKO KACA HASIL KARYA', NULL, NULL),
(193, 'Ratnawati', 'ratwati', 'SHPB', 'TOKO KAYU LOKA KARYA', NULL, NULL),
(194, 'Ratnawati', 'ratwati', 'SHPB', 'LIBRA MOTOR (ROJI)', NULL, NULL),
(195, 'Ratnawati', 'ratwati', 'SHPB', 'UD WONOSARI', NULL, NULL),
(196, 'SITI LATIFAH', 'sitilatifah', 'SHPJ', 'MCD RUNGKUT MADYA', NULL, NULL),
(197, 'SITI LATIFAH', 'sitilatifah', 'SHPJ', 'AYAM BAKAR PAK D', NULL, NULL),
(198, 'SITI LATIFAH', 'sitilatifah', 'SHPJ', 'SD IPH', NULL, NULL),
(199, 'SITI LATIFAH', 'sitilatifah', 'SHPJ', 'STIE ABI', NULL, NULL),
(200, 'SOESILO', 'soesilo', 'SHPJ', 'GERBANG SAMUDERA SARANA, PT', NULL, NULL),
(201, 'SOESILO', 'soesilo', 'SHPJ', 'SETIA PALENGGU, PT', NULL, NULL),
(202, 'SOESILO', 'soesilo', 'SHPJ', 'BAHTERA ADHI GUNA, PT', NULL, NULL),
(203, 'SOESILO', 'soesilo', 'SHPJ', 'HARTINI, PT', NULL, NULL),
(204, 'SOESILO', 'soesilo', 'SHPJ', 'META LYON NUSANTARA, CV', NULL, NULL),
(205, 'SOESILO', 'soesilo', 'SHPJ', 'KUNCI INTI TRANSINDO', NULL, NULL),
(206, 'SOESILO', 'soesilo', 'SHPJ', 'SURYA BINTANG TIMUR, PT', NULL, NULL),
(207, 'SOESILO', 'soesilo', 'SHPJ', 'PO PUSPA SARI', NULL, NULL),
(208, 'Soesilo', 'soesilo', 'SHPB', 'Jangkar, cv', NULL, NULL),
(209, 'Soesilo', 'soesilo', 'SHPB', 'AJBS STENERS', NULL, NULL),
(210, 'Soesilo', 'soesilo', 'SHPB', 'MEGA ELTRA,PT', NULL, NULL),
(211, 'Soesilo', 'soesilo', 'SHPB', 'MAYA MUNCAR, PT', NULL, NULL),
(212, 'Soesilo', 'soesilo', 'SHPB', 'PENJUAL IKAN PAK H. SHOLEH', NULL, NULL),
(213, 'Soesilo', 'soesilo', 'SHPB', 'R P H', NULL, NULL),
(214, 'Soesilo', 'soesilo', 'SHPB', 'SITI', NULL, NULL),
(215, 'Soesilo', 'soesilo', 'SHPB', 'TOKO BERDIKARI', NULL, NULL),
(216, 'Soesilo', 'soesilo', 'SHPB', 'MEGAH PERTAMA INDAH, PT (TOKO', NULL, NULL),
(217, 'Soesilo', 'soesilo', 'SHPB', 'TIMUR RAYA SURYA UTAMA, PT', NULL, NULL),
(218, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'SINAR JAYA ABADI', NULL, NULL),
(219, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'Toko Cahaya BARU', NULL, NULL),
(220, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'Toko Delima', NULL, NULL),
(221, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'PENJUAL PINDANG H.SANIRI', NULL, NULL),
(222, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'CV AGUNG', NULL, NULL),
(223, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'PT UNITED TRACTOR', NULL, NULL),
(224, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'BINA PERTIWI, PT', NULL, NULL),
(225, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'CATUR, PT', NULL, NULL),
(226, 'TATIK SUPRIYATI', 'tattiati', 'SHPB', 'KARYA WARNA INDONESIA, PT', NULL, NULL),
(227, 'TATIK SUPRIYATI', 'tattiati', 'SHPJ', 'SD BAHRUL ULUM', NULL, NULL),
(228, 'TATIK SUPRIYATI', 'tattiati', 'SHPJ', 'SMP PANCA JAYA', NULL, NULL),
(229, 'TATIK SUPRIYATI', 'tattiati', 'SHPJ', 'RUMAH SAKIT MUJI RAHAYU', NULL, NULL),
(230, 'TATIK SUPRIYATI', 'tattiati', 'SHPJ', 'PRAKTEK DOKTER ISKANDAR', NULL, NULL),
(231, 'ARISTIYANTI', 'aranti', 'E-Commerce Listing', 'TANDES - MANUKAN KULON - 118B', NULL, NULL),
(232, 'ARISTIYANTI', 'aranti', 'E-Commerce Listing', 'SAWAHAN - PETEMON - 063B', NULL, NULL),
(233, 'ARISTIYANTI', 'aranti', 'E-Commerce Listing', 'KREMBANGAN - MOROKREMBANGAN - 146B', NULL, NULL),
(234, 'DIAN KURNIA', 'dianrahmawati93', 'E-Commerce Listing', 'GAYUNGAN - MENANGGAL - 013B', NULL, NULL),
(235, 'DIAN KURNIA', 'dianrahmawati93', 'E-Commerce Listing', 'TENGGILIS MEJOYO - TENGGILIS MEJOYO - 042B', NULL, NULL),
(236, 'DIAN KURNIA', 'dianrahmawati93', 'E-Commerce Listing', 'RUNGKUT - KALI RUNGKUT - 102B', NULL, NULL),
(237, 'LIKAH SARI', 'ikahsari', 'E-Commerce Listing', 'JAMBANGAN - KARAH - 007B', NULL, NULL),
(238, 'LIKAH SARI', 'ikahsari', 'E-Commerce Listing', 'WIYUNG - BALAS KLUMPRIK - 004B', NULL, NULL),
(239, 'LIKAH SARI', 'ikahsari', 'E-Commerce Listing', 'SAMBIKEREP - BRINGIN - 011B', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbaru`
--

CREATE TABLE `tbaru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namapetugas` varchar(255) NOT NULL,
  `nama_survei` varchar(255) NOT NULL,
  `idresponden` varchar(255) NOT NULL,
  `waktu_unique` datetime NOT NULL,
  `waktu_kirim` time NOT NULL,
  `Coordinates` varchar(255) NOT NULL,
  `delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbaru`
--

INSERT INTO `tbaru` (`id`, `namapetugas`, `nama_survei`, `idresponden`, `waktu_unique`, `waktu_kirim`, `Coordinates`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'aidaila', 'HK 5', 'h. machmud', '2024-10-28 17:59:39', '10:13:30', '-7.28786,112.76383', 0, NULL, NULL),
(2, 'tatwaning', 'HK 4', 'andri yulianto', '2024-10-28 17:59:29', '10:13:48', '-7.2344,112.77617', 0, NULL, NULL),
(3, 'tatwaning', 'HK 4', 'andri yulianto', '2024-10-28 17:19:39', '10:13:49', '-7.2344,112.77616', 0, NULL, NULL),
(4, 'widyap', 'SUSENAS', 'djamal', '2024-10-11 12:59:19', '10:14:00', '-7.3271,112.7056', 0, NULL, NULL),
(5, 'eswanto', 'HK 2.2', 'Yanti kosmetik/Usaha Mandiri ', '2024-10-12 11:59:39', '10:14:12', '-7.30302,112.73758', 0, NULL, NULL),
(6, 'widyap', 'SUSENAS', 'djamal', '2024-10-13 17:59:39', '10:14:00', '-7.3271,112.7056', 0, NULL, NULL),
(7, 'sitilatifah', 'SHP', 'sinar angkasa rungkut,pt', '2024-08-28 17:59:39', '10:15:33', '-7.32687,112.75412', 0, NULL, NULL),
(8, 'sulrini', 'HK 1.2', 'hypermart royal', '2024-10-28 16:51:39', '10:15:15', '-7.30921,112.73434', 0, NULL, NULL),
(9, 'aidaila', 'HK 5', 'h. machmud', '2024-10-28 17:59:09', '10:15:30', '-7.28776,112.76384', 0, NULL, NULL),
(10, 'tatwaning', 'HK 4', 'andri yulianto', '2024-10-18 17:59:39', '10:15:48', '-7.2344,112.77623', 0, NULL, NULL),
(11, 'tatwaning', 'HK 4', 'andri yulianto', '2024-10-08 17:59:39', '10:15:49', '-7.2344,112.77623', 0, NULL, NULL),
(12, 'eswanto', 'HK 2.2', 'Usaha Mandiri', '2024-10-25 17:59:39', '10:15:44', '-7.30278,112.7376', 0, NULL, NULL),
(13, 'widyap', 'SUSENAS', 'djamal', '2024-10-24 17:59:39', '10:16:00', '-7.3271,112.7056', 0, NULL, NULL),
(14, 'widyap', 'SUSENAS', 'djamal', '2024-10-23 17:59:39', '10:17:00', '-7.3271,112.7056', 0, NULL, NULL),
(15, 'sitilatifah', 'SHP', 'sinar angkasa rungkut,pt', '2024-10-22 17:59:39', '10:17:33', '-7.32687,112.75412', 0, NULL, NULL),
(16, 'sulrini', 'HK 1.2', 'hypermart royal', '2024-10-21 17:59:39', '10:17:16', '-7.30925,112.73437', 0, NULL, NULL),
(17, 'sulrini', 'HK 1.2', 'hypermart royal', '2024-10-20 17:59:39', '10:17:16', '-7.30925,112.73437', 0, NULL, NULL),
(18, 'tatwaning', 'HK 4', 'andri yulianto', '2024-10-19 17:59:39', '10:17:49', '-7.23448,112.77614', 0, NULL, NULL),
(19, 'eswanto', 'HK 2.2', 'Usaha Mandiri', '2024-10-15 17:59:39', '10:17:44', '-7.30269,112.73766', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Username_Surveyor` varchar(255) NOT NULL,
  `Waktu_Unique` datetime NOT NULL,
  `Nama_Survei` varchar(255) NOT NULL,
  `Nama_Responden` varchar(255) NOT NULL,
  `Timestamp_Tracking` datetime NOT NULL,
  `Coordinates` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tracking`
--

INSERT INTO `tracking` (`id`, `Timestamp`, `Username_Surveyor`, `Waktu_Unique`, `Nama_Survei`, `Nama_Responden`, `Timestamp_Tracking`, `Coordinates`, `created_at`, `updated_at`) VALUES
(1, '2024-10-28 18:44:11', 'abdkarim', '2024-10-29 01:44:11', 'TESTER', 'A', '2024-10-29 01:44:11', '-7.32876,112.72831', NULL, NULL),
(2, '2024-10-28 18:45:48', 'abdkarim', '2024-10-28 01:44:12', 'TESTER', 'A', '2024-10-29 01:45:48', '-7.3287,112.72824', NULL, NULL),
(3, '2024-10-28 18:46:48', 'abdkarim', '2024-10-27 01:46:48', 'TESTER', 'A', '2024-10-29 01:46:48', '-7.32877,112.72831', NULL, NULL),
(4, '2024-10-28 18:47:48', 'abdkarim', '2024-10-26 01:47:48', 'TESTER', 'A', '2024-10-29 01:47:48', '-7.32876,112.72831', NULL, NULL),
(5, '2024-10-28 18:48:48', 'abdkarim', '2024-10-25 01:48:48', 'TESTER', 'A', '2024-10-29 01:48:48', '-7.32873,112.72831', NULL, NULL),
(6, '2024-10-28 18:49:48', 'abdkarim', '2024-10-24 01:49:48', 'TESTER', 'A', '2024-10-29 01:49:48', '-7.32869,112.72835', NULL, NULL),
(7, '2024-09-08 20:08:55', 'biljono', '2024-10-23 01:49:48', 'TESTER', 'tester', '2024-09-09 03:08:55', '-7.32877,112.72827', NULL, NULL),
(8, '2024-09-08 20:10:55', 'biljono', '2024-09-09 03:10:55', 'TESTER', 'tester', '2024-09-09 03:10:55', '-7.32878,112.72828', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `phone_number` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `phone_number`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Super Admin', 'admin@mail.com', '2024-10-31 00:39:12', '$2y$10$vYJrf5UOKgZd7PsPzNV0vO34mvYiR7hvovuMk2XBXa0GcPuyULRm.', 1, '0811111111111', NULL, '2024-10-31 00:39:12', '2024-10-31 00:39:12', NULL, NULL, NULL),
(2, 'Pak Bon Admin', 'admin@samboilerplate.com', '2024-10-31 00:39:12', '$2y$10$vUQbZjYXFiH3tZnJkWXZ9OtQjAH/LtoY87aDt96uleQHZL/2v/D.u', 1, '0811111111111', NULL, '2024-10-31 00:39:12', '2024-10-31 00:39:12', NULL, NULL, NULL),
(3, 'Si Tegar Supervisor', 'supervisor@samboilerplate.com', '2024-10-31 00:39:12', '$2y$10$gOIuKmQWjUCK/fylcO.uqefYbNnCRZtuwdKtgrwDB.3SOpfUsuCmm', 1, '0811111111111', NULL, '2024-10-31 00:39:12', '2024-10-31 00:39:12', NULL, NULL, NULL),
(4, 'Sam Didi Operator', 'operator@samboilerplate.com', '2024-10-31 00:39:12', '$2y$10$zLetquVB8uJPGqPa69maCemWsjeSDWGNnd2PbraLKq8dT9CIVVeoS', 1, '0811111111111', NULL, '2024-10-31 00:39:12', '2024-10-31 00:39:12', NULL, NULL, NULL),
(5, 'Sam Toni User', 'user@samboilerplate.com', '2024-10-31 00:39:12', '$2y$10$lZrIQKPjVsTrM3b9UxlemufbYEJz1D4RA4zXtVuU/BMTDWTeCYZD.', 1, '0811111111111', NULL, '2024-10-31 00:39:12', '2024-10-31 00:39:12', NULL, NULL, NULL),
(6, 'Dr. Uriah Balistreri', 'shand@example.com', '2024-10-31 00:39:42', '$2y$10$9E4jg5i5JLi.zUNQmBS.DOHtgyXhkM5FnMDR8Eki99ddisltezeny', 0, '+0112527691769', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(7, 'Prof. Curt Kub', 'chelsie88@example.net', '2024-10-31 00:39:42', '$2y$10$wz5gm7PNWqjcgAY8haN1jucG72RxDPEOcb1XBuHkNR6o3bCvbXoR.', 0, '+5819315934047', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(8, 'Anabelle Considine', 'allan89@example.net', '2024-10-31 00:39:42', '$2y$10$tEPgBcLxqxV6iYgouVHbh.eNn7CRyGZTJo/tJYGfR0GAiQPXrF9QW', 0, '+2954106825155', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(9, 'Mr. Carter Stroman', 'dashawn30@example.com', '2024-10-31 00:39:42', '$2y$10$dt9qboyrduBRAnM4OVathet/Kb3VCHm4Ok/sjml3cgBGsZn5V6uW2', 0, '+7635345595695', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(10, 'Mr. Russ Kerluke', 'mckenzie.nora@example.com', '2024-10-31 00:39:42', '$2y$10$ArY8uRA2gv97z/7kYnulKed6OcSQG5haLfXTt9VlLs3JM1BRDZ1Km', 0, '+8230855478142', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(11, 'Harry Reynolds', 'spinka.brain@example.org', '2024-10-31 00:39:42', '$2y$10$wBGnsDvSvuRPD3XL5jfPnOCZ51wSYLl9SnHBelBJnqHoHvVqy0WHO', 0, '+3600837219828', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(12, 'Adolfo Mayer', 'heller.felipe@example.org', '2024-10-31 00:39:42', '$2y$10$WRPpIOV8xrpJZJOfLZRYkeJht.2iuFB6tFDvY0B29UBcinzykoA1u', 0, '+7923407636362', NULL, '2024-10-31 00:39:42', '2024-10-31 00:39:42', NULL, NULL, NULL),
(13, 'Raoul Cruickshank', 'rosemary.jakubowski@example.org', '2024-10-31 00:39:43', '$2y$10$khW9HXfq0LWbktrtqNGmA.8NH2AYbwfHU1K0IWs4fcXVgOJIKsOu2', 0, '+6340420253757', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(14, 'Shaniya Prohaska Jr.', 'santino72@example.com', '2024-10-31 00:39:43', '$2y$10$GfsC3kY9KbxwDG3vZP99ZOsJ7EFa4PNDocF1JhdCGwJCjTXmGwgrO', 0, '+4781923134551', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(15, 'Rick Mills DDS', 'taurean01@example.net', '2024-10-31 00:39:43', '$2y$10$dcOGCknjKZqwIwpLMXYBKueupQR3sk.ui/1HNAxSvcA5FNG0dOwzW', 0, '+9265215225166', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(16, 'Vada Bode DVM', 'herman.norval@example.net', '2024-10-31 00:39:43', '$2y$10$g4t9L5/tlRjUS.GS4Hag0uH.IXvGCzJ4SsJ21GmyZIf1seEZ0te46', 0, '+5446995817766', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(17, 'Dr. Pearl Hodkiewicz DVM', 'bkemmer@example.net', '2024-10-31 00:39:43', '$2y$10$H0IUHgFMSm74Ecz/0CN9Yu3AaHe6g7f5MpVFHP/2LdBXdJFFi9xa2', 0, '+8774636683011', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(18, 'Winfield Zieme', 'morar.hazel@example.net', '2024-10-31 00:39:43', '$2y$10$X1PpceXJ0uL7agedMErpg.vLF2257zXXKuHnofS6OilZsDBdwqQYi', 0, '+0839810559862', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(19, 'Dr. Janiya Armstrong PhD', 'helena.wilderman@example.com', '2024-10-31 00:39:43', '$2y$10$cd6Gdqd7LnxC5dp6NxZ4Hu5p5G6sw2lo0nMbw7c8GqjSRk3oP9Aou', 0, '+7552341827652', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(20, 'Amanda Kovacek', 'joconner@example.net', '2024-10-31 00:39:43', '$2y$10$1Ij.BuQ1TnH7YMfflUKJv.YhgXLbl9Dxr0i8bN2IcVeHGlninOZ2C', 0, '+9221976040255', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(21, 'Mrs. Elyse Luettgen', 'morar.roberto@example.net', '2024-10-31 00:39:43', '$2y$10$eXR4EdP7Gi6e0WmkQ2FBKe6wdNm54esij.sklBW//DW4AwqrwnnES', 0, '+9223465208766', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(22, 'Mr. General Schuppe', 'rolfson.marcelino@example.com', '2024-10-31 00:39:43', '$2y$10$1tCqa.Hp5PRqsEJ19gaBO.ib0NAfo2KcssfY8wXG6fcmIwFb663K6', 0, '+4266294144031', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(23, 'Dillan O\'Hara II', 'wiza.peyton@example.com', '2024-10-31 00:39:43', '$2y$10$V5hjN1rYW3mysZzSjJkwkOd0njph320D5Tdl.NE.83B5AHKueWTAm', 0, '+7663108946973', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(24, 'Ms. Sheila Orn', 'rau.robbie@example.com', '2024-10-31 00:39:43', '$2y$10$kk9b7mbpg9DAktgaez4jm.PDfvc//qHfWW9xJ/IIQk8IIXtBS978K', 0, '+1186743361787', NULL, '2024-10-31 00:39:43', '2024-10-31 00:39:43', NULL, NULL, NULL),
(25, 'Josiane Erdman', 'delphine.aufderhar@example.net', '2024-10-31 00:39:44', '$2y$10$IpMwbocG/LbBD0KBBqfq/udtsxB19.7K379feuV0KecN4JksT8B2m', 0, '+7159917858776', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(26, 'Emmanuel Breitenberg', 'skylar34@example.com', '2024-10-31 00:39:44', '$2y$10$Gn5e04VmRcszkJrkJXq/Wu86RFgeMUMclDGW6aOxyze0ri8gQb3nC', 0, '+8528225054615', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(27, 'Ruth Schaden', 'stella.lemke@example.com', '2024-10-31 00:39:44', '$2y$10$FhS94S9aizkxrsUxwkxZQeFU9wcy..jk/e8ohSnZCQNDJ5NGvS7ty', 0, '+6336517358612', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(28, 'Dr. Angelica Koch I', 'darlene20@example.net', '2024-10-31 00:39:44', '$2y$10$qvaN6Ozx6glLIDV/WROS3OoUVulyuu4BnkeymUr5YhUdeW0W/Q0hi', 0, '+5584284490156', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(29, 'Miss Lolita Rempel', 'hweissnat@example.org', '2024-10-31 00:39:44', '$2y$10$tmc4IiYavE77Rna14xrls.Es4rRg6ugVMMttFHLr0rImQVOOIZTEG', 0, '+1716521281726', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(30, 'Dr. Tre Klein Sr.', 'hill.jeramie@example.net', '2024-10-31 00:39:44', '$2y$10$DNomCNXPmHPRVS8L5NoebO1noEyoHksJgVJyy335MAz/ZO2IW/xY6', 0, '+3787684950819', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(31, 'Vicenta Carroll V', 'aleen.kiehn@example.org', '2024-10-31 00:39:44', '$2y$10$z5iMy5beqr9ZQDbvGb/s/.p6iCFEja2C6vyCJ8tdaYYeYoxklA/zy', 0, '+2877960428850', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(32, 'Amanda Kutch III', 'minerva44@example.org', '2024-10-31 00:39:44', '$2y$10$8KsFFhH6fx7oXG7mArfQlO5gemlzGhB.J1vvPEStombWJzZTeubWS', 0, '+6029431418960', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(33, 'Mr. Keshaun Kohler', 'haag.carley@example.net', '2024-10-31 00:39:44', '$2y$10$Y4xwh13GgXckOtTWSd/fGOT9.gw6kHCj8sdlBjBW0KqtdFGk41Yj.', 0, '+3918117581367', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(34, 'Ms. Hilma Spencer Sr.', 'anderson.devon@example.net', '2024-10-31 00:39:44', '$2y$10$vxiXNHc4FlVzy9BZHO04Ye6BDcYiHO9p.cdhyqIUlM2MTUWOraR7m', 0, '+1032324505002', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(35, 'Major Medhurst', 'george.feil@example.com', '2024-10-31 00:39:44', '$2y$10$z6q0AxoXnIM6ep8mKp0ETO9iRDuiKgEmoEHxhntjI7aqIFqYBq.ee', 0, '+6787427972709', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(36, 'Miss Carolanne Ullrich', 'margaret.cassin@example.com', '2024-10-31 00:39:44', '$2y$10$7SB9wXIY3Uaw1DTc731QaemAzKKyOa8V3S9HRInuu14Fe0dMeDism', 0, '+7211286606905', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(37, 'Ignacio Gutmann', 'myrtis34@example.net', '2024-10-31 00:39:44', '$2y$10$RymnHN95S335GPQxss.NAe8cmyX0EexI60HVyewyLmfsaTQks/rme', 0, '+5371814204741', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(38, 'Antonina Williamson', 'anderson.eric@example.net', '2024-10-31 00:39:44', '$2y$10$TWSRqF2FN2XWHlMC2AFF8e/x3/Ya86dfSoIeQuuELBWtXt.qv39mi', 0, '+8118214480948', NULL, '2024-10-31 00:39:44', '2024-10-31 00:39:44', NULL, NULL, NULL),
(39, 'Eleonore Zieme II', 'stroman.yvette@example.org', '2024-10-31 00:39:45', '$2y$10$gBMiMM0u7Mr3eLgj/bmeeuMsg4CEj9LNnp.CNf2fSQk4koeMRFxyC', 0, '+8460807449169', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(40, 'Gussie O\'Conner', 'kenya.dietrich@example.org', '2024-10-31 00:39:45', '$2y$10$ikkwmGOckyo7lyXT.mrHz.FsVNE8QMHe2SDCEHozPfIoQflwiRZ.q', 0, '+3774597470483', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(41, 'Darby Mertz', 'mabbott@example.org', '2024-10-31 00:39:45', '$2y$10$76tyTxxUh04myn0dsJQ0JueYI9xUuA5nDP5fenSMFRSoIMYCQA8Nq', 0, '+6440423361988', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(42, 'Gwen Kassulke I', 'vlockman@example.net', '2024-10-31 00:39:45', '$2y$10$Dju/z.pCeqoOHYpgdCu9FOnFGZICAgmaK8x9BNgoC/SUXFKOhGpOe', 0, '+2951756792544', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(43, 'Jerod Conroy', 'johnson.melissa@example.org', '2024-10-31 00:39:45', '$2y$10$cv89s/yaq3pGOocnLG1MFez9O4J2gMo8zB3OissgcRGUEETufJTd6', 0, '+9526584014329', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(44, 'Delfina Windler', 'naomie62@example.net', '2024-10-31 00:39:45', '$2y$10$dKfTQuGVwf9XNM9tE81RsO9fRpjPb2i79mcvOFoW/jCks1dUqJ.fq', 0, '+9347740666493', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(45, 'Dr. Candido McDermott', 'reichert.carolyn@example.net', '2024-10-31 00:39:45', '$2y$10$3F2nQ.Tbs30zPyqKfzs6Nus4YsFs1mVyBNEgELJfnh7NUiGMe2nHO', 0, '+2920307051281', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(46, 'Augustine Kertzmann V', 'bkassulke@example.net', '2024-10-31 00:39:45', '$2y$10$5oTltVQ6FyZBQMxY345jYO2aAeaybD.qXa3hiM73/b5eOjFmCI8aa', 0, '+2592271152996', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(47, 'Lexi Gutkowski', 'hudson.jazmyn@example.net', '2024-10-31 00:39:45', '$2y$10$EQB3tOWF5YWkOXTiBpHRFekPE8QH/sXuLqVab5H8U0L6djwEgSFKq', 0, '+1795934014106', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(48, 'Dr. Izabella Fritsch II', 'brannon54@example.net', '2024-10-31 00:39:45', '$2y$10$TbKR5/GQ5rroIC1yMlH0y.B4kn3ergYwKBs/3kJzgMujiNWQwvHvG', 0, '+4768605332658', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(49, 'Bradford Fisher', 'hansen.callie@example.net', '2024-10-31 00:39:45', '$2y$10$0fNakb0zluHFv.M7Pch2NeszwRrUJYvsz4mwLkk8F/BI0vt67VNNS', 0, '+5304113768563', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(50, 'Mr. Nels Kreiger', 'ghahn@example.net', '2024-10-31 00:39:45', '$2y$10$/wZtHgg2xaZWpTnQH8to8.XbY.PgABOj5oaLu2b.3f7dNbOdr0ZAS', 0, '+3387955216529', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(51, 'Oran Grant', 'august17@example.net', '2024-10-31 00:39:45', '$2y$10$R47zG0zPba5UYtmUguUmqOdL5HGHvd9fVGzr9ZoS.OGaL2PUUlnSq', 0, '+1185795819228', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(52, 'Davin Tillman', 'price@example.com', '2024-10-31 00:39:45', '$2y$10$9Pdg7s/ZRtP.2fgWienu0ez75m9PaoLiJGLbdg70c.V57/XlYjzl2', 0, '+6646314282108', NULL, '2024-10-31 00:39:45', '2024-10-31 00:39:45', NULL, NULL, NULL),
(53, 'Mayra Parker', 'soledad51@example.org', '2024-10-31 00:39:46', '$2y$10$DHhNV3R0.xOppsTSII3XNua0ZpNZtw99.LskJE08AdnjBI2.t8tK.', 0, '+4447662167004', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(54, 'Berry McClure', 'blanda.lilliana@example.net', '2024-10-31 00:39:46', '$2y$10$jZJUS.kR95y5RG/eVpxVG.WvDy1OUZt3e2BrX2nAKAUqH8xO104My', 0, '+1826789521970', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(55, 'Roslyn Roob', 'schmitt.julio@example.org', '2024-10-31 00:39:46', '$2y$10$EqM0RWNR8tD9CtCAmKFGEefySDVwC16E7S6bFkqfVRdDb/4r8H0ua', 0, '+0225311790778', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(56, 'Chyna Shields DDS', 'rozella.lang@example.net', '2024-10-31 00:39:46', '$2y$10$4hcji.k06ix8xEQo6Mw33uxQpuKe4CWSKersFZa/qyk2pfz/pjrHm', 0, '+8170540618969', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(57, 'Karlee Harvey', 'shana92@example.org', '2024-10-31 00:39:46', '$2y$10$YXUiuC7i9G38UUADPP6ldOR0Xy7lPMGhBfRoVqftrb8znyKN3xalS', 0, '+3443648599857', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(58, 'Columbus Zemlak', 'clement.bechtelar@example.org', '2024-10-31 00:39:46', '$2y$10$ZX0AXYCU4WUqMBsh9oy8me20WOU8Djwu3sGM8oUkPj5ajuscawwCu', 0, '+4545455272670', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(59, 'Erling Hammes', 'antone38@example.com', '2024-10-31 00:39:46', '$2y$10$UZfHhxhqH44C6a4g7.sWkOmEu4kPAyzWWIuvFyU7MDnSdcX/nXTTq', 0, '+6522564099450', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(60, 'Sadie Runolfsson', 'nader.rudolph@example.net', '2024-10-31 00:39:46', '$2y$10$S8Dii/wMsP1eIst4GqmQzuWtB.Wih0wIzuPG.jsqKgbtkWsmUzKyi', 0, '+0764843911532', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(61, 'Evie Brown', 'beahan.percival@example.net', '2024-10-31 00:39:46', '$2y$10$wvcdpaUvrynAiYpjwp13nO9LEhGsORindh/DPnJPPwSFOigSfOPfa', 0, '+8628830979203', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(62, 'Abbigail Herzog', 'rdonnelly@example.org', '2024-10-31 00:39:46', '$2y$10$kyQfOHKLva56SN9ApnEyDeR7m.mbQZjD0l4TCiN/44gaC7HULBfgi', 0, '+3992839332675', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(63, 'Florida Kozey', 'fermin.ward@example.net', '2024-10-31 00:39:46', '$2y$10$4RKDwbJhAZwNFfWEhZUjTu.oCvlMeCByrH/PyS6OchfiKu8VI84xu', 0, '+7676066782906', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(64, 'George Roob', 'corrine00@example.org', '2024-10-31 00:39:46', '$2y$10$putGEkG5UbhuOAFdYCcFk.qETq8u5ePWuaS61VQNiOJXRTq29Us3O', 0, '+4536424135689', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(65, 'Aurore Leuschke', 'mkihn@example.org', '2024-10-31 00:39:46', '$2y$10$QR7c2cJDIiLYk.3ppVcRre4EGQ3OtuA7wrUx7ZbYjNmpH.w0yjSu.', 0, '+8374868355072', NULL, '2024-10-31 00:39:46', '2024-10-31 00:39:46', NULL, NULL, NULL),
(66, 'Else Becker', 'camille98@example.org', '2024-10-31 00:39:47', '$2y$10$7W4yGPWOVXUA8U2aTcbQ0e.q084yLh.JTZoUFQ15x5i08U0jnncKe', 0, '+5646387943457', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(67, 'Miss Gregoria Senger', 'erdman.columbus@example.org', '2024-10-31 00:39:47', '$2y$10$vl9ig9HCdqn.FWojgzNNdenhHERjcYwg2bmCLX7mU.BNjqJ4iUGj2', 0, '+4279618319533', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(68, 'Erika Heidenreich', 'michel.crist@example.net', '2024-10-31 00:39:47', '$2y$10$kWgUFaA/M7AMWbcbwwY6gO2JvLSNvvXMUefR5nag/3B7SucqIx7MW', 0, '+6300907432341', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(69, 'Ashton Weber', 'brigitte.schoen@example.net', '2024-10-31 00:39:47', '$2y$10$WMhCO4rIccJLES4YaJGyBOhQk0fq5mUKyAeJBwVM5/3KzrdlP1zei', 0, '+6104925421336', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(70, 'Prof. Elena Quigley', 'kendra71@example.net', '2024-10-31 00:39:47', '$2y$10$j484N/U1kXuJuPq9ITjuEetcY/t8vlEp.lyZsNBvUwmlembQzjlFq', 0, '+1716628733331', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(71, 'Tianna Schaden I', 'jcasper@example.com', '2024-10-31 00:39:47', '$2y$10$yCdj0QhjOr2kxJ3FEYM.Ze15puM3GCr3Zi6u/R6d6irpsa6EIfi/G', 0, '+4105264203004', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(72, 'Dameon Kerluke', 'kari43@example.org', '2024-10-31 00:39:47', '$2y$10$cG/1JQydbWHKUxrwDDHXmeD47wT95Sk6s7XAUWJlz9mvm8FuYKFty', 0, '+5250312463658', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(73, 'Major Cartwright V', 'spencer84@example.com', '2024-10-31 00:39:47', '$2y$10$i7jxxcMgjLk2L3fqhXJip.neujgxsZEBiPNKdcTqZ1ijuYhsZA95u', 0, '+7636962204343', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(74, 'Ms. Elenor Schiller IV', 'rashad59@example.com', '2024-10-31 00:39:47', '$2y$10$QjGhIVPTeWA6cOwLaoifQelUHHs7inXudIb4c0UrYF6/ImaXSA0gW', 0, '+4903468892248', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(75, 'Watson Kulas', 'sledner@example.com', '2024-10-31 00:39:47', '$2y$10$t2hYSYuyGSIHQ4ygzE.CLuKVd8sUpu69cUIlDFfMO4r7dC2uIKIvi', 0, '+2615580943943', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(76, 'Dr. Ramon Lehner MD', 'emory59@example.net', '2024-10-31 00:39:47', '$2y$10$j.o8mRbKBCrY1bNT9g8tvO4XsqYqTO58pZfhTKzERGa2lXtQAS7tq', 0, '+3080418597565', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(77, 'Xander Haag', 'bziemann@example.org', '2024-10-31 00:39:47', '$2y$10$jGfx2rrfWkbkPiWMe6rQ3e1a5BiegPofKqhNMve8klt3vQ6BZdf0O', 0, '+6608247515000', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(78, 'Prof. Jessie Weimann', 'corkery.mossie@example.com', '2024-10-31 00:39:47', '$2y$10$2U62MZDZpsGIWY3C30yOeOFgAf8V8ncTLFTkKK95VqexZ64UT4Hs2', 0, '+6968720955833', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(79, 'Prof. Litzy Parisian V', 'nolan.orion@example.org', '2024-10-31 00:39:47', '$2y$10$qb.h8qp0jCRIDydeoyt5neu1N3QJC4LFiDq6ModtCm6lEZTHmX1cC', 0, '+6185558419533', NULL, '2024-10-31 00:39:47', '2024-10-31 00:39:47', NULL, NULL, NULL),
(80, 'Roslyn Orn', 'jesus18@example.net', '2024-10-31 00:39:48', '$2y$10$FOXsJVqPevPCR872SW5AfO6.GpiAJPRkH99hcQH7N9/ZP5.TVpC2C', 0, '+2650318005961', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(81, 'Leonard Weissnat', 'gledner@example.org', '2024-10-31 00:39:48', '$2y$10$vdT08GwRIJCUNzIGXX9WZO6itQ0fjWYr2RHBBsflyNXmNy9fEUA.G', 0, '+1377911870670', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(82, 'Shanna Hamill', 'nschowalter@example.org', '2024-10-31 00:39:48', '$2y$10$RibgK8lP36A0IfXI0uaknuvKxrE0EpqGacPyA8dDZraTT.2PcDQ9y', 0, '+7385243618621', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(83, 'Flavie Fadel Jr.', 'rsporer@example.com', '2024-10-31 00:39:48', '$2y$10$1znpQ.zWHkBBC5zsO1x0o.XbvBz97NMkgyvJkUqH/IAgCHjXZ49l6', 0, '+0903467259283', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(84, 'Hortense Gislason', 'drodriguez@example.com', '2024-10-31 00:39:48', '$2y$10$6xhDGNl0BN4QzB8jz6t5SeiVF.GeRkGKiji3bh/guXOnxPQmCAS16', 0, '+9826504462182', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(85, 'Ms. Kasandra Kuvalis', 'bogisich.belle@example.com', '2024-10-31 00:39:48', '$2y$10$.lQ8ae6ejDsbCGRom7l1AuWgNARpMXVb4zFJfAgJtTEe0zqmeSrf.', 0, '+1440205716788', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(86, 'Prof. Virgie Crona DVM', 'sporer.aron@example.net', '2024-10-31 00:39:48', '$2y$10$shrObXsn4nPQ17JlE.pgHew1Dpd1a4pEmU/MKPWdmPQaTy9dgjoI6', 0, '+8484324614693', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(87, 'Mr. Terence Ritchie II', 'anikolaus@example.net', '2024-10-31 00:39:48', '$2y$10$c0GnvZj60WdzbXzcQtdzJeURJbT/vkAeEXokhlXwoQUYEYeOn6762', 0, '+4577388409352', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(88, 'Mrs. Catherine Rau', 'nola.king@example.org', '2024-10-31 00:39:48', '$2y$10$9nlUEq39FfglORMkQLXQ8OrpYmZQa7Ah12Clc0QhNIvIfEleWrThu', 0, '+3450928887354', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(89, 'Reinhold Schuster', 'dickinson.katherine@example.org', '2024-10-31 00:39:48', '$2y$10$gQHq88w.3kHy3nd6LjZ6Gu7.3PN9X6XysJmi57uiDPF5LQFGPufxC', 0, '+2756834265739', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(90, 'Laura Kulas', 'maegan.gerhold@example.org', '2024-10-31 00:39:48', '$2y$10$NpLXXDMSsKpTX7KYULHAwe27SjgyFQPcONpxGj8gFqo1w4PAh/rmW', 0, '+5666307005811', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(91, 'Prof. Sonia Blanda II', 'ojacobson@example.org', '2024-10-31 00:39:48', '$2y$10$QuAfbnuOjawNc1j..KuEIuCuNuECclwijK5NtKa373Lhpcr4bjvF.', 0, '+0771337082957', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(92, 'Clinton Casper', 'laura57@example.org', '2024-10-31 00:39:48', '$2y$10$DMoKXpDBpX.bMfjNb77WO.kxca.jadaQXiHG.w.EZieDrvVPob1G.', 0, '+1014916539051', NULL, '2024-10-31 00:39:48', '2024-10-31 00:39:48', NULL, NULL, NULL),
(93, 'Nils Ullrich', 'jast.antonetta@example.org', '2024-10-31 00:39:49', '$2y$10$pMFnO1VBxsYjI6WpVvAYdeBpMJJYzqJ2a21MJGXktTHSRgX8znmJu', 0, '+6890730040575', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(94, 'Ms. Rubie Windler', 'eliane.bogisich@example.com', '2024-10-31 00:39:49', '$2y$10$co4Ag9SDjTs3uEwOaEQLVOSPlJv4V61h2.wJHfsBeT1bot/CtRYJe', 0, '+5507535834237', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(95, 'Lonie Toy', 'sammie.larson@example.org', '2024-10-31 00:39:49', '$2y$10$unu0VPWAwjiUwipupkpzQOnUWfcCC2nO1PpcUsK82yaC0GtZabjEW', 0, '+1185300860368', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(96, 'Mariana Gulgowski', 'janessa38@example.com', '2024-10-31 00:39:49', '$2y$10$Msd6kv6rrctNYUKmynKlV.uuMMBCw83bhPIw7fYJYIvMkTb6reORO', 0, '+1758683278656', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(97, 'Gabrielle Howell', 'pierce.gulgowski@example.net', '2024-10-31 00:39:49', '$2y$10$zJBRxVeFFfvRoJqrYkusIu9k8eU0xopmnKf3wrXO9DbCYuwCX.7T2', 0, '+6399376020380', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(98, 'Tyrel O\'Keefe', 'kenyon15@example.com', '2024-10-31 00:39:49', '$2y$10$WyqwhN43PdnrMxFnAGt64erlJA.jTCxIOVSNsciHpyJFLF9zvOr1a', 0, '+1777365959703', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(99, 'Prof. Nelson Kohler', 'dawson60@example.com', '2024-10-31 00:39:49', '$2y$10$OSjOSJTTSXy9d3sNzes5yOdHSKuWOd3CdZsnW8Q5yAmkPlJP4Nomq', 0, '+5127082942572', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(100, 'Dr. Lizeth Wilderman IV', 'ecasper@example.com', '2024-10-31 00:39:49', '$2y$10$o/NepUC8IaMO3fprmpOHn.j5W7zeoygOrK0qVaTUOKpZ0.VlDA6ru', 0, '+9063277965386', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(101, 'Jedediah Stokes', 'lisa15@example.com', '2024-10-31 00:39:49', '$2y$10$V.PU6T8cMEHLDbv7oeDYZOsErrPa6jTk6GQdZtrXWvWWdzV8J4Xi2', 0, '+7421165944030', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(102, 'Mrs. Shaylee Kunde MD', 'vmcglynn@example.com', '2024-10-31 00:39:49', '$2y$10$ie8G9i.gpWgEh2JZN/eudubzO0xVI1nop2P/ZPSArrymzkZwJmLWW', 0, '+8026810668957', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(103, 'Annabell Jakubowski', 'ufahey@example.com', '2024-10-31 00:39:49', '$2y$10$c9rfBauHo/di.NcVdLMRmOilfdFWo4Gtgj3WXlrQ1QGNsG1uITMCa', 0, '+5986825589361', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(104, 'Destini Kreiger II', 'keebler.simone@example.org', '2024-10-31 00:39:49', '$2y$10$fKrY51N/7H1xpGQJaJtO5.6RFMgjtPKwUbSxNNkjmbUdYEyLg0ZV2', 0, '+4826635590775', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(105, 'Don Johnson', 'luis.kerluke@example.com', '2024-10-31 00:39:49', '$2y$10$bCyzvPREckz6fzqejc6A8ufl2HYXpZD7P3qNBnTcQiorJCZKpGsT.', 0, '+3376260203255', NULL, '2024-10-31 00:39:49', '2024-10-31 00:39:49', NULL, NULL, NULL),
(106, 'sifulan', 'sifulan@gmail.com', NULL, '$2y$10$zleMYXGwVv1tKq5TBU8S1uoN2JZNG9bTuKr6wYCEgHc0L4AokUIYS', 1, NULL, NULL, '2024-10-31 00:41:12', '2024-10-31 00:41:12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_user_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
