<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Laporan_Transaksi.xls");

require "koneksi.php";

$tgl_awal  = $_GET['tgl_awal'] ?? "";
$tgl_akhir = $_GET['tgl_akhir'] ?? "";

$label = [];
$jumlah = [];

if ($tgl_awal && $tgl_akhir) {
    $query_chart = "
        SELECT waktu_transaksi AS tanggal, SUM(total) AS total_harian
        FROM transaksi
        WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'
        GROUP BY waktu_transaksi
        ORDER BY waktu_transaksi ASC
    ";
    $hasil_chart = mysqli_query($conn, $query_chart);

    while ($row = mysqli_fetch_assoc($hasil_chart)) {
        $label[]  = $row['tanggal'];
        $jumlah[] = $row['total_harian'];
    }

    $query_rekap = "
        SELECT waktu_transaksi AS tanggal, SUM(total) AS total_harian
        FROM transaksi
        WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'
        GROUP BY waktu_transaksi
        ORDER BY waktu_transaksi ASC
    ";
    $rekap = mysqli_query($conn, $query_rekap);

    $query_total = "
        SELECT COUNT(id) AS jumlah_pelanggan,
               SUM(total) AS total_pendapatan
        FROM transaksi
        WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'
    ";
    $total_data = mysqli_fetch_assoc(mysqli_query($conn,$query_total));
}

function format_tanggal($tgl) {
    return date("d F Y", strtotime($tgl));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Laporan Transaksi Excel</title>
</head>
<body>

<?php if ($tgl_awal && $tgl_akhir) { ?>
<br>
<h5><h2>Rekap Laporan Penjualan </h2><?= $tgl_awal ?>  sampai  <?= $tgl_akhir ?></h5>
<table>
<tr>
    <th>No</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>
<?php
$no=1;
while ($row = mysqli_fetch_assoc($rekap)) {
    echo "<tr>
            <td>$no</td>
            <td>Rp ".number_format($row['total_harian'],0,",",".")."</td>
            <td>".format_tanggal($row['tanggal'])."</td>
         </tr>";
    $no++;
}
?>
</table>

<br>

<table>
<tr>
    <td>Jumlah Pelanggan</td>
    <td>Total Pendapatan</td>
</tr>
<tr>
    <td><?= $total_data['jumlah_pelanggan'] ?> Orang</td>
    <td>Rp <?= number_format($total_data['total_pendapatan'],0,",",".") ?></td>
</tr>
</table>

<?php } ?>

</body>
</html>
