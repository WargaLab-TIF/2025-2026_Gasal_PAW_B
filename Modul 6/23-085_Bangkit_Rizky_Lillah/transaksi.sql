CREATE DATABASE transaksi;

CREATE TABLE nota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor VARCHAR(50),
    nama_pembeli VARCHAR(100),
    tanggal DATE,
    total DOUBLE
);

CREATE TABLE nota_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nota_id INT,
    nama_barang VARCHAR(100),
    qty INT,
    harga DOUBLE,
    subtotal DOUBLE,
    FOREIGN KEY (nota_id) REFERENCES nota(id)
);
