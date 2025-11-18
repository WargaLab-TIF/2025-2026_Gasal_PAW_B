<?php
require_once 'koneksi.php';

$first = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(tanggal) AS f FROM penjualan"))['f'];
$last  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(tanggal) AS l FROM penjualan"))['l'];

$tgl1 = isset($_GET['tgl1']) ? $_GET['tgl1'] : $first;
$tgl2 = isset($_GET['tgl2']) ? $_GET['tgl2'] : $last;

$rekap_q = mysqli_query($conn, "
    SELECT tanggal, SUM(jumlah) AS total_jumlah, SUM(subtotal) AS total_subtotal
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
    GROUP BY tanggal
    ORDER BY tanggal ASC
");

$list_q = mysqli_query($conn, "
    SELECT * FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
    ORDER BY tanggal ASC
");

$total_q = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT 
        COUNT(id) AS jumlah_record, 
        SUM(jumlah) AS jumlah_barang,
        SUM(subtotal) AS total_penjualan
    FROM penjualan
    WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Laporan Penjualan - Tanpa Harga</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

  <header class="header">
    <div>
      <h1>Laporan Penjualan</h1>
      <div class="subtitle"></div>
    </div>
  </header>

  <div class="controls card">
    <form method="GET" style="display:flex;gap:10px;align-items:center;width:100%">
      <label class="small">Dari
        <input type="date" name="tgl1" value="<?= $tgl1 ?>" required>
      </label>

      <label class="small">Sampai
        <input type="date" name="tgl2" value="<?= $tgl2 ?>" required>
      </label>

      <div style="flex:1"></div>

      <button class="btn" type="submit">Tampilkan</button>
      <a class="btn secondary" href="print.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>" target="_blank">Print</a>
      <a class="btn ghost" href="excel.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>">Export Excel</a>
    </form>
  </div>

  <div class="grid">

    <div>

      <div class="card">
        <h2>Grafik Penjualan (Subtotal per Tanggal)</h2>
        <div class="chart-wrap">
          <canvas id="chart"></canvas>
        </div>
      </div>

      <div class="card">
        <h2>Rekap Per Tanggal</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Total Jumlah</th>
              <th>Total Subtotal</th>
            </tr>
          </thead>
          <tbody>
          <?php while($r = mysqli_fetch_assoc($rekap_q)): ?>
            <tr>
              <td><?= $r['tanggal'] ?></td>
              <td><?= number_format($r['total_jumlah']) ?></td>
              <td>Rp <?= number_format($r['total_subtotal']) ?></td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>

    </div>

    <aside>

      <div class="card">
        <h2>Detail Penjualan</h2>
        <table class="table" style="font-size:0.92rem">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
          <?php while($d = mysqli_fetch_assoc($list_q)): ?>
            <tr>
              <td><?= $d['id'] ?></td>
              <td><?= $d['tanggal'] ?></td>
              <td><?= htmlspecialchars($d['nama_barang']) ?></td>
              <td><?= $d['jumlah'] ?></td>
              <td>Rp <?= number_format($d['subtotal']) ?></td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="card meta">
        <div class="kv">
          <span class="small">Jumlah Transaksi</span>
          <span class="chip"><?= $total_q['jumlah_record'] ?></span>
        </div>

        <div class="kv">
          <span class="small">Jumlah Barang</span>
          <span class="chip"><?= number_format($total_q['jumlah_barang']) ?></span>
        </div>

        <div class="kv">
          <span class="small">Total Penjualan</span>
          <span class="chip">Rp <?= number_format($total_q['total_penjualan']) ?></span>
        </div>
      </div>

    </aside>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch("data_chart.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>")
.then(r => r.json())
.then(j => {

  new Chart(document.getElementById("chart"), {
    type: "bar",
    data: {
      labels: j.labels,
      datasets: [{
        label: "Subtotal (Rp)", 
        data: j.values,     
        backgroundColor: "#2563eb"
      }]
    },
    options: {
      scales: {
        y: {
          ticks: {
            callback: value => "Rp " + value.toLocaleString()
          }
        }
      }
    }
  });

});
</script>

</body>
</html>
