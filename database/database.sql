-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Sep 2024 pada 12.12
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `book_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `book_code`, `title`, `slug`, `cover`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9786230034763', 'Bahagia Beragama Bersama Gus Baha', 'bahagia-beragama-bersama-gus-baha', 'Bahagia Beragama Bersama Gus Baha-1727579567.jpg', 'in stock', '2024-09-28 20:12:47', '2024-09-28 20:12:47', NULL),
(2, '9786020658049', 'Home Sweet Loan', 'home-sweet-loan', 'Home Sweet Loan-1727610531.jpg', 'in stock', '2024-09-29 04:48:51', '2024-09-29 04:48:51', NULL),
(3, '9786025753251', 'Il Principe (Sang Pangeran)', 'il-principe-sang-pangeran', 'Il Principe (Sang Pangeran)-1727610669.jpg', 'in stock', '2024-09-29 04:51:09', '2024-09-29 04:51:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_category`
--

CREATE TABLE `book_category` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 3, 111, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Agama', 'agama', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(2, 'Buddha', 'buddha', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(3, 'Hindu', 'hindu', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(4, 'Islam', 'islam', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(5, 'Konfusianisme', 'konfusianisme', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(6, 'Kristen & Katolik', 'kristen-katolik', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(7, 'Spiritualitas', 'spiritualitas', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(8, 'Alam', 'alam', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(9, 'Hewan', 'hewan', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(10, 'Aliran & Gaya Bahasa', 'aliran-gaya-bahasa', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(11, 'Arsitektur', 'arsitektur', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(12, 'Desain Interior', 'desain-interior', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(13, 'Perencanaan Perkotaan & Penggunaan Tanah', 'perencanaan-perkotaan-penggunaan-tanah', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(14, 'Referensi', 'referensi', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(15, 'Sejarah', 'sejarah', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(16, 'Barang Antik & Koleksi', 'barang-antik-koleksi', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(17, 'Berkebun', 'berkebun', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(18, 'Tata Ruang dan Pertamanan', 'tata-ruang-dan-pertamanan', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(19, 'Biografi & Autobiografi', 'biografi-autobiografi', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(20, 'Memoar Pribadi', 'memoar-pribadi', '2024-09-28 20:05:27', '2024-09-28 20:05:27', NULL),
(22, 'Bisnis & Ekonomi', 'bisnis-ekonomi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(23, 'Akuntansi', 'akuntansi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(24, 'Asuransi', 'asuransi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(25, 'Bank & Perbankan', 'bank-perbankan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(26, 'E-Commerce', 'e-commerce', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(27, 'Ekonomi', 'ekonomi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(28, 'Etika Bisnis', 'etika-bisnis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(29, 'Freelance & Wirausaha', 'freelance-wirausaha', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(30, 'Green Business', 'green-business', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(31, 'Hubungan Pelanggan', 'hubungan-pelanggan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(32, 'Industri', 'industri', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(33, 'Internasional', 'internasional', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(34, 'Investasi & Saham', 'investasi-saham', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(35, 'Karier', 'karier', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(36, 'Kepemimpinan', 'kepemimpinan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(37, 'Keterampilan', 'keterampilan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(38, 'Keuangan', 'keuangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(39, 'Keuangan Perusahaan', 'keuangan-perusahaan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(40, 'Kewirausahaan', 'kewirausahaan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(41, 'Komunikasi Bisnis', 'komunikasi-bisnis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(42, 'Lain-Lain', 'lain-lain', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(43, 'Manajemen', 'manajemen', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(44, 'Manajemen Industri', 'manajemen-industri', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(45, 'Manajemen Proyek', 'manajemen-proyek', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(46, 'Motivasi', 'motivasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(47, 'Negosiasi', 'negosiasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(48, 'Pelatihan', 'pelatihan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(49, 'Pemasaran', 'pemasaran', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(50, 'Pemerintah & Bisnis', 'pemerintah-bisnis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(51, 'Perbankan Islam & Keuangan', 'perbankan-islam-keuangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(52, 'Perilaku Konsumen', 'perilaku-konsumen', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(53, 'Perpajakan', 'perpajakan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(54, 'Perumahan & Real Estate', 'perumahan-real-estate', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(55, 'Public Relations', 'public-relations', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(56, 'Sales & Marketing', 'sales-marketing', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(57, 'Sejarah Ekonomi', 'sejarah-ekonomi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(58, 'Sumber Daya Manusia & Manajemen Personalia', 'sumber-daya-manusia-manajemen-personalia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(59, 'Desain', 'desain', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(60, 'Furnitur', 'furnitur', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(61, 'Sejarah & Kritik', 'sejarah-kritik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(62, 'Seni Grafis', 'seni-grafis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(63, 'Fiksi', 'fiksi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(64, 'Antologi', 'antologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(65, 'Fantasi', 'fantasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(66, 'Fiksi Ilmiah', 'fiksi-ilmiah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(67, 'Horor', 'horor', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(68, 'Kehidupan Kota', 'kehidupan-kota', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(69, 'Klasik', 'klasik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(70, 'Misteri & Detektif', 'misteri-detektif', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(71, 'Muslim', 'muslim', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(72, 'Novel', 'novel', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(73, 'Perang & Militer', 'perang-militer', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(74, 'Romantis', 'romantis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(75, 'Sastra', 'sastra', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(76, 'Sastra Dunia Asia (Umum)', 'sastra-dunia-asia-umum', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(77, 'Thriller', 'thriller', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(78, 'Fiksi Anak & Remaja', 'fiksi-anak-remaja', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(79, 'Buku Aktivitas', 'buku-aktivitas', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(80, 'Komik & Novel Grafis', 'komik-novel-grafis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(81, 'Legenda, Mitos, Dongeng', 'legenda-mitos-dongeng', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(82, 'Fiksi Dewasa', 'fiksi-dewasa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(83, 'Filsafat', 'filsafat', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(84, 'Fotografi', 'fotografi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(85, 'Subjek & Tema', 'subjek-tema', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(86, 'Teknik', 'teknik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(87, 'Game & Aktivitas', 'game-aktivitas', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(88, 'Buku Mewarnai', 'buku-mewarnai', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(89, 'Kuis', 'kuis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(90, 'Puzzles', 'puzzles', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(91, 'Hewan Peliharaan', 'hewan-peliharaan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(92, 'Hukum', 'hukum', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(93, 'Adat', 'adat', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(94, 'Bisnis & Keuangan', 'bisnis-keuangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(95, 'Etika & Tanggung Jawab Profesional', 'etika-tanggung-jawab-profesional', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(96, 'Hak Sipil', 'hak-sipil', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(97, 'Hukum Keluarga', 'hukum-keluarga', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(98, 'Hukum Perdata', 'hukum-perdata', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(99, 'Hukum Pidana', 'hukum-pidana', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(100, 'Kekayaan Intelektual', 'kekayaan-intelektual', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(101, 'Kesehatan', 'kesehatan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(102, 'Konstitusi', 'konstitusi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(103, 'Layanan Hukum', 'layanan-hukum', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(104, 'Lingkungan', 'lingkungan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(105, 'Panduan Praktis', 'panduan-praktis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(106, 'Pemerintah', 'pemerintah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(107, 'Pendidikan Hukum', 'pendidikan-hukum', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(108, 'Properti', 'properti', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(109, 'Sejarah Hukum', 'sejarah-hukum', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(110, 'Humor', 'humor', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(111, 'Ilmu Politik', 'ilmu-politik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(112, 'Ilmu Sosial', 'ilmu-sosial', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(113, 'Antropologi', 'antropologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(114, 'Budaya & Sosial', 'budaya-sosial', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(115, 'Kriminologi', 'kriminologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(116, 'Penyandang Disabilitas', 'penyandang-disabilitas', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(117, 'Sosiologi', 'sosiologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(118, 'Keluarga & Hubungan', 'keluarga-hubungan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(119, 'Lansia', 'lansia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(120, 'Parenting', 'parenting', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(121, 'Pengasuhan, Penitipan & Perawatan Anak', 'pengasuhan-penitipan-perawatan-anak', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(122, 'Tahapan Hidup', 'tahapan-hidup', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(123, 'Kerajinan & Hobi', 'kerajinan-hobi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(124, 'Fashion', 'fashion', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(125, 'Kesehatan & Kebugaran', 'kesehatan-kebugaran', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(126, 'Diet & Nutrisi', 'diet-nutrisi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(127, 'Obat Herbal', 'obat-herbal', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(128, 'Yoga', 'yoga', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(129, 'Fiksi Sejarah', 'fiksi-sejarah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(130, 'Kejahatan & Misteri', 'kejahatan-misteri', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(131, 'Manga', 'manga', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(132, 'Komputer', 'komputer', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(133, 'Aplikasi Bisnis & Produktivitas', 'aplikasi-bisnis-produktivitas', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(134, 'Aplikasi Matematika & Statistik', 'aplikasi-matematika-statistik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(135, 'Database Administrasi & Manajemen', 'database-administrasi-manajemen', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(136, 'Desain, Grafik & Media', 'desain-grafik-media', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(137, 'Hacking', 'hacking', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(138, 'Ilmu Komputer', 'ilmu-komputer', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(139, 'Internet', 'internet', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(140, 'Jaringan', 'jaringan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(141, 'Pemrograman', 'pemrograman', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(142, 'Pengembangan & Rekayasa Perangkat Lunak', 'pengembangan-rekayasa-perangkat-lunak', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(143, 'Perangkat Keras', 'perangkat-keras', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(144, 'Sistem Aplikasi', 'sistem-aplikasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(145, 'Matematika', 'matematika', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(146, 'Aljabar', 'aljabar', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(147, 'Probabilitas & Statistik', 'probabilitas-statistik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(148, 'Terapan', 'terapan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(149, 'Medis', 'medis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(150, 'Administrasi', 'administrasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(151, 'Akupuntur', 'akupuntur', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(152, 'Bedah', 'bedah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(153, 'Chiropractic', 'chiropractic', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(154, 'Dermatologi', 'dermatologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(155, 'Ginekologi & Kebidanan', 'ginekologi-kebidanan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(156, 'Kardiologi', 'kardiologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(157, 'Kedokteran Gigi', 'kedokteran-gigi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(158, 'Keperawatan', 'keperawatan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(159, 'Kesehatan Mental', 'kesehatan-mental', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(160, 'Layanan Kesehatan', 'layanan-kesehatan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(161, 'Neurologi', 'neurologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(162, 'Ortopedi', 'ortopedi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(163, 'Pediatri', 'pediatri', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(164, 'Pengobatan Alternatif', 'pengobatan-alternatif', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(165, 'Pengobatan Hewan', 'pengobatan-hewan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(166, 'Penyakit', 'penyakit', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(167, 'Referensi & Pedoman', 'referensi-pedoman', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(168, 'Terapi Diet', 'terapi-diet', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(169, 'Musik', 'musik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(170, 'Alat Musik', 'alat-musik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(171, 'Dance', 'dance', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(172, 'Instruksi & Studi', 'instruksi-studi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(173, 'Musik Klasik', 'musik-klasik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(174, 'Nonfiksi Anak & Remaja', 'nonfiksi-anak-remaja', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(175, 'Biografi & Memoar', 'biografi-memoar', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(176, 'Sains & Alam', 'sains-alam', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(177, 'Sekolah & Pendidikan', 'sekolah-pendidikan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(178, 'Topik Sosial', 'topik-sosial', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(179, 'Nonfiksi Dewasa', 'nonfiksi-dewasa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(180, 'Olahraga & Rekreasi', 'olahraga-rekreasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(181, 'Pendidikan', 'pendidikan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(182, 'Guru & Pendampingan Siswa', 'guru-pendampingan-siswa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(183, 'Pelajar & Kemahasiswaan', 'pelajar-kemahasiswaan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(184, 'Pengajaran', 'pengajaran', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(185, 'SD', 'sd', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(186, 'SMA', 'sma', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(187, 'SMP', 'smp', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(188, 'Pengembangan Diri', 'pengembangan-diri', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(189, 'Analisis Tulisan Tangan', 'analisis-tulisan-tangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(190, 'Emosi', 'emosi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(191, 'Journaling', 'journaling', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(192, 'Komunikasi & Keterampilan Sosial', 'komunikasi-keterampilan-sosial', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(193, 'Motivasi & Inspiratif', 'motivasi-inspiratif', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(194, 'Personal Growth', 'personal-growth', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(195, 'Sukses', 'sukses', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(196, 'Persiapan Ujian', 'persiapan-ujian', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(197, 'Kemahiran Bahasa Inggris', 'kemahiran-bahasa-inggris', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(198, 'Tes Studi (Lainnya)', 'tes-studi-lainnya', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(199, 'Pertunjukan Seni', 'pertunjukan-seni', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(200, 'Film', 'film', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(201, 'Teater', 'teater', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(202, 'Psikologi', 'psikologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(203, 'Gerakan', 'gerakan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(204, 'Kepribadian', 'kepribadian', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(205, 'Kreativitas', 'kreativitas', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(206, 'New Age', 'new-age', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(207, 'Pendidikan & Pelatihan', 'pendidikan-pelatihan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(208, 'Perkembangan', 'perkembangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(209, 'Psikologi Klinis', 'psikologi-klinis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(210, 'Psikologi Sosial', 'psikologi-sosial', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(211, 'Puisi', 'puisi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(212, 'Almanak', 'almanak', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(213, 'Ensiklopedia', 'ensiklopedia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(214, 'Kamus', 'kamus', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(215, 'Pernikahan', 'pernikahan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(216, 'Resep & Masakan', 'resep-masakan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(217, 'Etnis & Regional Asia', 'etnis-regional-asia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(218, 'Kesehatan & Penyembuhan', 'kesehatan-penyembuhan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(219, 'Kursus & Hidangan', 'kursus-hidangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(220, 'Makanan Bayi', 'makanan-bayi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(221, 'Metode', 'metode', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(222, 'Minuman', 'minuman', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(223, 'Rumah', 'rumah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(224, 'Sains', 'sains', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(225, 'Botani', 'botani', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(226, 'Fisika', 'fisika', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(227, 'Ilmu Bumi', 'ilmu-bumi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(228, 'Kimia', 'kimia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(229, 'Life Sciences', 'life-sciences', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(230, 'Sains Luar Angkasa', 'sains-luar-angkasa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(231, 'Geografi Sejarah', 'geografi-sejarah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(232, 'Seni', 'seni', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(233, 'Studi Bahasa Asing', 'studi-bahasa-asing', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(234, 'Arab', 'arab', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(235, 'Bahasa Inggris sebagai Bahasa Kedua', 'bahasa-inggris-sebagai-bahasa-kedua', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(236, 'Belanda', 'belanda', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(237, 'Jepang', 'jepang', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(238, 'Jerman', 'jerman', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(239, 'Korea', 'korea', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(240, 'Mandarin', 'mandarin', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(241, 'Prancis', 'prancis', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(242, 'Teknologi & Teknik', 'teknologi-teknik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(243, 'Ilmu Militer', 'ilmu-militer', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(244, 'Ilmu Pangan', 'ilmu-pangan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(245, 'Kelautan & Angkatan Laut', 'kelautan-angkatan-laut', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(246, 'Kimia & Biokimia', 'kimia-biokimia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(247, 'Konstruksi', 'konstruksi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(248, 'Listrik', 'listrik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(249, 'Manufaktur', 'manufaktur', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(250, 'Mekanik', 'mekanik', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(251, 'Perikanan & Akuakultur', 'perikanan-akuakultur', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(252, 'Pertanian', 'pertanian', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(253, 'Robotika', 'robotika', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(254, 'Sipil', 'sipil', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(255, 'Telekomunikasi', 'telekomunikasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(256, 'Transportasi', 'transportasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(257, 'Otomotif', 'otomotif', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(258, 'Travel', 'travel', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(259, 'Afrika', 'afrika', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(260, 'Amerika Selatan', 'amerika-selatan', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(261, 'Amerika Utara', 'amerika-utara', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(262, 'Asia', 'asia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(263, 'Australia', 'australia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(264, 'Australia & Oceania', 'australia-oceania', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(265, 'Eropa', 'eropa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(266, 'Indonesia', 'indonesia', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(267, 'Minat Khusus', 'minat-khusus', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(268, 'Peta', 'peta', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(269, 'Timur Tengah', 'timur-tengah', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(270, 'Tubuh, Pikiran & Jiwa', 'tubuh-pikiran-jiwa', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(271, 'Mindfulness & Meditasi', 'mindfulness-meditasi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(272, 'Parapsikologi', 'parapsikologi', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL),
(273, 'Spiritualisme', 'spiritualisme', '2024-09-28 20:07:45', '2024-09-28 20:07:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_09_28_151254_create_roles_table', 2),
(8, '2024_09_28_152438_add_role_id_column_to_users_table', 3),
(9, '2024_09_28_160503_create_categories_table', 4),
(11, '2024_09_28_160854_create_books_table', 5),
(12, '2024_09_28_161304_create_book_category_table', 6),
(13, '2024_09_28_161450_create_rent_logs_table', 7),
(14, '2024_09_28_162059_add_slug_column_to_categories_table', 8),
(16, '2024_09_28_162556_add_deleted_at_column_to_categories_table', 9),
(17, '2024_09_28_163059_add_cover_column_to_books_table', 10),
(18, '2024_09_28_163439_add_slug_column_to_books_table', 11),
(19, '2024_09_28_163732_add_deleted_at_column_to_books_table', 12),
(21, '2024_09_28_172307_create_sessions_table', 13),
(22, '2024_09_29_050558_add_slug_column_to_useers_table', 14),
(23, '2024_09_29_075710_add_deleted_at_column_to_users_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rent_logs`
--

CREATE TABLE `rent_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'client', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `slug`, `password`, `phone`, `address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'admin', 'admin', '$2y$12$IDqgYwjAE71nyHT4IV4r/uezGtybO0Jeojqq0zJonvNFIRJwNP46i', NULL, 'perpustakaan', 'active', '2024-09-28 09:02:14', '2024-09-28 09:02:14', NULL),
(2, 2, 'kukohgntg', 'kukohgntg', '$2y$12$EDX1c7iMvmU8tNe2RCbTceJw5dCRisWXdlXdlrOYHi99zh58TMBPq', NULL, 'rumah kukoh', 'active', '2024-09-28 09:02:14', '2024-09-28 09:02:14', NULL),
(3, 2, 'hapis', 'hapis', '$2y$12$i0Vq.5LWQOwMWPMuJfY3Ie/.1Wx/idjTFW34n1/Fu9rZL8bRlxIDy', NULL, 'rumah hapis', 'active', '2024-09-28 22:14:53', '2024-09-29 00:41:41', NULL),
(4, 2, 'rapli', 'rapli', '$2y$12$jH4TpFpG.1ZDxShQlvU.LuJ/.91PIjqS2hPFYniTg6TogjRW6blSK', NULL, 'rumah rapli', 'active', '2024-09-29 00:44:35', '2024-09-29 02:00:27', NULL),
(5, 2, 'piki', 'piki', '$2y$12$eBcgx5zliWD5ArgOhHb16uM8mJnK.mH/A4h04rMF/ZG.TLEQ1HnYq', NULL, 'rumah piki', 'active', '2024-09-29 00:47:25', '2024-09-29 01:37:06', '2024-09-29 01:37:06'),
(6, 2, 'reno', 'reno', '$2y$12$iYl0ent35KoUiwRjYKvgdOG0QhZUDILcyxkR6N8hMLHc8URcGI92.', NULL, 'rumah reno', 'active', '2024-09-29 00:51:13', '2024-09-29 01:35:51', '2024-09-29 01:35:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_book_id_foreign` (`book_id`),
  ADD KEY `book_category_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_logs_user_id_foreign` (`user_id`),
  ADD KEY `rent_logs_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  ADD CONSTRAINT `rent_logs_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `rent_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
