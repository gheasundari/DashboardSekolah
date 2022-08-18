-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2022 pada 08.01
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_agama`
--

CREATE TABLE `dim_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_asalsekolah`
--

CREATE TABLE `dim_asalsekolah` (
  `id_asalsekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_jeniskelamin`
--

CREATE TABLE `dim_jeniskelamin` (
  `id_jeniskelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_jenistinggal`
--

CREATE TABLE `dim_jenistinggal` (
  `id_jenis_tinggal` int(11) NOT NULL,
  `jenis_tinggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_penerimakip`
--

CREATE TABLE `dim_penerimakip` (
  `id_kip` int(11) NOT NULL,
  `penerimakip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_rombel`
--

CREATE TABLE `dim_rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_rombel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_tahun`
--

CREATE TABLE `dim_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_transportasi`
--

CREATE TABLE `dim_transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `jenis_transportasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fact_sekolah`
--

CREATE TABLE `fact_sekolah` (
  `nisn` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` int(11) DEFAULT NULL,
  `jenis_tinggal` int(11) DEFAULT NULL,
  `transportasi` int(11) DEFAULT NULL,
  `penerima_kip` int(11) DEFAULT NULL,
  `rombel` int(11) DEFAULT NULL,
  `asal_sekolah` int(11) DEFAULT NULL,
  `data_tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `rules` int(11) DEFAULT NULL COMMENT 'Admin = 1; Kepsek = 2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `xls_sekolah`
--

CREATE TABLE `xls_sekolah` (
  `nisn` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_tinggal` varchar(50) DEFAULT NULL,
  `transportasi` varchar(150) DEFAULT NULL,
  `penerima_kip` varchar(10) DEFAULT NULL,
  `rombel` varchar(25) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `data_tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `xl_sekolah`
--

CREATE TABLE `xl_sekolah` (
  `nisn` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_tinggal` varchar(50) DEFAULT NULL,
  `transportasi` varchar(150) DEFAULT NULL,
  `penerima_kip` varchar(10) DEFAULT NULL,
  `rombel` varchar(25) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `data_tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dim_agama`
--
ALTER TABLE `dim_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `dim_asalsekolah`
--
ALTER TABLE `dim_asalsekolah`
  ADD PRIMARY KEY (`id_asalsekolah`);

--
-- Indeks untuk tabel `dim_jeniskelamin`
--
ALTER TABLE `dim_jeniskelamin`
  ADD PRIMARY KEY (`id_jeniskelamin`);

--
-- Indeks untuk tabel `dim_jenistinggal`
--
ALTER TABLE `dim_jenistinggal`
  ADD PRIMARY KEY (`id_jenis_tinggal`);

--
-- Indeks untuk tabel `dim_penerimakip`
--
ALTER TABLE `dim_penerimakip`
  ADD PRIMARY KEY (`id_kip`);

--
-- Indeks untuk tabel `dim_rombel`
--
ALTER TABLE `dim_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `dim_tahun`
--
ALTER TABLE `dim_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `dim_transportasi`
--
ALTER TABLE `dim_transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indeks untuk tabel `fact_sekolah`
--
ALTER TABLE `fact_sekolah`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `agama` (`agama`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `jenis_tinggal` (`jenis_tinggal`,`transportasi`,`penerima_kip`,`rombel`,`asal_sekolah`),
  ADD KEY `penerima_kip` (`penerima_kip`),
  ADD KEY `asal_sekolah` (`asal_sekolah`),
  ADD KEY `transportasi` (`transportasi`),
  ADD KEY `rombel` (`rombel`),
  ADD KEY `data_tahun` (`data_tahun`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `xls_sekolah`
--
ALTER TABLE `xls_sekolah`
  ADD PRIMARY KEY (`nisn`) USING BTREE;

--
-- Indeks untuk tabel `xl_sekolah`
--
ALTER TABLE `xl_sekolah`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dim_agama`
--
ALTER TABLE `dim_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_asalsekolah`
--
ALTER TABLE `dim_asalsekolah`
  MODIFY `id_asalsekolah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_jeniskelamin`
--
ALTER TABLE `dim_jeniskelamin`
  MODIFY `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_jenistinggal`
--
ALTER TABLE `dim_jenistinggal`
  MODIFY `id_jenis_tinggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_penerimakip`
--
ALTER TABLE `dim_penerimakip`
  MODIFY `id_kip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_rombel`
--
ALTER TABLE `dim_rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_tahun`
--
ALTER TABLE `dim_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dim_transportasi`
--
ALTER TABLE `dim_transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fact_sekolah`
--
ALTER TABLE `fact_sekolah`
  ADD CONSTRAINT `fact_sekolah_ibfk_1` FOREIGN KEY (`penerima_kip`) REFERENCES `dim_penerimakip` (`id_kip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_2` FOREIGN KEY (`asal_sekolah`) REFERENCES `dim_asalsekolah` (`id_asalsekolah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_3` FOREIGN KEY (`jenis_tinggal`) REFERENCES `dim_jenistinggal` (`id_jenis_tinggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_4` FOREIGN KEY (`agama`) REFERENCES `dim_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_5` FOREIGN KEY (`transportasi`) REFERENCES `dim_transportasi` (`id_transportasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_6` FOREIGN KEY (`rombel`) REFERENCES `dim_rombel` (`id_rombel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_7` FOREIGN KEY (`jenis_kelamin`) REFERENCES `dim_jeniskelamin` (`id_jeniskelamin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_sekolah_ibfk_8` FOREIGN KEY (`data_tahun`) REFERENCES `dim_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
