<?php 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan_Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .hidden { display: none; }
        .container { max-width: 1200px; }
        .filter-container { margin-top: 20px; }
        .chart-container { margin-bottom: 20px; }
        .card-header-custom {
            background-color: #007bff;
            color: white;
        }
        .custom-button {
            background-color: #ffc107;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            font-size: 16px;
        }
        .custom-button i {
            margin-right: 8px;
        }
        .custom-button:hover {
            background-color: #e0a800;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>

</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header card-header-custom">
                Rekap Laporan Penjualan
            </div>
            <div class="card-body">

                <?php
                $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                ?>

                <form method="GET" action="report_transaksi.php" 
                      class="mb-3 filter-container <?php echo ($start_date && $end_date) ? 'hidden' : ''; ?>" 
                      id="filterForm">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success" onclick="hideFilter()">Tampilkan</button>
                        </div>
                    </div>
                </form>

                <div id="reportContent" class="<?php echo ($start_date && $end_date) ? '' : 'hidden'; ?>">
                    
                    <?php if ($start_date && $end_date): ?>
                        <div class="mb-3">
                            <button class="custom-button mr-2 no-print" onclick="printExcel()">
                                <i class="fas fa-file-excel"></i> Excel
                            </button>
                            <button class="custom-button no-print" onclick="window.print()">
                                <i class="fas fa-print"></i> Cetak
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Ambil data dari tabel penjualan
                    $penjualan = [];
                    if ($start_date && $end_date) {
                        $query = "
                            SELECT tanggal, total_harga 
                            FROM penjualan
                            WHERE tanggal BETWEEN '$start_date' AND '$end_date'
                            ORDER BY tanggal
                        ";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $penjualan[] = $row;
                        }
                    }

                    // Data untuk grafik
                    $labels = [];
                    $data = [];
                    $total_pendapatan = 0;
                    $jumlah_transaksi = count($penjualan);

                    foreach ($penjualan as $row) {
                        $labels[] = $row['tanggal'];
                        $data[] = $row['total_harga'];
                        $total_pendapatan += $row['total_harga'];
                    }
                    ?>

                    <div class="chart-container">
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>

                    <table class="table mt-4" border="1">
                        <thead>
                            <tr style="background-color: rgb(152, 205, 238);">
                                <th>No</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penjualan as $index => $row): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>Rp<?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table" border="1">
                                <tr style="background-color: rgb(152, 205, 238);">
                                    <th>Jumlah Transaksi</th>
                                    <th>Total Pendapatan</th>
                                </tr>
                                <tr>
                                    <td><?= $jumlah_transaksi ?> Transaksi</td>
                                    <td>Rp<?= number_format($total_pendapatan, 0, ',', '.') ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <script>
                        function hideFilter() {
                            document.getElementById('filterForm').classList.add('hidden');
                            document.getElementById('reportContent').classList.remove('hidden');
                        }

                        const ctx = document.getElementById('salesChart').getContext('2d');
                        const salesChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?= json_encode($labels); ?>,
                                datasets: [{
                                    label: 'Total Harga',
                                    data: <?= json_encode($data); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            callback: value => 'Rp' + value.toLocaleString()
                                        }
                                    }
                                }
                            }
                        });

                        function printExcel() {
                            window.location.href = 'cetak_excel.php?start_date=<?= $start_date; ?>&end_date=<?= $end_date; ?>';
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
