<?php
include "koneksi.php";

if (!isset($_GET['start']) || !isset($_GET['end'])) {
    header("Location: filter.php");
    exit;
}

$start = $_GET['start'];
$end   = $_GET['end'];

$query = $conn->query("SELECT * FROM penjualan WHERE tanggal BETWEEN '$start' AND '$end' ORDER BY tanggal ASC");

$data = [];
$totalPendapatan = 0;
$totalPelanggan  = 0;

while ($row = $query->fetch_assoc()) {
    $data[] = $row;
    $totalPendapatan += $row['total'];
    $totalPelanggan++;
}

$labels = array_column($data, 'tanggal');
$values = array_column($data, 'total');
?>
<!DOCTYPE html>
<html>
<head>
<title>Rekap Laporan Penjualan</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
table { border-collapse: collapse; width: 80%; }
table, th, td { border: 1px solid black; padding: 8px; }

.btn {
    padding:5px 10px;
    color:white;
    cursor:pointer;
    text-decoration:none;
}
.excel-btn { 
    background:green;
    padding:5px 10px;
    color:white;
    cursor:pointer;
    text-decoration:none; 
}
.print-btn { 
    background:green;
    padding:5px 10px;
    color:white;
    cursor:pointer;
    text-decoration:none; 
}
.back-btn { 
    background:blue;
    padding:5px 10px;
    color:white;
    cursor:pointer;
    text-decoration:none;
}

@media print {
    .excel-btn, .print-btn, .back-btn, h2 {
        display: none;
    }
}
</style>
</head>
<body>

<h2>Rekap Laporan Penjualan</h2>

<button onclick="window.location.href='index.php'" class="btn back-btn">Kembali</button>
<br><br>

<button onclick="window.print()" class="print-btn">Print</button>
<a href="export_excel.php?start=<?= $start ?>&end=<?= $end ?>">
    <button class="excel-btn">Excel</button>
</a>
<br><br>

<canvas id="myChart" width="800" height="300"></canvas>
<script>
const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Total Penjualan',
            data: <?= json_encode($values) ?>,
            borderWidth: 1
        }]
    }
});
</script>

<br>
<table>
<tr>
    <th>No</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>

<?php 
if(empty($data)){
    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
} else {
    $no = 1;
    foreach($data as $d){ ?>
    <tr>
        <td><?= $no++ ?></td>
        <td>Rp <?= number_format($d['total']) ?></td>
        <td><?= date('d M Y', strtotime($d['tanggal'])) ?></td>
    </tr>
<?php } } ?>
</table>

<br>
<table style="width:40%">
<tr>
    <th>Jumlah Pelanggan</th>
    <th>Total Pendapatan</th>
</tr>
<tr>
    <td><?= $totalPelanggan ?> Orang</td>
    <td>Rp <?= number_format($totalPendapatan) ?></td>
</tr>
</table>

</body>
</html>