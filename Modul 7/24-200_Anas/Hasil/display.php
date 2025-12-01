<?php 

require 'koneksi.php';

$labels = []; 
$data_values = []; 
$data=[];
$result = null;
$total_penjualan = 0;
$total_pelanggan = 0;
$tanggalawal = '';
$tanggalakhir = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $tanggalawal = $_POST['tanggalawal'];
    $tanggalakhir = $_POST['tanggalakhir'];
    $sql_query = "SELECT Total, Tanggal FROM penjualan_harian 
    WHERE Tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'";

    $result = mysqli_query($conn, $sql_query);
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $labels[] = date('d M', strtotime($row['Tanggal']));
          $data_values[] = (int)$row['Total'];
          $data[] = $row;
        }
      }
}

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Hasil Pencarian</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
  <h1>Rekap laporan Penjualan</h1>
  <h3>
    <?php 
      if ($tanggalawal && $tanggalakhir) {
          echo $tanggalawal . ' sampai ' . $tanggalakhir;
      } 
    ?>
  </h3>
    <a href="index.php"><button class="b" style="background-color: darkblue;"><b>< </b>Kembali</button></a>
    <br><br><br>
    <button onclick="window.print()" style="background-color: darkorange;" class="b">🖨️ Cetak</button>
    <form action="excel.php" method="post" style="display: inline-block;">
        <input type="hidden" name="tanggalawal" value="<?= htmlspecialchars($tanggalawal) ?>">
        <input type="hidden" name="tanggalakhir" value="<?= htmlspecialchars($tanggalakhir) ?>">
        <button type="submit" name="submit" style="background-color: darkorange;" class="b">🖨️ Excel</button>
    </form>
    <div>
      <canvas id="myChart"></canvas>
    </div>
    <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?= json_encode($labels);?>,
          datasets: [{
            label: 'Total',
            data: <?= json_encode($data_values);?>,
            borderWidth: 1,
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  <div class="data-container">
    <table border="1" class="data-table">
      <tr>
          <th>No.</th>
          <th>Total</th>
          <th>Tanggal</th>
      </tr>
      <?php
        if ($data) {
            $nomor = 1; 
            foreach ($data as $row) {
                echo "<tr>";
                // Sesuaikan nama kolom database Anda
                echo "<td>" . $nomor++ . "</td>"; 
                echo "<td>RP." . htmlspecialchars($row['Total']) . "</td>";
                echo "<td>" . tanggal_indo(htmlspecialchars($row['Tanggal'])) . "</td>";
                echo "</tr>";
                $total_penjualan += $row['Total'];
            }
            $total_pelanggan += $nomor-1;
        }
      ?>
    </table>
  </div>
  <div class="data-container">
    <table border="1" class="data-table">
      <tr>
          <th style="color: blue;">Jumlah Pelanggan</th>
          <th style="color: blue;">Jumlah Pendapatan</th>
      </tr>
      <?php
          echo "<tr>";
          echo "<td>" . number_format($total_pelanggan) . " Orang</td>";
          echo "<td>RP." . number_format($total_penjualan) . "</td>";
          echo "<tr>";
      ?>
    </table>
  </div>
</body>
</html>