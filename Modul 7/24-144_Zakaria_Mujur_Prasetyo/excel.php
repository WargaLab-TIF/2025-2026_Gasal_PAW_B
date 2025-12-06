<?php
// Export Excel sederhana dengan nama variabel berbahasa Indonesia
require 'koneksi.php';
require_once 'report_helper.php';

$awalDefault = date('Y-m-01');
$akhirDefault = date('Y-m-t');

[$tanggalAwal, $tanggalAkhir] = normalisasiRentangTanggal($_GET, 'start_date', 'end_date', $awalDefault, $akhirDefault);

$hasilRekap = ambilTotalHarianTransaksi($conn, $tanggalAwal, $tanggalAkhir);
$hasilRingkas = ambilRingkasanTransaksi($conn, $tanggalAwal, $tanggalAkhir);

$pesanError = $hasilRekap['error'] ?? $hasilRingkas['error'];
if ($pesanError) {
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Gagal menyiapkan file Excel: ' . $pesanError;
    exit;
}

$dataRekap = $hasilRekap['data'];
$dataRingkas = $hasilRingkas['data'];

$namaFile = sprintf('rekap_transaksi_%s_sampai_%s.xls', $tanggalAwal, $tanggalAkhir);
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $namaFile . '"');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Laporan Transaksi</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th colspan="3">Rekap Laporan Transaksi <?= htmlspecialchars(formatPeriode($tanggalAwal, $tanggalAkhir)); ?></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
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
    </table>

    <br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars((string) $dataRingkas['total_pelanggan']); ?> Orang</td>
            <td><?= htmlspecialchars(formatRupiah($dataRingkas['total_pendapatan'])); ?></td>
        </tr>
    </table>
</body>
</html>