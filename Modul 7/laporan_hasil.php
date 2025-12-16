<?php 
require 'koneksi.php';

// Ambil tanggal dari filter.php
$tgl_mulai   = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];

// Query grafik & rekap
$query = "SELECT tanggal, SUM(total_harga) AS total_harga 
          FROM penjualan 
          WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'
          GROUP BY tanggal
          ORDER BY tanggal ASC";

$hasil = mysqli_query($conn, $query);

$labels = [];
$jumlah = [];
$rows = [];

while ($row = mysqli_fetch_assoc($hasil)) {
    $labels[] = $row['tanggal'];
    $jumlah[] = $row['total_harga'];
    $rows[]   = $row;
}

// Query total pelanggan + pendapatan
$qTotal = "SELECT COUNT(*) AS jml_pelanggan, 
                  SUM(total_harga) AS jml_pendapatan
           FROM penjualan
           WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'";

$rtotal = mysqli_query($conn, $qTotal);
$dataTotal = mysqli_fetch_assoc($rtotal);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Laporan Gabungan</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body{
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .btn-back{
        padding: 8px 15px;
        background: #0056A6;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        display: inline-block;
    }

    .btn-orange{
        padding: 8px 15px;
        background: #FF8C00;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        width: 90px;
        text-decoration: none;
        justify-content: center;
    }

    @media print {
        .button-area, .btn-back { display: none; }
        .print-title{
            display: block !important;
            font-size: 18px; 
            margin-bottom: 20px;
            font-weight: normal; 
        }
        .print-title .print-date {
            display: inline;         
            font-size: 14px;         
            margin-left: 8px;        
            vertical-align: middle;
            font-weight: normal;
            color: #333;
        }
        .screen-title { display: none !important; } 
    }

    .print-title{ display: none; }

    table.data {
        border-collapse: collapse;
        width: 80%;
        margin-top: 20px;
    }

    table.data th {
        background: #C8E3FF;
        border: 1px solid #A5C8E8;
        padding: 10px;
        text-align: left;
    }

    table.data td {
        border: 1px solid #A5C8E8;
        padding: 10px;
        text-align: left;
    }

    table.total {
        border-collapse: collapse;
        width: 60%;
        margin-top: 20px;
    }

    table.total th {
        background: #C8E3FF;
        border: 1px solid #A5C8E8;
        padding: 12px;
        text-align: left;
    }

    table.total td {
        border: 1px solid #A5C8E8;
        padding: 12px;
        font-weight: bold;
        color: #004A8D;
        text-align: right;
    }
</style>
</head>
<body>


<div class="print-title">
    Rekap Laporan Penjualan<span class="print-date"><?= $tgl_mulai ?> sampai <?= $tgl_selesai ?></span>
</div>

<h2 class="screen-title" style="margin-bottom:8px; color:#0056A6;">
    Rekap Laporan Penjualan 
    <span style="font-size:18px; font-weight:normal; color:#333;">
        <?= $tgl_mulai ?> sampai <?= $tgl_selesai ?>
    </span>
</h2>

<a href="filter.php" class="btn-back" style="margin-bottom:15px;">
    ⬅ Kembali
</a>

<div class="button-area" style="margin-bottom: 20px;">
    <button onclick="window.print()" class="btn-orange">🖨 Cetak</button>

    <a class="btn-orange" 
        href="export_excel.php?tgl_mulai=<?= $tgl_mulai ?>&tgl_selesai=<?= $tgl_selesai ?>">
        📄 Excel
    </a>
</div>

<!-- GRAFIK -->
<div style="width: 70%; margin-bottom: 30px;">
    <canvas id="myChart"></canvas>
</div>

<script>
new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($jumlah) ?>,
            backgroundColor: "rgba(180, 180, 180, 0.7)",
            borderColor: "rgba(130,130,130,1)",
            borderWidth: 1,
            borderRadius: 3
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true },
            x: { grid: { display: false } }
        }
    }
});
</script>

<table class="data">
<tr>
    <th>No</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>

<?php $no = 1; foreach($rows as $r): ?>
<tr>
    <td><?= $no++; ?></td>
    <td>Rp. <?= number_format($r['total_harga'], 0, ',', '.'); ?></td>
    <td><?= $r['tanggal']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<table class="total">
<tr>
    <th>Jumlah Pelanggan</th>
    <th>Jumlah Pendapatan</th>
</tr>

<tr>
    <td><?= $dataTotal['jml_pelanggan']; ?> Orang</td>
    <td>Rp. <?= number_format($dataTotal['jml_pendapatan'], 0, ',', '.'); ?></td>
</tr>
</table>

</body>
</html>
