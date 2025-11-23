<?php
require 'koneksi.php';

// Inisialisasi variabel awal supaya tidak error saat halaman pertama dibuka
$awal = "";
$akhir = "";
$data = [];
$totalPendapatan = 0;

// Jika tombol "Tampilkan" ditekan
if (isset($_GET['tampil'])) {
    $awal  = $_GET['awal']; // Tangkap input tanggal
    $akhir = $_GET['akhir'];

    // Query mengambil transaksi berdasarkan rentang tanggal
    $q = mysqli_query($conn, " 
        SELECT * FROM transaksi 
        WHERE tanggal BETWEEN '$awal' AND '$akhir'
        ORDER BY tanggal ASC
    ");

    // Menyimpan seluruh data transaksi + menghitung total pendapatan
    while ($row = mysqli_fetch_assoc($q)) {
        $data[] = $row;     // simpan baris ke array
        $totalPendapatan += $row['total']; // tambahkan total pendapatan
    }
}

$jumlahPelanggan = count($data); // Menghitung jumlah pelanggan
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: Arial; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #aaa; padding: 7px; }

        .btn {
            padding: 8px 15px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn-print { background: #f39c12; }
        .btn-excel { background: #27ae60; }

        .total-box {
            width: 300px;
            border: 1px solid #aaa;
            margin-top: 20px;
            padding: 10px;
        }

        /* print settings */
        @media print {
            .no-print { display: none; }
            body { margin: 20px; }
        }
    </style>
</head>

<body>

<h2 class="no-print">Laporan Penjualan</h2>

<form method="GET" class="no-print">
    <input type="date" name="awal" value="<?= $awal ?>" required>
    <input type="date" name="akhir" value="<?= $akhir ?>" required>
    <button type="submit" name="tampil">Tampilkan</button>
</form>

<?php if (!empty($data)) { ?>

<br>

<!-- TOMBOL PRINT & EXCEL -->
<div class="no-print">
    <a href="#" onclick="window.print()" class="btn btn-print">🖨 Print</a>
    <a href="excel.php?awal=<?= $awal ?>&akhir=<?= $akhir ?>" class="btn btn-excel">📄 Excel</a>
</div>

<h3>Rekap Laporan Penjualan <?= $awal ?> sampai <?= $akhir ?></h3>

<!-- GRAFIK (ikut print) -->
<canvas id="myChart" width="600" height="260"></canvas>

<script>
    const labels = [<?php foreach ($data as $d) echo "'".$d['tanggal']."'," ?>]; //Mengambil label tanggal dari PHP
    const totals  = [<?php foreach ($data as $d) echo $d['total']."," ?>]; // Mengambil total transaksi dari PHP

    new Chart(document.getElementById('myChart'), { // Membuat grafik batang
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{ 
                label: 'Total', 
                data: totals 
            }]
        }
    });
</script>

<!-- REKAP TABEL -->
<h3>Rekap Penjualan</h3>

<table>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php $no=1; foreach($data as $d){ ?>
    <tr>
        <td><?= $no++ ?></td>
        <td>RP. <?= number_format($d['total'],0,',','.') ?></td>
        <td><?= date('d M Y', strtotime($d['tanggal'])) ?></td>
    </tr>
    <?php } ?>
</table>

<!-- TOTAL -->
<div class="total-box">
    <b>Jumlah Pelanggan:</b> <?= $jumlahPelanggan ?> Orang <br>
    <b>Jumlah Pendapatan:</b> RP. <?= number_format($totalPendapatan,0,',','.') ?>
</div>

<?php } ?>

</body>
</html>
