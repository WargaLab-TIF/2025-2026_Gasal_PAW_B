CREATE DATABASE IF NOT EXISTS db_transaksi_penjualan;
USE db_transaksi_penjualan;

-- 1. Tabel untuk menyimpan SEMUA produk Anda
CREATE TABLE master_barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(10) UNIQUE NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    stok INT NOT NULL,
    supplier_id INT
);

-- 2. Memasukkan data katalog Anda
INSERT INTO `master_barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Buku Tulis Sinar', 5000, 100, 1),
(2, 'BRG002', 'Pensil 2B Faber', 3000, 150, 1),
(3, 'BRG003', 'Penghapus Joyko', 1500, 200, 2),
(4, 'BRG004', 'Penggaris 30cm', 2500, 80, 2),
(5, 'BRG005', 'Indomie Goreng', 3000, 500, 4);

-- 3. Tabel untuk data master (Nota)
CREATE TABLE transaksi_master (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_nota VARCHAR(20) UNIQUE NOT NULL,
    tanggal DATE NOT NULL,
    nama_pelanggan VARCHAR(100) NOT NULL,
    total_keseluruhan DECIMAL(10, 2) NOT NULL
);

-- 4. Tabel untuk data detail (Barang per Nota)
CREATE TABLE transaksi_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Link ke tabel master nota
    master_id INT NOT NULL, 
    
    -- Link ke tabel master barang
    barang_id INT NOT NULL,
    
    jumlah INT NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,

    FOREIGN KEY (master_id) REFERENCES transaksi_master(id)
        ON DELETE CASCADE,
        
    FOREIGN KEY (barang_id) REFERENCES master_barang(id)
        ON DELETE RESTRICT
);