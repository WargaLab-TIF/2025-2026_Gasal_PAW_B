<?php
require_once 'config.php';

function rupiah($angka) {
    return 'RP. ' . number_format($angka, 0, ',', '.');
}

$start = $_GET['start'] ?? '2023-09-01';
$end   = $_GET['end'] ?? '2023-09-27';

$startDate = date('Y-m-d', strtotime($start));
$endDate   = date('Y-m-d', strtotime($end));

$sql = "SELECT sale_date, SUM(total_amount) AS total_amount, SUM(customers) AS customers
        FROM sales
        WHERE sale_date BETWEEN ? AND ?
        GROUP BY sale_date
        ORDER BY sale_date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $startDate, $endDate);
$stmt->execute();
$res = $stmt->get_result();

$rows = [];
$labels = [];
$dataAmount = [];
$totalPendapatan = 0;
$totalPelanggan = 0;

while ($r = $res->fetch_assoc()) {
    $rows[] = $r;

    // FIX di sini: gunakan "." untuk gabung string, bukan "+"
    $months = ['01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'Mei','06'=>'Jun','07'=>'Jul','08'=>'Agu','09'=>'Sep','10'=>'Okt','11'=>'Nov','12'=>'Des'];
    $y = substr($r['sale_date'],0,4);
    $m = substr($r['sale_date'],5,2);
    $d = substr($r['sale_date'],8,2);
    $labels[] = ltrim($d, '0') . ' ' . ($months[$m] ?? $m) . ' ' . $y;

    $dataAmount[] = (int)$r['total_amount'];
    $totalPendapatan += (int)$r['total_amount'];
    $totalPelanggan += (int)$r['customers'];
}

function indo_date($ymd) {
    $months = ['01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'Mei','06'=>'Jun','07'=>'Jul','08'=>'Agu','09'=>'Sep','10'=>'Okt','11'=>'Nov','12'=>'Des'];
    $y = substr($ymd, 0, 4);
    $m = substr($ymd, 5, 2);
    $d = substr($ymd, 8, 2);
    return ltrim($d, '0') . ' ' . ($months[$m] ?? $m) . ' ' . $y;
}

$excelUrl = 'export_excel.php?start=' . urlencode($startDate) . '&end=' . urlencode($endDate);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Rekap Laporan Penjualan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

  <style>
    canvas#chart {
      width: 100%;
      max-width: 800px;
      height: 400px !important;
    }
  </style>
</head>

<body class="bg-light">
<div class="container py-4">
    <h2 class="mb-4">Rekap Laporan Penjualan <?= htmlspecialchars($startDate) ?> sampai <?= htmlspecialchars($endDate) ?></h2>

    <form class="row g-3 mb-4" method="get">
        <div class="col-md-3">
            <label class="form-label">Dari</label>
            <input type="date" name="start" class="form-control" value="<?= htmlspecialchars($startDate) ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Sampai</label>
            <input type="date" name="end" class="form-control" value="<?= htmlspecialchars($endDate) ?>">
        </div>
        <div class="col-md-6 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-success">Tampilkan</button>
            <a href="<?= $excelUrl ?>" class="btn btn-primary">Excel</a>
            <button type="button" onclick="window.print()" class="btn btn-secondary">Cetak</button>
            <a href="index.php" class="btn btn-dark">Kembali</a>
        </div>
    </form>

    <div class="mb-5">
        <h4>Grafik</h4>
        <canvas id="chart"></canvas>
    </div>

    <div class="mb-5">
        <h4>Rekap</h4>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rows) === 0): ?>
                    <tr><td colspan="3">Tidak ada data pada rentang ini.</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($rows as $r): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= rupiah($r['total_amount']) ?></td>
                            <td><?= indo_date($r['sale_date']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Total</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 border rounded bg-white">
                    <strong>Jumlah Pelanggan:</strong>
                    <div><?= number_format($totalPelanggan) ?> Orang</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded bg-white">
                    <strong>Jumlah Pendapatan:</strong>
                    <div><?= rupiah($totalPendapatan) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const ctx = document.getElementById('chart').getContext('2d');

const labels = <?= json_encode($labels, JSON_UNESCAPED_UNICODE) ?>;
const dataAmount = <?= json_encode($dataAmount) ?>;

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Total (Rp)',
      data: dataAmount,
      backgroundColor: '#0d6efd',
      borderColor: '#0a58ca',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function(value) {
            return 'Rp ' + value.toLocaleString('id-ID');
          }
        }
      }
    }
  }
});
</script>

</body>
</html>
