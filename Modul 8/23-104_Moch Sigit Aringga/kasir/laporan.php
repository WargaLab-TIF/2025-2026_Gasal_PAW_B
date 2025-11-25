<?php
// laporan.php
include 'config.php';
include 'header.php';
include '../auth.php';

// --- 1. Export CSV (Tetap sama) ---
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=laporan_harian.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Tanggal', 'Pelanggan', 'Keterangan', 'Total']);
    $q = mysqli_query($conn, "SELECT t.id, t.waktu_transaksi, p.nama, t.keterangan, t.total 
                              FROM transaksi t LEFT JOIN pelanggan p ON p.id = t.pelanggan_id 
                              ORDER BY t.waktu_transaksi DESC");
    while ($r = mysqli_fetch_assoc($q)) fputcsv($output, $r);
    fclose($output);
    exit;
}

// --- 2. Query Grafik: Penjualan Harian (PERHARI) ---
// Kita ambil tanggal (Y-m-d) dan format labelnya jadi '01 Oct', '02 Oct', dst.
// Kita batasi hanya mengambil data bulan & tahun dari transaksi yang ada (atau bisa pakai MONTH(NOW()) untuk real time)
$sql_daily = "SELECT DATE_FORMAT(waktu_transaksi, '%Y-%m-%d') AS tgl,
                     DATE_FORMAT(waktu_transaksi, '%d %M') AS label,
                     SUM(total) AS total
              FROM transaksi
              -- WHERE MONTH(waktu_transaksi) = MONTH(CURRENT_DATE()) -- Aktifkan baris ini jika ingin cuma bulan ini
              GROUP BY tgl
              ORDER BY tgl ASC";

$res_daily = mysqli_query($conn, $sql_daily);
$labels_daily = [];
$data_daily = [];

while ($r = mysqli_fetch_assoc($res_daily)) {
    $labels_daily[] = $r['label']; // Contoh: 01 October
    $data_daily[]   = (int)$r['total'];
}

// --- 3. Top Produk (Tetap sama) ---
$sql_top = "SELECT b.nama_barang, SUM(td.qty) AS qty 
            FROM transaksi_detail td JOIN barang b ON b.id = td.barang_id 
            GROUP BY td.barang_id ORDER BY qty DESC LIMIT 5";
$res_top = mysqli_query($conn, $sql_top);
$top_labels = []; $top_qty = [];
while ($r = mysqli_fetch_assoc($res_top)) { $top_labels[] = $r['nama_barang']; $top_qty[] = (int)$r['qty']; }

// --- 4. Pembayaran (Tetap sama) ---
$sql_pay = "SELECT metode, SUM(total) AS total FROM pembayaran GROUP BY metode";
$res_pay = mysqli_query($conn, $sql_pay);
$pay_labels = []; $pay_data = [];
while ($r = mysqli_fetch_assoc($res_pay)) { $pay_labels[] = $r['metode']; $pay_data[] = (int)$r['total']; }

// --- 5. Tabel Terbaru ---
$res_recent = mysqli_query($conn, "SELECT t.*, p.nama FROM transaksi t LEFT JOIN pelanggan p ON p.id = t.pelanggan_id ORDER BY t.waktu_transaksi DESC LIMIT 10");
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">POS System - Harian</a>
            <a href="laporan.php?export=csv" class="btn btn-sm btn-light">Export CSV</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tren Penjualan Harian</h5>
                        <p class="text-muted small">Grafik pergerakan omzet per hari</p>
                        <div style="height: 300px;">
                            <canvas id="chartDaily"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Metode Pembayaran</h5>
                        <canvas id="chartPay"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">5 Produk Terlaris</h5>
                        <canvas id="chartTop" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Riwayat Transaksi Terakhir</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-sm align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Ket</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($res_recent)): ?>
                            <tr>
                                <td><?= date('d M Y', strtotime($row['waktu_transaksi'])) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td class="small text-muted"><?= $row['keterangan'] ?></td>
                                <td class="text-end fw-bold">Rp <?= number_format($row['total']) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- 1. CHART HARIAN (LINE CHART) ---
        const ctxDaily = document.getElementById('chartDaily').getContext('2d');
        new Chart(ctxDaily, {
            type: 'line', // Line chart lebih bagus untuk data harian
            data: {
                labels: <?= json_encode($labels_daily) ?>,
                datasets: [{
                    label: 'Omzet (Rp)',
                    data: <?= json_encode($data_daily) ?>,
                    borderColor: '#0d6efd',         // Warna Garis Biru
                    backgroundColor: 'rgba(13, 110, 253, 0.1)', // Warna Arsiran bawah
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',   // Titik putih
                    pointBorderColor: '#0d6efd',    // Pinggiran titik biru
                    pointRadius: 5,
                    fill: true,                     // Mengisi area di bawah garis
                    tension: 0.3                    // Membuat garis sedikit melengkung (smooth)
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
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ' Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                            }
                        }
                    }
                }
            }
        });

        // --- 2. CHART PEMBAYARAN (PIE) ---
        new Chart(document.getElementById('chartPay'), {
            type: 'doughnut',
            data: {
                labels: <?= json_encode($pay_labels) ?>,
                datasets: [{
                    data: <?= json_encode($pay_data) ?>,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
                }]
            }
        });

        // --- 3. CHART TOP PRODUK (BAR) ---
        new Chart(document.getElementById('chartTop'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($top_labels) ?>,
                datasets: [{
                    label: 'Qty',
                    data: <?= json_encode($top_qty) ?>,
                    backgroundColor: '#198754'
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true
            }
        });
    </script>
</body>
</html>