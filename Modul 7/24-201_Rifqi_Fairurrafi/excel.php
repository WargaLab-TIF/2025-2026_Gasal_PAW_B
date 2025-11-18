<?php 
header("Content-Type: application/vnd.mc-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=reporting.xls");

require 'koneksi.php';

$tanggal = [];
$total_harian = [];
$data = [];

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])){
    $tanggal_awal = $_GET['tanggal_awal'];
    $tanggal_akhir = $_GET['tanggal_akhir'];

    $query = "SELECT  tanggal_penjualan ,SUM(total_penjualan) AS total_harian FROM datapenjualan WHERE tanggal_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY tanggal_penjualan ORDER BY tanggal_penjualan ASC";
    $hasil = mysqli_query($conn, $query);

    $query_total = "SELECT SUM(total_penjualan) AS total_penjualan_keseluruhan, COUNT(*) AS total_pelanggan_keseluruhan FROM datapenjualan WHERE tanggal_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";

    $hasil_total = mysqli_query($conn, $query_total);
    $total = mysqli_fetch_assoc($hasil_total);

    $total_penjualan_keseluruhan = $total['total_penjualan_keseluruhan'];
    $total_pelanggan_keseluruhan = $total['total_pelanggan_keseluruhan'];

    while($row = mysqli_fetch_assoc($hasil)){
        $tanggal[] = $row['tanggal_penjualan'];
        $total_harian[] = $row['total_harian'];
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Excel</title>
    <style>

        hr {
            margin-bottom: 50px;
            border:2px black solid;
        }

        th {
            text-align: center;
            width: 150px;
        }
    </style>
</head>
<body>
    <?php if(!empty($data)):?>
        <h2>Rekap Laporan Penjualan</h2>
        <p><?= $tanggal_awal . "sampai" . $tanggal_akhir ?></p>
        <hr>
        <table>
            <?php
                $no = 1;
            ?>
            <tr>
                <th>No.</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach($data as $d):?>
                <tr>
                    <td style="text-align: end;"><?= $no++; ?></td>
                    <td>Rp <?= number_format($d['total_harian'], 0, ',', '.') ?></td>
                    <td style="text-align: center;"><?= $d['tanggal_penjualan'] ?></td>
                </tr>
            <?php endforeach?>
        </table>

        <table style="margin-top: 20px;">
            <tr>
                <th style="padding-bottom: 50px;">Jumlah Pelanggan</th>
                <th style="padding-bottom: 50px;">Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><b><?= $total_pelanggan_keseluruhan ?> Orang</b></td>
                <td><b>Rp <?= number_format($total_penjualan_keseluruhan, 0, ',', '.') ?></b></td>
            </tr>
        </table>
    <?php endif ?>
</body>
</html>