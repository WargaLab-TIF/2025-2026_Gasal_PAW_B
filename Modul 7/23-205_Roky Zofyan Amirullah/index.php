<?php
require 'koneksi.php'; // Pastikan nama variabel koneksi di file ini adalah $conn

date_default_timezone_set('Asia/Jakarta');

// Default tanggal diset sesuai data di database Anda
$tanggal_mulai = $_GET['tanggal_mulai'] ?? '2025-01-01';
$tanggal_akhir = $_GET['tanggal_akhir'] ?? '2025-01-07';

$judul_laporan = "Rekap Laporan Penjualan " . date('d M Y', strtotime($tanggal_mulai)) . " sampai " . date('d M Y', strtotime($tanggal_akhir));

$rekap_data = [];
$total_data = ['total_pendapatan' => 0, 'jumlah_pelanggan' => 0];
$chart_labels = [];
$chart_values = [];

try {
    $query_rekap = "SELECT 
                        tanggal, 
                        SUM(jumlah) as total_harian
                    FROM 
                        penjualan 
                    WHERE 
                        tanggal BETWEEN ? AND ?
                    GROUP BY 
                        tanggal 
                    ORDER BY 
                        tanggal ASC";

    $stmt_rekap = mysqli_prepare($conn, $query_rekap);
    mysqli_stmt_bind_param($stmt_rekap, "ss", $tanggal_mulai, $tanggal_akhir);
    mysqli_stmt_execute($stmt_rekap);
    $hasil_rekap = mysqli_stmt_get_result($stmt_rekap);

    if ($hasil_rekap) {
        while ($row = mysqli_fetch_assoc($hasil_rekap)) {
            $rekap_data[] = $row; 
            $chart_labels[] = date('d M Y', strtotime($row['tanggal']));
            $chart_values[] = $row['total_harian'];
        }
    }
    mysqli_stmt_close($stmt_rekap);

    $query_total = "SELECT 
                        SUM(jumlah) as total_pendapatan, 
                        COUNT(DISTINCT id_pelanggan) as jumlah_pelanggan 
                    FROM 
                        penjualan 
                    WHERE 
                        tanggal BETWEEN ? AND ?";
                        
    $stmt_total = mysqli_prepare($conn, $query_total);
    mysqli_stmt_bind_param($stmt_total, "ss", $tanggal_mulai, $tanggal_akhir);
    mysqli_stmt_execute($stmt_total);
    $hasil_total = mysqli_stmt_get_result($stmt_total);
    
    if ($hasil_total) {
        $total_row = mysqli_fetch_assoc($hasil_total);
        $total_data['total_pendapatan'] = $total_row['total_pendapatan'] ?? 0;
        $total_data['jumlah_pelanggan'] = $total_row['jumlah_pelanggan'] ?? 0;
    }
    mysqli_stmt_close($stmt_total);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 20px 30px;
        }
        h1, h2, h3 {
            color: #333;
            margin-bottom: 15px;
        }
        h1 {
            font-size: 24px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        h2 {
            font-size: 20px;
            text-align: center;
            margin-top: 25px;
        }
        h3 {
            font-size: 18px;
            margin-top: 25px;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 8px;
        }

        /* Filter */
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: flex-end;
            margin-bottom: 20px;
        }
        .filter-form div {
            display: flex;
            flex-direction: column;
        }
        .filter-form label {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 5px;
            color: #555;
        }
        .filter-form input[type="date"] {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Tombol */
        .btn, button {
            padding: 9px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .action-buttons .btn-gray { background-color: #6c757d; color: white; }
        .action-buttons .btn-blue { background-color: #007bff; color: white; }
        .action-buttons .btn-green { background-color: #198754; color: white; }
        .action-buttons .btn-gray:hover { background-color: #5a6268; }
        .action-buttons .btn-blue:hover { background-color: #0069d9; }
        .action-buttons .btn-green:hover { background-color: #157347; }

        /* Chart */
        .chart-container {
            width: 100%;
            height: 350px;
            margin-top: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 12px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        /* Tabel Total */
        .total-table {
            max-width: 450px;
        }
        .total-table td:first-child {
            font-weight: 600;
            width: 50%;
        }

        /* CSS untuk Cetak (Sesuai PPT) */
        @media print {
            body {
                padding: 0;
                background-color: #fff;
            }
            .no-print {
                display: none;
            }
            .container {
                box-shadow: none;
                border: none;
                width: 100%;
                max-width: 100%;
                padding: 0;
            }
            .chart-container {
                page-break-inside: avoid;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
            }
        }
    </style>
    </head>
<body>

    <div class="container">

        <div class="no-print">
            <h1>Filter Laporan Penjualan</h1>
            <form action="index.php" method="GET" class="filter-form">
                <div>
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="<?php echo htmlspecialchars($tanggal_mulai); ?>">
                </div>
                <div>
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="<?php echo htmlspecialchars($tanggal_akhir); ?>">
                </div>
                <button type="submit">Tampilkan</button>
            </form>
        </div>

        <div class="action-buttons no-print">
            <button onclick="history.back()" class="btn btn-gray">&lt; Kembali</button>
            <button onclick="window.print()" class="btn btn-blue">Cetak</button>
            <a href="excel.php?tanggal_mulai=<?php echo $tanggal_mulai; ?>&tanggal_akhir=<?php echo $tanggal_akhir; ?>" class="btn btn-green" style="color: white;">Excel</a>
        </div>

        <div id="laporan-cetak">
            <h2><?php echo htmlspecialchars($judul_laporan); ?></h2>

            <h3>Grafik Pendapatan Harian</h3>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>

            <h3>Rekap Pendapatan Harian</h3>
            <table id="rekap-tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($rekap_data)): ?>
                        <?php foreach ($rekap_data as $index => $row): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars(date('d M Y', strtotime($row['tanggal']))); ?></td>
                                <td>RP <?php echo htmlspecialchars(number_format($row['total_harian'], 0, ',', '.')); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Tidak ada data untuk rentang tanggal ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <h3>Total Keseluruhan</h3>
            <table id="total-tabel" class="total-table">
                <tbody>
                    <tr>
                        <td>Jumlah Pelanggan</td>
                        <td><?php echo htmlspecialchars($total_data['jumlah_pelanggan']); ?> Orang</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pendapatan</td>
                        <td>RP <?php echo htmlspecialchars(number_format($total_data['total_pendapatan'], 0, ',', '.')); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        const labels = <?php echo json_encode($chart_labels); ?>;
        const data = <?php echo json_encode($chart_values); ?>;
        
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Pendapatan',
                    data: data,
                    backgroundColor: 'rgba(41, 128, 185, 0.2)',
                    borderColor: 'rgba(41, 128, 185, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true, position: 'top' },
                    title: { display: false } 
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Total (Rp)' }
                    },
                    x: {
                        title: { display: true, text: 'Tanggal' }
                    }
                }
            }
        });
    </script>

</body>
</html>