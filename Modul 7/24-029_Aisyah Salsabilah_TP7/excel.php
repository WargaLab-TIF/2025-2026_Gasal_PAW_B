<?php
include 'koneksi.php';

$awal  = $_GET['tgl_awal'];
$akhir = $_GET['tgl_akhir'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap_penjualan.xls");
?>

<h3>Rekap Laporan Penjualan <?= $awal ?> s/d <?= $akhir ?></h3>
<hr>

<table border="1">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

<?php
$no = 1;
$q = mysqli_query($conn,
    "SELECT * FROM transaksi 
    WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'
    ORDER BY DATE(waktu_transaksi) ASC"
);

$jumlahPelanggan = 0;
$totalPendapatan = 0;

while ($r = mysqli_fetch_assoc($q)) {
    $jumlahPelanggan++;
    $totalPendapatan += $r['total'];
?>
<tr>
    <td><?= $no++ ?></td>
    <td>Rp <?= number_format($r['total']) ?></td>
    <td><?= $r['waktu_transaksi'] ?></td>
</tr>
<?php } ?>

</table>

<br><br>

<b>Jumlah Pelanggan:</b> <?= $jumlahPelanggan ?> Orang<br>
<b>Jumlah Pendapatan:</b> Rp <?= number_format($totalPendapatan) ?>