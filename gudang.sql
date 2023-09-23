-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2023 pada 09.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` tinyint(1) DEFAULT 0,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `updated_at`, `created_at`) VALUES
(2, 'admin', '$2y$10$zraTD/nAFnsJVW4PTv01leD1L4bRCNKv8YjvVsgM9ssqe8ZfCVsn6', 1, '2023-06-08 06:33:31', '0000-00-00 00:00:00'),
(3, 'blas', '$2y$10$D2XnP6gYQ97s2zBU6fxRN.D9OzxUMI7dWQ087xUGHjwa223uAKrhu', 0, '2023-06-08 03:49:19', '2023-06-08 03:48:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `image`, `updated_at`, `created_at`) VALUES
(1, 'asset-user/banner/1686236003.jpg', '2023-06-08 14:53:23', '2023-06-08 14:53:23'),
(2, 'asset-user/banner/1686236012.jpg', '2023-06-08 14:53:32', '2023-06-08 14:53:32'),
(3, 'asset-user/banner/1694605265.png', '2023-09-13 11:41:05', '2023-09-13 11:41:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `menu`, `title`, `content`, `image`, `publisher`, `updated_at`, `created_at`) VALUES
(4, 'kerjasama', 'adsad', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'asset-user/blog/1686042470.jpg', 'admin', '2023-06-11 00:15:47', '2023-06-06 09:07:50'),
(6, 'edukasi', 'asdasdasd', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'asset-user/blog/1686042619.jpg', 'admin', '2023-06-11 00:10:56', '2023-06-06 09:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Anak anak', 'asset-user/category/testing.png', 'testing jga ini', 'anak-anak', '2023-09-12 17:00:00', '2023-09-12 17:00:00'),
(2, 'Dongeng', 'asset-user/category/test.png', 'testing', 'dongeng', '2023-09-13 14:28:28', '2023-09-13 14:28:28'),
(3, 'Filsafat', 'asset-user/category/1694618141.png', 'tests', 'filsafat', '2023-09-13 08:15:42', '2023-09-13 09:13:02'),
(4, 'Pelajaran', 'asset-user/category/1694621519.png', 'pelajaran', 'pelajaran', '2023-09-13 09:11:59', '2023-09-13 09:11:59'),
(5, 'Sejarah', 'asset-user/category/1694621541.jpg', 'test', 'sejarah', '2023-09-13 09:12:21', '2023-09-13 09:12:21'),
(6, 'Komik', 'asset-user/category/1694621569.png', 'asdsdasd', 'komik', '2023-09-13 09:12:49', '2023-09-13 09:12:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title_header` text NOT NULL,
  `subtitle_header` text NOT NULL,
  `company_about` text NOT NULL,
  `logo` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `link_address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `shopee` text NOT NULL,
  `tokped` text NOT NULL,
  `twitter` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `name`, `title_header`, `subtitle_header`, `company_about`, `logo`, `email`, `address`, `link_address`, `phone`, `fb`, `ig`, `shopee`, `tokped`, `twitter`, `updated_at`, `created_at`) VALUES
(1, 'Gudang Kreatif Idea', '1.000 + NASKAH TELAH DITERBITKAN.', '“Kami adalah penerbit buku pertama yang menginisiasi buku terindeks google scholar, dan telah berhasil menerbitkan Naskah Buku Ajar, Monograp, Referensi, Bunga Rampai dan Jurnal Ilmiah dari berbagai kalangan akademisi baik kampus Negeri atau Swasta.', '<p>Kami adalah Penerbit Nasional yang secara profesional fokus menerbitkan buku-buku akademik independen yang memiliki komitmen untuk menyebarluaskan hasil penelitian para peneliti Indonesia secara nasional ataupun global, selanjutnya untuk menggenapi pemenuhan terhadap mutu dan kualitas terbitan, kami juga telah berhasil menjadi anggota&nbsp;anggota resmi IKAPI (Ikatan Penerbit Indonesia) Nomor ke anggotaan 360/ALB/JBA/2020.</p>\r\n\r\n<p>Sebagai penerbit buku, media elektronik, dan jurnal ilmiah profesional, kami menawarkan kesempatan bagi penelitian dan pelaku pendidikan lainnya untuk menjangkau komunitas akademik nasional yang terdiri dari cendekiawan, praktisi, peneliti, dan mahasiswa yang mencakup berbagai bidang studi. Komitmen kami terhadap kualitas dan inovasi secara konsistensi menjaga mutu akademik merupakan pembeda lembaga kami dengan program penerbitan lain. sebagai upaya bentuk diseminasi dan pengukuran dampak, seluruh karya tulis yang kami terbitkan terindeks sejumlah portal akademik, di antaranya:</p>\r\n\r\n<ol>\r\n	<li><a href=\"https://scholar.google.com/citations?user=k1FWNlsAAAAJ&amp;hl=id\">Google Scholar</a></li>\r\n	<li><a href=\"https://www.worldcat.org/search?q=Widina+Bhakti+Persada+Bandung&amp;qt=results_page\">Worldcat</a></li>\r\n	<li><a href=\"https://www.base-search.net/Search/Results?lookfor=widina+bhakti&amp;name=&amp;oaboost=1&amp;newsearch=1&amp;refid=dcbasen\">BASE</a></li>\r\n	<li><a href=\"https://repository.penerbitwidina.com/catalogue\">Neliti.com</a></li>\r\n	<li><a href=\"https://onesearch.id/Search/Results?lookfor=widina+bhakti&amp;type=AllFields&amp;limit=20&amp;sort=relevance\">One Search Perpusnas</a></li>\r\n</ol>\r\n\r\n<p>Produk kami meliputi:</p>\r\n\r\n<ol>\r\n	<li>Buku akademik (Buku ajar, Referensi dan Monograp) dengan visi yang luas dan konten yang berharga</li>\r\n	<li>Jurnal ilmiah untuk berbagai bidang ilmu, sebagai bentuk berkontribusi pada disiplin ilmu masa depan dan disampaikan dalam berbagai format elektronik dan cetak. (Kunjungi Pusat kami di&nbsp;<a href=\"http://jurnal.penerbitwidina.com/\">www.jurnal.penerbitwidina.com</a>&nbsp;untuk mengakses semua konten jurnal baru)</li>\r\n	<li>Kursus online terkait peningkatan skill dan kemampuan dibidang pengajaran, penelitian dan penggunaan teknologi bidang pendidikan</li>\r\n	<li>Konversi Hasil penelitian (Skripsi, Tesis atau Disertasi) ke dalam format buku.</li>\r\n</ol>', 'asset-user/config/1686185980.png', 'gudangkreatif@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.9984597713533!2d107.11525781477008!3d-6.394198795373373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjMnMzkuMSJTIDEwN8KwMDcnMDIuOCJF!5e0!3m2!1sen!2sid!4v1686044712258!5m2!1sen!2sid', '6281586298430', 'https://id-id.facebook.com/', 'https://www.instagram.com/', 'https://shopee.com/', 'https://www.tokopedia.com/', 'https://twitter.com/?lang=id', '2023-06-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `link` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id`, `menu`, `link`, `updated_at`, `created_at`) VALUES
(1, 'katalog', 'https://repository.penerbitwidina.com/browse/all', '2023-06-12 12:09:23', '2023-06-12 12:09:23'),
(2, 'jurnal', 'https://jurnal.penerbitwidina.com/', '2023-06-12 12:09:47', '2023-06-12 12:09:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu-blog`
--

CREATE TABLE `menu-blog` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu-blog`
--

INSERT INTO `menu-blog` (`id`, `category`) VALUES
(1, 'edukasi'),
(2, 'kerjasama'),
(3, 'artikel'),
(4, 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `naskah`
--

CREATE TABLE `naskah` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `link` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `naskah`
--

INSERT INTO `naskah` (`id`, `title`, `subtitle`, `link`, `updated_at`, `created_at`) VALUES
(1, 'Buku Ajar', 'Template tidak bersifat wajib, untuk selebihnya kami serahkan kepada  penulis dan disesuaian dengan kebutuhan masing-masing.', 'https://luull.github.io', '2023-06-11 01:28:08', '2023-06-10 13:03:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `slug` text NOT NULL,
  `price` int(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `image`, `description`, `slug`, `price`, `updated_at`, `created_at`) VALUES
(1, 2, 'test', 'asset-user/product/1686234416.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'test', 1900001, '2023-06-11 00:39:28', '2023-06-08 14:26:57'),
(2, 2, 'test 2', 'asset-user/product/1686234436.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'test-2', 700000, '2023-09-13 15:30:44', '2023-06-08 14:27:16'),
(5, 3, 'buku kerajaan', 'asset-user/product/1694619014.png', 'adsadasdsad', 'buku-kerajaan', 60000, '2023-09-13 15:31:15', '2023-09-13 15:30:14'),
(8, 2, 'test', 'asset-user/product/1694621421.png', 'adadadasd', 'test', 123, '2023-09-13 16:10:21', '2023-09-13 16:10:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `image` text DEFAULT NULL,
  `content` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `training_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `menu`, `title`, `subtitle`, `image`, `content`, `updated_at`, `created_at`, `training_date`) VALUES
(14, 'penelitian', 'Konversi Hasil Penelitian', 'Ini adalah submenu Konversi Hasil Penelitian', 'asset-user/service/1686025769.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:08:07', '2023-06-06 04:29:29', NULL),
(15, 'haki', 'Penguasa Haki', 'Ini adalah sub menu Penguasa Haki', 'asset-user/service/1686453299.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/upload/service/1686452486.jpg\" style=\"height:638px; width:850px\" /></p>\r\n\r\n<ul>\r\n	<li>test</li>\r\n</ul>\r\n\r\n<p>asd</p>\r\n\r\n<ul>\r\n	<li>asdsd</li>\r\n	<li>asdsdsadsa</li>\r\n	<li>adasdsaddasd</li>\r\n</ul>', '2023-06-23 16:07:20', '2023-06-11 03:15:00', NULL),
(29, 'konversi', 'Konversi KTI', 'ini adalah submenu Konversi KTI', 'asset-user/service/1687080132.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:11:49', '2023-06-18 09:22:12', NULL),
(30, 'editing', 'Editing Naskah', 'ini adalah submenu Editing Naskah', 'asset-user/service/1687080153.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:12:08', '2023-06-18 09:22:33', NULL),
(31, 'design', 'Design Cover', 'ini adalah submenu Design Cover', 'asset-user/service/1687080176.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:12:27', '2023-06-18 09:22:56', NULL),
(32, 'layout', 'Layout', 'ini adalah submenu Layout', 'asset-user/service/1687080197.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:12:43', '2023-06-18 09:23:17', NULL),
(38, 'pelatihan', 'Pelatihan', 'ini adalah submenu Pelatihan', 'asset-user/service/1687081264.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:10:37', '2023-06-18 09:41:04', '2023-06-25'),
(47, 'kolaborasi', 'Menulis Kolaborasi', 'Ini adalah submenu Menulis Kolaborasi', 'asset-user/service/1687536532.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-06-23 16:08:52', '2023-06-23 16:08:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `job` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `name`, `job`, `image`, `description`, `education`, `experience`, `updated_at`, `created_at`) VALUES
(2, 'Ahmad Hazmi Pratama', 'Web Developer', 'asset-user/team/1686231618.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2023-06-08 13:40:52', '2023-06-08 02:56:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu-blog`
--
ALTER TABLE `menu-blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `naskah`
--
ALTER TABLE `naskah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu-blog`
--
ALTER TABLE `menu-blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `naskah`
--
ALTER TABLE `naskah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
