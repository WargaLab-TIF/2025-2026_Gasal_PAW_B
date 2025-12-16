<?php
require_once '../includes/hubung.php';

$hasil = mysqli_query($conn, "SELECT tp.*,s.nama FROM transaksi_penjualan tp 
JOIN supplier s ON tp.supplier_id = s.id");
$hasil2 = mysqli_query($conn, "SELECT tpd.*,tp.no_nota,b.kode_barang 
FROM transaksi_penjualan_detail tpd 
JOIN transaksi_penjualan tp ON tpd.transaksi_penjualan_id = tp.id 
JOIN barang b ON tpd.barang_id = b.id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Transaksi Penjualan(Nota)</title>
    <link rel="stylesheet" href="../aset/style.css">
</head>
<body>
    
    <?php include '../aset/header.php' ?>

    <div class="utama">

    <div class="judul">
        <h2>Data Master Transaksi Penjualan(Nota)</h2>
    </div>

    <div class="tambah">
        <button class="btn btn-tambah" onclick="window.location.href='tambahtransaksipenjualan.php'">Tambah Data</button>
    </div>

    <?php
    session_start();
    
    if (isset($_SESSION['sukses'])) {
        echo "<div class='sukses'>{$_SESSION['sukses']}</div>";

    unset($_SESSION['sukses']);
    }
    if (isset($_SESSION['error'])) {
        echo "<div class='error'>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    ?>

    <div class="tabel">
    <div class="tabel-supplier">
        <table>
            <tr>
                <th>ID</th>
                <th>Nomor Nota</th>
                <th>Tanggal</th>
                <th>Supplier</th>
                <th>Total</th>
                <th>Keterangan</th>
            </tr>
            <?php while($row1=mysqli_fetch_assoc($hasil)): ?>
            <tr>
                <td><?= htmlspecialchars(trim($row1['id'])) ?></td>
                <td><?= htmlspecialchars(trim($row1['no_nota'])) ?></td>
                <td><?= htmlspecialchars(trim($row1['tanggal'])) ?></td>
                <td><?= htmlspecialchars(trim($row1['nama'])) ?></td>
                <td><?= htmlspecialchars(trim($row1['total'])) ?></td>
                <td><?= htmlspecialchars(trim($row1['keterangan'])) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="judul">
        <h2>Data Detail Transaksi Penjualan(Barang/Item)</h2>
    </div>

    <div class="tabel-barang">
        <table>
            <tr>
                <th>ID</th>
                <th>Transaksi Penjualan ID</th>
                <th>Barang ID</th>
                <th>Harga</th>
                <th>Quantity(Jumlah Barang)</th>
                <th>SubTotal</th>
            </tr>
            <?php while($row2=mysqli_fetch_assoc($hasil2)): ?>
            <tr>
                <td><?= htmlspecialchars(trim($row2['id'])) ?></td>
                <td><?= htmlspecialchars(trim($row2['no_nota'])) ?></td>
                <td><?= htmlspecialchars(trim($row2['kode_barang'])) ?></td>
                <td><?= htmlspecialchars(trim($row2['harga'])) ?></td>
                <td><?= htmlspecialchars(trim($row2['qty'])) ?></td>
                <td><?= htmlspecialchars(trim($row2['subtotal'])) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>    
    </div>

    </div>


</body>
</html>