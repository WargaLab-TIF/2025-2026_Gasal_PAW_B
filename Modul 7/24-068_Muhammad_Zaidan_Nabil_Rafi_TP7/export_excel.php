<?php
require_once 'config.php';

$start = isset($_GET['start']) ? $_GET['start'] : '2023-09-01';
$end   = isset($_GET['end'])   ? $_GET['end']   : '2023-09-27';

$startDate = date('Y-m-d', strtotime($start));
$endDate   = date('Y-m-d', strtotime($end));

$sql = "SELECT sale_date, SUM(total_amount) AS total_amount, SUM(customers) AS customers
        FROM sales
        WHERE sale_date BETWEEN ? AND ?
        GROUP BY sale_date
        ORDER BY sale_date ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $startDate, $endDate);
$stmt->execute();
$res = $stmt->get_result();

$filename = "Rekap Laporan Penjualan {$startDate} sampai {$endDate}.csv";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$output = fopen('php://output', 'w');

fputcsv($output, ["Rekap Laporan Penjualan {$startDate} sampai {$endDate}"]);
fputcsv($output, []);

fputcsv($output, ['No', 'Total (Rp)', 'Tanggal', 'Pelanggan']);

$no = 1;
$totalPendapatan = 0;
$totalPelanggan = 0;

while ($r = $res->fetch_assoc()) {
    $totalPendapatan += (int)$r['total_amount'];
    $totalPelanggan += (int)$r['customers'];

    $dateObj = date_create($r['sale_date']);
    $excelDate = date_format($dateObj, 'd-M-y');

    fputcsv($output, [
        $no++,
        $r['total_amount'],
        $excelDate,
        $r['customers']
    ]);
}

fputcsv($output, []);
fputcsv($output, ['Total', $totalPendapatan, '', $totalPelanggan]);

fclose($output);
