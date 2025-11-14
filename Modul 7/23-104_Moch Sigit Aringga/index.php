<?php
require "konek.php";

$start = isset($_GET['start']) ? $_GET['start'] : '';
$end   = isset($_GET['end']) ? $_GET['end'] : '';

if ($start && $end) {
    $query = "SELECT tanggal, SUM(jumlah * harga) AS total
              FROM penjualan
              WHERE tanggal BETWEEN '$start' AND '$end'
              GROUP BY tanggal
              ORDER BY tanggal ASC";
} else {
    $query = "SELECT tanggal, SUM(jumlah * harga) AS total
              FROM penjualan
              GROUP BY tanggal
              ORDER BY tanggal ASC";
}

$hasil = mysqli_query($conn, $query);
$data = [];

while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

$labels = [];
$values = [];

foreach ($data as $row) {
    $labels[] = date("d M Y", strtotime($row['tanggal']));
    $values[] = (int)$row['total'];
}

if ($start && $end) {
    $query_info = "SELECT 
                    COUNT(*) AS pelanggan, 
                    SUM(jumlah * harga) AS pendapatan
                   FROM penjualan
                   WHERE tanggal BETWEEN '$start' AND '$end'";
} else {
    $query_info = "SELECT 
                    COUNT(*) AS pelanggan,
                    SUM(jumlah * harga) AS pendapatan
                   FROM penjualan";
}

$info = mysqli_fetch_assoc(mysqli_query($conn, $query_info));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
        }

        .container {
            max-width: 950px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #e6f2ff;
        }

        .btn {
            padding: 8px 20px;
            border: none;
            background: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-print {
            background: #ff9800;
        }

        .btn-excel {
            background: #2196F3;
        }

        .btn-area {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="GET" style="margin-bottom:20px; display:flex; gap:10px;">
            <input type="date" name="start" value="<?= $start ?>" required>
            <input type="date" name="end" value="<?= $end ?>" required>
            <button type="submit" class="btn">Tampilkan</button>
        </form>

        <div class="btn-area">
            <button class="btn btn-print" onclick="window.print()">Print</button>

            <a href="export_excel.php?start=<?= $start ?>&end=<?= $end ?>">
                <button type="button" class="btn btn-excel">Export Excel</button>
            </a>
        </div>

        <div style="width: 100%; height: 320px; margin: 20px auto;">
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            const labels = <?= json_encode($labels) ?>;
            const values = <?= json_encode($values) ?>;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Penjualan',
                        data: values,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

<table>
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php $no = 1;
            foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                    <td><?= date("d M Y", strtotime($row['tanggal'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><?= $info['pelanggan'] ?> Orang</td>
                <td>Rp. <?= number_format($info['pendapatan'], 0, ',', '.') ?></td>
            </tr>
        </table>
    </div>
</body>

</html>