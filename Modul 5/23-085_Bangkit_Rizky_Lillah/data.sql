-- Pelanggan
INSERT INTO pelanggan (nama, jenis_kelamin, telp, alamat) VALUES
('Andi Saputra', 'L', '08123456781', 'Surabaya'),
('Budi Santoso', 'L', '08123456782', 'Malang'),
('Citra Dewi', 'P', '08123456783', 'Sidoarjo'),
('Dewi Lestari', 'P', '08123456784', 'Gresik'),
('Eka Prasetyo', 'L', '08123456785', 'Mojokerto'),
('Fajar Nugroho', 'L', '08123456786', 'Lamongan'),
('Gita Ayu', 'P', '08123456787', 'Kediri'),
('Hendra Wijaya', 'L', '08123456788', 'Blitar'),
('Indah Sari', 'P', '08123456789', 'Pasuruan'),
('Joko Purnomo', 'L', '08123456780', 'Probolinggo');

-- Supplier
INSERT INTO supplier (nama, telp, alamat) VALUES
('PT Sinar Maju', '031555111', 'Surabaya'),
('CV Berkah Jaya', '031555222', 'Gresik'),
('UD Maju Bersama', '031555333', 'Sidoarjo'),
('PT Cahaya Elektronik', '031555444', 'Malang'),
('CV Sentosa Abadi', '031555555', 'Pasuruan'),
('PT Digital Nusantara', '031555666', 'Kediri'),
('PT Roda Mas', '031555777', 'Lamongan'),
('CV Amanah Jaya', '031555888', 'Tuban'),
('PT Makmur Abadi', '031555999', 'Probolinggo'),
('CV Sumber Rejeki', '031555000', 'Mojokerto');


-- Barang
INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) VALUES
('BR001', 'Mouse Logitech', 120000, 50, 1),
('BR002', 'Keyboard Rexus', 150000, 40, 1),
('BR003', 'Flashdisk 32GB', 60000, 70, 2),
('BR004', 'Headset JBL', 200000, 35, 3),
('BR005', 'Monitor Samsung 24"', 1500000, 20, 4),
('BR006', 'Webcam Logitech', 350000, 15, 5),
('BR007', 'Harddisk 1TB', 850000, 25, 6),
('BR008', 'SSD 512GB', 900000, 30, 7),
('BR009', 'Kabel HDMI 2m', 75000, 60, 8),
('BR010', 'Mousepad Rexus', 50000, 80, 9);

-- User
INSERT INTO user (username, password, nama, alamat, hp, level) VALUES
('admin', 'admin123', 'Administrator', 'Kantor Pusat', '0811111111', 1),
('kasir1', 'kasir123', 'Kasir Pertama', 'Surabaya', '0822222222', 2),
('kasir2', 'kasir234', 'Kasir Kedua', 'Malang', '0833333333', 2),
('owner', 'owner123', 'Pemilik Toko', 'Gresik', '0844444444', 3),
('gudang1', 'gudang123', 'Petugas Gudang', 'Sidoarjo', '0855555555', 4),
('gudang2', 'gudang234', 'Petugas Gudang 2', 'Pasuruan', '0866666666', 4),
('marketing', 'mkt123', 'Tim Marketing', 'Kediri', '0877777777', 5),
('teknisi', 'tek123', 'Tim Teknisi', 'Mojokerto', '0888888888', 6),
('admin2', 'adm234', 'Admin Kedua', 'Lamongan', '0899999999', 1),
('kasir3', 'kasir345', 'Kasir Ketiga', 'Probolinggo', '0810000000', 2);

-- Transaksi
INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES
(NOW(), 'Pembelian Mouse dan Keyboard', 270000, 1),
(NOW(), 'Pembelian Flashdisk', 60000, 2),
(NOW(), 'Pembelian Headset', 200000, 3),
(NOW(), 'Pembelian Monitor', 1500000, 4),
(NOW(), 'Pembelian Webcam', 350000, 5),
(NOW(), 'Pembelian Harddisk', 850000, 6),
(NOW(), 'Pembelian SSD', 900000, 7),
(NOW(), 'Pembelian Kabel HDMI', 75000, 8),
(NOW(), 'Pembelian Mousepad', 50000, 9),
(NOW(), 'Pembelian Keyboard Rexus', 150000, 10);

-- Transaksi detail
INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES
(1, 1, 1, 120000),
(1, 2, 1, 150000),
(2, 3, 1, 60000),
(3, 4, 1, 200000),
(4, 5, 1, 1500000),
(5, 6, 1, 350000),
(6, 7, 1, 850000),
(7, 8, 1, 900000),
(8, 9, 1, 75000),
(9, 10, 1, 50000);


-- Pembayaran
INSERT INTO pembayaran (waktu_bayar, total, metode, transaksi_id) VALUES
(NOW(), 270000, 'TUNAI', 1),
(NOW(), 60000, 'TRANSFER', 2),
(NOW(), 200000, 'TUNAI', 3),
(NOW(), 1500000, 'EDC', 4),
(NOW(), 350000, 'TRANSFER', 5),
(NOW(), 850000, 'TUNAI', 6),
(NOW(), 900000, 'TUNAI', 7),
(NOW(), 75000, 'TRANSFER', 8),
(NOW(), 50000, 'TUNAI', 9),
(NOW(), 150000, 'EDC', 10);
