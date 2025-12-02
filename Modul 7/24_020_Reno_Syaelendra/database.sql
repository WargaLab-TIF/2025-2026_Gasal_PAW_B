CREATE TABLE `laporan_harian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `total_pendapatan` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tanggal` (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `laporan_harian` (`tanggal`, `total_pendapatan`) VALUES
('2023-09-01', 39000),
('2023-09-02', 52000),
('2023-09-03', 13000),
('2023-09-04', 13000),
('2023-09-05', 26000),
('2023-09-06', 13000),
('2023-09-09', 13000);

