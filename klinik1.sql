-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2023 pada 05.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `harga`) VALUES
(1, 'Obat A', 50.00),
(2, 'Obat B', 30.50),
(3, 'Obat C', 25.75),
(4, 'Obat D', 40.20),
(5, 'Obat E', 15.00),
(6, 'Obat F', 60.80),
(7, 'Obat G', 20.50),
(8, 'Obat H', 35.90),
(9, 'Obat I', 45.60),
(10, 'Obat J', 55.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `wilayah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tanggal_lahir`, `wilayah_id`) VALUES
(1, 'Pasien A', '1990-01-15', 1),
(2, 'Pasien B', '1985-05-20', 2),
(3, 'Pasien C', '1992-08-10', 3),
(4, 'Pasien D', '1988-02-28', 4),
(5, 'Pasien E', '1995-11-03', 5),
(6, 'Pasien F', '1983-09-12', 6),
(7, 'Pasien G', '1998-04-07', 7),
(8, 'Pasien H', '1980-06-25', 8),
(9, 'Pasien I', '1991-12-18', 9),
(10, 'Pasien J', '1987-07-30', 10),
(11, 'Patient1', '2023-01-14', 3),
(12, 'Patient2', '2023-09-26', 7),
(13, 'Patient3', '2023-09-09', 7),
(14, 'Patient4', '2023-07-08', 4),
(15, 'Patient5', '2023-08-28', 7),
(16, 'Patient6', '2023-11-08', 9),
(17, 'Patient7', '2023-05-09', 8),
(18, 'Patient8', '2023-01-21', 4),
(19, 'Patient9', '2023-12-10', 2),
(20, 'Patient10', '2023-06-03', 5),
(21, 'Patient11', '2023-07-20', 10),
(22, 'Patient12', '2023-09-15', 7),
(23, 'Patient13', '2023-06-24', 6),
(24, 'Patient14', '2023-10-05', 6),
(25, 'Patient15', '2023-03-03', 7),
(26, 'Patient16', '2023-06-05', 1),
(27, 'Patient17', '2023-08-14', 9),
(28, 'Patient18', '2023-12-10', 8),
(29, 'Patient19', '2023-05-12', 10),
(30, 'Patient20', '2023-05-23', 4),
(31, 'Patient21', '2023-04-01', 9),
(32, 'Patient22', '2023-03-16', 6),
(33, 'Patient23', '2023-09-03', 10),
(34, 'Patient24', '2023-01-04', 10),
(35, 'Patient25', '2023-03-02', 3),
(36, 'Patient26', '2023-01-30', 8),
(37, 'Patient27', '2023-02-12', 3),
(38, 'Patient28', '2023-06-29', 9),
(39, 'Patient29', '2023-04-29', 9),
(40, 'Patient30', '2023-10-26', 4),
(41, 'Patient31', '2023-08-17', 8),
(42, 'Patient32', '2023-07-27', 1),
(43, 'Patient33', '2023-03-23', 9),
(44, 'Patient34', '2023-02-20', 8),
(45, 'Patient35', '2023-08-26', 4),
(46, 'Patient36', '2023-03-01', 1),
(47, 'Patient37', '2023-04-15', 5),
(48, 'Patient38', '2023-01-06', 7),
(49, 'Patient39', '2023-09-24', 5),
(50, 'Patient40', '2023-10-10', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`) VALUES
(1, 'Pegawai A', '12345'),
(2, 'Pegawai B', '67890'),
(3, 'Pegawai C', '54321'),
(4, 'Pegawai D', '98765'),
(5, 'Pegawai E', '13579'),
(6, 'Pegawai F', '24680'),
(7, 'Pegawai G', '11223'),
(8, 'Pegawai H', '33445'),
(9, 'Pegawai I', '55667'),
(10, 'Pegawai J', '77889');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pasien_id`, `total_harga`, `tanggal_bayar`) VALUES
(1, 1, 200.00, '2023-01-01'),
(2, 2, 182.25, '2023-01-02'),
(3, 3, 75.50, '2023-01-03'),
(4, 4, 80.40, '2023-01-04'),
(5, 5, 45.00, '2023-01-05'),
(6, 6, 60.80, '2023-01-06'),
(7, 7, 41.00, '2023-01-07'),
(8, 8, 107.70, '2023-01-08'),
(9, 9, 45.60, '2023-01-09'),
(10, 10, 110.50, '2023-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permission`
--

INSERT INTO `permission` (`id`, `name`, `description`) VALUES
(1, 'Permission A', 'Description A'),
(2, 'Permission B', 'Description B'),
(3, 'Permission C', 'Description C'),
(4, 'Permission D', 'Description D'),
(5, 'Permission E', 'Description E'),
(6, 'Permission F', 'Description F'),
(7, 'Permission G', 'Description G'),
(8, 'Permission H', 'Description H'),
(9, 'Permission I', 'Description I'),
(10, 'Permission J', 'Description J');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `permission_id`) VALUES
(1, 'Role A', 'Description A', 1),
(2, 'Role B', 'Description B', 2),
(3, 'Role C', 'Description C', 3),
(4, 'Role D', 'Description D', 4),
(5, 'Role E', 'Description E', 5),
(6, 'Role F', 'Description F', 6),
(7, 'Role G', 'Description G', 7),
(8, 'Role H', 'Description H', 8),
(9, 'Role I', 'Description I', 9),
(10, 'Role J', 'Description J', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id`, `nama`, `harga`) VALUES
(1, 'Tindakan A', 100.00),
(2, 'Tindakan B', 75.50),
(3, 'Tindakan C', 50.25),
(4, 'Tindakan D', 120.00),
(5, 'Tindakan E', 90.75),
(6, 'Tindakan F', 60.50),
(7, 'Tindakan G', 45.25),
(8, 'Tindakan H', 80.00),
(9, 'Tindakan I', 55.75),
(10, 'Tindakan J', 70.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tindakan_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pasien_id`, `tindakan_id`, `obat_id`, `jumlah`, `total_harga`) VALUES
(1, 1, 1, 1, 2, 200.00),
(2, 2, 2, 2, 3, 182.25),
(3, 3, 3, 3, 1, 75.50),
(4, 4, 4, 4, 2, 80.40),
(5, 5, 5, 5, 3, 45.00),
(6, 6, 6, 6, 1, 60.80),
(7, 7, 7, 7, 2, 41.00),
(8, 8, 8, 8, 3, 107.70),
(9, 9, 9, 9, 1, 45.60),
(10, 10, 10, 10, 2, 110.50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user1@example.com'),
(42, 'nofri', '8e19d3bc7fa5f9a753735fbc245eb4ba', 'nofri@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(21, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`) VALUES
(1, 'Wilayah A'),
(2, 'Wilayah B'),
(3, 'Wilayah C'),
(4, 'Wilayah D'),
(5, 'Wilayah E'),
(6, 'Wilayah F'),
(7, 'Wilayah G'),
(8, 'Wilayah H'),
(9, 'Wilayah I'),
(10, 'Wilayah J');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-pasien-wilayah_id` (`wilayah_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_pasien` (`pasien_id`);

--
-- Indeks untuk tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_permission` (`permission_id`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_pasien` (`pasien_id`),
  ADD KEY `fk_transaksi_tindakan` (`tindakan_id`),
  ADD KEY `fk_transaksi_obat` (`obat_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-user_role-user_id` (`user_id`),
  ADD KEY `fk-user_role-role_id` (`role_id`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk-pasien-wilayah_id` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_role_permission` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_obat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_tindakan` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk-user_role-role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-user_role-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
