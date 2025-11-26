<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan.xls");
require 'koneksi.php';
$start = $_GET['start'] ?? NULL;
$end = $_GET['end'] ?? NULL;

$total_pelanggan = 0;
$total_pendapatan = 0;

$query = 'SELECT tanggal, SUM(total) AS total, COUNT(id) AS pelanggan FROM penjualan WHERE 1=1';
if ($start && $end) {
    $query .= " AND tanggal BETWEEN '$start' AND '$end'";

}
$query .= " GROUP BY tanggal ORDER BY tanggal ASC";

$hasil = mysqli_query($conn, $query);
$labels = [];
$total = [];
$data = [];

while ($row = mysqli_fetch_assoc($hasil)) {
    $labels[] = $row['tanggal'];
    $total[] = $row['total'];
    $data[] = $row;
    $total_pendapatan += $row['total'];
    $total_pelanggan += $row['pelanggan'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width:50%">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels); ?>,
                datasets: [{
                    label: '# of Votes',
                    data: <?= json_encode($total); ?>,
                    borderWidth: 1,
                    borderColor: 'black',
                    fill: true,
                    backgroundColor: [
                        'yellow',
                        'Purple',
                        'pink',
                        'red',
                        'green',
                        'orange',
                        'grey'
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah warna'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Warna'
                        }
                    }
                }
            }
        });
    </script>
    <h2>Rekap Laporan Penjualan <?= "$start sampai $end" ?></h2>
    <div>
        <table border="1">
            <tr>
                <td>No</td>
                <td>Total</td>
                <td>Tanggal</td>
            </tr>
            <?php
            $no = 1;
            foreach ($data as $dat): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $dat['total'] ?></td>
                    <td><?= $dat['tanggal'] ?></td>
                </tr>
                <?php
                $no++;
            endforeach; ?>
        </table>
    </div><br>
    <div>
        <table border="1">
            <tr>
                <td>Jumlah Pelanggan</td>
                <td>Jumlah Pendapatan</td>
            </tr>
            <tr>
                <td><?= $total_pelanggan ?> Orang</td>
                <td>Rp. <?= number_format($total_pendapatan, 0, ',', '.') ?> </td>
            </tr>
        </table>
    </div>
</body>

</html>