<?php
include 'config.php';

$no_nota     = $_POST['no_nota'] ?? '';
$tanggal     = $_POST['tgl_transaksi'] ?? '';
$customer    = $_POST['customer'] ?? '';
$nama_barang = $_POST['nama_barang'] ?? [];
$qty         = $_POST['qty'] ?? [];
$harga       = $_POST['harga'] ?? [];

mysqli_query($koneksi, "INSERT INTO transaksi (no_nota, tgl_transaksi, customer)
VALUES ('$no_nota', '$tanggal', '$customer')");

$id_transaksi = mysqli_insert_id($koneksi);

foreach ($nama_barang as $i => $barang) {
    $jumlah = $qty[$i] ?? 0;
    $hargabrg = $harga[$i] ?? 0;

    if (!empty($barang) && $jumlah > 0 && $hargabrg > 0) {
        mysqli_query($koneksi, "INSERT INTO transaksi_detail (id_transaksi, nama_barang, qty, harga)
        VALUES ('$id_transaksi', '$barang', '$jumlah', '$hargabrg')");
    }
}

echo "<script>alert('Transaksi Berhasil Disimpan!');window.location='form_transaksi.php';</script>";
?>
