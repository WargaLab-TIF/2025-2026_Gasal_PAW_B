<?php
require 'koneksi.php';

$tgl_mulai   = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

$query = "SELECT tanggal, SUM(total_harga) AS total_harga
          FROM penjualan
          WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'
          GROUP BY tanggal
          ORDER BY tanggal ASC";

$result = mysqli_query($conn, $query);

$qTotal = "SELECT COUNT(*) AS jml_pelanggan, SUM(total_harga) AS jml_pendapatan
            FROM penjualan
            WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'";

$rtotal = mysqli_query($conn, $qTotal);
$dataTotal = mysqli_fetch_assoc($rtotal);

echo "<h3>Laporan Penjualan ($tgl_mulai s/d $tgl_selesai)</h3>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
      </tr>";

$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$no++."</td>
            <td>".$row['total_harga']."</td>
            <td>".$row['tanggal']."</td>
          </tr>";
}

echo "</table><br><br>";

echo "<table border='1' cellpadding='10'>
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td>".$dataTotal['jml_pelanggan']."</td>
            <td>".$dataTotal['jml_pendapatan']."</td>
        </tr>
      </table>";
?>
