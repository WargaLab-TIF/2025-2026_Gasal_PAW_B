<?php
ob_start(); // CEGAH OUTPUT SEBELUM HEADER

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

require 'koneksi.php';

$tgl1 = $_GET['tgl1'] ?? '';
$tgl2 = $_GET['tgl2'] ?? '';

$query = "SELECT tanggal, SUM(jumlah) AS total_pendapatan, COUNT(*) AS total_transaksi 
          FROM penjualan 
          WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
          GROUP BY tanggal ORDER BY tanggal ASC";

$hasil = mysqli_query($conn, $query);

$data = [];
$total_semua = 0;
$total_pelanggan = 0;

while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
    $total_semua += $row['total_pendapatan'];
    $total_pelanggan += $row['total_transaksi'];
}
?>

<h3>Rekap Laporan Penjualan <?= $tgl1 ?> s/d <?= $tgl2 ?></h3>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total Pendapatan</th>
        <th>Total Pelanggan</th>
    </tr>

    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['tanggal'] ?></td>
        <td><?= $d['total_pendapatan'] ?></td>
        <td><?= $d['total_transaksi'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>

<table border="1" cellpadding="5">
    <tr>
        <td>Jumlah Pelanggan</td>
        <td><?= $total_pelanggan ?> Orang</td>
    </tr>
    <tr>
        <td>Jumlah Pendapatan</td>
        <td>Rp <?= number_format($total_semua) ?></td>
    </tr>
</table>
