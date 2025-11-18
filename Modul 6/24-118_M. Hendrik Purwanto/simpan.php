<?php
include 'koneksi.php';

$tgl_nota = $_POST['tgl_nota'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$subtotal = $_POST['subtotal'];

$total = array_sum($subtotal);

$query_master = "INSERT INTO transaksi_master (tgl_nota, nama_pelanggan, total)
                 VALUES ('$tgl_nota', '$nama_pelanggan', '$total')";
mysqli_query($koneksi, $query_master);

$id_nota = mysqli_insert_id($koneksi);

for ($i = 0; $i < count($nama_barang); $i++) {
    $barang = $nama_barang[$i];
    $h = $harga[$i];
    $q = $qty[$i];
    $sub = $subtotal[$i];

    $query_detail = "INSERT INTO transaksi_detail (id_nota, nama_barang, harga, qty, subtotal)
                     VALUES ('$id_nota', '$barang', '$h', '$q', '$sub')";
    mysqli_query($koneksi, $query_detail);
}

echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>
        <h2>Transaksi Berhasil Disimpan!</h2>
        <p>ID Nota: <strong>$id_nota</strong></p>
        <a href='index.php' style='color:white; background:#3b82f6; padding:8px 16px; border-radius:6px; text-decoration:none;'>Kembali</a>
      </div>";
?>
