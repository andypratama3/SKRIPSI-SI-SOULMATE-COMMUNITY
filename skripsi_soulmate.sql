-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2023 pada 20.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_soulmate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nomor_hp`, `alamat`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TES', '12312312', 'awdawdawd', 'anggota/bXjGg1FNq4BEP38qBz6XhK54HAsSKNPycHMH1qbn.png', '2022-09-22 02:07:25', '2022-09-22 02:07:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nama_genre` varchar(50) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `nama_genre`, `biaya`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kpop Dance4', 400000, '2022-09-22 02:27:05', '2023-08-15 09:39:44', NULL),
(2, '5Modern Dance', 6000000, '2023-07-30 01:49:50', '2023-08-15 09:39:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(10) UNSIGNED DEFAULT NULL,
  `id_team` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `waktu_pemesanan` date DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(50) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `bukti` text DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='1= proses verifikasi\r\n2 = pencarian tim\r\n3 = selesai';

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_pelanggan`, `id_team`, `id_genre`, `waktu_pemesanan`, `metode_pembayaran`, `nomor_hp`, `lokasi`, `status`, `bukti`, `tgl_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 1, '2022-09-27', 'Transafer', '123123123', 'dwdawd', 3, NULL, NULL, '2022-09-25 09:05:22', '2022-09-25 09:40:07', NULL),
(4, 3, 1, 1, '2023-07-30', 'Transafer', '082296212526', 'Taman Samarendah', 3, NULL, NULL, '2023-07-29 20:26:33', '2023-07-29 20:26:54', NULL),
(5, 2, 1, 1, '2023-08-16', 'Transafer', '1231231', 'awdaw', 3, '351009250_771925401306622_6480479921534144167_n.jpg', '2023-08-15 18:03:19', '2023-08-15 09:43:09', '2023-08-15 10:12:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `nama_tim` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `id_genre`, `nama_tim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'NYX', '2022-09-22 02:40:27', '2023-08-15 09:32:50', NULL),
(2, 1, 'TESSS', '2023-07-30 02:11:19', '2023-07-30 02:11:24', '2023-07-30 02:11:24'),
(3, 1, 'tes', '2023-07-30 02:11:50', '2023-07-30 02:11:50', NULL),
(4, 1, NULL, '2023-08-15 09:31:12', '2023-08-15 09:31:12', NULL),
(5, 1, 'tes', '2023-08-15 09:32:35', '2023-08-15 09:32:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `id_team` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `team_member`
--

INSERT INTO `team_member` (`id`, `id_team`, `id_member`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-09-22 03:07:04', '2023-07-30 01:50:51', '2023-07-30 01:50:51'),
(2, 2, 1, '2023-07-30 02:11:19', '2023-07-30 02:11:19', NULL),
(3, 5, 1, '2023-08-15 09:32:35', '2023-08-15 09:32:35', NULL),
(4, 1, 1, '2023-08-15 09:33:03', '2023-08-15 09:33:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('1','2') DEFAULT '2',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '1', 'admin@gmail.com', NULL, '$2y$10$JqPlOLeaRtZSyb9.lysHXO4z68jY8KrXuHclrhsNkx7pfTRtL2mda', NULL, '2022-09-21 12:36:52', '2022-09-21 12:36:52', NULL),
(2, 'Pengguna', '2', 'pengguna@gmail.com', NULL, '$2y$10$gPEzoT/4bd3F/ysihj0uBOyK91gn4.C/IL9DPuyMY8ITuHrNM0ouC', NULL, '2022-09-25 08:38:46', '2022-09-25 08:38:46', NULL),
(3, 'FItri', '2', 'fitri@gmail.com', NULL, '$2y$10$TQZ5YID5cVIqL9/.s6QQweNJNy6kNxLnGM8a2S1WhobCsKd2GRKdi', NULL, '2023-07-29 20:25:45', '2023-07-29 20:25:45', NULL),
(4, 'Nur Fitriani', '2', 'nurfitriani39366@gmail.com', NULL, '$2y$10$TJYe/lcMysCqvQdWAmClqOXkhP0dhitD5voqnogfpC8dqJwhVsFUO', NULL, '2023-07-30 01:55:30', '2023-07-30 01:55:30', NULL),
(5, 'tes', '2', 'tes@gmail.com', NULL, '$2y$10$tX.xoCxCirfBwD8gva1i8uy/xg/qyjiWiWSTehgzVsb66b4u9gMTm', NULL, '2023-07-30 02:16:34', '2023-07-30 02:16:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pemesanan_team` (`id_team`),
  ADD KEY `FK_pemesanan_genre` (`id_genre`),
  ADD KEY `FK_pemesanan_users` (`id_pelanggan`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_team_genre` (`id_genre`);

--
-- Indeks untuk tabel `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__anggota` (`id_member`),
  ADD KEY `FK__team` (`id_team`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_pemesanan_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_pemesanan_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_pemesanan_users` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_team_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `FK__anggota` FOREIGN KEY (`id_member`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK__team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
