<?php
session_start();
require_once '../../koneksi.php';

$dari_tanggal = isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '';
$sampai_tanggal = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';

if (!empty($dari_tanggal) && !empty($sampai_tanggal) && $dari_tanggal > $sampai_tanggal) {
    $sementara = $dari_tanggal;
    $dari_tanggal = $sampai_tanggal;
    $sampai_tanggal = $sementara;
}
if ($dari_tanggal && !$sampai_tanggal) { $sampai_tanggal = $dari_tanggal; }
if ($sampai_tanggal && !$dari_tanggal) { $dari_tanggal = $sampai_tanggal; }

$sql_dasar = "SELECT b.id AS barang_id, b.kode_barang, b.nama_barang, SUM(nd.qty) AS jumlah_terjual, SUM(nd.subtotal) AS total_penjualan, MIN(n.tanggal) AS first_sold, MAX(n.tanggal) AS last_sold FROM nota_detail nd JOIN nota n ON nd.nota_id = n.id JOIN barang b ON nd.barang_id = b.id";
$sql_akhir = " GROUP BY b.id, b.kode_barang, b.nama_barang ORDER BY jumlah_terjual DESC";

$pakai_filter = ($dari_tanggal !== '' && $sampai_tanggal !== '');
$hasil = false;
$menggunakan_view = false;

if ($pakai_filter) {
    $sql = $sql_dasar . " WHERE DATE(n.tanggal) BETWEEN ? AND ?" . $sql_akhir;
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $dari_tanggal, $sampai_tanggal);
        mysqli_stmt_execute($stmt);
        $hasil = mysqli_stmt_get_result($stmt);
    }
} else {
    $sql = $sql_dasar . $sql_akhir;
    $hasil = @mysqli_query($koneksi, $sql);
}

if (!$hasil) {
    $sql_view = "SELECT barang_id, kode_barang, nama_barang, jumlah_terjual, total_penjualan, first_sold, last_sold FROM laporan_penjualan";
    if ($pakai_filter) {
        $sql_view .= " WHERE DATE(last_sold) BETWEEN ? AND ?";
        $stmt_view = mysqli_prepare($koneksi, $sql_view);
        if ($stmt_view) {
            mysqli_stmt_bind_param($stmt_view, 'ss', $dari_tanggal, $sampai_tanggal);
            mysqli_stmt_execute($stmt_view);
            $hasil = mysqli_stmt_get_result($stmt_view);
            $menggunakan_view = true;
        }
    } else {
        $hasil = @mysqli_query($koneksi, $sql_view);
        if ($hasil) { $menggunakan_view = true; }
    }
}

$data_laporan = [];
$label_chart = [];
$nilai_chart = [];
$total_qty = 0;
$total_penjualan = 0;

if ($hasil) {
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data_laporan[] = $baris;
        $jumlah = isset($baris['jumlah_terjual']) ? (int)$baris['jumlah_terjual'] : 0;
        $pendapatan = isset($baris['total_penjualan']) ? (int)$baris['total_penjualan'] : 0;
        $total_qty += $jumlah;
        $total_penjualan += $pendapatan;

        $kode = isset($baris['kode_barang']) ? $baris['kode_barang'] : '';
        $nama = isset($baris['nama_barang']) ? $baris['nama_barang'] : '';
        if ($kode !== '' && $nama !== '') {
            $label_chart[] = $kode.' - '.$nama;
        } elseif ($kode !== '') {
            $label_chart[] = $kode;
        } elseif ($nama !== '') {
            $label_chart[] = $nama;
        } else {
            $label_chart[] = 'Barang';
        }
        $nilai_chart[] = $jumlah;
    }
}

$jumlah_data = count($data_laporan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .table-header-blue th {
            background-color: #d9edf7 !important; 
            text-align: left;
        }
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="p-4">
    <?php include '../../layouts/header.php'; ?>
    
    <div class="card mb-4 no-print bg-light">
        <div class="card-body p-2">
            <form action="index.php" method="GET" class="d-flex align-items-center gap-2">
                <input type="date" name="dari_tanggal" class="form-control w-auto" value="<?= htmlspecialchars($dari_tanggal) ?>">
                <input type="date" name="sampai_tanggal" class="form-control w-auto" value="<?= htmlspecialchars($sampai_tanggal) ?>">
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </form>
        </div>
    </div>
    <h5 class="mb-3">Rekap Laporan Penjualan Barang <?= $dari_tanggal && $sampai_tanggal ? htmlspecialchars($dari_tanggal.' sampai '.$sampai_tanggal) : '' ?></h5>
    <div class="mb-3 no-print">
        <button onclick="window.print()" class="btn btn-warning text-white btn-sm"><i class="fa fa-print"></i> Cetak</button>
        <a href="excel.php?dari_tanggal=<?= urlencode($dari_tanggal) ?>&sampai_tanggal=<?= urlencode($sampai_tanggal) ?>" class="btn btn-success text-white btn-sm"><i class="fa fa-file-excel"></i> Excel</a>
    </div>

    <div class="mb-4">
        <canvas id="myChart" style="max-height: 300px;"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                        labels: <?= json_encode($label_chart) ?>,
                datasets: [{
                            label: 'Jumlah Terjual',
                            data: <?= json_encode($nilai_chart) ?>,
                    borderWidth: 1,
                    backgroundColor: 'rgba(52, 152, 219, 0.3)',
                    hoverBackgroundColor: 'rgba(52, 152, 219, 0.6)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
    
    <?php if (!$hasil): ?>
        <div class="alert alert-warning">Data laporan belum tersedia. Pastikan view <code>laporan_penjualan</code> dan tabel transaksi sudah dibuat.</div>
    <?php elseif ($menggunakan_view && $dari_tanggal && $sampai_tanggal): ?>
        <div class="alert alert-info">Filter tanggal menggunakan data agregat dari view. Pastikan view sudah memperhitungkan rentang tanggal yang diinginkan.</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-header-blue">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                            <th>Pertama Terjual</th>
                            <th>Terakhir Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($data_laporan): ?>
                            <?php $no = 1; foreach ($data_laporan as $baris): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($baris['kode_barang'] ?? '-') ?></td>
                                    <td><?= htmlspecialchars($baris['nama_barang'] ?? '-') ?></td>
                                    <td class="text-end"><?= number_format((int)($baris['jumlah_terjual'] ?? 0), 0, ',', '.') ?></td>
                                    <td class="text-end"><?= 'Rp. '.number_format((int)($baris['total_penjualan'] ?? 0), 0, ',', '.') ?></td>
                                    <td><?= isset($baris['first_sold']) && $baris['first_sold'] ? htmlspecialchars(date('d M Y', strtotime((string)$baris['first_sold']))) : '-' ?></td>
                                    <td><?= isset($baris['last_sold']) && $baris['last_sold'] ? htmlspecialchars(date('d M Y', strtotime((string)$baris['last_sold']))) : '-' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data laporan untuk rentang tanggal ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-sm w-50 mt-3 table-header-blue">
        <thead>
            <tr class="table-header-blue">
                <th>Jumlah Data</th>
                <th>Total Barang Terjual</th>
                <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $jumlah_data ?> Barang</td>
                <td><?= number_format($total_qty, 0, ',', '.') ?></td>
                <td><?= 'Rp. '.number_format($total_penjualan, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <?php include '../../layouts/footer.php'; ?>
</body>
</html>