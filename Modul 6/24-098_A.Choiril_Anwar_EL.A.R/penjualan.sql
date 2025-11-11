-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2025 pada 16.46
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
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'GM-001', 'Novel \"Laskar Pelangi\"', 98000, 50, 1),
(2, 'GM-002', 'Novel \"Bumi Manusia\"', 135000, 40, 1),
(3, 'EL-001', 'Buku Mandiri Fisika SMA', 120000, 30, 2),
(4, 'EMK-01', 'Komik \"One Piece\" Vol. 100', 45000, 100, 4),
(5, 'MZ-001', 'Buku \"Filosofi Teras\"', 105000, 60, 3),
(6, 'AG-001', 'Buku \"Berkebun di Rumah\"', 88000, 25, 5),
(7, 'AND-01', 'Buku \"Belajar Python\"', 150000, 20, 6),
(8, 'FC-001', 'Pensil Warna 24 Set', 110000, 80, 10),
(9, 'FC-002', 'Pulpen Tri-Click (Hitam)', 5000, 200, 10),
(10, 'TS-001', 'Buku Tulis 38 Lbr (Pack 10)', 40000, 150, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('PL001', 'Budi Santoso', 'L', '08123456789', 'Jl. Mawar No. 10, Surabaya'),
('PL002', 'Ani Wijaya', 'P', '08134567890', 'Jl. Melati No. 2, Jakarta'),
('PL003', 'Citra Lestari', 'P', '08156789012', 'Jl. Kenanga No. 5, Bandung'),
('PL004', 'Doni Hermawan', 'L', '08178901234', 'Jl. Flamboyan No. 1, Yogyakarta'),
('PL005', 'Eka Saputra', 'L', '08190123456', 'Jl. Cendana No. 8, Solo'),
('PL006', 'Fani Ramadhani', 'P', '08122233344', 'Jl. Diponegoro No. 7, Semarang'),
('PL007', 'Gilang Pratama', 'L', '08133344455', 'Jl. Sudirman No. 12, Medan'),
('PL008', 'Hana Pertiwi', 'P', '08155566677', 'Jl. Pattimura No. 3, Denpasar'),
('PL009', 'Indra Gunawan', 'L', '08177788899', 'Jl. Thamrin No. 9, Jakarta'),
('PL010', 'Joko Susilo', 'L', '08199900011', 'Jl. Basuki Rahmat No. 22, Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(11, '2025-10-25 11:01:00', 233000, 'EDC', 41),
(12, '2025-10-25 14:16:00', 120000, 'EDC', 42),
(13, '2025-10-26 10:31:00', 90000, 'TUNAI', 43),
(14, '2025-10-26 16:02:00', 150000, 'TRANSFER', 44),
(15, '2025-10-27 13:01:00', 105000, 'TUNAI', 45),
(16, '2025-10-27 17:02:00', 186000, 'EDC', 46),
(17, '2025-10-28 12:01:00', 300000, 'TRANSFER', 47),
(18, '2025-10-28 19:01:00', 40000, 'TUNAI', 48),
(19, '2025-10-29 15:02:00', 110000, 'EDC', 49),
(20, '2025-10-29 18:31:00', 20000, 'TUNAI', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`, `email`) VALUES
(1, 'Penerbit Gramedia', '021-53650110', 'Jl. Palmerah Barat, Jakarta', NULL),
(2, 'Penerbit Erlangga', '021-8718006', 'Jl. H. Baping Raya, Ciracas', NULL),
(3, 'Mizan Pustaka', '022-7802288', 'Jl. Cinambo No. 135, Bandung', NULL),
(4, 'Penerbit Elex Media', '021-53677834', 'Gedung Kompas Gramedia, Jakarta', NULL),
(5, 'AgroMedia Pustaka', '021-78881000', 'Jl. H. Montong, Jagakarsa', NULL),
(6, 'Distributor Buku Andi', '0274-561881', 'Jl. Beo No. 38, Yogyakarta', NULL),
(7, 'Penerbit Tiga Serangkai', '0271-714344', 'Jl. Dr. Supomo No. 23, Solo', NULL),
(8, 'Bentang Pustaka', '0274-6411366', 'Jl. Plemburan No. 1, Yogyakarta', NULL),
(9, 'Penerbit Kawan Pustaka', '021-78888880', 'Jl. M. Kahfi II, Jagakarsa', NULL),
(10, 'Stationery Faber-Castell', '021-29289800', 'Menara Standard Chartered, Jakarta', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` datetime DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(41, '2025-10-25 11:00:00', 'Beli Novel', 233000, 'PL001'),
(42, '2025-10-25 14:15:00', 'Beli Buku Sekolah', 120000, 'PL003'),
(43, '2025-10-26 10:30:00', 'Beli Komik', 90000, 'PL002'),
(44, '2025-10-26 16:00:00', 'Beli Alat Tulis', 150000, 'PL005'),
(45, '2025-10-27 13:00:00', 'Beli Buku Filsafat', 105000, 'PL009'),
(46, '2025-10-27 17:00:00', 'Beli Buku Kebun & Novel', 186000, 'PL004'),
(47, '2025-10-28 12:00:00', 'Beli Buku Komputer', 300000, 'PL007'),
(48, '2025-10-28 19:00:00', 'Beli Buku Tulis 1 Pack', 40000, 'PL006'),
(49, '2025-10-29 15:00:00', 'Beli Pensil Warna', 110000, 'PL008'),
(50, '2025-10-29 18:30:00', 'Beli Pulpen 4 pcs', 20000, 'PL010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(41, 2, 135000, 1),
(42, 3, 120000, 1),
(43, 4, 45000, 2),
(44, 8, 110000, 1),
(45, 5, 105000, 1),
(46, 6, 88000, 1),
(47, 7, 150000, 2),
(48, 10, 40000, 1),
(49, 8, 110000, 1),
(50, 9, 5000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', 'Kantor Pusat', '0811111111', 1),
(2, 'kasir1', 'kasirno1', 'Yoga (Kasir)', 'Meja Kasir 1', '0812222222', 2),
(3, 'kasir2', 'kasirno2', 'Jossa (Kasir)', 'Meja Kasir 2', '0813333333', 2),
(4, 'gudang', 'stokgudang', 'Alim (Stok Buku)', 'Area Gudang', '0814444444', 3),
(5, 'manager', 'managertoko', 'Pak Manajer', 'Ruang Manajer', '0815555555', 1),
(6, 'sales1', 'salerno1', 'Vega (Pramuniaga)', 'Area Toko', '0816666666', 2),
(7, 'finance', 'finace123', 'Riffo (Finance)', 'Ruang Keuangan', '0817777777', 3),
(8, 'owner', 'ownertoko', 'Pak Bos', 'Ruang Owner', '0818888888', 1),
(9, 'tech', 'tech123', 'Teknisi IT', 'Ruang Server', '0819999999', 3),
(10, 'cs', 'customservice', 'Customer Service', 'Lobi', '0810000000', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
