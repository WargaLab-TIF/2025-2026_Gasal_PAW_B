CREATE DATABASE toko_online;
USE toko_online;

-- Tabel pelanggan
CREATE TABLE pelanggan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  jenis_kelamin ENUM('L','P') NOT NULL,
  telp VARCHAR(15),
  alamat TEXT
);

-- Tabel supplier
CREATE TABLE supplier (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  telp VARCHAR(15),
  alamat TEXT
);

-- Tabel barang
CREATE TABLE barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode_barang VARCHAR(20) NOT NULL,
  nama_barang VARCHAR(100) NOT NULL,
  harga INT NOT NULL,
  stok INT NOT NULL,
  supplier_id INT,
  FOREIGN KEY (supplier_id) REFERENCES supplier(id)
);

-- Tabel user
CREATE TABLE user (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(100) NOT NULL,
  nama VARCHAR(50),
  alamat TEXT,
  hp VARCHAR(15),
  level TINYINT NOT NULL
);

-- Tabel transaksi
CREATE TABLE transaksi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  waktu_transaksi DATETIME NOT NULL,
  keterangan TEXT,
  total INT,
  pelanggan_id INT,
  FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id)
);

-- Tabel transaksi_detail
CREATE TABLE transaksi_detail (
  transaksi_id INT,
  barang_id INT,
  qty INT NOT NULL,
  harga INT NOT NULL,
  PRIMARY KEY (transaksi_id, barang_id),
  FOREIGN KEY (transaksi_id) REFERENCES transaksi(id),
  FOREIGN KEY (barang_id) REFERENCES barang(id)
);

-- Tabel pembayaran
CREATE TABLE pembayaran (
  id INT AUTO_INCREMENT PRIMARY KEY,
  waktu_bayar DATETIME NOT NULL,
  total INT NOT NULL,
  metode ENUM('TUNAI','TRANSFER','EDC') NOT NULL,
  transaksi_id INT,
  FOREIGN KEY (transaksi_id) REFERENCES transaksi(id)
);
