<?php
require_once 'koneksi.php';

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

$rekap_q = mysqli_query($conn, "
    SELECT tanggal, SUM(jumlah) AS total_jumlah, SUM(subtotal) AS total_subtotal
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
    GROUP BY tanggal
");

$list_q = mysqli_query($conn, "
    SELECT * FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
");

$total_q = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT COUNT(id) AS jumlah_record,
           SUM(jumlah) AS jumlah_barang,
           SUM(subtotal) AS total_penjualan
    FROM penjualan
"));
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Print Laporan Penjualan</title>
<link rel="stylesheet" href="style.css">

<style>
@media print {
    .no-print { display: none; }
    body { padding: 20px; }
}
#chartPrint {
    width: 100% !important;
    height: 350px !important;
}
</style>
</head>
<body>

<button class="btn no-print" onclick="window.print()">PRINT</button>
<button type="submit"><a href="index.php">Kembali</a></button>

<h2>Laporan Penjualan</h2>
<p>Periode: <b><?= $tgl1 ?></b> s/d <b><?= $tgl2 ?></b></p>

<h3>Grafik Penjualan (Subtotal per Tanggal)</h3>
<div style="width:100%;max-width:700px;height:350px;margin-bottom:25px">
    <canvas id="chartPrint"></canvas>
</div>


<h3>Rekap Per Tanggal</h3>
<table class="table">
<tr>
    <th>Tanggal</th>
    <th>Total Jumlah</th>
    <th>Total Subtotal</th>
</tr>
<?php while($r = mysqli_fetch_assoc($rekap_q)): ?>
<tr>
    <td><?= $r['tanggal'] ?></td>
    <td><?= $r['total_jumlah'] ?></td>
    <td>Rp <?= number_format($r['total_subtotal']) ?></td>
</tr>
<?php endwhile; ?>
</table>


<h3>Detail Penjualan</h3>
<table class="table">
<tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Subtotal</th>
</tr>
<?php while($d = mysqli_fetch_assoc($list_q)): ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['jumlah'] ?></td>
    <td>Rp <?= number_format($d['subtotal']) ?></td>
</tr>
<?php endwhile; ?>
</table>


<h3>Total Keseluruhan</h3>
<p>Jumlah Record: <b><?= $total_q['jumlah_record'] ?></b></p>
<p>Jumlah Barang: <b><?= $total_q['jumlah_barang'] ?></b></p>
<p>Total Penjualan: <b>Rp <?= number_format($total_q['total_penjualan']) ?></b></p>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch("data_chart.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>")
.then(r => r.json())
.then(j => {

    new Chart(document.getElementById("chartPrint"), {
        type: "bar",
        data: {
            labels: j.labels,
            datasets: [{
                label: "Subtotal (Rp)",
                data: j.values,
                backgroundColor: "#2563eb"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

});
</script>

</body>
</html>
