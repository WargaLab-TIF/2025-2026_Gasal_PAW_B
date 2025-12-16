<?php 
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .btn-biru {
            background: linear-gradient(to bottom, #0c66b0, #084b84);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-biru:hover {
            background: linear-gradient(to bottom, #0a5a9b, #073f6e);
        }

        .btn-oranye {
            background: linear-gradient(to bottom, #ff8a2a, #d46d1f);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-oranye:hover {
            background: linear-gradient(to bottom, #e97a25, #bf611a);
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            border-color: lightgray;
        }

        th {
            background-color: skyblue;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>

    <button class="btn-biru" type="button" onclick="window.location.href='form.php'">❮❮ Kembali</button><br><br>
    <button class="btn-oranye" type="button" onclick="window.print()">⎙ Cetak</button>
    <button class="btn-oranye" type="button" onclick="window.location.href='excel.php?tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>'">⎙ Excel</button>

    <div >
        <canvas id="myChart" width="400" height="100"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: <?= json_encode($tanggal) ?>,
            datasets: [{
                label: 'Total',
                data: <?= json_encode($total_harian) ?>,
                borderWidth: 1,
                borderColor: 'black'
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>

    <?php if(!empty($data)):?>
        <table border="1">
            <?php
                $no = 1;
            ?>
            <tr>
                <th style="width: 200px;">No.</th>
                <th style="width: 250px;">Total</th>
                <th style="width: 300px;">Tanggal</th>
            </tr>
            <?php foreach($data as $d):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>Rp <?= number_format($d['total_harian'], 0, ',', '.') ?></td>
                    <td><?= $d['tanggal_penjualan'] ?></td>
                </tr>
            <?php endforeach?>
        </table>
        <table border="1" style="color: cornflowerblue; margin: 10px;">
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><?= $total_pelanggan_keseluruhan ?> Orang</td>
                <td>Rp <?= number_format($total_penjualan_keseluruhan, 0, ',', '.') ?></td>
            </tr>
        </table>
    <?php endif ?>
</body>
</html>