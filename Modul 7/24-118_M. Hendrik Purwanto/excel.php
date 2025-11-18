<?php
include 'koneksi.php';

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01');
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_$tgl_awal-$tgl_akhir.xls");

$query = "SELECT * FROM transaksi 
          WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' 
          ORDER BY tgl_transaksi ASC";
$result = mysqli_query($koneksi, $query);

$total_pendapatan = 0;
$total_pelanggan = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Data</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .header { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>

    <div class="header">
        Rekap Laporan Penjualan <br>
        <small><?= $tgl_awal ?> sampai <?= $tgl_akhir ?></small>
    </div>

    <br>

    <table>
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $total_pendapatan += $row['total_bayar'];
                $total_pelanggan++;
                $tgl_indo = date('d-M-y', strtotime($row['tgl_transaksi']));
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>RP. <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                <td><?= $tgl_indo ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>

    <table>
        <tr>
            <td style="border:none; font-weight:bold;">Jumlah Pelanggan</td>
            <td style="border:none;"></td>
            <td style="border:none; font-weight:bold;">Jumlah Pendapatan</td>
        </tr>
        <tr>
            <td style="border:none; font-size:16px;"><?= $total_pelanggan ?> Orang</td>
            <td style="border:none;"></td>
            <td style="border:none; font-size:16px;">RP. <?= number_format($total_pendapatan, 0, ',', '.') ?></td>
        </tr>
    </table>

</body>
</html>