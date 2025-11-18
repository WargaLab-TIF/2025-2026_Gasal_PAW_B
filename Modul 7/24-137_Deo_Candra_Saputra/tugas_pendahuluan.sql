-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2025 at 04:13 AM
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
-- Database: `tugas_pendahuluan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `supplier_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(2364850, 'MAT001', 'Semen Portland 40kg', 55000, 199, 2290240),
(2364851, 'MAT002', 'Semen Putih Premium 40kg', 72000, 163, 2290241),
(2364852, 'MAT003', 'Besi Beton 10mm', 60000, 125, 2290242),
(2364853, 'MAT004', 'Pipa Besi 1 Inch', 85000, 120, 2290243),
(2364854, 'MAT005', 'Plat Baja 2mm', 150000, 52, 2290244),
(2364855, 'MAT006', 'Aluminium Hollow 2x4', 65000, 150, 2290245),
(2364856, 'MAT007', 'Gypsum Board 9mm', 52000, 85, 2290246),
(2364857, 'MAT008', 'Beton Instan 25kg', 50000, 80, 2290247),
(2364858, 'MAT009', 'Pasir Silika 50kg', 58000, 200, 2290248),
(2364859, 'MAT010', 'Baja Ringan 0.75mm', 95000, 105, 2290249);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `id_nota` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_pelanggan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1038300, 'Andi Prasetyo', 'L', '08145273922', 'Jl Mawar 10'),
(1038301, 'Budi Santoso', 'L', '08251379425', 'Jl Melati 22'),
(1038302, 'Citra Dewi', 'P', '08376149203', 'Jl Kenanga 8'),
(1038303, 'Dwi Anggraini', 'P', '08458391027', 'Jl Teratai 4'),
(1038304, 'Eko Pratama', 'L', '08579231046', 'Jl Dahlia 3'),
(1038305, 'Fitri Handayani', 'P', '08659320157', 'Jl Cempaka 5'),
(1038306, 'Gilang Putra', 'L', '08746219830', 'Jl Flamboyan 7'),
(1038307, 'Hana Rahma', 'P', '08862937415', 'Jl Surya 11'),
(1038308, 'Irfan Saputra', 'L', '08974120368', 'Jl Merpati 2'),
(1038309, 'Juli Astika', 'P', '08167349205', 'Jl Kemuning 9');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') NOT NULL,
  `transaksi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(43504600, '2025-02-01 09:00:00', 55000, 'TUNAI', 6450740),
(43504601, '2025-02-01 10:30:00', 60000, 'TUNAI', 6450741),
(43504602, '2025-02-02 11:00:00', 85000, 'TRANSFER', 6450742),
(43504603, '2025-02-02 14:00:00', 150000, 'EDC', 6450743),
(43504604, '2025-02-03 08:45:00', 52000, 'TUNAI', 6450744),
(43504605, '2025-02-04 09:20:00', 65000, 'TRANSFER', 6450745),
(43504606, '2025-02-05 15:10:00', 95000, 'EDC', 6450746),
(43504607, '2025-02-06 10:50:00', 50000, 'TUNAI', 6450747),
(43504608, '2025-02-06 13:40:00', 58000, 'TRANSFER', 6450748),
(43504609, '2025-02-07 16:25:00', 72000, 'EDC', 6450749);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(2290240, 'PT Semen Indonesia', '08145273910', 'Jl Veteran, Gresik'),
(2290241, 'PT Indocement Tunggal Prakarsa', '08253197420', 'Jl Mayor Oking, Bogor'),
(2290242, 'PT Astra Otoparts', '08367281945', 'Jl Raya Pegangsaan Dua, Jakarta'),
(2290243, 'PT Steel Pipe Industry of Indonesia', '08473928058', 'Jl Kalibutuh, Surabaya'),
(2290244, 'PT Krakatau Steel', '085657349102', 'Jl Industri Krakatau, Cilegon'),
(2290245, 'PT Bumi Alumunium', '08654782973', 'Jl Karya Timur, Medan'),
(2290246, 'PT Sinar Mas Building', '08752940316', 'Jl Raya Serpong, Tangerang'),
(2290247, 'CV Cahaya Beton', '08862197423', 'Jl Raya Pandaan, Pasuruan'),
(2290248, 'CV Makmur Jaya Bangunan', '08947162035', 'Jl Diponegoro, Malang'),
(2290249, 'PT Wahana Karya Baja', '081693274103', 'Jl Merdeka, Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int NOT NULL,
  `penlanggan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `penlanggan_id`) VALUES
(6450740, '2025-10-31', 'Pembelian Semen Portland ', 55000, 1038300),
(6450741, '2025-11-01', 'Pembelian Besi ', 60000, 1038301),
(6450742, '2025-11-02', 'Pembelian Pipa Besi ', 85000, 1038302),
(6450743, '2025-11-02', 'Pembelian Plat Baja  ', 150000, 1038303),
(6450744, '2025-11-03', 'Pembelian Gypsum Board  ', 52000, 1038304),
(6450745, '2025-11-04', 'Pembelian Aluminium Hollow ', 65000, 1038305),
(6450746, '2025-11-05', 'Pembelian Baja Ringan ', 95000, 1038306),
(6450747, '2025-11-05', 'Pembelian Beton Instan ', 50000, 1038307),
(6450748, '2025-11-06', 'Pembelian Pasir Silika ', 58000, 1038308),
(6450749, '2025-11-07', 'Pembelian Semen Putih Premium ', 72000, 1038309),
(6450750, '2025-11-07', 'Pembelian Semen Putih Premium ', 72000, 1038302),
(6450751, '2025-11-08', 'Pembelian Semen Putih Premium ', 72000, 1038302),
(6450752, '2025-11-10', 'Pembelian Semen Putih Premium ', 72000, 1038302),
(6450753, '2025-11-10', 'Pembelian Semen Putih Premium dan Besi Beton dan Aluminium Hollow ', 1605000, 1038306),
(6450754, '2025-11-11', 'Pembelian Plat Baja dan Beton Instan dan Baja Ringan', 2380000, 1038308),
(6450755, '2025-11-12', 'Pembelian Plat Baja dan Beton Instan dan Baja Ringan', 2380000, 1038308),
(6450756, '2025-11-13', 'Pembelian Plat Baja dan Beton Instan dan Baja Ringan', 2380000, 1038308),
(6450757, '2025-11-14', 'Pembelian Semen Putih Premium dan Besi Beton dan Aluminium Hollow ', 2380000, 1038308),
(6450758, '2025-11-14', 'Pembelian Semen Putih Premium dan Plat Baja dan Gypsum Board dan Baja Ringan', 1505000, 1038304),
(6450759, '2025-11-15', 'Pembelian Semen Putih Premium dan Plat Baja dan Gypsum Board dan Baja Ringan', 1505000, 1038304),
(6450760, '2025-11-16', 'Pembelian Semen Putih Premium dan Plat Baja dan Gypsum Board dan Baja Ringan', 1505000, 1038304),
(6450761, '2025-11-16', 'Pembelian Besi Beton ', 600000, 1038303),
(6450762, '2025-11-16', 'Pembelian Beton Instan ', 150000, 1038300),
(6450763, '2025-11-17', 'Pembelian Beton Instan ', 150000, 1038300),
(6450764, '2025-11-18', 'Pembelian Beton Instan ', 150000, 1038300),
(6450765, '2025-11-19', 'Pembelian Beton Instan ', 150000, 1038300),
(6450766, '2025-11-20', 'Pembelian Beton Instan ', 150000, 1038300),
(6450767, '2025-11-21', 'Pembelian Beton Instan ', 150000, 1038300),
(6450768, '2025-11-22', 'Pembelian Beton Instan ', 150000, 1038300),
(6450769, '2025-11-17', 'Transaksi manual', 150000, 1038300);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(6450740, 2364850, 55000, 1),
(6450741, 2364852, 60000, 1),
(6450742, 2364853, 85000, 1),
(6450743, 2364854, 150000, 1),
(6450744, 2364856, 52000, 1),
(6450745, 2364855, 65000, 1),
(6450746, 2364859, 95000, 1),
(6450747, 2364857, 50000, 1),
(6450748, 2364858, 58000, 1),
(6450749, 2364851, 72000, 1),
(6450750, 2364851, 72000, 1),
(6450751, 2364851, 72000, 1),
(6450752, 2364851, 72000, 1),
(6450753, 2364850, 55000, 1),
(6450753, 2364852, 60000, 15),
(6450753, 2364855, 65000, 10),
(6450754, 2364854, 150000, 4),
(6450754, 2364857, 50000, 9),
(6450754, 2364859, 95000, 14),
(6450755, 2364854, 150000, 4),
(6450755, 2364857, 50000, 9),
(6450755, 2364859, 95000, 14),
(6450756, 2364854, 150000, 4),
(6450756, 2364857, 50000, 9),
(6450756, 2364859, 95000, 14),
(6450757, 2364854, 150000, 4),
(6450757, 2364857, 50000, 9),
(6450757, 2364859, 95000, 14),
(6450758, 2364851, 72000, 5),
(6450758, 2364854, 150000, 4),
(6450758, 2364856, 52000, 5),
(6450758, 2364859, 95000, 3),
(6450759, 2364851, 72000, 5),
(6450759, 2364854, 150000, 4),
(6450759, 2364856, 52000, 5),
(6450759, 2364859, 95000, 3),
(6450760, 2364851, 72000, 5),
(6450760, 2364854, 150000, 4),
(6450760, 2364856, 52000, 5),
(6450760, 2364859, 95000, 3),
(6450761, 2364852, 60000, 10),
(6450762, 2364857, 50000, 3),
(6450763, 2364857, 50000, 3),
(6450764, 2364857, 50000, 3),
(6450765, 2364857, 50000, 3),
(6450766, 2364857, 50000, 3),
(6450767, 2364857, 50000, 3),
(6450768, 2364857, 50000, 3),
(6450769, 2364857, 50000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(3050350, 'admin', 'admin123', 'Administrator', 'Jl Merpati 1', '081234500001', 1),
(3050351, 'kasir1', 'passkasir1', 'Dewi Kasir', 'Jl Merpati 2', '081234500002', 2),
(3050352, 'kasir2', 'passkasir2', 'Rudi', 'Jl Merpati 3', '081234500003', 2),
(3050353, 'owner', 'owner321', 'Owner Toko', 'Jl Merpati 4', '081234500004', 3),
(3050354, 'staff1', 'staffpass1', 'Yusuf', 'Jl Merpati 5', '081234500005', 2),
(3050355, 'staff2', 'staffpass2', 'Sinta', 'Jl Merpati 6', '081234500006', 2),
(3050356, 'gudang1', 'gudangpass1', 'Beni', 'Jl Merpati 7', '081234500007', 2),
(3050357, 'gudang2', 'gudangpass2', 'Lala', 'Jl Merpati 8', '081234500008', 2),
(3050358, 'op1', 'op12345', 'Operator Satu', 'Jl Merpati 9', '081234500009', 2),
(3050359, 'op2', 'op54321', 'Operator Dua', 'Jl Merpati 10', '081234500010', 2);

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbarang` (`id_barang`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpelanggan` (`id_pelanggan`);

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
  ADD KEY `transaksi_id` (`transaksi_id`);

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
  ADD KEY `pelanggan_id` (`penlanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2364860;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038310;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43504610;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2290256;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6450770;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3050360;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `idbarang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `idnota` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idpelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `transaksi_id` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `pelanggan_id` FOREIGN KEY (`penlanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `barang_id` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
