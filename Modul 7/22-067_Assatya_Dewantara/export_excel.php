<?php
include 'koneksi.php';

$start = $_GET['start'] ?? date('Y-m-01');
$end   = $_GET['end']   ?? date('Y-m-d');

// ambil data
$stmt = $conn->prepare("SELECT tanggal, total FROM transaksi WHERE tanggal BETWEEN ? AND ? ORDER BY tanggal ASC");
$stmt->bind_param("ss", $start, $end);
$stmt->execute();
$res = $stmt->get_result();

$rows = [];
$totalPendapatan = 0;
while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
    $totalPendapatan += (int)$r['total'];
}
$stmt->close();

// header Excel
$filename = "Rekap_Penjualan_{$start}_sd_{$end}.xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

// mulai output HTML
?>

<style>
    body { font-family: Calibri, Arial; }

    .title {
        font-size: 20px;
        font-weight: bold;
    }

    .period {
        font-size: 14px;
        font-weight: normal;
    }

    .line {
        border-bottom: 2px solid black;
        margin: 6px 0;
    }

    table {
        width: 50%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
        text-align: left;
    }

    .bold {
        font-weight: bold;
    }

    .summary-table td {
        padding-top: 10px;
        font-size: 14px;
    }
</style>

<!-- Judul Laporan -->
<table>
    <tr>
        <td class="title">Rekap Laporan Penjualan</td>
        <td class="period"><?= $start ?> sampai <?= $end ?></td>
    </tr>
</table>

<div class="line"></div>

<!-- Tabel Rekap -->
<table>
    <tr class="bold">
        <td>No</td>
        <td>Total</td>
        <td>Tanggal</td>
    </tr>

    <?php if (count($rows) === 0): ?>
        <tr><td colspan="3">Tidak ada data</td></tr>
    <?php else: ?>
        <?php $no = 1; ?>
        <?php foreach ($rows as $r): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>RP. <?= number_format($r['total'], 0, ',', '.') ?></td>
            <td><?= date('d-M-y', strtotime($r['tanggal'])) ?></td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<!-- Summary -->
<table class="summary-table">
    <tr class="bold">
        <td>Jumlah Pelanggan</td>
        <td>Jumlah Pendapatan</td>
    </tr>
    <tr>
        <td><?= count($rows) ?> Orang</td>
        <td>RP. <?= number_format($totalPendapatan, 0, ',', '.') ?></td>
    </tr>
</table>
