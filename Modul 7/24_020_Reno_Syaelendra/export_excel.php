<?php
// Header untuk File Excel
$filename = "Laporan Penjualan " . $_GET['tgl_awal'] . " sd " . $_GET['tgl_akhir'] . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

include 'koneksi.php';
$tgl_awal = $_GET['tgl_awal'] ?? '2023-09-01';
$tgl_akhir = $_GET['tgl_akhir'] ?? '2023-09-27';

// 1. Kueri untuk REKAP
$query_harian = "SELECT * FROM laporan_harian 
                 WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' 
                 ORDER BY tanggal ASC";
$result_harian = mysqli_query($koneksi, $query_harian);

// 2. Kueri untuk TOTAL
$query_total = "SELECT 
                    SUM(total_pendapatan) AS total_kumulatif,
                    COUNT(id) AS jumlah_transaksi 
                FROM laporan_harian
                WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'";

$result_total = mysqli_query($koneksi, $query_total);
$data_total = mysqli_fetch_assoc($result_total);
$total_pendapatan = $data_total['total_kumulatif'] ?? 0;
$jumlah_pelanggan_atau_transaksi = $data_total['jumlah_transaksi'];
?>

<style>
    table { border-collapse: collapse; }
    th, td { border: 1px solid #333; padding: 5px; }
</style>

<h3>Rekap Laporan Penjualan (<?php echo $tgl_awal; ?> s/d <?php echo $tgl_akhir; ?>)</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result_harian) > 0) : ?>
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result_harian)) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['total_pendapatan']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Tidak ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<br>

<h3>Total</h3>
<table>
    <thead>
        <tr>
            <th>Jumlah Pelanggan/Transaksi</th>
            <th>Jumlah Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $jumlah_pelanggan_atau_transaksi; ?></td>
            <td><?php echo $total_pendapatan; ?></td>
        </tr>
    </tbody>
</table>