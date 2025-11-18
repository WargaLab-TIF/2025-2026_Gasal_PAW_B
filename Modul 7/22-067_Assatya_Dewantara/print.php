<?php
include 'koneksi.php';

$start = $_GET['start'] ?? date('Y-m-01');
$end   = $_GET['end'] ?? date('Y-m-d');

$stmt = $conn->prepare("SELECT id, tanggal, total, pelanggan FROM transaksi WHERE tanggal BETWEEN ? AND ? ORDER BY tanggal ASC");
$stmt->bind_param("ss", $start, $end);
$stmt->execute();
$res = $stmt->get_result();

$rows = []; $labels = []; $totals = []; $totalPendapatan = 0;
while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
    $labels[] = $r['tanggal'];
    $totals[] = (int)$r['total'];
    $totalPendapatan += (int)$r['total'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Print Laporan</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body { font-family: Arial; margin:32px; color:#111; }
h2 { text-align:center; margin-bottom:4px; }
.period { text-align:center; margin-bottom:18px; color:#555; }
@media print { button{ display:none; } }
.table { width:100%; border-collapse:collapse; margin-top:18px; }
.table th, .table td { border:1px solid #ddd; padding:8px; text-align:center; }
.table th { background:#f5f5f5; }
.total-box { display:flex; justify-content:space-between; margin-top:18px; gap:12px; }
.card { width:48%; padding:12px; border:1px solid #ddd; border-radius:6px; text-align:center; }
</style>
</head>
<body>

<button onclick="window.print()">Print / Save as PDF</button>

<h2>Rekap Laporan Penjualan</h2>
<div class="period"><?= htmlspecialchars($start) ?> sampai <?= htmlspecialchars($end) ?></div>

<canvas id="chart" height="120"></canvas>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($totals) ?>,
            backgroundColor: 'rgba(120,120,120,0.28)',
            borderColor: 'rgba(60,60,60,0.8)',
            borderWidth: 1
        }]
    },
    options: { scales: { y: { beginAtZero: true } }, plugins: { legend:{ display:false } } }
});
</script>

<table class="table">
<thead><tr><th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Total</th></tr></thead>
<tbody>
<?php if (count($rows)===0): ?>
  <tr><td colspan="4">Tidak ada data.</td></tr>
<?php else: $no=1; foreach($rows as $r): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= date('d M Y', strtotime($r['tanggal'])) ?></td>
    <td><?= htmlspecialchars($r['pelanggan']) ?></td>
    <td>Rp <?= number_format($r['total'],0,',','.') ?></td>
  </tr>
<?php endforeach; endif; ?>
</tbody>
</table>

<div class="total-box">
  <div class="card">
    <h4>Jumlah Pelanggan</h4>
    <div style="font-size:18px; font-weight:700;"><?= count($rows) ?> Orang</div>
  </div>
  <div class="card">
    <h4>Total Pendapatan</h4>
    <div style="font-size:18px; font-weight:700;">Rp <?= number_format($totalPendapatan,0,',','.') ?></div>
  </div>
</div>

</body>
</html>
