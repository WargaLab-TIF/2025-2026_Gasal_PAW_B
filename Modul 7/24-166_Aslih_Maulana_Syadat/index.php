<?php 
    require 'koneksi.php';

    $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01');
    $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

    $query_tabel = "SELECT * FROM penjualan WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal ASC";
    $hasil_tabel = mysqli_query($conn, $query_tabel);

    $data_penjualan = [];
    $total_pendapatan = 0;
    
    while ($row = mysqli_fetch_assoc($hasil_tabel)) {
        $data_penjualan[] = $row;
        $total_pendapatan += $row['total'];
    }
    $jumlah_pelanggan = count($data_penjualan);

    $query_grafik = "SELECT tanggal, SUM(total) as total_harian FROM penjualan 
                     WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' 
                     GROUP BY tanggal ORDER BY tanggal ASC";
    $hasil_grafik = mysqli_query($conn, $query_grafik);

    $labels_tanggal = [];
    $data_total = [];

    while ($row_g = mysqli_fetch_assoc($hasil_grafik)) {
        $labels_tanggal[] = date('d M Y', strtotime($row_g['tanggal']));
        $data_total[] = $row_g['total_harian'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h2>Rekap Laporan Penjualan</h2>
    
    <div class="filter-box no-print">
        <form method="GET" action="">
            <label>Dari:</label> <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>">
            <label>Sampai:</label> <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>">
            <button type="submit" class="btn btn-green">Tampilkan</button>
        </form>
    </div>

    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" class="btn btn-blue">Cetak Print</button>
        <button onclick="window.location.href='excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>'" class="btn btn-orange">Export Excel</button>
    </div>
    </div>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Total (Rp)</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($data_penjualan as $dat): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>Rp <?= number_format($dat['total'], 0, ',', '.'); ?></td>
                    <td><?= date('d M Y', strtotime($dat['tanggal'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="tabel-bawah">
            <table>
                <tr>
                    <th><strong>Jumlah Pelanggan</strong><br></th>
                    <th><strong>Jumlah Pendapatan</strong><br></th>
                </tr>
                <tr>
                    <td><?= $jumlah_pelanggan; ?> Orang</td>
                    <td>Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels_tanggal); ?>,
                datasets: [{
                    label: 'Total Pendapatan (Rp)',
                    data: <?= json_encode($data_total); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, title: { display: true, text: 'Total (Rp)' } },
                    x: { title: { display: true, text: 'Tanggal' } }
                }
            }
        });
    </script>
</body>
</html>