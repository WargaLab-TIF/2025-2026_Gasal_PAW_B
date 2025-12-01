<?php 
    $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01');
    $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Laporan_$tgl_awal-sd-$tgl_akhir.xls");

    require 'koneksi.php';

    $query = "SELECT * FROM penjualan WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal ASC";
    $hasil = mysqli_query($conn, $query);
    
    $data = [];
    $total_pendapatan = 0;
    while ($row = mysqli_fetch_assoc($hasil)) {
        $data[] = $row;
        $total_pendapatan += $row['total'];
    }
    $jumlah_pelanggan = count($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Excel</title>
</head>
<body>
    <h3>Rekap Laporan Penjualan</h3>
    <p>Periode: <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></p>
    <table border="1">
        <thead>
            <tr style="background-color: lightgray;">
                <th colspan="2">No</th>
                <th colspan="2">Total (Rp)</th>
                <th colspan="2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($data as $dat): ?>
            <tr>
                <td colspan="2" align="right"><?= $no++ ?></td>
                <td colspan="2" align="right"><?= $dat['total'] ?></td>
                <td colspan="2" align="right"><?= $dat['tanggal'] ?></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <th colspan="3" align="right"><strong>Jumlah Pelanggan</strong></th>
                <th colspan="3" align="right"><strong>Jumlah Pendapatan</strong></th>
            </tr>
            <tr>
                <td colspan="3" align="right"><strong><?= $jumlah_pelanggan ?></strong></td>
                <td colspan="3" align="right"><strong>Rp <?= $total_pendapatan ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>