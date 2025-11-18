<?php
include "koneksi.php";

$start = $_GET['start'];
$end   = $_GET['end'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

$query = $conn->query("SELECT * FROM penjualan WHERE tanggal BETWEEN '$start' AND '$end' ORDER BY tanggal ASC");

$data = [];
$totalPendapatan = 0;
$totalPelanggan = 0;

while ($row = $query->fetch_assoc()) {
    $data[] = $row;
    $totalPendapatan += $row['total'];
    $totalPelanggan++;
}
?>

<h3>Laporan Penjualan</h3>
<p>Periode: <?= $start ?> s/d <?= $end ?></p>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>

<?php
if(empty($data)){
    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
}else{
    $no = 1;
    foreach($data as $d){
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['total'] ?></td>
    <td><?= $d['tanggal'] ?></td>
</tr>
<?php }} ?>
</table>

<br>

<table border="1" cellpadding="8">
<tr>
    <th>Jumlah Pelanggan</th>
    <th>Total Pendapatan</th>
</tr>
<tr>
    <td><?= $totalPelanggan ?> Orang</td>
    <td><?= $totalPendapatan ?></td>
</tr>
</table>