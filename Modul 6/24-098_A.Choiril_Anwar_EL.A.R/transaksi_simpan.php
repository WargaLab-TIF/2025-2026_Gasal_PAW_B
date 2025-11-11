<?php
include 'koneksi.php';

$no_nota = $_POST['no_nota'];
$pelanggan_id = $_POST['pelanggan_id'];
$tanggal = $_POST['tanggal'];
$barang_id = $_POST['barang_id'];
$qty = $_POST['qty'];

$query_transaksi = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                    VALUES ('$tanggal 00:00:00', 'Transaksi No: $no_nota', 0, '$pelanggan_id')";
mysqli_query($conn, $query_transaksi);

$id_transaksi = mysqli_insert_id($conn);

$total = 0;
for ($i = 0; $i < count($barang_id); $i++) {
    if ($barang_id[$i] == "" || $qty[$i] == "") continue;

    $q = mysqli_query($conn, "SELECT harga FROM barang WHERE id = ".$barang_id[$i]);
    $row = mysqli_fetch_assoc($q);

    $harga = $row['harga'];
    $sub = $harga * $qty[$i];
    $total += $sub;

    $q_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                 VALUES ('$id_transaksi', '".$barang_id[$i]."', '$harga', '".$qty[$i]."')";
    mysqli_query($conn, $q_detail);
}

mysqli_query($conn, "UPDATE transaksi SET total = '$total' WHERE id = '$id_transaksi'");

echo "Transaksi berhasil di simpan!";
exit();
?>