<?php
include "koneksi.php";

// Mengecek apakah user sudah memasukkan filter tanggal
$filter_aktif = isset($_GET['start']) && isset($_GET['end']);

// Jika filter aktif → ambil tanggalnya
$start = $filter_aktif ? $_GET['start'] : "";
$end   = $filter_aktif ? $_GET['end']   : "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Filter Laporan Berdasarkan Tanggal</h2>

<form method="GET" style="margin-bottom:20px;">
    <input type="date" name="start" value="<?= $start; ?>" 
           style="padding:10px; border:1px solid #ccc; border-radius:5px;">

    <input type="date" name="end" value="<?= $end; ?>" 
           style="padding:10px; border:1px solid #ccc; border-radius:5px; margin-left:5px;">

    <button type="submit" 
        style="padding:10px 20px; background:#4CAF50; border:none; color:white; border-radius:5px; margin-left:5px;">
        Tampilkan
    </button>
</form>

<?php 
// Jika user belum memilih tanggal → hanya tampilkan form saja
if(!$filter_aktif): ?>
    <h3 style="color:gray;">Silakan pilih rentang tanggal terlebih dahulu untuk menampilkan laporan.</h3>
</body>
</html>
<?php 
exit; 
endif; 
?>

<?php
// Query Grafik berdasarkan filter tanggal
$q_grafik = mysqli_query($conn, "SELECT tanggal, SUM(jumlah) AS total 
                                FROM penjualan
                                WHERE tanggal BETWEEN '$start' AND '$end'
                                GROUP BY tanggal
                                ORDER BY tanggal");

$tanggal = [];
$total = [];
while($row = mysqli_fetch_assoc($q_grafik)){
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total'];
}

// Query Rekap
$rekap = mysqli_query($conn, "SELECT * FROM penjualan
                              WHERE tanggal BETWEEN '$start' AND '$end'
                              ORDER BY tanggal");

// Query Total
$q_total = mysqli_query($conn, "SELECT 
                                COUNT(id) AS jumlah_transaksi,
                                SUM(jumlah) AS total_barang
                                FROM penjualan
                                WHERE tanggal BETWEEN '$start' AND '$end'");
$tot = mysqli_fetch_assoc($q_total);
?>

<hr>

<h2>Grafik Transaksi Barang</h2>
<canvas id="grafik"></canvas>

<script>
const ctx = document.getElementById('grafik');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal); ?>,
        datasets: [{
            label: 'Jumlah Barang',
            data: <?= json_encode($total); ?>,
        }]
    }
});
</script>

<hr>

<h2>Rekap Transaksi</h2>
<table border="1" cellpadding="7">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
    </tr>

    <?php while($r=mysqli_fetch_assoc($rekap)): ?>
    <tr>
        <td><?= $r['id']; ?></td>
        <td><?= $r['tanggal']; ?></td>
        <td><?= $r['nama_barang']; ?></td>
        <td><?= $r['jumlah']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<hr>

<h2>Total</h2>
<p><b>Total Transaksi:</b> <?= $tot['jumlah_transaksi']; ?></p>
<p><b>Total Barang:</b> <?= $tot['total_barang']; ?></p>

<hr>

<!-- Tombol Export -->
<a href="print.php?start=<?= $start; ?>&end=<?= $end; ?>" target="_blank">Print</a> |
<a href="excel.php?start=<?= $start; ?>&end=<?= $end; ?>" target="_blank">Export Excel</a> |

</body>
</html>
