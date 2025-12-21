<?php
require "koneksi.php";
$tgl_awal  = $_POST['tgl_awal'] ?? "";
$tgl_akhir = $_POST['tgl_akhir'] ?? "";
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
<title>Laporan Transaksi</title>
<a href="style.css"></a>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <form method="POST">
        <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" style="border-radius: 5px;">
        <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" style="border-radius: 5px;">
        <button type="submit" style="background-color: rgba(34, 155, 28, 0.74); width: 80px; height: 25px; color: white; font-size: 15px; border: none; border-radius: 5px; cursor: pointer;">Tampilkan</button>
    </form>
    <?php if ($tgl_awal && $tgl_akhir) { ?>
    <br>
    <button onclick="window.print()" style="background-color: rgba(217, 92, 25, 0.84); width: 70px; height: 25px; color: white; font-size: 15px; border: none; border-radius: 5px; cursor: pointer;"><img src="Print.png" height="14px" width="14px">Cetak</button>
    <a href="excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>">
        <button type="button" style="background-color: rgba(217, 92, 25, 0.84); width: 70px; height: 25px; color: white; font-size: 15px; border: none; border-radius: 5px; cursor: pointer;"> <img src="Print.png" height="14px" weidht="14px"> Excel</button>
    </a>
    <div style="width:700px;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
    new Chart(document.getElementById("myChart"), {
        type: "bar",
        data: {
            labels: <?= json_encode($label) ?>,
            datasets: [{
                label: "Total",
                data: <?= json_encode($jumlah) ?>,
                borderWidth: 2,
                borderColor: 'black',
                backgroundColor:[
                        "rgba(168, 167, 173, 0.73)"
                    ]
            }]
        }
    });
    </script>
    <br>
    <table border="1" cellpadding="6">
    <tr style="background-color: lightblue; color: blue;">
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php
    $no=1;
    while ($row = mysqli_fetch_assoc($rekap)) {
        echo "<tr>
                <td style='width:100px'>$no</td>
                <td style='width:200px'>Rp ".number_format($row['total_harian'],0,",",".")."</td>
                <td style='width:200px'>".format_tanggal($row['tanggal']) ."</td>
            </tr>";
        $no++;
    }
    ?>
    </table>
    <br>
    <table border="1">
    <tr style="background-color: lightblue; color: blue;">
        <td>Jumlah Pelanggan</td>
        <td>Total Pendapatan</td>
    </tr>
    <tr style="color: blue;">
        <td><?= $total_data['jumlah_pelanggan'] ?> Orang</td>
        <td>Rp <?= number_format($total_data['total_pendapatan'],0,",",".") ?></td>
    </tr>
    </table>
    <?php } ?>
</body>
</html>
