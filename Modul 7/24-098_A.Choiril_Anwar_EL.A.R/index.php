<?php
include "koneksi.php";
$awal   = $_POST['awal'] ?? null;
$akhir  = $_POST['akhir'] ?? null;

if (isset($_POST['filter']) && $awal != "" && $akhir != "") {
    $where = "WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'";
} else {
    $where = "";
}

$query = mysqli_query($conn, "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
    FROM transaksi $where GROUP BY DATE(waktu_transaksi) ORDER BY tanggal ASC");

$label = [];
$data  = [];
$total_pendapatan = 0;
$total_transaksi  = 0;

while ($row = mysqli_fetch_assoc($query)) {
    $label[] = $row['tanggal'];
    $data[]  = $row['total_harian'];
    $total_pendapatan += $row['total_harian'];
    $total_transaksi++;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="stl.css">
</head>
<body>
    <h2>Laporan Penjualan</h2>
    <form method="POST">
        awal tanggal: <input type="date" name="awal">
        akhir tanggal: <input type="date" name="akhir">
        <button type="submit" name="filter">Filter</button>
    </form>
    <hr>
    <button onclick="window.print()">Print</button>
    <a href="export_excel.php?awal=<?= $awal ?>&akhir=<?= $akhir ?>" style="padding:6px; background:orange; color:white; text-decoration:none;">Export Excel</a>
    <h3>Grafik</h3>
    <canvas id="myChart" style="width:850px; height:550px;"></canvas>
    <script>
        new Chart(document.getElementById("myChart"), {
            type: "bar",
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: "Total Penjualan Harian",
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive : false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <h3>Rekap</h3>
    <table border="1" width="60%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Penjualan</th>
        </tr>
        <?php
        $no = 1;
        $query2 = mysqli_query($conn, " SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian FROM transaksi
        $where GROUP BY DATE(waktu_transaksi) ORDER BY tanggal ASC ");
        while ($row = mysqli_fetch_assoc($query2)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>Rp <?= number_format($row['total_harian'], 0, ',', '.') ?></td>
            </tr>
        <?php } ?>
    </table>

    <h3>Total</h3>
    <p><b>Jumlah Hari dengan Penjualan:</b> <?= $total_transaksi ?> hari</p>
    <p><b>Total Pendapatan:</b> Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></p>

</body>

</html>