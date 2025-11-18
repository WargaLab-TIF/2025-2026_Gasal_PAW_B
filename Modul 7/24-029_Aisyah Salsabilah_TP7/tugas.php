<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="p-4">

<h3 class="mb-4">Laporan Penjualan</h3>

<!-- FILTER -->
<form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <label>Dari Tanggal</label>
        <input type="date" class="form-control" name="tgl_awal" required 
        value="<?= $_GET['tgl_awal'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Sampai Tanggal</label>
        <input type="date" class="form-control" name="tgl_akhir" required
        value="<?= $_GET['tgl_akhir'] ?? '' ?>">
    </div>

    <div class="col-md-3 d-flex align-items-end">
        <button class="btn btn-primary">Tampilkan</button>
    </div>
</form>

<?php
if (isset($_GET['tgl_awal'])) {

    $awal  = $_GET['tgl_awal'];
    $akhir = $_GET['tgl_akhir'];

    // DATA UNTUK GRAFIK (PER HARI)
    $q = mysqli_query($conn,
        "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total
            FROM transaksi
            WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'
            GROUP BY DATE(waktu_transaksi)
            ORDER BY DATE(waktu_transaksi) ASC"
    );

    $label = [];
    $data  = [];

    while ($r = mysqli_fetch_assoc($q)) {
        $label[] = $r['tanggal'];
        $data[]  = $r['total'];
    }

    // DATA REKAP TABEL
    $q2 = mysqli_query($conn,
        "SELECT id, waktu_transaksi, keterangan, total, pelanggan_id
            FROM transaksi
            WHERE DATE(waktu_transaksi) BETWEEN '$awal' AND '$akhir'
            ORDER BY DATE(waktu_transaksi) ASC"
    );

    $rekapData = [];
    $jumlahPelanggan = 0;
    $totalPendapatan = 0;

    while ($x = mysqli_fetch_assoc($q2)) {
        $rekapData[] = $x;
        $jumlahPelanggan++;
        $totalPendapatan += $x['total'];
    }
?>

<!-- TOMBOL EXPORT -->
<div class="mb-4">
    <a href="print.php?tgl_awal=<?= $awal ?>&tgl_akhir=<?= $akhir ?>" target="_blank"
        class="btn btn-danger">Cetak</a>

    <a href="excel.php?tgl_awal=<?= $awal ?>&tgl_akhir=<?= $akhir ?>"
        class="btn btn-warning">Excel</a>
</div>

<!-- GRAFIK -->
<div class="card p-3 mb-4">
    <canvas id="grafik"></canvas>
</div>

<script>
var ctx = document.getElementById('grafik');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($label) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($data) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    }
});
</script>

<!-- REKAP -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($rekapData as $row) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['waktu_transaksi'] ?></td>
            <td>Rp <?= number_format($row['total']) ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- TOTAL -->
<div class="row mt-4">
    <div class="col-md-3 p-3 border">
        <b>Jumlah Transaksi</b><br>
        <h4><?= $jumlahPelanggan ?> Transaksi</h4>
    </div>

    <div class="col-md-3 p-3 border">
        <b>Total Pendapatan</b><br>
        <h4>Rp <?= number_format($totalPendapatan) ?></h4>
    </div>
</div>

<?php } ?>

</body>
</html>