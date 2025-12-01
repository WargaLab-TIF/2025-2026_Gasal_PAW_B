<?php
include 'koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
?>
<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Barang</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>
    <?php
    $q = mysqli_query($conn, "SELECT n.waktu_transaksi, b.nama_barang, i.qty, i.subtotal FROM item_nota i JOIN nota n ON i.id_nota=n.id_nota JOIN barang b ON i.id_barang=b.id");
    while ($d = mysqli_fetch_array($q)) {
        echo "<tr><td>{$d['waktu_transaksi']}</td><td>{$d['nama_barang']}</td><td>{$d['qty']}</td><td>{$d['subtotal']}</td></tr>";
    }
    ?>
</table>