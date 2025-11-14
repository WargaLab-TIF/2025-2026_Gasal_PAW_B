<?php
require "konek.php";


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_penjualan.xls");

$start = $_GET['start'] ?? '';
$end   = $_GET['end'] ?? '';


if ($start && $end) {
    $query_rekap = "SELECT tanggal, SUM(jumlah * harga) AS total
                    FROM penjualan
                    WHERE tanggal BETWEEN '$start' AND '$end'
                    GROUP BY tanggal
                    ORDER BY tanggal ASC";

    $query_info = "SELECT COUNT(*) AS pelanggan,
                   SUM(jumlah * harga) AS pendapatan
                   FROM penjualan
                   WHERE tanggal BETWEEN '$start' AND '$end'";
} else {
    $query_rekap = "SELECT tanggal, SUM(jumlah * harga) AS total
                    FROM penjualan
                    GROUP BY tanggal
                    ORDER BY tanggal ASC";

    $query_info = "SELECT COUNT(*) AS pelanggan,
                   SUM(jumlah * harga) AS pendapatan
                   FROM penjualan";
}

$rekap = mysqli_query($conn, $query_rekap);
$info  = mysqli_fetch_assoc(mysqli_query($conn, $query_info));

echo "<h3>Rekap Penjualan</h3>";
echo "<table border='1'>
        <tr style='background:#d9e1f2; font-weight:bold;'>
            <th>No</th>
            <th>Total (Rp)</th>
            <th>Tanggal</th>
        </tr>";

$no = 1;
while ($row = mysqli_fetch_assoc($rekap)) {
    echo "<tr>
            <td>".$no++."</td>
            <td>".number_format($row['total'], 0, ',', '.')."</td>
            <td>".date("d M Y", strtotime($row['tanggal']))."</td>
        </tr>";
}

echo "</table>";

echo "<br><br>";


echo "<h3>Informasi Tambahan</h3>";
echo "<table border='1'>
        <tr style='background:#d9e1f2; font-weight:bold;'>
            <th>Jumlah Pelanggan</th>
            <th>Total Pendapatan</th>
        </tr>
        <tr>
            <td>{$info['pelanggan']} Orang</td>
            <td>Rp. ".number_format($info['pendapatan'], 0, ',', '.')."</td>
        </tr>
      </table>";
