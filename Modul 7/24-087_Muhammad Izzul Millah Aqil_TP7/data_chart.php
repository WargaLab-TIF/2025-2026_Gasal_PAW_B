<?php
require_once 'koneksi.php';

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

$sql = "
    SELECT tanggal, SUM(subtotal) AS total_subtotal
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
    GROUP BY tanggal
    ORDER BY tanggal ASC
";

$res = mysqli_query($conn, $sql);

$labels = [];
$values = [];

while ($r = mysqli_fetch_assoc($res)) {
    $labels[] = $r['tanggal'];
    $values[] = (int)$r['total_subtotal']; // SUBTOTAL
}

echo json_encode(['labels' => $labels, 'values' => $values]);
?>
