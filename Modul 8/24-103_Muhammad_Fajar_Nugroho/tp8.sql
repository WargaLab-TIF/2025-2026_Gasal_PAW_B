-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2025 at 12:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `kode_barang` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `supplier_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Laptop Pro 16 inch', 15000000, 41, 3),
(2, 'BRG002', 'Mouse Wireless Silent', 150000, 192, 2),
(3, 'BRG003', 'Keyboard Mechanical RGB', 750000, 96, 2),
(4, 'BRG004', 'Buku Tulis Sinar Dunia 50lbr', 5000, 997, 3),
(5, 'BRG005', 'Kursi Kantor Ergonomis', 1200000, 24, 4),
(6, 'BRG006', 'Kopi Sachet ABC Susu 1 renceng', 15000, 494, 5),
(7, 'BRG007', 'Novel Laskar Pelangi', 80000, 141, 12),
(8, 'BRG008', 'Kaos Polos Hitam M', 65000, 297, 8),
(9, 'BRG009', 'Bola Basket Spalding', 350000, 38, 9),
(10, 'BRG010', 'Paracetamol 500mg 1 strip', 3000, 988, 10),
(11, 'tes', 'tes', 1, 3, 11),
(13, 'p', 'p', 23456, 456, 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `laporan_penjualan` (
`barang_id` int
,`first_sold` date
,`jumlah_terjual` decimal(32,0)
,`kode_barang` varchar(20)
,`last_sold` date
,`nama_barang` varchar(200)
,`total_penjualan` decimal(36,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int NOT NULL,
  `no_nota` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total` decimal(14,2) NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `no_nota`, `tanggal`, `total`, `user_id`) VALUES
(1, 'NT-20251110114621', '2025-11-10', '3490.00', 2),
(2, 'NT-20251111110554', '2025-11-11', '0.00', 3),
(3, 'NT-20251111110838', '2025-11-11', '0.00', 3),
(4, 'NT-20251111110838-2', '2025-11-11', '0.00', 4),
(5, 'NT-20251111110838-3', '2025-11-11', '0.00', 4),
(6, 'NT-20251111112159', '2025-11-11', '15005000.00', 2),
(7, 'NT-20251111112548', '2025-11-11', '3000.00', 2),
(8, 'NT-20251111113124', '2025-11-11', '350000.00', 2),
(9, 'NT-20251111114646', '2025-11-11', '15000.00', 2),
(10, 'NT-20251111115502', '2025-11-11', '117780000.00', 2),
(11, 'NT-20251114122958', '2025-11-14', '5000.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nota_detail`
--

CREATE TABLE `nota_detail` (
  `id` int NOT NULL,
  `nota_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `qty` int NOT NULL,
  `harga` decimal(14,2) NOT NULL,
  `subtotal` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_detail`
--

INSERT INTO `nota_detail` (`id`, `nota_id`, `barang_id`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 4, 1, '3000.00', '3000.00'),
(2, 1, 2, 1, '490.00', '490.00'),
(3, 2, 7, 1, '0.00', '0.00'),
(4, 3, 1, 1, '0.00', '0.00'),
(5, 4, 1, 1, '0.00', '0.00'),
(6, 5, 1, 1, '0.00', '0.00'),
(7, 6, 4, 1, '5000.00', '5000.00'),
(8, 6, 1, 1, '15000000.00', '15000000.00'),
(9, 7, 10, 1, '3000.00', '3000.00'),
(10, 8, 9, 1, '350000.00', '350000.00'),
(11, 9, 6, 1, '15000.00', '15000.00'),
(12, 10, 9, 1, '350000.00', '350000.00'),
(13, 10, 4, 2, '5000.00', '10000.00'),
(14, 10, 8, 3, '65000.00', '195000.00'),
(15, 10, 3, 4, '750000.00', '3000000.00'),
(16, 10, 6, 5, '15000.00', '75000.00'),
(17, 10, 5, 6, '1200000.00', '7200000.00'),
(18, 10, 1, 7, '15000000.00', '105000000.00'),
(19, 10, 2, 8, '150000.00', '1200000.00'),
(20, 10, 7, 9, '80000.00', '720000.00'),
(21, 10, 10, 10, '3000.00', '30000.00'),
(22, 11, 4, 1, '5000.00', '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `hp`) VALUES
('PLG001', 'Ibu Sari', '081300011111'),
('PLG002', 'Bapak Agus', '081300022222'),
('PLG003', 'Toko Maju', '081300033333'),
('PLG004', 'Warung Sehat', '081300044444'),
('PLG005', 'Kantor X', '081300055555'),
('PLG006', 'Apotek Sehat', '081300066666'),
('PLG007', 'Rumah Tangga Y', '081300077777');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nama_supplier` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pic` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`, `email`, `pic`) VALUES
(1, 'PT Sumber Makmur Sejahtera', 'Jl. Industri No. 15, Jakarta Pusat', '0215551234', 'contact@sumbermakmur.co.id', 'Andi Saputra'),
(2, 'CV Maju Bersama', 'Jl. Melati No. 27, Bandung', '0227894561', 'info@majubersama.co.id', 'Siti Rahmah'),
(3, 'PT Cahaya Elektronik', 'Jl. Gatot Subroto No. 88, Surabaya', '0316678990', 'support@cahaya-elektronik.com', 'Budi Herlambang'),
(4, 'UD Sumber Sembako', 'Jl. Pasar Induk No. 21, Semarang', '0247783412', 'order@sumbersembako.id', 'Hendra Wijaya'),
(5, 'PT Prima Food Supplies', 'Jl. Raya Bogor No. 45, Bogor', '0251559443', 'sales@primafood.id', 'Dewi Lestari'),
(6, 'CV Berkah Farma', 'Jl. Apotek No. 9, Yogyakarta', '0274503211', 'admin@berkahfarma.co.id', 'Rahmat Hidayat'),
(7, 'PT Nusantara Packaging', 'Jl. Kemasan No. 32, Bekasi', '0218899776', 'cs@nusantarapack.com', 'Lina Permata'),
(8, 'CV Mega Stationery', 'Jl. Pena No. 14, Malang', '0341992345', 'order@megastationery.id', 'Rudi Prasetyo'),
(9, 'PT Digital Jaya Abadi', 'Jl. Komputer No. 10, Medan', '0618221144', 'hello@digitaljaya.co.id', 'Wahyu Fadillah'),
(10, 'UD Mandiri Jaya Fresh', 'Jl. Pertanian No. 5, Makassar', '0411457688', 'fresh@mandirijaya.id', 'Nurhaliza'),
(11, 'Tes', 'Tes', '09876', 'tes@gmail.com', 'Tes'),
(12, 'blabla', 'fgbgfbgfb', '09876543', 'tes1@gmail.com', 'bla');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `total` int DEFAULT NULL,
  `pelanggan_id` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`, `user_id`) VALUES
(1, '2025-01-03', 'Pembelian kebutuhan dapur: minyak goreng, gula, tepung', 125000, 'PLG001', 2),
(2, '2025-01-05', 'Pembelian alat tulis: buku, pulpen, pensil', 48000, 'PLG002', 3),
(3, '2025-01-08', 'Pembelian elektronik kecil: charger HP', 65000, 'PLG003', 2),
(4, '2025-01-10', 'Pembelian sembako bulanan', 275000, 'PLG001', 2),
(5, '2025-01-12', 'Refund produk rusak: snack kemasan', -15000, 'PLG004', 2),
(6, '2025-01-15', 'Pembelian minuman & makanan ringan', 92000, 'PLG005', 6),
(7, '2025-01-17', 'Pembelian produk kebersihan: sabun, deterjen, pembersih lantai', 104000, 'PLG003', 4),
(8, '2025-01-19', 'Pembelian obat dan vitamin umum', 87000, 'PLG006', 2),
(9, '2025-01-20', 'Top-up layanan digital: pulsa 50rb', 50000, 'PLG002', 3),
(10, '2025-01-22', 'Pembelian perlengkapan rumah tangga: ember & sapu', 58000, 'PLG007', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(32) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Utama', 'Jl. Merdeka No. 10', '0811111101', 1),
(2, 'kasirA', '69d838fa3dd27822a1ae7dffb7fdfe67', 'Rizal', 'Jl. Kasir Raya No. 5', '0812222202', 2),
(3, 'kasirB', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nurhayati', 'Jl. Kasir Baru No. 3', '0813333303', 2),
(4, 'gudang1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Slamet', 'Jl. Pergudangan No. 12', '0814444404', 2),
(5, 'manager1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Hartono', 'Jl. Manajer Utama No. 2', '0815555505', 1),
(6, 'salesA', '5f4dcc3b5aa765d61d8327deb882cf99', 'Putra', 'Jl. Penjualan No. 8', '0816666606', 2),
(7, 'teknisiA', '5f4dcc3b5aa765d61d8327deb882cf99', 'Joko', 'Jl. Teknisi No. 4', '0817777707', 2),
(8, 'finance1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Melani', 'Jl. Keuangan Baru No. 6', '0818888808', 2),
(9, 'direktur', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andreas', 'Jl. Direktur No. 1', '0819999909', 1),
(10, 'visitor', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pengunjung', 'Jl. Tamu Raya No. 11', '0810000010', 2),
(11, 'pajar', 'e10adc3949ba59abbe56e057f20f883e', 'Pajar Ramadhan', 'Jl. Melati Indah No. 9', '089876543210', 2),
(12, 'tes', 'b93939873fd4923043b9dec975811f66', 'Tes', 'xdfcgvh', '098765', 1),
(13, 'kasirutama', '7a4bea0d9b59b04928ec29e9d9a143ae', 'Kasir Utama', 'xsdfcghj ', '0842456456', 1),
(14, 'kasirc', '5c774aefff79d20edbbfe2b24187b9f0', 'Kasir C', 'gf f gfvdfvfdvfd', '098765', 2);

-- --------------------------------------------------------

--
-- Structure for view `laporan_penjualan`
--
DROP TABLE IF EXISTS `laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_penjualan`  AS SELECT `b`.`id` AS `barang_id`, `b`.`kode_barang` AS `kode_barang`, `b`.`nama_barang` AS `nama_barang`, sum(`nd`.`qty`) AS `jumlah_terjual`, sum(`nd`.`subtotal`) AS `total_penjualan`, min(`n`.`tanggal`) AS `first_sold`, max(`n`.`tanggal`) AS `last_sold` FROM ((`nota_detail` `nd` join `nota` `n` on((`nd`.`nota_id` = `n`.`id`))) join `barang` `b` on((`nd`.`barang_id` = `b`.`id`))) GROUP BY `b`.`id`, `b`.`kode_barang`, `b`.`nama_barang``nama_barang`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_id` (`nota_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nota_detail`
--
ALTER TABLE `nota_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD CONSTRAINT `nota_detail_ibfk_1` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
