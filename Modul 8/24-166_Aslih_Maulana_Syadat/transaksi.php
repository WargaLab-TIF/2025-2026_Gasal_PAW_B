<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Riwayat Transaksi</h2>
        <table>
            <thead>
                <tr>
                    <th>No Nota</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Qty</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = mysqli_query($conn, "SELECT n.*, p.nama, (SELECT SUM(qty) FROM item_nota WHERE id_nota=n.id_nota) as jml_qty FROM nota n LEFT JOIN pelanggan p ON n.id_pelanggan=p.id ORDER BY n.waktu_transaksi DESC");
                while ($d = mysqli_fetch_array($q)) {
                ?>
                    <tr>
                        <td><?= $d['id_nota'] ?></td>
                        <td><?= $d['waktu_transaksi'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td align="center"><?= $d['jml_qty'] ?></td>
                        <td>Rp <?= number_format($d['total_keseluruhan']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>