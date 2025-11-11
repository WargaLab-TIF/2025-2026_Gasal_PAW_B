<?php
include 'koneksi.php';

$pelanggan_id = $_POST['pelanggan_id'];
$keterangan = $_POST['keterangan'];
$tanggal = date('Y-m-d');

$barang_id = $_POST['barang_id'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];

$total = 0;
for ($i = 0; $i < count($barang_id); $i++) {
    $total += $harga[$i] * $qty[$i];
}

$queryMaster = "INSERT INTO penjualan_transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                VALUES ('$tanggal', '$keterangan', '$total', '$pelanggan_id')";
mysqli_query($conn, $queryMaster);
$id_transaksi = mysqli_insert_id($conn);

for ($i = 0; $i < count($barang_id); $i++) {
    $b_id = $barang_id[$i];
    $h = $harga[$i];
    $q = $qty[$i];

    mysqli_query($conn, "INSERT INTO penjualan_transaksi_detail (barang_id, harga, qty, transaksi_id)
                         VALUES ('$b_id', '$h', '$q', '$id_transaksi')");

    mysqli_query($conn, "UPDATE penjualan_barang SET stok = stok - $q WHERE id = $b_id");
}

echo "<script>alert('Transaksi berhasil disimpan dan stok diperbarui!'); window.location='index.php';</script>";
?>
