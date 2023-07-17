-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2022 pada 21.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_si_sdn002loajanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `id_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nuptk` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `status_kepegawaian` int(11) DEFAULT NULL,
  `id_jenis_ptk` int(11) DEFAULT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `jurusan_prodi` varchar(100) DEFAULT NULL,
  `sertifikasi` varchar(100) DEFAULT NULL,
  `tmt_kerja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `id_admin`, `nama`, `nuptk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nip`, `status_kepegawaian`, `id_jenis_ptk`, `jenjang`, `jurusan_prodi`, `sertifikasi`, `tmt_kerja`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Eko Pujianto', '123123', 'Laki Laki', 'Samarinda', '2022-09-08', '19911129 201903 2 020', 2, 3, 4, 'TRPL', 'AATESSSS', '2022-09-07', '2022-09-04 12:57:30', '2022-09-04 12:57:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenjang_pendidikan`
--

CREATE TABLE `ref_jenjang_pendidikan` (
  `id` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_jenjang_pendidikan`
--

INSERT INTO `ref_jenjang_pendidikan` (`id`, `jenjang_pendidikan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S1', '2022-08-27 11:09:33', '2022-08-27 11:09:33', NULL),
(2, 'SD / sederajat', '2022-08-27 11:09:39', '2022-08-27 11:09:46', NULL),
(3, 'SMA / sederajat', '2022-09-04 09:08:19', '2022-09-04 09:08:19', NULL),
(4, 'S2', '2022-09-04 09:08:26', '2022-09-04 09:08:26', NULL),
(5, 'D1', '2022-09-04 09:08:31', '2022-09-04 09:08:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_ptk`
--

CREATE TABLE `ref_ptk` (
  `id` int(11) NOT NULL,
  `jenis_ptk` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_ptk`
--

INSERT INTO `ref_ptk` (`id`, `jenis_ptk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Guru Kelas', '2022-08-27 11:05:44', '2022-08-27 11:05:44', NULL),
(2, 'Guru Mapel', '2022-09-04 09:08:43', '2022-09-04 09:08:43', NULL),
(3, 'Kepala Sekolah', '2022-09-04 09:08:49', '2022-09-04 09:08:49', NULL),
(4, 'Tenaga Administrasi Sekolah', '2022-09-04 09:08:55', '2022-09-04 09:08:55', NULL),
(5, 'Penjaga Sekolah', '2022-09-04 09:09:00', '2022-09-04 09:09:00', NULL),
(6, 'Kepala Sekolah', '2022-09-04 09:09:12', '2022-09-04 09:09:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_status_kepegawaian`
--

CREATE TABLE `ref_status_kepegawaian` (
  `id` int(11) NOT NULL,
  `status_kepegawaian` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_status_kepegawaian`
--

INSERT INTO `ref_status_kepegawaian` (`id`, `status_kepegawaian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PNS', '2022-09-04 09:07:41', '2022-09-04 09:07:41', NULL),
(2, 'Guru Honor Sekolah', '2022-09-04 09:07:49', '2022-09-04 09:07:49', NULL),
(3, 'PNS Depag', '2022-09-04 09:07:54', '2022-09-04 09:07:54', NULL),
(4, 'Tenaga Honor Sekolah', '2022-09-04 09:07:59', '2022-09-04 09:07:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `jenjang_pendidikan` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt_rw` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten_kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `lat` text DEFAULT NULL,
  `lng` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama_sekolah`, `npsn`, `jenjang_pendidikan`, `alamat`, `rt_rw`, `kode_pos`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `negara`, `lat`, `lng`, `deskripsi`, `visi`, `misi`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMP N 24 Samarinda', '1213123', 5, 'Jl. P.Suryanata No.35, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '1231', 'Air Putih', 'Air Putih', 'SUNGAIKUNJANG', 'Kota Samarinda', 'AAAA', 'Indonesia', NULL, NULL, 'awdawd', 'dawda', 'wdawd', 'foto_sekolah/PnlM14ltDX1BZMIUt76XIlEVNbJWoAEurWwv34qn.png', '2022-09-04 13:22:08', '2022-09-04 22:06:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `id_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `nipd` varchar(150) DEFAULT NULL,
  `jenis_kelamin` enum('Laki Laki','Perempuan') DEFAULT NULL,
  `nisn` varchar(1150) DEFAULT NULL,
  `tempat_lahir` varchar(1150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(1150) DEFAULT NULL,
  `agama` varchar(1150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_post` varchar(100) DEFAULT NULL,
  `jenis_tinggal` varchar(100) DEFAULT NULL,
  `alat_transpotasi` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `penerima_kps` enum('IYA','TIDAK') DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(100) DEFAULT NULL,
  `jenjang_pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan` varchar(150) DEFAULT NULL,
  `nik_ayah` varchar(150) DEFAULT NULL,
  `nama_ibu` varchar(150) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(150) DEFAULT NULL,
  `jenjang_pendidikan_ibu` varchar(150) DEFAULT NULL,
  `pekerjaan_ibu` varchar(150) DEFAULT NULL,
  `penghasilan_ibu` varchar(150) DEFAULT NULL,
  `nik_ibu` varchar(150) DEFAULT NULL,
  `nama_wali` varchar(150) DEFAULT NULL,
  `tahun_lahir_wali` varchar(150) DEFAULT NULL,
  `jenjang_pendidikan_wali` varchar(150) DEFAULT NULL,
  `pekerjaan_wali` varchar(150) DEFAULT NULL,
  `penghasilan_wali` varchar(150) DEFAULT NULL,
  `nik_wali` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_admin`, `nama`, `nipd`, `jenis_kelamin`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_post`, `jenis_tinggal`, `alat_transpotasi`, `no_hp`, `penerima_kps`, `nama_ayah`, `tahun_lahir_ayah`, `jenjang_pendidikan`, `pekerjaan_ayah`, `penghasilan`, `nik_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `jenjang_pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nik_ibu`, `nama_wali`, `tahun_lahir_wali`, `jenjang_pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `nik_wali`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Eko Pujianto', '1231', 'Laki Laki', '123123', 'Samarinda', '2022-09-14', '123123123123', 'Islam', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '57', '0', '-', 'Air Putih', 'Samarinda Ulu', '75124', 'Orang Tua', 'Motor', '082157819525', 'TIDAK', 'ATESS', '2022-09-02', 'S1', 'tesss', 'Rp. 2,000,000 - Rp. 4,999,999', '123123', 'ATESS', '2022-09-02', 'S1', 'tesss', 'Rp. 2,000,000 - Rp. 4,999,999', '123123', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 12:12:43', '2022-09-04 12:31:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$eCmdVL2N7R77pRfx5wSfB.mM59JmU5eId19m2TQ0XewYYpYwpSZgq', NULL, '2022-08-27 09:20:54', '2022-08-27 09:20:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_guru_ref_status_kepegawaian` (`status_kepegawaian`),
  ADD KEY `FK_guru_ref_ptk` (`id_jenis_ptk`),
  ADD KEY `FK_guru_ref_jenjang_pendidikan` (`jenjang`),
  ADD KEY `FK_guru_users` (`id_admin`);

--
-- Indeks untuk tabel `ref_jenjang_pendidikan`
--
ALTER TABLE `ref_jenjang_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_ptk`
--
ALTER TABLE `ref_ptk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_status_kepegawaian`
--
ALTER TABLE `ref_status_kepegawaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sekolah_ref_jenjang_pendidikan` (`jenjang_pendidikan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_siswa_users` (`id_admin`);

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
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ref_jenjang_pendidikan`
--
ALTER TABLE `ref_jenjang_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ref_ptk`
--
ALTER TABLE `ref_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ref_status_kepegawaian`
--
ALTER TABLE `ref_status_kepegawaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FK_guru_ref_jenjang_pendidikan` FOREIGN KEY (`jenjang`) REFERENCES `ref_jenjang_pendidikan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_guru_ref_ptk` FOREIGN KEY (`id_jenis_ptk`) REFERENCES `ref_ptk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_guru_ref_status_kepegawaian` FOREIGN KEY (`status_kepegawaian`) REFERENCES `ref_status_kepegawaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_guru_users` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `FK_sekolah_ref_jenjang_pendidikan` FOREIGN KEY (`jenjang_pendidikan`) REFERENCES `ref_jenjang_pendidikan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_siswa_users` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
