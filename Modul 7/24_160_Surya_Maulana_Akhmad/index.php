<?php
require_once "koneksi.php";

// Jika tidak memilih filter → tampilkan SEMUA DATA
$tgl1 = isset($_GET['tgl1']) && $_GET['tgl1'] !== "" ? $_GET['tgl1'] : '1900-01-01';
$tgl2 = isset($_GET['tgl2']) && $_GET['tgl2'] !== "" ? $_GET['tgl2'] : '2100-12-31';

// Query utama
$sql = "SELECT * FROM penjualan2 WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal ASC";
$result = mysqli_query($conn, $sql);

// Array untuk grafik
$total = [];
$tanggal = [];

while ($row = mysqli_fetch_assoc($result)) {
    $total[] = (int)$row['total'];
    $tanggal[] = $row['tanggal'];
}

// QUERY TOTAL (SQL)
$qTotal = mysqli_query($conn, "
    SELECT 
        COUNT(*) AS jumlah_pelanggan,
        SUM(total) AS total_pendapatan
    FROM penjualan2
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
");
$tot = mysqli_fetch_assoc($qTotal);

$jumlah_pelanggan = $tot['jumlah_pelanggan'];
$total_pendapatan = $tot['total_pendapatan'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        button {
            padding: 8px 12px;
            margin-top: 10px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <h2>Laporan Penjualan</h2>

    <!-- FILTER -->
    <form method="GET">
        Dari Tanggal:
        <input type="date" name="tgl1" value="<?= $tgl1 == '1900-01-01' ? '' : $tgl1 ?>">
        Sampai Tanggal:
        <input type="date" name="tgl2" value="<?= $tgl2 == '2100-12-31' ? '' : $tgl2 ?>">
        <button type="submit" class="no-print">Filter</button>
    </form>

    <br>

    <!-- GRAFIK -->
    <div style="width: 60%;">
        <canvas id="myChart"></canvas>
    </div>

    <!-- REKAP -->
    <h3>Rekap Data Penjualan</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

        <?php
        $res2 = mysqli_query($conn, $sql);
        $no = 1;

        while ($row = mysqli_fetch_assoc($res2)) {
            $tanggal_format = date("d M Y", strtotime($row['tanggal']));
            echo "<tr>
                <td>$no</td>
                <td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>
                <td>$tanggal_format</td>
              </tr>";
            $no++;
        }
        ?>
    </table>

    <!-- TOTAL -->
    <h3>Total Keseluruhan</h3>

    <p><b>Jumlah Pelanggan :</b> <?= $jumlah_pelanggan ?> orang</p>

    <p><b>Total Pendapatan :</b>
        <?php if ($total_pendapatan > 0) : ?>
            Rp <?= number_format($total_pendapatan, 0, ',', '.') ?>
        <?php endif; ?>
    </p>

    <!-- PRINT & EXCEL -->
    <button onclick="window.print()" class="no-print">Print</button>

    <a href="export_excel.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>">
        <button class="no-print">Export Excel</button>
    </a>

    <!-- CHART JS -->
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tanggal) ?>,
                datasets: [{
                    label: 'Total Penjualan',
                    data: <?= json_encode($total) ?>,
                    backgroundColor: 'rgba(100, 150, 240, 0.5)',
                    borderColor: 'rgba(100, 150, 240, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total (Rp)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>