<?php
require_once 'koneksi.php';

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

$data = mysqli_query($conn, "
    SELECT *
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
    ORDER BY tanggal ASC
");

$total = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT SUM(jumlah) AS jumlah_barang,
           SUM(subtotal) AS total_subtotal
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
"));
?>
<table border="1">
<tr style="font-weight:bold; background:#eee;">
    <th>ID</th>
    <th>Tanggal</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Subtotal</th>
</tr>

<?php while($d = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['jumlah'] ?></td>
    <td><?= $d['subtotal'] ?></td>
</tr>
<?php endwhile; ?>

<tr style="font-weight:bold; background:#f3f3f3;">
    <td colspan="3" align="right">TOTAL</td>
    <td><?= $total['jumlah_barang'] ?></td>
    <td><?= $total['total_subtotal'] ?></td>
</tr>
</table>
