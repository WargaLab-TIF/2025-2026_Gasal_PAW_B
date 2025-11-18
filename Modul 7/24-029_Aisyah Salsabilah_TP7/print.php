<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Print Laporan</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body { font-family: Arial; padding: 20px; }
</style>
</head>

<body>

<?php
$awal  = $_GET['tgl_awal'];
$akhir = $_GET['tgl_akhir'];

$q = mysqli_query($conn,
    "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total
     FROM transaksi
     WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'
     GROUP BY DATE(waktu_transaksi) ORDER BY DATE(waktu_transaksi) ASC"
);

while ($r = mysqli_fetch_assoc($q)) {
    $label[] = $r['tanggal'];
    $data[]  = $r['total'];
}

// DATA REKAP
$q2 = mysqli_query($conn,
    "SELECT * FROM transaksi 
     WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'
     ORDER BY DATE(waktu_transaksi) ASC"
);

$jumlahPelanggan = 0;
$totalPendapatan = 0;

while ($x = mysqli_fetch_assoc($q2)) {
    $jumlahPelanggan++;
    $totalPendapatan += $x['total'];
    $rekap[] = $x;
}
?>

<h3>Rekap Laporan Penjualan <?= $awal ?> s/d <?= $akhir ?></h3>
<hr>

<canvas id="grafik"></canvas>

<script>
var ctx = document.getElementById('grafik');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($label) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($data) ?>
        }]
    }
});
</script>

<br><br>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

<?php $no=1; foreach($rekap as $row) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td>Rp <?= number_format($row['total']) ?></td>
    <td><?= $row['waktu_transaksi'] ?></td>
</tr>
<?php } ?>
</table>

<br><br>

<b>Jumlah Pelanggan:</b> <?= $jumlahPelanggan ?> Orang<br>
<b>Jumlah Pendapatan:</b> Rp <?= number_format($totalPendapatan) ?>

<script>
window.print();
</script>

</body>
</html>
