<?php
include "koneksi.php";

// Ambil filter tanggal
$start = isset($_GET['start']) ? $_GET['start'] : "";
$end   = isset($_GET['end'])   ? $_GET['end']   : "";

// Jika tanggal belum dipilih
if ($start == "" || $end == "") {
    die("Silakan pilih tanggal terlebih dahulu melalui halaman laporan.");
}

// Set header untuk Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query Rekap
$rekap = mysqli_query($conn, "SELECT * FROM penjualan
                              WHERE tanggal BETWEEN '$start' AND '$end'
                              ORDER BY tanggal");

// Query Total
$q_total = mysqli_query($conn, "SELECT 
                                COUNT(id) AS jumlah_transaksi,
                                SUM(jumlah) AS total_barang
                                FROM penjualan
                                WHERE tanggal BETWEEN '$start' AND '$end'");
$tot = mysqli_fetch_assoc($q_total);
?>

<!-- Judul -->
<h2 style="text-align:center;">Laporan Transaksi</h2>
<p><b>Periode:</b> <?= date("d M Y", strtotime($start)); ?> - <?= date("d M Y", strtotime($end)); ?></p>

<br>

<!-- TABEL 2: REKAP -->
<h3>Rekap Transaksi</h3>
<table border="1" cellpadding="5">
    <tr style="background:#d9edf7;">
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1;
    while($r = mysqli_fetch_assoc($rekap)): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td>RP. <?= number_format($r['jumlah'], 0, ',', '.'); ?></td>
        <td><?= date("d M Y", strtotime($r['tanggal'])); ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br><br>

<!-- TABEL 3: TOTAL -->
<h3>Total</h3>
<table border="1" cellpadding="8">
    <tr style="background:#d9edf7;">
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= $tot['jumlah_transaksi']; ?> Orang</td>
        <td>RP. <?= number_format($tot['total_barang'], 0, ',', '.'); ?></td>
    </tr>
</table>
