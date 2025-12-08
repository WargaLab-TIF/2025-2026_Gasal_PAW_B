<?php
require 'koneksi.php';

// Menerima parameter tanggal awal & tanggal akhir dari URL (GET)
$awal  = $_GET['awal'];
$akhir = $_GET['akhir'];

// Query untuk mengambil transaksi sesuai rentang tanggal
$q = mysqli_query($conn, "
    SELECT * FROM transaksi
    WHERE tanggal BETWEEN '$awal' AND '$akhir'
    ORDER BY tanggal ASC
");

// Menampung data transaksi dan menghitung total pendapatan
$data = [];
$totalPendapatan = 0;

while ($row = mysqli_fetch_assoc($q)) {
    $data[] = $row;
    $totalPendapatan += $row['total'];
}

// Menghitung jumlah pelanggan (jumlah baris data)
$jumlahPelanggan = count($data);

// Mengatur header supaya browser otomatis mendownload file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border='1'>";

// Judul laporan
echo "
<tr><td colspan='3' style='font-size:18px;font-weight:bold;'>Rekap Laporan Penjualan</td></tr>
<tr><td colspan='3'>$awal sampai $akhir</td></tr>
<tr><td colspan='3'></td></tr>
";

echo "
<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>
";

$no = 1;

// Menampilkan seluruh data transaksi dalam tabel
foreach ($data as $d) {
    echo "
    <tr>
        <td>$no</td>
        <td>RP. ".number_format($d['total'],0,',','.')."</td>
        <td>".date('d M Y', strtotime($d['tanggal']))."</td>
    </tr>";
    $no++;
}

// Baris total pelanggan & total pendapatan
echo "
<tr><td colspan='3'></td></tr>
<tr>
    <td><b>Jumlah Pelanggan</b></td>
    <td><b>Jumlah Pendapatan</b></td>
    <td></td>
</tr>
<tr>
    <td>".$jumlahPelanggan." Orang</td>
    <td>RP. ".number_format($totalPendapatan,0,',','.')."</td>
    <td></td>
</tr>
";

echo "</table>";
?>