--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Laptop Pro 15 inch', 15000000, 41, 1),
(2, 'BRG002', 'Mouse Wireless Silent', 150000, 192, 2),
(3, 'BRG003', 'Keyboard Mechanical RGB', 750000, 96, 2),
(4, 'BRG004', 'Buku Tulis Sinar Dunia 50lbr', 5000, 998, 3),
(5, 'BRG005', 'Kursi Kantor Ergonomis', 1200000, 24, 4),
(6, 'BRG006', 'Kopi Sachet ABC Susu 1 renceng', 15000, 494, 5),
(7, 'BRG007', 'Novel \"Laskar Pelangi\"', 80000, 141, 7),
(8, 'BRG008', 'Kaos Polos Hitam M', 65000, 297, 8),
(9, 'BRG009', 'Bola Basket Spalding', 350000, 38, 9),
(10, 'BRG010', 'Paracetamol 500mg 1 strip', 3000, 989, 10);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `no_nota`, `tanggal`, `total`) VALUES
(1, 'NT-20251110114621', '2025-11-10', 3490.00),
(2, 'NT-20251111110554', '2025-11-11', 0.00),
(3, 'NT-20251111110838', '2025-11-11', 0.00),
(4, 'NT-20251111110838', '2025-11-11', 0.00),
(5, 'NT-20251111110838', '2025-11-11', 0.00),
(6, 'NT-20251111112159', '2025-11-11', 15005000.00),
(7, 'NT-20251111112548', '2025-11-11', 3000.00),
(8, 'NT-20251111113124', '2025-11-11', 350000.00),
(9, 'NT-20251111114646', '2025-11-11', 15000.00),
(10, 'NT-20251111115502', '2025-11-11', 117780000.00);

-- --------------------------------------------------------

--
-- Table structure for table `nota_detail`
--

CREATE TABLE `nota_detail` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(14,2) NOT NULL,
  `subtotal` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_detail`
--

INSERT INTO `nota_detail` (`id`, `nota_id`, `barang`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 'Tustas', 1, 3000.00, 3000.00),
(2, 1, 'sdfghjk', 1, 490.00, 490.00),
(3, 2, 'Novel \"Laskar Pelangi\"', 1, 0.00, 0.00),
(4, 3, 'Laptop Pro 15 inch', 1, 0.00, 0.00),
(5, 4, 'Laptop Pro 15 inch', 1, 0.00, 0.00),
(6, 5, 'Laptop Pro 15 inch', 1, 0.00, 0.00),
(7, 6, 'Buku Tulis Sinar Dunia 50lbr', 1, 5000.00, 5000.00),
(8, 6, 'Laptop Pro 15 inch', 1, 15000000.00, 15000000.00),
(9, 7, 'Paracetamol 500mg 1 strip', 1, 3000.00, 3000.00),
(10, 8, 'Bola Basket Spalding', 1, 350000.00, 350000.00),
(11, 9, 'Kopi Sachet ABC Susu 1 renceng', 1, 15000.00, 15000.00),
(12, 10, 'Bola Basket Spalding', 1, 350000.00, 350000.00),
(13, 10, 'Buku Tulis Sinar Dunia 50lbr', 2, 5000.00, 10000.00),
(14, 10, 'Kaos Polos Hitam M', 3, 65000.00, 195000.00),
(15, 10, 'Keyboard Mechanical RGB', 4, 750000.00, 3000000.00),
(16, 10, 'Kopi Sachet ABC Susu 1 renceng', 5, 15000.00, 75000.00),
(17, 10, 'Kursi Kantor Ergonomis', 6, 1200000.00, 7200000.00),
(18, 10, 'Laptop Pro 15 inch', 7, 15000000.00, 105000000.00),
(19, 10, 'Mouse Wireless Silent', 8, 150000.00, 1200000.00),
(20, 10, 'Novel \"Laskar Pelangi\"', 9, 80000.00, 720000.00),
(21, 10, 'Paracetamol 500mg 1 strip', 10, 3000.00, 30000.00);

-- --------------------------------------------------------