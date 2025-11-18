<?php
include 'koneksi.php';

// default tanggal: awal bulan sampai hari ini
$start = $_GET['start'] ?? date('Y-m-01');
$end   = $_GET['end']   ?? date('Y-m-d');

// ambil data dengan prepared statement
$stmt = $conn->prepare("SELECT id, tanggal, total, pelanggan FROM transaksi WHERE tanggal BETWEEN ? AND ? ORDER BY tanggal ASC");
$stmt->bind_param("ss", $start, $end);
$stmt->execute();
$res = $stmt->get_result();

$rows = [];
$labels = [];
$totals = [];
$totalPendapatan = 0;

while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
    $labels[] = $r['tanggal'];
    $totals[] = (int)$r['total'];
    $totalPendapatan += (int)$r['total'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Laporan Penjualan</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body { font-family: Arial, sans-serif; margin: 24px; background:#f5f7fb; }
.card { background:#fff; padding:18px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.06); margin-bottom:16px; }
.form-inline input, .form-inline button { margin-right:8px; }
table { width:100%; border-collapse:collapse; margin-top:12px; }
th, td { border:1px solid #ddd; padding:8px; text-align:center; }
th { background:#f0f6ff; }
.total-box { display:flex; gap:16px; margin-top:16px; }
.total-card { background:#fff; padding:12px; flex:1; border:1px solid #e6eefc; text-align:center; border-radius:6px; }
.btn { padding:8px 12px; border-radius:6px; border: none; cursor:pointer; }
.btn-primary { background:#2d7ff9; color:white; }
.btn-secondary { background:#6c757d; color:white; }
</style>
</head>
<body>

<div class="card">
    <h2>Laporan Penjualan</h2>
    <form method="GET" class="form-inline">
        Dari: <input type="date" name="start" value="<?= htmlspecialchars($start) ?>" />
        Sampai: <input type="date" name="end" value="<?= htmlspecialchars($end) ?>" />
        <button type="submit" class="btn btn-primary">Filter</button>

        <!-- tombol Print (buka print page di tab baru) -->
        <a href="print.php?start=<?= urlencode($start) ?>&end=<?= urlencode($end) ?>" target="_blank">
            <button type="button" class="btn btn-secondary">Print / PDF</button>
        </a>

        <!-- tombol Export Excel (link langsung download tanpa grafik) -->
        <a href="export_excel.php?start=<?= urlencode($start) ?>&end=<?= urlencode($end) ?>">
            <button type="button" class="btn btn-secondary">Export Excel</button>
        </a>
    </form>
</div>

<div class="card">
    <h3>Grafik Pendapatan</h3>
    <canvas id="chart" style="max-height:300px;"></canvas>
</div>

<div class="card">
    <h3>Rekap Penjualan</h3>
    <table>
        <thead>
            <tr><th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Total</th></tr>
        </thead>
        <tbody>
        <?php if (count($rows) === 0): ?>
            <tr><td colspan="4">Tidak ada data pada rentang tanggal tersebut.</td></tr>
        <?php else: ?>
            <?php $no=1; foreach ($rows as $r): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d M Y', strtotime($r['tanggal'])) ?></td>
                <td><?= htmlspecialchars($r['pelanggan']) ?></td>
                <td>Rp <?= number_format($r['total'],0,',','.') ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="total-box">
    <div class="total-card">
        <h4>Jumlah Pelanggan</h4>
        <div style="font-size:20px; font-weight:600;"><?= count($rows) ?> Orang</div>
    </div>
    <div class="total-card">
        <h4>Total Pendapatan</h4>
        <div style="font-size:20px; font-weight:600;">Rp <?= number_format($totalPendapatan,0,',','.') ?></div>
    </div>
</div>

<script>
const labels = <?= json_encode($labels) ?>;
const totals = <?= json_encode($totals) ?>;

new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Pendapatan',
            data: totals,
            backgroundColor: 'rgba(54,162,235,0.35)',
            borderColor: 'rgba(54,162,235,0.9)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        },
        plugins: { legend: { display: false } }
    }
});
</script>

</body>
</html>
