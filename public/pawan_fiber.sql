-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jun 2023 pada 03.51
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawan_fiber`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `istirahat` int DEFAULT NULL,
  `pulang` int DEFAULT NULL,
  `jam_istirahat` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_user`, `nama`, `istirahat`, `pulang`, `jam_istirahat`, `jam_pulang`, `foto`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(29, 5, 'ade maulana', 2, 2, '09:53:15', '14:05:56', 'app/images/absensi/-1672800753-9ycHI.jpg', '109.3425039', '-0.0263303', 1, '2023-01-03 23:52:03', '2023-06-01 07:45:09'),
(30, 5, 'ade maulana', 2, 2, '19:22:50', '14:09:15', 'app/images/absensi/-1672904170-xW4hv.jpg', '109.2059136', '1.6089088', 1, '2023-05-06 23:36:10', '2023-06-01 07:44:55'),
(31, 6, 'Akmal Alfarizi', 2, 2, '20:48:21', '20:53:13', 'app/images/absensi/-1672904234-B9d7Y.jpg', '109.2059136', '1.6089088', 1, '2023-01-04 23:37:14', '2023-06-01 07:44:49'),
(32, 5, 'ade maulana', 2, 1, '10:17:00', NULL, 'app/images/absensi/-1679312321-DUPbQ.jpg', '109.9258797', '-1.8508255', 2, '2023-03-20 00:38:42', '2023-06-01 07:44:41'),
(47, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1685360847-WJGe4.png', '109.946604', '-1.8532775', 2, '2023-05-29 00:47:27', '2023-06-01 07:44:04'),
(48, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1685454449-fi5fY.png', '109.9465575', '-1.853278', 3, '2023-05-30 13:47:29', '2023-05-30 13:47:29'),
(49, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1685605799-dTPyS.png', '109.3425039', '-0.0263303', 3, '2023-06-01 07:49:59', '2023-06-01 07:49:59'),
(50, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1686123959-6piaf.jpg', '114.844879', '-3.4255734', 3, '2023-06-08 07:46:01', '2023-06-08 03:21:36'),
(51, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1686637180-xFmW6.jpg', '109.3009955', '-0.0132044', 3, '2023-06-08 06:19:40', '2023-06-13 07:33:03'),
(52, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1686723557-S3DzO.jpg', '115.4259675', '-1.6897618', 3, '2023-06-14 06:19:18', '2023-06-14 06:19:18'),
(53, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1686724159-3fLb8.png', '109.9874605', '-1.8160536', 3, '2023-06-14 06:29:19', '2023-06-14 06:29:19'),
(54, 5, 'ade maulana', 1, 1, NULL, NULL, 'app/images/absensi/-1686801018-c99PQ.jpg', '109.94840297484798', '-1.825352804584275', 3, '2023-06-15 03:50:18', '2023-06-15 03:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `remember_token`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$fHGOXAkylhevSJbSXi9bDuc3DQJxtpxp3ZZNUm5nhT4ixGMoWNybu', NULL, 'admin@gmail.com', '2022-11-09 03:27:51', '2022-11-09 03:27:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapegawai`
--

CREATE TABLE `datapegawai` (
  `id` int NOT NULL,
  `nik` bigint DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `gaji_pokok` int DEFAULT NULL,
  `status_kerja` enum('Tetap','Kontrak','Magang/Training','Freelance/Partime') DEFAULT NULL,
  `jatah_cuti` varchar(255) DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `jam_kerja` enum('Senin - Jumat','Senin - Sabtu') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `no_handphone` varchar(255) DEFAULT NULL,
  `divisi` enum('HRD & GA','Finance','Sales & marketing','Network & Technical') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jabatan` enum('HRD GA','Kepala Cabang','Kepala Teknisi','Leader Finance AP','Leader Finance AR','Leader Sales','Leader IKR','Costumer Service','Staff Accounting','Staff Inventory','Staff Finance','Staff Teknisi','Office Boy') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapegawai`
--

INSERT INTO `datapegawai` (`id`, `nik`, `email`, `nama`, `alamat`, `foto`, `gaji_pokok`, `status_kerja`, `jatah_cuti`, `tanggal_berakhir`, `jam_kerja`, `tanggal_lahir`, `jenis_kelamin`, `no_handphone`, `divisi`, `jabatan`, `tanggal_masuk`, `password`, `status`, `created_at`, `updated_at`) VALUES
(5, 93740237402, 'admlna26@gmail.com', 'ade maulana', NULL, NULL, 200000, 'Kontrak', '6', '2022-12-23', 'Senin - Jumat', NULL, 'Laki - Laki', '0820174190274', 'Finance', 'Leader Finance AP', '2022-12-09', '$2y$10$sWJFkStUPNFxoPmNKPfya.qUmo38y8wu3jKt.F4FUlXgtIHicWkQe', 2, '2022-12-09 04:04:35', '2023-05-28 14:54:51'),
(6, 2349829793520, 'akmal@gmail.com', 'Akmal Alfarizi', NULL, 'app/images/datapegawai/6-1671008572-EHDwk.webp', 200000, 'Kontrak', '6', '2022-12-31', 'Senin - Jumat', NULL, 'Laki - Laki', '0820174190274', 'HRD & GA', 'HRD GA', '2022-12-09', '$2y$10$jtzznJwAyoWtbKmm6O47B.3/vWOdk3YJkHkk93KABYaQhnNWBJ01K', NULL, '2022-12-09 04:24:59', '2022-12-14 09:02:52'),
(8, 23984020923, 'megapratw17@gmail.com', 'mega pratiwi', 'payak kumang', 'app/images/datapegawai/-1685103856-tO1Bw.jpg', 1000, 'Tetap', '7', '2023-05-27', 'Senin - Jumat', '2023-05-25', 'Perempuan', '93080803', 'Sales & marketing', 'Kepala Cabang', '2023-05-26', '$2y$10$68NC.1C0Rh032RRhxFDXCOAZpb3Ji63oM9IMiX/FyBeHM0bCwv/46', NULL, '2023-05-26 12:24:17', '2023-05-26 12:37:40'),
(9, 93729482946329, 'user@gmail.com', 'user', 'anok', 'app/images/datapegawai/-1686800419-gMVBO.jpg', 1000000, 'Tetap', '6', '2023-06-16', 'Senin - Jumat', '2023-06-15', 'Laki - Laki', '0298402', 'Network & Technical', 'Kepala Teknisi', '2023-06-15', '$2y$10$4bKv4tRazivhI/cmNdKPdOTjDQ4XbpK2ib7drOFd8tb9CR4mJN8WO', NULL, '2023-06-15 03:40:21', '2023-06-15 03:40:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dinas`
--

CREATE TABLE `dinas` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `deskripsi_dinas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `dinas`
--

INSERT INTO `dinas` (`id`, `id_user`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi_dinas`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(4, 5, 'ade maulana', '2022-12-15', '2022-12-24', 'skjhfksgfkwgekslaaoatohlhslhruyrhksjghf,mn,blshgoeiroiyghdgdgfghoeeoiighlflfdngdhgeotoerhtdhgdglshlehtoiiethtldhgdg,fkkeg', '110.33706665039064', '-1.780185315393532', '2022-12-15 04:22:51', '2022-12-15 04:24:48'),
(5, 5, 'ade maulana', '2022-12-15', '2022-12-16', 'huh', '110.06927490234376', '-1.7403786705878306', '2022-12-15 06:13:35', '2022-12-15 06:13:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin`
--

CREATE TABLE `izin` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `tipe_izin` enum('Cuti','Izin','Sakit') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `izin`
--

INSERT INTO `izin` (`id`, `id_user`, `tipe_izin`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(37, 6, 'Sakit', '2023-04-11', '2023-04-11', 'sakit lutut', 'app/images/izin/37-1681112210-iVrxQ.jpg', 3, '2023-04-10 07:36:50', '2023-05-01 13:26:21'),
(38, 5, 'Izin', '2023-05-05', '2023-05-06', 'kawen', 'app/images/izin/38-1683294733-FI0bs.jpg', 3, '2023-05-05 06:52:13', '2023-05-14 14:18:49'),
(39, 5, 'Sakit', '2023-05-05', '2023-05-06', 'sakit gigi geraham', 'app/images/izin/39-1683294885-rPQTC.png', 1, '2023-05-05 06:54:45', '2023-05-16 04:43:26'),
(46, 5, 'Izin', '2023-05-08', '2023-05-09', 'besunat', 'app/images/izin/46-1683530143-CqMeU.png', 1, '2023-05-08 07:15:43', '2023-05-14 14:18:55'),
(48, 5, 'Izin', '2023-05-17', '2023-05-17', 'kawennn', 'app/images/izin/48-1684212270-n7wL3.png', 1, '2023-05-16 04:44:30', '2023-05-16 04:44:30'),
(49, 5, 'Cuti', '2023-05-28', '2023-05-28', 'sakit gigi geraham', 'app/images/izin/49-1685279974-08WC3.png', 1, '2023-05-28 13:19:34', '2023-05-28 13:19:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `aktifitas` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `id_user`, `nama`, `lembur`, `selesai`, `aktifitas`, `created_at`, `updated_at`) VALUES
(4, 5, 'ade maulana', 2, '11:12:09', 'ngoding', '2022-12-13 06:36:30', '2022-12-15 04:12:11'),
(7, 5, 'ade maulana', 1, '10:58:25', 'biasalah', '2022-12-16 18:38:59', '2023-05-17 03:58:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_absensi`
--

CREATE TABLE `lokasi_absensi` (
  `id` int NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `radius` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `lokasi_absensi`
--

INSERT INTO `lokasi_absensi` (`id`, `lokasi`, `latitude`, `longitude`, `radius`, `created_at`, `updated_at`) VALUES
(9, 'rumahku', '-1.843359467229907', '109.9694208262824', '10', '2023-06-07 07:49:59', '2023-06-13 07:12:58'),
(10, 'politap', '-1.825352804584275', '109.94840297484798', '10', '2023-06-13 07:11:31', '2023-06-14 06:28:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datapegawai`
--
ALTER TABLE `datapegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lokasi_absensi`
--
ALTER TABLE `lokasi_absensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `datapegawai`
--
ALTER TABLE `datapegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lokasi_absensi`
--
ALTER TABLE `lokasi_absensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `datapegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dinas`
--
ALTER TABLE `dinas`
  ADD CONSTRAINT `dinas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `datapegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `datapegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `datapegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
