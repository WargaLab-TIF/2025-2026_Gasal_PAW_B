<?php
include 'koneksi.php';

$awal  = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : "";
$akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : "";

if (!empty($awal) && !empty($akhir)) {
    $query = "
        SELECT tanggal, SUM(jumlah) AS total
        FROM transaksi
        WHERE tanggal BETWEEN '$awal' AND '$akhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
} else {
    $query = "
        SELECT tanggal, SUM(jumlah) AS total
        FROM transaksi
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
}

if (!empty($awal) && !empty($akhir)) {
    $pelangganQuery = "
        SELECT COUNT(DISTINCT id) AS jumlah_pelanggan
        FROM transaksi
        WHERE tanggal BETWEEN '$awal' AND '$akhir'
    ";
} else {
    $pelangganQuery = "
        SELECT COUNT(DISTINCT id) AS jumlah_pelanggan
        FROM transaksi
    ";
}

$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$tanggal = [];
$total = [];
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total'];
    $data[] = $row;
}

$jumlahPendapatan = array_sum($total);


$pelangganResult = mysqli_query($koneksi, $pelangganQuery);
$pelangganRow = mysqli_fetch_assoc($pelangganResult);
$jumlahPelanggan = $pelangganRow['jumlah_pelanggan'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Filter & Grafik Chart.js</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }
       
        table {
            margin-top: 20px;
            background: white;
            border-collapse: collapse;
            width: 60%;
        }
        table td, th {
            padding: 8px 10px;
            border: 1px solid #aaa;
        }
        table th {
            background: #AFEEEE;
        }
    </style>
</head>
<body>
    <h2>Filter Tanggal & Grafik</h2>
    <canvas id="grafik"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('grafik').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tanggal); ?>,
                datasets: [{
                    label: 'Total Pendapatan',
                    data: <?= json_encode($total); ?>,
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } } }
        });
    </script>
    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        <?php $no = 1; foreach ($data as $d): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp. <?= number_format($d['total'],0,',','.') ?></td>
            <td><?= $d['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <table style="margin-top:20px; width:40%;">
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><?= $jumlahPelanggan ?> Orang</td>
            <td>Rp. <?= number_format($jumlahPendapatan,0,',','.') ?></td>
        </tr>
    </table>
</body>
</html>
