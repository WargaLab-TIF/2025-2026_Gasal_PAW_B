<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

require 'koneksi.php'; 

date_default_timezone_set('Asia/Jakarta');

$tanggal_mulai = $_GET['tanggal_mulai'] ?? date('Y-m-d', strtotime('-6 days'));
$tanggal_akhir = $_GET['tanggal_akhir'] ?? date('Y-m-d');

$judul_laporan = "Rekap Laporan Penjualan " . date('d M Y', strtotime($tanggal_mulai)) . " sampai " . date('d M Y', strtotime($tanggal_akhir));

$rekap_data = [];
$total_data = ['total_pendapatan' => 0, 'jumlah_pelanggan' => 0];

try {
    $query_rekap = "SELECT tanggal, SUM(jumlah) as total_harian FROM penjualan 
                    WHERE tanggal BETWEEN ? AND ? GROUP BY tanggal ORDER BY tanggal ASC";
    $stmt_rekap = mysqli_prepare($conn, $query_rekap);
    mysqli_stmt_bind_param($stmt_rekap, "ss", $tanggal_mulai, $tanggal_akhir);
    mysqli_stmt_execute($stmt_rekap);
    $hasil_rekap = mysqli_stmt_get_result($stmt_rekap);
    if ($hasil_rekap) {
        while ($row = mysqli_fetch_assoc($hasil_rekap)) {
            $rekap_data[] = $row;
        }
    }
    mysqli_stmt_close($stmt_rekap);

    $query_total = "SELECT SUM(jumlah) as total_pendapatan, COUNT(DISTINCT id_pelanggan) as jumlah_pelanggan 
                    FROM penjualan WHERE tanggal BETWEEN ? AND ?";
    $stmt_total = mysqli_prepare($conn, $query_total);
    mysqli_stmt_bind_param($stmt_total, "ss", $tanggal_mulai, $tanggal_akhir);
    mysqli_stmt_execute($stmt_total);
    $hasil_total = mysqli_stmt_get_result($stmt_total);
    if ($hasil_total) {
        $total_row = mysqli_fetch_assoc($hasil_total);
        $total_data['total_pendapatan'] = $total_row['total_pendapatan'] ?? 0;
        $total_data['jumlah_pelanggan'] = $total_row['jumlah_pelanggan'] ?? 0;
    }
    mysqli_stmt_close($stmt_total);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan Excel</title>
</head>
<body>
    
    <h2><?php echo htmlspecialchars($judul_laporan); ?></h2>

    <h3>Rekap Pendapatan Harian</h3>
    <table id="rekap-tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rekap_data)): ?>
                <?php foreach ($rekap_data as $index => $row): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars(date('d M Y', strtotime($row['tanggal']))); ?></td>
                        <td>RP <?php echo htmlspecialchars(number_format($row['total_harian'], 0, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>

    <h3>Total Keseluruhan</h3>
    <table id="total-tabel" style="max-width: 450px;">
        <tbody>
            <tr>
                <td style="font-weight: bold;">Jumlah Pelanggan</td>
                <td><?php echo htmlspecialchars($total_data['jumlah_pelanggan']); ?> Orang</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Jumlah Pendapatan</td>
                <td>RP <?php echo htmlspecialchars(number_format($total_data['total_pendapatan'], 0, ',', '.')); ?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>