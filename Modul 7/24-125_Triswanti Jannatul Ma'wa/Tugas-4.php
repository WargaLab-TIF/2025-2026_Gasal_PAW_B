<?php
include 'koneksi.php';

$awal  = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : "";
$akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : "";


if (!empty($awal) && !empty($akhir)) {
    $query = "
        SELECT tanggal, SUM(jumlah) AS total
        FROM transaksi
        WHERE tanggal BETWEEN '$awal' AND '$akhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
} else {
    $query = "
        SELECT tanggal, SUM(jumlah) AS total
        FROM transaksi
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
}

if (!empty($awal) && !empty($akhir)) {
    $pelangganQuery = "
        SELECT COUNT(DISTINCT id) AS jumlah_pelanggan
        FROM transaksi
        WHERE tanggal BETWEEN '$awal' AND '$akhir'
    ";
} else {
    $pelangganQuery = "
        SELECT COUNT(DISTINCT id) AS jumlah_pelanggan
        FROM transaksi
    ";
}

$result = mysqli_query($koneksi, $query);

$tanggal = [];
$total = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total'];
    $data[] = $row;
}

$pelangganResult = mysqli_query($koneksi, $pelangganQuery);
$pelangganRow = mysqli_fetch_assoc($pelangganResult);
$jumlahPelanggan = $pelangganRow['jumlah_pelanggan'];

$jumlahPendapatan = array_sum($total);

// Tugas c
if (isset($_GET['export']) && $_GET['export'] == "excel") {

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");
    // OUTPUT EXCEL
    echo "
    <h3>Rekap Laporan Penjualan $awal sampai $akhir</h3>
    <table border='1' cellpadding='5'>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>";

    $no = 1;
    foreach ($data as $d) {
        echo "
        <tr>
            <td>$no</td>
            <td>Rp " . number_format($d['total'],0,',','.') . "</td>
            <td>{$d['tanggal']}</td>
        </tr>";
        $no++;
    }

    echo "
    <tr><td colspan='3'></td></tr>
    <tr>
        <th>Jumlah Pelanggan</th>
        <td colspan='2'>$jumlahPelanggan Orang</td>
    </tr>
    <tr>
        <th>Jumlah Pendapatan</th>
        <td colspan='2'>Rp " . number_format($jumlahPendapatan,0,',','.') . "</td>
    </tr>
    </table>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { 
            font-family: Arial; 
            background: #f6f6f6; 
            padding: 20px; 
        }
        .btn {
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom:5px;
        }
        .btn-back   { background: #0057B7; }   
        .btn-print  { background: #f5730a; }    
        .btn-excel  { background: #f5730a; }    

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 60%;
            background: white;
        }
        table th, td {
            padding: 8px 10px;
            border: 1px solid #aaa;
        }
        table th {
            background: #AFEEEE;
        }

        @media print {
            .filter-box, .btn-area { display: none; }
            table { width: 100%; }
        }
    </style>
</head>
<body>

    <h2>Rekap Laporan Penjualan </h2>
    <!-- TUGAS A: Tombol Print & Excel -->
    <div class="btn">
        <a href="Tugas-1.php">
            <button class="btn btn-back">← Kembali</button>
        </a>
    </div>
    <div>
        <button class="btn btn-print" onclick="window.print()">🖨️ Cetak</button>

        <a href="?export=excel&tgl_awal=<?= $awal ?>&tgl_akhir=<?= $akhir ?>">
            <button type="button" class="btn btn-excel">📄 Excel</button>
        </a>
    </div>
    <canvas id="grafik"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    new Chart(document.getElementById('grafik'), {
        type: 'bar',
        data: {
            labels: <?= json_encode($tanggal) ?>,
            datasets: [{
                label: "Total",
                data: <?= json_encode($total) ?>,
                borderColor: "black",
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
    </script>

    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        <?php $no=1; foreach($data as $d): ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td>Rp. <?= number_format($d['total'],0,',','.') ?></td>
            <td><?= $d['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- TABEL TOTAL (TUGAS B) -->
    <table style="margin-top:20px; width:40%;">
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><?= $jumlahPelanggan ?> Orang</td>
            <td>Rp. <?= number_format($jumlahPendapatan,0,',','.') ?></td>
        </tr>
    </table>
</body>
</html>
