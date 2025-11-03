<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.1
 */

/**
 * Database `penjualan`
 */

/* `penjualan`.`barang` */
$barang = array(
  array('id' => '1','kode_barang' => 'GM-001','nama_barang' => 'Novel "Laskar Pelangi"','harga' => '98000','stok' => '50','supplier_id' => '1'),
  array('id' => '2','kode_barang' => 'GM-002','nama_barang' => 'Novel "Bumi Manusia"','harga' => '135000','stok' => '40','supplier_id' => '1'),
  array('id' => '3','kode_barang' => 'EL-001','nama_barang' => 'Buku Mandiri Fisika SMA','harga' => '120000','stok' => '30','supplier_id' => '2'),
  array('id' => '4','kode_barang' => 'EMK-01','nama_barang' => 'Komik "One Piece" Vol. 100','harga' => '45000','stok' => '100','supplier_id' => '4'),
  array('id' => '5','kode_barang' => 'MZ-001','nama_barang' => 'Buku "Filosofi Teras"','harga' => '105000','stok' => '60','supplier_id' => '3'),
  array('id' => '6','kode_barang' => 'AG-001','nama_barang' => 'Buku "Berkebun di Rumah"','harga' => '88000','stok' => '25','supplier_id' => '5'),
  array('id' => '7','kode_barang' => 'AND-01','nama_barang' => 'Buku "Belajar Python"','harga' => '150000','stok' => '20','supplier_id' => '6'),
  array('id' => '8','kode_barang' => 'FC-001','nama_barang' => 'Pensil Warna 24 Set','harga' => '110000','stok' => '80','supplier_id' => '10'),
  array('id' => '9','kode_barang' => 'FC-002','nama_barang' => 'Pulpen Tri-Click (Hitam)','harga' => '5000','stok' => '200','supplier_id' => '10'),
  array('id' => '10','kode_barang' => 'TS-001','nama_barang' => 'Buku Tulis 38 Lbr (Pack 10)','harga' => '40000','stok' => '150','supplier_id' => '7')
);

/* `penjualan`.`pelanggan` */
$pelanggan = array(
  array('id' => 'PL001','nama' => 'Budi Santoso','jenis_kelamin' => 'L','telp' => '08123456789','alamat' => 'Jl. Mawar No. 10, Surabaya'),
  array('id' => 'PL002','nama' => 'Ani Wijaya','jenis_kelamin' => 'P','telp' => '08134567890','alamat' => 'Jl. Melati No. 2, Jakarta'),
  array('id' => 'PL003','nama' => 'Citra Lestari','jenis_kelamin' => 'P','telp' => '08156789012','alamat' => 'Jl. Kenanga No. 5, Bandung'),
  array('id' => 'PL004','nama' => 'Doni Hermawan','jenis_kelamin' => 'L','telp' => '08178901234','alamat' => 'Jl. Flamboyan No. 1, Yogyakarta'),
  array('id' => 'PL005','nama' => 'Eka Saputra','jenis_kelamin' => 'L','telp' => '08190123456','alamat' => 'Jl. Cendana No. 8, Solo'),
  array('id' => 'PL006','nama' => 'Fani Ramadhani','jenis_kelamin' => 'P','telp' => '08122233344','alamat' => 'Jl. Diponegoro No. 7, Semarang'),
  array('id' => 'PL007','nama' => 'Gilang Pratama','jenis_kelamin' => 'L','telp' => '08133344455','alamat' => 'Jl. Sudirman No. 12, Medan'),
  array('id' => 'PL008','nama' => 'Hana Pertiwi','jenis_kelamin' => 'P','telp' => '08155566677','alamat' => 'Jl. Pattimura No. 3, Denpasar'),
  array('id' => 'PL009','nama' => 'Indra Gunawan','jenis_kelamin' => 'L','telp' => '08177788899','alamat' => 'Jl. Thamrin No. 9, Jakarta'),
  array('id' => 'PL010','nama' => 'Joko Susilo','jenis_kelamin' => 'L','telp' => '08199900011','alamat' => 'Jl. Basuki Rahmat No. 22, Surabaya')
);

/* `penjualan`.`pembayaran` */
$pembayaran = array(
  array('id' => '11','waktu_bayar' => '2025-10-25 11:01:00','total' => '233000','metode' => 'EDC','transaksi_id' => '41'),
  array('id' => '12','waktu_bayar' => '2025-10-25 14:16:00','total' => '120000','metode' => 'EDC','transaksi_id' => '42'),
  array('id' => '13','waktu_bayar' => '2025-10-26 10:31:00','total' => '90000','metode' => 'TUNAI','transaksi_id' => '43'),
  array('id' => '14','waktu_bayar' => '2025-10-26 16:02:00','total' => '150000','metode' => 'TRANSFER','transaksi_id' => '44'),
  array('id' => '15','waktu_bayar' => '2025-10-27 13:01:00','total' => '105000','metode' => 'TUNAI','transaksi_id' => '45'),
  array('id' => '16','waktu_bayar' => '2025-10-27 17:02:00','total' => '186000','metode' => 'EDC','transaksi_id' => '46'),
  array('id' => '17','waktu_bayar' => '2025-10-28 12:01:00','total' => '300000','metode' => 'TRANSFER','transaksi_id' => '47'),
  array('id' => '18','waktu_bayar' => '2025-10-28 19:01:00','total' => '40000','metode' => 'TUNAI','transaksi_id' => '48'),
  array('id' => '19','waktu_bayar' => '2025-10-29 15:02:00','total' => '110000','metode' => 'EDC','transaksi_id' => '49'),
  array('id' => '20','waktu_bayar' => '2025-10-29 18:31:00','total' => '20000','metode' => 'TUNAI','transaksi_id' => '50')
);

/* `penjualan`.`supplier` */
$supplier = array(
  array('id' => '1','nama' => 'Penerbit Gramedia','telp' => '021-53650110','alamat' => 'Jl. Palmerah Barat, Jakarta'),
  array('id' => '2','nama' => 'Penerbit Erlangga','telp' => '021-8718006','alamat' => 'Jl. H. Baping Raya, Ciracas'),
  array('id' => '3','nama' => 'Mizan Pustaka','telp' => '022-7802288','alamat' => 'Jl. Cinambo No. 135, Bandung'),
  array('id' => '4','nama' => 'Penerbit Elex Media','telp' => '021-53677834','alamat' => 'Gedung Kompas Gramedia, Jakarta'),
  array('id' => '5','nama' => 'AgroMedia Pustaka','telp' => '021-78881000','alamat' => 'Jl. H. Montong, Jagakarsa'),
  array('id' => '6','nama' => 'Distributor Buku Andi','telp' => '0274-561881','alamat' => 'Jl. Beo No. 38, Yogyakarta'),
  array('id' => '7','nama' => 'Penerbit Tiga Serangkai','telp' => '0271-714344','alamat' => 'Jl. Dr. Supomo No. 23, Solo'),
  array('id' => '8','nama' => 'Bentang Pustaka','telp' => '0274-6411366','alamat' => 'Jl. Plemburan No. 1, Yogyakarta'),
  array('id' => '9','nama' => 'Penerbit Kawan Pustaka','telp' => '021-78888880','alamat' => 'Jl. M. Kahfi II, Jagakarsa'),
  array('id' => '10','nama' => 'Stationery Faber-Castell','telp' => '021-29289800','alamat' => 'Menara Standard Chartered, Jakarta')
);

/* `penjualan`.`transaksi` */
$transaksi = array(
  array('id' => '41','waktu_transaksi' => '2025-10-25 11:00:00','keterangan' => 'Beli Novel','total' => '233000','pelanggan_id' => 'PL001'),
  array('id' => '42','waktu_transaksi' => '2025-10-25 14:15:00','keterangan' => 'Beli Buku Sekolah','total' => '120000','pelanggan_id' => 'PL003'),
  array('id' => '43','waktu_transaksi' => '2025-10-26 10:30:00','keterangan' => 'Beli Komik','total' => '90000','pelanggan_id' => 'PL002'),
  array('id' => '44','waktu_transaksi' => '2025-10-26 16:00:00','keterangan' => 'Beli Alat Tulis','total' => '150000','pelanggan_id' => 'PL005'),
  array('id' => '45','waktu_transaksi' => '2025-10-27 13:00:00','keterangan' => 'Beli Buku Filsafat','total' => '105000','pelanggan_id' => 'PL009'),
  array('id' => '46','waktu_transaksi' => '2025-10-27 17:00:00','keterangan' => 'Beli Buku Kebun & Novel','total' => '186000','pelanggan_id' => 'PL004'),
  array('id' => '47','waktu_transaksi' => '2025-10-28 12:00:00','keterangan' => 'Beli Buku Komputer','total' => '300000','pelanggan_id' => 'PL007'),
  array('id' => '48','waktu_transaksi' => '2025-10-28 19:00:00','keterangan' => 'Beli Buku Tulis 1 Pack','total' => '40000','pelanggan_id' => 'PL006'),
  array('id' => '49','waktu_transaksi' => '2025-10-29 15:00:00','keterangan' => 'Beli Pensil Warna','total' => '110000','pelanggan_id' => 'PL008'),
  array('id' => '50','waktu_transaksi' => '2025-10-29 18:30:00','keterangan' => 'Beli Pulpen 4 pcs','total' => '20000','pelanggan_id' => 'PL010')
);

/* `penjualan`.`transaksi_detail` */
$transaksi_detail = array(
  array('transaksi_id' => '41','barang_id' => '2','harga' => '135000','qty' => '1'),
  array('transaksi_id' => '42','barang_id' => '3','harga' => '120000','qty' => '1'),
  array('transaksi_id' => '43','barang_id' => '4','harga' => '45000','qty' => '2'),
  array('transaksi_id' => '44','barang_id' => '8','harga' => '110000','qty' => '1'),
  array('transaksi_id' => '45','barang_id' => '5','harga' => '105000','qty' => '1'),
  array('transaksi_id' => '46','barang_id' => '6','harga' => '88000','qty' => '1'),
  array('transaksi_id' => '47','barang_id' => '7','harga' => '150000','qty' => '2'),
  array('transaksi_id' => '48','barang_id' => '10','harga' => '40000','qty' => '1'),
  array('transaksi_id' => '49','barang_id' => '8','harga' => '110000','qty' => '1'),
  array('transaksi_id' => '50','barang_id' => '9','harga' => '5000','qty' => '4')
);

/* `penjualan`.`user` */
$user = array(
  array('id_user' => '1','username' => 'admin','password' => 'admin123','nama' => 'Administrator','alamat' => 'Kantor Pusat','hp' => '0811111111','level' => '1'),
  array('id_user' => '2','username' => 'kasir1','password' => 'kasirno1','nama' => 'Yoga (Kasir)','alamat' => 'Meja Kasir 1','hp' => '0812222222','level' => '2'),
  array('id_user' => '3','username' => 'kasir2','password' => 'kasirno2','nama' => 'Jossa (Kasir)','alamat' => 'Meja Kasir 2','hp' => '0813333333','level' => '2'),
  array('id_user' => '4','username' => 'gudang','password' => 'stokgudang','nama' => 'Alim (Stok Buku)','alamat' => 'Area Gudang','hp' => '0814444444','level' => '3'),
  array('id_user' => '5','username' => 'manager','password' => 'managertoko','nama' => 'Pak Manajer','alamat' => 'Ruang Manajer','hp' => '0815555555','level' => '1'),
  array('id_user' => '6','username' => 'sales1','password' => 'salerno1','nama' => 'Vega (Pramuniaga)','alamat' => 'Area Toko','hp' => '0816666666','level' => '2'),
  array('id_user' => '7','username' => 'finance','password' => 'finace123','nama' => 'Riffo (Finance)','alamat' => 'Ruang Keuangan','hp' => '0817777777','level' => '3'),
  array('id_user' => '8','username' => 'owner','password' => 'ownertoko','nama' => 'Pak Bos','alamat' => 'Ruang Owner','hp' => '0818888888','level' => '1'),
  array('id_user' => '9','username' => 'tech','password' => 'tech123','nama' => 'Teknisi IT','alamat' => 'Ruang Server','hp' => '0819999999','level' => '3'),
  array('id_user' => '10','username' => 'cs','password' => 'customservice','nama' => 'Customer Service','alamat' => 'Lobi','hp' => '0810000000','level' => '2')
);
