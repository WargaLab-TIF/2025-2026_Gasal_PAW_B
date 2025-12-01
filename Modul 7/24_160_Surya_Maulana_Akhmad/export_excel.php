<?php
require_once "koneksi.php";

// Ambil filter tanggal dari URL
$tgl1 = isset($_GET['tgl1']) ? $_GET['tgl1'] : '1900-01-01';
$tgl2 = isset($_GET['tgl2']) ? $_GET['tgl2'] : '2100-12-31';

// Header untuk Excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

// Judul laporan
echo "<h3>Laporan Penjualan ($tgl1 s/d $tgl2)</h3>";

echo "<hr>";

// ======================
// TABEL DATA DETAIL
// ======================
echo "
<table>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total</th>
    </tr>
";

$sql = "SELECT * FROM penjualan2 
        WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
        ORDER BY tanggal ASC";

$result = mysqli_query($conn, $sql);
$no = 1;
$total_keseluruhan = 0;
$jumlah_pelanggan = 0;

while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
        <td>$no</td>
        <td>{$row['tanggal']}</td>
        <td>{$row['total']}</td>
    </tr>
    ";

    $total_keseluruhan += $row['total'];
    $jumlah_pelanggan++;
    $no++;
}

echo "</table><br>";
$total_keseluruhan = number_format($total_keseluruhan, 0, ',', '.');

// ======================
// TOTAL (REKAP)
// ======================
echo "
<h3>Rekap Total</h3>
<table>
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td>$jumlah_pelanggan</td>
        <td>Rp. $total_keseluruhan</td>
    </tr>
</table>
";
