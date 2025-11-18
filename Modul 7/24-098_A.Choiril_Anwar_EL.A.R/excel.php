<?php
include "koneksi.php";

$awal   = $_GET['awal'] ?? null;
$akhir = $_GET['akhir'] ?? null;

if ($awal && $akhir) {
    $where = "WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'";
} else {
    $where = "";
}
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Reporting.xls");
$query = mysqli_query($conn, " SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
    FROM transaksi $where GROUP BY DATE(waktu_transaksi) ORDER BY tanggal ASC");
?>
<h3>Laporan Penjualan</h3>
<table border="1">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total Penjualan</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['total_harian'] ?></td>
    </tr>
    <?php } ?>
</table>
