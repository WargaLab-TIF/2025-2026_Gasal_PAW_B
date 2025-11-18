<?php
// Include koneksi & helper
require 'koneksi.php';
require_once 'report_helper.php';

// Inisialisasi tanggal default (awal bulan & hari ini)
$awalDefault = date('Y-m-01');
$akhirDefault = date('Y-m-d');

// Cek apakah user sudah menekan tombol tampilkan
$tampilkan = isset($_GET['show']);

if ($tampilkan) {
    //  rentang tanggal dari input form
    [$tanggalAwal, $tanggalAkhir] = normalisasiRentangTanggal($_GET, 'start_date', 'end_date', $awalDefault, $akhirDefault);
    // Ambil data total harian & ringkasan dari tabel transaksi
    $hasilRekap = ambilTotalHarianTransaksi($conn, $tanggalAwal, $tanggalAkhir);
    $hasilRingkas = ambilRingkasanTransaksi($conn, $tanggalAwal, $tanggalAkhir);

    $dataRekap = $hasilRekap['data'];
    $dataRingkas = $hasilRingkas['data'];
    $pesanError = $hasilRekap['error'] ?? $hasilRingkas['error'];

    // label & nilai untuk grafik
    $labelGrafik = array_map(fn($r) => formatTanggal($r['tanggal']), $dataRekap);
    $nilaiGrafik = array_map(fn($r) => round($r['total_harian'], 2), $dataRekap);
} else {
    //  hanya tampilkan filter
    $tanggalAwal = $_GET['start_date'] ?? $awalDefault;
    $tanggalAkhir = $_GET['end_date'] ?? $akhirDefault;
    $dataRekap = [];
    $dataRingkas = ['total_pelanggan' => 0, 'total_pendapatan' => 0.0];
    $pesanError = null;
    $labelGrafik = [];
    $nilaiGrafik = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="report.css" />
</head>
<body>
    <div class="container">
        <h1>Rekap Laporan Penjualan</h1>
        <span style="color: gray;">Data dari tabel <strong>transaksi</strong></span>
        <p class="periode">Periode <?= htmlspecialchars(formatPeriode($tanggalAwal, $tanggalAkhir)); ?></p>

        <form method="get" class="filter no-print">
            <input type="hidden" name="show" value="1" />
            <label for="start_date">
                Tanggal Mulai
                <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($tanggalAwal); ?>">
            </label>
            <label for="end_date">
                Tanggal Selesai
                <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($tanggalAkhir); ?>">
            </label>
            <button type="submit">Tampilkan</button>
        </form>

        <div class="actions no-print">
            <button type="button" class="btn orange" onclick="window.print()" <?= $tampilkan ? '' : 'disabled'; ?>>Cetak</button>
            <button type="button" class="btn orange" onclick="unduhExcel()" <?= $tampilkan ? '' : 'disabled'; ?>>Excel</button>
        </div>

        <?php if ($pesanError): ?>
            <div class="message">Terjadi kesalahan saat ambil data: <?= htmlspecialchars($pesanError); ?></div>
        <?php endif; ?>

        <?php if ($tampilkan): ?>
            <div class="chart-wrapper">
                <canvas id="salesChart"></canvas>
            </div>

            <table class="rekap-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($dataRekap) === 0): ?>
                        <tr>
                            <td colspan="3">Tidak ada data pada rentang tanggal tersebut.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($dataRekap as $no => $r): ?>
                            <tr>
                                <td><?= $no + 1; ?></td>
                                <td><?= htmlspecialchars(formatRupiah($r['total_harian'])); ?></td>
                                <td><?= htmlspecialchars(formatTanggal($r['tanggal'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <table class="summary-table">
                <thead>
                    <tr>
                        <th>Jumlah Pelanggan</th>
                        <th>Jumlah Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars((string) $dataRingkas['total_pelanggan']); ?> Orang</td>
                        <td><?= htmlspecialchars(formatRupiah($dataRingkas['total_pendapatan'])); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <script>
        // Variabel global untuk grafik
        const labelGrafik = <?= json_encode($labelGrafik, JSON_UNESCAPED_UNICODE); ?>;
        const nilaiGrafik = <?= json_encode($nilaiGrafik, JSON_UNESCAPED_UNICODE); ?>;
    </script>
    <script src="report.js"></script>
</body>
</html>