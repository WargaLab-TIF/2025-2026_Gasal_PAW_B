<?php
include 'koneksi.php';
$rows = [];
$total = [];
$tanggal = [];

$dari_tanggal = isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '';
$sampai_tanggal = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';

if ($dari_tanggal && $sampai_tanggal) {
    $query = "SELECT id, total, tanggal FROM transaksi WHERE tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
    $hasil = mysqli_query($conn, $query);
} else {
    $hasil = mysqli_query($conn, "SELECT id, total, tanggal FROM transaksi");
}

if ($hasil) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
        $tanggal[] = $row['tanggal']; 
        $total[] = $row['total'];  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .table-header-blue th {
            background-color: #d9edf7 !important; 
            text-align: left;
        }
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="p-4">
    
    <div class="card mb-4 no-print bg-light">
        <div class="card-body p-2">
            <form action="tampil.php" method="GET" class="d-flex align-items-center gap-2">
                <input type="date" name="dari_tanggal" class="form-control w-auto" value="<?= htmlspecialchars($dari_tanggal) ?>">
                <input type="date" name="sampai_tanggal" class="form-control w-auto" value="<?= htmlspecialchars($sampai_tanggal) ?>">
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </form>
        </div>
    </div>
    <h5 class="mb-3">Rekap Laporan Penjualan <?= $dari_tanggal && $sampai_tanggal ? "$dari_tanggal sampai $sampai_tanggal" : '' ?></h5>
    <div class="mb-3 no-print">
        <button onclick="window.print()" class="btn btn-warning text-white btn-sm"><i class="fa fa-print"></i> Cetak</button>
        <a href="excel.php?dari_tanggal=<?= $dari_tanggal ?>&sampai_tanggal=<?= $sampai_tanggal ?>" class="btn btn-warning text-white btn-sm"><i class="fa fa-file-excel"></i> Excel</a>
    </div>

    <div class="mb-4">
        <canvas id="myChart" style="max-height: 300px;"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tanggal) ?>, 
                datasets: [{
                    label: 'Total',
                    data: <?= json_encode($total) ?>,
                    borderWidth: 1,
                    backgroundColor: '#e0e0e0',
                    hoverBackgroundColor: '#3498db'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
    
    <table class="table table-bordered table-sm">
        <thead class="table-header-blue">
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (count($rows) > 0) {
                foreach ($rows as $row) {
                    
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . "Rp. " . number_format($row['total'], 0, ',', '.') . "</td>";
                    echo "<td>" . date('d M Y', strtotime($row['tanggal'])) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-sm w-50 mt-3 table-header-blue">
        <thead>
            <tr class="table-header-blue">
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= count($rows) ?> Orang</td>
                <td><?= "Rp. " . number_format(array_sum($total ?: [0]), 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>

    
</body>
</html>