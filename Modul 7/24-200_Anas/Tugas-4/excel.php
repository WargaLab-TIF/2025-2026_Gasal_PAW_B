<?php 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="data_laporan.xls"');
require 'koneksi.php';

$labels = []; 
$data_values = []; 
$data=[];
$result = null;
$total_penjualan = 0;
$total_pelanggan = 0;
$tanggalawal = '';
$tanggalakhir = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $tanggalawal = $_POST['tanggalawal'];
    $tanggalakhir = $_POST['tanggalakhir'];
    $sql_query = "SELECT Total, Tanggal FROM penjualan_harian 
    WHERE Tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'";

    $result = mysqli_query($conn, $sql_query);
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $labels[] = date('d M', strtotime($row['Tanggal']));
          $data_values[] = (int)$row['Total'];
          $data[] = $row;
        }
      }
}

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
$header_tgl_awal = tanggal_indo($tanggalawal);
$header_tgl_akhir = tanggal_indo($tanggalakhir);
?>

<h1>Rekap laporan Penjualan</h1>
<h3><?= $tanggalawal ?> sampai <?= $tanggalakhir ?></h3><br>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php
        if ($data) {
            $nomor = 1; 
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $nomor++ . "</td>"; 
                echo "<td>RP." . htmlspecialchars($row['Total']) . "</td>";
                echo "<td>" . tanggal_indo(htmlspecialchars($row['Tanggal'])) . "</td>";
                echo "</tr>";
                $total_penjualan += $row['Total'];
            }
            $total_pelanggan += $nomor-1;
        }
    ?>
</table>

<br>
<br>

<table border="1">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= number_format($total_pelanggan) ?> Orang</td>
        <td>RP.<?= number_format($total_penjualan) ?></td>
    </tr>
</table>