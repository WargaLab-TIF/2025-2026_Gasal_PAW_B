<?php
include 'koneksi.php';

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01');
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

$query = "SELECT * FROM transaksi 
          WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' 
          ORDER BY tgl_transaksi ASC";
$result = mysqli_query($koneksi, $query);

$data_grafik = [];
$total_pendapatan = 0;
$total_pelanggan = 0;
$data_tabel = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data_tabel[] = $row;
    
    $total_pendapatan += $row['total_bayar'];
    $total_pelanggan++;

    $tgl = $row['tgl_transaksi'];
    if (isset($data_grafik[$tgl])) {
        $data_grafik[$tgl] += $row['total_bayar'];
    } else {
        $data_grafik[$tgl] = $row['total_bayar'];
    }
}

$chart_labels = array_keys($data_grafik);
$chart_values = array_values($data_grafik);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        @media print {
            .no-print { display: none !important; }
            .card { border: none !important; }
            .card-header { background: none !important; border: none !important; }
        }
        .bg-summary { background-color: #eef7fc; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card mb-4 no-print">
        <div class="card-header">Filter Laporan</div>
        <div class="card-body">
            <form action="" method="GET" class="row g-3 align-items-end">
                <div class="col-auto">
                    <label>Dari Tanggal</label>
                    <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>" required>
                </div>
                <div class="col-auto">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-3 no-print">
        <button onclick="window.print()" class="btn btn-warning text-white me-2">
            📷 Cetak (Print/PDF)
        </button>
        <a href="excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-success">
            📊 Excel
        </a>
    </div>

    <div class="text-center mb-4">
        <h3>Rekap Laporan Penjualan</h3>
        <p class="text-muted"><?= $tgl_awal ?> sampai <?= $tgl_akhir ?></p>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <canvas id="myChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if (count($data_tabel) > 0) {
                        foreach ($data_tabel as $row) { 
                            $tgl_indo = date('d M Y', strtotime($row['tgl_transaksi']));
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>Rp. <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                            <td><?= $tgl_indo ?></td>
                        </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-6">
            <div class="alert bg-summary border-info">
                <div class="row">
                    <div class="col-6 fw-bold">Jumlah Pelanggan</div>
                    <div class="col-6 fw-bold text-end">Jumlah Pendapatan</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6 text-primary fw-bold fs-5"><?= $total_pelanggan ?> Orang</div>
                    <div class="col-6 text-end fw-bold fs-5">RP. <?= number_format($total_pendapatan, 0, ',', '.') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($chart_labels) ?>,
            datasets: [{
                label: 'Pendapatan Harian',
                data: <?= json_encode($chart_values) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

</body>
</html>