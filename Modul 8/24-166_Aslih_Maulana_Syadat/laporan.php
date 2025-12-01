<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}

// Data Chart
$q_chart = mysqli_query($conn, "SELECT DATE(waktu_transaksi) as tgl, SUM(total_keseluruhan) as total FROM nota GROUP BY tgl");
$labels = [];
$data_val = [];
while ($r = mysqli_fetch_array($q_chart)) {
    $labels[] = $r['tgl'];
    $data_val[] = $r['total'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Laporan Pendapatan</h2>
        <div style="margin-bottom:20px">
            <button onclick="window.print()" class="btn btn-blue">Print Laporan</button>
            <a href="excel.php" class="btn btn-green">Export Excel</a>
        </div>

        <div class="no-print" style="width:70%; margin:auto;"><canvas id="myChart"></canvas></div>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gt = 0;
                $q = mysqli_query($conn, "SELECT n.waktu_transaksi, b.nama_barang, i.qty, i.subtotal FROM item_nota i JOIN nota n ON i.id_nota=n.id_nota JOIN barang b ON i.id_barang=b.id ORDER BY n.waktu_transaksi DESC");
                while ($d = mysqli_fetch_array($q)) {
                    $gt += $d['subtotal'];
                ?>
                    <tr>
                        <td><?= date('Y-m-d', strtotime($d['waktu_transaksi'])) ?></td>
                        <td><?= $d['nama_barang'] ?></td>
                        <td><?= $d['qty'] ?></td>
                        <td>Rp <?= number_format($d['subtotal']) ?></td>
                    </tr>
                <?php } ?>
                <tr style="background:#ddd; font-weight:bold;">
                    <td colspan="3" align="center">TOTAL</td>
                    <td>Rp <?= number_format($gt) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        new Chart(document.getElementById('myChart'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Pendapatan',
                    data: <?= json_encode($data_val) ?>,
                    backgroundColor: 'dodgerblue'
                }]
            }
        });
    </script>
</body>

</html>