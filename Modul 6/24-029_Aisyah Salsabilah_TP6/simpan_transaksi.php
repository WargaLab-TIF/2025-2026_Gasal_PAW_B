<?php
include "koneksi.php";

$tanggal = $_POST['tanggal'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_barang = $_POST['id_barang'];
$qty = $_POST['qty'];
$subtotal = $_POST['subtotal'];

$total = array_sum($subtotal);

$qMaster = "INSERT INTO penjualan (tanggal, id_pelanggan, total) 
             VALUES ('$tanggal', '$id_pelanggan', '$total')";
mysqli_query($conn, $qMaster);

$id_penjualan = mysqli_insert_id($conn);

for ($i = 0; $i < count($id_barang); $i++) {
    $idBrg = $id_barang[$i];
    $jml = $qty[$i];
    $sub = $subtotal[$i];

    mysqli_query($conn, "INSERT INTO penjualan_detail (id_penjualan, id_barang, qty, subtotal)
                         VALUES ('$id_penjualan', '$idBrg', '$jml', '$sub')");
}

echo "<script>
alert('Transaksi berhasil disimpan!');
window.location='form_transaksi.php';
</script>";
?>