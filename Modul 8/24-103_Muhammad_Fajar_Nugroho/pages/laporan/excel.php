<?php
session_start();
require_once '../../koneksi.php';

$dari_tanggal = isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '';
$sampai_tanggal = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';

if (!empty($dari_tanggal) && !empty($sampai_tanggal) && $dari_tanggal > $sampai_tanggal) {
	$sementara = $dari_tanggal;
	$dari_tanggal = $sampai_tanggal;
	$sampai_tanggal = $sementara;
}
if ($dari_tanggal && !$sampai_tanggal) { $sampai_tanggal = $dari_tanggal; }
if ($sampai_tanggal && !$dari_tanggal) { $dari_tanggal = $sampai_tanggal; }

$perintah_dasar = "SELECT
	b.id AS barang_id,
	b.kode_barang,
	b.nama_barang,
	SUM(nd.qty) AS jumlah_terjual,
	SUM(nd.subtotal) AS total_penjualan,
	MIN(n.tanggal) AS first_sold,
	MAX(n.tanggal) AS last_sold
FROM nota_detail nd
JOIN nota n ON nd.nota_id = n.id
JOIN barang b ON nd.barang_id = b.id";

$perintah_penutup = " GROUP BY b.id, b.kode_barang, b.nama_barang ORDER BY jumlah_terjual DESC";

$hasil = false;
if ($dari_tanggal && $sampai_tanggal) {
	$sql = $perintah_dasar . " WHERE DATE(n.tanggal) BETWEEN ? AND ?" . $perintah_penutup;
	$stmt = mysqli_prepare($koneksi, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'ss', $dari_tanggal, $sampai_tanggal);
		mysqli_stmt_execute($stmt);
		$hasil = mysqli_stmt_get_result($stmt);
	}
} else {
	$sql = $perintah_dasar . $perintah_penutup;
	$hasil = @mysqli_query($koneksi, $sql);
}

if (!$hasil) {
	$sql_view = "SELECT barang_id, kode_barang, nama_barang, jumlah_terjual, total_penjualan, first_sold, last_sold FROM laporan_penjualan";
	if ($dari_tanggal && $sampai_tanggal) {
		$sql_view .= " WHERE DATE(last_sold) BETWEEN ? AND ?";
		$stmt_view = mysqli_prepare($koneksi, $sql_view);
		if ($stmt_view) {
			mysqli_stmt_bind_param($stmt_view, 'ss', $dari_tanggal, $sampai_tanggal);
			mysqli_stmt_execute($stmt_view);
			$hasil = mysqli_stmt_get_result($stmt_view);
		}
	} else {
		$hasil = @mysqli_query($koneksi, $sql_view);
	}
}

$data_laporan = [];
if ($hasil) {
	while ($baris = mysqli_fetch_assoc($hasil)) { $data_laporan[] = $baris; }
}

$nama_file = 'laporan_barang';
if ($dari_tanggal && $sampai_tanggal) { $nama_file .= '_' . $dari_tanggal . '-' . $sampai_tanggal; }
$nama_file .= '.xls';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $nama_file);

echo "<table border='1'>";
echo "<thead><tr><th>No</th><th>Kode Barang</th><th>Nama Barang</th><th>Jumlah Terjual</th><th>Total Penjualan</th><th>Pertama Terjual</th><th>Terakhir Terjual</th></tr></thead>";
echo "<tbody>";
$no = 1;
$total_jumlah = 0;
$total_penjualan = 0;
if ($data_laporan) {
	foreach ($data_laporan as $baris) {
		$kode = $baris['kode_barang'] ?? '';
		$nama = $baris['nama_barang'] ?? '';
		$jumlah = (int)($baris['jumlah_terjual'] ?? 0);
		$total = (int)($baris['total_penjualan'] ?? 0);
		$awal = $baris['first_sold'] ?? '';
		$akhir = $baris['last_sold'] ?? '';
		$total_jumlah += $jumlah;
		$total_penjualan += $total;
		echo "<tr>";
		echo "<td>".$no++."</td>";
		echo "<td>".htmlspecialchars((string)$kode)."</td>";
		echo "<td>".htmlspecialchars((string)$nama)."</td>";
		echo "<td>".number_format($jumlah, 0, ',', '.')."</td>";
		echo "<td>Rp. ".number_format($total, 0, ',', '.')."</td>";
		echo "<td>".($awal!=='' ? htmlspecialchars(date('d M Y', strtotime((string)$awal))) : '-')."</td>";
		echo "<td>".($akhir!=='' ? htmlspecialchars(date('d M Y', strtotime((string)$akhir))) : '-')."</td>";
		echo "</tr>";
	}
} else {
	echo "<tr><td colspan='7'>Tidak ada data laporan untuk rentang tanggal ini.</td></tr>";
}
echo "</tbody>";
echo "<tfoot><tr><th colspan='3'>Total Barang Terjual</th><th>".number_format($total_jumlah, 0, ',', '.')."</th><th colspan='2'>Total Penjualan</th><th>Rp. ".number_format($total_penjualan, 0, ',', '.')."</th></tr></tfoot>";
echo "</table>";

exit;
?>
