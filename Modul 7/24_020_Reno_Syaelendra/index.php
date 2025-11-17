<?php
include 'koneksi.php';

// Ambil tanggal dari filter, atau set default
$tgl_awal = $_GET['tgl_awal'] ?? '2023-09-01';
$tgl_akhir = $_GET['tgl_akhir'] ?? '2023-09-27';

// 1. Kueri untuk REKAP dan GRAFIK (Data Harian)
$query_harian = "SELECT * FROM laporan_harian 
                 WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' 
                 ORDER BY tanggal ASC";
$result_harian = mysqli_query($koneksi, $query_harian);

// Siapkan data untuk Chart.js (Grafik)
$labels_grafik = [];
$data_grafik = [];
while ($row = mysqli_fetch_assoc($result_harian)) {
    $labels_grafik[] = date('d M Y', strtotime($row['tanggal']));
    $data_grafik[] = $row['total_pendapatan'];
}
// Kembalikan pointer data untuk dipakai di tabel rekap
mysqli_data_seek($result_harian, 0);


// 2. Kueri untuk TOTAL (Data Kumulatif)
$query_total = "SELECT 
                    SUM(total_pendapatan) AS total_kumulatif,
                    COUNT(id) AS jumlah_transaksi 
                FROM laporan_harian
                WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'";

$result_total = mysqli_query($koneksi, $query_total);
$data_total = mysqli_fetch_assoc($result_total);

// Rekap total pendapatan dan jumlah transaksi
$total_pendapatan = $data_total['total_kumulatif'] ?? 0;
$jumlah_pelanggan_atau_transaksi = $data_total['jumlah_transaksi'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Modul 7 - Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Laporan Penjualan</h1>

    <form action="" method="GET" class="no-print">
        <label for="tgl_awal">Dari Tanggal:</label>
        <input type="date" id="tgl_awal" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
        
        <label for="tgl_akhir">Sampai Tanggal:</label>
        <input type="date" id="tgl_akhir" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">
        
        <button type="submit">Tampilkan</button>
    </form>

    <div class="aksi no-print">
        <button onclick="window.print()">Cetak</button>
        <a href="export_excel.php?tgl_awal=<?php echo $tgl_awal; ?>&tgl_akhir=<?php echo $tgl_akhir; ?>" target="_blank">
            <button>Excel</button>
        </a>
    </div>

    <div class="area-laporan">
        
        <div class="bagian">
            <h2>Grafik Pendapatan</h2>
            <canvas id="myChart"></canvas>
        </div>

        <div class="bagian">
            <h2>Rekap</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result_harian) > 0) : ?>
                        <?php $no = 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($result_harian)) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>RP. <?php echo number_format($row['total_pendapatan'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3">Tidak ada data pada rentang tanggal ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="bagian">
            <h2>Total</h2>
            <div class="total-box">
                <div>
                    <h4>Jumlah Pelanggan/Transaksi</h4>
                    <p><?php echo $jumlah_pelanggan_atau_transaksi; ?> Transaksi</p>
                </div>
                <div>
                    <h4>Jumlah Pendapatan</h4>
                    <p>RP. <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></p>
                </div>
            </div>
        </div>

    </div><script>
        const ctx = document.getElementById('myChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                // Mengambil data label dari PHP
                labels: <?php echo json_encode($labels_grafik); ?>,
                datasets: [{
                    label: 'Total Pendapatan',
                    // Mengambil data pendapatan dari PHP
                    data: <?php echo json_encode($data_grafik); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
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
</body>
</html>