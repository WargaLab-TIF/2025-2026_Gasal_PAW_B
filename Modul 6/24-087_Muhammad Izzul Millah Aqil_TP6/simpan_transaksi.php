<?php
require_once "fungsi_transaksi.php";
require_once "tampilkan_transaksi.php";

if (empty($_POST['pelanggan_id'])) {
    die("Error: ID pelanggan tidak boleh kosong!");
}

$id_transaksi = simpanTransaksi(
    $_POST['tanggal'],
    $_POST['pelanggan_id'],
    $_POST['kode_barang'],
    $_POST['harga'],
    $_POST['qty'],
    $_POST['keterangan']
);

echo "<h2>Data Nota Transaksi Berhasil Disimpan!</h2>";
tampilTransaksi();
