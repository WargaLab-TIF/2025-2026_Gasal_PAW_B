<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap_Laporan_Penjualan.xls");

$dari_tanggal = isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '';
$sampai_tanggal = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';

if ($dari_tanggal && $sampai_tanggal) {
    $query = "SELECT id, total, tanggal FROM transaksi WHERE tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
    $hasil = mysqli_query($conn, $query);
} else {
    $hasil = mysqli_query($conn, "SELECT id, total, tanggal FROM transaksi");
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background-color: #d9edf7; }
    </style>
</head>
<body>
    <h3>Rekap Laporan Penjualan <?= $dari_tanggal . " sampai " . $sampai_tanggal ?></h3>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_pendapatan = 0;
            if ($hasil) {
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $tgl_formatted = date('d-M-y', strtotime($row['tanggal'])); // Format excel friendly
                    $total_pendapatan += $row['total'];
                    
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>Rp. " . number_format($row['total'], 0, ',', '.') . "</td>";
                    echo "<td>" . $tgl_formatted . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= ($no - 1) ?> Orang</td>
                <td><?= "Rp. " . number_format($total_pendapatan, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>