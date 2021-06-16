-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2020 at 03:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optiksinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `pre_nama_customer` enum('Tn.','Ny.') NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `last_visit` date DEFAULT NULL,
  `total_visit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `pre_nama_customer`, `nama_customer`, `tgl_lahir`, `no_telepon`, `alamat`, `last_visit`, `total_visit`, `created_at`, `updated_at`) VALUES
(1, 'Tn.', 'Pebi Setiawan', '1995-11-21', 8976878787, 'Kp. Melayu Gang kecil no.27, Jakarta Timur', NULL, 0, '2020-11-22 07:34:35', '2020-11-22 07:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `frame`
--

CREATE TABLE `frame` (
  `id` int(11) NOT NULL,
  `merek_frame` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bahan` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_supplier` int(11) NOT NULL DEFAULT 0,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` varchar(255) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `tgl_pelunasan` date DEFAULT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total` bigint(20) NOT NULL DEFAULT 0,
  `kode_barcode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frame`
--

INSERT INTO `frame` (`id`, `merek_frame`, `kode`, `jenis`, `bahan`, `warna`, `keterangan`, `id_supplier`, `tgl_pembelian`, `status_pembelian`, `no_faktur`, `tgl_jatuh_tempo`, `tgl_pelunasan`, `harga_beli`, `harga_jual`, `jumlah_barang`, `total`, `kode_barcode`, `created_at`, `updated_at`) VALUES
(1, 'Hummer', 'A001', 'Frameless', 'Kombinasi', 'Hitam', 'Lens Width = 54 mm. Bridge = 16 mm. Temple = 142 mm', 1, '2020-11-22', 'Tempo', '20/11/INDAH/0001', '2020-12-22', NULL, 2000000, 2350000, 5, 10000000, '20201122/A001/Hummer', '2020-11-22 09:40:59', '2020-11-22 09:40:59'),
(2, 'Aeon', 'A002', 'Semi Full Frame', 'Metal', 'Cokelat', '-', 1, '2020-11-22', 'Tunai', 'D/2020/0001', '2020-11-23', '2020-11-23', 20000, 23500, 50, 1000000, '20201123/A002/Aeon', '2020-11-22 18:38:14', '2020-11-22 18:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `gaji` varchar(255) NOT NULL,
  `uang_makan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `tgl_lahir`, `no_telepon`, `alamat`, `tgl_masuk`, `tgl_keluar`, `gaji`, `uang_makan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Ujang', '1992-11-21', 8967678787, 'Jalan raya garut no.27. Kab. Garut', '2018-11-21', '2020-11-21', '3.000.000', '70.000', 'Karyawan Lama', '2020-11-20 16:58:07', '2020-11-20 16:58:07'),
(3, 'Roni Ginanjar', '1988-11-10', 8129275893, 'Jalan raya kediri no.1, Kab. Kediri', '2020-11-21', NULL, '3.000.000', '50.000', 'Karyawan baru', '2020-11-20 17:19:21', '2020-11-20 17:21:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `nama_pic` varchar(255) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `nama_pic`, `contact_person`, `alamat`, `no_rek`, `nama_bank`, `atas_nama`, `created_at`, `updated_at`) VALUES
(1, 'CV. Indah Jaya', 'Irfan Firdaus', '021-56789', 'Pasar Senen Jaya Blok I No.7, Jakarta Pusat', '089123456', 'Bank BNI', 'CV. Indah Jaya', '2020-11-22 06:32:37', '2020-11-22 06:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@sistem.com', NULL, '$2y$10$WN.NtzNztI1hvg0OKKk0WerTGAuJbA4sl5UjcTYPjVxXvUX/yYcTa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frame`
--
ALTER TABLE `frame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frame`
--
ALTER TABLE `frame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
