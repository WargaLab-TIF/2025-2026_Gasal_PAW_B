<?php
include "koneksi.php";

// Ambil filter tanggal dari laporan.php
$start = isset($_GET['start']) ? $_GET['start'] : "";
$end   = isset($_GET['end'])   ? $_GET['end']   : "";

// Jika tanggal tidak diisi → hentikan
if ($start == "" || $end == "") {
    die("Silakan pilih tanggal terlebih dahulu melalui halaman laporan.");
}

// Query Grafik
$q_grafik = mysqli_query($conn, "SELECT tanggal, SUM(jumlah) AS total 
                                FROM penjualan
                                WHERE tanggal BETWEEN '$start' AND '$end'
                                GROUP BY tanggal
                                ORDER BY tanggal");

$tanggal = [];
$total = [];

while($row = mysqli_fetch_assoc($q_grafik)){
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total'];
}

// Query Rekap
$rekap = mysqli_query($conn, "SELECT * FROM penjualan
                              WHERE tanggal BETWEEN '$start' AND '$end'
                              ORDER BY tanggal");

// Query Total
$q_total = mysqli_query($conn, "SELECT 
                                COUNT(id) AS jumlah_transaksi,
                                SUM(jumlah) AS total_barang
                                FROM penjualan
                                WHERE tanggal BETWEEN '$start' AND '$end'");
$tot = mysqli_fetch_assoc($q_total);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Laporan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #333; padding: 8px; }
        th { background: #e0f3ff; }
    </style>
</head>
<body onload="window.print()">

<h2 style="text-align:center;">Laporan Transaksi</h2>
<p><b>Periode:</b> <?= date("d M Y", strtotime($start)); ?> - <?= date("d M Y", strtotime($end)); ?></p>

<hr>

<!-- Grafik -->
<h3>Grafik Transaksi</h3>
<canvas id="grafik" style="margin-bottom:30px;"></canvas>

<script>
new Chart(document.getElementById('grafik'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal); ?>,
        datasets: [{
            label: 'Jumlah Barang',
            data: <?= json_encode($total); ?>,
        }]
    }
});
</script>

<hr>

<!-- Rekap -->
<h3>Rekap Transaksi</h3>
<table width="60%">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1;
    while($r = mysqli_fetch_assoc($rekap)): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td>RP. <?= number_format($r['jumlah'],0,',','.'); ?></td>
        <td><?= date("d M Y", strtotime($r['tanggal'])); ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<hr>

<!-- Total -->
<h3>Total</h3>
<table width="40%">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= $tot['jumlah_transaksi']; ?> Orang</td>
        <td>RP. <?= number_format($tot['total_barang'],0,',','.'); ?></td>
    </tr>
</table>

</body>
</html>
