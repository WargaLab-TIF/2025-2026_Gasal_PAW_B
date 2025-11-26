<?php 
require 'koneksi.php';

$tgl1 = $_GET['tgl1'] ?? date('Y-m-01');
$tgl2 = $_GET['tgl2'] ?? date('Y-m-d');

$query = "SELECT tanggal, SUM(jumlah) AS total_pendapatan, COUNT(*) AS total_transaksi 
          FROM penjualan 
          WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
          GROUP BY tanggal ORDER BY tanggal ASC";

// $e = "SELECT tanggal, AVG(jumlah) AS total_pendapatan, COUNT(*) AS total_transaksi 
//         FROM penjualan
//         WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
//         GROUP BY tanggal ORDER BY tanggal ASC";

$hasil = mysqli_query($conn, $query);

$labels = [];
$jumlah = [];
$data = [];
$total_semua = 0;
$total_pelanggan = 0;

while ($row = mysqli_fetch_assoc($hasil)) {
    $labels[] = $row['tanggal'];
    $jumlah[] = $row['total_pendapatan'];
    $data[] = $row;
    
    $total_semua += $row['total_pendapatan'];
    $total_pelanggan += $row['total_transaksi'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { background: #fff; padding: 20px; }
        .rekap-table th { background: #cce6ff !important; }
        .total-value { font-size: 20px; font-weight: bold; color: #0077cc; }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<!-- TOMBOL -->
<div class="mb-4 d-flex gap-2 no-print">
    <a href="index.php" class="btn btn-danger">Kembali</a>
</div>    

<div class="mb-4 d-flex gap-2 no-print">
    <button class="btn btn-dark" onclick="window.print()">Cetak</button>
    <a href="excel.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>" class="btn btn-success">Excel</a>
</div>

<h3><b>Hasil Laporan <?= $tgl1 ?> s/d <?= $tgl2 ?></b></h3>
<hr>

<!-- GRAFIK -->
<div class="mb-4">
    <canvas id="myChart" style="height:300px;"></canvas>
</div>

<h4><b>Tabel Rekap</b></h4>
<table class="table table-bordered rekap-table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total</th>
    </tr>

    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= date("d M Y", strtotime($d['tanggal'])) ?></td>
        <td>Rp <?= number_format($d['total_pendapatan']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h4><b>Tabel Rata-rata Pendapatan</b></h4>
<table class="table table-bordered rata-table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>rata-rata</th>
    </tr>

    <?php $no=1; foreach($data as $e): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= date("d M Y", strtotime($e['tanggal'])) ?></td>
        <td>Rp <?= number_format($e['rata_pendapatan']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>

<h4><b>Tabel Total</b></h4>
<table class="table">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td class="total-value"><?= $total_pelanggan ?> Orang</td>
        <td class="total-value">Rp <?= number_format($total_semua) ?></td>
    </tr>
</table>

<script>
const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($jumlah); ?>,
            backgroundColor: 'rgba(180,180,180,0.7)',
            borderColor: 'grey',
            borderWidth: 1
        }]
    },
    options: { scales: { y: { beginAtZero: true }} }
});
</script>

</body>
</html>
