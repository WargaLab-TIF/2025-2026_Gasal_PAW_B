<?php
$conn = new mysqli("localhost", "root", "", "db_toko");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$no_nota = $_GET['no_nota'] ?? '';
$sqlMaster = "SELECT * FROM transaksi_master WHERE no_nota = '$no_nota'";
$master = $conn->query($sqlMaster)->fetch_assoc();

$sqlDetail = "SELECT * FROM transaksi_detail WHERE no_nota = '$no_nota'";
$detail = $conn->query($sqlDetail);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Transaksi</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        td, th { padding: 8px; border: 1px solid #ccc; text-align: center; }
    </style>
</head>
<body>
    <h2>Hasil Transaksi</h2>
    <?php if ($master): ?>
        <p><strong>No Nota:</strong> <?= $master['no_nota'] ?></p>
        <p><strong>Nama Pembeli:</strong> <?= $master['nama'] ?></p>
        <p><strong>Tanggal:</strong> <?= $master['tanggal'] ?></p>

        <h3>Detail Barang</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga (Rp)</th>
                <th>Jumlah</th>
                <th>Subtotal (Rp)</th>
            </tr>
            <?php $no=1; while($row = $detail->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['barang'] ?></td>
                <td><?= number_format($row['harga'], 2, ',', '.') ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= number_format($row['subtotal'], 2, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Total Transaksi: Rp <?= number_format($master['total'], 2, ',', '.') ?></h3>
    <?php else: ?>
        <p>Data tidak ditemukan!</p>
    <?php endif; ?>

    <br>
    <a href="transaksi_form.php">← Kembali ke Form</a>
</body>
</html>
