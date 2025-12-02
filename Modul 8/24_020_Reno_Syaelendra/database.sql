CREATE DATABASE IF NOT EXISTS db_praktikum;
USE db_praktikum;

-- 1. Tabel User
CREATE TABLE IF NOT EXISTS user (
    id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    nama VARCHAR(100),
    level INT(1) -- 1: Admin, 2: User
);

INSERT INTO user (username, password, nama, level) VALUES
('budi', MD5('12345'), 'Budi (Admin)', 1),
('wati', MD5('12345'), 'Wati (User)', 2);

-- 2. Tabel Barang
CREATE TABLE IF NOT EXISTS barang (
    id_barang INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100),
    harga INT(11),
    stok INT(11)
);

INSERT INTO barang (nama_barang, harga, stok) VALUES 
('Laptop Asus ROG', 15000000, 5),
('Mouse Wireless', 150000, 50),
('Keyboard Mekanik', 450000, 20);

-- 3. Tabel Supplier
CREATE TABLE IF NOT EXISTS supplier (
    id_supplier INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_supplier VARCHAR(100),
    alamat TEXT,
    telepon VARCHAR(20)
);

INSERT INTO supplier (nama_supplier, alamat, telepon) VALUES 
('PT. Asus Indonesia', 'Jakarta Pusat', '021-555666'),
('Logitech Official', 'Jakarta Selatan', '021-999888');

-- 4. Tabel Pelanggan
CREATE TABLE IF NOT EXISTS pelanggan (
    id_pelanggan INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100),
    alamat TEXT,
    hp VARCHAR(20)
);

INSERT INTO pelanggan (nama_pelanggan, alamat, hp) VALUES 
('Andi', 'Jl. Mawar No 1', '08123456789'),
('Siti', 'Jl. Melati No 2', '08987654321');

-- 5. Tabel Penjualan
CREATE TABLE IF NOT EXISTS penjualan (
    id_transaksi INT(11) AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE,
    nama_pelanggan VARCHAR(100),
    nama_barang VARCHAR(100),
    jumlah INT(11),
    total_harga INT(11)
);

INSERT INTO penjualan (tanggal, nama_pelanggan, nama_barang, jumlah, total_harga) VALUES 
('2023-11-20', 'Andi', 'Mouse Wireless', 2, 300000),
('2023-11-21', 'Siti', 'Laptop Asus ROG', 1, 15000000),
('2023-11-22', 'Andi', 'Keyboard Mekanik', 1, 450000);