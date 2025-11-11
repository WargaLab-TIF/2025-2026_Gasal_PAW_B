-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2025 pada 16.45
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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian kebutuhan harian', 37000, 'PLG001'),
(2, '2025-10-02', 'Pembelian perlengkapan mandi', 32000, 'PLG002'),
(3, '2025-10-03', 'Pembelian sembako', 52000, 'PLG003'),
(4, '2025-10-04', 'Pembelian makanan ringan', 28000, 'PLG004'),
(5, '2025-10-05', 'Pembelian sabun dan shampo', 20000, 'PLG005'),
(6, '2025-10-06', 'Pembelian susu dan gula', 43000, 'PLG006'),
(7, '2025-10-07', 'Pembelian minuman', 26000, 'PLG007'),
(8, '2025-10-08', 'Pembelian tissue dan kopi', 22000, 'PLG008'),
(9, '2025-10-09', 'Pembelian sembako lengkap', 75000, 'PLG009'),
(10, '2025-10-10', 'Pembelian alat mandi', 30000, 'PLG010'),
(11, '2025-11-07', '', 20000, 'PLG002'),
(12, '2025-11-12', 'belanja', 50000, 'PLG001'),
(13, '2025-11-06', 'Belanja buat Toko', 150000, 'PLG006');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
