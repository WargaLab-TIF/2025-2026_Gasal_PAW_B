-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2025 at 08:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_tp5`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Pulpen Gel', 12000, 100, 1),
(2, 'BRG002', 'Buku Tulis', 15000, 200, 2),
(3, 'BRG003', 'Flashdisk 16GB', 25000, 80, 3),
(4, 'BRG004', 'Penghapus', 5000, 300, 4),
(5, 'BRG005', 'Mouse USB', 30000, 60, 5),
(6, 'BRG006', 'Keyboard USB', 22000, 50, 6),
(7, 'BRG007', 'Spidol Whiteboard', 18000, 120, 7),
(8, 'BRG008', 'Headset', 45000, 40, 8),
(9, 'BRG009', 'Pensil HB', 6000, 250, 9),
(10, 'BRG010', 'Harddisk 1TB', 75000, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('P001', 'Zakaria Mujur P', 'L', '0812000001', 'Jl. Kenanga 1'),
('P002', 'Budi', 'L', '0812000002', 'Jl. Kenanga 2'),
('P003', 'Citra', 'P', '0812000003', 'Jl. Kenanga 3'),
('P004', 'Dewi', 'P', '0812000004', 'Jl. Kenanga 4'),
('P005', 'Eko', 'L', '0812000005', 'Jl. Kenanga 5'),
('P006', 'Fajar', 'L', '0812000006', 'Jl. Kenanga 6'),
('P007', 'Permata', 'P', '0812000007', 'Jl. Kenanga 7'),
('P008', 'Salsabila', 'P', '0812000008', 'Jl. Kenanga 8'),
('P009', 'Indra', 'L', '0812000009', 'Jl. Kenanga 9'),
('P010', 'Yoga', 'L', '0812000010', 'Jl. Kenanga 10');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 10:10:00', 24000, 'TUNAI', 1),
(2, '2025-10-02 11:20:00', 45000, 'TRANSFER', 2),
(3, '2025-10-03 09:00:00', 25000, 'EDC', 3),
(4, '2025-10-04 15:30:00', 25000, 'TUNAI', 4),
(5, '2025-10-05 13:40:00', 30000, 'TRANSFER', 5),
(6, '2025-10-06 08:55:00', 44000, 'TUNAI', 6),
(7, '2025-10-07 16:05:00', 72000, 'TRANSFER', 7),
(8, '2025-10-08 14:15:00', 45000, 'EDC', 8),
(9, '2025-10-09 17:25:00', 18000, 'TUNAI', 9),
(10, '2025-10-10 12:35:00', 75000, 'TRANSFER', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Sumber Jaya', '0317000001', 'Jl Raya Telang'),
(2, 'CV Anugerah', '0317000002', 'Jl. Merpati 2'),
(3, 'UD Berkah', '0317000003', 'Jl. Merpati 3'),
(4, 'PT Multi Niaga', '0317000004', 'Jl. Merpati 4'),
(5, 'CV Cipta Karya', '0317000005', 'Jl. Merpati 5'),
(6, 'UD Maju Lancar', '0317000006', 'Jl. Merpati 6'),
(7, 'PT Cahaya Abadi', '0317000007', 'Jl. Merpati 7'),
(8, 'CV Kencana', '0317000008', 'Jl. Merpati 8'),
(9, 'UD Mitra Usaha', '0317000009', 'Jl. Merpati 9'),
(10, 'PT Sentosa', '0317000010', 'Jl. Merpati 10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) NOT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian 1', 24000, 'P001'),
(2, '2025-10-02', 'Pembelian 2', 45000, 'P002'),
(3, '2025-10-03', 'Pembelian 3', 25000, 'P003'),
(4, '2025-10-04', 'Pembelian 4', 25000, 'P004'),
(5, '2025-10-05', 'Pembelian 5', 30000, 'P005'),
(6, '2025-10-06', 'Pembelian 6', 44000, 'P006'),
(7, '2025-10-07', 'Pembelian 7', 72000, 'P007'),
(8, '2025-10-08', 'Pembelian 8', 45000, 'P008'),
(9, '2025-10-09', 'Pembelian 9', 18000, 'P009'),
(10, '2025-10-10', 'Pembelian 10', 75000, 'P010');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 12000, 2),
(2, 2, 15000, 3),
(3, 3, 25000, 1),
(4, 4, 5000, 5),
(5, 5, 30000, 1),
(6, 6, 22000, 2),
(7, 7, 18000, 4),
(8, 8, 45000, 1),
(9, 9, 6000, 3),
(10, 10, 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', '123456', 'Administrator', 'Kantor Pusat', '0813000001', 1),
(2, 'kasir1', '123456', 'Kasir Satu', 'Outlet 1', '0813000002', 2),
(3, 'kasir2', '123456', 'Kasir Dua', 'Outlet 2', '0813000003', 2),
(4, 'gudang1', '123456', 'Petugas Gudang', 'Gudang A', '0813000004', 3),
(5, 'gudang2', '123456', 'Petugas Gudang', 'Gudang B', '0813000005', 3),
(6, 'owner', '123456', 'Pemilik', 'Surabaya', '0813000006', 0),
(7, 'spv1', '123456', 'Supervisor', 'Kantor Pusat', '0813000007', 2),
(8, 'marketing1', '123456', 'Marketing', 'Surabaya', '0813000008', 4),
(9, 'it1', '123456', 'IT Support', 'Surabaya', '0813000009', 4),
(10, 'auditor', '123456', 'Auditor', 'Surabaya', '0813000010', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `fk_barang_supplier` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trx_pelanggan` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `fk_td_barang` (`barang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_bayar_trx` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_trx_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_td_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_td_trx` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
